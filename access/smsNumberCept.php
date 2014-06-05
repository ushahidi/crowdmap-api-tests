<?php

$I = new AccessGuy($scenario);
$I->wantTo('confirm access control is working for the sms_number field');

/*

An sms_number field already exists in the response set under the user object. Considering changing sms_number to sms_submitted_by

 - app_id/user_id for the Access Control account has been granted access to the sms_number field in posts on map 391
 - post 811 does not have the app_id set to 35, the app_id of the accesscontrol test app
 - post 825 does have the app_id set to 35, the app_id of the accesscontrol test app 


*/
$resource_url = '/maps/391/posts/';

/* login with the GOOD_LOGIN account and the Crowdmap APIKEY */
$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$session = $I->getSession();
/* NO ACCESS CONTROL ENABLED FOR THIS APP/USER */
$I->testSmsNumberAssertions($I->api_key_for_crowdmap($resource_url,'GET'), $session, $resource_url, false);

/* login with the ACCESS_USERNAME account and the Crowdmap APIKEY */
$I->logInByUsername(ACCESS_USERNAME,ACCESS_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$session = $I->getSession();
/* NO ACCESS CONTROL ENABLED FOR THIS APP/USER */
$I->testSmsNumberAssertions($I->api_key_for_crowdmap($resource_url,'GET'), $session, $resource_url, false);

/* login with the GOOD_USERNAME account and the ACCESS CONTROL APIKEY */
$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_accesscontrol(LOGIN_URL,'POST'));
$session = $I->getSession();
/* NO ACCESS CONTROL ENABLED FOR THIS APP/USER */
$I->testSmsNumberAssertions($I->api_key_for_accesscontrol($resource_url,'GET'), $session, $resource_url, false);

/* login with the ACCESS_USERNAME account and the ACCESS CONTROL APIKEY */
$I->logInByUsername(ACCESS_USERNAME,ACCESS_PASSWORD,$I->api_key_for_accesscontrol(LOGIN_URL,'POST'));
$session = $I->getSession();
/* ACCESS CONTROL ENABLED FOR THIS APP/USER, GRANTING ACCESS TO THE SMS_NUMBER FIELD ON POSTS ASSOCIATED WITH MAP 391 */
$I->testSmsNumberAssertions($I->api_key_for_accesscontrol($resource_url,'GET'), $session, $resource_url, true);