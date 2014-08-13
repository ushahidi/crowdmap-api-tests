<?php
$I = new PostGuy($scenario);
$I->wantTo('test POST request against the /posts/:post_id/like/ end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test request to post like
$I->sendPost('/posts/11626/like', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/11626/like', 'POST')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

// Test to post like on non-existent
$I->sendPost('/posts/101010101/like', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/101010101/', 'POST')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
