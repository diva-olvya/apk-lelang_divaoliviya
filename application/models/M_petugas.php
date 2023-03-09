<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_petugas extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('tb_petugas');
    }

    public function tambah_regis($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_petugas($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data,$where );
    }

    


    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // Model petugas pada controller datalelang
    public function first($username) {
		return $this->db->where('username', $username)
						->join('tb_level', 'tb_level.id_level = tb_petugas.id_level')
					    ->get('tb_petugas')->row_object();
	}

	public function all() {
		return $this->db->get('tb_petugas')->result_object();
	}

}