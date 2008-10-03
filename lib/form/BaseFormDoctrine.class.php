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
   * Updates the values of the object with the cleaned up values.
   *
   * @return BaseObject The current updated object
   */
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
