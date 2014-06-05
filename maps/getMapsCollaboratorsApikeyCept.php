<?php
$I = new MapsGuy($scenario);
$I->wantTo('test get request against the /maps/:map_id/collaborators end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test with map_id
$I->sendGet('/maps/1810/collaborators/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1810/collaborators/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapUserObjs($resp, array(2990), array(1810));

//test with map subdomain
$I->sendGet('/maps/violenciasexualnobrasil/collaborators/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/violenciasexualnobrasil/collaborators/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapUserObjs($resp, array(2990), array(1810));

//test count with map_id
$I->sendGet('/maps/1810/collaborators/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/1810/collaborators/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 1));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test count with map subdomain
$I->sendGet('/maps/violenciasexualnobrasil/collaborators/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/violenciasexualnobrasil/collaborators/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 1));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test with map_id
$I->sendGet('/maps/1605/collaborators/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1605/collaborators/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps_collaborators' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test with map subdomain
$I->sendGet('/maps/comunemessina/collaborators/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/collaborators/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps_collaborators' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test count with map_id
$I->sendGet('/maps/1605/collaborators/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/1605/collaborators/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test count with map subdomain
$I->sendGet('/maps/comunemessina/collaborators/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/collaborators/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test count with map_id that doesn't exist
$I->sendGet('/maps/10101001/collaborators/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/10101001/collaborators/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps_collaborators' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test with map subdomain that doesn't exist
$I->sendGet('/maps/thismadoesntexist/collaborators/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/thismadoesntexist/collaborators/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps_collaborators' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test count with map_id that doesn't exist
$I->sendGet('/maps/10101001/collaborators/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/10101001/collaborators/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test count with map subdomain that doesn't exist
$I->sendGet('/maps/thismadoesntexist/collaborators/', array('count' => TRUE, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/thismadoesntexist/collaborators/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('count' => 0));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));