<?php
$I = new MapsGuy($scenario);
$I->wantTo('test get request against the /maps/:map_id/settings end-point with apikey & session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);	
$I->seeResponseIsJson();
$session = $I->getSession();

//test with map_id
$I->sendGet('/maps/1810/settings/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1810/settings/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('maps_settings' => array()));

//test with map subdomain
$I->sendGet('/maps/violenciasexualnobrasil/settings/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/violenciasexualnobrasil/settings/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('maps_settings' => array()));

//test count with map_id
$I->sendGet('/maps/1810/settings/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/1810/settings/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test count with map subdomain
$I->sendGet('/maps/violenciasexualnobrasil/settings/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/violenciasexualnobrasil/settings/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test with map_id
$I->sendGet('/maps/27/settings/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/27/settings/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkSettingsObjs($resp, array(20,1506));

//test with map subdomain
$I->sendGet('/maps/sweetmaps/settings/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/sweetmaps/settings/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkSettingsObjs($resp, array(20,1506));

//test count with map_id
$I->sendGet('/maps/27/settings/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/27/settings/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 2));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test count with map subdomain
$I->sendGet('/maps/sweetmaps/settings/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/sweetmaps/settings/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 2));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test individual settings
$I->sendGet('/maps/sweetmaps/settings/baselayer/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/sweetmaps/settings/baselayer/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkSettingsObjs($resp, array(20));

$I->sendGet('/maps/sweetmaps/settings/sponsorshipHTML/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/sweetmaps/settings/sponsorshipHTML/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkSettingsObjs($resp, array(1506));

$I->sendGet('/maps/sweetmaps/settings/null/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/sweetmaps/settings/null/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('maps_settings' => array()));

//test count with map_id that doesn't exist
$I->sendGet('/maps/10101001/settings/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/10101001/settings/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps_settings' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test with map subdomain that doesn't exist
$I->sendGet('/maps/thismadoesntexist/settings/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/thismadoesntexist/settings/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps_settings' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test count with map_id that doesn't exist
$I->sendGet('/maps/10101001/settings/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/10101001/settings/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test count with map subdomain that doesn't exist
$I->sendGet('/maps/thismadoesntexist/settings/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/thismadoesntexist/settings/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));