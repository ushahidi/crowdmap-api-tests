<?php
$I = new UserGuy($scenario);
$I->wantTo('test get requests against the users/:user_id/posts end point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$session = $I->getSession();

/* testing request with user_id */
$I->sendGet('/users/7977/posts', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/7977/posts', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(3356026,3356025,3356024));

/* testing count request with user_id */
$I->sendGet('/users/7977/posts', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/users/7977/posts', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 3));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

/* testing request with crowdmapID */
$I->sendGet('/users/9b6f57db48ecc5ae4fab0c5c990143f7a241db380288011523b26c398137bf83773dca2f08b4344363d98e4ed6d31741bbd26eb2da296ad75263e9ba1090fca8/posts',
  array('apikey'=> (string) $I->api_key_for_crowdmap('/users/9b6f57db48ecc5ae4fab0c5c990143f7a241db380288011523b26c398137bf83773dca2f08b4344363d98e4ed6d31741bbd26eb2da296ad75263e9ba1090fca8/posts', 'GET')
    , 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(3356026,3356025,3356024));

/* testing count request with crowdmapID */
$I->sendGet('/users/9b6f57db48ecc5ae4fab0c5c990143f7a241db380288011523b26c398137bf83773dca2f08b4344363d98e4ed6d31741bbd26eb2da296ad75263e9ba1090fca8/posts',
  array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/users/9b6f57db48ecc5ae4fab0c5c990143f7a241db380288011523b26c398137bf83773dca2f08b4344363d98e4ed6d31741bbd26eb2da296ad75263e9ba1090fca8/posts', 'GET')
    , 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 3));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

/* testing request with username */
$I->sendGet('/users/sarahmorden/posts', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/sarahmorden/posts', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(3356026,3356025,3356024));

/* testing count request with username */
$I->sendGet('/users/sarahmorden/posts', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/users/sarahmorden/posts', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 3));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

/* test bad username */
$I->sendGet('/users/returnofthejedi/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/returnofthejedi/posts', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('posts' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

/* test count with bad username */
$I->sendGet('/users/returnofthejedi/posts/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/users/returnofthejedi/posts', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('posts' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

/* test bad user_id */
$I->sendGet('/users/100000/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/100000/posts', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('posts' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

/* test count with bad user_id */
$I->sendGet('/users/100000/posts/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/users/100000/posts', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
