<?php

/**
 * Component form.
 *
 * @package    form
 * @subpackage Component
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class ComponentForm extends BaseComponentForm
{
  public function configure()
  {
    $this->widgetSchema->setLabel('owner_id', 'Owner');
    $this->widgetSchema['project_id'] = new sfWidgetFormInputHidden();
  }
}
