<?php defined('BASEPATH') or exit('No direct script access allowed');

class Favorite_menu extends MY_Controller
{
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'm_menu'
        ));
    }
    function index()
    {
        $data = $this->m_menu->menu_data();
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
    }
}
