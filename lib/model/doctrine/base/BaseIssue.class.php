<?php

/**
 * BaseIssue
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property integer $project_id
 * @property integer $component_id
 * @property integer $milestone_id
 * @property integer $assigned_to
 * @property boolean $is_closed
 * @property boolean $is_resolved
 * @property timestamp $opened_at
 * @property integer $opened_by
 * @property timestamp $resolved_at
 * @property integer $resolved_by
 * @property timestamp $closed_at
 * @property integer $closed_by
 * @property integer $status_id
 * @property integer $category_id
 * @property integer $priority_id
 * @property float $orig_estimate
 * @property float $curr_estimate
 * @property float $elapsed
 * @property timestamp $deadline
 * @property Project $Project
 * @property Component $Component
 * @property sfGuardUser $AssignedTo
 * @property sfGuardUser $OpenedBy
 * @property sfGuardUser $ResolvedBy
 * @property sfGuardUser $ClosedBy
 * @property Status $Status
 * @property Category $Category
 * @property Priority $Priority
 * @property Milestone $Milestone
 * @property Doctrine_Collection $Activities
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 5441 2009-01-30 22:58:43Z jwage $
 */
abstract class BaseIssue extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('issue');
        $this->hasColumn('id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'autoincrement' => true, 'length' => '4'));
        $this->hasColumn('title', 'string', 128, array('type' => 'string', 'length' => '128'));
        $this->hasColumn('project_id', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('component_id', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('milestone_id', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('assigned_to', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('is_closed', 'boolean', null, array('type' => 'boolean', 'default' => false, 'notnull' => true));
        $this->hasColumn('is_resolved', 'boolean', null, array('type' => 'boolean', 'default' => false, 'notnull' => true));
        $this->hasColumn('opened_at', 'timestamp', null, array('type' => 'timestamp'));
        $this->hasColumn('opened_by', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('resolved_at', 'timestamp', null, array('type' => 'timestamp'));
        $this->hasColumn('resolved_by', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('closed_at', 'timestamp', null, array('type' => 'timestamp'));
        $this->hasColumn('closed_by', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('status_id', 'integer', 4, array('type' => 'integer', 'notnull' => true, 'default' => '1', 'length' => '4'));
        $this->hasColumn('category_id', 'integer', 4, array('type' => 'integer', 'notnull' => true, 'default' => '1', 'length' => '4'));
        $this->hasColumn('priority_id', 'integer', 4, array('type' => 'integer', 'notnull' => true, 'default' => '4', 'length' => '4'));
        $this->hasColumn('orig_estimate', 'float', null, array('type' => 'float'));
        $this->hasColumn('curr_estimate', 'float', null, array('type' => 'float'));
        $this->hasColumn('elapsed', 'float', null, array('type' => 'float'));
        $this->hasColumn('deadline', 'timestamp', null, array('type' => 'timestamp'));
    }

    public function setUp()
    {
        $this->hasOne('Project', array('local' => 'project_id',
                                       'foreign' => 'id'));

        $this->hasOne('Component', array('local' => 'component_id',
                                         'foreign' => 'id'));

        $this->hasOne('sfGuardUser as AssignedTo', array('local' => 'assigned_to',
                                                         'foreign' => 'id',
                                                         'onDelete' => 'SET NULL'));

        $this->hasOne('sfGuardUser as OpenedBy', array('local' => 'opened_by',
                                                       'foreign' => 'id'));

        $this->hasOne('sfGuardUser as ResolvedBy', array('local' => 'resolved_by',
                                                         'foreign' => 'id'));

        $this->hasOne('sfGuardUser as ClosedBy', array('local' => 'closed_by',
                                                       'foreign' => 'id'));

        $this->hasOne('Status', array('local' => 'status_id',
                                      'foreign' => 'id'));

        $this->hasOne('Category', array('local' => 'category_id',
                                        'foreign' => 'id'));

        $this->hasOne('Priority', array('local' => 'priority_id',
                                        'foreign' => 'id'));

        $this->hasOne('Milestone', array('local' => 'milestone_id',
                                         'foreign' => 'id'));

        $this->hasMany('IssueActivity as Activities', array('local' => 'id',
                                                            'foreign' => 'issue_id'));
    }
}