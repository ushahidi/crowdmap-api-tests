<?php
$I = new UserGuy($scenario);
$I->wantTo('test get request against the /user/:user_id/maps/associated end-point with apikey & session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->sendGet('/users/5461/maps/associated/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/5461/maps/associated/', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4151,4460,4462,4649));

$I->sendGet('/users/6d61eba3db34392a5d0519652491003aedc3308c110b73562989c7fb09bf62af84b9a20efae0e17d72f9aac592ab0be254ea4e77d14ec621d8755e05f25fc1ad/maps/associated/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/6d61eba3db34392a5d0519652491003aedc3308c110b73562989c7fb09bf62af84b9a20efae0e17d72f9aac592ab0be254ea4e77d14ec621d8755e05f25fc1ad/maps/associated/', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4151,4460,4462,4649));

$I->sendGet('/users/johnlevermore/maps/associated/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/johnlevermore/maps/associated/', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4151,4460,4462,4649));

$I->sendGet('/users/2015/maps/associated/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/johnlevermore/maps/associated/', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test bad user_id
$I->sendGet('/users/100000/maps/associated/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/johnlevermore/maps/associated/', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
