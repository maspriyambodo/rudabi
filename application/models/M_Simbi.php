<?php

defined('BASEPATH') OR exit('are you trying to signin backdoor?');

class M_Simbi extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->simbi = $this->load->database('simbi', true);
    }

    public function index($param) {
        $exec = $this->simbi->select('sys_users.id,sys_users.username,sys_users.fullname,sys_roles.`name` AS role_name,sys_roles.id AS role_id,sys_users.img_photo')
                ->from('sys_users')
                ->join('sys_roles', 'sys_users.role_id = sys_roles.id', 'INNER')
                ->where([
                    '`sys_users`.`id`' => $param[1] + false,
                    '`sys_users`.`role_id`' => $param[2],
                    'sys_users.username' => $param[0]
                ])
                ->get()
                ->result();
        return $exec;
    }

}
