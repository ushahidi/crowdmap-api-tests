<?php
$I = new PostGuy($scenario);
$I->wantTo('perform requests for posts');
$I->haveHttpHeader('Content-Type', 'text/html');
$I->haveHttpHeader('User-Agent', 'Api Test/0.1');

$I->sendGet('/posts/', array('map_ids' => '17', 'fields' => 'maps.map_id,posts.user_id'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('posts' => array(0 => array('maps' => array('map_id' => 17), 'post_id' => 69))));
$I->dontSeeResponseContainsJson(array('posts' => array(0 => array('maps' => array('map_id' => 17), 'post_id' => 978), 1 => array('maps' => array('map_id' => 17), 'post_id' => 69))));

$I->sendGet('/posts/', array('map_ids' => '17,18', 'fields' => 'maps.map_id,posts.user_id'));
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 200));
$I->seeResponseContainsJson(array('success' => true));
$I->seeResponseContainsJson(array('posts' => array(0 => array('maps' => array('map_id' => 18), 'post_id' => 4708), 1 => array('maps' => array(0 => array('map_id' => 20), 1 => array('map_id' => 18)), 'post_id' => 1063), 2 => array('maps' => array('map_id' => 18), 'post_id' => 101), 3 => array('maps' => array('map_id' => 18), 'post_id' => 83), 4 => array('maps' => array('map_id' => 18), 'post_id' => 82), 5 => array('maps' => array('map_id' => 18), 'post_id' => 72), 6 => array('maps' => array('map_id' => 17), 'post_id' => 69))));