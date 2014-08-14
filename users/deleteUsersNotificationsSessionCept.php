<?php
$I = new UserGuy($scenario);
$I->wantTo('test DELETE request against the /user/:user_id/notifications/:notification_id end-point with apikey and session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$session = $I->getSession();

//test request to mark notifications as read
$I->sendDelete('/users/6657/notifications', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/6657/notifications', 'DELETE')), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test request to mark notifications as read
$I->sendDelete('/users/4/notifications', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/4/notifications', 'DELETE')), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test request to mark notification as read
$I->sendDelete('/users/6657/notifications/2312', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/6657/notifications/2312', 'DELETE')), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test request to mark notification as read
$I->sendDelete('/users/4/notifications/2312', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/4/notifications/2312', 'DELETE')), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

