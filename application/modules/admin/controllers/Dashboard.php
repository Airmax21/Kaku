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
        $main['jumlahorder'] = $this->m_order->count();
        $main['jumlahpegawai'] = $this->m_pegawai->count();
        $main['jumlahpelanggan'] = $this->m_pelanggan->count();
        $this->load->view('_header',$header);
        $this->load->view('dashboard',$main);
    }

}
