<?php
$I = new PostGuy($scenario);
$I->wantTo('test DELETE request against the /posts/(:post_id)/comments(/:map_id)/ end-point with Session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$session = $I->getSession();

/* testing posts/:post_id/comments with non-existing map */
$I->sendDelete('/posts/3356128/comments/46', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/3356128/comments/46', 'GET'), 'session'=> (string) $session)));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('success'=>true));
$I->seeResponseContainsJson(array('status'=>200));

/* test post comment was deleted */
$I->sendGet('/posts/3356128/comments/46', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/3356128/comments/46', 'GET'), 'session'=> (string) $session)));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('status' => 401));

// Check post was not deleted
$I->sendGet('/posts/3356128', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/3356128', 'GET'), 'session'=> (string) $session)));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('status' => 200));

/* testing posts/:post_id/comments with non-existing comment and non-existing map */
$I->sendDelete('/posts/111111111/comments/10101', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/111111111/comments/10101', 'GET'), 'session'=> (string) $session)));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'Post not found.'));
