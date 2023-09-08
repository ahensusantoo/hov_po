<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['db_error'] = array(
    'class' => 'ErrorHook', // Ganti dengan nama class hook yang telah Anda buat
    'function' => 'show_database_error',
    'filename' => 'ErrorHook.php',
    'filepath' => 'hooks',
);

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
