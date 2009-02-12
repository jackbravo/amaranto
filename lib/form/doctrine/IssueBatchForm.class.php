<?php

/**
 * Issue form.
 *
 * @package    form
 * @subpackage Issue
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class IssueBatchForm extends IssueForm
{
  public function configure()
  {
    parent::configure();

    unset($this['title']);
  }

  public function updateObject($values = null)
  {
    $old_data = $this->getObject()->toArray(true);
    $issue = parent::updateObject($values);

    $activity = $this->embeddedForms['Activity']->getObject();
    $activity->setIssueAndChanges($issue, $old_data);

    return $issue;
  }
}
