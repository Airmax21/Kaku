<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_role extends CI_Model
{
    var $cookie;
    function __construct()
    {
        parent::__construct();
        $this->load->library(array(
            'encrypt'
        ));
        $this->cookie = $this->m_app->get_cookie_user();
    }

    function role_data()
    {
        $sql = "SELECT 
                *
                FROM mst_role";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    function get_role($id)
    {
        $sql = "SELECT 
                * 
                FROM mst_role
                WHERE role_id = ?";
        $query = $this->db->query($sql,array($id));
        $result = $query->row_array();
        return $result;
    }
    function create_role()
    {
        $data = $this->input->post();
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->cookie['username'];
        $data['is_delete'] = 0;
        $this->db->insert('mst_role', $data);
    }
    function update_role($id)
    {
        $data = $this->input->post();
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->cookie['username'];
        $data['is_delete'] = 0;
        $this->db->where('role_id',$id);
        $this->db->update('mst_role',$data);
    }
}
