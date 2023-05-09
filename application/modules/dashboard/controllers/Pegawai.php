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

        ));
        $this->cookie = $this->m_app->get_cookie_user();
    }

    public function index()
    {
        if ($this->cookie['username']) {
            $header['judul'] = 'Login';
            $header['css'] = array('dashboard');
            $data['jenis'] = 'Karyawan';
            $this->load->view('app/header', $header);
            $this->load->view('dashboard', $data);
        }
        else {
            redirect(site_url() . '/login/pegawai');
        }
    }
}
