<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends ERP_Controller
{
    function __construct()
    {
        parent::__construct();
        if (empty(trim($this->common_data['status']))) {
            header('Location: ' . site_url('Login/logout'));
            exit;
        } else {
            $this->load->model('dashboard_model');
        }
    }


    public function blankPage()
    {
        $data['title'] = 'Dashboard';
        $data['main_content'] = 'admin/admin_dashboard';
        $this->load->view('includes/template', $data);
    }


    public function manage_user_controller()
    {

        $data['title'] = 'Manage User';
        $data['main_content'] = 'admin/manage_user_view';
        $this->load->view('includes/template', $data);
    }


    function validation_page()
    {
        $data['title'] = 'Validation Page';
        $data['main_content'] = 'system/validation_page';
        $data['extra'] = NULL;
        $this->load->view('include/template', $data);
    }

    public function fetchPage()
    {
        $page_url = trim($this->input->post("page_url"));
        $userData['currentPage'] = $page_url;
        $this->session->set_userdata('currentPage', $page_url);

        $array_data['page_id'] = trim($this->input->post('page_id'));
        $array_data['page_url'] = $page_url;
        $array_data['page_name'] = trim($this->input->post('page_name'));
        $array_data['policy_id'] = trim($this->input->post('policy_id'));
        $array_data['data_arr'] = $this->input->post('data_arr');
        $array_data['master_page_url'] = $this->input->post('master_page_url');

        $this->load->view($page_url, $array_data);
    }

    function social_media_links()
    {
        $data['title'] = 'Manage Property Type';
        $data['main_content'] = 'masters/social_media_management';
        $data['extra'] = $this->dashboard_model->get_all_socialMedia();

        $this->load->view('includes/template', $data);
    }

    public function manage_category_controller()
    {
        $data['title'] = 'Manage Cateogory';
        $data['main_content'] = 'masters/manage_category_view';
        $data['extra'] = $this->dashboard_model->get_all_category();
        $this->load->view('includes/template', $data);
    }

    function manage_property_type_controller()
    {
        $data['title'] = 'Manage Property Type';
        $data['main_content'] = 'masters/manage_property_type_view';
        $data['extra'] = $this->dashboard_model->get_all_property();
        $this->load->view('includes/template', $data);
    }

     function manage_article_controller()
    {
        $data['title'] = 'Manage Property Type';
        $data['main_content'] = 'masters/manage_article_view';
        $data['extra'] = $this->dashboard_model->get_all_article();
        $this->load->view('includes/template', $data);
    }

    function manage_property_controller()
    {
        $data['title'] = 'Manage Property [<i class="fa fa-plus green"></i> <i class="fa fa-pencil-square-o blue"></i> <i class="fa fa-times red"></i> ]';
        $data['main_content'] = 'admin/manage_property_view';
        //$data['extra'] = $this->dashboard_model->get_all_property();
        $this->load->view('includes/template', $data);
    }

    function manage_furniture_controller()
    {
        $data['title'] = 'Manage Furniture Type';
        $data['main_content'] = 'masters/manage_furniture_view';
        $data['extra'] = $this->dashboard_model->get_all_furniture();
        $this->load->view('includes/template', $data);
    }

    function manage_bed_type_controller()
    {
        $data['title'] = 'Manage Bed Type';
        $data['main_content'] = 'masters/manage_bed_type_view';
        $data['extra'] = $this->dashboard_model->get_all_bed_type();
        $this->load->view('includes/template', $data);
    }

    function manage_room_type_controller()
    {
        $data['title'] = 'Manage Room Type';
        $data['main_content'] = 'masters/manage_room_type_view';
        $data['extra'] = $this->dashboard_model->get_all_room_type();
        $this->load->view('includes/template', $data);
    }

    function manage_bathroom_type_controller()
    {
        $data['title'] = 'Manage Bathroom Type';
        $data['main_content'] = 'masters/manage_bathroom_type_view';
        $data['extra'] = $this->dashboard_model->get_all_bathroom_type();
        $this->load->view('includes/template', $data);
    }

    function manage_room_amenities_controller()
    {
        $data['title'] = 'Manage Room Amenities';
        $data['main_content'] = 'masters/manage_roomamenities_view';
        $data['extra'] = $this->dashboard_model->get_all_room_amenities();
        $this->load->view('includes/template', $data);
    }

    function manage_country_controller()
    {
        $data['title'] = 'Manage Country';
        $data['main_content'] = 'masters/manage_country_view';
        $this->load->view('includes/template', $data);
    }

     function new_project_section()
    {
        $data['title'] = 'Manage New Projects';
        $data['main_content'] = 'masters/manage_new_projects';
        $data['extra'] = $this->dashboard_model->get_all_new_projects();
        $this->load->view('includes/template', $data);
    }

    function delete_furniture()
    {
        echo $this->dashboard_model->delete_furniture();
    }



}
