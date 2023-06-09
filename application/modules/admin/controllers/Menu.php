<?php defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends MY_Controller
{
    var $cookie;
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'app/m_app',
            'm_admin',
            'm_menu',
            'm_jenis_menu'
        ));
        $this->cookie = $this->m_app->get_cookie_user();
        if($this->cookie['role'] != 1) redirect('login/pegawai');
    }

    public function index()
    {
        $header['title'] = 'Admin Menu'; 
        $main['menu'] = $this->m_menu->menu_data();
        $main['jenis']['jenis'] = $this->m_jenis_menu->jenis_data(); 
        $this->load->view('_header',$header);
        $this->load->view('menu/index',$main);
    }

    public function tambah()
    {
        $this->m_menu->create_menu();
        redirect('admin/menu');
    }

    public function update()
    {
        $this->m_menu->update_menu();
        redirect('admin/menu');
    }
    public function delete()
    {
        $this->m_menu->delete_menu();
        redirect('admin/menu');
    }

}
