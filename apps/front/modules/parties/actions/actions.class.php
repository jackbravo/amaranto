<?php

/**
 * parties actions.
 *
 * @package    cms
 * @subpackage parties
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class partiesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex($request)
  {
    $this->show = $request->getParameter('show', 'people');
    $table = $this->getShowTable($this->show);

    $this->pager = new sfDoctrinePager($table,
      sfConfig::get('app_max_entities_on_parties')
    );
    $this->pager->setQuery(Doctrine::getTable($table)->getListQuery());
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeAjaxList(sfWebRequest $request)
  {
    $this->show = $request->getParameter('show', 'all');
    $table = $this->getShowTable($this->show);

    $this->getResponse()->setContentType('application/json');

    $entities = Doctrine::getTable($table)->findForAjax(
      $request->getParameter('q'),
      $request->getParameter('limit')
    );

    return $this->renderText( json_encode($entities) );
  }

  protected function getShowTable($show)
  {
    if ($show == 'companies')
    {
      return 'Company';
    }
    else if ($show == 'people')
    {
      return 'Person';
    }
    else
    {
      return 'Entity';
    }
  }
}
