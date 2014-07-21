<?php
$I = new PostGuy($scenario);
$I->wantTo('test DELETE request against the /posts/:post_id end-point without authentication');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test request to delete post
$I->sendDelete('/posts/11626');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

// Test to ensure post was not deleted
$I->sendGet('/posts/11626/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('success'=>true));
$I->seeResponseContainsJson(array('status'=>200));
$resp = $I->grabResponse();
$I->checkPostObjs($resp,array(11626));

