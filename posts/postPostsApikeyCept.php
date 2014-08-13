<?php
$I = new PostGuy($scenario);
$I->wantTo('test POST request against the /posts/ end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test request to update a post
$I->sendPost('/posts', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts', 'POST'),
  'message' => 'This is a message on a post'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

