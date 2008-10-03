<?php

/**
 * Email form.
 *
 * @package    form
 * @subpackage Email
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class EmailForm extends BaseEmailForm
{
  public function configure()
  {
    // this is set when saving the entity
    unset($this['entity_id']);

    // use choices from the Email class
    $types = Email::$types;
    $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
      'choices' => $types,
    ));
    $this->validatorSchema['type'] = new sfValidatorChoice(array(
      'choices' => array_keys($types),
      'required' => false,
    ));

    // email field must be an email ;-)
    $this->validatorSchema['email'] = new sfValidatorAnd(array(
      $this->validatorSchema['email'],
      new sfValidatorEmail(),
    ));
  }
}
