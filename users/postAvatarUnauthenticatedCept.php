<?php
$I = new UserGuy($scenario);
$I->wantTo('test POST requests against the /users/:user_id/avatar end point without unauthenticated');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

/* testing request with user_id */
$I->sendPOST('/users/6657/avatar');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing request with user_id */
$I->sendPOST('/users/30/avatar', array('file' => MEDIA_DIR.'2014_Headshots-28.jpg'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing request with username */
$I->sendPOST('/users/zackhalloran/avatar');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing request with username */
$I->sendPOST('/users/easyessy/avatar', array('file' => MEDIA_DIR.'2014_Headshots-28.jpg'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing request with /users/:crowmap_id */
$I->sendPOST('/users/4094917e51734974cbeb4958a01c692892ca65a6a85b0f7288c2a667686620a62b2d70349b2ceb0aa92f650cb415112ac669a0fea0011457119a14e556bb0344/avatar');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

/* testing request with /users/:crowmap_id */
$I->sendPOST('/users/faf3393bc20f61a42a70ae3302f591799d2b63ce590dfd61bec4c244cceb4e0a0088ccd504fc9a4c5aa1cc40d97e98c93cc3af4bd5145eaa4e23106047d02d53/avatar', array('file' => MEDIA_DIR.'2014_Headshots-28.jpg'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
