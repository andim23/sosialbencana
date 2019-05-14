<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
<<<<<<< HEAD
	'hostname' => 'dinusheroes.com',
	'username' => 'dinusher',
	'password' => 'dinuspolke123',
	'database' => 'dinusher_sosben',
=======
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'sos_ben',
>>>>>>> d34075ff9574bb0b7cd8b48f1c8fde486b0104a1
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
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
