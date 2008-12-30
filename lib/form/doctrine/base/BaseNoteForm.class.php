<?php

/**
 * Note form base class.
 *
 * @package    form
 * @subpackage note
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseNoteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'entity_id'          => new sfWidgetFormDoctrineSelect(array('model' => 'Entity', 'add_empty' => true)),
      'project_id'         => new sfWidgetFormDoctrineSelect(array('model' => 'Project', 'add_empty' => true)),
      'body'               => new sfWidgetFormTextarea(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'created_by_user_id' => new sfWidgetFormDoctrineSelect(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'updated_by_user_id' => new sfWidgetFormDoctrineSelect(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorDoctrineChoice(array('model' => 'Note', 'column' => 'id', 'required' => false)),
      'entity_id'          => new sfValidatorDoctrineChoice(array('model' => 'Entity', 'required' => false)),
      'project_id'         => new sfValidatorDoctrineChoice(array('model' => 'Project', 'required' => false)),
      'body'               => new sfValidatorString(array('max_length' => 2147483647, 'required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
      'created_by_user_id' => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'updated_by_user_id' => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('note[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Note';
  }

}