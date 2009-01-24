<?php

class sfGuardUserGeneratorHelper extends BaseSfGuardUserGeneratorHelper
{
  public function linkToCancel($object, $params)
  {
    if (is_numeric($object->getPersonId())) {
      $url = '@contacts_show?id='. $object->getPersonId();
    } else {
      $url = '@sf_guard_user';
    }
    return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin'), $url).'</li>';
  }
}
