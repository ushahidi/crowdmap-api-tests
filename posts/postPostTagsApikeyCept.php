<?php
$I = new PostGuy($scenario);
$I->wantTo('test POST request against the /posts/(:post_id)/tags(/:tag)/ end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* testing adding tag to posts/:post_id/tags with tag addnewtag */
$I->sendPost('/posts/77/tags/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/77/tags/', 'POST'),
  'tag' => 'addnewtag'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing posts/:post_id/tags with tag addnewtag is not created */
$I->sendGet('/posts/77/tags/addnewtag', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/77/tags/addnewtag', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('post_tags' => array()));

/* testing creating tag posts/:post_id/tags with non-existing post */
$I->sendPost('/posts/111111111/tags/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/111111111/tags/', 'POST'),
  'tag' => 'addnewtag'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing posts/:post_id/tags with non-existing post */
$I->sendGet('/posts/111111111/tags/addnewtag', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/111111111/tags/addnewtag', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('posts_tags' => array()));

/* testing posts/:post_id/tags with count with non-existing tag */
$I->sendGet('/posts/111111111/tags/', array('count' => true, 'apikey'=> (string) $I->api_key_for_crowdmap('/posts/111111111/tags/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
