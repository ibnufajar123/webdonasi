<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{
	public function get_data($table)
	{
		return $this->db->get($table);
	}


	public function ambil_id_iklan($id)
	{
		$hasil = $this->db->where('id', $id)->get('iklan');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false;
		}
	}


	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}


	public function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function update_data($where, $data, $table)
	{

		$this->db->where($where);

		$this->db->update($table, $data);
	}

	public function edit_user($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
}
