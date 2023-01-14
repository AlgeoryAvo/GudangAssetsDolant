<?php

class CKegiatanCRUD extends CI_Controller
{

    public function index()
    {
        // $this->load->model('MKegiatanCRUD');
        $data['kegiatan'] = $this->mkegiatancrud->tampilData()->result();
        $data['keg'] = $this->mkegiatancrud->count('tb_kegiatan');
        $data['bukti_transfer'] = $this->mkegiatancrud->count('tb_kegiatan', 'bukti_transfer');
        $data['PPTK'] = $this->mkegiatancrud->count('tb_pengguna', ' PPTK');

        $this->load->view('operator/VHeader');
        $this->load->view('operator/VSidebar');
        $this->load->view('operator/VKegiatanCRUD', $data);
        $this->load->view('operator/VFooter');
    }

    public function fungsiTambah()
    {
        $id_kegiatan = $this->input->post('id_kegiatan');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $kategori = $this->input->post('kategori');
        $lokasi = $this->input->post('lokasi');
        $tanggal_input = $this->input->post('tanggal_input');
        $config['upload_path'] = './uploads/bukti_transfer/';
        $config['allowed_types'] = 'jpeg|jpg|png|gif|pdf';
        $config['max_size'] = 1000000;
        $config['max_width'] = 1000000;
        $config['max_height'] = 1000000;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $file = $this->upload->do_upload('bukti_transfer');
        $data = $this->upload->data();

        if ($file) {
            $data = $this->upload->data();
            $bukti_transfer = $data['file_name'];

        } else {
            $bukti_transfer = $this->input->post('bukti_transfer');
        }

        print_r($bukti_transfer);

        $ArrInsert = array(
            'id_kegiatan' => $id_kegiatan,
            'nama_kegiatan' => $nama_kegiatan,
            'kategori' => $kategori,
            'lokasi' => $lokasi,
            'tanggal_input' => $tanggal_input,
        );

        // $this->MForm->insertDataBaju($ArrInsert);
        $this->db->insert('tb_kegiatan', $ArrInsert);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil disimpan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect(base_url('operator/CKegiatanCRUD/index'));
    }

    public function index1()
    {
        $config['base_url'] = site_url('CKegiatanCRUD/index1');
        $config['total_rows'] = $this->db->count_all('tb_kegiatan');
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $choice = $config["total_rows"] / $config['per_page'];
        $config["num_links"] = floor($choice);
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['data'] = $this->MKegiatanCRUD->get_data($config["per_page"], $data['page'])->result();
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('VKegiatanCRUD', $data);
    }
    public function kategori()
    {
        $this->load->view('operator/VHeader');
        $this->load->view('operator/VSidebar');
        $this->load->view('operator/kategori');
        $this->load->view('operator/VFooter');
    }

    // public function fungsiTambah() {
    //     $this->load->library('form_validation');

    //     $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required',
    //     array('required' => '%s harus diisi'));

    //     $this->form_validation->set_rules('sub_kegiatan', 'Sub Kegiatan', 'required',
    //     array('required' => '%s harus diisi'));

    //     $this->form_validation->set_rules('nama_belanja', 'Nama Belanja', 'required',
    //     array('required' => '%s harus diisi'));

    //     $this->form_validation->set_rules('kode_rekening', 'Kode Rekening', 'required',
    //     array('required' => '%s harus diisi', 'alpha' => '%s harus diisi dengan angka saja'));

    //     $this->form_validation->set_rules('pagu_anggaran', 'Pagu Anggaran', 'required',
    //     array('required' => '%s harus diisi', 'alpha' => '%s harus diisi dengan angka saja'));

    //     $this->form_validation->set_rules('nama_pptk', 'Nama PPTK', 'required',
    //     array('required' => '%s harus diisi'));

    //     $this->form_validation->set_rules('tanggal_input', 'Tanggal Input', 'required',
    //     array('required' => '%s harus diisi', 'alpha' => '%s harus diisi dengan tanggal saja'));

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('operator/VKegiatanCRUD');

    //     } else {
    //         $id_kegiatan = $this->input->post('id_kegiatan');
    //         $nama_kegiatan = $this->input->post('nama_kegiatan');
    //         $sub_kegiatan = $this->input->post('sub_kegiatan');
    //         $nama_belanja = $this->input->post('nama_belanja');
    //         $kode_rekening = $this->input->post('kode_rekening');
    //         $pagu_anggaran = $this->input->post('pagu_anggaran');
    //         $nama_pptk = $this->input->post('nama_pptk');
    //         $tanggal_input = $this->input->post('tanggal_input');

