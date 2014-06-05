<?php
$I = new LoginGuy($scenario);
$I->wantTo('log in with bad parameters');
$I->loginWithMalformedParameters(GOOD_USERNAME,BAD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
/*** THE STATUS CODE RETURNED BY THE API IS WRONG. THIS NEEDS TO BE FIXED. ***/
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('success'=>false, 'error'=>'Please provide your email or username and password.'));
