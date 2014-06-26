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
$I->sendPOST('/users/6657/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/6657/avatar', 'POST'), 'session'=> (string) $session), array('file' => MEDIA_DIR.'2014_Headshots-28.jpg'));
$I->seeResponseCodeIs(200);
$I->seeResponseContains('"avatar":"https:\/\/b25c7ada827abcbc0630-5454a9e6f7100566866dd221e5013c79.ssl.cf2.rackcdn.com\/');

$I->sendGET('/users/6657', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/6657', 'GET'), 'session'=> (string) $session), array('file' => MEDIA_DIR.'2014_Headshots-28.jpg'));
$I->seeResponseCodeIs(200);
$I->seeResponseContains('"avatar":"https:\/\/b25c7ada827abcbc0630-5454a9e6f7100566866dd221e5013c79.ssl.cf2.rackcdn.com\/');

/* testing request with user_id */
$I->sendPOST('/users/30/avatar', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/30/avatar', 'POST'), 'session'=> (string) $session), array('file' => MEDIA_DIR.'2014_Headshots-28.jpg'));
$I->seeResponseCodeIs(401);
$I->seeResponseContainsJson(array('error'=>'You can only change the avatar for the current session\'s user.'));