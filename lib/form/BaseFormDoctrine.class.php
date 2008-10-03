<?php

/**
 * Project form base class.
 *
 * @package    form
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  /**
   * array of related forms that can be embedded with this one
   */
  public $embeddedForms = array();

  public function setup()
  {
    sfWidgetFormSchema::setDefaultFormFormatterName('div');
  }

  public function __construct($object = null, $options = array(), $CSRFSecret = null)
  {
    parent::__construct($object, $options, $CSRFSecret);

    foreach ($this->embeddedForms as $key => $options)
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

  public function bind(array $taintedValues = null, array $taintedFiles = null)
  {
    foreach ($this->embeddedForms as $key => $options)
    {
      if (array_key_exists($key, $taintedValues) && count($taintedValues[$key]) > 0)
      {
        $this->embedFormForEach($key, new $options['form'], count($taintedValues[$key]));
      }
      else
      {
        unset($this[$key]);
      }
    }

    parent::bind($taintedValues, $taintedFiles);
  }

  public function updateObject()
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    $values = $this->getValues();

    // remove special columns that are updated automatically
    unset($values['id'], $values['updated_at'], $values['updated_on'], $values['created_at'], $values['created_on']);

    // Move translations to the Translation key so that it will work with Doctrine_Record::fromArray()
    foreach ($this->cultures as $culture)
    {
      $translation = $values[$culture];
      $translation['lang'] = $culture;
      unset($translation['id']);
      $values['Translation'][$culture] = $translation;
      unset($values[$culture]);
    }
    $this->object->synchronizeWithArray($values);

    return $this->object;
  }
}
