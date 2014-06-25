<?php
$I = new MapsGuy($scenario);
$I->wantTo('test GET request against the /maps/:map_id/posts/:tags end-point with apikey and session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//tests for /maps/:map_id/posts(/:tag) ***MARKED FOR DEPRECATION***
$I->sendGet('/maps/1405/posts/yyc', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1405/posts/yyc', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(5215));

//tests for /maps/:map_id/posts(/:tag) with map name ***MARKED FOR DEPRECATION***
$I->sendGet('/maps/yycflood/posts/yyc', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/yycflood/posts/yyc', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(5215));

//tests for /maps/:map_id/tags(/:tag) with multiple tags ***MARKED FOR DEPRECATION***
$I->sendGet('/maps/952/posts/dirensamsun,OccupyGezi', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/952/posts/dirensamsun,OccupyGezi', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(2410,2400,2399));

$I->sendGet('/maps/952/posts/dirensamsun,OccupyGezi', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/952/posts/dirensamsun,OccupyGezi', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => 3));

//test with bad map name
$I->sendGet('/maps/notamap/posts/dirensamsun,OccupyGezi', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/notamap/posts/dirensamsun,OccupyGezi', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContains('"posts":[]');

$I->sendGet('/maps/notamap/posts/dirensamsun,OccupyGezi', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/notamap/posts/dirensamsun,OccupyGezi', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => 0));

//test with bad map_id
$I->sendGet('/maps/101010101010/posts/dirensamsun,OccupyGezi', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/notamap/posts/dirensamsun,OccupyGezi', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContains('"posts":[]');

$I->sendGet('/maps/101010101010/posts/dirensamsun,OccupyGezi', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/notamap/posts/dirensamsun,OccupyGezi', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => 0));

//test tags/map combo with no matches
$I->sendGet('/maps/1405/posts/dirensamsun,OccupyGezi', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1405/posts/dirensamsun,OccupyGezi', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContains('"posts":[]');

$I->sendGet('/maps/1405/posts/dirensamsun,OccupyGezi', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/1405/posts/dirensamsun,OccupyGezi', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => 0));

//test map with no posts
$I->sendGet('/maps/3/posts/dirensamsun,OccupyGezi', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/3/posts/dirensamsun,OccupyGezi', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContains('"posts":[]');

$I->sendGet('/maps/3/posts/dirensamsun,OccupyGezi', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/3/posts/dirensamsun,OccupyGezi', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => 0));