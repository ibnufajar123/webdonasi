<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     is_logged_in();
    // }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $role_id = $this->session->userdata('role_id');
        $data['menu'] = $this->db->query("SELECT * FROM user_sub_menu 
        WHERE user_sub_menu.menu_id = $role_id
        ")->result_array();
        $data['dataKategori'] = $this->Model->get_data('kategori_iklan')->result();
        $data['iklan'] = $this->db->query("SELECT iklan.id, iklan.id_kategori, iklan.id_user, iklan.judul, iklan.date, iklan.date_end, iklan.gambar, iklan.cerita, iklan.status, kategori_iklan.id_kategori, kategori_iklan.nama_kategori, user.name, user.image
        FROM iklan, kategori_iklan, user 
        WHERE kategori_iklan.id_kategori = iklan.id_kategori 
        AND iklan.id_user = user.id")->result();
        $this->load->view('user/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('user/footer');
    }
    public function donasi($id)
    {
        $data['title'] = 'Donasi User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $role_id = $this->session->userdata('role_id');
        $data['donasi'] = $this->Model->ambil_id_iklan($id);
        $data['totalDonasi'] = $this->db->query("SELECT SUM(nominal) as total 
		FROM donasi WHERE id_iklan= $id")->result();
        $data['totalPendonasi'] = $this->db->query("SELECT COUNT(name) as pendonasi 
		FROM donasi WHERE id_iklan = $id")->result();
        $data['menu'] = $this->db->query("SELECT * FROM user_sub_menu 
        WHERE user_sub_menu.menu_id = $role_id
        ")->result_array();
        $this->load->view('user/header', $data);
        $this->load->view('user/donasi', $data);
        $this->load->view('user/footer');
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
        redirect('user');
    }
    public function pengajuanIklan()
    {
        $id_kategori = $this->input->post('id_kategori');
        $id_user = $this->input->post('id_user');
        $judul = $this->input->post('judul');
        $date = $this->input->post('date');
        $date_end = $this->input->post('date_end');
        $total_dana = $this->input->post('total_dana');
        $cerita = $this->input->post('cerita');
        $status = $this->input->post('status');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './assets/img';
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = array(
            'id_kategori' => $id_kategori,
            'id_user' => $id_user,
            'judul' => $judul,
            'date' => $date,
            'date_end' => $date_end,
            'total_dana' => $total_dana,
            'cerita' => $cerita,
            'status' => $status,
            'gambar' => $gambar
        );
        $this->Model->insert_data($data, 'iklan');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data film berhasil Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('user');
    }
}
