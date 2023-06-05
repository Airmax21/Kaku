<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_app extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_cookie_nav($nav_id)
    {
        $nav_id = str_replace('.', '_', $nav_id);
        $CI = get_instance();
        if (is_null(get_cookie($nav_id))) {
            $val = array(
                'search' => null,
                'per_page' => null,
                'cur_page' => null,
                'total_rows' => null,
                'order' => null
            );
            $cookie = array(
                'name'   => $nav_id,
                'value'  => json_encode($val),
                // 'expire' => '120'
                'expire' => '600'
            );
            $CI->input->set_cookie($cookie);
            return $val;
        } else {
            return json_decode(get_cookie($nav_id), TRUE);
        }
    }
    function get_cookie_user()
    {
        $cookie_name = 'cook_username';
        $CI = get_instance();
        if (is_null(get_cookie($cookie_name))) {
            $val = array(
                'username' => null,
                'id' => null,
                'fullname' => null,
                'role' => null,
            );
            $cookie = array(
                'name'   => $cookie_name,
                'value'  => json_encode($val),
                'expire' => '36000'
            );
            $CI->input->set_cookie($cookie);
            return $val;
        } else {
            return json_decode(get_cookie($cookie_name), TRUE);
        }
    }

    function set_cookie_user($cookie_val)
    {
        $cookie_name = 'cook_username';
        $CI = get_instance();
        $cookie = array(
            'name'   => $cookie_name,
            'value'  => json_encode($cookie_val),
            'expire' => '36000'
        );
        $CI->input->set_cookie($cookie);
    }
}
