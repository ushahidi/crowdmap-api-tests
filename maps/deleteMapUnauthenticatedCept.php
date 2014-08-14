<?php
$I = new MapsGuy($scenario);
$I->wantTo('test DELETE request against the /maps/:map_id/ end-point without authentication');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

//test request where user is not map owner
$I->sendDelete('/maps/1/');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

//test request where user is not map owner
$I->sendDelete('/maps/1 /');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

//make sure map has not been deleted
$I->sendGet('/maps/1/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//test request where user is map owner
$I->sendDelete('/maps/2/');
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires an API token or a valid session.'));

//make sure map has not been deleted
$I->sendGet('/maps/2/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//make sure posts_maps have not been deleted
$I->sendGet('/maps/2/posts/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$empty_array = array();
$I->seeResponseContainsJson(array('posts' => array(array('post_id'=>8883),array('post_id'=>4407),array('post_id'=>1718),array('post_id'=>1549),array('post_id'=>572),array('post_id'=>279),array('post_id'=>111),array('post_id'=>109),array('post_id'=>42),array('post_id'=>41),array('post_id'=>8),array('post_id'=>7),array('post_id'=>6))));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//make sure posts_maps have not been deleted
$I->sendGet('/posts/8883/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('map_id' => 2));
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//make sure posts_maps for other maps have not been deleted
$I->sendGet('/maps/1605/posts/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$resp = $I->grabResponse();
$I->checkPostObjs($resp, array(8086,7972,7651));

//make sure maps_collaborators have not been deleted for this map
$I->sendGet('/maps/2/collaborators/', array('fields'=> 'users.user_id'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('{"maps_collaborators":[{"users":[{"user_id":3,"avatar":null}]},{"users":[{"user_id":13,"avatar":null}]}]');
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//make sure maps_collaborators for other maps have not been deleted
$I->sendGet('/maps/1810/collaborators/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapUserObjs($resp, array(2990), array(1810));


//make sure maps_collaborators have been deleted for this map
$I->sendGet('/maps/2/settings/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('"maps_settings":[{"maps_settings_id":2,"map_id":2,"setting":"baselayer","value":"crowdmap_cucumber"},{"maps_settings_id":144,"map_id":2,"setting":"css","value":"#titleContainer {\nbackground-image: url(https:\/\/9ac99dfdc507a28548a2-3f1929977a94a401958ec9ca819136ac.ssl.cf1.rackcdn.com\/5243223913_bd0d130437_o.png);\n}\n#contentContainer {\nbackground-image: none;\n}"}]');
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));

//make sure maps_settings for other maps have not been deleted
$I->sendGet('/maps/27/settings/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkSettingsObjs($resp, array(20,1506));

//make sure tags have been deleted for this map
$I->sendGet('/maps/2/tags/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkTagsObjs($resp, array('beans','cafe','coffee'));

//make sure maps_tags for other maps have not been deleted
$I->sendGet('/maps/1/tags/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkTagsObjs($resp, array('dear leader','instagram','kim jong un','korea','north korea','social media'));

//make sure follower has not been deleted for this map
$I->sendGet('/maps/2/followers/', array('fields'=> 'users.user_id'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContains('"following_maps":[{"users":[{"user_id":3,"avatar":null}]},{"users":[{"user_id":5,"avatar":null}]},{"users":[{"user_id":1127,"avatar":null}]}]');

//make sure followers for other maps have not been deleted
$I->sendGet('/maps/1605/followers/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkMapUserObjs($resp, array(2672, 2728), array(1605, 1605));

//make sure owner_map_id has not been set to 0 for all map owned posts
$I->sendGet('/posts/', array('post_ids' => '279,1549'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('owner_map_id' => 2));
$I->dontSeeResponseContainsJson(array('owner_map_id' => 0));

//make sure owner_map_id has not been changed for map owned posts for map_id != 2
$I->sendGet('/posts/264/');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('owner_map_id' => 27));