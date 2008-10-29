<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/base/BaseFormFilterDoctrine.class.php');

/**
 * Location filter form base class.
 *
 * @package    filters
 * @subpackage Location *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseLocationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormFilterInput(),
      'entity_id'   => new sfWidgetFormDoctrineChoice(array('model' => 'Entity', 'add_empty' => true)),
      'type'        => new sfWidgetFormFilterInput(),
      'street'      => new sfWidgetFormFilterInput(),
      'city'        => new sfWidgetFormFilterInput(),
      'state'       => new sfWidgetFormFilterInput(),
      'country'     => new sfWidgetFormFilterInput(),
      'postal_code' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Location', 'column' => 'id')),
      'entity_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Entity', 'column' => 'id')),
      'type'        => new sfValidatorInteger(array('required' => false)),
      'street'      => new sfValidatorPass(array('required' => false)),
      'city'        => new sfValidatorPass(array('required' => false)),
      'state'       => new sfValidatorPass(array('required' => false)),
      'country'     => new sfValidatorPass(array('required' => false)),
      'postal_code' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('location[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Location';
  }

  public function getFields()
  {
    return array(
      'id'          => 'integer',
      'entity_id'   => 'integer',
      'type'        => 'integer',
      'street'      => 'string',
      'city'        => 'string',
      'state'       => 'string',
      'country'     => 'string',
      'postal_code' => 'string',
    );
  }
}