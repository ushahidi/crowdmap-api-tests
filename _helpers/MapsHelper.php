<?php
namespace Codeception\Module;

// here you can define custom functions for MapsGuy 

class MapsHelper extends \Codeception\Module
{

	//comprehensive check of the map objects returned by a map request
	function checkMapObjs($resp, $map_ids, $new_ids=array(), $update_ids=array())
	{
		$RESTmaps = json_decode($resp, true);
		
		$maps = fixtures::mapsArray();
		
		$this->assertEquals(count($RESTmaps['maps']), count($map_ids));
		
		foreach ($RESTmaps['maps'] as $index => $map)
		{
			$this->assertEquals($map, $maps[$map_ids[$index]]);
		}
	}
	
	//comprehensive check of the users objects returned
	function checkMapUserObjs($resp, $user_ids, $map_ids, $new_ids=array(), $update_ids=array())
	{
		$RESTusers = json_decode($resp, true);
		
		if(isset($RESTusers['following_maps']))
			$RESTusers['users_list'] = $RESTusers['following_maps'];
		if(isset($RESTusers['maps_collaborators']))
			$RESTusers['users_list'] = $RESTusers['maps_collaborators'];
		if(isset($RESTusers['owner']))
			$RESTusers['users_list'] = array(array('users' => array($RESTusers['owner'])));

		$this->assertEquals(count($RESTusers['users_list']), count($map_ids));

		foreach ($RESTusers['users_list'] as $index => $user)
		{
			if (!isset($RESTusers['owner'])) {
				$this->assertEquals($user['user_id'], $user_ids[$index]);
				$this->assertEquals($user['map_id'], $map_ids[$index]);
			} else {
				$user['users'][0]['avatar'] = null;
			}
			$users = json_encode($user);
			$this->getModule('UserHelper')->checkUserObjs($users, array($user_ids[$index]));
		}
	}
	
	//comprehensive check of the settings objects returned
	function checkSettingsObjs($resp, $settings, $new_settings=array(), $update_settings=array())
	{
		$RESTsettings = json_decode($resp, true);
		
		$map_settings = fixtures::mapSettingsArray();
		
		$this->assertEquals(count($RESTsettings['maps_settings']), count($settings));
		
		foreach ($RESTsettings['maps_settings'] as $index => $setting)
		{
			$this->assertEquals($setting, $map_settings[$settings[$index]]);
		}
	}	
	
}
