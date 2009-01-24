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
}
