<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Article extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
       // if (empty(trim($this->common_data['status']))) {
        //    header('Location: ' . site_url('Login/logout'));
       //     exit;
     //   } else {
            $this->load->model('article_model');
            $this->load->helper(array('form'));
      //  }
    }

    function manage_article_controller()
    {
        $data['title'] = 'Manage Articles';
        $data['main_content'] = 'masters/manage_article_view';
        $data['extra'] = $this->article_model->get_all_articles();
        $this->load->view('includes/template', $data);
    }

    function get_article_by_id(){
        $id = $this->input->post('id');
        $this->article_model->getjsonarticlebyid($id);
    }

    function submit(){
        $data = array(
            'article_title' => $this->input->post('title'),
            'article_des' => $this->input->post('description'),
            'article_category' => $this->input->post('category'),
            'position' => $this->input->post('position'),
            'status' => $this->input->post('status'),
        );

        $data['updated_time'] = date("Y-m-d H:i:s");
        //var_dump($data); exit;

       if ($_FILES['image_file']['name']) {
            $path = 'uploads/blog/';
            $tmp_name = $_FILES['image_file']['tmp_name'];
            $movie_image = Image_upload_helper::upload_image($_FILES['image_file']['name'], $path, $tmp_name);
            $data['article_img'] = $movie_image;
        }

        if($this->input->post('edit_id') != ""){
            $id = $this->input->post('edit_id');
            $this->article_model->edit_article($id, $data);
        } else {
            $this->article_model->submit_article($data);
        }

        redirect("article_manager");
    }

    function delete(){
        $id = $this->input->post('id');
        $this->article_model->delete_article($id);

        redirect("article_manager");
    }



    /**************************** Review section*************************************************/

    function manage_review_controller()
    {
        $data['title'] = 'Manage Reviews';
        $data['main_content'] = 'masters/manage_review_view';
        $data['extra'] = $this->article_model->get_all_reviews();
        $this->load->view('includes/template', $data);
    }

    function change_rw_status(){
         $data = array(
            'status' => $this->input->post('status'),
         );

        $rating_id = $this->input->post('rating_id');
        $this->article_model->update_rw_status($rating_id, $data);

       //redirect("review_manager");
    }

    /**************************** Review section*************************************************/

}
