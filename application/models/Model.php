<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{
	public function get_data($table)
	{
		return $this->db->get($table);
	}

	public function ambil_id_film($id)
	{
		$hasil = $this->db->where('id_film', $id)->get('listfilm');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false;
		}
	}
	public function ambil_id_kursi($id)
	{
		$hasil = $this->db->where('id_film', $id)->get('kursi');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false;
		}
	}
	public function ambil_id_kursii($id)
	{
		$hasil = $this->db->where('id_film', $id)->get('kursii');
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

	public function insert_kursi($film, $kursi)
	{
		for ($i = 1; $i <= $kursi; $i++) {
			$data = array(
				'id_film' => $film,
				'nomor_kursi' => $i
			);
			$insert = $this->db->insert('kursi', $data);
		}
		return $insert;
	}

	public function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function ambil_id_user($id)
	{
		$hasil = $this->db->where('id', $id)->get('user');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false;
		}
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
