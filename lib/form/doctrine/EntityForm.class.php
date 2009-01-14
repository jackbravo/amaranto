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
  /**
   * array of related forms that can be embedded with this one
   */
  public $embeddedFormsDefinition = array(
    'Emails' => array('form' => 'EmailForm', 'min' => 1),
    'Phonenumbers' => array('form' => 'PhonenumberForm', 'min' => 1),
    'Locations' => array('form' => 'LocationForm', 'min' => 1),
  );

  /**
   * extend the constructor to use another kind of embedded forms
   */
  public function __construct($object = null, $options = array(), $CSRFSecret = null)
  {
    parent::__construct($object, $options, $CSRFSecret);

    foreach ($this->embeddedFormsDefinition as $key => $options)
    {
      if (count($options['min']) > 0 && (is_null($object) || count($object[$key]) < 1))
      {
        $this->embedFormForEach($key, new $options['form'], $options['min']);
      }
      else
      {
        $this->embedFormForEach($key, new $options['form'], count($object[$key]));
        $this->setDefault($key, $object[$key]);
      }
    }
  }

  /**
   * bind our implementation of embedded forms
   */
  public function bind(array $taintedValues = null, array $taintedFiles = null)
  {
    foreach ($this->embeddedFormsDefinition as $key => $options)
    {
      if (array_key_exists($key, $taintedValues) && count($taintedValues[$key]) > 0)
      {
        $this->embedFormForEach($key, new $options['form'], count($taintedValues[$key]));
      }
      else
      {
        $this->embedFormForEach($key, new $options['form'], $options['min']);
      }
    }

    parent::bind($taintedValues, $taintedFiles);
  }

  public function setup()
  {
    parent::setup();

    $this->widgetSchema['name']->setAttributes(array('size' => '40'));
    $this->widgetSchema->setLabel('owner_id', 'Owner');

    unset($this['created_at'], $this['updated_at'], $this['parent_id']);
  }

  public function configure()
  {
  }

  /**
   * we override this to use synchronizeWithArray instead of fromArray
   */
  public function updateObject($values = null)
  {
    if (is_null($values))
    {
      $values = $this->values;
    }

    $values = $this->processValues($values);

    $this->object->synchronizeWithArray($values);

    // clean empty code field
    if ($this->object['code'] == '') $this->object['code'] = null;

    // clean empty email and phone fields
    foreach ($this->object['Emails'] as $key => $email) {
      if ($email['email'] == '')
        unset($this->object['Emails'][$key]);
    }

    foreach ($this->object['Phonenumbers'] as $key => $phone) {
      if ($phone['number'] == '')
        unset($this->object['Phonenumbers'][$key]);
    }

    return $this->object;
  }

  /**
   * we don't need this since we use synchronizeWithArray and Doctrine does the rest
   */
  public function saveEmbeddedForms($con = null, $forms = null)
  {
  }
}
