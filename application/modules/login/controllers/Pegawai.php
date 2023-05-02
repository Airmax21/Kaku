<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MY_Controller {
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
