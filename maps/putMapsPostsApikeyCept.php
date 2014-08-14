<?php
$I = new MapsGuy($scenario);
$I->wantTo('test PUT request against the /maps/:map_id end-point without authentication');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test PUT with maps/:map_id that exists
$I->sendPut('/maps/4976/posts/3356015',
  array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/4976/posts/3356015/posts/3356015')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "This action requires an API token or a valid session."));

//test PUT with maps/:subdomain that exists
$I->sendPut('/maps/sydsvenskanssupporterkarta/posts/3356015',
  array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/sydsvenskanssupporterkarta/posts/3356015')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

//test PUT with maps/:map_id that exists
$I->sendPut('/maps/4967/posts/3356015',
  array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/4967/posts/3356015')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

//test PUT with maps/:subdomain that exists
$I->sendPut('/maps/enbiciaviles/posts/3356015',
  array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/enbiciaviles/posts/3356015')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

//test with map_id that doesn't exist
$I->sendPut('/maps/10101001/posts/3365015',
  array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/10101001/posts/3356015')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

//test with map subdomain that doesn't exist
$I->sendPut('/maps/thismadoesntexist/posts/3365015',
  array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/thismadoesntexist/posts/3356015')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));
