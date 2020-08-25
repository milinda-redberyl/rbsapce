<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class login_model extends CI_Model

{



    function __contruct()

    {

        parent::__contruct();

    }



    function save_agent()

    {

        $data['Ename1'] = trim($this->input->post('Ename1'));

        $data['Ename2'] = trim($this->input->post('Ename1'));

        $data['EEmail'] = trim($this->input->post('EEmail'));

        $data['UserName'] = trim($this->input->post('EEmail'));

        $data['Password'] = md5($this->input->post('Password'));

        $data['EpTelephone'] = trim($this->input->post('EpTelephone'));

        $data['EpMobile'] = trim($this->input->post('EpMobile'));

        $data['EpSkype'] = trim($this->input->post('EpSkype'));

        $data['countryID'] = trim($this->input->post('countryID'));



        $data['isAgent'] = 1;

        $data['isActive'] = 0;

        $data['isSystemAdmin'] = 0;



        $data['CreatedUserName'] = current_userID();

        $data['CreatedDate'] = format_date_mysql_datetime();

        $data['Timestamp'] = format_date_mysql_datetime();

        $data['CreatedPC'] = current_pc();



        $result = $this->db->insert('srp_employeesdetails', $data);

        return $result;

    }



     function save_company()

    {        

        $data2['company_name'] = trim($this->input->post('companyName'));



        $data['Ename1'] = trim($this->input->post('companyName'));  //same value set Ename1 and Ename2

        $data['Ename2'] = trim($this->input->post('companyName'));

        $data['EEmail'] = trim($this->input->post('EEmail'));

        $data['UserName'] = trim($this->input->post('EEmail'));        

        $data['EpTelephone'] = trim($this->input->post('EpTelephone'));        

        $data['countryID'] = trim($this->input->post('countryID'));



        $pwd = trim($this->input->post('Password'));

        $md5pwd = md5($pwd);

        $data['Password'] = $md5pwd;



        $data['isAgent'] = 0;

        $data['isActive'] = 0;

        $data['isCompany'] = 1;

        $data['isSystemAdmin'] = 0;



        $data['CreatedUserName'] = current_userID();

        $data['CreatedDate'] = format_date_mysql_datetime();

        $data['Timestamp'] = format_date_mysql_datetime();

        $data['CreatedPC'] = current_pc();



        if(isset($data2['company_name'])){

            $result_compny = $this->db->insert('company_master', $data2);

             if ($result_compny) {

                 $cn = $data2['company_name'];

                 $company = $this->get_company_id($cn);            

                 

                 $data['company_id'] = $company->company_id; //set company id from company master

                 $result_emp = $this->db->insert('srp_employeesdetails', $data);

                 return $result_emp;

             }

        }

        

       // $result_emp = $this->db->insert('srp_employeesdetails', $data);

       // return $result_emp;

    }



    function get_users($email)

    {

        $this->db->select('*');

        $this->db->from('srp_employeesdetails');

        $this->db->where('UserName', $email);

        $result = $this->db->get()->row();

        return $result;

    }



     function get_company_id($cn)

    {

        $this->db->select('*');

        $this->db->from('company_master');

        $this->db->where('company_name', $cn);

        $result = $this->db->get()->row();

        return $result;

    }

    function send_thankyou_Email()

    {
        $s_email = trim($this->input->post('EEmail'));  
        $firstName = trim($this->input->post('firstName'));    
        
        $senderName = $firstName;
        $senderEmail = $s_email;
     
        $data["empName"] = $senderName;

        $param["body"] = $data;

        $mailData = [
            'toEmail' => $senderEmail,
            'subject' => "Thank you for Registering with Us",
            'param' => $param
        ];

        send_email($mailData, 'registering-email');
        return array('s', 'Email Send Successfully !');
    }





}