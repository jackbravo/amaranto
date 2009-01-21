<?php

/**
 * companies actions.
 *
 * @package    amaranto
 * @subpackage companies
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class companiesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->redirect('@contacts');
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CompanyForm();

    $this->setTemplate('edit');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new CompanyForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new CompanyForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new CompanyForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->getRoute()->getObject()->delete();

    $this->redirect('@contacts');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter('company'));
    if ($form->isValid())
    {
      $company = $form->save();

      $this->redirect('@contacts_show?id='.$company['id']);
    }
  }

  public function executeAjaxList(sfWebRequest $request)
  {
    $this->getResponse()->setContentType('application/json');

    $companies = Doctrine::getTable('Company')->findForAjax(
      $request->getParameter('q'),
      $request->getParameter('limit')
    );

    return $this->renderText( json_encode($companies) );
  }
}
