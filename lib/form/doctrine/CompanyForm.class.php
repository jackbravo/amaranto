<?php

/**
 * Company form.
 *
 * @package    form
 * @subpackage Company
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class CompanyForm extends EntityForm
{
  public function configure()
  {
    $this->widgetSchema->setNameFormat('company[%s]');

    unset($this['type'], $this['title']);
  }

  /**
   * this function is needed because we inherit from EntityForm
   * instead of BaseCompanyForm
   */
  public function getModelName()
  {
    return 'Company';
  }
}
