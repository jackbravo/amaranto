<?php

/**
 * BaseStatus
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property boolean $is_resolved
 * @property Doctrine_Collection $Issues
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 5441 2009-01-30 22:58:43Z jwage $
 */
abstract class BaseStatus extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('status');
        $this->hasColumn('id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'autoincrement' => true, 'length' => '4'));
        $this->hasColumn('name', 'string', 64, array('type' => 'string', 'length' => '64'));
        $this->hasColumn('is_resolved', 'boolean', null, array('type' => 'boolean'));
    }

    public function setUp()
    {
        $this->hasMany('Issue as Issues', array('local' => 'id',
                                                'foreign' => 'status_id'));
    }
}