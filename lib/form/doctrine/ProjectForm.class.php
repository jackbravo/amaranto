<?php

/**
 * Project form.
 *
 * @package    form
 * @subpackage Project
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class ProjectForm extends BaseProjectForm
{
  public function configure()
  {
    $this->widgetSchema['name']->setAttributes(array('size' => '40'));
    $this->widgetSchema['description'] = new sfWidgetFormTextarea();

    $this->widgetSchema['entity'] = new sfWidgetFormInput();
    $this->validatorSchema['entity'] = new sfValidatorString(array(
      'max_length' => 255,
      'required' => false,
    ));

    $this->setDefault('entity', $this->object->Entity->name);

    // this field is required to avoid deleting the Company
    // record with the synchronizeWithArray method
    $this->widgetSchema['Entity'] = new sfWidgetFormInputHidden();
    $this->validatorSchema['Entity'] = new sfValidatorString(array(
      'required' => false,
    ));

    unset($this['created_at'], $this['updated_at']);
  }

  public function updateObject($values = null)
  {
    $object = parent::updateObject(null);

    $this->updateEntity();

    return $object;
  }
}
