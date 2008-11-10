<?php

/**
 * Entity form.
 *
 * @package    form
 * @subpackage Entity
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class EntityForm extends BaseEntityForm
{
  public $embeddedFormsDefinition = array(
    'Emails' => array('form' => 'EmailForm', 'min' => 1),
    'Phonenumbers' => array('form' => 'PhonenumberForm', 'min' => 1),
    'Locations' => array('form' => 'LocationForm', 'min' => 1),
  );

  public function setup()
  {
    parent::setup();

    $this->widgetSchema['name']->setAttributes(array('size' => '40'));

    unset($this['created_at'], $this['updated_at'], $this['parent_id']);
  }

  public function configure()
  {
  }
}
