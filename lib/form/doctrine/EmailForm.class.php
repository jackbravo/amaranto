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
    $types = Email::$types;

    $this->widgetSchema['entity_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
      'choices' => $types,
    ));

    $this->validatorSchema['type'] = new sfValidatorChoice(array(
      'choices' => array_keys($types),
    ));
    $this->validatorSchema['email'] = new sfValidatorAnd(array(
      $this->validatorSchema['email'],
      new sfValidatorEmail(),
    ));
  }
}
