<?php
$I = new UserGuy($scenario);
$I->wantTo('test get request against the /user/:user_id/maps/owns end-point with apikey & session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$session = $I->getSession();

$I->sendGet('/users/5461/maps/owns/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/5461/maps/owns/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4904,4649,4462,4461,4460,4151,3658));

$I->sendGet('/users/6d61eba3db34392a5d0519652491003aedc3308c110b73562989c7fb09bf62af84b9a20efae0e17d72f9aac592ab0be254ea4e77d14ec621d8755e05f25fc1ad/maps/owns/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/6d61eba3db34392a5d0519652491003aedc3308c110b73562989c7fb09bf62af84b9a20efae0e17d72f9aac592ab0be254ea4e77d14ec621d8755e05f25fc1ad/maps/owns/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4904,4649,4462,4461,4460,4151,3658));

$I->sendGet('/users/johnlevermore/maps/owns/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/johnlevermore/maps/owns/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4904,4649,4462,4461,4460,4151,3658));

$I->sendGet('/users/2015/maps/owns/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/johnlevermore/maps/owns/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test bad user_id
$I->sendGet('/users/100000/maps/owns/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/johnlevermore/maps/owns/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
