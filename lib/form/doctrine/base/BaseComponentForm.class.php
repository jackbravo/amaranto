<?php

/**
 * Component form base class.
 *
 * @package    form
 * @subpackage component
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseComponentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInput(),
      'project_id' => new sfWidgetFormDoctrineSelect(array('model' => 'Project', 'add_empty' => false)),
      'owner_id'   => new sfWidgetFormDoctrineSelect(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => 'Component', 'column' => 'id', 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 64, 'required' => false)),
      'project_id' => new sfValidatorDoctrineChoice(array('model' => 'Project')),
      'owner_id'   => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('component[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Component';
  }

}