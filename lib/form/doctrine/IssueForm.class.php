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
    $this->widgetSchema['assigned_to']->setOption('add_empty', 'Default Contact');
    $this->widgetSchema['component_id'] = new axaiWidgetFormJQuerySelect(array(
      'model' => 'Component',
      'add_empty' => true,
      'query' => Doctrine::getTable('Component')
        ->findByProjectQuery($this->getObject()->get('project_id')),
      'parent' => 'issue[project_id]',
      'url' => sfContext::getInstance()->getRouting()
        ->generate('components_ajaxList'),
    ));
    $this->widgetSchema['milestone_id'] = new axaiWidgetFormJQuerySelect(array(
      'model' => 'Milestone',
      'add_empty' => true,
      'query' => Doctrine::getTable('Milestone')
        ->findByProjectQuery($this->getObject()->get('project_id')),
      'parent' => 'issue[project_id]',
      'url' => sfContext::getInstance()->getRouting()
        ->generate('milestones_ajaxList'),
    ));

    $this->widgetSchema->setHelps(array(
      'title' => 'Set a one line description of the problem',
    ));

    $this->widgetSchema['body'] = new sfWidgetFormTextarea(array(), array(
      'cols' => '50', 'rows' => '8',
    ));
    $this->validatorSchema['body'] = new sfValidatorString(array(
      'max_length' => 2147483647, 'required' => false,
    ));

    $this->widgetSchema->setLabels(array(
      'project_id' => 'Project',
      'component_id' => 'Component',
      'status_id' => 'Status',
      'category_id' => 'Category',
      'priority_id' => 'Priority',
      'milestone_id' => 'Milestone',
      'curr_estimate' => 'Estimate',
      'body' => 'Notes',
    ));

    unset($this['opened_at'], $this['opened_by']);
    unset($this['resolved_at'], $this['resolved_by'], $this['is_resolved']);
    unset($this['closed_at'], $this['closed_by'], $this['is_closed']);
    unset($this['orig_estimate']);
  }

  public function updateObject($values = null)
  {
    $this->getObject()->takeSnapshot();
    $issue = parent::updateObject($values);
    $this->getObject()->addActivityNote($this->getValue('body'));

    return $issue;
  }
}
