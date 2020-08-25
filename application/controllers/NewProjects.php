<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Madura
 * Date: 3/13/2018
 * Time: 6:06 PM
 */
class NewProjects extends ERP_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty(trim($this->common_data['status']))) {
            header('Location: ' . site_url('Login/logout'));
            exit;
        } else {
            $this->load->model('New_projects_model');
            $this->load->helper(array('form'));
        }
    }

    function new_project_section()
    {
        /*echo '<pre>';
        print_r($this->session->all_userdata());
        echo '</pre>';*/

        $empID = "";

        if($this->session->all_userdata()){
            $user_data = $this->session->all_userdata();
            $empID = $user_data['empID'];
        }

        $id = $this->uri->segment(2);

        $data['title'] = 'Manage New Projects';
        $data['property_types'] = $this->New_projects_model->get_all_property_types();

        if ($id) {
            $data['main_content'] = 'masters/manage_new_project_units';
            $data['property_id'] = $id;
            $data['new_project_units'] = $this->New_projects_model->get_all_new_projects_units_by_id_and_agent_id($id, $empID);
        } else {
            $data['main_content'] = 'masters/manage_new_projects';
            $data['new_projects'] = $this->New_projects_model->get_all_new_projects_by_agent_id($empID);
        }

        $this->load->view('includes/template', $data);
    }

    function get_new_project_by_id()
    {
        $id = $this->input->post('id');
        $this->New_projects_model->getjsonnewprojectunitbyid($id);
    }

    function manage_NewProjects_controller()
    {
        $data['title'] = 'Manage NewProjects';
        $data['main_content'] = 'masters/manage_NewProjects_view';
        $data['extra'] = $this->New_projects_model->get_all_NewProjects();
        $this->load->view('includes/template', $data);
    }

    function get_NewProjects_by_id()
    {
        $id = $this->input->post('id');
        $this->New_projects_model->getjsonNewProjectsbyid($id);
    }

    function submit_unit()
    {
        $property_id = $this->input->post('property_id');
        $bed_count = $this->input->post('bed_count');
        $property_type = $this->input->post('property_type');
        $floor = $this->input->post('floor');
        $size = $this->input->post('size');
        $image_type = $this->input->post('image_type');
        $status = $this->input->post('status');

        $data = array(
            'property_id' => $property_id,
            'bed_count' => $bed_count,
            'property_type' => $property_type,
            'floor' => $floor,
            'size' => $size,
            'image_type' => $image_type,
            'status' => $status,
        );

        $trimfloor_str = str_replace(' ', '', $floor);

        if ($_FILES['image_url']['name']) {
            $path = './uploads/new_projects_units/';
            $tmp_name = $_FILES['image_url']['tmp_name'];
            $update_file_name = "floor_" . $trimfloor_str . "_imgtype_" . $image_type . "_" . $bed_count . $property_type . $_FILES['image_url']['name'];
            $movie_image = Image_upload_helper::upload_image($update_file_name, $path, $tmp_name);
            $data['image_url'] = $movie_image;
        }

        if ($this->input->post('edit_id') != "") {
            $id = $this->input->post('edit_id');
            $this->New_projects_model->edit_new_project_unit($id, $data);
        }
        if ($this->input->post('add_id') != "") {
            $id = $this->input->post('add_id');
            $data['property_id'] = $id;
            $this->New_projects_model->submit_new_project_unit($data);
        }

        redirect("new_project_section/" . $property_id);
    }

    function delete_unit()
    {
        $id = $this->input->post('id');
        $this->New_projects_model->delete_new_roject_unit($id);
    }

}