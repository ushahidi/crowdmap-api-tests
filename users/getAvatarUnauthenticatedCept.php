<?php
$I = new UserGuy($scenario);
$I->wantTo('test get requests against the users/:user_id/avatar end point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* testing request with user_id */
$I->sendGet('/users/7968/avatar');
$I->seeResponseCodeIs(200);

/* testing request with crowdmapID */
$I->sendGet('/users/53c6c39cf7e29248e0503f7483d4269277e4bf3c2c1e6bfbff1478d441b00212de5267fb17643461d9b99bc7ff4ef044ad64c1dd4b219aaa6884a0022a8d167c/avatar');
$I->seeResponseCodeIs(200);


/* testing request with username */
$I->sendGet('/users/dmastermind/avatar');
$I->seeResponseCodeIs(200);


/* testing request with bad username */
$I->sendGet('/users/returnofthejedi/avatar');
$I->seeResponseCodeIs(404);


/* testing request with bad user_id */
$I->sendGet('/users/100000/avatar');
$I->seeResponseCodeIs(404);


