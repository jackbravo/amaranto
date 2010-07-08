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

    $this->widgetSchema['client'] = new sfWidgetFormInputText();
    $this->validatorSchema['client'] = new sfValidatorString(array(
      'max_length' => 255,
      'required' => false,
    ));

    $this->widgetSchema->setLabel('owner_id', 'Owner');
    $this->setDefault('client', $this->object->Client->name);

    // this field is required to avoid deleting the Company
    // record with the synchronizeWithArray method
    $this->widgetSchema['Client'] = new sfWidgetFormInputHidden();
    $this->validatorSchema['Client'] = new sfValidatorString(array(
      'required' => false,
    ));

    unset($this['created_at'], $this['updated_at']);
  }

  public function updateClient()
  {
    $client_name = $this->getValue('client');
    if ($client_name != $this->object->Client->name)
    {
      $this->object->Client = Doctrine::getTable('Entity')
        ->getOrCreate($client_name);
    }
  }

  public function updateObject($values = null)
  {
    $object = parent::updateObject(null);

    $this->updateClient();

    return $object;
  }
}
