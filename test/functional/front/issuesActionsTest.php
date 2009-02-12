<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$b = new CrmTestFunctional(new sfBrowser());
$b->loadData();
$b->signin();
$b->setTester('doctrine', 'sfTesterDoctrine');
$t = $b->test();
$issue_table = Doctrine::getTable('Issue');

$databaseManager = new sfDatabaseManager($configuration);

$b->
  get('/issues')->

  with('request')->begin()->
    isParameter('module', 'issues')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('h1', '/Issues List/', array('position' => 1))->
  end()
;

$issue1 = array(
  'title' => 'Test issue 1',
  'assigned_to' => '3',
);
$issue2 = array(
  'title' => 'Test issue 2',
  'assigned_to' => '2',
);

$b->info('create new issue')
  ->click('Create new issue')
  ->click('Save', array('issue' => $issue1))
  ->with('form')->hasErrors(false)
  ->isRedirected()
  ->followRedirect()
  ->with('response')->begin()
    ->checkElement('h1', "/{$issue1['title']}/", array('position' => 1))
    ->checkElement('.issue-activity', "/Opened/")
    ->checkElement('.issue-activity', "/assigned to jack/")
    ->checkElement('.issue-activity', "/by admin/")
  ->end()
  ->with('doctrine')->check('MailQueue', array(
    'subject' => "%{$issue1['title']}%",
    'recipients' => 'jackbravo@gmail.com',
    'body' => '%new issue has been assigned%',
    'attemps' => '0',
  ))

  ->info('test resolving')
  ->click('Edit')
  ->click('Save', array('issue' => array('status_id' => 2)))
  ->with('form')->hasErrors(false)
  ->isRedirected()
  ->followRedirect()
  ->with('response')->begin()
    ->checkElement('h1', "/{$issue1['title']}/", array('position' => 1))
    ->checkElement('body', "/Resolved/", array('position' => 0))
  ->end()
  ->with('doctrine')->check('MailQueue', array(
    'subject' => "%{$issue1['title']}%",
    'recipients' => 'admin@mail.com',
    'body' => '%has been resolved%',
    'attemps' => '0',
  ))
;

