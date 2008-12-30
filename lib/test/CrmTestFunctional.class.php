<?php

class CrmTestFunctional extends sfTestFunctional
{
  public function loadData()
  {
    Doctrine::loadData(sfConfig::get('sf_data_dir').'/fixtures');
    return $this;
  }

  public function signin()
  {
    return $this->info('Sign in')
      ->get('/login')
      ->isRequestParameter('module', 'sfGuardAuth')
      ->isRequestParameter('action', 'signin')
      ->click('sign in', array('signin' => array(
        'username' => 'admin',
        'password' => 'admin',
      )))
      ->isRedirected()
      ->followRedirect()
      ->isStatusCode(200)
      ->with('user')->isAuthenticated()
      ->checkResponseElement('#menu', '/Logout/')
    ;
  }

  public function signout()
  {
    return $this->info('Sign out')
      ->get('/logout')
      ->isRequestParameter('module', 'sfGuardAuth')
      ->isRequestParameter('action', 'signout')
      ->isRedirected()
      ->followRedirect()
      ->with('user')->isAuthenticated(false)
    ;
  }
}

