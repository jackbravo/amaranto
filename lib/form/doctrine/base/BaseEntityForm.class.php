<?php

/**
 * Entity form base class.
 *
 * @package    form
 * @subpackage entity
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseEntityForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInput(),
      'code'        => new sfWidgetFormInput(),
      'type'        => new sfWidgetFormInput(),
      'user_id'     => new sfWidgetFormInput(),
      'owner_id'    => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'parent_id'   => new sfWidgetFormInput(),
      'description' => new sfWidgetFormTextarea(),
      'title'       => new sfWidgetFormInput(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => 'Entity', 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'code'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'type'        => new sfValidatorInteger(array('required' => false)),
      'user_id'     => new sfValidatorInteger(array('required' => false)),
      'owner_id'    => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'parent_id'   => new sfValidatorInteger(array('required' => false)),
      'description' => new sfValidatorString(array('max_length' => 2147483647, 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Entity', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('entity[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Entity';
  }

}
