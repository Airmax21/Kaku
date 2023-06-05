<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array(
            'encrypt'
        ));
    }

    function get_pegawai($id)
    {
        $sql = "SELECT 
                * 
                FROM mst_pegawai
                WHERE pegawai_id = ?";
        $query = $this->db->query($sql,array($id));
        $result = $query->row_array();
        return $result;
    }
    function create_pegawai($author)
    {
        $data = $this->input->post();
        $data['pass'] = $this->encrypt->encode($data['pass']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $author;
        $data['is_active'] = 1;
        $data['is_delete'] = 0;
        $this->db->insert('mst_pegawai', $data);
    }
    function update_pegawai($id)
    {
        $data = $this->input->post();

        $this->db->update('mst_pegawai',$data,$id);
    }
    function get_pass($username)
    {
        $sql = "SELECT
                pass
                FROM mst_pegawai
                WHERE username = ?";
        $query = $this->db->query($sql, array($username));
        $result = $query->row_array();
        return $result['pass'];
    }
}
