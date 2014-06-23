<?php
$I = new MapsGuy($scenario);
$I->wantTo('test DELETE request against the /maps/:map_id/ end-point with apikey & session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);	
$I->seeResponseIsJson();
$session = $I->getSession();

//test request where user is not map owner
$I->sendDelete('/maps/1/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1/', 'DELETE'), 'session'=> (string) $session));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'Only the owner can delete this map.'));

//make sure map has not been deleted
$I->sendGet('/maps/1/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test request where user is map owner
$I->sendDelete('/maps/2/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/2/', 'DELETE'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('message' => 'Map 2 has been deleted.'));

//make sure map has been deleted
$I->sendGet('/maps/2/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/2/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('error' => 'Map not found.'));
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));

//make sure posts_maps have been deleted
$I->sendGet('/maps/2/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/2/posts/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('posts' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//make sure posts_maps have been deleted
$I->sendGet('/posts/8883/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/2/posts/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->dontSeeResponseContainsJson(array('map_id' => 2));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//make sure posts_maps for other maps have not been deleted
$I->sendGet('/maps/1605/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1605/posts/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(8086,7972,7651));

//make sure maps_collaborators have been deleted for this map
$I->sendGet('/maps/2/collaborators/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/2/collaborators/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps_collaborators' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//make sure maps_collaborators for other maps have not been deleted
$I->sendGet('/maps/1810/collaborators/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1810/collaborators/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapUserObjs($resp, array(2990), array(1810));


//make sure maps_collaborators have been deleted for this map
$I->sendGet('/maps/2/settings/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/2/settings/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('maps_settings' => array()));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//make sure maps_settings for other maps have not been deleted
$I->sendGet('/maps/27/settings/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/27/settings/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkSettingsObjs($resp, array(20,1506));

//make sure tags have been deleted for this map
$I->sendGet('/maps/2/tags/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/2/tags/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Map not found."));

//make sure maps_tags for other maps have not been deleted
$I->sendGet('/maps/1/tags/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkTagsObjs($resp, array('dear leader','instagram','kim jong un','korea','north korea','social media'));

//make sure follower have been deleted for this map
$I->sendGet('/maps/2/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/followers/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('following_maps' => array()));

//make sure followers for other maps have not been deleted
$I->sendGet('/maps/1605/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/comunemessina/followers/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapUserObjs($resp, array(2672, 2728), array(1605, 1605));

//make sure owner_map_id has been set to 0 for all map owned posts
$I->sendGet('/posts/', array('post_ids' => '279,1549', 'apikey'=> (string) $I->api_key_for_crowdmap('/posts', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('owner_map_id' => 0));
$I->dontSeeResponseContainsJson(array('owner_map_id' => 2));

//make sure owner_map_id has not been changed for map owned posts for map_id != 2
$I->sendGet('/posts/264/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/264/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('owner_map_id' => 27));