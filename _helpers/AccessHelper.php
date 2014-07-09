<?php
namespace Codeception\Module;

// here you can define custom functions for AccessGuy 

class AccessHelper extends \Codeception\Module
{

	function testSmsNumberAssertions ($apikey, $session, $resource_url, $authorized=False) {
		//set context
		$I = $this->getModule('REST');
		
		/*
		
		request posts associated with map 391
		
		*/
		
		$I->sendGet($resource_url, array('apikey'=> (string) $apikey, 'session'=> (string) $session));
		$I->seeResponseCodeIs(200);
		$I->seeResponseIsJson();
		$I->seeResponseContainsJson(array('post_id'=>811));
		$I->seeResponseContainsJson(array('post_id'=>825));
		$I->dontSeeResponseContains('"sms_submitted_by":');
		$I->dontSeeResponseContainsJson(array('sms_submitted_by'=>'4444444444'));
		$I->dontSeeResponseContainsJson(array('sms_submitted_by'=>'1234567891'));
		
		/*
		
		request posts associated with map 391, specifying the sms_number field
		
		 */
		$I->sendGet($resource_url, array('apikey'=> (string) $apikey, 'session'=> (string) $session, 'fields'=>'posts.sms_number'));
		$I->seeResponseCodeIs(200);
		$I->seeResponseIsJson();
		$I->seeResponseContainsJson(array('post_id'=>811));
		$I->seeResponseContainsJson(array('post_id'=>825));
		if (!$authorized) {
			$I->dontSeeResponseContains('"sms_submitted_by":');
			$I->dontSeeResponseContainsJson(array('sms_submitted_by'=>'4444444444'));
			$I->dontSeeResponseContainsJson(array('sms_submitted_by'=>'1234567891'));
		}
		else {
			$I->seeResponseContains('"sms_submitted_by":');
			$I->seeResponseContainsJson(array('sms_submitted_by'=>'4444444444'));
			$I->seeResponseContainsJson(array('sms_submitted_by'=>'1234567891'));			
		}
		
		/*
		
		request posts associated with map 391, specifying post_id 811
		
		*/
		
		$I->sendGet($resource_url, array('apikey'=> (string) $apikey, 'session'=> (string) $session, 'posts_ids'=>811));
		$I->seeResponseCodeIs(200);
		$I->seeResponseIsJson();
		$I->seeResponseContainsJson(array('post_id'=>811));
		$I->dontSeeResponseContains('"sms_submitted_by":');
		$I->dontSeeResponseContainsJson(array('sms_submitted_by'=>'4444444444'));
		
		/*
		
		request posts associated with map 391, specifying post_id 825
		
		*/
		
		$I->sendGet($resource_url, array('apikey'=> (string) $apikey, 'session'=> (string) $session, 'posts_ids'=>825));
		$I->seeResponseCodeIs(200);
		$I->seeResponseIsJson();
		$I->seeResponseContainsJson(array('post_id'=>825));
		$I->dontSeeResponseContains('"sms_submitted_by":');
		$I->dontSeeResponseContainsJson(array('sms_submitted_by'=>'1234567891'));
		
		/*
		
		request posts associated with map 391, specifying post_id 811 and the sms_number field
		
		*/
		
		$I->sendGet($resource_url, array('apikey'=> (string) $apikey, 'session'=> (string) $session, 'posts_ids'=>811, 'fields'=>'posts.sms_number'));
		$I->seeResponseCodeIs(200);
		$I->seeResponseIsJson();
		$I->seeResponseContainsJson(array('post_id'=>811));
		if (!$authorized) {
			$I->dontSeeResponseContains('"sms_submitted_by":');
			$I->dontSeeResponseContainsJson(array('sms_submitted_by'=>'4444444444'));
		}
		else {
			$I->seeResponseContains('"sms_submitted_by":');
			$I->seeResponseContainsJson(array('sms_submitted_by'=>'4444444444'));			
		}
		
		
		/*
		
		request posts associated with map 391, specifying post_id 825 and the sms_number field
		
		*/
		
		$I->sendGet($resource_url, array('apikey'=> (string) $apikey, 'session'=> (string) $session, 'posts_ids'=>825, 'fields'=>'posts.sms_number'));
		$I->seeResponseCodeIs(200);
		$I->seeResponseIsJson();
		$I->seeResponseContainsJson(array('post_id'=>825));
		if (!$authorized) {
			$I->dontSeeResponseContains('"sms_submitted_by":');
			$I->dontSeeResponseContainsJson(array('sms_submitted_by'=>'1234567891'));
		}
		else {
			$I->seeResponseContains('"sms_submitted_by":');
			$I->seeResponseContainsJson(array('sms_submitted_by'=>'1234567891'));			
		}
	}
}
