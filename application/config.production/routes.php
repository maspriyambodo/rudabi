<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Auth';
$route['Change%(:any)'] = 'Systems/Change/';
$route['epa'] = 'Applications/PAI/Epa/index/';
$route['epa/prov'] = 'Applications/PAI/Epa/Provinsi/';
$route['Setting%20Profile'] = 'Systems/Profile/';
$route['Dashboard'] = 'Applications/Dashboard/index/';
$route['Signin'] = 'Auth/index/';
$route['404_override'] = 'Error_404';
$route['translate_uri_dashes'] = false;