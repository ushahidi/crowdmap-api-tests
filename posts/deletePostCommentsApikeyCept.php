<?php
$I = new PostGuy($scenario);
$I->wantTo('test get request against the /posts/(:post_id)/comments(/:map_id)/ end-point with Session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* testing posts/:post_id/comments with non-existing map */
$I->sendDelete('/posts/3356128/comments/46', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/3356128/comments/46', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing delete posts/:post_id/comments with non-existing comment and non-existing map */
$I->sendDelete('/posts/111111111/comments/10101', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/111111111/comments/10101', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing posts/:post_id/comments with non-existing map still exists */
$I->sendGet('/posts/3356128/comments/46', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/3356128/comments/46', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
