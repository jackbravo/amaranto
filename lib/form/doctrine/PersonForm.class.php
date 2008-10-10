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

    $this->widgetSchema['company'] = new sfWidgetFormInput();
    $this->validatorSchema['company'] = new sfValidatorString(array(
      'max_length' => 255,
      'required' => false,
    ));

    $this->setDefault('company', $this->object->Company->name);

    // this field is required to avoid deleting the Company
    // record with the synchronizeWithArray method
    $this->widgetSchema['Company'] = new sfWidgetFormInputHidden();
    $this->validatorSchema['Company'] = new sfValidatorString(array(
      'required' => false,
    ));

    unset($this['created_at'], $this['updated_at'], $this['type']);
    unset($this['parent_id']);
  }

  public function updateCompany()
  {
    $company_name = $this->getValue('company');
    if ($company_name != $this->object->Company->name)
    {
      $this->object->Company = Doctrine::getTable('Company')
        ->getOrCreate($company_name);
    }
  }

  public function updateObject()
  {
    $object = parent::updateObject();

    $this->updateCompany();

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
