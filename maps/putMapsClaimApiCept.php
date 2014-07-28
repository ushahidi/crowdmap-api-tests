<?php
$I = new MapsGuy($scenario);
$I->wantTo('test PUT request against /maps/:map_id/claim/ end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test PUT with maps/:map_id that exists
$I->sendPut('/maps/4981/claim', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/4981/claim', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test PUT with maps/:subdomain that exists
$I->sendPut('/maps/tedtalks/claim', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/tedtalks/claim', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test PUT with maps/:map_id that exists
$I->sendPut('/maps/4967/claim', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/4967/claim', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test PUT with maps/:subdomain that exists
$I->sendPut('/maps/enbiciaviles/claim', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/enbiciaviles/claim', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test with map_id that doesn't exist
$I->sendPut('/maps/10101001/claim', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/10101001/claim', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test with map subdomain that doesn't exist
$I->sendPut('/maps/thismadoesntexist/claim', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/thismadoesntexist/claim', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
