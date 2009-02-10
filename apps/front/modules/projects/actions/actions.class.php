<?php

/**
 * projects actions.
 *
 * @package    amaranto
 * @subpackage projects
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class projectsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->filter = $this->getFilter($request);
    $this->pager = $this->getPager($request, $this->filter);
  }

  public function executeFilter(sfWebRequest $request)
  {
    if ($request->hasParameter('_reset'))
    {
      $this->getUser()->setAttribute('projects_filter', $this->getDefaultFilter());
      $this->getUser()->setAttribute('projects_filter_name', 'all');
      $this->redirect('@projects');
    }

    if ($request->hasParameter('_mine'))
    {
      $this->getUser()->setAttribute('projects_filter', array(
        'owner_id' => $this->getUser()->getId(),
      ));
      $this->getUser()->setAttribute('projects_filter_name', 'mine');
      $this->redirect('@projects');
    }

    $this->filter = $this->getFilter($request);

    $this->filter->bind($request->getParameter('project_filters'));
    if ($this->filter->isValid())
    {
      $this->getUser()->setAttribute('projects_filter', $this->filter->getValues());
      $this->redirect('@projects');
    }

    $this->pager = $this->getPager($request, $this->filter);
    $this->setTemplate('index');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->project = $this->getRoute()->getObject();
    $note = new Note();
    $note->Project = $this->project;
    $this->note_form = new NoteForm($note);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProjectForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new ProjectForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new ProjectForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new ProjectForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

    $this->redirect('@projects');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter('project'));
    if ($form->isValid())
    {
      $this->getUser()->setFlash('notice', $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.');

      $project = $form->save();

      $this->redirect('@projects_show?id='.$project['id']);
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.');
    }
  }

  protected function getPager($request, $filter)
  {
    $pager = new sfDoctrinePager('Project',
      sfConfig::get('app_max_projects_on_index')
    );
    $pager->setQuery($filter->buildQuery(
      $this->getUser()->getAttribute('projects_filter', $this->getDefaultFilter())
    ));
    $pager->setPage($request->getParameter('page', 1));
    $pager->setTableMethod('getListQuery');
    $pager->init();

    return $pager;
  }

  protected function getFilter($request)
  {
    $filter = new ProjectFormFilter(
      $this->getUser()->getAttribute('projects_filter', $this->getDefaultFilter())
    );

    return $filter;
  }

  protected function getDefaultFilter()
  {
    return array(
    );
  }
}
