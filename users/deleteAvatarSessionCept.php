<?php
$I = new UserGuy($scenario);
$I->wantTo('test POST requests against the /users/:user_id/avatar end point with apikey & session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$session = $I->getSession();

/* testing request with user_id */
$I->sendDELETE('/users/6657/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/6657/avatar', 'DELETE'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson(array('avatar'=>NULL));

$I->sendGET('/users/6657/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/6657/avatar', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);

$I->sendGET('/users/6657/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/6657/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson(array('avatar'=>NULL));

/* testing request with user_id */
$I->sendDELETE('/users/30/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/3/avatar', 'DELETE'), 'session'=> (string) $session), array('file' => MEDIA_DIR.'2014_Headshots-28.jpg'));
$I->seeResponseCodeIs(401);
$I->seeResponseContainsJson(array('error'=>'You can only delete the avatar for the current session\'s user.'));