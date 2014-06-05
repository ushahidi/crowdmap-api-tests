<?php
$I = new LocationsGuy($scenario);
$I->wantTo('test posts against the locations end-point with apikey & session for authentication');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);	
$I->seeResponseIsJson();
$session = $I->getSession();

//test unauthenticated posts against the locations end-point
$I->sendPost('/locations/');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();

//test an authenticated request with none of the expected paramaters. should return a 400 Bad Request with an explanation
//this currently throws a 500 because locations::postLocation() returns false if the required variables aren't passed, which causes output::render to fail hard.
$I->sendPost('/locations/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/', 'POST'), 'session' => (string) $session));
/* $I->seeResponseCodeIs(400); */
$I->seeResponseIsJson();


//test an authenticated request with just the fsq_venue_id. The fsq_venue_id is not already in use.
$I->sendPost('/locations/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/', 'POST'), 'session' => (string) $session, 'fsq_venue_id' => 1));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60071));

$I->sendGET('/locations/60071/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/60071/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60071));

//test authenticated request with just the fsq_venue_id. The fsq_venue_id is already in use. Should return an existing location.
$I->sendPost('/locations/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/', 'POST'), 'session' => (string) $session, 'fsq_venue_id' => 1));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60071));

$I->sendGET('/locations/60071/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/60071/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60071));

//test an authenticated request with just a lon & lat. The lon & lat is not already in use.
$I->sendPost('/locations/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/', 'POST'), 'session' => (string) $session, 'lat' => 37.774929, 'lon' => -122.419416));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60072));

$I->sendGET('/locations/60072/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/60072/', 'GET'), 'session' => (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60072));

//test an authenticated request with just a lon & lat. The lon & lat is already in use. Should return an existing location.
$I->sendPost('/locations/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/', 'POST'), 'session' => (string) $session, 'lat' => 37.774929, 'lon' => -122.419416));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60072));

$I->sendGET('/locations/60072/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/60072/', 'GET'), 'session' => (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60072));

//test an authenticated request with just geometry. The lon & lat is not already in use. Should return a new location.
$I->sendPost('/locations/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/', 'POST'), 'session' => (string) $session, 'geometry' => '{"type": "Point","coordinates": [36.790853,-1.299041]}'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60073));

$I->sendGET('/locations/60073/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/60073/', 'GET'), 'session' => (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60073));

//test an authenticated request with just geometry. The lon & lat is already in use. Should return an existing location.
$I->sendPost('/locations/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/', 'POST'), 'session' => (string) $session, 'geometry' => '{"type": "Point","coordinates": [36.790853,-1.299041]}'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60073));

$I->sendGET('/locations/60073/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/60073/', 'GET'), 'session' => (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60073));

//test an authenticated request with a lon & lat. The lon & lat is already in use with a different name and a fsq_venue_id. Should return a new location.
$I->sendPost('/locations/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/', 'POST'), 'session' => (string) $session, 'lat' => 37.446754547281, 'lon' => -77.572746276855, 'name' => 'new test'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60074));

$I->sendGET('/locations/60074/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/60074/', 'GET'), 'session' => (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60074));

//test an authenticated request with a lon & lat. The lon & lat and name is already in use with a different region. Should return an old location without the region.
$I->sendPost('/locations/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/', 'POST'), 'session' => (string) $session, 'lat' => 37.446754547281, 'lon' => -77.572746276855, 'name' => 'new test', 'region' => 'test region'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60074));

$I->sendGET('/locations/60074/', array('apikey'=> (string) $I->api_key_for_crowdmap('/locations/60074/', 'GET'), 'session' => (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkLocationObjs($resp, array(60074));