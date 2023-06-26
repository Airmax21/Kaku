<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array(
            'encrypt'
        ));
        $this->load->model(array(
            'app/m_app'
        ));
    }

    function pelanggan_data()
    {
        $sql = "SELECT 
                a.*
                FROM mst_pelanggan a
                WHERE a.is_delete=0";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    function get_pelanggan($id)
    {
        $sql = "SELECT 
                * 
                FROM mst_pelanggan
                WHERE pelanggan_id = ? 
                AND is_delete=0";
        $query = $this->db->query($sql, array($id));
        $result = $query->row_array();
        return $result;
    }
    function get_pelanggan_username($username)
    {
        $sql = "SELECT 
                * 
                FROM mst_pelanggan
                WHERE username = ? 
                AND is_delete=0";
        $query = $this->db->query($sql, array($username));
        $result = $query->row_array();
        return $result;
    }
    function create_pelanggan()
    {
        $data = $this->input->post();
        $data['pass'] = $this->encrypt->encode($data['pass']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->cookie['username'];
        $data['is_active'] = 0;
        $data['is_delete'] = 0;
        $this->db->insert('mst_pelanggan', $data);
        $kode = random_int(1000, 9999);
        $this->kirim_otp($data['email'], $data['username'], $kode);
        $d['username'] = $data['username'];
        $d['kode_otp'] = $kode;
        $d['created_at'] = date('Y-m-d H:i:s');
        $d['created_by'] = $this->cookie['username'];
        $d['is_used'] = 0;
        $d['is_delete'] = 0;
        $this->db->insert('dat_otp', $d);
    }

    function update_pelanggan()
    {
        $data = $this->input->post();
        if ($data['pass'] != null) $data['pass'] = $this->encrypt->encode($data['pass']);
        else unset($data['pass']);
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->cookie['username'];
        $data['is_delete'] = 0;
        $this->db->where('pelanggan_id', $data['pelanggan_id']);
        $this->db->update('mst_pelanggan', $data);
    }
    function delete_pelanggan()
    {
        $id = $this->input->post('pelanggan_id');
        $data['deleted_at'] = date('Y-m-d H:i:s');
        $data['deleted_by'] = $this->cookie['username'];
        $data['is_delete'] = 1;
        $this->db->where('pelanggan_id', $id);
        $this->db->update('mst_pelanggan', $data);
    }
    function get_pass($username)
    {
        $sql = "SELECT
                pass
                FROM mst_pelanggan
                WHERE username = ?";
        $query = $this->db->query($sql, array($username));
        $result = $query->row_array();
        return $result['pass'];
    }
    function aktivasi($id)
    {
        $data['is_active'] = 1;
        $this->db->where('pelanggan_id', $id);
        $this->db->update('mst_pelanggan', $data);
    }
    function count()
    {
        $sql = "SELECT 
        COUNT(1) as totalpelanggan,
        belumaktif.belumaktif,
        sudahaktif.sudahaktif
        FROM mst_pelanggan,
        (SELECT
        COUNT(1) as belumaktif
        FROM mst_pelanggan
        WHERE is_active = 0
        AND is_delete=0) AS belumaktif,
        (SELECT
        COUNT(1) as sudahaktif
        FROM mst_pelanggan
        WHERE is_active = 1
        AND is_delete=0) AS sudahaktif
        WHERE is_delete=0";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result;
    }
    function cek_username()
    {
        $data = $this->input->post();
        $sql = "SELECT 
                * 
                FROM mst_pelanggan
                WHERE username = ? 
                AND is_delete=0";
        $query = $this->db->query($sql, array($data['username']));
        $result = $query->row_array();
        if ($result != null) return false;
        else return true;
    }
    function cek_otp()
    {
        $data = $this->input->post();
        $sql = "SELECT 
                * 
                FROM dat_otp
                WHERE kode_otp = ?
                AND username = ?
                AND is_used = 0 
                AND is_delete=0";
        $query = $this->db->query($sql, array($data['kode_otp'],$data['username']));
        $result = $query->row_array();
        if ($result != null) {
            $d['is_used'] = 1;
            $d['updated_at'] = date('Y-m-d H:i:s');
            $d['updated_by'] = $this->cookie['username'];
            $d['is_delete'] = 0;
            $this->db->where('kode_otp', $data['kode_otp']);
            $this->db->where('username', $data['username']);
            $this->db->where('is_used',0);
            $this->db->update('dat_otp', $d);
            $da['is_active'] = 1;
            $d['updated_at'] = date('Y-m-d H:i:s');
            $d['updated_by'] = $this->cookie['username'];
            $d['is_delete'] = 0;
            $this->db->where('username',$data['username']);
            $this->db->update('mst_pelanggan', $d);
            return true;
        } else return false;
    }
    function kirim_otp($email, $username, $kode)
    {
        $msg = 'Dear ' . $username . ',
        <br>
        Ini adalah kode otp mu untuk verifikasi register pada aplikasi Kaku.<br>
        <h1><b>JANGAN PERNAH MEMBERIKAN KODE OTP PADA SIAPAPUN</b></h1>
        <br>
        <br>
        <br>
        <' . $kode . '>';
        $this->m_app->send_email($email, 'Kode Autentikasi OTP', $msg);
    }
}
