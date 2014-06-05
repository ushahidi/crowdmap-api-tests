<?php
namespace Codeception\Module;

// here you can define custom functions for LocationsGuy 

class LocationsHelper extends \Codeception\Module
{	

	//comprehensive check of the post objects returned by a posts request
	function checkLocationObjs($resp, $location_ids, $new_ids=array(), $update_ids=array())
	{
		$RESTlocations = json_decode($resp, true);
		
		$locations = fixtures::locationsArray();
		
		foreach ($RESTlocations['locations'] as $index => $location)
		{
			$this->assertEquals($location, $locations[$location_ids[$index]]);
		}
	}

}
