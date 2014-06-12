<?php
$I = new UserGuy($scenario);
$I->wantTo('test get request against the /user/:user_id/maps/collaborating end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->sendGet('/users/5639/maps/collaborating/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/5639/maps/collaborating/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4151,4460,4462,4649));

$I->sendGet('/users/8d235eafa6b2a699ef4f658407d7d29a73bed300d46241f1a6d3984c04bab5dab2fe78944a360e8c7bb4b627d8cdfe1f8e1a7bb65a49bab5f8533d7dc91e2032/maps/collaborating/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/8d235eafa6b2a699ef4f658407d7d29a73bed300d46241f1a6d3984c04bab5dab2fe78944a360e8c7bb4b627d8cdfe1f8e1a7bb65a49bab5f8533d7dc91e2032/maps/collaborating/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4151,4460,4462,4649));

$I->sendGet('/users/me2resh/maps/collaborating/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/me2resh/maps/collaborating/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(4151,4460,4462,4649));

$I->sendGet('/users/2015/maps/collaborating/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/me2resh/maps/collaborating/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test bad user_id
$I->sendGet('/users/100000/maps/collaborating/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/me2resh/maps/collaborating/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
