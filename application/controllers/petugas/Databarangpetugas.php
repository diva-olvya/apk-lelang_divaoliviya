<?php 

class Databarangpetugas extends CI_Controller
{

    // untuk memblokir akses langsung dari url
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        if ($this->session->userdata('id_level') != '2') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda Belum Login!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('auth');
        }
    }
    
// menampilkan data barang
  public function index()
  {
      $data['barang'] = $this->M_barang->tampil_data()->result();
      $data['title'] = "Data Barang ";
      $this->load->view('templates_petugas/header',$data);
      $this->load->view('templates_petugas/sidebar');
      $this->load->view('petugas/databarangpetugas', $data);
      $this->load->view('templates_petugas/footer');
  }

// controller tambah
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
  redirect('petugas/databarangpetugas/index');
      
    }else{ 
      
      $nama_barang       = $this->input->post('nama_barang');
      $keterangan        = $this->input->post('keterangan');
      $tgl               = $this->input->post('tgl');
      $harga_awal        = $this->input->post('harga_awal');
      $status_barang     = $this->input->post('status_barang');
      $photo             = $_FILES['photo']['name'];
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
          'nama_barang'     => $nama_barang,
          'keterangan'      => $keterangan,
          'tgl'             => $tgl,
          'harga_awal'      => $harga_awal,
          'status_barang'   => $status_barang,
          'photo'           => $photo
      );

    
    //   diarahkan ke model barang function tambah barang
      $this->M_barang->tambah_barang($data, 'tb_barang');
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Data Berhasil ditambahkan!</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
      redirect('petugas/databarangpetugas/index');
    }
  }

// controler edit
  public function edit($id)
    {
        $where = array('id_barang' => $id);
        $data['title'] = "edit barang";
        $data['barang'] = $this->M_barang->edit_barang($where, 'tb_barang')->result(); //mengarah ke model barang function edit barang
        $this->load->view('templates_petugas/header',$data);
        $this->load->view('templates_petugas/sidebar');
        $this->load->view('petugas/edit_barangpetugas', $data);
        $this->load->view('templates_petugas/footer');
    }

// controler ubah barang
    public function update()
    {
        $id             = $this->input->post('id_barang');
        $nama_barang    = $this->input->post('nama_barang');
        $keterangan     = $this->input->post('keterangan');
        $tgl            = $this->input->post('tgl');
        $harga_awal     = $this->input->post('harga_awal');
        $status_barang  = $this->input->post('status_barang');
        $photo          = $this->input->post('photo');
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

        // diarahkan ke model barang update data
        $this->M_barang->update_data($where, $data, 'tb_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil diupdate!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('petugas/databarangpetugas/index');
    }


// controler hapus
  public function hapus($id)
  {
    // $this->db->db_debug = FALSE; 

    // $this->db->set('status_barang', 0)
      $where = array('id_barang' => $id);
      $this->M_barang->hapus_data($where, 'tb_barang');
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Data Berhasil dihapus!</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
      redirect('petugas/databarangpetugas/index');
  }


  //hapus lelang ()
	// public function hapus($id,$id_barang)
	// {
	// 	$this->db->db_debug = FALSE;  //db_debug untuk menampilkan eror atau tidak

	// 	$this->db->set('status_barang', 0) //jika status(0 = belum dilelang) maka ambil id_barang update tb barang
	// 		->where('id_barang',$id_barang)
	// 		->update('tb_barang');
	// 	$this->db->where('id_lelang', $id); //di id_lelang hapus tb_lelang
	// 	$this->db->delete('tb_lelang');

	// 	$error = $this->db->error(); //jika db eror maka tampilkan flashdata tersebut karena berelasi jd ga bs dihps
	// 	if($error['code'] == 1451) {
	// 		$this->session->set_flashdata(
	// 			'message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
	// 			<strong>Data Lelang Sudah Berjalan!</strong> 
	// 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	// 			  <span aria-hidden="true">&times;</span>
	// 			</button>
	// 		  </div>'
	// 		);
	// 		$this->db->db_debug = TRUE;  
	// 		redirect('petugas/databaranglelang/');
	// 	}
	// 	$this->db->db_debug = TRUE; //jika db benar maka tampilkan flashdata berhasil dihapus

	// 	$this->session->set_flashdata(
	// 		'message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  //           <strong>Data Berhasil dihapus!</strong> 
  //           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  //             <span aria-hidden="true">&times;</span>
  //           </button>
  //         </div>');
  //       redirect('petugas/databaranglelang/');
  // }

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
    $this->pdf->load_view('petugas/laporan_barang/cetak_laporan', $data);


}


}