<?php

/**
 * milestones actions.
 *
 * @package    cms
 * @subpackage milestones
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class milestonesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->milestone_list = $this->getRoute()->getObjects();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MilestoneForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new MilestoneForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new MilestoneForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new MilestoneForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect('milestones/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $milestone = $form->save();

      $this->redirect('milestones/edit?id='.$milestone['id']);
    }
  }
}
