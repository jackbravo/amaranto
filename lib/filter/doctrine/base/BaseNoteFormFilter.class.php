<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Note filter form base class.
 *
 * @package    filters
 * @subpackage Note *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseNoteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'entity_id'          => new sfWidgetFormDoctrineChoice(array('model' => 'Entity', 'add_empty' => true)),
      'project_id'         => new sfWidgetFormDoctrineChoice(array('model' => 'Project', 'add_empty' => true)),
      'body'               => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'created_by_user_id' => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'updated_by_user_id' => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'entity_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Entity', 'column' => 'id')),
      'project_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Project', 'column' => 'id')),
      'body'               => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by_user_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'updated_by_user_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('note_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Note';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'entity_id'          => 'ForeignKey',
      'project_id'         => 'ForeignKey',
      'body'               => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'created_by_user_id' => 'ForeignKey',
      'updated_by_user_id' => 'ForeignKey',
    );
  }
}