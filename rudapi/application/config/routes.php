<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// master data
$route['master-provinsi']		= 'masters/provinsi/ambildata';
$route['master-kabupaten']		= 'masters/kabupaten/ambildata';
$route['master-kecamatan']		= 'masters/kecamatan/ambildata';
$route['master-kelurahan']		= 'masters/kelurahan/ambildata';
$route['master-sumber']			= 'masters/sumber/ambildata';
$route['master-direktorat']		= 'masters/direktorat/ambildata';

// api post data
$route['data-post']	= 'post/ambildata';

// frontend
$route['default_controller']	= 'auth';
$route['produk-las-murah']		= 'produk/index';
$route['produk/(:any)']			= 'produk/index/$1';
$route['produk-detail/(:any)']	= 'produk/detail/$1';
$route['produk-tambah']			= 'produk/tambah';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
