<?php defined('BASEPATH') or exit('No direct script access allowed');

class Role extends MY_Controller
{
    var $cookie;
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'app/m_app',
            'm_admin',
            'm_role'
        ));
        $this->cookie = $this->m_app->get_cookie_user();
        if($this->cookie['role'] != 1) redirect('login/pegawai');
    }

    public function index()
    {
        $header['title'] = 'Admin Role'; 
        $main['role'] = $this->m_role->role_data(); 
        $this->load->view('_header',$header);
        $this->load->view('role/index',$main);
    }

    public function tambah()
    {
        $this->m_role->create_role();
        redirect('admin/role');
    }

    public function update()
    {
        $this->m_role->update_role();
        redirect('admin/role');
    }
    public function delete()
    {
        $this->m_role->delete_role();
        redirect('admin/role');
    }

}
