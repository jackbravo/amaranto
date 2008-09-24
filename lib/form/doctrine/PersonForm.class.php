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
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['type']);
  }
}
