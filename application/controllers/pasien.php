<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pasien_model');
        $this->load->model('Dokter_model');
        $this->load->model('Kategori_model');
        $this->load->library('session');
    }

    public function index() {
        $role = $this->session->userdata('role');
        $user_id = $this->session->userdata('user_id');

        $data['pasien'] = $this->Pasien_model->get_all_pasien($user_id, $role);
        $data['kategori_pasien'] = $this->Kategori_model->get_all();

        // Retrieve flash messages and pass them to the view
        $data['success_msg'] = $this->session->flashdata('success');
        $data['error_msg'] = $this->session->flashdata('error');

        $this->load->view('templates/header');
        $this->load->view('pasien/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data['dokter_pasien'] = $this->Dokter_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('pasien/form_pasien', $data);
        $this->load->view('templates/footer');
    }

    public function insert() {
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            $this->session->set_flashdata('error', 'User ID tidak ditemukan. Gagal menyimpan pasien.');
            redirect('pasien/tambah');
            return;
        }

        $data = [
            'nama' => $this->input->post('nama'),
            'dokter' => $this->input->post('dokter'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'no_tlpn' => $this->input->post('no_tlpn'),
            'alamat' => $this->input->post('alamat'),
            'keluhan' => $this->input->post('keluhan'),
            'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
            'kategori' => 'Dalam proses',
            'user_id' => $user_id,
        ];

        if ($this->Pasien_model->insert_pasien($data)) {
            $this->session->set_flashdata('success', '✅ Pasien berhasil disimpan ke database.');
        } else {
            $this->session->set_flashdata('error', '❌ Gagal menyimpan data pasien.');
        }

        redirect('pasien');
    }

    public function edit($id) {
        $data['pasien'] = $this->Pasien_model->get_pasien_by_id($id);
        $data['dokter_pasien'] = $this->Dokter_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('pasien/edit_pasien', $data);
        $this->load->view('templates/footer');
    }

    public function update($id) {
        $data = [
            'nama' => $this->input->post('nama'),
            'dokter' => $this->input->post('dokter'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'no_tlpn' => $this->input->post('no_tlpn'),
            'alamat' => $this->input->post('alamat'),
            'keluhan' => $this->input->post('keluhan'),
            'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
        ];

        if ($this->Pasien_model->update_pasien($id, $data)) {
            $this->session->set_flashdata('success', '✅ Data pasien berhasil diupdate.');
        } else {
            $this->session->set_flashdata('error', '❌ Gagal mengupdate data pasien.');
        }

        redirect('pasien');
    }

    public function hapus($id) {
        if ($this->Pasien_model->delete_pasien($id)) {
            $this->session->set_flashdata('success', '✅ Data pasien berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', '❌ Gagal menghapus data pasien.');
        }

        redirect('pasien');
    }

    public function update_kategori() {
        $id = $this->input->post('idpasien');
        $kategori = $this->input->post('kategori');

        if ($this->Pasien_model->update_pasien($id, ['kategori' => $kategori])) {
            $this->session->set_flashdata('success', '✅ Kategori berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', '❌ Gagal memperbarui kategori.');
        }

        redirect('pasien');
    }

    public function laporan() {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $data['pasien'] = $this->Pasien_model->get_laporan_pasien($dari, $sampai);
        $data['kategori_count'] = $this->Pasien_model->count_by_kategori($dari, $sampai);

        $this->load->view('templates/header');
        $this->load->view('pasien/laporan_form', $data);
        $this->load->view('templates/footer');
    }
    
    public function cetak_laporan() {
        $tanggal_dari = $this->input->post('tanggal_dari');
        $tanggal_sampai = $this->input->post('tanggal_sampai');
    
        $data['pasien'] = $this->Pasien_model->get_laporan_pasien($tanggal_dari, $tanggal_sampai);
        $data['total'] = $this->Pasien_model->count_by_kategori($tanggal_dari, $tanggal_sampai);
        $data['tanggal_dari'] = $tanggal_dari;
        $data['tanggal_sampai'] = $tanggal_sampai;
    
        $this->load->view('templates/header'); // Corrected from templatess
        $this->load->view('pasien/laporan_hasil', $data);
        $this->load->view('templates/footer'); // Corrected from templatess
    }
}