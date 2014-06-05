<?php
$I = new PostGuy($scenario);
$I->wantTo('test before, after, before_update & after_update filters on posts');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');
$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);	
$I->seeResponseIsJson();
$session = $I->getSession();

$I->sendGet('/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET'), 'after'=> 1375156708));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(11626,11627,11628));

$I->sendGet('/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET'), 'after_update'=> 1375156708));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(11626,11627,11628));

$I->sendGet('/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET'), 'before'=> 1375156708, 'limit' => 3));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(11628,11625,11624));

$I->sendGet('/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET'), 'before_update'=> 1375156708, 'limit' => 3));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(11628,11625,11624));

$I->sendGet('/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET'), 'after'=> 1375154545, 'before'=> 1375156708));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(11628,11625,11624,11623,11622));

$I->sendGet('/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET'), 'after_update'=> 1375154545, 'before_update'=> 1375156708));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(11628,11625,11624,11623,11622));


//update a post so the date_updated field is updated
$I->sendPut('/posts/11624/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/11624/', 'PUT'), 'session'=> (string) $session, 'owner_map_id'=> 0));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();

$I->sendGet('/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET'), 'before_update'=> 1375156708, 'limit' => 3));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(11628,11625,11623));

$I->sendGet('/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET'), 'after_update'=> 1375156708));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(11626,11627,11628,11624), array(11624));

$I->sendGet('/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET'), 'after'=> 1375156708));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(11626,11627,11628));

$I->sendGet('/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET'), 'before'=> 1375156708, 'limit' => 3));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(11628,11625,11624), array(11624));

