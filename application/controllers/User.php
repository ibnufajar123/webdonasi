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
        $data['iklan'] = $this->db->query("SELECT * FROM iklan, kategori_iklan, user
		WHERE kategori_iklan.id_kategori = iklan.id_kategori
        AND iklan.id_user = user.id")->result();
        $this->load->view('user/header', $data);
        $this->load->view('home',  $data);
        $this->load->view('user/footer');
    }
}
