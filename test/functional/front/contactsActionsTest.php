<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new CrmTestFunctional(new sfBrowser());

$browser->loadData()->signin()
  ->get('/contacts')

  ->with('request')->begin()
    ->isParameter('module', 'contacts')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->checkElement('.contact h2', '/Jack Daniels/', array('position' => 0))
    ->checkElement('.pagination-desc', '!/0/')
  ->end()

  // contacts_show
  ->info('check contacts_show')
  ->click('Jack Daniels')
  ->with('request')->begin()
    ->isParameter('module', 'contacts')
    ->isParameter('action', 'show')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->checkElement('#content h1', '/Jack Daniels/', array('position' => 0))
    ->checkElement('.subheader', '/Edit/')
  ->end()

  ->signout()
;
