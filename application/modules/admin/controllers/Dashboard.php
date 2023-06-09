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
            'm_admin',
            'm_order',
            'm_pegawai',
            'm_pelanggan'
        ));
        $this->cookie = $this->m_app->get_cookie_user();
        if($this->cookie['role'] != 1) redirect('login/pegawai');
    }

    public function index()
    {
        $header['title'] = 'Dashboard Admin';
        $main['order'] = $this->m_order->order_data(); 
        $main['count_order'] = $this->m_order->count_order(); 
        $main['order_belum'] = $this->m_order->count_status_belum(); 
        $main['order_proses'] = $this->m_order->count_status_proses(); 
        $main['order_selesai'] = $this->m_order->count_status_selesai();
        $main['jumlahpegawai'] = $this->m_pegawai->count();
        $main['jumlahpelanggan'] = $this->m_pelanggan->count();
        $this->load->view('_header',$header);
        $this->load->view('dashboard',$main);
    }

}
