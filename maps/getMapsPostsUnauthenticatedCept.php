<?php
$I = new MapsGuy($scenario);
$I->wantTo('test get request against the /maps/:map_id/posts end-point without authentication');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test with map_id
$I->sendGet('/maps/1605/posts/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(8086,7972,7651));

//test with map subdomain
$I->sendGet('/maps/comunemessina/posts/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(8086,7972,7651));

//test count with map_id
$I->sendGet('/maps/1605/posts/', array('count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 3));

//test count with map subdomain
$I->sendGet('/maps/comunemessina/posts/', array('count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 3));


/* now test a map with 0 posts */

//test with map_id
$I->sendGet('/maps/4968/posts/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContains('"posts":[]');

//test with map subdomain
$I->sendGet('/maps/trekpak/posts/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContains('"posts":[]');

//test count with map_id
$I->sendGet('/maps/4968/posts/', array('count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => 0));

//test count with map subdomain
$I->sendGet('/maps/trekpak/posts/', array('count' => TRUE));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => 0));

// ADD TEST FOR MAPS WITH MORE THAN LIMIT POSTS