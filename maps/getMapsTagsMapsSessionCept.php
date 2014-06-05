<?php
$I = new MapsGuy($scenario);
$I->wantTo('test GET request against the /maps/tags/:tag/maps end-points with apikey and session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);	
$I->seeResponseIsJson();
$session = $I->getSession();

//tests for /maps/tags(/:tag)

$I->sendGet('/maps/tags/distributor/maps/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/distributor/maps/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4974,4947));

//check to make sure the map_ids parameter is being ignored.
$I->sendGet('/maps/tags/distributor/maps/', array('map_ids' => '4974,4947,1810', 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/distributor/maps/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4974,4947));

$I->sendGet('/maps/tags/distributor/maps/', array('count' => true, 'map_ids' => '4974,4947,1810', 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/distributor/maps/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => 2));

$I->sendGet('/maps/tags/distributor/maps/', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/distributor/maps/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => 2));

$I->sendGet('/maps/tags/notatag/maps/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/notatag/maps/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Tag not found."));

$I->sendGet('/maps/tags/notatag/maps/', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/notatag/maps/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Tag not found."));

$I->sendGet('/maps/tags/notatag/maps/', array('map_ids' => '4974,4947,1810', 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/notatag/maps/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Tag not found."));

$I->sendGet('/maps/tags/notatag/maps/', array('map_ids' => '4974,4947,1810', 'count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/notatag/maps/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Tag not found."));