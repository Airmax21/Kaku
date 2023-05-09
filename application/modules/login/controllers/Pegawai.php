<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MY_Controller {

    var $cookie;
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'm_login',
            'app/m_app',

        ));
        $this->cookie = $this->m_app->get_cookie_user();
    }

	public function index()
	{
        $header['judul'] = 'Login';
        $header['css'] = array('login');
        $data['jenis'] = 'Karyawan';
        $this->load->view('app/header',$header);
		$this->load->view('login',$data);
	}

    public function auth(){
        $login = $this->m_login->login();
        if ($login['data'] != '' ) {
            $this->cookie['username'] = $login['username'];
            $this->cookie['id'] = $login['pegawai_id'];
            $this->cookie['fullname'] = $login['nama'];
            redirect(site_url() . '/dashboard/pegawai');
        }
        else {
            print $login;
        }
    }
}
