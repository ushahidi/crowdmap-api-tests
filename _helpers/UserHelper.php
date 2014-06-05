<?php
namespace Codeception\Module;

// here you can define custom functions for userguy 

class UserHelper extends \Codeception\Module
{
	
	function checkUserObjs($resp, $user_ids, $new_ids=array(), $update_ids=array())
	{
		$RESTusers = json_decode($resp, true);
		
		$users = fixtures::usersArray();
		
		foreach ($RESTusers['users'] as $index => $user)
		{
			//if update ids have been passed, checks to make sure the date_updated value is greater than before,
			//then sets the date_updated value of the response to the expected value to test the rest of the object
			if (in_array($user['user_id'],$update_ids)) {
				$this->assertTrue($user['date_updated'] > $users[$user_ids[$index]]['date_updated']);
				$user['date_updated'] = $users[$user_ids[$index]]['date_updated'];
			}
			$this->assertEquals($user, $users[$user_ids[$index]]);
		}
	}
	
}
