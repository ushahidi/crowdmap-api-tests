<?php
$I = new MediaGuy($scenario);
$I->wantTo('test DELETE request against the /media/:media_id end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->sendDelete('/media/1434/', array('apikey'=> (string) $I->api_key_for_crowdmap('/media/1434/', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'User does not own this or media does not exist.'));

//let's change this so we clean up the route parameters
$I->sendDelete('/media/1434 /', array('apikey'=> (string) $I->api_key_for_crowdmap('/media/1434 /', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

$I->sendDelete('/media/notanid/', array('apikey'=> (string) $I->api_key_for_crowdmap('/media/notanid/', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'User does not own this or media does not exist.'));