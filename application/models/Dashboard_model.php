<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends ERP_Model
{

    function __contruct()
    {
        parent::__contruct();
    }

    function get_all_agent()
    {
        $this->db->select('*');
        $this->db->from('srp_employeesdetails');
        $this->db->where('isAgent', 1);
        $output = $this->db->get()->result_array();
        //echo $this->db->last_query();
        //print_r($output);
        return $output;

    }

    function get_all_category()
    {
        $this->db->select('*');
        $this->db->from('category_types');
        $output = $this->db->get()->result_array();
        return $output;
    }

    function get_all_property()
    {
        $this->db->select('*');
        $this->db->from('property_types');
        $output = $this->db->get()->result_array();
        return $output;
    }

    function get_all_article()
    {
        $this->db->select('*');
        $this->db->from('blog_master');
        $output = $this->db->get()->result_array();
        return $output;
    }

    function get_all_socialMedia()
    {
        $this->db->select('*');
        $this->db->from('social_media_master');
        $this->db->order_by('sortOrder','asc');
        $output = $this->db->get()->result_array();
        return $output;
    }

    function get_all_furniture()
    {
        $this->db->select('*');
        $this->db->from('furniture_types');
        $output = $this->db->get()->result_array();
        return $output;
    }

    function get_all_bed_type()
    {
        $this->db->select('*');
        $this->db->from('bed_types');
        $output = $this->db->get()->result_array();
        return $output;
    }

    function get_all_room_type()
    {
        $this->db->select('*');
        $this->db->from('room_types');
        $output = $this->db->get()->result_array();
        return $output;
    }

    function get_all_bathroom_type()
    {
        $this->db->select('*');
        $this->db->from('bathroom_types');
        $output = $this->db->get()->result_array();
        return $output;
    }

    function get_all_room_amenities()
    {
        $this->db->select('*');
        $this->db->from('room_amenities');
        $output = $this->db->get()->result_array();
        return $output;
    }

    function delete_furniture()
    {
        $furniture_type_id = trim($this->input->post('furniture_type_id'));
        $this->db->where('furniture_type_id', $furniture_type_id);
        $this->db->delete('furniture_types');
        if ($this->db->affected_rows() > 0) {
            return json_encode(array('s', 'Successfully deleted'));
        } else {
            return json_encode(array('e', 'Failed'));
        }
    }

     function get_all_new_projects()
    {
        $this->db->select('*');
        $this->db->from('property');
        $this->db->where('category_type_id', 7);
        $this->db->order_by('property_id', 'DESC');
        $this->db->join('property_types', 'property.property_type_id = property_types.property_type_id', 'LEFT');
        $this->db->join('category_types', 'property.category_type_id = category_types.category_id', 'LEFT');
        $output = $this->db->get()->result_array();
        return $output;
    }

     public function getjsonarticlebyid($id){
        $this->db->select('*');
        $this->db->where('property_id', $id);
        $this->db->from('property');

        $query = $this->db->get();
        $this->output->set_output(json_encode($query->result()));
    }

}