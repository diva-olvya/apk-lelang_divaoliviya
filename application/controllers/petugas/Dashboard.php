<?php

class Dashboard extends CI_Controller
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


    public function index()
    {
        
        $masyarakat = $this->db->query("SELECT * FROM tb_masyarakat");
        $petugas    = $this->db->query("SELECT * FROM tb_petugas");
        $id_barang  = $this->db->query("SELECT * FROM tb_barang");
        $lelang     = $this->db->query("SELECT * FROM tb_lelang");
        $data['masyarakat'] = $masyarakat->num_rows();
        $data['petugas']    = $petugas->num_rows();
        $data['barang']     = $id_barang->num_rows();
        $data['lelang']     = $lelang->num_rows();


        $data['title'] = 'Dashboard Petugas';
        $id = $this->session->userdata('id_petugas');
        $data['tb_petugas'] = $this->db->get_where('tb_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_petugas/header', $data);
        $this->load->view('templates_petugas/sidebar', $data);
        $this->load->view('petugas/dashboard', $data);
        $this->load->view('templates_petugas/footer');
    }
}
