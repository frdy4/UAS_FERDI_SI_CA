<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {

    public function get_all_pasien($user_id = null, $role = null, $limit = null, $offset = null) {
        if ($role !== 'admin' && $user_id !== null) {
            $this->db->where('user_id', $user_id);
        }
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get('pasien')->result_array();
    }

    public function count_all_pasien($user_id = null, $role = null) {
        if ($role !== 'admin' && $user_id !== null) {
            $this->db->where('user_id', $user_id);
        }
        return $this->db->count_all_results('pasien');
    }
    
    public function insert_pasien($data){
        $this->db->insert('pasien', $data);
    
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            // Logging for debugging
            log_message('error', '❌ Gagal insert pasien');
            log_message('error', 'Query: ' . $this->db->last_query());
            log_message('error', 'Error DB: ' . print_r($this->db->error(), true));
            return false;
        }
    }
    

    public function delete_pasien($id) {
        $this->db->where('idpasien', $id);
        return $this->db->delete('pasien');
    }

    public function get_pasien_by_id($idpasien){
        return $this->db->get_where('pasien', ['idpasien' => $idpasien])->row_array();
    }

    public function jumlah_pasien() {
        return $this->db->count_all('pasien'); // adjust table name if different
    }

    public function update_pasien($id, $data) {
        $this->db->where('idpasien', $id);
        return $this->db->update('pasien', $data);
    }

    public function get_laporan_pasien($dari = null, $sampai = null) {
        // Only add WHERE clauses if the dates are provided and not empty
        if (!empty($dari)) {
            $this->db->where('tgl_kunjungan >=', $dari);
        }
        if (!empty($sampai)) {
            $this->db->where('tgl_kunjungan <=', $sampai);
        }
        return $this->db->get('pasien')->result();
    }

    public function count_by_kategori($tanggal_dari = null, $tanggal_sampai = null) {
        // Explicitly define default parameters as null for clarity
        // The conditional check is already correct, just adding parameter defaults
        if (!empty($tanggal_dari) && !empty($tanggal_sampai)) {
            $this->db->where('tgl_kunjungan >=', $tanggal_dari);
            $this->db->where('tgl_kunjungan <=', $tanggal_sampai);
        }
        
        $this->db->select("
            COUNT(*) as total,
            SUM(CASE WHEN kategori = 'disetujui' THEN 1 ELSE 0 END) as diterima,
            SUM(CASE WHEN kategori = 'Ditolak' THEN 1 ELSE 0 END) as ditolak,
            SUM(CASE WHEN kategori = 'Proses' THEN 1 ELSE 0 END) as proses
        ");
        $query = $this->db->get('pasien');
        return $query->row();
    }

}