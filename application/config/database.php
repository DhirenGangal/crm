<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	//'hostname' => '50.62.209.47:3306',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'scie',
    //'username' => 'scie_admin_8c27',
    //'password' => 'Cz#wa466',
    //'database' => 'SCIE_Products_db',
   /* 'username' => 'bhargavc_scieu',
    'password' => 'YVT~A-*%${%qfo',
    'database' => 'bhargavc_scie',*/
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => TRUE, // (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
