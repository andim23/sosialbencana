<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['aktivasi/(:any)'] = 'Auth/aktivasi/$1';
$route['login'] = 'Home/login';
$route['register'] = 'Home/register';
$route['logout'] = 'Home/logout';

/**
 * ADMIN
 */
// USER
$route['admin/user/tambah'] = 'Admin/tambahuser';
$route['admin/user/detail/(:any)'] = 'Admin/detailuser/$1';
$route['admin/user/edit/(:any)'] = 'Admin/edituser/$1';
$route['admin/user/hapus/(:any)'] = 'Admin/hapususer/$1';