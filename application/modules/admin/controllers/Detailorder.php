<?php defined('BASEPATH') or exit('No direct script access allowed');

class Detailorder extends MY_Controller
{
    var $cookie;
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'app/m_app',
            'm_admin',
            'm_detail_order',
            'm_order',
            'm_menu'
        ));
        $this->cookie = $this->m_app->get_cookie_user();
        if($this->cookie['role'] != 1) redirect('login/pegawai');
    }

    public function order($id = null)
    {
        $header['title'] = 'Admin Detail Order'; 
        $main['detail_order'] = $this->m_detail_order->detail_order_data($id);
        $main['order_id'] = $id;
        $main['order'] = $this->m_order->get_order($id);
        $main['menu']['menu'] = $this->m_menu->menu_data(); 
        $this->load->view('_header',$header);
        $this->load->view('detailorder/index',$main);
    }

    public function tambah()
    {
        $id = $this->input->post('order_id');
        $this->m_detail_order->create_detail_order();
        redirect('admin/detailorder/order/' . $id);
    }

    public function update()
    {
        $id = $this->input->post('order_id');
        $this->m_detail_order->update_detail_order();
        redirect('admin/detailorder/order/' . $id);
    }
    public function delete()
    {
        $id = $this->input->post('order_id');
        $this->m_detail_order->delete_detail_order();
        redirect('admin/detailorder/order/' . $id);
    }

}
