<?php
$I = new UserGuy($scenario);
$I->wantTo('test get request against the /user/:user_id/followers end-point with apikey & session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->sendGet('/users/7977/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/7977/followers/', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4981, 4982));

$I->sendGet('/users/9b6f57db48ecc5ae4fab0c5c990143f7a241db380288011523b26c398137bf83773dca2f08b4344363d98e4ed6d31741bbd26eb2da296ad75263e9ba1090fca8/followers/',
  array('apikey'=> (string) $I->api_key_for_crowdmap('/users/9b6f57db48ecc5ae4fab0c5c990143f7a241db380288011523b26c398137bf83773dca2f08b4344363d98e4ed6d31741bbd26eb2da296ad75263e9ba1090fca8/followers/', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4981, 4982));

$I->sendGet('/users/sarahmorden/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/sarahmorden/followers/', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4981, 4982));

$I->sendGet('/users/sarahmorden/followers/4981/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/sarahmorden/followers/4981/', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4981));

$I->sendGet('/users/sarahmorden/followers/4983/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/sarahmorden/followers/4983/', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => false));

$I->sendGet('/users/3436/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/3436/followers/', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('maps' => array()));

$I->sendGet('/users/3436/followers/11234/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/3436/followers/11234/', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => false));
