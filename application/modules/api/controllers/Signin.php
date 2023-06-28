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
        $cek = $this->m_pelanggan->login();
        if ($cek) {
            $data = array(
                'status' => 'berhasil'
            );
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }
        else {
            $data = array(
                'status' => 'gagal'
            );
            $this->output
                ->set_status_header(404)
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }
    }
}
