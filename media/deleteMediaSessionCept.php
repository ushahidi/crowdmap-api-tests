<?php
$I = new MediaGuy($scenario);
$I->wantTo('test DELETE request against the /media/:media_id end-point with apikey & session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);	
$I->seeResponseIsJson();
$session = $I->getSession();

$I->sendDelete('/media/1434/', array('apikey'=> (string) $I->api_key_for_crowdmap('/media/1434/', 'DELETE'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('message' => 'Media removed.'));

//let's change this so we clean up the route parameters
$I->sendDelete('/media/1434 /', array('apikey'=> (string) $I->api_key_for_crowdmap('/media/1434 /', 'DELETE'), 'session'=> (string) $session));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'User does not own this or media does not exist.'));	

$I->sendDelete('/media/notanid/', array('apikey'=> (string) $I->api_key_for_crowdmap('/media/notanid/', 'DELETE'), 'session'=> (string) $session));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'User does not own this or media does not exist.'));