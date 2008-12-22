<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Phonenumber filter form base class.
 *
 * @package    filters
 * @subpackage Phonenumber *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BasePhonenumberFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'entity_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Entity', 'add_empty' => true)),
      'number'    => new sfWidgetFormFilterInput(),
      'type'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'entity_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Entity', 'column' => 'id')),
      'number'    => new sfValidatorPass(array('required' => false)),
      'type'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('phonenumber_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Phonenumber';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'entity_id' => 'ForeignKey',
      'number'    => 'Text',
      'type'      => 'Number',
    );
  }
}