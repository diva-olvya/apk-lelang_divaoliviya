<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datalelang extends CI_Controller
{
	public function __construct()
    {
        
        parent::__construct();

        if ($this->session->userdata('id_level') != '3') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda Belum Login!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('auth');
        }
    }

	// function bid/tawar harga
	public function bid($id)
	{
		
		$product = $this->M_lelang->first($id); //diarahkan ke model lelang first
		if ($this->input->post('bid')) {
			$errors = $this->_bid_process($product);
			$product = $this->M_lelang->first($id);
		}
		$args = [
			'product'	 => $product,
			'history'	 => $this->M_lelang->history($id), //diarahkan ke model lelang history
			'max_bid'	 => $this->M_lelang->max_bid($id), //diarahkan ke model lelang max bid(penawar tertinggi)
			'errors' 	 => isset($errors) ? $errors : [],
			'success' 	 => $this->session->flashdata('success'),
		];
		$args['title'] = "Lelang Masyarakat";
		$this->load->view('templates/user_header',$args);
    	$this->load->view('petugas/lelang/bid', $args);
		$this->load->view('templates/user_footer');
	}

// proses penawaran
	private function _bid_process($product)
	{
		$this->load->library('form_validation'); //proses validasi data input yg diinput dari form
		$this->form_validation->set_rules('price', 'Price', 'required|numeric|greater_than_equal_to[' . $product->harga_awal . ']');
		if ($this->form_validation->run()) {
			$this->M_lelang->price = set_value('price'); 
			$this->M_lelang->id_lelang = $product->id_lelang;
			$this->M_lelang->id_barang = $product->id_barang;
			$this->M_lelang->id_user = uid();

			$this->M_lelang->save_bid();

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Bid Telah Ditambahkan!</strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('masyarakat/Datalelang/bid/' . $product->id_lelang);
		}

		return $this->form_validation->error_array();
	}

	// controler tampil semua history
	public function riwayat()
	{

		$args = [
			'history'	 => $this->M_masyarakat->history()
		];

		$args ['title'] = "Data history";
		$this->load->view('templates/user_header',$args);
    	$this->load->view('petugas/riwayat', $args);
		$this->load->view('templates/user_footer');
	
	}

	// controler detail history tampilan masyarakat
	public function history_detail($id)
	{
		
		$product = $this->M_lelang->first($id);
		if ($this->input->post('bid')) {
			$errors = $this->_bid_process($product);
			$product = $this->M_lelang->first($id);
		}

		
		$args = [
			'product'	 => $product,
			'history'	 => $this->M_lelang->history($id),
			'max_bid'	 => $this->M_lelang->max_bid($id),
			'errors' 	 => isset($errors) ? $errors : [],
			'success' 	 => $this->session->flashdata('success'),
		];
		$args['title'] = "Lelang Masyarakat";
		$this->load->view('templates/user_header',$args);
    	$this->load->view('petugas/lelang/history_detail', $args);
		$this->load->view('templates/user_footer');
	}
 
	public function cetak($id){
        // load library
        $this->load->library('pdf');
        $this->load->model('M_lelang');


		
        // load model lelang
        // $data['masyarakat'] = $this->M_lelang->cetak_bukti($id);
		$data = [
			'masyarakat'	 => $this->M_lelang->cetak_bukti($id),
			'max_bid'	 => $this->M_lelang->max_bid($id)
		];

		// var_dump($data['masyarakat']);die;


        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-vialelangmobil.pdf";
        
        $html = $this->load->view('masyarakat/laporan/cetak', $data, true);

        // run dompdf
        $this->pdf->load_view('masyarakat/laporan/cetak', $data);
    
    
    }

	

	
	
	
}
