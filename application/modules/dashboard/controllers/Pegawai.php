<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends MY_Controller
{

    var $cookie;
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'app/m_app',
            'm_order'

        ));
        $this->cookie = $this->m_app->get_cookie_user();
    }

    public function index()
    {
        if ($this->cookie['username']) {
            $header['judul'] = 'Dashboard';
            $header['css'] = array('dashboard');
            $data['jenis'] = 'Karyawan';
            $data['count'] = $this->m_order->count();
            $data['main'] = $this->m_order->order_data();
            $this->load->view('app/header', $header);
            $this->load->view('index', $data);
        } else {
            redirect(site_url() . '/login/pegawai');
        }
    }
    public function ajax()
    {
        $post = $this->input->post();
        if ($post['view_name'] == 'dashboard') {
            $data['count'] = $this->m_order->count();
            $data['main'] = $this->m_order->order_data();
            echo json_encode(array(
                'html' => $this->load->view('dashboard', $data, true)
            ));
        }
        if ($post['view_name'] == 'kasir') {
            $data['main'] = $this->m_order->order_data_pending();
            echo json_encode(array(
                'html' => $this->load->view('kasir', $data, true)
            ));
        }
        if ($post['view_name'] == 'dapur') {
            $data['main'] = $this->m_order->order_data_process();
            echo json_encode(array(
                'html' => $this->load->view('dapur', $data, true)
            ));
        }
    }
}
