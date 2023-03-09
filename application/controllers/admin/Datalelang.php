<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datalelang extends CI_Controller
{
	public function __construct()
    {
        
        parent::__construct();

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

	public function index()
	{
		$args = ['auctions'	 => $this->M_lelang->all()];
        
        $args ['title'] = "Data Lelang";
		
		$this->load->view('templates/header', $args);
        $this->load->view('templates/sidebar', $args);
        $this->load->view('administrator/datalelang', $args);
        $this->load->view('templates/footer');
	}
}