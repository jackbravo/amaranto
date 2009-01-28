<?php

/**
 * Issue filter form.
 *
 * @package    filters
 * @subpackage Issue *
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class IssueFormFilter extends BaseIssueFormFilter
{
  public function configure()
  {
    $this->widgetSchema->setDefault('is_closed', false);
    $this->widgetSchema->setLabels(array(
      'is_closed' => ' ',
      'category_id' => ' ',
      'project_id' => 'in',
    ));
    $this->widgetSchema['assigned_to']->setOption('add_empty', 'anybody');
    $this->widgetSchema['category_id']->setOption('add_empty', 'issues (all)');
    $this->widgetSchema['project_id']->setOption('add_empty', 'all projects');
    $this->widgetSchema['is_closed']->setOption('choices',
      array('' => 'all', 0 => 'open', 1 => 'closed'));
  }
}
