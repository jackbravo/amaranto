<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EntityTable extends Doctrine_Table
{
  public function findForList()
  {
    return $this->createQuery('e')
      ->leftJoin('e.Company c')
      ->leftJoin('e.Phonenumbers phones')
      ->leftJoin('e.Emails emails')
      ->execute();
  }
}
