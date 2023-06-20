<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_jenis_menu extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function jenis_data()
    {
        $sql = "SELECT 
                a.*
                FROM mst_jenis_menu a
                WHERE a.is_delete=0";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    function get_jenis($id)
    {
        $sql = "SELECT 
                * 
                FROM mst_jenis_menu
                WHERE menu_id = ?";
        $query = $this->db->query($sql,array($id));
        $result = $query->row_array();
        return $result;
    }
    function create_jenis()
    {
        
        $data = $this->input->post();
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path']          = base_url() . "assets/img/jenis_menu/";
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['file_name']            = $_FILES['gambar']['name'];
            $config['overwrite']            = true;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('gambar')) {
                $data['gambar'] =  $this->upload->data('file_name');
            }
        }
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->cookie['username'];
        $data['is_delete'] = 0;
        $this->db->insert('mst_jenis_menu', $data);
    }
    function update_jenis()
    {
        $data = $this->input->post();
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->cookie['username'];
        $this->db->where('menu_id', $data['menu_id']);
        $this->db->update('mst_jenis_menu', $data);
    }
    function delete_jenis()
    {
        $id = $this->input->post('menu_id');
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $this->cookie['username'];
        $data['is_delete'] = 1;
        $this->db->where('menu_id', $id);
        $this->db->update('mst_jenis_menu', $data);
    }
}
