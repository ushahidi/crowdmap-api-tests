<?php
$I = new MapsGuy($scenario);
$I->wantTo('get posts for a given map');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->sendGet('/maps/1605/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1605/posts/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(8086,7972,7651));