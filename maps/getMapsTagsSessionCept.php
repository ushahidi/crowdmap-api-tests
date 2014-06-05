<?php
$I = new MapsGuy($scenario);
$I->wantTo('test GET request against the /maps/tags(/:tag) and /maps/:map_id/tags(/:tag) end-points with apikey and session');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->logInByUsername(GOOD_USERNAME,GOOD_PASSWORD,$I->api_key_for_crowdmap(LOGIN_URL,'POST'));
$I->seeResponseCodeIs(200);	
$I->seeResponseIsJson();
$session = $I->getSession();

//tests for /maps/tags(/:tag)

$I->sendGet('/maps/tags/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkTagsObjs($resp, array('dear leader','instagram','kim jong un','korea','north korea','social media','beans','cafe','coffee','global','travel','crepes','pancake','pancakes','burger','burgers','austin','barbecue','food','texas'));

$I->sendGet('/maps/tags/pancakes', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/pancakes', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkTagsObjs($resp, array('pancakes'));

//test count

$I->sendGet('/maps/tags/', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => "4356"));

$I->sendGet('/maps/tags/korea', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/korea', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => "5"));

//test tags that don't exist
$I->sendGet('/maps/tags/notatag', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/notatag', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Tags not found."));

$I->sendGet('/maps/tags/notatag', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/tags/notatag', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Tags not found."));

//tests for /maps/:map_id/tags(/:tag)

$I->sendGet('/maps/northkoreasocial/tags/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/northkoreasocial/tags/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkTagsObjs($resp, array('dear leader','instagram','kim jong un','korea','north korea','social media'));

$I->sendGet('/maps/1/tags/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1/tags/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkTagsObjs($resp, array('dear leader','instagram','kim jong un','korea','north korea','social media'));

$I->sendGet('/maps/1/tags/dear+leader', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1/tags/dear+leader', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$resp = $I->grabResponse();
$I->checkTagsObjs($resp, array('dear leader'));

$I->sendGet('/maps/1/tags/', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/1/tags/dear+leader', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => "6"));

//test of a tag that apears on multiple maps to make sure this only returns the count for the current map.
$I->sendGet('/maps/1/tags/korea', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/1/tags/korea', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('count' => "1"));

//tests for map that doesn't exist

$I->sendGet('/maps/notamap/tags/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/notamap/tags/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Map not found."));

$I->sendGet('/maps/notamap/tags/notatag', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/notamap/tags/notatag', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Map not found."));

$I->sendGet('/maps/notamap/tags/', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/notamap/tags/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Map not found."));

$I->sendGet('/maps/notamap/tags/notatag', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/notamap/tags/notatag', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Map not found."));

$I->sendGet('/maps/1010101010/tags/', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1010101010/tags/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Map not found."));

$I->sendGet('/maps/1010101010/tags/notatag', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1010101010/tags/notatag', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Map not found."));

$I->sendGet('/maps/1010101010/tags/', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/1010101010/tags/', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Map not found."));

$I->sendGet('/maps/1010101010/tags/notatag', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/1010101010/tags/notatag', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Map not found."));

//tests for tag that doesn't exist

$I->sendGet('/maps/northkoreasocial/tags/notatag', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/northkoreasocial/tags/notatag', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Tags not found."));

$I->sendGet('/maps/northkoreasocial/tags/notatag', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/northkoreasocial/tags/notatag', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Tags not found."));

$I->sendGet('/maps/1/tags/notatag', array('apikey'=> (string) $I->api_key_for_crowdmap('/maps/1/tags/notatag', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Tags not found."));

$I->sendGet('/maps/1/tags/notatag', array('count'=>true, 'apikey'=> (string) $I->api_key_for_crowdmap('/maps/1010101010/tags/notatag', 'GET'), 'session'=> (string) $session));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => "Tags not found."));