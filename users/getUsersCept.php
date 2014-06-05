<?php
$I = new UserGuy($scenario);
$I->wantTo('test get requests against the users end point');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');
$I->sendGet('/users/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(7982,7981,7980,7979,7978,7977,7976,7975,7974,7973,7972,7971,7970,7969,7968,7967,7966,7965,7964,7963));

/* testing request with crowdmapID */
$I->sendGet('/users/53c6c39cf7e29248e0503f7483d4269277e4bf3c2c1e6bfbff1478d441b00212de5267fb17643461d9b99bc7ff4ef044ad64c1dd4b219aaa6884a0022a8d167c/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(7968));

/* testing request with userID */
$I->sendGet('/users/7968/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(7968));

/* testing request with username */
$I->sendGet('/users/dmastermind/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkUserObjs($resp, array(7968));