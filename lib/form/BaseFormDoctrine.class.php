<?php

/**
 * Project form base class.
 *
 * @package    form
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  public function setup()
  {
    sfWidgetFormSchema::setDefaultFormFormatterName('div');
  }

  /**
   * Renders a form tag suitable for the related Doctrine object.
   *
   * The method is automatically guessed based on the Doctrine object:
   *
   *  * if the object is new, the method is POST
   *  * if the object already exists, the method is PUT
   *
   * @param  string $url         The URL for the action
   * @param  array  $attributes  An array of HTML attributes
   *
   * @return string An HTML representation of the opening form tag
   *
   * @see sfForm
   */
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

  /**
   * Returns PHP code to add to a URL for primary keys.
   *
   * @param string $prefix The prefix value
   *
   * @return string PHP code
   */
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
}
