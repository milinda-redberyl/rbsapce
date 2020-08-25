<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Madura
 * Date: 3/13/2018
 * Time: 6:06 PM
 */



class Advertisement extends ERP_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty(trim($this->common_data['status']))) {
            header('Location: ' . site_url('Login/logout'));
            exit;
        } else {
            $this->load->model('advertisement_model');
            $this->load->helper(array('form'));
        }
    }

    function manage_advertisement_controller()
    {
        $data['title'] = 'Manage Advertisement';
        $data['main_content'] = 'masters/manage_advertisement_view';
        $data['extra'] = $this->advertisement_model->get_all_advertisement();
        $this->load->view('includes/template', $data);
    }

    function get_advertisement_by_id(){
        $id = $this->input->post('id');
        $this->advertisement_model->getjsonadvertisementbyid($id);
    }

    function submit(){
        $data = array(
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'position' => $this->input->post('position'),
            'status' => $this->input->post('status'),
        );

        if ($_FILES['image_file']['name']) {
            $path = 'uploads/advertisement/';
            $tmp_name = $_FILES['image_file']['tmp_name'];
            $movie_image = Image_upload_helper::upload_image($_FILES['image_file']['name'], $path, $tmp_name);
            $data['img_url'] = $movie_image;
        }

        if($this->input->post('edit_id') != ""){
            $id = $this->input->post('edit_id');
            $this->advertisement_model->edit_advertisement($id, $data);
        } else {
            $this->advertisement_model->submit_advertisement($data);
        }

        redirect("advertisement_manager");
    }

    function delete(){
        $id = $this->input->post('id');
        $this->advertisement_model->delete_advertisement($id);

        redirect("advertisement_manager");
    }

}