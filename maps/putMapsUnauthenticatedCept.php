<?php
$I = new MapsGuy($scenario);
$I->wantTo('test PUT request against the /maps/:map_id end-point without authentication');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test PUT with maps/:map_id that exists
$I->sendPut('/maps/4981/');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test PUT with maps/:subdomain that exists
$I->sendPut('/maps/tedtalks/');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test PUT with maps/:map_id that exists
$I->sendPut('/maps/4967/');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test PUT with maps/:subdomain that exists
$I->sendPut('/maps/enbiciaviles/');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test with map_id that doesn't exist
$I->sendPut('/maps/10101001/');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test with map subdomain that doesn't exist
$I->sendPut('/maps/thismadoesntexist/');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
