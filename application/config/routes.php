<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// Admin
$route['login_admin']	 = 'admin/login';
$route['register_admin'] = 'admin/register';
$route['loginp_admin']	 = 'admin/loginp_admin';
$route['admin/(:any)']	 = 'admin/dash_admin/$1';


// ke edit artikel
$route['ke_edit/artikel/(:num)'] = 'artikel/ke_edit/$1';


//Hapus
$route['hapus/kategori/(:num)'] = 'kategori/hapus/$1';
$route['hapus/freelancer/(:num)'] = 'freelancer/hapus/$1';
$route['hapus/artikel/(:num)'] = 'artikel/hapus/$1';


//Tambah
$route['tambah/artikel'] = 'artikel/tambah';
$route['tambah/kategori'] = 'kategori/tambah';
$route['tambah/user/freelancer'] = 'freelancer/tambah_user';
$route['tambah/freelancer'] = 'freelancer/tambah';
$route['tambah/komentar'] = 'komentar/tambah';
$route['register/freelancer'] = 'freelancer/bef';

//edit
$route['edit/kategori/(:num)'] = 'kategori/edit/$1';
$route['edit/freelancer/(:num)'] = 'freelancer/edit/$1';
$route['edit/artikel/(:num)'] = 'artikel/edit/$1';
$route['publishkan/(:num)'] = 'artikel/publishkan/$1';
$route['draftkan/(:num)'] = 'artikel/draftkan/$1';
$route['edit/fotoProfile'] = 'u/editFotoProfile';


$route['edit/status_komentar/(:num)/(:num)'] = 'komentar/edit/$1/$2';


// Freelancer
$route['freelancer/(:any)']	= 'admin/dash_freelancer/$1';
$route['mystore']           = 'admin/index';



// Guest
$route['artikel/(:any)']	= 'user/ke_detail/$1';
$route['pencarian']			= 'user/ke_pencarian';
$route['explore']           = 'user/ke_explore';



// U (User/Guest)
$route['register']			= 'u/ke_register';
$route['prosesRegister']	= 'u/prosesRegister';

$route['login']			= 'u/ke_login';
$route['prosesLogin']	= 'u/prosesLogin';

$route['logout']			= 'u/logout';

$route['guest']     = 'user/lp2';

$route['ubahUsername']			= 'user/ubahUsername';
$route['ubahPassword']			= 'user/ubahPassword';

$route['profile/(:any)/(:any)']	= 'user/ke_profile/$1/$2';

$route['prosesSuka/(:num)/(:any)'] = 'suka/tambah_suka/$1/$2';
$route['prosestdk_suka/(:num)/(:any)'] = 'suka/tambah_tdksuka/$1/$2';


$route['kategori/(:any)']   = 'kategori/ke_detail/$1';

$route['list/design']       = 'user/ke_design';
$route['design/logo']       = 'user/ke_logo';



$route['logout'] = 'admin/logout';
$route['default_controller'] = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
