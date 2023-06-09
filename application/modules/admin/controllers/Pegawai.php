<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends MY_Controller
{
    var $cookie;
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'app/m_app',
            'm_admin',
            'm_pegawai',
            'm_role'
        ));
        $this->cookie = $this->m_app->get_cookie_user();
        if($this->cookie['role'] != 1) redirect('login/pegawai');
    }

    public function index()
    {
        $header['title'] = 'Admin Pegawai'; 
        $main['pegawai'] = $this->m_pegawai->pegawai_data();
        $main['role']['role'] = $this->m_role->role_data(); 
        $this->load->view('_header',$header);
        $this->load->view('pegawai/index',$main);
    }
    public function aktivasi($id)
    {
        $this->m_pegawai->aktivasi($id);
        redirect('admin/pegawai');
    }
    public function update()
    {
        $this->m_pegawai->update_pegawai();
        redirect('admin/pegawai');
    }
    public function tambah()
    {
        $this->m_pegawai->create_pegawai();
        redirect('admin/pegawai');
    }
    public function delete()
    {
        $this->m_pegawai->delete_pegawai();
        redirect('admin/pegawai');
    }
}
