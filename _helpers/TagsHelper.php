<?php
namespace Codeception\Module;

// here you can define custom functions for MapsGuy 

class TagsHelper extends \Codeception\Module
{
	
	//comprehensive check of the settings objects returned
	function checkTagsObjs($resp, $tags, $new_tags=array(), $update_tags=array())
	{
		$RESTtags = json_decode($resp, true);
		
		$tags_array = fixtures::tagsArray();
		
		if(isset($RESTtags['maps_tags']))
			$RESTtags['tags'] = $RESTtags['maps_tags'];
			
		$this->assertEquals(count($RESTtags['tags']), count($tags));			
		
		foreach ($RESTtags['tags'] as $index => $tag)
		{
			$this->assertEquals($tag, $tags_array[$tags[$index]]);
		}
	}
	
}
