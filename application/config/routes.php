<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Auth';
$route['Change%(:any)'] = 'Systems/Change/';
$route['Dashboard'] = 'Applications/Dashboard/index/';
$route['Signin'] = 'Auth/index/';
$route['404_override'] = 'Error_404';
$route['translate_uri_dashes'] = false;