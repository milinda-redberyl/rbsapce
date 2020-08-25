<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ERP_Controller extends CI_Controller
{
    var $common_data = array();

    function __construct()
    {
        parent::__construct();
        $CI =& get_instance();
        $this->common_data['status'] = FALSE;
        if (!$CI->session->has_userdata('status')) {
            header('Location: ' . site_url('Login/logout'));
            exit;
        } else {
            $CI->db->select('EIdNo as empID,Ename1, Ename2, Gender, UserName as username, EmpDesignationId,isSystemAdmin, isAgent');
            $CI->db->from('srp_employeesdetails');
            $CI->db->where("UserName", trim($CI->session->userdata("username")));
            $userData = $CI->db->get()->row_array();

            $CI->session->set_userdata($userData);

            $this->common_data['current_pc'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $this->common_data['current_user'] = trim($CI->session->userdata("username"));
            $this->common_data['current_userID'] = trim($CI->session->userdata("empID"));
            $this->common_data['isSystemAdmin'] = trim($CI->session->userdata("isSystemAdmin"));
            $this->common_data['isAgent'] = trim($CI->session->userdata("isAgent"));
            $this->common_data['current_date'] = date('Y-m-d h:i:s');
            $this->common_data['status'] = TRUE;

        }
    }
}