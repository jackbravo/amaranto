<?php

/**
 * Person form.
 *
 * @package    form
 * @subpackage Person
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class PersonForm extends BasePersonForm
{
  public $embeddedForms = array(
    'Emails' => array('form' => 'EmailForm', 'min' => 1),
    'Phonenumbers' => array('form' => 'PhonenumberForm', 'min' => 1),
    'Locations' => array('form' => 'LocationForm', 'min' => 1),
  );

  public function configure()
  {
    $this->widgetSchema['name']->setAttributes(array('size' => '40'));
    $this->widgetSchema->setLabels(array(
      'parent_id' => 'Company',
    ));

    unset($this['created_at'], $this['updated_at'], $this['type']);
  }

  public function updateObject()
  {
    $object = parent::updateObject();

    // clean empty code field
    if ($object['code'] == '') $object['code'] = null;

    // clean empty email and phone fields
    foreach ($object['Emails'] as $key => $email) {
      if ($email['email'] == '')
        unset($object['Emails'][$key]);
    }

    foreach ($object['Phonenumbers'] as $key => $phone) {
      if ($phone['number'] == '')
        unset($object['Phonenumbers'][$key]);
    }

    return $object;
  }
}
