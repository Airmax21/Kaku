<?php defined('BASEPATH') or exit('No direct script access allowed');

class Startup extends MY_Controller
{
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
    }

    public function index()
    {
        redirect(site_url() . '/login/pegawai');
    }

    
}
