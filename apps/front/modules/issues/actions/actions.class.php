<?php

/**
 * issues actions.
 *
 * @package    amaranto
 * @subpackage issues
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class issuesActions extends sfActions
{
  public function preExecute()
  {
    Doctrine::getTable('Issue')->addRecordListener(new IssueMailerListener());
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->filter = $this->getFilter($request);
    $this->pager = $this->getPager($request, $this->filter);
  }

  public function executeFilter(sfWebRequest $request)
  {
    if ($request->hasParameter('_reset'))
    {
      $this->getUser()->setAttribute('issues_filter', $this->getDefaultFilter());
      $this->redirect('@issues');
    }

    $this->filter = $this->getFilter($request);

    $this->filter->bind($request->getParameter('issue_filters'));
    if ($this->filter->isValid())
    {
      $this->getUser()->setAttribute('issues_filter', $this->filter->getValues());
      $this->redirect('@issues');
    }

    $this->pager = $this->getPager($request, $this->filter);
    $this->setTemplate('index');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->issue = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $issue = new Issue();
    $issue->fromArray($this->getLastCreatedIssue());
    $this->form = new IssueForm($issue);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new IssueForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new IssueForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new IssueForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

    $this->redirect('@issues');
  }

  public function executeBatch(sfWebRequest $request)
  {
    if (!$ids = $request->getParameter('ids'))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      $this->redirect('@issues');
    }

    $validator = new sfValidatorDoctrineChoiceMany(array('model' => 'Issue'));
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      // execute batch
      if ($request->hasParameter('_edit'))
      {
        $this->forward('issues', 'batchEdit');
      }
    }
    catch (sfValidatorError $e)
    {
      $this->getUser()->setFlash('error', 'Some of the selected items where not valid.');
      $this->redirect('@issues');
    }
  }

  public function executeBatchEdit(sfWebRequest $request)
  {
    $this->issues = Doctrine::getTable('Issue')->findIds($request->getParameter('ids'));
    $this->form = new IssueBatchForm();
  }

  public function executeBatchUpdate(sfWebRequest $request)
  {
    $this->form = new IssueBatchForm();
    $this->form->ids = $request->getParameter('ids');

    $this->processForm($request, $this->form);

    $this->setTemplate('batchEdit');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      if ($form->getObject()->isNew()) {
        $this->saveLastCreated($form->getValues());
        $this->getUser()->setFlash('notice', 'The item was created successfully.');
      } else {
        $this->getUser()->setFlash('notice', 'The item was updated successfully.');
      }

      if ($request->hasParameter('_save_and_close')) {
        $form->getObject()->setIsClosed(true);
      }
      $issue = $form->save();

      if ($request->hasParameter('_save_and_add')) {
        $this->redirect('@issues_new');
      } else if ($request->hasParameter('_save_batch')) {
        $this->getUser()->setFlash('notice', 'The items were updated successfully.');
        $this->redirect('@issues');
      }else {
        $this->redirect('@issues_show?id='.$issue['id']);
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.');
    }
  }

  protected function saveLastCreated($issue)
  {
    $persist = array('category_id', 'project_id', 'component_id', 'milestone_id');
    $data = array();
    foreach ($persist as $key) {
      $data[$key] = $issue[$key];
    }
    $this->getUser()->setAttribute('last_created_issue', $data);
  }

  public function getLastCreatedIssue()
  {
    return $this->getUser()->getAttribute('last_created_issue', array());
  }

  protected function getPager($request, $filter)
  {
    $pager = new sfDoctrinePager('Issue',
      sfConfig::get('app_max_issues_on_index')
    );
    $pager->setQuery($filter->buildQuery(
      $this->getUser()->getAttribute('issues_filter', $this->getDefaultFilter())
    ));
    $pager->setPage($request->getParameter('page', 1));
    $pager->setTableMethod('getListQuery');
    $pager->init();

    return $pager;
  }

  protected function getFilter($request)
  {
    $filter = new IssueFormFilter(
      $this->getUser()->getAttribute('issues_filter', $this->getDefaultFilter())
    );

    return $filter;
  }

  protected function getDefaultFilter()
  {
    return array(
      'is_closed' => 0,
      'assigned_to' => $this->getUser()->getId(),
    );
  }
}
