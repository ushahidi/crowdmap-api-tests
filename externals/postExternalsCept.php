<?php
$I = new ExternalsGuy($scenario);
$I->wantTo('test post against the externals end-point');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');
$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);	
$I->seeResponseIsJson();
$session = $I->getSession();

//write a POST request that passes all values as paramters

//write a POST requests that passes urls for the remaining services

/* authenticated tests: apikey & session */

//test an external call using embedly
$I->sendPost('/externals/', array('apikey'=> (string) $I->api_key_for_crowdmap('/externals/', 'POST'), 'session'=> (string) $session, 'url'=> 'http://blog.ushahidi.com/2014/04/14/testing-ushahidi-v2-7-3-upcoming-release/'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkExternalsObjs($resp, array(7006), array(7006));

//Confirm that the external can be pulled using a get request
$I->sendGet('/externals/7006/', array('apikey'=> (string) $I->api_key_for_crowdmap('/externals/7006/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkExternalsObjs($resp, array(7006), array(7006));

//test an external call using Twitter
$I->sendPost('/externals/', array('apikey'=> (string) $I->api_key_for_crowdmap('/externals/', 'POST'), 'session'=> (string) $session, 'url'=> 'https://twitter.com/ushahidi/status/458614065963995137'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkExternalsObjs($resp, array(7007), array(7007));

//Confirm that the external can be pulled using a get request
$I->sendGet('/externals/7007/', array('apikey'=> (string) $I->api_key_for_crowdmap('/externals/7007/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkExternalsObjs($resp, array(7007), array(7007));

//write a POST request that passes all values as paramters

//write a POST requests that passes urls for the remaining services