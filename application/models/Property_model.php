<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Property_model extends ERP_Model
{

    function __contruct()
    {
        parent::__contruct();
    }


    function insert_property()
    {

        $_POST['reference'] = generate_property_reference();
        if (isCompany()) {
            $_POST['agent_id'] = $this->input->post('agent_id');
            $_POST['company_id'] = current_userID();
        }

        if (isAgent()) {
            $agent_id = current_userID();
            $_POST['company_id'] = get_agent_company($agent_id);
        }

        if (isPartner()) {
            $agent_id = current_userID();
            $_POST['company_id'] = get_agent_company($agent_id);
        }
        $inputData = $this->input->post();

        unset($_POST['upload_image']);
        //$inputData = $this->input->post();
        $inputData = $this->input->post();
        $this->db->insert('property', $inputData);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }


    function insert_property_price()
    {

        $data['property_id'] = $this->input->post('property_id');
        $data['property_price'] = $this->input->post('property_price');
        $data['date'] = format_date_mysql_datetime();
        $data['update_user'] = current_userID();
        $this->db->insert('property_price_log', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update_property()
    {
        $tmp_property_id = $this->input->post('property_id');
        $inputData = $this->input->post();
        unset($inputData['property_id']);
        unset($inputData['upload_image']);
        $this->db->where('property_id', $tmp_property_id);
        $this->db->update('property', $inputData);
        return $tmp_property_id;
    }

    function update_article()
    {
        $tmp_property_id = $this->input->post('property_id');
        $inputData = $this->input->post();
        unset($inputData['property_id']);
        unset($inputData['upload_image']);
        $this->db->where('article_id', $tmp_property_id);
        $this->db->update('blog_master', $inputData);
        return $tmp_property_id;
    }

    function get_property($id)
    {
        $this->db->select('*');
        $this->db->from('property');
        $this->db->where('property_id', $id);
        $result = $this->db->get()->row_array();
        //echo $this->db->last_query();
        return $result;
    }

    function get_pending_approval_property()
    {
        $this->db->select("p.property_id,p.property_name, p.property_price, p.mobile_number, c.city_name");
        $this->db->from('property p');
        $this->db->join('city c', 'p.city_id = c.city_id', 'INNER');
        $this->db->where('p.isActive', 0);
        $result = $this->db->get()->result_array();
        return $result;
    }

    function insert_property_images($data)
    {
        $data['created_at'] = format_date_mysql_datetime();
        $data['createdBy'] = current_userID();
        $data['createdPc'] = current_pc();
        $result = $this->db->insert('property_images', $data);
        return $result;
    }

    function get_property_images($id)
    {
        $this->db->select('*');
        $this->db->from('property_images');
        $this->db->where('property_id', $id);
        $result = $this->db->get()->result_array();
        return $result;
    }

    function load_property_by_city()
    {
        $result = "";
        if ($this->input->post('type') == 1) { // get records when location selected
            $id = $this->input->post('city_id');
            $this->db->select('*');
            $this->db->from('property');
            $this->db->where('city_id', $id);
            $result = $this->db->get()->result_array();
        } else if ($this->input->post('type') == 2) { // get records when moving the map
            $id = $this->input->post('city_id');
            $this->db->select('*');
            $this->db->from('property');
            $this->db->where('latitude > ', $this->input->post('sw_lat'));
            $this->db->where('latitude <', $this->input->post('ne_lat'));
            $this->db->where('longitude >', $this->input->post('sw_long'));
            $this->db->where('longitude <', $this->input->post('ne_long'));
            if ($id) {
                $this->db->where('city_id', $id);
            }
            $result = $this->db->get()->result_array();
        }
        return $result;
    }

    function assign_property_amenities()
    {
        $selectedItem = $this->input->post('selectedItemsSync[]');
        $property_id = $this->input->post('property_id');
        $data = [];

        foreach ($selectedItem as $key => $vals) {
            $data[$key]['amenity_id'] = $vals;
            $data[$key]['property_id'] = $property_id;
            $data[$key]['CreatedPC'] = current_pc();
            $data[$key]['CreatedUserID'] = current_userID();
            $data[$key]['CreatedDate'] = date("Y-m-d h:i:s");
            $data[$key]['Timestamp'] = date("Y-m-d h:i:s");
        }
        $result = $this->db->insert_batch('amenities', $data);
        if ($result) {
            return array('s', 'Amenities Added successfully !');
        } else {
            return array('s', 'Amenities Insertion Failed');
        }
    }

    function load_property_amenities_details()
    {
        $property_id = trim($this->input->post('property_id'));
        $this->db->select("amt.amenities_detail_id,ra.amenity_name");
        $this->db->from('amenities amt');
        $this->db->join('room_amenities ra', 'amt.amenity_id = ra.amenity_id', 'left');
        $this->db->where('amt.property_id', $property_id);
        $this->db->order_by('amenities_detail_id', 'desc');
        return $this->db->get()->result_array();
    }

    function delete_property_amenities_details()
    {
        $amenities_detail_id = trim($this->input->post('amenities_detail_id'));
        $this->db->delete('amenities', array('amenities_detail_id' => $amenities_detail_id));
        return true;
    }

    function delete_single_property()
    {
        $property_id = trim($this->input->post('id'));
        $this->db->where('property_id', $property_id);
        $this->db->update('property', array('status'=>0));
        return true;

    }

    function delete_single_img()
    {
        $property_img_id = trim($this->input->post('property_image_id'));
        $this->db->delete('property_images', array('property_image_id' => $property_img_id));
        return true;
    }

    function send_property_Email()
    {
        $property_id = trim($this->input->post('property_id'));
        $senderName = trim($this->input->post('senderName'));
        $senderEmail = trim($this->input->post('senderEmail'));
        $senderPhone = trim($this->input->post('senderPhone'));

        $data['header'] = $this->db->query("SELECT pro.property_id,pro.property_name,pro.property_price,pro.reference,bt.bed_type_name as bedroomNo,pro.property_address,pt.property_type_name FROM property pro LEFT JOIN bed_types bt ON bt.bed_type_id = pro.bed_type_id LEFT JOIN property_types pt ON pt.property_type_id = pro.property_type_id WHERE pro.property_id = {$property_id}")->row_array();

        $data['image'] = $this->db->query("SELECT image_link FROM property_images WHERE property_id = {$property_id}")->row_array();

        $param["empName"] = $senderName;
        $param["body"] = $data;
        $mailData = [
            'toEmail' => $senderEmail,
            'subject' => "Your inquiry about property Ref:" . $data['header']['reference'],
            'param' => $param
        ];



        send_email($mailData, 'load-property-email-template-one');

        return array('s', 'Email Send Successfully !');
    }

    function share_property_Email()
    {
        $property_id = trim($this->input->post('property_id'));
        $description = trim($this->input->post('description'));
        $yourEmail = trim($this->input->post('yourEmail'));
        $friendEmail = trim($this->input->post('friendEmail'));

        $data['header'] = $this->db->query("SELECT pro.property_id,pro.property_name,pro.property_price,pro.reference,bt.bed_type_name as bedroomNo,pro.property_address,pt.property_type_name FROM property pro LEFT JOIN bed_types bt ON bt.bed_type_id = pro.bed_type_id LEFT JOIN property_types pt ON pt.property_type_id = pro.property_type_id WHERE pro.property_id = {$property_id}")->row_array();
        $data['image'] = $this->db->query("SELECT image_link FROM property_images WHERE property_id = {$property_id}")->row_array();

        $param["empName"] = $yourEmail;
        $param["description"] = $description;
        $param["body"] = $data;
        $mailData = [
            'toEmail' => $friendEmail,
            'subject' => $yourEmail . "shared a property with you",
            'param' => $param
        ];

        send_email($mailData, 'load-property-email-template-one');

        return array('s', 'Email Send Successfully !');
    }

    function insert_article()
    {

        unset($_POST['upload_image']);
        $inputData = $this->input->post();
        $this->db->insert('blog_master', $inputData);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }


}