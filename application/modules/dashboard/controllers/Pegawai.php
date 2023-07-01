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
            'm_order',
            'm_detail_order',
            'm_menu'

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
        }
        if ($post['view_name'] == 'kasir') {
            $data['main'] = $this->m_order->order_data_pending();
        }
        if ($post['view_name'] == 'dapur') {
            $data['main'] = $this->m_order->order_data_process();
        }
        echo json_encode(array(
            'html' => $this->load->view($post['view_name'], $data, true)
        ));
    }

    public function ajax_kasir()
    {
        $post = $this->input->post();
        $data['main'] = $this->m_detail_order->detail_order_data($post['order_id']);
        $data['order_id'] = $post['order_id'];
        $data['order'] = $this->m_order->get_order($post['order_id']);
        $data['menu']['menu'] = $this->m_menu->menu_data();
        echo json_encode(array(
            'html' => $this->load->view('dashboard/detail_kasir', $data, true)
        ));
    }

    public function ajax_bayar()
    {
        $this->m_order->update_order();
        $data['main'] = $this->m_order->order_data_pending();
        echo json_encode(array(
            'html' => $this->load->view('dashboard/kasir', $data, true)
        ));
    }

    public function ajax_dapur()
    {
        $this->m_order->update_order();
        $data['main'] = $this->m_order->order_data_process();
        echo json_encode(array(
            'html' => $this->load->view('dashboard/kasir', $data, true)
        ));
    }
}
