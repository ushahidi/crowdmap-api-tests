<?php
$I = new UserGuy($scenario);
$I->wantTo('test get requests against the users/:user_id/posts end point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* testing request with user_id */
$I->sendGet('/users/7117/posts');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(3357151));

/* testing count request with user_id */
$I->sendGet('/users/7117/posts', array('count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 1));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

/* testing request with crowdmapID */
$I->sendGet('/users/e066db5d1109f0a704d5047caebd94c9994f7e467788a36bab37ec5e811acab85d5c582a592639b17d25712dbb7263f9bb8e6ffc6132e4673f663687a5dd2ccd/posts');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(3357151));

/* testing count request with crowdmapID */
$I->sendGet('/users/e066db5d1109f0a704d5047caebd94c9994f7e467788a36bab37ec5e811acab85d5c582a592639b17d25712dbb7263f9bb8e6ffc6132e4673f663687a5dd2ccd/posts',
  array('count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 1));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

/* testing request with username */
$I->sendGet('/users/zack/posts');
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
$I->sendGet('/users/returnofthejedi/posts/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('posts' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

/* test count with bad username */
$I->sendGet('/users/returnofthejedi/posts/', array('count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('posts' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

/* test bad user_id */
$I->sendGet('/users/100000/posts/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('posts' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

/* test count with bad user_id */
$I->sendGet('/users/100000/posts/', array('count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
