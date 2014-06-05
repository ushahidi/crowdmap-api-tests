<?php
namespace Codeception\Module;

class AuthHelper extends \Codeception\Module
{
	
	public static function _generate_signature($url, $method, $publickey, $privatekey) {
		$date = time();
		return 'A' . $publickey . hash_hmac('sha1', "{$method}\n{$date}\n{$url}\n", $privatekey);
	}
	
	public static function api_key_for_crowdmap($url, $method) {
		$publickey = '736D736163634784';
		$privatekey = '736D736163630965';
		return self::_generate_signature($url, $method, $publickey, $privatekey);
	}
	
	public static function api_key_for_accesscontrol($url, $method) {
		$publickey = '736D736163636573';
		$privatekey = '736D736163636573';
 		return self::_generate_signature($url, $method, $publickey, $privatekey);
	}	
}