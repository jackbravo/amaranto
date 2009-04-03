<?php

/**
 * Email form base class.
 *
 * @package    form
 * @subpackage email
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseEmailForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'entity_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Entity', 'add_empty' => true)),
      'email'     => new sfWidgetFormInput(),
      'type'      => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => 'Email', 'column' => 'id', 'required' => false)),
      'entity_id' => new sfValidatorDoctrineChoice(array('model' => 'Entity', 'required' => false)),
      'email'     => new sfValidatorEmail(array('max_length' => 50, 'required' => false)),
      'type'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('email[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Email';
  }

}
