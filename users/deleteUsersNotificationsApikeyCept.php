<?php
$I = new UserGuy($scenario);
$I->wantTo('test DELETE request against the /user/:user_id/notifications/:notification_id end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test request to mark notifications as read
$I->sendDelete('/users/6657/notifications', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/6657/notifications', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test request to mark notifications as read
$I->sendDelete('/users/4/notifications', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/4/notifications', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test request to mark notification as read
$I->sendDelete('/users/6657/notifications/2312', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/6657/notifications/2312', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test request to mark notification as read
$I->sendDelete('/users/4/notifications/2312', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/4/notifications/2312', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

