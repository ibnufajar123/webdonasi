<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model');
		$this->load->library('form_validation');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['iklan'] = $this->db->query("SELECT iklan.id, iklan.id_kategori, iklan.id_user, iklan.judul, iklan.date, iklan.date_end, iklan.gambar, iklan.cerita, iklan.status,iklan.total_dana, kategori_iklan.id_kategori, kategori_iklan.nama_kategori, user.name, user.image
        FROM iklan, kategori_iklan, user 
        WHERE kategori_iklan.id_kategori = iklan.id_kategori 
        AND iklan.id_user = user.id
		AND iklan.status =1")->result();
		$this->load->view('templates/header');
		$this->load->view('home', $data);
		$this->load->view('templates/footer');
	}
	public function donasi($id)
	{
		$data['totalDonasi'] = $this->db->query("SELECT SUM(nominal) as total 
		FROM donasi WHERE id_iklan= $id")->result();
		$data['totalPendonasi'] = $this->db->query("SELECT COUNT(name) as pendonasi 
		FROM donasi WHERE id_iklan = $id")->result();
		$data['donasi'] = $this->Model->ambil_id_iklan($id);
		$this->load->view('templates/header');
		$this->load->view('donasi', $data);
		$this->load->view('templates/footer');
	}
	public function inputDonasi()
	{

		$id_iklan = $this->input->post('id_iklan');
		$name = $this->input->post('name');
		$nominal = $this->input->post('nominal');
		$date = $this->input->post('date');
		$pesan = $this->input->post('pesan');

		$data = array(
			'id_iklan' => $id_iklan,
			'name' => $name,
			'nominal' => $nominal,
			'date' => $date,
			'pesan' => $pesan

		);
		$this->Model->insert_data($data, 'donasi');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Terimakasih Sudah berdonasi.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>');
		redirect('welcome');
	}
}
