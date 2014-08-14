<?php
$I = new UserGuy($scenario);
$I->wantTo('test POST request against the /user/:user_id/followers end-point with apikey');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->sendPost('/users/7977/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/7977/followers/', 'POST'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

$I->sendPost('/users/9b6f57db48ecc5ae4fab0c5c990143f7a241db380288011523b26c398137bf83773dca2f08b4344363d98e4ed6d31741bbd26eb2da296ad75263e9ba1090fca8/followers/',
  array('apikey'=> (string) $I->api_key_for_crowdmap('/users/9b6f57db48ecc5ae4fab0c5c990143f7a241db380288011523b26c398137bf83773dca2f08b4344363d98e4ed6d31741bbd26eb2da296ad75263e9ba1090fca8/followers/', 'POST'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

$I->sendPost('/users/sarahmorden/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/sarahmorden/followers/', 'POST'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

$I->sendPost('/users/sarahmorden/followers/4983/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/sarahmorden/followers/4983/', 'POST'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

$I->sendPost('/users/3436/followers/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/3436/followers/', 'POST'));
$I->seeResponseCodeIs(401);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 401));
$I->seeResponseContainsJson(array('success' => false));
$I->seeResponseContainsJson(array('error' => 'This action requires a valid session.'));

$I->sendPost('/users/3436/followers/11234/', array('apikey'=> (string) $I->api_key_for_crowdmap('/users/3436/followers/11234/', 'POST'));
$I->seeResponseCodeIs(404);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 404));
$I->seeResponseContainsJson(array('success' => false));
