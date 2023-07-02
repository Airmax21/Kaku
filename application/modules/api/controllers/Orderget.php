<?php defined('BASEPATH') or exit('No direct script access allowed');

class Orderget extends MY_Controller
{
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'm_order'
        ));
    }
    function index()
    {
        $data = $this->m_order->get_order();
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
    }
}
