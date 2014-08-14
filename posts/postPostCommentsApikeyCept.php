<?php
$I = new PostGuy($scenario);
$I->wantTo('test POST request against the /posts/(:post_id)/comments(/:map_id)/ end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* testing posts/:post_id/comments with non-existing map */
$I->sendPost('/posts/3356128/comments/46', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/3356128/comments/46', 'POST'), 'comment' => 'new comment'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing posting comment posts/:post_id/comments with non-existing post and non-existing map */
$I->sendPost('/posts/111111111/comments/10101', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/111111111/comments/10101', 'POST'), 'comment' => 'new comment'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
