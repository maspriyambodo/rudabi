<?php

//'username' => 'root',
//'password' => 'Masdatin@2020!',
defined('BASEPATH') OR exit('No direct script access allowed');
$active_group = 'default';
$query_builder = true;
$db['default'] = ['dsn' => '',
    'hostname' => 'localhost',
    'username' => 'admin',
    'password' => 'priyambodo',
    'database' => 'rudabi',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => false,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => false,
    'cachedir' => '',
    'char_set' => 'utf8mb4',
    'dbcollat' => 'utf8mb4_bin',
    'swap_pre' => '',
    'encrypt' => false,
    'compress' => false,
    'stricton' => false,
    'failover' => array(),
    'save_queries' => true
];
