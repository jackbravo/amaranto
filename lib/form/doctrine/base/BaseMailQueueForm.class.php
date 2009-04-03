<?php

/**
 * MailQueue form base class.
 *
 * @package    form
 * @subpackage mail_queue
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseMailQueueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'created_at'  => new sfWidgetFormDateTime(),
      'subject'     => new sfWidgetFormInput(),
      'recipients'  => new sfWidgetFormTextarea(),
      'body'        => new sfWidgetFormTextarea(),
      'max_attemps' => new sfWidgetFormInput(),
      'attemps'     => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => 'MailQueue', 'column' => 'id', 'required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'subject'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'recipients'  => new sfValidatorString(array('max_length' => 2147483647, 'required' => false)),
      'body'        => new sfValidatorString(array('max_length' => 2147483647, 'required' => false)),
      'max_attemps' => new sfValidatorInteger(array('required' => false)),
      'attemps'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mail_queue[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MailQueue';
  }

}
