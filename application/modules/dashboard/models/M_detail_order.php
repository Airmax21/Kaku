<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_detail_order extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'm_menu'
        ));
    }

    function detail_order_data($id)
    {
        $sql = "SELECT 
                a.*,
                b.*,
                c.*
                FROM dat_detail_order a
                LEFT JOIN dat_order b
                ON a.order_id = b.order_id
                LEFT JOIN mst_menu c
                ON a.menu_id = c.menu_id
                WHERE a.is_delete=0
                AND a.order_id = ?";
        $query = $this->db->query($sql, array($id));
        $result = $query->result_array();
        return $result;
    }
    function get_detail_order($id)
    {
        $sql = "SELECT 
                * 
                FROM dat_detail_order
                WHERE detail_order_id = ?";
        $query = $this->db->query($sql, array($id));
        $result = $query->row_array();
        return $result;
    }
    function create_detail_order()
    {
        $data = $this->input->post();
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->cookie['username'];
        $data['is_delete'] = 0;
        $total = $this->jumlah_total($data['order_id']);
        $harga = $this->m_menu->get_menu($data['menu_id']);
        $jumlah['grand_total'] = $total['total'] + $harga['harga'] * $data['jumlah'];
        $this->db->insert('dat_detail_order', $data);
        $this->db->where('order_id', $data['order_id']);
        $this->db->update('dat_order', $jumlah);
    }
    function update_detail_order()
    {
        $data = $this->input->post();
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->cookie['username'];
        $total = $this->jumlah_total($data['order_id']);
        $harga = $this->m_menu->get_menu($data['menu_id']);
        $harga_lama = $this->harga_lama($data['detail_order_id']);
        $jumlah['grand_total'] = $total['total'] - $harga_lama['harga']  + $harga['harga'] * $data['jumlah'];
        $this->db->where('detail_order_id', $data['detail_order_id']);
        $this->db->update('dat_detail_order', $data);
        $this->db->where('order_id', $data['order_id']);
        $this->db->update('dat_order', $jumlah);
    }
    function delete_detail_order()
    {
        $data = $this->input->post();
        $id = $this->input->post('detail_order_id');
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $this->cookie['username'];
        $data['is_delete'] = 1;
        $this->db->where('detail_order_id', $id);
        $this->db->update('dat_detail_order', $data);
        $total = $this->jumlah_total($data['order_id']);
        $jumlah['grand_total'] = $total['total'];
        $this->db->where('order_id', $data['order_id']);
        $this->db->update('dat_order', $jumlah);
    }
    function jumlah_total($id)
    {
        $sql = "SELECT 
        SUM(a.jumlah * b.harga) as total
        FROM dat_detail_order a
        left join mst_menu b 
        on a.menu_id = b.menu_id 
        WHERE a.is_delete=0
        AND a.order_id = ?";
        $query = $this->db->query($sql, array($id));
        $result = $query->row_array();
        return $result;
    }
    function harga_lama($id)
    {
        $sql = "SELECT 
        a.jumlah * b.harga as harga
        FROM dat_detail_order a
        left join mst_menu b 
        on a.menu_id = b.menu_id 
        WHERE a.is_delete=0
        AND a.detail_order_id = ?";
        $query = $this->db->query($sql, array($id));
        $result = $query->row_array();
        return $result;
    }

    function count()
    {
        $sql = "SELECT 
        COUNT(1) as pesanan,
        antrian.antrian,
        selesai.selesai,
        proses.proses
        FROM dat_detail_order,
        (SELECT
        COUNT(1) as antrian
        FROM dat_detail_order
        WHERE status = 1
        AND is_delete=0) AS antrian,
        (SELECT
        COUNT(1) as selesai
        FROM dat_detail_order
        WHERE status = 0
        AND is_delete=0) AS selesai,
        (SELECT
        COUNT(1) as proses
        FROM dat_detail_order
        WHERE status = 2
        AND is_delete=0) AS proses
        WHERE is_delete=0";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result;
    }
}
