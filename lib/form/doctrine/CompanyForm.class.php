<?php

/**
 * Company form.
 *
 * @package    form
 * @subpackage Company
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class CompanyForm extends BaseCompanyForm
{
  public $embeddedForms = array(
    'Emails' => array('form' => 'EmailForm', 'min' => 1),
    'Phonenumbers' => array('form' => 'PhonenumberForm', 'min' => 1),
    'Locations' => array('form' => 'LocationForm', 'min' => 1),
  );

  public function configure()
  {
    $this->widgetSchema['name']->setAttributes(array('size' => '40'));

    unset($this['created_at'], $this['updated_at'], $this['type']);
    unset($this['parent_id'], $this['title']);
  }
}
