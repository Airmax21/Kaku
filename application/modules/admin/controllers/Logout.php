<?php defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends MY_Controller
{
    var $cookie;
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'app/m_app',
            'm_admin',
            'm_order',
            'm_pegawai',
            'm_pelanggan'
        ));
        $this->cookie = $this->m_app->get_cookie_user();
        if ($this->cookie['role'] != 1) redirect('login/pegawai');
    }

    public function index()
    {
        $this->cookie['username'] = null;
        $this->cookie['id'] = null;
        $this->cookie['fullname']= null;
        $this->cookie['role']= null;
        $this->m_app->set_cookie_user($this->cookie);
        redirect('login/pegawai');
    }
}
