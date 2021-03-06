<?php

class Session_model extends CI_Model
{

    public function __construct()
    {

    }

    function Session_model()
    {
        //parent:: __construct();
    }

    function redirect_url()
    {
        $isSystemAdmin = $this->session->userdata('isSystemAdmin');
        $isCompany = $this->session->userdata('isCompany');
        if ($isSystemAdmin == 1) {
            return site_url('dashboard');
        } else if ($isCompany == 1) {
            return site_url('dashboard');
        } else {
            return base_url();
        }
    }

    function authenticateLogin($login_data)
    {
        $this->db->select('*');
        $this->db->where("Username", $login_data['userN']);
        $this->db->where("Password", $login_data['passW']);
        $result = $this->db->get("srp_employeesdetails")->row_array();

        // echo $this->db->last_query();
        if (!empty($result)) {
            if ($result['isActive'] == 1) {
                if ($result['NoOfLoginAttempt'] == 4) {
                    $data['status'] = 'w';
                    $data['message'] = '<i class="fa fa-warning" aria-hidden="true"></i> Account blocked <br/><br/>you have tried 3 consecutive failed login attempts.';
                    return $data;
                } else {
                    if (!empty($result)) {
                        $data['NoOfLoginAttempt'] = 0;
                        $this->db->where('EIdNo', $result['EIdNo']);
                        $this->db->update('srp_employeesdetails', $data);

                        $this->createSession_login($result);
                        $url = $this->redirect_url();
                        return array('status' => 's', 'message' => 'Authentication success. Redirecting...', 'url'=>$url);


                    } else {
                        $this->db->select('EIdNo,NoOfLoginAttempt');
                        $this->db->where("UserName", $login_data['userN']);
                        $getusrName = $this->db->get("srp_employeesdetails")->row_array();
                        if (!empty($getusrName)) {
                            $noOfAttemps = $getusrName['NoOfLoginAttempt'] + 1;
                            if ($getusrName['NoOfLoginAttempt'] == 4) {

                                return array('status' => 'w', 'message' => 'Your account has been blocked please contact support team<br/>you have tried 3 consecutive failed login attempts.');

                            } else if ($getusrName['NoOfLoginAttempt'] == 2) {
                                $datas['NoOfLoginAttempt'] = $noOfAttemps;
                                $this->db->where('EIdNo', $getusrName['EIdNo']);
                                $updateAttempt = $this->db->update('srp_employeesdetails', $datas);
                                if ($updateAttempt) {

                                    return array('status' => 'e', 'message' => 'Invalid username or password. <br/><strong><i class=\'fa fa-exclamation-triangle\'></i> You have one more attempt.<strong>');

                                }
                            } else {
                                $datas['NoOfLoginAttempt'] = $noOfAttemps;
                                $this->db->where('EIdNo', $getusrName['EIdNo']);
                                $updateAttempt = $this->db->update('srp_employeesdetails', $datas);
                                if ($updateAttempt) {

                                    return array('status' => 'e', 'message' => 'Invalid username or password. Please  try again.');

                                }
                            }
                        } else {

                            return array('status' => 'e', 'message' => 'i class="fa fa-warning" aria-hidden="true"></i>   Wrong user name or password. Please  try again.');

                        }
                    }
                }
            } else {

                return array('status' => 'i', 'message' => 'This username  is pending for activation.');

            }
        } else {
            return array('status' => 'e', 'message' => '<i class="fa fa-warning" aria-hidden="true"></i> Invalid username or password!');

        }


    }

    function createSession($employee_code)
    {
        if ($employee_code != 'logout') {
            $this->db->select('UserName,Ename1,Ename2, EIdNo,isSystemAdmin,isAgent,isCompany,isPartner');
            $this->db->where("md5(EIdNo)", $employee_code);
            $this->db->from('srp_employeesdetails');
            $user_master_data = $this->db->get()->row_array();
            if ($user_master_data) {

                $session_data = array(
                    'empID' => $user_master_data['EIdNo'],
                    'username' => $user_master_data['Ename2'],
                    'empname' => $user_master_data['Ename1'],
                    'loginusername' => $user_master_data['UserName'],
                    'isSystemAdmin' => $user_master_data['isSystemAdmin'],
                    'isAgent' => $user_master_data['isAgent'],
                    'isCompany' => $user_master_data['isCompany'],
                    'isPartner' => $user_master_data['isPartner'],
                    'status' => TRUE
                );

                $this->session->set_userdata($session_data);
                $data['status'] = TRUE;
                return $data;
            } else {
                $data['status'] = FALSE;
                $data['type'] = "info";
                $data['message'] = "Current User From the System";
                return $data;
            }
        }

    }

