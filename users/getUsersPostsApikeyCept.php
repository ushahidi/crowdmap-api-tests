<?php
$I = new UserGuy($scenario);
$I->wantTo('test get requests against the users/:user_id/posts end point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->sendGet('/users/7968/posts', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/7968/posts', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(13016, 13015));

// testing request with crowdmapID
$I->sendGet('/users/53c6c39cf7e29248e0503f7483d4269277e4bf3c2c1e6bfbff1478d441b00212de5267fb17643461d9b99bc7ff4ef044ad64c1dd4b219aaa6884a0022a8d167c/posts', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/53c6c39cf7e29248e0503f7483d4269277e4bf3c2c1e6bfbff1478d441b00212de5267fb17643461d9b99bc7ff4ef044ad64c1dd4b219aaa6884a0022a8d167c/posts', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(13016, 13015));

// testing request with username
$I->sendGet('/users/dmastermind/posts', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/dmastermind/posts', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(13016, 13015));

// testing request with user_id - single post
$I->sendGet('/users/7968/posts/13016', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/7968/posts/13016', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(13016));


// testing request with crowdmapID - single post
$I->sendGet('/users/53c6c39cf7e29248e0503f7483d4269277e4bf3c2c1e6bfbff1478d441b00212de5267fb17643461d9b99bc7ff4ef044ad64c1dd4b219aaa6884a0022a8d167c/posts/13015', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/53c6c39cf7e29248e0503f7483d4269277e4bf3c2c1e6bfbff1478d441b00212de5267fb17643461d9b99bc7ff4ef044ad64c1dd4b219aaa6884a0022a8d167c/posts/13015', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(13015));

// testing request with username - single post
$I->sendGet('/users/dmastermind/posts/13015', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/dmastermind/posts/13015', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(13015));

// test bad username - single post
$I->sendGet('/users/returnofthejedi/posts/13015', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/returnofthejedi/posts/13015', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('posts' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

// test bad user_id - single post
$I->sendGet('/users/100000/posts/13015', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/100000/posts/13015', 'GET'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('posts' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
