<?php

/**
 * person actions.
 *
 * @package    cms
 * @subpackage person
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 8507 2008-04-17 17:32:20Z fabien $
 */
class personActions extends sfActions
{
  public function executeIndex()
  {
    $this->redirect('parties/index');
  }

  public function executeShow($request)
  {
    $this->person = $this->getPersonById($request->getParameter('id'));
    $this->forward404Unless($this->person);
  }

  public function executeCreate()
  {
    $this->form = new PersonForm();

    $this->setTemplate('edit');
  }

  public function executeEdit($request)
  {
    $this->form = $this->getPersonForm($request->getParameter('id'));
  }

  public function executeUpdate($request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));

    $this->form = $this->getPersonForm($request->getParameter('id'));

    $this->form->bind($request->getParameter('person'));
    if ($this->form->isValid())
    {
      $person = $this->form->save();

      $this->redirect('person/show?id='.$person['id']);
    }

    $this->setTemplate('edit');
  }

  public function executeDelete($request)
  {
    $this->forward404Unless($person = $this->getPersonById($request->getParameter('id')));

    $person->delete();

    $this->redirect('parties/index');
  }
  
  private function getPersonTable()
  {
    return Doctrine::getTable('Person');
  }
  
  private function getPersonById($id)
  {
    return $this->getPersonTable()->find($id);
  }
  
  private function getPersonForm($id)
  {
    $person = $this->getPersonById($id);
    
    if ($person instanceof Person)
    {
      return new PersonForm($person);
    }
    else
    {
      return new PersonForm();
    }
  }
}
