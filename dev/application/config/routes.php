<?php
defined('BASEPATH') OR exit('No direct script access allowed');

global $SConfig;

$route['default_controller'] = $SConfig->_first_page;
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// BAGIAN AUTH / LOGIN
	$route['login'] = 'admin/auth';
	$route['auth'] = 'admin/auth';

