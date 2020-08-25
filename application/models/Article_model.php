<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**

 * Created by PhpStorm.

 * User: Madura

 * Date: 3/14/2018

 * Time: 9:32 AM

 */



class Article_model extends ERP_Model

{



    function __contruct()

    {

        parent::__contruct();

    }



    function get_all_articles()

    {

        $this->db->select('*');

        $this->db->from('blog_master');

        $output = $this->db->get()->result_array();

        return $output;

    }



    function get_most_popular_list()

    {

        $this->db->select('*');

        $this->db->from('blog_master');

        $this->db->where('position', 1);

        $this->db->where('status', 1);

        $this->db->order_by('article_id', 'DESC');

        $output = $this->db->get()->result_array();

        return $output;

    }



    function get_latest_list()

    {

        $this->db->select('*');

        $this->db->from('blog_master');

        $this->db->where('position', 2);

        $this->db->where('status', 1);

        $this->db->order_by('article_id', 'DESC');

        $output = $this->db->get()->result_array();

        return $output;

    }



    function get_all_list()

    {

        $this->db->select('*');

        $this->db->from('blog_master');

        $this->db->where('status', 1);

        $this->db->order_by('article_id', 'DESC');

        $output = $this->db->get()->result_array();

        return $output;

    }

   

   function get_post($id)

    {

        $this->db->select('*');

        $this->db->from('blog_master');

        $this->db->where('status', 1);

        $this->db->where('article_id',$id);

        $output = $this->db->get()->result_array();

        return $output;

    }



    public function getjsonarticlebyid($id){

        $this->db->select('*');

        $this->db->where('article_id', $id);

        $this->db->from('blog_master');



        $query = $this->db->get();

        $this->output->set_output(json_encode($query->result()));

    }



    public function submit_article($data) {

        $this->db->insert('blog_master', $data);

    }



    public function edit_article($id, $data) {

        $this->db->where('article_id', $id);

        $this->db->update('blog_master', $data);

    }



    public function delete_article($id) {

        $this->db->where('article_id', $id);

        $this->db->delete('blog_master');

    }



    /*******************************************************/
    /**************reviews start*********************************/
    function get_all_reviews()
    {

        $this->db->select('*');
        $this->db->from('review_master rm');
        $this->db->join('property p', 'p.property_id = rm.property_id', 'inner');
        $this->db->order_by('rm.rating_id', 'desc');
        $output = $this->db->get()->result_array();

        return $output;

    }

    public function update_rw_status($id, $data) {

        $this->db->where('rating_id', $id);

        $this->db->update('review_master', $data);

    }

    /*******************************************************/
    /**************reviewsend *********************************/

}