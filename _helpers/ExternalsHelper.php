<?php
namespace Codeception\Module;

// here you can define custom functions for ExternalsGuy 

class ExternalsHelper extends \Codeception\Module
{

	function checkExternalsObjs($resp, $external_ids, $new_ids=array(), $udpate_ids=array())
	{
		
		$externals = fixtures::externalsArray();
		$RESTexternals = json_decode($resp, true);
		
		foreach ($RESTexternals['externals'] as $index => $external) {
			$check = $externals[$external['external_id']];
			//this addes a datetime value for newly created externals so that the rest of the object can be compared.
			if (in_array($external_ids[$index], $new_ids))
				$check['datetime'] = $external['datetime'];
				
			//checks to see if there is a selected flag in any of the images associated with the external object
			//in the fixture and removes it. This is necessary because external objects are represented differently
			//in different response objects
			
			foreach ($check['images'] as $key => $value) {	
				unset($check['images'][$key]['selected']);
			}
			$this->assertEquals($external['external_id'], $external_ids[$index]);
			$this->assertEquals($external, $check);
		}
		
	}
	
}