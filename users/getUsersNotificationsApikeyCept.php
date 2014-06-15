<?php
$I = new UserGuy($scenario);
$I->wantTo('test get requests against the users/:user_id/notifications end point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->sendGet('/users/7968/notifications', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/7968/notifications', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(13016, 13015));

// testing count with user_id
$I->sendGet('/users/7968/notifications', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/users/7968/notifications', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 2));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));


// testing request with crowdmapID
$I->sendGet('/users/53c6c39cf7e29248e0503f7483d4269277e4bf3c2c1e6bfbff1478d441b00212de5267fb17643461d9b99bc7ff4ef044ad64c1dd4b219aaa6884a0022a8d167c/notifications', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/53c6c39cf7e29248e0503f7483d4269277e4bf3c2c1e6bfbff1478d441b00212de5267fb17643461d9b99bc7ff4ef044ad64c1dd4b219aaa6884a0022a8d167c/notifications', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(13016, 13015));

// testing count request with crowdmapID
$I->sendGet('/users/53c6c39cf7e29248e0503f7483d4269277e4bf3c2c1e6bfbff1478d441b00212de5267fb17643461d9b99bc7ff4ef044ad64c1dd4b219aaa6884a0022a8d167c/notifications', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/users/53c6c39cf7e29248e0503f7483d4269277e4bf3c2c1e6bfbff1478d441b00212de5267fb17643461d9b99bc7ff4ef044ad64c1dd4b219aaa6884a0022a8d167c/notifications', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 2));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

// testing request with username
$I->sendGet('/users/dmastermind/notifications', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/dmastermind/notifications', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(13016, 13015));

// testing count request with username
$I->sendGet('/users/dmastermind/notifications', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/users/dmastermind/notifications', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 2));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));


// test bad username
$I->sendGet('/users/returnofthejedi/notifications', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/returnofthejedi/notifications', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('posts' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

// test count with a bad username
$I->sendGet('/users/returnofthejedi/notifications', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/users/returnofthejedi/notifications', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

// test bad user_id
$I->sendGet('/users/100000/notifications', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/100000/notifications', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('posts' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

// test count with a bad user_id
$I->sendGet('/users/100000/notifications', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/users/100000/notifications', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
