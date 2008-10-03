<?php

/**
 * Phonenumber form.
 *
 * @package    form
 * @subpackage Phonenumber
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class PhonenumberForm extends BasePhonenumberForm
{
  public function configure()
  {
    // this is set when saving the entity
    unset($this['entity_id']);

    // use choices from the Phonenumber class
    $types = Phonenumber::$types;
    $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
      'choices' => $types,
    ));
    $this->validatorSchema['type'] = new sfValidatorChoice(array(
      'choices' => array_keys($types),
    ));
  }
}
