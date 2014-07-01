<?php
$I = new UserGuy($scenario);
$I->wantTo('test get requests against the users/:user_id/avatar end point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* testing request with user_id */
$I->sendGet('/users/6657/avatar');
$I->seeResponseCodeIs(200);

/* testing request with crowdmapID */
$I->sendGet('/users/6d017506671d5e5d6bbd14c2ce0159713f106c5b75208ad4d2540683026801afd2f0c79ee339f2584bcd7306f0bb6a8cd681aa9f1ad7d4be3c6c881f32efc0af/avatar');
$I->seeResponseCodeIs(200);


/* testing request with username */
$I->sendGet('/users/zackhalloran/avatar');
$I->seeResponseCodeIs(200);


/* testing request with bad username */
$I->sendGet('/users/returnofthejedi/avatar');
$I->seeResponseCodeIs(404);


/* testing request with bad user_id */
$I->sendGet('/users/100000/avatar');
$I->seeResponseCodeIs(404);


