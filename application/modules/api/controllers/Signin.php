<?php defined('BASEPATH') or exit('No direct script access allowed');

class Signin extends MY_Controller
{
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'm_pelanggan'
        ));
    }
    function index()
    {
        $json = $this->m_pelanggan->login();
        header('Content-Type: application/json');
        echo json_encode($json);
    }
}
