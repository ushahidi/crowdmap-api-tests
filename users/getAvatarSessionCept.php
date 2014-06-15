<?php
$I = new UserGuy($scenario);
$I->wantTo('test get requests against the users/:user_id/avatar end point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$session = $I->getSession();

/* testing request with user_id */
$I->sendGet('/users/7968/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/7968/avatar', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);

/* testing request with crowdmapID */
$I->sendGet('/users/53c6c39cf7e29248e0503f7483d4269277e4bf3c2c1e6bfbff1478d441b00212de5267fb17643461d9b99bc7ff4ef044ad64c1dd4b219aaa6884a0022a8d167c/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/53c6c39cf7e29248e0503f7483d4269277e4bf3c2c1e6bfbff1478d441b00212de5267fb17643461d9b99bc7ff4ef044ad64c1dd4b219aaa6884a0022a8d167c/avatar', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);


/* testing request with username */
$I->sendGet('/users/dmastermind/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/dmastermind/avatar', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);


/* testing request with bad username */
$I->sendGet('/users/returnofthejedi/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/returnofthejedi/avatar', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);


/* testing request with bad user_id */
$I->sendGet('/users/100000/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/100000/avatar', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);


