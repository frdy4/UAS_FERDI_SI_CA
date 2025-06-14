<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Kategori_model extends CI_Model{
    public function get_all_kategori() {
        return $this->db->get('kategori_pasien')->result_array();
    }
    public function get_all() {
        return $this->db->get('kategori_pasien')->result();
    }
    public function jumlah_status($status) {
            return $this->db->where('kategori', $status)->from('pasien')->count_all_results();
        }
    
    public function insert_kategori($data){
        return $this->db->insert('kategori_pasien',$data);
    }
    public function delete_kategori($idkategori){
        return $this->db->delete('kategori_pasien',['idkategori'=>$idkategori]);
    }
    public function get_kategori_by_id($idkategori){
        return $this->db->get_where('kategori_pasien',['idkategori'=>$idkategori])->row_array();
    }
    public function update_kategori($id, $data) {
        $this->db->where('idkategori', $id);
        return $this->db->update('kategori_pasien', $data);
    }
}