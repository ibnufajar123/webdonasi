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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataIklan'] = $this->db->query("SELECT * FROM iklan, kategori_iklan, user
        WHERE kategori_iklan.id_kategori = iklan.id_kategori
        AND iklan.id_user = user.id")->result();
        // Akan diperbaiki query data iklan nya

        // $this->session->mark_as_temp('index', 30);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/data_iklan', $data);
        $this->load->view('admin/footer');
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
}
