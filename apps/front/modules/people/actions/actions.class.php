<?php

/**
 * people actions.
 *
 * @package    cms
 * @subpackage people
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class peopleActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->redirect('parties/index');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->person = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PersonForm();

    $this->setTemplate('edit');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new PersonForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new PersonForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new PersonForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->getRoute()->getObject()->delete();

    $this->redirect('parties/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter('person'));
    if ($form->isValid())
    {
      $person = $form->save();

      $this->redirect('@people_show?id='.$person['id']);
    }
  }
}
