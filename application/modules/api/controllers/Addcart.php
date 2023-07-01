<?php defined('BASEPATH') or exit('No direct script access allowed');

class Addcart extends MY_Controller
{
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'm_detail_order'
        ));
    }
    function index()
    {
        $this->m_detail_order->create_detail_order();
        $data['status'] = 'berhasil';
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
