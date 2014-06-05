<?php
$I = new ExternalsGuy($scenario);
$I->wantTo('test get requests against the externals end point');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');
$I->sendGet('/externals/', array('apikey'=> (string) $I->api_key_for_crowdmap('/externals/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkExternalsObjs($resp, array(7005, 5484,5481,5478,5477,5476,5474,5473,5177,5178,5176,5175,5174,5172,5173,5170,5171,5169,5168,5167));

$I->sendGet('/externals/5177/', array('apikey'=> (string) $I->api_key_for_crowdmap('/externals/5177/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkExternalsObjs($resp, array(5177));

$I->sendGet('/externals/5477/', array('apikey'=> (string) $I->api_key_for_crowdmap('/externals/5477/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkExternalsObjs($resp, array(5477));