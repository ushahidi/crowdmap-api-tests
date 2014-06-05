<?php
$I = new LocationsGuy($scenario);
$I->wantTo('test gets against the locations end-point');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* unauthenticated tests */
$I->sendGet('/locations/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60070,7152,5692,5239,5238,5236,5235,5234,5233,5232,5231,5230,5229,5228,5227,5226,5225,5224,5220,5219));

$I->sendGet('/locations/5226/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(5226));

$I->sendGet('/locations/5230/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(5230));

$I->sendGet('/locations/5231/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(5231));

/* authenticated tests: apikey only */
$I->sendGet('/locations/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60070,7152,5692,5239,5238,5236,5235,5234,5233,5232,5231,5230,5229,5228,5227,5226,5225,5224,5220,5219));

$I->sendGet('/locations/5226/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/5226/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(5226));

$I->sendGet('/locations/5230/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/5230/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(5230));

$I->sendGet('/locations/5231/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/5231/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(5231));

/* authenticated tests: apikey and session */
$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);	
$I->seeResponseIsJson();
$session = $I->getSession();

$I->sendGet('/locations/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/', 'GET'), 'session' => (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60070,7152,5692,5239,5238,5236,5235,5234,5233,5232,5231,5230,5229,5228,5227,5226,5225,5224,5220,5219));

$I->sendGet('/locations/5226/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/5226/', 'GET'), 'session' => (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(5226));

$I->sendGet('/locations/5230/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/5230/', 'GET'), 'session' => (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(5230));

$I->sendGet('/locations/5231/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/5231/', 'GET'), 'session' => (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(5231));