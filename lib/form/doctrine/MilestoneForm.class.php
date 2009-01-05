<?php

/**
 * Milestone form.
 *
 * @package    form
 * @subpackage Milestone
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class MilestoneForm extends BaseMilestoneForm
{
  public function configure()
  {
    $this->widgetSchema['project_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['date'] = new sfWidgetFormJQueryDate();
  }

  public function getJavascripts()
  {
    return array('ui/ui.core.js', 'ui/ui.datepicker.js');
  }

  public function getStylesheets()
  {
    return array('jquery-ui-south.css' => 'all');
  }
}
