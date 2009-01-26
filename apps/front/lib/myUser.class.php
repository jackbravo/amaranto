<?php

class myUser extends sfGuardSecurityUser
{
  public function getId()
  {
    return $this->getAttribute('user_id', null, 'sfGuardSecurityUser');
  }

  public function getEmail()
  {
    return $this->getAttribute('email', null, 'sfGuardSecurityUser');
  }

  public function signIn($user, $remember = false, $con = null)
  {
    $this->setAttribute('email', $user->getEmail(), 'sfGuardSecurityUser');
    $this->setAttribute('person_id', $user->getProfile()->getId(), 'sfGuardSecurityUser');
    parent::signIn($user, $remember, $con);
  }
}
