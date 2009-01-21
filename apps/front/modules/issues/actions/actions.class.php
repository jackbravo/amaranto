<?php

/**
 * issues actions.
 *
 * @package    cms
 * @subpackage issues
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class issuesActions extends sfActions
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
    $this->form = new IssueForm();
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

    $this->redirect('@issues');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $issue = $form->save();

      if ($request->hasParameter('_save_and_add')) {
        $this->redirect('@issues_new');
      } else {
        $this->redirect('@issues_show?id='.$issue['id']);
      }
    }
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
