<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MY_Controller {
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        
    }

	public function index()
	{
        $header['judul'] = 'Login';
        $header['css'] = array('login.css');
        $this->load->view('app/header',$header);
		$this->load->view('login');
	}
}
