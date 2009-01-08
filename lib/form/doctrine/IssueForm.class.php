<?php

/**
 * Issue form.
 *
 * @package    form
 * @subpackage Issue
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class IssueForm extends BaseIssueForm
{
  public function configure()
  {
    $this->widgetSchema['title']->setAttributes(array(
      'size' => '50', 'class' => 'title',
    ));

    $this->widgetSchema->setHelps(array(
      'title' => 'Set a one line description of the problem',
    ));

    $this->widgetSchema->setLabels(array(
      'project_id' => 'Project',
      'component_id' => 'Component',
      'status_id' => 'Status',
      'category_id' => 'Category',
      'priority_id' => 'Priority',
      'milestone_id' => 'Milestone',
      'curr_estimate' => 'Estimate',
    ));

    $this->embedFormForEach('Activities', new IssueActivityForm(), 1);

    unset($this['opened_at'], $this['opened_by'], $this['is_open']);
    unset($this['resolved_at'], $this['resolved_by']);
    unset($this['closed_at'], $this['closed_by']);
    unset($this['orig_estimate']);
  }
}
