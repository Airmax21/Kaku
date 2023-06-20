<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
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
        $pass = $this->encrypt->decode($this->get_pass($data['username']));
        if($pass == $data['pass'])
        {
            $sql = "SELECT
                    *
                    FROM mst_pegawai
                    WHERE username = ?
                    AND is_delete=0";
            $query = $this->db->query($sql, array($data['username']));
            $result = $query->row_array();
            if($result != NULL) return $result;
            else return false;
        }
        else return false;
    }

    function get_pass($username)
    {
        $sql = "SELECT
                pass
                FROM mst_pegawai
                WHERE username = ?
                AND is_delete=0";
        $query = $this->db->query($sql, array($username));
        $result = $query->row_array();
        return $result['pass'];
    }
}
