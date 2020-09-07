<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Login_model extends CI_Model

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



    function save_partner()

    {



        $data['Ename1'] = trim($this->input->post('firstName'));  //same value set Ename1 and Ename2

        $data['BRN'] = trim($this->input->post('registrationNumber'));

        $data['registeredCompanyName'] = trim($this->input->post('companyName'));

        $data['EEmail'] = trim($this->input->post('EEmail'));

        $data['UserName'] = trim($this->input->post('EEmail'));

        $data['EpTelephone'] = trim($this->input->post('EpTelephone'));

        $data['EpCity'] = trim($this->input->post('city_id'));



        $pwd = trim($this->input->post('Password'));

        $md5pwd = md5($pwd);

        $data['Password'] = $md5pwd;



        $data['isAgent'] = 0;

        $data['isActive'] = 0;

        $data['isCompany'] = 0;

        $data['isPartner'] = 1;

        $data['isSystemAdmin'] = 0;



        $data['CreatedUserName'] = current_userID();

        $data['CreatedDate'] = format_date_mysql_datetime();

        $data['Timestamp'] = format_date_mysql_datetime();

        $data['CreatedPC'] = current_pc();



        $category_list =$this->input->post('category_list');

        $property_list = $this->input->post('property_list');




        if(isset($data['Ename1'])){

            $result_emp = $this->db->insert('srp_employeesdetails', $data);

            $insert_id = $this->db->insert_id();

            if($insert_id){

                foreach ($category_list as $cat_val){

                    $data_customer_category_types = array(

                        'cus_id'=> $insert_id,

                        'category_id' => $cat_val

                    );

                   $this->db->insert('customer_category_types', $data_customer_category_types);

                }

//                foreach ($property_list as $prop_val){

//                    $data_customer_property_types = array(
//
//                        'cus_id'=> $insert_id,
//
//                        'property_type_id' => $prop_val
//
//                    );
//
//                    $result_prop = $this->db->insert('customer_property_types', $data_customer_property_types);
//
//                    return $result_prop;

//                }

            }

        }



//         $result_emp = $this->db->insert('srp_employeesdetails', $data);
//
//         return $result_emp;

        return $result_emp;

    }



    function save_space_host()

    {



        $data['Ename1'] = trim($this->input->post('firstName'));  //same value set Ename1 and Ename2

        $data['EEmail'] = trim($this->input->post('EEmail'));

        $data['UserName'] = trim($this->input->post('Username'));





        $pwd = trim($this->input->post('Password'));

        $md5pwd = md5($pwd);

        $data['Password'] = $md5pwd;



        $data['isAgent'] = 0;

        $data['isActive'] = 0;

        $data['isCompany'] = 0;

        $data['isPartner'] = 0;

        $data['isSystemAdmin'] = 0;

        $data['isSpaceHost'] = 1;



        $data['CreatedUserName'] = current_userID();

        $data['CreatedDate'] = format_date_mysql_datetime();

        $data['Timestamp'] = format_date_mysql_datetime();

        $data['CreatedPC'] = current_pc();





        if(isset($data['Ename1']) && isset($data['EEmail'])){

            $result_emp = $this->db->insert('srp_employeesdetails', $data);

            return $result_emp;

        }

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


        // $this->db->select('EIdNo');
        // $this->db->from('srp_employeesdetails');
        // $this->db->where('EEmail', $s_email);
        // $data["EIdNo"]=$this->db->get()->result();


        $param["body"] = $data;



        $mailData = [

            'toEmail' => $s_email,

            'subject' => "Thank you for Registering with Us & Verify your Account",

            'param' => $param

        ];




        send_email($mailData, 'registering-email');


        return array('s', 'Email Send Successfully MILEE!');

    }





}
