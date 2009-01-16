<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class IssueTable extends Doctrine_Table
{
  public function getForShow($parameters)
  {
    return $this->getShowQuery($parameters)->fetchOne();
  }

  public function getListQuery()
  {
    return $this->createQuery('i')
      ->leftJoin('i.OpenedBy ob')
      ->leftJoin('i.Status s')
      ->leftJoin('i.Priority p')
      ->leftJoin('i.Category c')
      ->addOrderBy('i.status_id')
      ->addOrderBy('i.priority_id')
      ->addOrderBy('i.deadline')
    ;
  }

  public function getShowQuery($parameters)
  {
    return $this->createQuery('i')
      ->leftJoin('i.AssignedTo a')
      ->leftJoin('i.Project p')
      ->leftJoin('i.Component c')
      ->leftJoin('i.Milestone m')
      ->leftJoin('i.Status s')
      ->leftJoin('i.Category cat')
      ->leftJoin('i.Priority pri')
      ->addWhere('i.id = ?', $parameters['id'])
    ;
  }
}
