<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new CrmTestFunctional(new sfBrowser());

$browser->signin()->
  get('/contacts/index')->

  with('request')->begin()->
    isParameter('module', 'contacts')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->
  end()->

  signout()
;
