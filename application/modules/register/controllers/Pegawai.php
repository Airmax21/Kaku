<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MY_Controller {
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'm_register'
        ));
    }

	public function index()
	{
        $header['judul'] = 'Register';
        $header['css'] = array('login');
        $data['jenis'] = 'Karyawan';
        $this->load->view('app/header',$header);
		$this->load->view('register',$data);
	}

    public function register()
    {
        $this->m_register->register('Awal');
        $header['judul'] = 'Register';
        $header['css'] = array('login');
        $data['jenis'] = 'Karyawan';
        $this->load->view('app/header',$header);
		$this->load->view('register',$data);
    }
}
