<?php
$I = new LoginGuy($scenario);
$I->wantTo('log in with invalid username and invalid password	');
$I->logInByUsername(BAD_USERNAME,BAD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
/*** THE STATUS CODE RETURNED BY THE API IS WRONG. THIS NEEDS TO BE FIXED. ***/
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('success'=>false, 'error'=>'Sorry, we couldn\'t match an account to those login details. Would you like to try <a href="/forgot_password">resetting your password</a>?'));