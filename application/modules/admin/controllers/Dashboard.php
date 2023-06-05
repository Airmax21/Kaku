<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    var $cookie;
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'app/m_app',
            'm_admin'
        ));
        $this->cookie = $this->m_app->get_cookie_user();
    }

    public function index()
    {
        $this->load->view('_header');
        
        $this->load->view('dashboard');
    }
}
