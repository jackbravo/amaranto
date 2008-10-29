<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/base/BaseFormFilterDoctrine.class.php');

/**
 * Person filter form base class.
 *
 * @package    filters
 * @subpackage Person *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasePersonFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormFilterInput(),
      'name'       => new sfWidgetFormFilterInput(),
      'code'       => new sfWidgetFormFilterInput(),
      'type'       => new sfWidgetFormFilterInput(),
      'parent_id'  => new sfWidgetFormDoctrineChoice(array('model' => 'Company', 'add_empty' => true)),
      'title'      => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Person', 'column' => 'id')),
      'name'       => new sfValidatorPass(array('required' => false)),
      'code'       => new sfValidatorPass(array('required' => false)),
      'type'       => new sfValidatorInteger(array('required' => false)),
      'parent_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Company', 'column' => 'id')),
      'title'      => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('person[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Person';
  }

  public function getFields()
  {
    return array(
      'id'         => 'integer',
      'name'       => 'string',
      'code'       => 'string',
      'type'       => 'integer',
      'parent_id'  => 'integer',
      'title'      => 'string',
      'created_at' => 'timestamp',
      'updated_at' => 'timestamp',
    );
  }
}