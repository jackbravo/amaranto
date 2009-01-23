<?php

/**
 * sfGuardUser form.
 *
 * @package    form
 * @subpackage sfGuardUser
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class sfGuardUserForm extends sfGuardUserAdminForm
{
  public function configure()
  {
    parent::configure();
    $this->widgetSchema['person_id'] = new sfWidgetFormInputHidden();
    $this->validatorSchema['person_id'] = new sfValidatorDoctrineChoice(array(
      'model' => 'Person',
      'required' => true,
    ));
  }

  public function updateObject($values = null)
  {
    $user = parent::updateObject($values);
    if (is_numeric($this->getValue('person_id')))
    {
      $user->setPersonId($this->getValue('person_id'));
    }

    return $user;
  }
}
