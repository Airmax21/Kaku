<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }

    function login()
    {
        $data = $this->input->post();
        $data['pass'] = password_hash($data['pass'],PASSWORD_BCRYPT);
        $sql = "SELECT
                *
                FROM mst_pegawai
                WHERE username = '" . $data['username'] . 
                "' AND pass = '" . $data['pass'] . "'" ;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        var_dump($result);
        return $result;
    }
}