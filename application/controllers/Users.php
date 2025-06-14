<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('templates/header');
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer');
    }

    public function update($id) {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('users');
        }

        $data = [
            'username' => $this->input->post('username'),
            'role' => $this->input->post('role'),
        ];

        $password = $this->input->post('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->User_model->update_user($id, $data);
        $this->session->set_flashdata('success', 'User berhasil diperbarui.');
        redirect('users');
    }

    public function delete($id) {
        if ($this->session->userdata('user_id') == $id) {
            $this->session->set_flashdata('error', 'Tidak bisa hapus akun sendiri.');
            redirect('users');
        }
        $this->User_model->hapus($id);
        $this->session->set_flashdata('success', 'User berhasil dihapus.');
        redirect('users');
    }
}
