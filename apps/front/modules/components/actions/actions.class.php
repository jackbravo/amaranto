<?php

/**
 * components actions.
 *
 * @package    cms
 * @subpackage components
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class componentsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->component_list = $this->getRoute()->getObjects();
  }

  public function executeNew(sfWebRequest $request)
  {
    $project = Doctrine::getTable('Project')->find($request->getParameter('project_id'));
    $this->forward404unless($project);

    $component = new Component();
    $component->Project = $project;
    $this->form = new ComponentForm($component);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new ComponentForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new ComponentForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new ComponentForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $object = $this->getRoute()->getObject();
    $project_id = $object->project_id;
    $object->delete();

    $this->redirect('@projects_show?id='.$project_id);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $component = $form->save();

      $this->redirect('@projects_show?id='.$component['project_id']);
    }
  }
}
