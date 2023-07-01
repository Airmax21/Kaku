<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_menu extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function menu_data()
    {
        $sql = "SELECT 
                a.*,
                b.jenis_nm
                FROM mst_menu a
                LEFT JOIN mst_jenis_menu b
                ON a.jenis_id=b.jenis_id
                WHERE a.is_delete=0";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    function get_menu($id)
    {
        $sql = "SELECT 
                * 
                FROM mst_menu
                WHERE menu_id = ?";
        $query = $this->db->query($sql,array($id));
        $result = $query->row_array();
        return $result;
    }
    
    function create_menu()
    {
        $data = $this->input->post();
        if(!empty($_FILES['gambar']['name'])) {
            $config['upload_path']          = FCPATH . "assets/img/menu/";
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
        $this->db->insert('mst_menu', $data);
    }
    function update_menu()
    {
        $data = $this->input->post();
        if(!empty($_FILES['gambar']['name'])) {
            $config['upload_path']          = FCPATH . "assets/img/menu/";
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['file_name']            = $_FILES['gambar']['name'];
            $config['overwrite']            = true;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('gambar')) {
                $data['gambar'] =  $this->upload->data('file_name');
            }
        }
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->cookie['username'];
        $this->db->where('menu_id', $data['menu_id']);
        $this->db->update('mst_menu', $data);
    }
    function delete_menu()
    {
        $id = $this->input->post('menu_id');
        $data = $this->input->post();
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $this->cookie['username'];
        $data['is_delete'] = 1;
        $this->db->where('menu_id', $id);
        $this->db->update('mst_menu', $data);
    }
    function count()
    {
        $sql = "SELECT 
        COUNT(1) as pesanan,
        antrian.antrian,
        selesai.selesai,
        proses.proses
        FROM mst_menu,
        (SELECT
        COUNT(1) as antrian
        FROM mst_menu
        WHERE status = 1
        AND is_delete=0) AS antrian,
        (SELECT
        COUNT(1) as selesai
        FROM mst_menu
        WHERE status = 0
        AND is_delete=0) AS selesai,
        (SELECT
        COUNT(1) as proses
        FROM mst_menu
        WHERE status = 2
        AND is_delete=0) AS proses
        WHERE is_delete=0";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result;
    }
}
