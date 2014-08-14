<?php
$I = new MapsGuy($scenario);
$I->wantTo('test PUT request against the /maps/:map_id end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test PUT with maps/:map_id that exists
$I->sendPut('/maps/4981/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/4981/', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test PUT with maps/:subdomain that exists
$I->sendPut('/maps/tedtalks/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/tedtalks/', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test PUT with maps/:map_id that exists
$I->sendPut('/maps/4967/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/4967/', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test PUT with maps/:subdomain that exists
$I->sendPut('/maps/enbiciaviles/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/enbiciaviles/', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test with map_id that doesn't exist
$I->sendPut('/maps/10101001/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/10101001/', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test with map subdomain that doesn't exist
$I->sendPut('/maps/thismadoesntexist/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/thismadoesntexist/', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
