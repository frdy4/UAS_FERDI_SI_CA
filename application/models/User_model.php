<?php

class User_model extends CI_Model{
    
    public function insert_user($data){
        return $this->db->insert('users',$data);
    }
    public function get_all_users() {
        return $this->db->get('users')->result_array();
    }
    public function get_all() {
        return $this->db->get('users')->result();
    }
    public function hapus($id) {
        return $this->db->delete('users', ['id' => $id]);
    }
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }
    public function check_user($username, $password) {
        $this->db->where('username', $username);
        $user = $this->db->get('users')->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }
}


