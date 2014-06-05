<?php
$I = new MapsGuy($scenario);
$I->wantTo('test get request against the /maps/:map_id/owner end-point with apikey & session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);	
$I->seeResponseIsJson();
$session = $I->getSession();

//test with map_id
$I->sendGet('/maps/1810/owner/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1810/owner/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapUserObjs($resp, array(2990), array(1810));

//test with map subdomain
$I->sendGet('/maps/violenciasexualnobrasil/owner/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/violenciasexualnobrasil/owner/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapUserObjs($resp, array(2990), array(1810));

//test with map_id that doesn't exist
$I->sendGet('/maps/10101001/owner/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/10101001/owner/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('error' => 'Map not found.'));
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));

//test with map subdomain that doesn't exist
$I->sendGet('/maps/thismadoesntexist/owner/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/thismadoesntexist/owner/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('error' => 'Map not found.'));
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));