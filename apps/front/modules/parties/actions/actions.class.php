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

    if ($this->show == 'companies')
    {
      $this->personList = Doctrine::getTable('Company')->findForList();
    }
    else
    {
      $this->personList = Doctrine::getTable('Person')->findForList();
    }
  }
}
