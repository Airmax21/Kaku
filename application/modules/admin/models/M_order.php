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
                LEFT JOIN mst_pelanggan b ON a.pelanggan_id = b.pelanggan_id";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    function get_order($id)
    {
        $sql = "SELECT 
                * 
                FROM dat_order
                WHERE order_id = ?";
        $query = $this->db->query($sql,array($id));
        $result = $query->row_array();
        return $result;
    }
    function create_order($author)
    {
        $data = $this->input->post();
        $data['pass'] = $this->encrypt->encode($data['pass']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $author;
        $data['is_active'] = 1;
        $data['is_delete'] = 0;
        $this->db->insert('dat_order', $data);
    }
    function update_order($id)
    {
        $data = $this->input->post();

        $this->db->update('dat_order',$data,$id);
    }
    function count_order()
    {
        $sql = "SELECT 
                COUNT(1) as total
                FROM dat_order";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result['total'];
    }
    function count_status_belum()
    {
        $sql = "SELECT 
                COUNT(1) as total
                FROM dat_order
                WHERE status=1";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result['total'];
    }
    function count_status_proses()
    {
        $sql = "SELECT 
                COUNT(1) as total
                FROM dat_order
                WHERE status=2";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result['total'];
    }
    function count_status_selesai()
    {
        $sql = "SELECT 
                COUNT(1) as total
                FROM dat_order
                WHERE status=3";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result['total'];
    }
}
