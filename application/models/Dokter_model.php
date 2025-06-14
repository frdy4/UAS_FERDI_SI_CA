<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Dokter_model extends CI_Model{
    public function get_all_dokter() {
        return $this->db->get('dokter_pasien')->result_array();
    }
    public function get_all() {
        return $this->db->get('dokter_pasien')->result();
    }

    public function jumlah_dokter_spesialis() {
        return $this->db->where('dokter !=', '')->from('dokter_pasien')->count_all_results();
    }
     
    
    public function insert_dokter($data){
        return $this->db->insert('dokter_pasien',$data);
    }
    public function delete_dokter($iddokter){
        return $this->db->delete('dokter_pasien',['iddokter'=>$iddokter]);
    }
    public function get_dokter_by_id($iddokter){
        return $this->db->get_where('dokter_pasien',['iddokter'=>$iddokter])->row_array();
    }
    
    public function update_dokter($id, $data) {
        $this->db->where('iddokter', $id);
        return $this->db->update('dokter_pasien', $data);
    }
}