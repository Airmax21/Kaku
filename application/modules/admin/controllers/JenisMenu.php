<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jenismenu extends MY_Controller
{
    var $cookie;
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'app/m_app',
            'm_admin',
            'm_jenis_menu'
        ));
        $this->cookie = $this->m_app->get_cookie_user();
        if($this->cookie['role'] != 1) redirect('login/pegawai');
    }

    public function index()
    {
        $header['title'] = 'Admin Jenis Menu'; 
        $main['jenis_menu'] = $this->m_jenis_menu->jenis_data(); 
        $this->load->view('_header',$header);
        $this->load->view('jenismenu/index',$main);
    }

    public function tambah()
    {
        $this->m_jenis_menu->create_jenis();
        redirect('admin/jenis_menu');
    }

    public function update()
    {
        $this->m_jenis_menu->update_jenis();
        redirect('admin/jenis_menu');
    }
    public function delete()
    {
        $this->m_jenis_menu->delete_jenis();
        redirect('admin/jenis_menu');
    }

}
