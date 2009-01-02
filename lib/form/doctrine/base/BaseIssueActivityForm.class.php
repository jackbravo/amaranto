<?php

/**
 * IssueActivity form base class.
 *
 * @package    form
 * @subpackage issue_activity
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseIssueActivityForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'issue_id'   => new sfWidgetFormDoctrineSelect(array('model' => 'Issue', 'add_empty' => true)),
      'verb'       => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
      'created_by' => new sfWidgetFormInput(),
      'body'       => new sfWidgetFormTextarea(),
      'changes'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => 'IssueActivity', 'column' => 'id', 'required' => false)),
      'issue_id'   => new sfValidatorDoctrineChoice(array('model' => 'Issue', 'required' => false)),
      'verb'       => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'created_by' => new sfValidatorInteger(array('required' => false)),
      'body'       => new sfValidatorString(array('max_length' => 2147483647, 'required' => false)),
      'changes'    => new sfValidatorString(array('max_length' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('issue_activity[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'IssueActivity';
  }

}