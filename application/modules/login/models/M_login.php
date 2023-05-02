<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_app extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
        $this->load->library(array(
            'encrypt'
        ));
    }

    function login()
    {
        $data = $this->input->post();
        $data['pass'] = $this->encrypt->encode($data['pass']);
        $sql = "SELECT
                *
                FROM mst_pegawai
                WHERE username = ?
                AND pass = ?";
        $query = $this->db->query($sql,array($data['username'],$data['pass']));
        $result = $query->row_array();
        return $result;
    }
}