    function createSession_login($user_master_data)
    {

        $session_data = array(
            'empID' => $user_master_data['EIdNo'],
            'username' => $user_master_data['Ename2'],
            'empname' => $user_master_data['Ename1'],
            'loginusername' => $user_master_data['UserName'],
            'isSystemAdmin' => $user_master_data['isSystemAdmin'],
            'isAgent' => $user_master_data['isAgent'],
            'isCompany' => $user_master_data['isCompany'],
            'companyID' => $user_master_data['company_id'],
            'isPartner' => $user_master_data['isPartner'],
            'status' => TRUE
        );

        $this->session->set_userdata($session_data);


    }

    function fetch_company_detail($com, $bran)
    {

        $this->db->select('*');
        $this->db->from('srp_erp_company');
        $this->db->where('company_id', $com);
        $company = $this->db->get()->row_array();
        return $company;
    }

    function fetch_companycontrolaccounts($companyID, $company_code)
    {

        $this->load->library('sequence');
        $this->db->SELECT("controlAccountsAutoID,controlAccountType,srp_erp_chartofaccounts.GLAutoID");
        $this->db->where('srp_erp_chartofaccounts.companyID', $companyID);
        $this->db->where('srp_erp_companycontrolaccounts.companyID', $companyID);
        $this->db->where('controllAccountYN', 1);
        $this->db->FROM('srp_erp_chartofaccounts');
        $this->db->join('srp_erp_companycontrolaccounts', 'srp_erp_companycontrolaccounts.GLAutoID = srp_erp_chartofaccounts.GLAutoID');
        $control_account = $this->db->get()->result_array();

        foreach ($control_account as $row) {
            $data[$row['controlAccountType']] = $row['GLAutoID'];
        }

        return $data;
    }


    function fetch_company_policy($com)
    {

        $Companypolicy = $this->db->query("SELECT
	srp_erp_companypolicymaster.companypolicymasterID,
	companyPolicyDescription,
	srp_erp_companypolicymaster.code,
	IFNULL(cp.documentID,'All') as documentID,

IF (
	cp.`value` IS NULL,
	srp_erp_companypolicymaster.defaultValue,
	cp.`value`
) AS policyvalue
FROM
srp_erp_companypolicymaster
LEFT JOIN
 (SELECT * FROM srp_erp_companypolicy WHERE srp_erp_companypolicy.companyID = " . $com . ") cp ON(cp.companypolicymasterID = srp_erp_companypolicymaster.companypolicymasterID);")->result_array();
        $data = array_group_by($Companypolicy, 'code', 'documentID');
        /* echo "<pre>";
         print_r($data);
         echo "</pre>";*/
        return $data;
    }

    function fetch_group_policy($com)
    {//get company policy

        $Companypolicy = $this->db->query("SELECT
	srp_erp_grouppolicymaster.groupPolicymasterID,
	groupPolicyDescription,
	srp_erp_groupPolicymaster.code,
	IFNULL(cp.documentID,'All') as documentID,

IF (
	cp.`value` IS NULL,
	srp_erp_grouppolicymaster.defaultValue,
	cp.`value`
) AS policyvalue
FROM
srp_erp_grouppolicymaster
LEFT JOIN
 (SELECT * FROM srp_erp_grouppolicy WHERE srp_erp_grouppolicy.groupID = " . $com . ") cp ON(cp.groupPolicymasterID = srp_erp_grouppolicymaster.groupPolicymasterID);")->result_array();
        $data = array_group_by($Companypolicy, 'code', 'documentID');
        return $data;
    }

    function fetch_group_detail($com, $bran)
    {

        $this->db->select('*,description as company_name,companyGroupID as company_id,"" as company_code');
        $this->db->from('srp_erp_companygroupmaster');
        $this->db->where('companyGroupID', $com);
        $company = $this->db->get()->row_array();
        return $company;
    }
}