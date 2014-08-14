<?php
$I = new PostGuy($scenario);
$I->wantTo('test POST request against the /posts/:post_id/maps/:map_id/ end-point without authentication');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* test add post related to map*/
$I->sendPost('/posts/3356128/maps/', array('map_id' => 8));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

// Ensure add post to non-existant map
$I->sendPost('/posts/11111111111111/maps', array('map_id' => 8));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));
