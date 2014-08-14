<?php
$I = new UserGuy($scenario);
$I->wantTo('test PUT requests against the users end point without authentication');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');


// Test updating user with users/:crowdmap_id
$I->sendPut('/users/6d017506671d5e5d6bbd14c2ce0159713f106c5b75208ad4d2540683026801afd2f0c79ee339f2584bcd7306f0bb6a8cd681aa9f1ad7d4be3c6c881f32efc0af/');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

// Test updating user with users/:user_id
$I->sendPut('/users/6657/');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing request with username */
$I->sendPut('/users/dmastermind/');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
