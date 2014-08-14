<?php
$I = new MapsGuy($scenario);
$I->wantTo('test DELETE request against the /maps/:map_id/settings end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

// test delete map setting with existing setting
$I->sendDelete('/maps/sweetmaps/settings/baselayer/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/sweetmaps/settings/baselayer/', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

//test individual settings is not deleted
$I->sendGet('/maps/sweetmaps/settings/baselayer/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/sweetmaps/settings/baselayer/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkSettingsObjs($resp, array(20));

// test delete map setting with existing setting
$I->sendDelete('/maps/sweetmaps/settings/sponsorshipHTML/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/sweetmaps/settings/sponsorshipHTML/', 'DELETE')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

$I->sendGet('/maps/sweetmaps/settings/sponsorshipHTML/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/sweetmaps/settings/sponsorshipHTML/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkSettingsObjs($resp, array(1506));

$I->sendGet('/maps/sweetmaps/settings/null/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/sweetmaps/settings/null/', 'GET')));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));
