<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseStatus extends sfDoctrineRecord
{
  public function setTableDefinition()
  {
    $this->setTableName('status');
    $this->hasColumn('name', 'string', 64, array('type' => 'string', 'length' => '64'));
    $this->hasColumn('category_id', 'integer', 4, array('type' => 'integer', 'length' => '4'));
  }

}