<?php
$I = new MapsGuy($scenario);
$I->wantTo('test get request against the /maps end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->sendGet('/maps/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4985,4984,4983,4982,4981,4980,4979,4978,4977,4976,4975,4974,4973,4972,4971,4970,4969,4968,4967,4966));

$I->sendGet('/maps/4981/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/4981/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4981));

$I->sendGet('/maps/4967/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/4967/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4967));

$I->sendGet('/maps/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/', 'GET'), 'map_ids' => "4980,4979,4978,4977,4976,4975"));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4980,4979,4978,4977,4976,4975));

$I->sendGet('/maps/4985/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/4985/', 'GET'), 'map_ids' => "4980,4979,4978,4977,4976,4975"));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('error' => 'Map not found.'));
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));

$I->sendGet('/maps/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/', 'GET'), 'count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => 4974));

$I->sendGet('/maps/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/', 'GET'), 'count' => TRUE, 'map_ids' => "4980,4979,4978,4977,4976,4975"));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => 6));

//test with map_id that doesn't exist
$I->sendGet('/maps/10101001/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/10101001/', 'GET')));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('error' => 'Map not found.'));
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));

//test with map subdomain that doesn't exist
$I->sendGet('/maps/thismadoesntexist/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/thismadoesntexist/', 'GET')));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('error' => 'Map not found.'));
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));