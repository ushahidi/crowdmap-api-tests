<?php
$I = new PostGuy($scenario);
$I->wantTo('test get request against the /posts/(:post_id)/tags(/:tag)/ end-point without authentication');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* testing deleting posts/:post_id/tags with tag cmupdates */
$I->sendDelete('/posts/77/tags/cmupdates');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing posts/:post_id/tags with tag cmupdates is deleted */
$I->sendGet('/posts/77/tags/cmupdates');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('post_tags' => array()));

/* testing delete posts/:post_id/tags with non-existing tag */
$I->sendDelete('/posts/111111111/tags/kachumbari');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing posts/:post_id/tags with non-existing tag */
$I->sendGet('/posts/111111111/tags/kachumbari');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('posts_tags' => array()));

/* testing posts/:post_id/tags with count with non-existing tag */
$I->sendGet('/posts/111111111/tags/kachumbari', array('count' => true));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
