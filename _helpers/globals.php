<?php
/*
Global Variables
*/


/*
Auth
*/

/* test basic auth */
define('LOGIN_URL','/session/login/');
define('GOOD_USERNAME', 'zackhalloran');
define('GOOD_PASSWORD', 'pisser');
define('BAD_USERNAME', 'badusername');
define('BAD_PASSWORD', 'badpassword');

/* account for testing access control */

define('ACCESS_USERNAME', 'accesscontrol');
define('ACCESS_PASSWORD', 'password');


/*
Posts
*/

define('DEFAULT_POST_LIMIT',20);