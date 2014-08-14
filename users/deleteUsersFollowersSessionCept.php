<?php
$I = new UserGuy($scenario);
$I->wantTo('test DELETE request against the /user/:user_id/followers end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$session = $I->getSession();

//test request to stop following user
$I->sendDelete('/users/2/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/2/followers/', 'DELETE')), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

// test request to stop following already unfollowed user
$I->sendDelete('/users/2/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/2/followers/', 'DELETE')), 'session'=> (string) $session));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();

// make sure users still exist
$I->sendGet('/users/2', array('apikey' => (string) $I->api_key_for_crowdmap('/users/2', 'GET'), 'session' => $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

// test request to stop following already unfollowed user
$I->sendDelete('/users/4/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/4/followers/', 'DELETE')), 'session'=> (string) $session));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();

// make sure users still exist
$I->sendGet('/users/4', array('apikey' => (string) $I->api_key_for_crowdmap('/users/4', 'GET'), 'session' => $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

// test request to stop following non-existent user
$I->sendDelete('/users/2011004923923232111/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/2011004923923232111/followers/', 'DELETE')), 'session'=> (string) $session));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();