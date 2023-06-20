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
                LEFT JOIN mst_pelanggan b ON a.pelanggan_id = b.pelanggan_id
                WHERE a.is_delete=0";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function order_data_pending()
    {
        $sql = "SELECT 
                a.*,
                b.nama 
                FROM dat_order a
                LEFT JOIN mst_pelanggan b ON a.pelanggan_id = b.pelanggan_id
                WHERE a.is_delete=0
                AND a.status=1";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function order_data_process()
    {
        $sql = "SELECT 
                a.*,
                b.nama 
                FROM dat_order a
                LEFT JOIN mst_pelanggan b ON a.pelanggan_id = b.pelanggan_id
                WHERE a.is_delete=0
                AND a.status=2";
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
    function count()
    {
        $sql = "SELECT 
        COUNT(1) as pesanan,
        antrian.antrian,
        selesai.selesai
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
        AND is_delete=0) AS selesai
        WHERE is_delete=0";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result;
    }
}
