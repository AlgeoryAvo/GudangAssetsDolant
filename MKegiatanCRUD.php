<?php

class MKegiatanCRUD extends CI_Model {
    public function get(){
		$query = $this->db->query('SELECT * FROM tb_pengguna WHERE kode_rek');
        return $query->result();
    }
    public function getData(){
		$query = $this->db->query('SELECT * FROM tb_pengguna WHERE jabatan_pengguna="PPTK" ');
        return $query->result();
    }
    public function tampilData() {
        return $this->db->get('tb_kegiatan');
    }

    public function fungsiTambah($data) {
        $this->db->insert('tb_kegiatan', $data);
    }

    public function halamanUpdate($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function fungsiUpdate($id_kegiatan, $data) {
        $this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->update('tb_kegiatan', $data);
    }

    function fungsiDelete($id_kegiatan) {
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->delete('tb_kegiatan');
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

    public function get_keyword($keyword){
    $this->db->select('*');
    $this->db->from('tb_kegiatan');
    $this->db->like('id_kegiatan' ,$keyword);
    $this->db->or_like('nama_kegiatan' ,$keyword);
    $this->db->or_like('kategori' ,$keyword);
    $this->db->or_like('lokasi' ,$keyword);
    $this->db->or_like('nama_peagawai', $keyword);
    $this->db->or_like('tanggal_input' ,$keyword);
    $this->db->or_like('kfoto' ,$keyword);
}


    public function get_data($limit, $start)
    {
        $query = $this->db->get('tb_kegiatan' , $limit, $start);
        return $query;
    }
}
?>