<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Masters extends ERP_Controller
{
    function __construct()
    {
        parent::__construct();
        if (empty(trim($this->common_data['status']))) {
            header('Location: ' . site_url('Login/logout'));
            exit;
        } else {
            $this->load->model('masters_model');
            $this->load->model('dashboard_model');
        }
    }

    function submit_category()
    {
        $this->form_validation->set_rules('category_name', 'Category', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {
            echo $this->masters_model->submit_category();
        }
    }

    function delete_category()
    {
        echo $this->masters_model->delete_category();
    }

    function edit_category()
    {
        echo json_encode($this->masters_model->edit_category());
    }

    function fetch_category_type()
    {
        $this->datatables->select("category_id,category_name,status");
        $this->datatables->from('category_types');
        $this->datatables->add_column('statuscolor', '$1', 'load_colorcode_status(status)');
        $this->datatables->add_column('edit', '<span class="pull-right"><span><a onclick="edit_category($1)"><i class="ace-icon fa fa-pencil bigger-130"></i></span></a> &nbsp;&nbsp;  </a></span>', 'category_id');
        /* $this->datatables->add_column('edit', '<span class="pull-right"><span><a onclick="edit_category($1)"><i class="ace-icon fa fa-pencil bigger-130"></i></span></a> &nbsp;&nbsp; | &nbsp;&nbsp; <span><a onclick="delete_category($1)" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></span></a></span>', 'category_id');*/
        echo $this->datatables->generate();
    }

    function submit_property()
    {
        $this->form_validation->set_rules('property_type_name', 'Property Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {

            echo $this->masters_model->submit_property();

        }
    }

    function submit_agent_data()
    {
        $this->form_validation->set_rules('agent_name', 'Agent Name', 'trim|required');
        //$this->form_validation->set_rules('about_agent', 'LinkedIn', 'trim|required');
        $this->form_validation->set_rules('about_agent', 'Agent Description', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {
            echo $this->masters_model->submit_agent_data();

        }
    }


    function get_property_log()
    {
        echo $this->masters_model->get_property_log();
    }

    function submit_report_data()
    {
        $this->form_validation->set_rules('u_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('u_msg', 'description', 'trim|required');
        $this->form_validation->set_rules('reason_id', 'reason', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {

            echo $this->masters_model->submit_report_data();

        }
    }

    function submit_company_data()
    {
        $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('company_tel', 'Company Telephone', 'trim|required');
        $this->form_validation->set_rules('company_address', 'Company Address', 'trim|required');
        $this->form_validation->set_rules('about_company', 'Company Description', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {

            echo $this->masters_model->submit_company_data();

        }
    }


    function get_new_project_by_id()
    {
        $id = $this->input->post('id');
        $this->dashboard_model->getjsonarticlebyid($id);
    }

    function delete_property()
    {
        echo $this->masters_model->delete_property();
    }

    function edit_property()
    {
        echo json_encode($this->masters_model->edit_property());
    }

    function fetch_property_type()
    {
        $this->datatables->select("property_type_id,property_type_name,status");
        $this->datatables->from('property_types');
        $this->datatables->add_column('statuscolor', '$1', 'load_colorcode_status(status)');
        $this->datatables->add_column('edit', '<span class="pull-right"><span><a onclick="edit_property($1)"><i class="ace-icon fa fa-pencil bigger-130"></i></span></a> &nbsp;&nbsp; | &nbsp;&nbsp; <span><a onclick="delete_property($1)" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></span></a></span>', 'property_type_id');
        echo $this->datatables->generate();
    }

    function fetch_article()
    {
        $this->datatables->select("article_id,article_title,article_des,article_img,status");
        $this->datatables->from('blog_master');
        $this->datatables->add_column('article_img', '<span class="text-center"><img src=""></span>', 'load_colorcode_status(status)');
        $this->datatables->add_column('statuscolor', '$1', 'load_colorcode_status(status)');
        $this->datatables->add_column('edit', '<span class="pull-right"><span><a onclick="edit_property($1)"><i class="ace-icon fa fa-pencil bigger-130"></i></span></a> &nbsp;&nbsp; | &nbsp;&nbsp; <span><a onclick="delete_property($1)" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></span></a></span>', 'article_id');
        echo $this->datatables->generate();
    }

    function submit_article()
    {
        $this->form_validation->set_rules('article_title', 'Article title', 'trim|required');
        $this->form_validation->set_rules('article_des', 'Article Description', 'trim|required');
        $this->form_validation->set_rules('article_cat', 'Article Category', 'trim|required');
        $this->form_validation->set_rules('article_pos', 'Article location', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {

            echo $this->masters_model->submit_property();

        }
    }

    function submit_furniture()
    {
        $this->form_validation->set_rules('furniture_name', 'Property Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {

            echo $this->masters_model->submit_furniture();

        }
    }

    function edit_furniture()
    {
        echo json_encode($this->masters_model->edit_furniture());
    }

    function fetch_furniture_type()
    {
        $this->datatables->select("furniture_type_id,furniture_name,status");
        $this->datatables->from('furniture_types');
        $this->datatables->add_column('statuscolor', '$1', 'load_colorcode_status(status)');
        $this->datatables->add_column('edit', '<span class="pull-right"><span><a onclick="edit_furniture($1)"><i class="ace-icon fa fa-pencil bigger-130"></i></span></a> &nbsp;&nbsp; | &nbsp;&nbsp; <span><a onclick="delete_furniture($1)" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></span></a></span>', 'furniture_type_id');
        echo $this->datatables->generate();
    }

    function fetch_bed_type()
    {
        $this->datatables->select("bed_type_id,bed_type_name,status");
        $this->datatables->from('bed_types');
        $this->datatables->add_column('statuscolor', '$1', 'load_colorcode_status(status)');
        $this->datatables->add_column('edit', '<span class="pull-right"><span><a onclick="edit_bed_type($1)"><i class="ace-icon fa fa-pencil bigger-130"></i></span></a> &nbsp;&nbsp; | &nbsp;&nbsp; <span><a onclick="delete_bedtype($1)" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></span></a></span>', 'bed_type_id');
        echo $this->datatables->generate();
    }

    function fetch_aboutus()
    {
        $this->datatables->select("id,description,year,status");
        $this->datatables->from('about_company');
        $this->datatables->add_column('statuscolor', '$1', 'load_colorcode_status(status)');
        $this->datatables->add_column('edit', '<span class="pull-right"><span><a onclick="edit_aboutus($1)"><i class="ace-icon fa fa-pencil bigger-130"></i></span></a> &nbsp;&nbsp; | &nbsp;&nbsp; <span><a onclick="delete_bedtype($1)" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></span></a></span>', 'bed_type_id');
        echo $this->datatables->generate();
    }

    function submit_bed_type()
    {
        $this->form_validation->set_rules('bed_type_name', 'Bed Type', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {

            echo $this->masters_model->submit_bed_type();

        }
    }

    function submit_aboutus()
    {
        $this->form_validation->set_rules('about_year', 'Set Your Year', 'trim|required');
        $this->form_validation->set_rules('about_description', 'Set Your Description', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {

            echo $this->masters_model->submit_aboutus();

        }
    }

    function edit_bed_type()
    {
        echo json_encode($this->masters_model->edit_bed_type());
    }

    function edit_aboutus()
    {
        echo json_encode($this->masters_model->edit_aboutus());
    }

    function delete_bedtype()
    {
        echo $this->masters_model->delete_bedtype();
    }

    function delete_roomtype()
    {
        echo $this->masters_model->delete_roomtype();
    }


    function fetch_room_type()
    {
        $this->datatables->select("room_type_id,room_name,status");
        $this->datatables->from('room_types');
        $this->datatables->add_column('statuscolor', '$1', 'load_colorcode_status(status)');
        $this->datatables->add_column('edit', '<span class="pull-right"><span><a onclick="edit_room_type($1)"><i class="ace-icon fa fa-pencil bigger-130"></i></span></a> &nbsp;&nbsp; | &nbsp;&nbsp; <span><a onclick="delete_roomtype($1)" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></span></a></span>', 'room_type_id');
        echo $this->datatables->generate();
    }

    function submit_room_type()
    {
        $this->form_validation->set_rules('room_name', 'Room Type', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {
            echo $this->masters_model->submit_room_type();
        }
    }

    function edit_room_type()
    {
        echo json_encode($this->masters_model->edit_room_type());
    }

    function delete_roomamenities()
    {
        echo $this->masters_model->delete_roomamenities();
    }

    function fetch_amenities_type()
    {
        $this->datatables->select("amenity_id,amenity_name,status");
        $this->datatables->from('room_amenities');
        $this->datatables->add_column('statuscolor', '$1', 'load_colorcode_status(status)');
        $this->datatables->add_column('edit', '<span class="pull-right"><span><a onclick="edit_amenity_type($1)"><i class="ace-icon fa fa-pencil bigger-130"></i></span></a> &nbsp;&nbsp; | &nbsp;&nbsp; <span><a onclick="delete_roomamenities($1)" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></span></a></span>', 'amenity_id');
        echo $this->datatables->generate();
    }

    function submit_amenities()
    {
        $this->form_validation->set_rules('amenity_name', 'Amenity Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {
            echo $this->masters_model->submit_amenities();
        }
    }

    function edit_amenity_type()
    {
        echo json_encode($this->masters_model->edit_amenity_type());
    }

    function delete_bathroomtype()
    {
        echo $this->masters_model->delete_bathroomtype();
    }

    function fetch_bathroom_type()
    {
        $this->datatables->select("bathroom_type_id,bathroom_type_name,status");
        $this->datatables->from('bathroom_types');
        $this->datatables->add_column('statuscolor', '$1', 'load_colorcode_status(status)');
        $this->datatables->add_column('edit', '<span class="pull-right"><span><a onclick="edit_bathroom_type($1)"><i class="ace-icon fa fa-pencil bigger-130"></i></span></a> &nbsp;&nbsp; | &nbsp;&nbsp; <span><a onclick="delete_bathroomtype($1)" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></span></a></span>', 'bathroom_type_id');
        echo $this->datatables->generate();
    }

    function submit_bathroom()
    {
        $this->form_validation->set_rules('bathroom_type_name', 'Bathroom Type', 'trim|required');
        $this->form_validation->set_rules('bathroom_count', 'Bathroom Count', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {
            echo $this->masters_model->submit_bathroom();
        }
    }

    function edit_bathroom_type()
    {
        echo json_encode($this->masters_model->edit_bathroom_type());
    }

    function fetch_country()
    {
        $this->datatables->select("country_id,country_name,status");
        $this->datatables->from('country');
        $this->datatables->add_column('statuscolor', '$1', 'load_colorcode_status(status)');
        $this->datatables->add_column('edit', '<span class="pull-right"><span title="Add City"><a onclick="add_city_model($1)"><i class="menu-icon fa fa-bars bigger-130"></i></a></span> &nbsp;&nbsp; |<span><a onclick="edit_country($1)"><i class="ace-icon fa fa-pencil bigger-130"></i></a></span> &nbsp;&nbsp; | &nbsp;&nbsp; <span><a onclick="delete_country($1)" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></span></a></span>', 'country_id');
        echo $this->datatables->generate();
    }

    function submit_country()
    {
        $this->form_validation->set_rules('country_name', 'Country', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {
            echo $this->masters_model->submit_country();
        }
    }

    function delete_country()
    {
        echo $this->masters_model->delete_country();
    }

    function edit_country()
    {
        echo json_encode($this->masters_model->edit_country());
    }


    function loadSocialMedia()
    {
        $id = $this->input->post('id');
        $this->db->select('*');
        $this->db->from('social_media_master');
        $this->db->where('id', $id);
        $result = $this->db->get()->row_array();
        echo json_encode($result);
    }

    function submit_socialMedia()
    {
        $id = $this->input->post('id');
        $active = $this->input->post('isActive');
        $_POST['isActive'] = !empty($active) ? 1 : 0;
        unset($_POST['id']);
        $postData = $this->input->post();
        $this->db->where('id', $id);
        $result = $this->db->update('social_media_master', $postData);
        echo json_encode(array('status' => 's', 'message' => 'Record updated successfully, refresh the page and check.'));
    }

    function fetch_city()
    {
        $country_id = $this->input->post('country_id');
        $this->datatables->select("city_id,country_id,city_name,status");
        $this->datatables->from('city');
        $this->datatables->where('country_id', $country_id);
        $this->datatables->add_column('statuscolor', '$1', 'load_colorcode_status(status)');
        $this->datatables->add_column('edit', '<span class="pull-right"><span><a onclick="edit_city($1)"><i class="ace-icon fa fa-pencil bigger-130"></i></a></span> &nbsp;&nbsp; | &nbsp;&nbsp; <span><a onclick="delete_city($1)" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></span></a></span>', 'city_id');
        echo $this->datatables->generate();
    }

    function submit_city()
    {
        $this->form_validation->set_rules('city_name', 'City', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {
            echo $this->masters_model->submit_city();
        }
    }

    function edit_city()
    {
        echo json_encode($this->masters_model->edit_city());
    }

    function delete_city()
    {
        echo $this->masters_model->delete_city();
    }

    function fetch_users_view()
    {

        $ud = $this->session->userdata();
        //var_dump(current_companyID());

        $isAgent = $this->session->userdata('isAgent');

        $this->datatables->select("EIdNo,Ename1,isActive,EEmail,UserName,isSystemAdmin,isAgent,date(Timestamp) as registerDate, isCompany, isPartner");
        $this->datatables->from('srp_employeesdetails');
        if (isCompany()) {
            $this->datatables->where('company_id', current_companyID());
            $this->datatables->where('isAgent', 1);
        }
        $this->datatables->add_column('statuscolor', '$1', 'load_colorcode_status(isActive)');
        $this->datatables->add_column('statusRole', '$1', 'load_colorcode_role(isSystemAdmin,isAgent, isCompany, isPartner)');
        $this->datatables->add_column('edit', '<span class="pull-right"><span><a onclick="edit_user($1)"><i class="ace-icon fa fa-pencil bigger-130"></i></a></span> &nbsp;&nbsp; | &nbsp;&nbsp; <span><a onclick="delete_user($1)" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></span></a></span>', 'EIdNo');
        $result = $this->datatables->generate();

        // echo $this->db->last_query();
        echo $result;
    }

    function submit_users()
    {
        /*echo '<pre>';
        print_r($this->session->all_userdata());
        echo '</pre>';*/

        if ($this->session->all_userdata()) {
            $user_data = $this->session->all_userdata();
        }

        $this->form_validation->set_rules('Ename1', 'Name', 'trim|required');
        $this->form_validation->set_rules('EEmail', 'Email', 'trim|required');
        $this->form_validation->set_rules('EpTelephone', 'Telephone', 'trim|required');

        if ($this->input->post('reg_status') == "add") {
            $this->form_validation->set_rules('Password', 'Password', 'trim|required|callback_validate_password');
            $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[Password]');
        }

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {
            /*if (empty($this->input->post('EIdNo')) && $this->input->post('Password') == '******') {
                //$this->form_validation->set_rules('Password', 'Password', 'trim|required');
                echo json_encode(array('e', 'Password is required'));
            } else {
                echo $this->masters_model->submit_users();
            }*/
            echo $this->masters_model->submit_users();
        }
    }

    public function validate_password($password)
    {
        $passwordErr = "";

        if (strlen($password) <= '8') {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } elseif (!preg_match('/[`~!@#$%^&\*()\ \_\+\-=\{\}\|\\\:";\'<>\?,\.]/', $password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Special Character!";
        }

        if ($passwordErr != "") {
            $this->form_validation->set_message('validate_password', $passwordErr);
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function edit_user()
    {
        echo json_encode($this->masters_model->edit_user());
    }

    function delete_employee()
    {
        echo $this->masters_model->delete_employee();
    }
}
