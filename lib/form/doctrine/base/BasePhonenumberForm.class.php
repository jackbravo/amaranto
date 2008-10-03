<?php

/**
 * Phonenumber form base class.
 *
 * @package    form
 * @subpackage phonenumber
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BasePhonenumberForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'entity_id' => new sfWidgetFormDoctrineSelect(array('model' => 'Entity', 'add_empty' => true)),
      'number'    => new sfWidgetFormInput(),
      'type'      => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => 'Phonenumber', 'column' => 'id', 'required' => false)),
      'entity_id' => new sfValidatorDoctrineChoice(array('model' => 'Entity', 'required' => false)),
      'number'    => new sfValidatorString(array('max_length' => 50)),
      'type'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('phonenumber[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Phonenumber';
  }

}