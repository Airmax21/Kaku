<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_register extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
        $this->load->library(array(
            'encrypt'
        ));
    }

    function get_data_username($username) 
    {
        $sql = "SELECT 
                * 
                FROM mst_pegawai
                WHERE username = ?";
        $query = $this->db->query($sql,array($username));
        $result = $query->row_array();
        return $result;
    }

    function get_data_id($id) 
    {
        $sql = "SELECT 
                * 
                FROM mst_pegawai
                WHERE username = ?";
        $query = $this->db->query($sql,array($id));
        $result = $query->row_array();
        return $result;
    }

    function register($author)
    {
        $data = $this->input->post();
        $data['pass'] = $this->encrypt->encode($data['pass']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $author;
        $data['is_active'] = 1;
        $data['is_delete'] = 0;
        $this->db->insert('mst_pegawai', $data);
    }
}