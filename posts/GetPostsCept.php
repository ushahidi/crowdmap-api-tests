<?php
$I = new PostGuy($scenario);
$I->wantTo('perform requests for posts');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');
$I->sendGet('/posts/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('success'=>true));
$I->seeResponseContainsJson(array('status'=>200));
$resp = $I->grabResponse();
/* passing the response as string because, for some reason, the object generated can't be converted to an array for counting. boooooo */
$I->confirmPostCount($resp,DEFAULT_POST_LIMIT);
$I->checkPostObjs($resp,array(11626,11627,11628,11625,11624,11623,11622,11621,11620,11618,11619,11616,11617,11615,11614,11612,11611,11609,11610,11608));

$I->sendGet('/posts/11626/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/11626/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('success'=>true));
$I->seeResponseContainsJson(array('status'=>200));
$resp = $I->grabResponse();
$I->checkPostObjs($resp,array(11626));

/* Check to make sure images information is being pulled properly */
$I->sendGet('/posts?post_ids=11140,10324', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('success'=>true));
$I->seeResponseContainsJson(array('status'=>200));
$resp = $I->grabResponse();
$I->checkPostObjs($resp,array(11140,10324));

/* Check to make sure tags information is being pulled properly */
$I->sendGet('/posts?post_ids=4164,1423', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('post_id'=>4164));
$I->seeResponseContainsJson(array('post_id'=>1423));
$I->seeResponseContains('"message":"');
$I->seeResponseContains('"tags":[{"tag":"apple"},{"tag":"design"},{"tag":"ios"},{"tag":"technology"},{"tag":"ui"},{"tag":"wwdc"},{"tag":"wwdc201"}],');
$I->seeResponseContains('"tags":[]');
$I->dontSeeResponseContains('"sms_number":"');

/* Check to make sure likes and comments information is being pulled properly */
$I->sendGet('/posts?post_ids=18,20', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('post_id'=>18));
$I->seeResponseContainsJson(array('post_id'=>20));
$I->seeResponseContains('"message":"');
$I->seeResponseContains('"likes":[{"user_id":3},{"user_id":10},{"user_id":8}]');
$I->seeResponseContains('"likes":[]');
$I->seeResponseContains('"comments":[{"comment_id":6,"map_id":0,"user_id":3,"comment":"<p>This post will go down in history as the first \"liked\" post on Crowdmap. ;D<\/p>","date_posted":1363338981}]}]');
$I->seeResponseContainsJson(array('date_updated' => 1363340820));
$I->seeResponseContainsJson(array('date_updated' => 1363338082));
$I->seeResponseContains('"comments":[]');
$I->dontSeeResponseContains('"sms_number":"');

/* Add in check for maps */
$I->sendGet('/posts/2468/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/2468/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('post_id'=>2468));
$I->seeResponseContains('"message":"');
$I->seeResponseContains('"likes":[{"user_id":12},{"user_id":5}]');
$I->seeResponseContains('"maps":[{"approved":true,"map_id":154,"users":{"user_id":26,"crowdmap_id":"Z0STS4NnzjZcfaKvlCjzCvUnU62lcMaiaUxgcEtI7P6iINvnH99OO2a621BCXRKPhdu0NtB8Ht2anO1KEzZ1t34t0u4GcJtF5o400Qs4t6FrdgEJ2lOTlJkSQxw0tIY7","crowdmap_id_h":"53fabb61447ca2b9ee43164d74c32422","username":"angela","name":"Angela Oduor","bio":"Smily, bubbly but paranoid Ukrainian born Kenyan ;)..\nDev @ushahidi, @crowdmap tech support. Geek in Pink ;)","plus":true,"baselayer":"esri_worldstreet","instagram_auto_post":true,"twitter_auto_post":true,"twitter_auto_post_retweets":false,"date_registered":1363705447,"banned":false,"sms_number":false,"sms_confirmed":false');
$I->seeResponseContains('"comments":[]');
$I->dontSeeResponseContains('"sms_number":"');
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(154,42,7));


$I->sendGet('/posts/9870/', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/2468/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('post_id'=>9870));
$I->seeResponseContains('"message":"');
$I->seeResponseContains('"maps":[{"approved":true,"map_id":2311,"users":{"user_id":3753,"crowdmap_id":"57c1817cbb39804565a316122f35b542af65713ee96179297ccbbab29b6f5e4a01fa0dd3e02a585e66880dc5a2602dfa544fb23c5a58480d25e6f4aecfe0b75c","crowdmap_id_h":"b1b4f34ec0c8ffffaa02a9e9c494ac30","username":"megapixel","name":"oded","bio":"","plus":false,"baselayer":"crowdmap_satellite","instagram_auto_post":false,"twitter_auto_post":false,"twitter_auto_post_retweets":false,"date_registered":1377774323,"banned":false,"sms_number":false,"sms_confirmed":false,"avatar":null},"user_id":3753,"app_id":1,"subdomain":"tweentower","name":"tweentower","description":null,"banner":null,"avatar":"https:\/\/crowdmap.com\/assets\/img\/default-map-avatar.png","public":true,"moderation":"auto","date_created":1377774447,"center":{"type":"Point","coordinates":[41.35708069185,12.016165131826]},"post_count":4,"marker":false},{"approved":true,"map_id":1772,"users":{"user_id":2580,"crowdmap_id":"5667f97da6ffccc43137de9650834a0e1d4d3f8ebc93202d9af358fd5ec18eaf7f4fe072c60a3feff54b21b4ea2883f8a25478748c5a8ffa4e08494e799f9b05","crowdmap_id_h":"35ca0383ea2384076977d6422f03cee7","username":"wildlifewatch","name":"Wildlife Guardias","bio":"","plus":false,"baselayer":"osm_default","instagram_auto_post":false,"twitter_auto_post":false,"twitter_auto_post_retweets":false,"date_registered":1373017873,"banned":false,"sms_number":false,"sms_confirmed":false,"avatar":null},"user_id":2580,"app_id":1,"subdomain":"wildllifewatchkenya","name":"Wildlife Guardias Kenya","description":"This map allows citizens and tourists to report poaching threats and incidents in the country","banner":null,"avatar":"https:\/\/crowdmap.com\/assets\/img\/default-map-avatar.png","public":true,"moderation":"collaborator","date_created":1374317635,"center":{"type":"Point","coordinates":[37.69268693781,-2.3089127997387]},"post_count":6,"marker":false},{"approved":true,"map_id":1548,"users":{"user_id":2580,"crowdmap_id":"5667f97da6ffccc43137de9650834a0e1d4d3f8ebc93202d9af358fd5ec18eaf7f4fe072c60a3feff54b21b4ea2883f8a25478748c5a8ffa4e08494e799f9b05","crowdmap_id_h":"35ca0383ea2384076977d6422f03cee7","username":"wildlifewatch","name":"Wildlife Guardias","bio":"","plus":false,"baselayer":"osm_default","instagram_auto_post":false,"twitter_auto_post":false,"twitter_auto_post_retweets":false,"date_registered":1373017873,"banned":false,"sms_number":false,"sms_confirmed":false,"avatar":null},"user_id":2580,"app_id":1,"subdomain":"wildlifewatch","name":"Wildlife Watchers","description":null,"banner":null,"avatar":"https:\/\/crowdmap.com\/assets\/img\/default-map-avatar.png","public":true,"moderation":"collaborator","date_created":1373017930,"center":{"type":"Point","coordinates":[39.650774002075,-4.0513473323832]},"post_count":0,"marker":false}]');
$I->seeResponseContains('"comments":[]');
$I->dontSeeResponseContains('"sms_number":"');
$resp = $I->grabResponse();
$I->checkMapObjs($resp, array(2311,1772,1548));

//check request for only maps.name and maps.description
$I->sendGet('/posts/?fields=maps.name,maps.description', array('apikey'=> (string) $I->api_key_for_crowdmap('/posts/', 'GET')));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('{"posts":[{"maps":[],"post_id":11626},{"maps":[],"post_id":11627},{"maps":[],"post_id":11628},{"maps":[],"post_id":11625},{"maps":[],"post_id":11624},{"maps":[],"post_id":11623},{"maps":[],"post_id":11622},{"maps":[],"post_id":11621},{"maps":[],"post_id":11620},{"maps":[],"post_id":11618},{"maps":[],"post_id":11619},{"maps":[],"post_id":11616},{"maps":[],"post_id":11617},{"maps":[],"post_id":11615},{"maps":[],"post_id":11614},{"maps":[],"post_id":11612},{"maps":[],"post_id":11611},{"maps":[],"post_id":11609},{"maps":[],"post_id":11610},{"maps":[{"map_id":1810,"name":"Viol');
