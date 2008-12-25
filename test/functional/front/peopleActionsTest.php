<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$b = new CrmTestFunctional(new sfBrowser());
$b->loadData();
$databaseManager = new sfDatabaseManager($configuration);

$b->
  get('/parties/index')->

  with('request')->begin()->
    isParameter('module', 'parties')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->
  end()
;

// test edit page
$b->info('test edit page')
  ->get('/people/new')
  ->with('response')->isStatusCode()
  ->with('request')->begin()
    ->isParameter('module', 'people')
    ->isParameter('action', 'new')
    ->isParameter('id', false)
  ->end()
;

// test insert Entities
$test_person = array('person' => array(
  'name' => 'Joaquin Bravo',
  'Emails' => array(
    array('email' => 'jackbravo@gmail.com', 'type' => 1),
  ),
));
$b->info('test insert person')
  ->click('Save', $test_person)
  ->with('form')->begin()
    ->hasErrors(false)
  ->end()
  ->isRedirected()
  ->followRedirect()
  ->with('response')->begin()
    ->checkElement('body', '/Joaquin Bravo/')
    ->checkElement('body', '/jackbravo@gmail.com/')
  ->end()
  ->test()->like($b->getRequest()->getParameter('id'), '/\d+/', 'Id is number')
;
// TODO: test for number of Phones, Locations and Emails created

$new_person_id = $b->getRequest()->getParameter('id');

// test validation
$test_person['person']['name'] = '';
$test_person['id'] = $new_person_id;
$b->info('test basic validation and form refill')
  ->get('/people/' . $new_person_id . '/edit')
  ->click('Save', $test_person)
  ->with('form')->begin()
    ->hasErrors(1)
    ->isError('name', 1)
  ->end()
  ->with('response')->begin()
    ->checkElement('form input[name="person[name]"][value=""]', true)
    ->checkElement('form #emails input[value="jackbravo@gmail.com"]', true)
  ->end()
;

// test new company creation
$company_name = uniqid('company_');
$company_count_0 = Doctrine::getTable('Company')->createQuery()->count();
$test_person = array('person' => array(
  'name' => 'Freddy Mercury',
  'company' => $company_name,
));
$b->info('test new company creation on create person')
  ->get('/people/new')
  ->click('Save', $test_person)
  ->with('form')->begin()
    ->hasErrors(false)
  ->end()
  ->isRedirected()
  ->followRedirect()
  ->with('response')->begin()
    ->checkElement('body', "/$company_name/")
  ->end()
;
$company_count_1 = Doctrine::getTable('Company')->createQuery()->count();
$b->test()->is($company_count_1, $company_count_0 + 1, 'There is one new company');

// test company search on new person
$test_person = array('person' => array(
  'name' => 'Jim Morrison',
  'company' => $company_name,
));
$b->info('test company search on create person')
  ->get('/people/new')
  ->click('Save', $test_person)
  ->with('form')->begin()
    ->hasErrors(false)
  ->end()
  ->isRedirected()
  ->followRedirect()
  ->with('response')->begin()
    ->checkElement('body', "/$company_name/")
  ->end()
;
$company_count_2 = Doctrine::getTable('Company')->createQuery()->count();
$b->test()->is($company_count_1, $company_count_2, 'There is NO new company');

// TODO: missing testing for succesful deletion
$b->info('test delete person')
  ->get('/people/' . $new_person_id . '/edit')
  ->click('Delete', array(), array('method' => 'delete'))
  ->isRedirected()
  ->followRedirect()
  ->with('response')->checkElement('body', '!/Joaquin Bravo/')
;
