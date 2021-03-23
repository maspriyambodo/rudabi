<?php

/*
 * Product:        System of kementerian agama Republik Indonesia
 * License Type:   Government
 * Access Type:    Multi-User
 * License:        https://maspriyambodo.com
 * maspriyambodo@gmail.com
 * 
 * Thank you,
 * maspriyambodo
 */

/**
 * Description of M_permision
 *
 * @author centos
 */
class M_permision extends CI_Model {

    public function Save($data) {
        $exec = $this->db->query('CALL sys_roles_insert("' . $data['name'] . '","' . $data['description'] . '",' . $data['user_login'] . ');');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Systems/models/M_permision -> function Save ' . 'error ketika insert roles');
            $result = [
                'status' => false,
                'pesan' => 'error while updating roles!'
            ];
        } else {
            mysqli_next_result($this->db->conn_id);
            $result['status'] = true;
        }
        return $result;
    }

    public function Role_update($data) {
        $exec = $this->db->query('CALL sys_roles_update(' . $data['id_grup'] . ',"' . $data['nama_grup'] . '","' . $data['des_grup'] . '",' . $data['user_login'] . ');');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Systems/models/M_permision -> function Role_update ' . 'error ketika update roles');
            $result = [
                'status' => false,
                'pesan' => 'error while updating roles!'
            ];
        } else {
            mysqli_next_result($this->db->conn_id);
            $result['status'] = true;
        }
        return $result;
    }

    public function Save_access($data) {
        for ($i = 0; $i < count($data['id_menu']); $i++) {
            $exec = $this->db->query('CALL sys_permision_update(' . $data['role_id'] . ',' . $data['id_menu'][$i] . ',' . $data['v'][$i] . ',' . $data['c'][$i] . ',' . $data['r'][$i] . ',' . $data['u'][$i] . ',' . $data['d'][$i] . ',' . $data['user_login'] . ');');
            mysqli_next_result($this->db->conn_id);
        }
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Systems/models/M_permision -> function Save_access ' . ' error while update sys_roles');
            $result = [
                'status' => false,
                'pesan' => 'error, while update permissions'
            ];
        } else {
            $result = [
                'status' => true,
                'pesan' => 'success, permissions has been changed!'
            ];
        }
        return $result;
    }

}
