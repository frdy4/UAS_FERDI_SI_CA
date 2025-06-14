<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Dokter extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dokter_model');
       // $this->load->library('session');
    }

    public function index() {
        $data['dokter_pasien'] = $this->Dokter_model->get_all_dokter();
        $this->load->view('templates/header');
        $this->load->view('dokter/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah(){
        $data['dokter_pasien']=$this->Dokter_model->get_all_dokter();
        $this->load->view('templates/header');
        $this->load->view('dokter/form_dokter', $data);
        $this->load->view('templates/footer');
    }
    public function insert(){
        $dokter = $this->input->post('dokter');
        $hari   = $this->input->post('hari');
        $jam    = $this->input->post('jam');
    
        $data = [      
            'dokter' => $dokter,
            'hari'   => $hari,
            'jam'    => $jam         
        ];
    
        $result = $this->Dokter_model->insert_dokter($data);
    
        if($result){
            $this->session->set_flashdata('success', 'Dokter berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan dokter');
        }
        redirect('dokter');
    }
    
    public function hapus($iddokter){
        $this->Dokter_model->delete_dokter($iddokter);
        redirect('dokter');
    }
    public function edit($iddokter){
        $data['dokter_pasien'] = $this->Dokter_model->get_all_dokter();
        $data['dokter_pasien']=$this->Dokter_model->get_dokter_by_id($iddokter);
        $this->load->view('templates/header');
        $this->load->view('dokter/edit_dokter',$data);
        $this->load->view('templates/footer');
    }
    public function update() {
        $id = $this->input->post('iddokter'); // perbaikan
    
        $this->form_validation->set_rules('dokter', 'dokter', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            $data = [
                'dokter' => $this->input->post('dokter'),
                'hari'   => $this->input->post('hari'),
                'jam'    => $this->input->post('jam')
            ];
            $this->Dokter_model->update_dokter($id, $data);
            redirect('dokter');
        }
    }
    
}