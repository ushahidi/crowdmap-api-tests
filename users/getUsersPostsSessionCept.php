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
$I->sendGet('/users/7117/posts', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/7117/posts', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(3357151));

/* testing count request with user_id */
$I->sendGet('/users/7117/posts', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/users/7117/posts', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 1));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

/* testing request with crowdmapID */
$I->sendGet('/users/e066db5d1109f0a704d5047caebd94c9994f7e467788a36bab37ec5e811acab85d5c582a592639b17d25712dbb7263f9bb8e6ffc6132e4673f663687a5dd2ccd/posts',
  array('apikey'=> (string) $I->api_key_for_crowdmap('/users/e066db5d1109f0a704d5047caebd94c9994f7e467788a36bab37ec5e811acab85d5c582a592639b17d25712dbb7263f9bb8e6ffc6132e4673f663687a5dd2ccd/posts', 'GET')
    , 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(3357151));

/* testing count request with crowdmapID */
$I->sendGet('/users/e066db5d1109f0a704d5047caebd94c9994f7e467788a36bab37ec5e811acab85d5c582a592639b17d25712dbb7263f9bb8e6ffc6132e4673f663687a5dd2ccd/posts',
  array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/users/e066db5d1109f0a704d5047caebd94c9994f7e467788a36bab37ec5e811acab85d5c582a592639b17d25712dbb7263f9bb8e6ffc6132e4673f663687a5dd2ccd/posts', 'GET')
    , 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 1));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

/* testing request with username */
$I->sendGet('/users/zack/posts', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/zack/posts', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(3357151));

/* testing count request with username */
$I->sendGet('/users/zack/posts', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/users/zack/posts', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 1));
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
