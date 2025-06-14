<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Dashboard extends MY_Controller{
    public function index(){
        $this->load->model('Dokter_model');
        $this->load->model('Pasien_model');
        $this->load->model('Kategori_model');

        $data['total_dokter_spesialis'] = $this->Dokter_model->jumlah_dokter_spesialis();
        $data['total_pasien'] = $this->Pasien_model->jumlah_pasien();
        $data['status_disetujui'] = $this->Kategori_model->jumlah_status('disetujui');
        $data['status_ditolak'] = $this->Kategori_model->jumlah_status('ditolak');
        $this->load->view('templates/header');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
    
}