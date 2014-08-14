<?php
$I = new UserGuy($scenario);
$I->wantTo('test DELETE request against the /user/:user_id/followers end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test request to stop following user
$I->sendDelete('/users/2/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/2/followers/', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test request to stop following random user
$I->sendDelete('/users/4/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/4/followers/', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

// test users followed by user
$I->sendGet('/users/zackhalloran/follows/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/zackhalloran/follows/', 'GET')));
$I->seeResponseIsJson();
$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(2,3));

