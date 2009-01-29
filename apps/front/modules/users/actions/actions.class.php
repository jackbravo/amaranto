<?php

/**
 * users actions.
 *
 * @package    amaranto
 * @subpackage users
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class usersActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->sf_guard_user_list = $this->getRoute()->getObjects();
  }

  public function executePassword(sfWebRequest $request)
  {
    $this->forwardUnless($this->getUser()->getId() == $request->getParameter('id'), 'sfGuardAuth', 'secure');
    $this->forwardUnless($this->getUser()->getPersonId() == $request->getParameter('person_id'), 'sfGuardAuth', 'secure');

    $this->form = new sfGuardUserPasswordForm($this->getRoute()->getObject());
    $this->form->setDefault('person_id', $request->getParameter('person_id'));
  }

  public function executePassword_update(sfWebRequest $request)
  {
    $this->forwardUnless($this->getUser()->getId() == $request->getParameter('id'), 'sfGuardAuth', 'secure');

    $this->form = new sfGuardUserPasswordForm($this->getRoute()->getObject());

    $this->forwardUnless($this->getUser()->getPersonId() == $this->form->getValue('person_id'), 'sfGuardAuth', 'secure');

    $this->processForm($request, $this->form);

    $this->setTemplate('password');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->sf_guard_user = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->forward404unless($request->hasParameter('person_id'));

    $this->form = new sfGuardUserForm();
    $this->form->setDefault('person_id', $request->getParameter('person_id'));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new sfGuardUserForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new sfGuardUserForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new sfGuardUserForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect('@users');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $sf_guard_user = $form->save();

      $this->redirect('@contacts_show?id='.$form->getValue('person_id'));
    }
  }
}
