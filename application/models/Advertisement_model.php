<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Madura
 * Date: 3/14/2018
 * Time: 9:32 AM
 */

class Advertisement_model extends ERP_Model
{

    function __contruct()
    {
        parent::__contruct();
    }

    function get_all_advertisement()
    {
        $this->db->select('*');
        $this->db->from('advertisement_master');
        $output = $this->db->get()->result_array();
        return $output;
    }

    function getsidebaradvertisement(){
        $this->db->select('*');
        $this->db->where('position', 'sidebar');
        $this->db->from('advertisement_master');

        $query = $this->db->get();
        return $query->result();
        //$this->output->set_output(json_encode($query->result()));
    }

    public function getjsonadvertisementbyid($id){
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('advertisement_master');

        $query = $this->db->get();
        $this->output->set_output(json_encode($query->result()));
    }

    public function submit_advertisement($data) {
        $this->db->insert('advertisement_master', $data);
    }

    public function edit_advertisement($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('advertisement_master', $data);
    }

    public function delete_advertisement($id) {
        $this->db->where('id', $id);
        $this->db->delete('advertisement_master');
    }
}