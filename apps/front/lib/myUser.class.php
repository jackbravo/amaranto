<?php

class myUser extends sfGuardSecurityUser
{
  public function getId()
  {
    return $this->getAttribute('user_id', null, 'sfGuardSecurityUser');
  }
}
