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
      'project_id'    => new sfWidgetFormFilterInput(),
      'component_id'  => new sfWidgetFormFilterInput(),
      'assigned_to'   => new sfWidgetFormFilterInput(),
      'is_open'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'opened_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'opened_by'     => new sfWidgetFormFilterInput(),
      'resolved_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'resolved_by'   => new sfWidgetFormFilterInput(),
      'closed_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'closed_by'     => new sfWidgetFormFilterInput(),
      'status_id'     => new sfWidgetFormFilterInput(),
      'category_id'   => new sfWidgetFormFilterInput(),
      'priority_id'   => new sfWidgetFormFilterInput(),
      'milestone_id'  => new sfWidgetFormFilterInput(),
      'orig_estimate' => new sfWidgetFormFilterInput(),
      'curr_estimate' => new sfWidgetFormFilterInput(),
      'elapsed'       => new sfWidgetFormFilterInput(),
      'deadline'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'title'         => new sfValidatorPass(array('required' => false)),
      'project_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'component_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'assigned_to'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_open'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'opened_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'opened_by'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'resolved_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'resolved_by'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'closed_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'closed_by'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'category_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'priority_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'milestone_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
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
      'project_id'    => 'Number',
      'component_id'  => 'Number',
      'assigned_to'   => 'Number',
      'is_open'       => 'Boolean',
      'opened_at'     => 'Date',
      'opened_by'     => 'Number',
      'resolved_at'   => 'Date',
      'resolved_by'   => 'Number',
      'closed_at'     => 'Date',
      'closed_by'     => 'Number',
      'status_id'     => 'Number',
      'category_id'   => 'Number',
      'priority_id'   => 'Number',
      'milestone_id'  => 'Number',
      'orig_estimate' => 'Number',
      'curr_estimate' => 'Number',
      'elapsed'       => 'Number',
      'deadline'      => 'Date',
    );
  }
}