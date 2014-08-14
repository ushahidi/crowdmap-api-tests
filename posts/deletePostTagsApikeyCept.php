<?php
$I = new PostGuy($scenario);
$I->wantTo('test DELETE request against the /posts/(:post_id)/tags(/:tag)/ end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* testing deleting posts/:post_id/tags with tag cmupdates */
$I->sendDelete('/posts/77/tags/cmupdates', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/77/tags/cmupdates', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing posts/:post_id/tags with tag cmupdates is deleted */
$I->sendGet('/posts/77/tags/cmupdates', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/77/tags/cmupdates', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('post_tags' => array()));

/* testing delete posts/:post_id/tags with non-existing tag */
$I->sendDelete('/posts/111111111/tags/kachumbari', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/111111111/tags/kachumbari', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing posts/:post_id/tags with non-existing tag */
$I->sendGet('/posts/111111111/tags/kachumbari', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/111111111/tags/kachumbari', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('posts_tags' => array()));

/* testing posts/:post_id/tags with count with non-existing tag */
$I->sendGet('/posts/111111111/tags/kachumbari', array('count' => true, 'apikey'=> (string) $I->api_key_for_crowdmap('/posts/111111111/tags/kachumbari', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
