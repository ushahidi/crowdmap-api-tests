<?php
$I = new PostGuy($scenario);
$I->wantTo('test DELETE request against the /posts/:post_id end-point with apikey and session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$session = $I->getSession();

// test DELETE request on existing Post
$I->sendDelete('/posts/11626', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'DELETE')), 'session' => $session);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('success'=>true));
$I->seeResponseContainsJson(array('status'=>200));

// Check that post was deleted
$I->sendGet('/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('success'=>true));
$I->seeResponseContainsJson(array('status'=>200));
$resp = $I->grabResponse();
/* passing the response as string because, for some reason, the object generated can't be converted to an array for counting. boooooo */
$I->confirmPostCount($resp,DEFAULT_POST_LIMIT);
$I->checkPostObjs($resp,array(11627,11628,11625,11624,11623,11622,11621,11620,11618,11619,11616,11617,11615,11614,11612,11611,11609,11610,11608));