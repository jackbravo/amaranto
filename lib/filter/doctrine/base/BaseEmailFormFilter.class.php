<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Email filter form base class.
 *
 * @package    filters
 * @subpackage Email *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseEmailFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'entity_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Entity', 'add_empty' => true)),
      'email'     => new sfWidgetFormFilterInput(),
      'type'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'entity_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Entity', 'column' => 'id')),
      'email'     => new sfValidatorPass(array('required' => false)),
      'type'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('email_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Email';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'entity_id' => 'ForeignKey',
      'email'     => 'Text',
      'type'      => 'Number',
    );
  }
}