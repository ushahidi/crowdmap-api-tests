<?php
$I = new PostGuy($scenario);
$I->wantTo('test POST request against the /posts/:post_id/maps/:map_id/ end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* test add post related to map*/
$I->sendDelete('/posts/3356128/maps/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/3356128/maps/', 'POST')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

// Ensure add post to non-existant map
$I->sendGet('/posts/11111111111111/maps', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