    //         $ArrInsert = array(
    //             'id_kegiatan' => $id_kegiatan,
    //             'nama_kegiatan' => $nama_kegiatan,
    //             'sub_kegiatan' => $sub_kegiatan,
    //             'nama_belanja' => $nama_belanja,
    //             'kode_rekening' => $kode_rekening,
    //             'pagu_anggaran' => $pagu_anggaran,
    //             'nama_pptk' => $nama_pptk,
    //             'tanggal_input' => $tanggal_input,
    //         );

    //         // $this->MForm->insertDataBaru($ArrInsert);
    //         $this->db->insert('tb_kegiatan', $ArrInsert);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Data berhasil disimpan</strong>
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         <span aria-hidden="true">&times;</span>
    //         </button>
    //         </div>');
    //         redirect(base_url('operator/CKegiatanCRUD/index'));
    //     }
    // }

    public function halamanDetail($id_kegiatan)
    {
        $where = array('id_kegiatan' => $id_kegiatan);
        // $this->load->model('MKegiatanCRUD');
        $data['kegiatan'] = $this->mkegiatancrud->halamanUpdate($where, 'tb_kegiatan')->result();
        $this->load->view('/operator/VHeader');
        $this->load->view('/operator/VSidebar');
        $this->load->view('/operator/VKegiatanDetail', $data);
        $this->load->view('/operator/VFooter');
    }

    public function halamanUpdate($id_kegiatan)
    {
        $where = array('id_kegiatan' => $id_kegiatan);
        // $this->load->model('MKegiatanCRUD');
        $data['kegiatan'] = $this->mkegiatancrud->halamanUpdate($where, 'tb_kegiatan')->result();

        $this->load->view('/operator/VHeader');
        $this->load->view('/operator/VSidebar');
        $this->load->view('/operator/VKegiatanUpdate', $data);
        $this->load->view('/operator/VFooter');
    }

    public function fungsiUpdate()
    {
        $id_kegiatan = $this->input->post('id_kegiatan');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $kategori = $this->input->post('kategori');
        $lokasi = $this->input->post('lokasi');
        $tanggal_input = $this->input->post('tanggal_input');

        $ArrUpdate = array(
            'id_kegiatan' => $id_kegiatan,
            'nama_kegiatan' => $nama_kegiatan,
            'kategori' => $kategori,
            'lokasi' => $lokasi,
            'tanggal_input' => $tanggal_input,
        );

        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->update('tb_kegiatan', $ArrUpdate);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diubah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect(base_url('operator/CKegiatanCRUD/index'));
    }

    public function fungsiDelete($id_kegiatan)
    {
        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->delete('tb_kegiatan');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		    <strong>Data berhasil dihapus</strong>
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		    </button>
		    </div>');
        redirect(base_url('operator/CKegiatanCRUD/index'));
    }

    //untuk upload foto
    public function uploadfile()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png|mp4|';
        $config['max_size'] = '20000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("gambar")) { //upload file
            $gbr = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './image/' . $gbr['file_name'];
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = true;
            $config['quality'] = '80%';
            $config['width'] = 1024;
            $config['height'] = 768;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $id_kegiatan = $this->input->post('id_kegiatan');
            $nama_kegiatan = $this->input->post('nama_kegiatan');
            $kategori = $this->input->post('kategori');
            $lokasi = $this->input->post('lokasi');
            $tanggal_input = $this->input->post('tanggal_input');
            $nama = $this->session->userdata('nama');
            $gambar = $gbr['file_name'];
            $this->db->query("insert into tb_kegiatan values('','$nama_kegiatan','$kategori','$lokasi','','$tanggal_input','$gambar')");
            $this->session->set_flashdata('msg', 'success');
            redirect('operator/CKegiatanCRUD','refresh');
        } else {
            $this->session->set_flashdata('msg', 'error');
            redirect('operator/CKegiatanCRUD','refresh');
        }
    }

    
    public function savekategori()
    {
        $kat = $_POST['kat'];
        $this->db->query("INSERT into kategori values('','$kat')");
        $this->session->set_flashdata('msg', 'success');
        redirect('operator/CKegiatanCRUD/kategori','refresh');
    }

    public function hapuskategori($id = '')
    {
        $this->db->query("delete from kategori where id='$id'");
        $this->session->set_flashdata('msg', 'success');
        redirect('operator/CKegiatanCRUD/kategori','refresh');
    }

}
