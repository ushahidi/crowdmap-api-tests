<?php
$I = new MapsGuy($scenario);
$I->wantTo('test DELETE request against the /maps/:map_id/followers end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test deleting follower with map_id
$I->sendDelete('/maps/1605/followers/2672', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1605/followers/2672', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test follower is not deleted with map_id
$I->sendGet('/maps/1605/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1605/followers/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapUserObjs($resp, array(2672, 2728), array(1605, 1605));

//test deleting follower with map/:subdomain
$I->sendDelete('/maps/comunemessina/followers/2672', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/followers/2672', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test follower is not deleted with map/:subdomain
$I->sendGet('/maps/comunemessina/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/followers/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapUserObjs($resp, array(2672, 2728), array(1605, 1605));