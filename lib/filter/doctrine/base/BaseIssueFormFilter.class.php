<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Issue filter form base class.
 *
 * @package    filters
 * @subpackage Issue *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseIssueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'         => new sfWidgetFormFilterInput(),
      'project_id'    => new sfWidgetFormDoctrineChoice(array('model' => 'Project', 'add_empty' => true)),
      'component_id'  => new sfWidgetFormDoctrineChoice(array('model' => 'Component', 'add_empty' => true)),
      'milestone_id'  => new sfWidgetFormDoctrineChoice(array('model' => 'Milestone', 'add_empty' => true)),
      'assigned_to'   => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'is_open'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'opened_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'opened_by'     => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'resolved_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'resolved_by'   => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'closed_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'closed_by'     => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'status_id'     => new sfWidgetFormDoctrineChoice(array('model' => 'Status', 'add_empty' => true)),
      'category_id'   => new sfWidgetFormDoctrineChoice(array('model' => 'Category', 'add_empty' => true)),
      'priority_id'   => new sfWidgetFormDoctrineChoice(array('model' => 'Priority', 'add_empty' => true)),
      'orig_estimate' => new sfWidgetFormFilterInput(),
      'curr_estimate' => new sfWidgetFormFilterInput(),
      'elapsed'       => new sfWidgetFormFilterInput(),
      'deadline'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'title'         => new sfValidatorPass(array('required' => false)),
      'project_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Project', 'column' => 'id')),
      'component_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Component', 'column' => 'id')),
      'milestone_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Milestone', 'column' => 'id')),
      'assigned_to'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'is_open'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'opened_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'opened_by'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'resolved_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'resolved_by'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'closed_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'closed_by'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'status_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Status', 'column' => 'id')),
      'category_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Category', 'column' => 'id')),
      'priority_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Priority', 'column' => 'id')),
      'orig_estimate' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'curr_estimate' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'elapsed'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'deadline'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('issue_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Issue';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'title'         => 'Text',
      'project_id'    => 'ForeignKey',
      'component_id'  => 'ForeignKey',
      'milestone_id'  => 'ForeignKey',
      'assigned_to'   => 'ForeignKey',
      'is_open'       => 'Boolean',
      'opened_at'     => 'Date',
      'opened_by'     => 'ForeignKey',
      'resolved_at'   => 'Date',
      'resolved_by'   => 'ForeignKey',
      'closed_at'     => 'Date',
      'closed_by'     => 'ForeignKey',
      'status_id'     => 'ForeignKey',
      'category_id'   => 'ForeignKey',
      'priority_id'   => 'ForeignKey',
      'orig_estimate' => 'Number',
      'curr_estimate' => 'Number',
      'elapsed'       => 'Number',
      'deadline'      => 'Date',
    );
  }
}