<?php
$I = new MapsGuy($scenario);
$I->wantTo('test get request against the /maps/:map_id/followers end-point with apikey & session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);	
$I->seeResponseIsJson();
$session = $I->getSession();

//test with map_id
$I->sendGet('/maps/1605/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/followers/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapUserObjs($resp, array(2672, 2728), array(1605, 1605));

//test with map subdomain
$I->sendGet('/maps/comunemessina/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/followers/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapUserObjs($resp, array(2672, 2728), array(1605, 1605));

//test count with map_id
$I->sendGet('/maps/1605/followers/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/followers/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 2));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test count with map subdomain
$I->sendGet('/maps/comunemessina/followers/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/followers/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 2));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test count with map_id that doesn't exist
$I->sendGet('/maps/10101001/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/followers/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('following_maps' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test with map subdomain that doesn't exist
$I->sendGet('/maps/thismadoesntexist/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/followers/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('following_maps' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test count with map_id that doesn't exist
$I->sendGet('/maps/10101001/followers/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/followers/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test count with map subdomain that doesn't exist
$I->sendGet('/maps/thismadoesntexist/followers/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/followers/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));