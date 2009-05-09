<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * MailQueue filter form base class.
 *
 * @package    filters
 * @subpackage MailQueue *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseMailQueueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'subject'     => new sfWidgetFormFilterInput(),
      'recipients'  => new sfWidgetFormFilterInput(),
      'body'        => new sfWidgetFormFilterInput(),
      'max_attemps' => new sfWidgetFormFilterInput(),
      'attemps'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'subject'     => new sfValidatorPass(array('required' => false)),
      'recipients'  => new sfValidatorPass(array('required' => false)),
      'body'        => new sfValidatorPass(array('required' => false)),
      'max_attemps' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'attemps'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('mail_queue_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MailQueue';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'created_at'  => 'Date',
      'subject'     => 'Text',
      'recipients'  => 'Text',
      'body'        => 'Text',
      'max_attemps' => 'Number',
      'attemps'     => 'Number',
    );
  }
}