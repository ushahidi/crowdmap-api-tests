<?php
$I = new PostGuy($scenario);
$I->wantTo('test get request against the /posts/(:post_id)/tags(/:tag)/ end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* testing posts/:post_id/tags with existing post */
$I->sendGet('/posts/77/tags', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/77/tags', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(77));

/* testing posts/:post_id/tags with count */
$I->sendGet('/posts/77/tags', array('count' => true, 'apikey'=> (string) $I->api_key_for_crowdmap('/posts/77/tags', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 2));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

/* testing posts/:post_id/tags with existing post and tag */
$I->sendGet('/posts/77/tags/cmupdates', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/77/tags/cmupdates', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(77));

/* testing posts/:post_id/tags with count with existing post and tag */
$I->sendGet('/posts/77/tags/cmupdates', array('count' => true, 'apikey'=> (string) $I->api_key_for_crowdmap('/posts/77/tags/cmupdates', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 43));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));


/* testing posts/:post_id/tags with non-existing tag */
$I->sendGet('/posts/111111111/tags/kachumbari', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/111111111/tags/cmupdates', 'GET')));
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
