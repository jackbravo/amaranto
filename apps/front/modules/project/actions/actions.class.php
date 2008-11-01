<?php

/**
 * project actions.
 *
 * @package    cms
 * @subpackage project
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 8507 2008-04-17 17:32:20Z fabien $
 */
class projectActions extends sfActions
{
  public function executeIndex()
  {
    $this->projectList = $this->getProjectTable()->findAll();
  }

  public function executeCreate()
  {
    $this->form = new ProjectForm();

    $this->setTemplate('edit');
  }

  public function executeEdit($request)
  {
    $this->form = $this->getProjectForm($request->getParameter('id'));
  }

  public function executeUpdate($request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = $this->getProjectForm($request->getParameter('id'));

    $this->form->bind($request->getParameter('project'));
    if ($this->form->isValid())
    {
      $project = $this->form->save();

      $this->redirect('project/edit?id='.$project['id']);
    }

    $this->setTemplate('edit');
  }

  public function executeDelete($request)
  {
    $this->forward404Unless($project = $this->getProjectById($request->getParameter('id')));

    $project->delete();

    $this->redirect('project/index');
  }
  
  private function getProjectTable()
  {
    return Doctrine::getTable('Project');
  }
  
  private function getProjectById($id)
  {
    return $this->getProjectTable()->find($id);
  }
  
  private function getProjectForm($id)
  {
    $project = $this->getProjectById($id);
    
    if ($project instanceof Project)
    {
      return new ProjectForm($project);
    }
    else
    {
      return new ProjectForm();
    }
  }
}