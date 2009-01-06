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
    $this->pager = new sfDoctrinePager('Issue',
      sfConfig::get('app_max_issues_on_index')
    );
    $this->pager->setQuery(Doctrine::getTable('Issue')->getListQuery());
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
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

      $this->redirect('@issues_edit?id='.$issue['id']);
    }
  }
}
