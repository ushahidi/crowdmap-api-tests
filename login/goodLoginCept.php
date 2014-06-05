<?php
$I = new LoginGuy($scenario);
$I->wantTo('log in with a valid username and password');
$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);	
$I->seeResponseIsJson();
$I->seeResponseContains('"session":');
$I->seeResponseContainsJson(array('success'=>true));