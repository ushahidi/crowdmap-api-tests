<?php
$I = new PostGuy($scenario);
$I->wantTo('test POST request against the /posts/(:post_id)/comments(/:map_id)/ end-point without authentication');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* testing posts/:post_id/comments with non-existing map */
$I->sendDelete('/posts/3356128/comments/46', array('comment' => 'new comment'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

/* testing POST posts/:post_id/comments with non-existing comment and non-existing map */
$I->sendDelete('/posts/111111111/comments/10101', array('comment' => 'new comment'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));
