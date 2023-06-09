<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends MY_Controller
{
    var $cookie;
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'app/m_app',
            'm_admin',
            'm_pelanggan'
        ));
        $this->cookie = $this->m_app->get_cookie_user();
        if($this->cookie['role'] != 1) redirect('login/pelanggan');
    }

    public function index()
    {
        $header['title'] = 'Admin pelanggan'; 
        $main['pelanggan'] = $this->m_pelanggan->pelanggan_data();
        $this->load->view('_header',$header);
        $this->load->view('pelanggan/index',$main);
    }
    public function aktivasi($id)
    {
        $this->m_pelanggan->aktivasi($id);
        redirect('admin/pelanggan');
    }
    public function update()
    {
        $this->m_pelanggan->update_pelanggan();
        redirect('admin/pelanggan');
    }
    public function tambah()
    {
        $this->m_pelanggan->create_pelanggan();
        redirect('admin/pelanggan');
    }
    public function delete()
    {
        $this->m_pelanggan->delete_pelanggan();
        redirect('admin/pelanggan');
    }
}
