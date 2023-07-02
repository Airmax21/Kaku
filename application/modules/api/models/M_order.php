<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_order extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function order_data()
    {
        $sql = "SELECT 
                a.*,
                b.nama 
                FROM dat_order a
                LEFT JOIN mst_pelanggan b 
                ON a.pelanggan_id = b.pelanggan_id
                WHERE a.is_delete=0";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    function get_order()
    {
        $data = $this->input->post();
        $sql = "SELECT 
                * 
                FROM dat_order
                WHERE order_id = ?";
        $query = $this->db->query($sql,array($data['order_id']));
        $result = $query->row_array();
        return $result;
    }
    function create_order()
    {
        $data = $this->input->post();
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->cookie['username'];
        $data['is_delete'] = 0;
        $this->db->insert('dat_order', $data);
    }
    function update_order()
    {
        $data = $this->input->post();
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->cookie['username'];
        $this->db->where('order_id', $data['order_id']);
        $this->db->update('dat_order', $data);
    }
    function delete_order()
    {
        $id = $this->input->post('order_id');
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $this->cookie['username'];
        $data['is_delete'] = 1;
        $this->db->where('order_id', $id);
        $this->db->update('dat_order', $data);
    }
    function count()
    {
        $sql = "SELECT 
        COUNT(1) as pesanan,
        antrian.antrian,
        selesai.selesai,
        proses.proses
        FROM dat_order,
        (SELECT
        COUNT(1) as antrian
        FROM dat_order
        WHERE status = 1
        AND is_delete=0) AS antrian,
        (SELECT
        COUNT(1) as selesai
        FROM dat_order
        WHERE status = 0
        AND is_delete=0) AS selesai,
        (SELECT
        COUNT(1) as proses
        FROM dat_order
        WHERE status = 2
        AND is_delete=0) AS proses
        WHERE is_delete=0";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result;
    }
}
