<?php
$I = new MapsGuy($scenario);
$I->wantTo('test DELETE request against the /maps/:map_id/collaborators end-point without authentication');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

// test deleting map collaborator
$I->sendDelete('/maps/1810/collaborators/2990');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

//test collaborator on map was not deleted
$I->sendGet('/maps/1810/collaborators/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapUserObjs($resp, array(2990), array(1810));

// Test deleting map collaborator using map subdomain name
$I->sendDelete('/maps/violenciasexualnobrasil/collaborators/2990');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

//test collaborator on map was not deleted
$I->sendGet('/maps/violenciasexualnobrasil/collaborators/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapUserObjs($resp, array(2990), array(1810));

// Test deleting map non existing collaborator using map subdomain name
$I->sendDelete('/maps/comunemessina/collaborators/2990');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

//test with map subdomain
$I->sendGet('/maps/comunemessina/collaborators/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps_collaborators' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

// Test deleting map non existing collaborator using map subdomain name
$I->sendDelete('/maps/10101001/collaborators/2990');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

//test with map_id that doesn't exist
$I->sendGet('/maps/10101001/collaborators/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps_collaborators' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

// Test deleting map non existing collaborator using non existant map subdomain name
$I->sendDelete('/maps/nonexistantsubdomain/collaborators/2990');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

//test with map_id that doesn't exist
$I->sendGet('/maps/nonexistantsubdomain/collaborators/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps_collaborators' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
