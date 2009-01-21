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
      'project_id' => 'Project',
      'category_id' => 'Category',
    ));
    $this->widgetSchema['assigned_to']->setOption('add_empty', 'anybody');
  }
}
