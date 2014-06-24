<?php
$I = new MapsGuy($scenario);
$I->wantTo('test get request against the /maps/:map_id/posts end-point passing an apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test with map_id
$I->sendGet('/maps/1605/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1605/posts/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(8086,7972,7651));

//test with map subdomain
$I->sendGet('/maps/comunemessina/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/posts/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(8086,7972,7651));

//test count with map_id
$I->sendGet('/maps/1605/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1605/posts/', 'GET'), 'count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 3));

//test count with map subdomain
$I->sendGet('/maps/comunemessina/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/posts/', 'GET'), 'count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 3));


/* now test a map with 0 posts */

//test with map_id
$I->sendGet('/maps/4968/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/4968/posts/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContains('"posts":[]');

//test with map subdomain
$I->sendGet('/maps/trekpak/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/trekpak/posts/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContains('"posts":[]');

//test count with map_id
$I->sendGet('/maps/4968/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/4968/posts/', 'GET'), 'count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => 0));

//test count with map subdomain
$I->sendGet('/maps/trekpak/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/trekpak/posts/', 'GET'), 'count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => 0));