<?php

/**
 * company actions.
 *
 * @package    cms
 * @subpackage company
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 8507 2008-04-17 17:32:20Z fabien $
 */
class companyActions extends sfActions
{
  public function executeIndex()
  {
    $this->companyList = $this->getCompanyTable()->findAll();
  }

  public function executeShow($request)
  {
    $this->company = $this->getCompanyById($request->getParameter('id'));
    $this->forward404Unless($this->company);
  }

  public function executeCreate()
  {
    $this->form = new CompanyForm();

    $this->setTemplate('edit');
  }

  public function executeEdit($request)
  {
    $this->form = $this->getCompanyForm($request->getParameter('id'));
  }

  public function executeUpdate($request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = $this->getCompanyForm($request->getParameter('id'));

    $this->form->bind($request->getParameter('company'));
    if ($this->form->isValid())
    {
      $company = $this->form->save();

      $this->redirect('company/edit?id='.$company->get('id'));
    }

    $this->setTemplate('edit');
  }

  public function executeDelete($request)
  {
    $this->forward404Unless($company = $this->getCompanyById($request->getParameter('id')));

    $company->delete();

    $this->redirect('company/index');
  }
  
  private function getCompanyTable()
  {
    return Doctrine::getTable('Company');
  }
  
  private function getCompanyById($id)
  {
    return $this->getCompanyTable()->find($id);
  }
  
  private function getCompanyForm($id)
  {
    $company = $this->getCompanyById($id);
    
    if ($company instanceof Company)
    {
      return new CompanyForm($company);
    }
    else
    {
      return new CompanyForm();
    }
  }
}