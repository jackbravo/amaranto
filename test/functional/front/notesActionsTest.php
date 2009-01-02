<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new CrmTestFunctional(new sfBrowser());

$browser->loadData()->signin()
  ->get('/contacts')
  ->click('Johnnie Walker')
  ->with('response')->begin()
    ->isStatusCode(200)
    ->checkElement('.notes .note', 2)
  ->end()

  ->get('/contacts?show=companies')
  ->click('Axai Inc.')
  ->with('response')->begin()
    ->isStatusCode(200)
    ->checkElement('.notes .note', 1)
  ->end()

  ->get('/projects')
  ->click('Muestra')
  ->with('response')->begin()
    ->isStatusCode(200)
    ->checkElement('.notes .note', 2)
  ->end()
;
