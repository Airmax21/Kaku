<?php defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends MY_Controller
{
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'm_pelanggan',
            'app/m_app'
        ));
    }
    function index()
    {
        $this->m_pelanggan->create_pelanggan();
    }
    public function cek_username()
    {
        $cek = $this->m_pelanggan->cek_username();
        if ($cek) {
            $data = array(
                'status' => 'berhasil'
            );
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        } else {
            $data = array(
                'status' => 'gagal'
            );
            $this->output
                ->set_status_header(409)
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }
    }
    public function cek_otp()
    {
        $cek = $this->m_pelanggan->cek_otp();
        if ($cek) {
            $data = array(
                'status' => 'berhasil'
            );
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        } else {
            $data = array(
                'status' => 'gagal'
            );
            $this->output
                ->set_status_header(404)
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }
    }
    public function exp_otp()
    {
        $this->m_pelanggan->exp_otp();
        $data = array(
            'status' => 'berhasil'
        );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
    public function resend_otp()
    {
        $this->m_pelanggan->resend_otp();
        $data = array(
            'status' => 'berhasil'
        );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
