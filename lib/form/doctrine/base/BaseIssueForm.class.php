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
      'project_id'    => new sfWidgetFormInput(),
      'component_id'  => new sfWidgetFormInput(),
      'assigned_to'   => new sfWidgetFormInput(),
      'is_open'       => new sfWidgetFormInputCheckbox(),
      'opened_at'     => new sfWidgetFormDateTime(),
      'opened_by'     => new sfWidgetFormInput(),
      'resolved_at'   => new sfWidgetFormDateTime(),
      'resolved_by'   => new sfWidgetFormInput(),
      'closed_at'     => new sfWidgetFormDateTime(),
      'closed_by'     => new sfWidgetFormInput(),
      'status_id'     => new sfWidgetFormInput(),
      'category_id'   => new sfWidgetFormInput(),
      'priority_id'   => new sfWidgetFormInput(),
      'milestone_id'  => new sfWidgetFormInput(),
      'orig_estimate' => new sfWidgetFormInput(),
      'curr_estimate' => new sfWidgetFormInput(),
      'elapsed'       => new sfWidgetFormInput(),
      'deadline'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => 'Issue', 'column' => 'id', 'required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'project_id'    => new sfValidatorInteger(array('required' => false)),
      'component_id'  => new sfValidatorInteger(array('required' => false)),
      'assigned_to'   => new sfValidatorInteger(array('required' => false)),
      'is_open'       => new sfValidatorBoolean(array('required' => false)),
      'opened_at'     => new sfValidatorDateTime(array('required' => false)),
      'opened_by'     => new sfValidatorInteger(array('required' => false)),
      'resolved_at'   => new sfValidatorDateTime(array('required' => false)),
      'resolved_by'   => new sfValidatorInteger(array('required' => false)),
      'closed_at'     => new sfValidatorDateTime(array('required' => false)),
      'closed_by'     => new sfValidatorInteger(array('required' => false)),
      'status_id'     => new sfValidatorInteger(array('required' => false)),
      'category_id'   => new sfValidatorInteger(array('required' => false)),
      'priority_id'   => new sfValidatorInteger(array('required' => false)),
      'milestone_id'  => new sfValidatorInteger(array('required' => false)),
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