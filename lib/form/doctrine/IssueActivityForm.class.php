<?php

/**
 * IssueActivity form.
 *
 * @package    form
 * @subpackage IssueActivity
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class IssueActivityForm extends BaseIssueActivityForm
{
  public function configure()
  {
    $this->widgetSchema['body']->setAttributes(array(
      'cols' => '50',
      'rows' => '8',
    ));

    $this->widgetSchema->setLabels(array(
      'body' => 'Notes',
    ));

    unset($this['created_at'], $this['created_by']);
    unset($this['verb'], $this['changes']);
  }
}
