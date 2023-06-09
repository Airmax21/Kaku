<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array(
            'encrypt'
        ));
    }

    function pegawai_data()
    {
        $sql = "SELECT 
                a.*,
                b.role_nm 
                FROM mst_pegawai a
                LEFT JOIN mst_role b ON a.role_id = b.role_id
                WHERE a.is_delete=0";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    function get_pegawai($id)
    {
        $sql = "SELECT 
                * 
                FROM mst_pegawai
                WHERE pegawai_id = ? 
                AND is_delete=0";
        $query = $this->db->query($sql, array($id));
        $result = $query->row_array();
        return $result;
    }
    function create_pegawai()
    {
        $data = $this->input->post();
        $data['pass'] = $this->encrypt->encode($data['pass']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->cookie['username'];
        $data['is_active'] = 0;
        $data['is_delete'] = 0;
        $this->db->insert('mst_pegawai', $data);
    }
    function update_pegawai()
    {
        $data = $this->input->post();
        if ($data['pass'] != null) $data['pass'] = $this->encrypt->encode($data['pass']);
        else unset($data['pass']);
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->cookie['username'];
        $data['is_delete'] = 0;
        $this->db->where('pegawai_id', $data['pegawai_id']);
        $this->db->update('mst_pegawai', $data);
    }
    function delete_pegawai()
    {
        $id = $this->input->post('pegawai_id');
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $this->cookie['username'];
        $data['is_delete'] = 1;
        $this->db->where('pegawai_id', $id);
        $this->db->update('mst_pegawai', $data);
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
    function aktivasi($id)
    {
        $data['is_active'] = 1;
        $this->db->where('pegawai_id', $id);
        $this->db->update('mst_pegawai', $data);
    }
    function count()
    {
        $sql = "SELECT 
        COUNT(1) as totalpegawai,
        belumaktif.belumaktif,
        sudahaktif.sudahaktif
        FROM mst_pegawai,
        (SELECT
        COUNT(1) as belumaktif
        FROM mst_pegawai
        WHERE is_active = 0
        AND is_delete=0) AS belumaktif,
        (SELECT
        COUNT(1) as sudahaktif
        FROM mst_pegawai
        WHERE is_active = 1
        AND is_delete=0) AS sudahaktif
        WHERE is_delete=0";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result;
    }
}
