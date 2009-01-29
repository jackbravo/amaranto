<?php

class sfGuardUserPasswordForm extends sfGuardUserForm
{
  public function configure()
  {
    parent::configure();

    unset(
      $this['groups_list'],
      $this['permissions_list'],
      $this['is_active'],
      $this['is_super_admin'],
      $this['updated_at'],
      $this['username']
    );
  }
}
