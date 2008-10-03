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
  public function __construct($object = null, $options = array(), $CSRFSecret = null)
  {
    parent::__construct($object, $options, $CSRFSecret);

    // embed for each email
    if (is_null($object) || $object->Emails->count() < 1)
    {
      $this->embedFormForEach('Emails', new EmailForm(), 1);
    }
    else
    {
      $this->embedFormForEach('Emails', new EmailForm(), $object->Emails->count());
      $this->setDefault('Emails', $object->Emails);
    } 
  }

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

    if ($object['code'] == '') $object['code'] = null;

    return $object;
  }
}
