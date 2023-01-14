<?php

class CPegawai extends CI_Controller {
    
    public function index () {
        $data['kegiatan']= $this->mpegawai->tampilData()->result();
        $this->load->view('pegawai/VHeader');
        $this->load->view('pegawai/VSidebar');
        $this->load->view('pegawai/VPegawai', $data);
        $this->load->view('pegawai/VFooter');
    }

    public function halamanInput($id_kegiatan) {
        $where = array('id_kegiatan' => $id_kegiatan);
        $data['kegiatan'] = $this->mpegawai->halamanInput($where, 'tb_kegiatan')->result();

        $this->load->view('/pegawai/VHeader');
        $this->load->view('/pegawai/VSidebar');
        $this->load->view('/pegawai/VTransfer', $data);
        $this->load->view('/pegawai/VFooter');
    }

    
    public function fungsiTambah() {
        $id_kegiatan = $this->input->post('id_kegiatan');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $kategori = $this->input->post('kategori');
        $lokasi= $this->input->post('lokasi');
        $tanggal_input = $this->input->post('tanggal_input');

   
        $config['upload_path'] = './uploads/kfoto/';
        $config['allowed_types'] = 'jpeg|jpg|png|gif|pdf';
        $config['max_size']             = 1000000;
        $config['max_width']            = 1000000;
        $config['max_height']           = 1000000;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $file = $this->upload->do_upload('kfoto');
        $data = $this->upload->data();
        
        if ($file) {    
            $data = $this->upload->data();
            $kfoto = $data['file_name'];
        
        } else {
            $kfoto = $this->input->post('kfoto');    
        }

        print_r($kfoto);

        $ArrInput = array(
            'id_kegiatan' => $id_kegiatan,
            'nama_kegiatan' => $nama_kegiatan,
            'kategori' => $kategori,
            'lokasi' => $lokasi,
            'tanggal_input' => $tanggal_input,
            'kfoto' => $kfoto,
            
        );

        // $this->MForm->updateDataBaju($id, $ArrInput);
        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->update('tb_kegiatan', $ArrInput);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil disimpan</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('pegawai/CPegawai'));
    }

    public function get_tot()
    {
        $tot = $this->mpegawai->total_rows();
        $result['tot'] =$tot;
        $result['msg'] = "Berhasil direfresh";
        echo json_encode($result);
    }

}

?>