<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new CrmTestFunctional(new sfBrowser());

$browser->loadData()->signin()
  ->info('pagination')
  ->get('/contacts')
  ->with('response')->begin()
    ->isStatusCode(200)
    ->checkElement('.contact h2', '/Jack Daniels/', array('position' => 0))
    ->checkElement('.pagination-desc', '!/0/')
  ->end()

  // edit link
  ->info('edit link for people')
  ->click('Jack Daniels')
  ->with('response')->begin()
    ->checkElement('#content h1', '/Jack Daniels/', array('position' => 0))
    ->checkElement('.subheader', '/Edit/')
  ->end()
  ->click('Edit')
  ->with('request')->begin()
    ->isParameter('module', 'people')
    ->isParameter('action', 'edit')
  ->end()
  ->with('response')->isStatusCode(200)

  ->info('edit link for companies')
  ->get('/contacts?show=companies')
  ->click('Axai Inc.')
  ->with('response')->begin()
    ->checkElement('#content h1', '/Axai Inc./', array('position' => 0))
    ->checkElement('.subheader', '/Edit/')
  ->end()
  ->click('Edit')
  ->with('request')->begin()
    ->isParameter('module', 'companies')
    ->isParameter('action', 'edit')
  ->end()
  ->with('response')->isStatusCode(200)
;
