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
$I->sendGet('/users/6657/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/6657/avatar', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);

/* testing request with crowdmapID */
$I->sendGet('/users/6d017506671d5e5d6bbd14c2ce0159713f106c5b75208ad4d2540683026801afd2f0c79ee339f2584bcd7306f0bb6a8cd681aa9f1ad7d4be3c6c881f32efc0af/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/6d017506671d5e5d6bbd14c2ce0159713f106c5b75208ad4d2540683026801afd2f0c79ee339f2584bcd7306f0bb6a8cd681aa9f1ad7d4be3c6c881f32efc0af/avatar', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);

/* testing request with username */
$I->sendGet('/users/zackhalloran/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/zackhalloran/avatar', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);

/* testing request with bad username */
$I->sendGet('/users/returnofthejedi/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/returnofthejedi/avatar', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);


/* testing request with bad user_id */
$I->sendGet('/users/100000/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/100000/avatar', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);


