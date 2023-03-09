<?php

class Databaranglelang extends CI_Controller
{
     // untuk memblokir akses langsung dari url
     public function __construct()
     {
         parent::__construct();
         // is_logged_in();
         if ($this->session->userdata('id_level') != '1') {
             $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong>Anda Belum Login!</strong> 
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                 </div>');
             redirect('auth');
         }
     }


    //  untuk tampil data barang
     public function index()

    {
        $data['barang'] = $this->M_barang->tampil_data()->result();
        $data['title'] = "Data Barang";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('administrator/databaranglelang', $data);
        $this->load->view('templates/footer');
    }


    // function tambah barang
    public function tambah_aksi()
    {
        $data['barang'] = $this->M_barang->tampil_data()->result_array();
        $this->form_validation->set_rules('nama_barang', 'Barang', 'is_unique[tb_barang.nama_barang]', //untuk ngasih tau barang sudah ada 
        [
          'is_unique' => 'nama barang sudah ada'
        ]);
        if($this->form_validation->run() == false) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Nama Barang Sudah Ada!</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');

        redirect('admin/databaranglelang/index');
      
    }else{

        $nama_barang    = $this->input->post('nama_barang');
        $keterangan     = $this->input->post('keterangan');
        $tgl            = $this->input->post('tgl');
        $harga_awal     = $this->input->post('harga_awal');
        $status_barang  = $this->input->post('status_barang');
        $photo          = $_FILES['photo']['name'];

        
        if ($photo = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('photo')) {
                echo "Gambar Gagal diUpload!";
            } else {
                $photo = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_barang'   => $nama_barang,
            'keterangan'    => $keterangan,
            'tgl'           => $tgl,
            'harga_awal'    => $harga_awal,
            'status_barang' => $status_barang,
            'photo'         => $photo
        );

       

        //diarahkan ke model barang function tambah barang
        $this->M_barang->tambah_barang($data, 'tb_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil ditambahkan!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/databaranglelang/index');
    }
}

    // function edit barang
    public function edit($id)
    {
        $where = array('id_barang' => $id);
        $data['title'] = "Edit Barang";
        $data['barang'] = $this->M_barang->edit_barang($where, 'tb_barang')->result();//mengarah ke model
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('administrator/edit_barang', $data);
        $this->load->view('templates/footer');
    }

    // function ubah barang
    public function update()
    {
        $id                = $this->input->post('id_barang');
        $nama_barang       = $this->input->post('nama_barang');
        $keterangan        = $this->input->post('keterangan');
        $tgl               = $this->input->post('tgl');
        $harga_awal        = $this->input->post('harga_awal');
        $status_barang     = $this->input->post('status_barang');
        $photo             = $this->input->post('photo');
        if ($photo = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('photo')) {
                echo "Gambar Gagal diUpload!";
            } else {
                $photo = $this->upload->data('file_name');
            }
        } 
        $data = array(
            'nama_barang'   => $nama_barang,
            'keterangan'    => $keterangan,
            'tgl'           => $tgl,
            'harga_awal'    => $harga_awal,
            'status_barang' => $status_barang
        );

        if ($photo != '') {
            $data['photo'] = $photo;
        }

        $where = array(
            'id_barang' => $id
        );
        //mengarah ke model barang function update data
        $this->M_barang->update_data($where, $data, 'tb_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil diupdate!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/databaranglelang/index');
    }

    

    public function hapus($id)
    {
        $where = array('id_barang' => $id);
        $this->M_barang->hapus_data($where, 'tb_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil dihapus!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/databaranglelang/index');
    }

   

    public function cetak_laporan(){
        // load library
        $this->load->model('M_lelang');
        $this->load->library('pdf');
    
    
        // load model lelang
        $data['barang'] = $this->M_lelang->cetak_barang();
    
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-vialelangmobil.pdf";
        
    
        // run dompdf
        $data['title'] = "Laporan";
        $this->pdf->load_view('administrator/laporan_barang/cetak_laporan', $data);
    
    
    }
    
}
