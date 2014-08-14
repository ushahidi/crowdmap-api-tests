<?php
$I = new PostGuy($scenario);
$I->wantTo('test DELETE request against the /posts/:post_id/maps/:map_id/ end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* test delete request on post related to map*/
$I->sendDelete('/posts/11608/maps/1810', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

// Ensure post isn't deleted
$I->sendGet('/posts/11608', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(1810));

// Ensure map related to post isn't deleted
$I->sendGet('/posts/11608/maps', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(1810));