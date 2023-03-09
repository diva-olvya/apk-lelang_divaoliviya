<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dataadmin extends CI_Controller
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


  //  function tampil data admin dan petugas
    public function index()
    {
        $data['petugas'] = $this->M_petugas->tampil_data()->result();
        $data['title'] = "Data Admin Dan Petugas";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('administrator/dataadmin', $data);
        $this->load->view('templates/footer');
    }

    // function untuk tambah registrasi
    public function tambah_regis()
    {
        $nama_petugas     = $this->input->post('nama_petugas');
        $username         = $this->input->post('username');
        $password         = $this->input->post('password');
        $id_level         = $this->input->post('id_level');
      

        $data = array(
            'nama_petugas'  => $nama_petugas,
            'username'      => $username,
            'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),//untuk mengengkripsi password
            'id_level'      => $id_level
        );

        // mengarah ke model petugas tambah regis
        $this->M_petugas->tambah_regis($data, 'tb_petugas');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Berhasil Registrasi!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/dataadmin/index');
    }

    // function edit registrasi
    public function editregist($id)
    {
        $where = array('id_petugas' => $id);
        $data['title'] = "Edit Registrasi";
        $data['petugas'] = $this->M_petugas->edit_petugas($where, 'tb_petugas')->result();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('administrator/edit_regist', $data);
        $this->load->view('templates/footer');
    }

    
// function ubah data regist
    public function update()
    {
        $id             = $this->input->post('id_petugas');
        $nama_petugas   = $this->input->post('nama_petugas');
        $username       = $this->input->post('username');
        $password       = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $id_level       = $this->input->post('id_level');
       
        
        $data = array(
            'nama_petugas'  => $nama_petugas,
            'username'      => $username,
            'password'      => $password,
            'id_level'      => $id_level,
            
        );

        $where = array(
            'id_petugas' => $id
        );

        // mengarah ke model petugas function update data
        $this->M_petugas->update_data($where, $data, 'tb_petugas');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil diupdate!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/dataadmin/index');
    }

    // public function hapus($id)
    // {
        

    //     $where = array('id_petugas' => $id);
    //     $this->M_petugas->hapus_data($where, 'tb_petugas');
    //     $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Data Berhasil dihapus!</strong> 
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //     redirect('admin/dataadmin/index');
    // }


    
    public function hapus($id_petugas)
    {
        $this->db->db_debug = FALSE; //db_debug untuk menampilkan eror atau tidak

		  $this->db->set('status', 'dibuka')
			  ->update('tb_petugas');
        $this->db->where('id_petugas', $id_petugas);
        $this->db->delete('tb_petugas');

        
        // jika db eror maka maka akan tampil flash data
        $error = $this->db->error();
		if($error['code'] == 1451) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Petugas Telah Berjalan!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          $this->db->db_debug = TRUE;
        redirect('admin/dataadmin/index');
    }
    $this->db->db_debug = TRUE; //jika db_debug benar maka hapus berjalan

		$this->session->set_flashdata(
			'message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil dihapus!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/dataadmin/index');
    }


}