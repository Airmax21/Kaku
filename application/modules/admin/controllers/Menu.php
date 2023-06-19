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
            'm_menu'
        ));
        $this->cookie = $this->m_app->get_cookie_user();
        if($this->cookie['role'] != 1) redirect('login/pegawai');
    }

    public function index()
    {
        $header['title'] = 'Admin Menu'; 
        $main['menu'] = array(''); 
        $this->load->view('_header',$header);
        $this->load->view('menu/index',$main);
    }

}
