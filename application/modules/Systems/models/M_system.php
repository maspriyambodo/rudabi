<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_system extends CI_Model {

    public function Favico($data) {
        $this->db->trans_begin();
        $this->db->set($data['field'], $data['file_name'])
                ->update('sys_app');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status = false;
        } else {
            $this->db->trans_commit();
            $status = true;
        }
        return $status;
    }

    public function Old_pwd($param) {
        $exec = $this->db->select('sys_users.pwd')
                ->from('sys_users')
                ->where('`sys_users`.`id`', $param, false)
                ->get()
                ->row();
        return $exec;
    }

    public function Update_pwd($param) {
        $this->db->trans_begin();
        $this->db->set([
                    'sys_users.pwd' => $param['pwd'],
                    'sys_users.sysupdateuser' => $param['id_user'],
                    'sys_users.sysupdatedate' => date('Y-m-d H:i:s')
                ])
                ->where([
                    '`sys_users`.`id`' => $param['id_user'] + false,
                    '`sys_users`.`stat`' => 1 + false
                ])
                ->update('sys_users');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status = redirect(base_url('Change%20Password'), $this->session->set_flashdata('err_msg', 'error, Password failed to change'));
        } else {
            $this->db->trans_commit();
            $status = redirect(base_url('Change%20Password'), $this->session->set_flashdata('succ_msg', 'Password has been changed'));
        }
        return $status;
    }

    public function Update($data) {
        $this->db->trans_begin();
        $this->db->set($data)
                ->update('sys_app');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status = redirect(base_url('Systems/index/'), $this->session->set_flashdata('err_msg', 'error, while saving data!'));
        } else {
            $this->db->trans_commit();
            $status = redirect(base_url('Systems/index/'), $this->session->set_flashdata('succ_msg', 'success saving data!'));
        }
        return $status;
    }

}
