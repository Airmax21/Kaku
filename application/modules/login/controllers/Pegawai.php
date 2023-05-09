<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MY_Controller {
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'm_login'
        ));
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
        if ($login != null) {
            $this->cookie['username'] = $login['username'];
        }
    }
}