<?php
$I = new PostGuy($scenario);
$I->wantTo('test DELETE request against the /posts/:post_id/maps/:map_id/ end-point without authentication');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* test delete request on post related to map*/
$I->sendDelete('/posts/11608/maps/1810');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

// Ensure post isn't deleted
$I->sendGet('/posts/11608');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(1810));

// Ensure map related to post isn't deleted
$I->sendGet('/posts/11608/maps');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(1810));