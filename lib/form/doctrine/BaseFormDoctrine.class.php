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
  public $embeddedFormsDefinition = array();

  public function setup()
  {
    sfWidgetFormSchema::setDefaultFormFormatterName('div');
  }

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
        unset($this[$key]);
      }
    }

    parent::bind($taintedValues, $taintedFiles);
  }

  public function updateObject($values = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (is_null($values))
    {
      $values = $this->values;
    }

    $values = $this->processValues($values);

    $this->object->synchronizeWithArray($values);

    return $this->object;
  }

  public function renderFormTag($url, array $attributes = array(), $attach_identifiers = true)
  {
    if ($this->isNew())
    {
      $attributes['method'] = 'POST';
    }
    else
    {
      if ($attach_identifiers)
      {
        $url .= '?'.$this->getPrimaryKeyUrlParams();
      }
      $attributes['method'] = 'PUT';
    }

    return parent::renderFormTag($url, $attributes);
  }

  public function getPrimaryKeyUrlParams()
  {
    $params = array();
    $identifiers = (array) $this->object->identifier();
    foreach ($identifiers as $fieldName => $value)
    {
      $params[]  = "$fieldName=".$value;
    }

    return implode("&", $params);
  }

  /**
   * we don't need this since we use synchronizeWithArray and Doctrine does the rest
   */
  public function saveEmbeddedForms($con = null)
  {
  }
}
