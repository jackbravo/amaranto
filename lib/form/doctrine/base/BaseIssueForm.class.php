<?php

/**
 * Issue form base class.
 *
 * @package    form
 * @subpackage issue
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseIssueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'title'         => new sfWidgetFormInput(),
      'project_id'    => new sfWidgetFormDoctrineSelect(array('model' => 'Project', 'add_empty' => true)),
      'component_id'  => new sfWidgetFormDoctrineSelect(array('model' => 'Component', 'add_empty' => true)),
      'assigned_to'   => new sfWidgetFormDoctrineSelect(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'is_open'       => new sfWidgetFormInputCheckbox(),
      'opened_at'     => new sfWidgetFormDateTime(),
      'opened_by'     => new sfWidgetFormDoctrineSelect(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'resolved_at'   => new sfWidgetFormDateTime(),
      'resolved_by'   => new sfWidgetFormDoctrineSelect(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'closed_at'     => new sfWidgetFormDateTime(),
      'closed_by'     => new sfWidgetFormDoctrineSelect(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'status_id'     => new sfWidgetFormDoctrineSelect(array('model' => 'Status', 'add_empty' => true)),
      'category_id'   => new sfWidgetFormDoctrineSelect(array('model' => 'Category', 'add_empty' => true)),
      'priority_id'   => new sfWidgetFormDoctrineSelect(array('model' => 'Priority', 'add_empty' => true)),
      'milestone_id'  => new sfWidgetFormDoctrineSelect(array('model' => 'Milestone', 'add_empty' => true)),
      'orig_estimate' => new sfWidgetFormInput(),
      'curr_estimate' => new sfWidgetFormInput(),
      'elapsed'       => new sfWidgetFormInput(),
      'deadline'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => 'Issue', 'column' => 'id', 'required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'project_id'    => new sfValidatorDoctrineChoice(array('model' => 'Project', 'required' => false)),
      'component_id'  => new sfValidatorDoctrineChoice(array('model' => 'Component', 'required' => false)),
      'assigned_to'   => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'is_open'       => new sfValidatorBoolean(),
      'opened_at'     => new sfValidatorDateTime(array('required' => false)),
      'opened_by'     => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'resolved_at'   => new sfValidatorDateTime(array('required' => false)),
      'resolved_by'   => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'closed_at'     => new sfValidatorDateTime(array('required' => false)),
      'closed_by'     => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'status_id'     => new sfValidatorDoctrineChoice(array('model' => 'Status', 'required' => false)),
      'category_id'   => new sfValidatorDoctrineChoice(array('model' => 'Category', 'required' => false)),
      'priority_id'   => new sfValidatorDoctrineChoice(array('model' => 'Priority', 'required' => false)),
      'milestone_id'  => new sfValidatorDoctrineChoice(array('model' => 'Milestone', 'required' => false)),
      'orig_estimate' => new sfValidatorNumber(array('required' => false)),
      'curr_estimate' => new sfValidatorNumber(array('required' => false)),
      'elapsed'       => new sfValidatorNumber(array('required' => false)),
      'deadline'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('issue[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Issue';
  }

}