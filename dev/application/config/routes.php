<?php
defined('BASEPATH') OR exit('No direct script access allowed');
global $SConfig;

$route['default_controller'] = $SConfig->_first_page;
$route['404_override'] = 'ErrorsController/not_found';
$route['translate_uri_dashes'] = TRUE;

// BAGIAN AUTH / LOGIN
$route['login'] = 'admin/auth';
$route['auth'] = 'admin/auth';