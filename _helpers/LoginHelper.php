<?php
namespace Codeception\Module;

class LoginHelper extends \Codeception\Module
{	

	function logInByUsername($username, $password, $apikey) {
		$this->getModule('REST')->haveHttpHeader('Content-Type', 'text/html');
		$this->getModule('REST')->haveHttpHeader('User-Agent', 'Api Test/0.1');
		$this->getModule('REST')->sendPOST(LOGIN_URL, array('apikey'=>$apikey, 'username'=>$username, 'password'=>$password));
	}

	function logInByEmail($email, $password, $apikey) {
		$this->getModule('REST')->haveHttpHeader('Content-Type', 'text/html');
		$this->getModule('REST')->haveHttpHeader('User-Agent', 'Api Test/0.1');
		$this->getModule('REST')->sendPOST(LOGIN_URL, array('apikey'=>$apikey, 'email'=>$email, 'password'=>$password));
	}
	
	function loginWithMalformedParameters($username, $password, $apikey) {
		$this->getModule('REST')->haveHttpHeader('Content-Type', 'text/html');
		$this->getModule('REST')->haveHttpHeader('User-Agent', 'Api Test/0.1');
		$this->getModule('REST')->sendPOST(LOGIN_URL, array('apikey'=>$apikey, 'username'=>$username, 'passw'=>$password));
	}
	
	function getSession() {
		$this->getModule('REST')->seeResponseContains('"session":');
		$session = $this->getModule('REST')->grabDataFromJsonResponse('session');
		return $session;
	}
}