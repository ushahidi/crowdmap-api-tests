<?php
$I = new MapsGuy($scenario);
$I->wantTo('test PUT request against the /maps/:map_id/owner end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test with map_id
$I->sendPut('/maps/1810/owner/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1810/owner/', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test with map subdomain
$I->sendPut('/maps/violenciasexualnobrasil/owner/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/violenciasexualnobrasil/owner/', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test with map_id that doesn't exist
$I->sendPut('/maps/10101001/owner/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/10101001/owner/', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test with map subdomain that doesn't exist
$I->sendPut('/maps/thismadoesntexist/owner/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/thismadoesntexist/owner/', 'PUT')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
