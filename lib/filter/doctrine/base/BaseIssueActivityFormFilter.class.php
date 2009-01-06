<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * IssueActivity filter form base class.
 *
 * @package    filters
 * @subpackage IssueActivity *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseIssueActivityFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'issue_id'   => new sfWidgetFormDoctrineChoice(array('model' => 'Issue', 'add_empty' => true)),
      'verb'       => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'created_by' => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'body'       => new sfWidgetFormFilterInput(),
      'changes'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'issue_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Issue', 'column' => 'id')),
      'verb'       => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'body'       => new sfValidatorPass(array('required' => false)),
      'changes'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('issue_activity_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'IssueActivity';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'issue_id'   => 'ForeignKey',
      'verb'       => 'Text',
      'created_at' => 'Date',
      'created_by' => 'ForeignKey',
      'body'       => 'Text',
      'changes'    => 'Text',
    );
  }
}