<?php
$I = new UserGuy($scenario);
$I->wantTo('test get requests against the users/:user_id/notifications end point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* testing request with user_id */
$I->sendGet('/users/7117/notifications');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
$I->seeResponseContainsJson(array('success' => false));
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(3357151));

/* testing count request with user_id */
$I->sendGet('/users/7117/notifications', array('count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
$I->seeResponseContainsJson(array('success' => false));

/* testing request with crowdmapID */
$I->sendGet('/users/e066db5d1109f0a704d5047caebd94c9994f7e467788a36bab37ec5e811acab85d5c582a592639b17d25712dbb7263f9bb8e6ffc6132e4673f663687a5dd2ccd/notifications');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
$I->seeResponseContainsJson(array('success' => false));
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(3357151));

/* testing count request with crowdmapID */
$I->sendGet('/users/e066db5d1109f0a704d5047caebd94c9994f7e467788a36bab37ec5e811acab85d5c582a592639b17d25712dbb7263f9bb8e6ffc6132e4673f663687a5dd2ccd/notifications',
  array('count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
$I->seeResponseContainsJson(array('success' => false));

/* testing request with username */
$I->sendGet('/users/zack/notifications');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
$I->seeResponseContainsJson(array('success' => false));
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(3357151));

/* testing count request with username */
$I->sendGet('/users/zack/notifications', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/users/zack/notifications', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
$I->seeResponseContainsJson(array('success' => false));

/* test bad username */
$I->sendGet('/users/returnofthejedi/notifications/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('posts' => array()));
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
$I->seeResponseContainsJson(array('success' => false));

/* test count with bad username */
$I->sendGet('/users/returnofthejedi/notifications/', array('count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('posts' => array()));
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
$I->seeResponseContainsJson(array('success' => false));

/* test bad user_id */
$I->sendGet('/users/100000/notifications/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('posts' => array()));
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
$I->seeResponseContainsJson(array('success' => false));

/* test count with bad user_id */
$I->sendGet('/users/100000/notifications/', array('count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
$I->seeResponseContainsJson(array('success' => false));
