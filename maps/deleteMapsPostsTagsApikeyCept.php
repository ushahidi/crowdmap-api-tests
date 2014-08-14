<?php
$I = new MapsGuy($scenario);
$I->wantTo('test DELETE request against the /maps/:map_id/posts/:tags end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//tests for DELETE /maps/:map_id/posts(/:tag) ***MARKED FOR DEPRECATION***
$I->sendDelete('/maps/1405/posts/yyc', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1405/posts/yyc', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//tests for /maps/:map_id/posts(/:tag) ***MARKED FOR DEPRECATION***
$I->sendGet('/maps/1405/posts/yyc', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1405/posts/yyc', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(5215));

//tests for /maps/:map_id/posts(/:tag) with map name ***MARKED FOR DEPRECATION***
$I->sendDelete('/maps/yycflood/posts/yyc', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/yycflood/posts/yyc', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//tests for /maps/:map_id/posts(/:tag) with map name ***MARKED FOR DEPRECATION***
$I->sendGet('/maps/yycflood/posts/yyc', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/yycflood/posts/yyc', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(5215));

//tests delete for /maps/:map_id/tags(/:tag) with multiple tags ***MARKED FOR DEPRECATION***
$I->sendDelete('/maps/952/posts/dirensamsun,OccupyGezi', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/952/posts/dirensamsun,OccupyGezi', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//tests for /maps/:map_id/tags(/:tag) with multiple tags ***MARKED FOR DEPRECATION***
$I->sendGet('/maps/952/posts/dirensamsun,OccupyGezi', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/952/posts/dirensamsun,OccupyGezi', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(2410,2400,2399));

//test delete with bad map name
$I->sendDelete('/maps/notamap/posts/dirensamsun,OccupyGezi', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/notamap/posts/dirensamsun,OccupyGezi', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test delete with bad map_id
$I->sendDelete('/maps/101010101010/posts/dirensamsun,OccupyGezi', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/notamap/posts/dirensamsun,OccupyGezi', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test delete tags/map combo with no matches
$I->sendDelete('/maps/1405/posts/dirensamsun,OccupyGezi', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1405/posts/dirensamsun,OccupyGezi', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test delete map with no posts
$I->sendGet('/maps/3/posts/dirensamsun,OccupyGezi', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/3/posts/dirensamsun,OccupyGezi', 'GET')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));