<?php

class MPegawai extends CI_Model {
    public function tampilData() {
        return $this->db->get('tb_kegiatan');
    }

    public function halamanInput($where, $table) {
        return $this->db->get_where($table, $where);
    }
    
    public function fungsiInput($id_kegiatan, $data) {
        $this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->update('tb_kegiatan', $data);
    }
    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }
    public function count($table)
    {
        return $this->db->count_all($table);
    }
    
    public function total_rows($q = NULL){
        $this->db->like('id_kegiatan',$q);
        $this->db->like('nama_kegiatan',$q);
        $this->db->like('kategori',$q);
        $this->db->like('lokasi',$q);
        $this->db->like('tanggal_input',$q);
        $this->db->like('bukti_transfer',$q);
        $this->db->from('tb_kegiatan');
        return $this->db->count_all_results();

    }

}

?>