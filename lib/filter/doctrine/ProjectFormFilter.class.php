<?php

/**
 * Project filter form.
 *
 * @package    filters
 * @subpackage Project *
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class ProjectFormFilter extends BaseProjectFormFilter
{
  public function configure()
  {
    $this->widgetSchema['owner_id']->setOption('add_empty', 'anybody');
    $this->widgetSchema->setLabels(array(
      'owner_id' => 'Owned by',
    ));
  }
}
