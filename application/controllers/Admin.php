<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     is_logged_in();
    // }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataUser'] = $this->db->query("SELECT user.id, user.name, user.email, user.is_active, user.date_created, user_role.role 
        FROM user INNER JOIN user_role 
        ON user_role.id=user.role_id ")->result();
        // $this->session->mark_as_temp('index', 30);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }


    public function data_iklan()
    {
        $data['title'] = 'Data Iklan';
        $data['dataKategori'] = $this->Model->get_data('kategori_iklan')->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataIklan'] = $this->db->query("SELECT * FROM kategori_iklan, user, iklan
        WHERE kategori_iklan.id_kategori = iklan.id_kategori
        AND iklan.id_user = user.id
        AND iklan.status = 1")->result();
        // $this->session->mark_as_temp('index', 30);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/data_iklan', $data);
        $this->load->view('admin/footer');
    }
    public function pengajuanIklan()
    {
        $data['title'] = 'Pengajuan Iklan';
        $data['dataKategori'] = $this->Model->get_data('kategori_iklan')->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengajuanIklan'] = $this->db->query("SELECT * FROM kategori_iklan, user, iklan
        WHERE kategori_iklan.id_kategori = iklan.id_kategori
        AND iklan.id_user = user.id
        AND iklan.status = 0")->result();
        // $this->session->mark_as_temp('index', 30);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/pengajuan_iklan', $data);
        $this->load->view('admin/footer');
    }
    public function konfirmasiIklan($id)
    {
        $where = array('id' => $id);
        $data['title'] = 'Update Iklan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->Model->edit_iklan($where, 'iklan')->result();
        $data['pengajuanIklan'] = $this->db->query("SELECT * FROM kategori_iklan, user, iklan
        WHERE kategori_iklan.id_kategori = iklan.id_kategori
        AND iklan.id_user = user.id
        AND iklan.status = 0")->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/konfirmasi_iklan', $data);
        $this->load->view('admin/footer');
    }

    public function konfirmasiIklanAksi()
    {
       $id = $this->input->post('id');
        $id_kategori = $this->input->post('id_kategori');
        $id_user = $this->input->post('id_user');
        $judul = $this->input->post('judul');
        $date = $this->input->post('date');
        $date_end = $this->input->post('date_end');
        $total_dana = $this->input->post('total_dana');
        $cerita = $this->input->post('cerita');
        $status = $this->input->post('status');
        $gambar = $this->input->post('gambar');

        $data = array(
            'id_kategori' => $i_kategori,
            'id_user' => $id_user,
            'judul' => $judul,
            'date' => $date,
            'date_end' => $date_end,
            'total_dana' => $total_dana,
            'cerita' => $cerita,
            'status' => $status,
            'gambar' => $gambar


        );
        $where = array(
            'id' => $id
        );
        $this->Model->update_data($where, $data, 'iklan');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data film berhasil Ditambahkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('admin');
    }

    public function data_kategori()
    {
        $data['title'] = 'Data Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataKategori'] = $this->Model->get_data('kategori_iklan')->result();
        // $this->session->mark_as_temp('index', 30);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/data_kategori', $data);
        $this->load->view('admin/footer');
    }
    public function tambahIklan()
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
        redirect('admin');
    }
    public function data()
    {
      
    }
}
