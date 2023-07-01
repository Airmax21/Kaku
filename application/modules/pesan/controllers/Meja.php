<?php defined('BASEPATH') or exit('No direct script access allowed');

class Meja extends MY_Controller
{
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'm_order',
            'app/m_app'
        ));
    }
    function no($id = null)
    {
        $data = $this->m_order->pesan_meja($id);
        if ($data) {
            $data['status'] = 'berhasil';
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
}
