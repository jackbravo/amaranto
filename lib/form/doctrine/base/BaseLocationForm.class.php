<?php

/**
 * Location form base class.
 *
 * @package    form
 * @subpackage location
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseLocationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'entity_id'   => new sfWidgetFormDoctrineChoice(array('model' => 'Entity', 'add_empty' => true)),
      'type'        => new sfWidgetFormInput(),
      'street'      => new sfWidgetFormInput(),
      'city'        => new sfWidgetFormInput(),
      'state'       => new sfWidgetFormInput(),
      'country'     => new sfWidgetFormInput(),
      'postal_code' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => 'Location', 'column' => 'id', 'required' => false)),
      'entity_id'   => new sfValidatorDoctrineChoice(array('model' => 'Entity', 'required' => false)),
      'type'        => new sfValidatorInteger(array('required' => false)),
      'street'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'state'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'country'     => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'postal_code' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('location[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Location';
  }

}
