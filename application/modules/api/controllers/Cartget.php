<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cartget extends MY_Controller
{
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'm_detail_order',
            'm_order'
        ));
    }
    function index()
    {
        $data = $this->m_detail_order->detail_order_data();
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
    }
    function checkout()
    {
        $this->m_order->checkout();
        $data['status'] = 'berhasil';
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
