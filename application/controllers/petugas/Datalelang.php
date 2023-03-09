<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datalelang extends CI_Controller
{
	public function __construct()
    {
        
        parent::__construct();

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

	// tampil semua data lelang
	public function index()
	{
		$args = ['auctions'	 => $this->M_lelang->all()]; //mengarah ke model lelang all
        $args ['title'] = "Data Lelang";
		
		$this->load->view('templates_petugas/header', $args);
        $this->load->view('templates_petugas/sidebar', $args);
        $this->load->view('petugas/lelang/datalelang', $args);
        $this->load->view('templates_petugas/footer');
	}


	// function tambah lelang
	public function create()
	{
		if ($this->input->post('save')) { 
			$errors = $this->_create_process();
		}
		$this->load->model(['M_masyarakat','M_petugas', 'M_barang']); //load model
		$args = [
			// 'users'	 => $this->M_masyarakat->all(),
			'products'	 => $this->M_barang->available(), //membuat product belum terlelang saja yg muncul
			'staffs' => $this->M_petugas->all()
		];

		$args ['title'] = "Form Tambah Lelang";
		$this->load->view('templates_petugas/header', $args);
        $this->load->view('templates_petugas/sidebar', $args);
        $this->load->view('petugas/lelang/tambahlelang', $args);
        $this->load->view('templates_petugas/footer');
	}

	// proses tambah
	private function _create_process()
	{
		$this->load->library('form_validation'); //proses validasi data input yg diinput dari form
		$this->form_validation->set_rules('product', 'Product', 'required');
		$this->form_validation->set_rules('tgl_lelang', 'Auction date', 'required');
		$this->form_validation->set_rules('tanggal_akhir', 'Auction date akhir', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
	
		if ($this->form_validation->run()) {
			$this->M_lelang->id_barang = set_value('product');
			$this->M_lelang->tgl_lelang = set_value('tgl_lelang');
			$this->M_lelang->tanggal_akhir = set_value('tanggal_akhir');
			$this->M_lelang->id_petugas = $this->session->userdata('id_petugas');
			$this->M_lelang->status = set_value('status');

			$this->M_lelang->save(); //mengarah ke model lelang save (ketik disimpan)

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil dilelang!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('petugas/datalelang/index');
		}

	}


	// Edit lelang
	public function edit($id)
	{
		if ($this->input->post('tanggal_akhir')) {
			$errors = $this->_edit_process($id);
		}
		$this->load->model(['M_masyarakat', 'M_barang', 'M_petugas']); //load model
		$args = [
			'users'	 	=> $this->M_masyarakat->all(),
			'products'	=> $this->M_barang->all(),
			'staffs' 	=> $this->M_petugas->all(),
			'auction'	=> $this->M_lelang->first($id)
		];

		$args ['title'] = "Edit Data Lelang";
		$this->load->view('templates_petugas/header', $args);
        $this->load->view('templates_petugas/sidebar', $args);
        $this->load->view('petugas/lelang/editlelang', $args);
        $this->load->view('templates_petugas/footer');

	}

	// proses edit lelang
	private function _edit_process($id)
	{
		$this->load->library('form_validation'); //proses validasi data input yg diinput dari form

		$this->form_validation->set_rules('tanggal_akhir', 'Auction date akhir', 'required');
		
		if ($this->form_validation->run()) {
			$this->M_lelang->tanggal_akhir = $this->input->post('tanggal_akhir');

			$this->M_lelang->update($id); //load ke model lelang update untuk proses update

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil diupdate!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('petugas/datalelang/');
		}

	}


	

	//hapus lelang ()
	public function delete($id,$id_barang)
	{
		$this->db->db_debug = FALSE;  //db_debug untuk menampilkan eror atau tidak

		$this->db->set('status_barang', 0) //jika status(0 = belum dilelang) maka ambil id_barang update tb barang
			->where('id_barang',$id_barang)
			->update('tb_barang');
		$this->db->where('id_lelang', $id); //di id_lelang hapus tb_lelang
		$this->db->delete('tb_lelang');

		$error = $this->db->error(); //jika db eror maka tampilkan flashdata tersebut karena berelasi jd ga bs dihps
		if($error['code'] == 1451) {
			$this->session->set_flashdata(
				'message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
				<strong>Data Lelang Sudah Berjalan!</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>'
			);
			$this->db->db_debug = TRUE;  
			redirect('petugas/datalelang/');
		}
		$this->db->db_debug = TRUE; //jika db benar maka tampilkan flashdata berhasil dihapus

		$this->session->set_flashdata(
			'message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil dihapus!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('petugas/datalelang/');

	}

	// function detail petugas
	public function view($id)
	{
		
		$product = $this->M_lelang->first($id); //load model lelang

		$args = [
			'product'	 => $product,
			'history'	 => $this->M_lelang->history($id),
			'max_bid'	 => $this->M_lelang->max_bid($id),
		];

		$args ['title'] = "Data BID";
		$this->load->view('templates_petugas/header', $args);
        $this->load->view('templates_petugas/sidebar', $args);
        $this->load->view('petugas/lelang/view', $args);
        $this->load->view('templates_petugas/footer');
	
	}

	// function menyetujui penawar tertinggi(finish)
	public function finish($id)
	{
		if ($this->input->post('finish')) {
			$errors = $this->_finish_process($id);
		}
		$args = [
			'product'	 => $this->M_lelang->first($id),
			'errors' 	 => isset($errors) ? $errors : [],
		];

		$args['title'] = "Data Finish";
		$this->load->view('templates_petugas/header', $args);
        $this->load->view('templates_petugas/sidebar', $args);
        $this->load->view('petugas/lelang/finish', $args);
        $this->load->view('templates_petugas/footer');
	
	}

	// proses finish
	private function _finish_process($id)
	{
		$max = $this->M_lelang->max_bid($id); // mengarah ke model lelang max bid (tawar tertinggi)
		
		$this->M_lelang->status = 'ditutup'; // jika ya status akan tertutup
		$this->M_lelang->harga_akhir = $max->penawaran_harga; // jika ya harga akhir akan masuk ke db history penawar harga
		$this->M_lelang->pelelang = $max->nama_lengkap; // id usernya siapa
		$this->M_lelang->update_finish($id); // mengubah

		$this->session->set_flashdata(
			'message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Lelang telah diselesaikan!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('petugas/datalelang/');


		return [];
	}
	
}
