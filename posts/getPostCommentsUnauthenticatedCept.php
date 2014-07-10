<?php
$I = new PostGuy($scenario);
$I->wantTo('test get request against the /posts/(:post_id)/comments(/:map_id)/ end-point without Authentication');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* testing posts/:post_id/comments with non-existing map */
$I->sendGet('/posts/3356128/comments/46');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('comments' => array()));

/* testing posts/:post_id/comments with non-existing comment and non-existing map */
$I->sendGet('/posts/111111111/comments/10101');
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'Post not found.'));
