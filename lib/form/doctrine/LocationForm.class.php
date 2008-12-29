<?php

/**
 * Location form.
 *
 * @package    form
 * @subpackage Location
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class LocationForm extends BaseLocationForm
{
  public function configure()
  {
    $this->widgetSchema->setFormFormatterName('small');

    // this is set when saving the entity
    unset($this['id'], $this['entity_id']);

    $this->widgetSchema['street'] = new sfWidgetFormTextarea();
    $this->widgetSchema['postal_code']->setAttributes(array('size' => '10'));
    $this->widgetSchema['country'] = new sfWidgetFormI18nSelectCountry(array(
      'culture' => 'es',
      'add_empty' => true,
    ));

    // use choices from the Location class
    $types = Location::$types;
    $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
      'choices' => $types,
    ));
    $this->validatorSchema['type'] = new sfValidatorChoice(array(
      'choices' => array_keys($types),
      'required' => false,
    ));
  }
}
