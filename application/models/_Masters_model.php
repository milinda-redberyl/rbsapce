<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Masters_model extends ERP_Model
{

    function __contruct()
    {
        parent::__contruct();
    }

    function submit_category()
    {
        $category_name = trim($this->input->post('category_name'));
        $status = trim($this->input->post('status'));
        $category_id = trim($this->input->post('category_id'));
        if (empty($category_id)) {
            $data['category_name'] = $category_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $insert = $this->db->insert('category_types', $data);
            if ($insert) {
                return json_encode(array('s', 'Successfully Created'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        } else {
            $data['category_name'] = $category_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $this->db->where('category_id', $this->input->post('category_id'));
            $update = $this->db->update('category_types', $data);
            if ($update) {
                return json_encode(array('s', 'Successfully Updated'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        }
    }

    function delete_category()
    {
        $category_id = trim($this->input->post('category_id'));
        $this->db->where('category_id', $category_id);
        $this->db->delete('category_types');
        if ($this->db->affected_rows() > 0) {
            return json_encode(array('s', 'Successfully deleted'));
        } else {
            return json_encode(array('e', 'Failed'));
        }
    }

    function edit_category()
    {
        $this->db->select('*');
        $this->db->where('category_id', $this->input->post('category_id'));
        return $this->db->get('category_types')->row_array();
    }

    function submit_property()
    {
        $property_type_name = trim($this->input->post('property_type_name'));
        $status = trim($this->input->post('status'));
        $property_type_id = trim($this->input->post('property_type_id'));
        if (empty($property_type_id)) {
            $data['property_type_name'] = $property_type_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $insert = $this->db->insert('property_types', $data);
            if ($insert) {
                return json_encode(array('s', 'Successfully Created'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        } else {
            $data['property_type_name'] = $property_type_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $this->db->where('property_type_id', $this->input->post('property_type_id'));
            $update = $this->db->update('property_types', $data);
            if ($update) {
                return json_encode(array('s', 'Successfully Updated'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        }
    }

     function submit_agent_data()
    {
        $agent_name = trim($this->input->post('agent_name'));
        $linkedin = trim($this->input->post('linkedin'));
        $nationality = trim($this->input->post('nationality'));
        $languages = trim($this->input->post('languages'));
        $agent_id = trim($this->input->post('agent_id'));
        $about_agent = trim($this->input->post('about_agent'));
       
      
            $data['Ename1'] = $agent_name;
            $data['EpLinkedin'] = $linkedin;
            $data['EpLanguages'] = $languages;
            $data['EpNationality'] = $nationality;
            $data['myProfile'] = $about_agent;

            $this->db->where('EIdNo', $this->input->post('agent_id'));
            $update = $this->db->update('srp_employeesdetails', $data);
            if ($update) {
                return json_encode(array('s', 'Successfully Updated'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
       
    }

     function submit_review_data()
    {
        $rating1 = trim($this->input->post('rating1'));  
        $rating2 = trim($this->input->post('rating2'));    
        $rating3 = trim($this->input->post('rating3'));    
        $rating4 = trim($this->input->post('rating4'));    
        $rating5 = trim($this->input->post('rating5'));    
        $rating6 = trim($this->input->post('rating6')); 

        $total_ratings = ($rating1 + $rating2 + $rating3 + $rating4 + $rating5 + $rating6)/6;
       
        if (($total_ratings >= 4 && $total_ratings <= 5)){
            $data['rating_count'] = 5;
        } else if (($total_ratings >= 3 && $total_ratings <= 4)) {
            $data['rating_count'] = 4;
        } else if (($total_ratings >= 2 && $total_ratings <= 3)) {
            $data['rating_count'] = 3;
        } else if (($total_ratings >= 1 && $total_ratings <= 2)) {
            $data['rating_count'] = 2;
        } else if (($total_ratings >= 0 && $total_ratings <= 1)) {
            $data['rating_count'] = 1;
        } else {
            $data['rating_count'] = 0;
        }


        $arrayRatings = array(1 => $rating1,
                           2 => $rating2,
                           3 => $rating3,
                           4 => $rating4,
                           5 => $rating5,
                           6 => $rating6
                    );      
        $setRatings = json_encode($arrayRatings);             

        $emp_name = trim($this->input->post('user_name'));    
        $emp_email = trim($this->input->post('user_email'));    

        $property_id = trim($this->input->post('property_id'));    
        $emp_id = trim($this->input->post('emp_id'));    
       
        $review_title = trim($this->input->post('review_title'));
        $review_description = trim($this->input->post('review_description'));
        $agent_id = trim($this->input->post('agent_id'));
        $date = date("Y/m/d");
            
            $data['rating_categories_array'] = $setRatings;
            $data['property_id'] = $property_id;
            $data['emp_id'] = $emp_id;
            $data['emp_email'] = $emp_email;
            $data['emp_name'] = $emp_name;
            $data['emp_email'] = $emp_email;
            $data['review_title'] = $review_title;
            $data['review_description'] = $review_description;
            $data['date'] = $date;
                                       
                $insert = $this->db->insert('review_master', $data);
                if ($insert) {
                    return json_encode(array('s', 'Successfully Submitted'));
                } else {
                    return json_encode(array('e', 'Failed'));
                }
       
    }

      function submit_report_data()
    {
        $u_email = trim($this->input->post('u_email'));
        $reason = trim($this->input->post('reason_id'));
        $u_msg = trim($this->input->post('u_msg'));
        $property_id = trim($this->input->post('property_id'));
             
      
            $data['report_email'] = $u_email;
            $data['reason'] = $reason;
            $data['comments'] = $u_msg;
            $data['property_id'] = $property_id;

            $insert = $this->db->insert('property_report', $data);
                if ($insert) {
                    return json_encode(array('s', 'Successfully Submitted'));
                } else {
                    return json_encode(array('e', 'Failed'));
                }
       
    }

     function submit_company_data()
    {
        $company_name = trim($this->input->post('company_name'));
        $company_address = trim($this->input->post('company_address'));
        $company_tel = trim($this->input->post('company_tel'));
        $company_email = trim($this->input->post('company_email'));
        $about_company = trim($this->input->post('about_company'));
        $company_id = trim($this->input->post('company_id'));
             
      
            $data['company_name'] = $company_name;
            $data['company_address'] = $company_address;
            $data['company_telephone'] = $company_tel;
            $data['company_email'] = $company_email;
            $data['about_company'] = $about_company;

            $this->db->where('company_id', $this->input->post('company_id'));
            $update = $this->db->update('company_master', $data);
            if ($update) {
                return json_encode(array('s', 'Successfully Updated'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
       
    }

     function submit_aboutus()
    {
        $about_year = trim($this->input->post('about_year'));
        $about_description = trim($this->input->post('about_description'));
        $status = trim($this->input->post('status'));

         $aboutus_id = trim($this->input->post('aboutus_id'));

        if (empty($aboutus_id)) {
            $data['description'] = $about_description;
            $data['year'] = $about_year;
            $data['status'] = (!empty($status) ? $status : 0);
            $insert = $this->db->insert('about_company', $data);
            if ($insert) {
                return json_encode(array('s', 'Successfully Created'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        } else {
            $data['description'] = $about_description;
            $data['year'] = $about_year;
            $data['status'] = (!empty($status) ? $status : 0);
            $this->db->where('id', $this->input->post('aboutus_id'));
            $update = $this->db->update('about_company', $data);
            if ($update) {
                return json_encode(array('s', 'Successfully Updated'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        }
       
    }

    function delete_property()
    {
        $property_type_id = trim($this->input->post('property_type_id'));
        $this->db->where('property_type_id', $property_type_id);
        $this->db->delete('property_types');
        if ($this->db->affected_rows() > 0) {
            return json_encode(array('s', 'Successfully deleted'));
        } else {
            return json_encode(array('e', 'Failed'));
        }
    }

    function edit_property()
    {
        $this->db->select('*');
        $this->db->where('property_type_id', $this->input->post('property_type_id'));
        return $this->db->get('property_types')->row_array();
    }

    function submit_furniture()
    {
        $property_type_name = trim($this->input->post('furniture_name'));
        $status = trim($this->input->post('status'));
        $furniture_type_id = trim($this->input->post('furniture_type_id'));
        if (empty($furniture_type_id)) {
            $data['furniture_name'] = $property_type_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $insert = $this->db->insert('furniture_types', $data);
            if ($insert) {
                return json_encode(array('s', 'Successfully Created'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        } else {
            $data['furniture_name'] = $property_type_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $this->db->where('furniture_type_id', $this->input->post('furniture_type_id'));
            $update = $this->db->update('furniture_types', $data);
            if ($update) {
                return json_encode(array('s', 'Successfully Updated'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        }
    }

    function edit_furniture()
    {
        $this->db->select('*');
        $this->db->where('furniture_type_id', $this->input->post('furniture_type_id'));
        return $this->db->get('furniture_types')->row_array();
    }


    function submit_bed_type()
    {
        $bed_type_name = trim($this->input->post('bed_type_name'));
        $status = trim($this->input->post('status'));
        $bed_type_id = trim($this->input->post('bed_type_id'));
        if (empty($bed_type_id)) {
            $data['bed_type_name'] = $bed_type_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $insert = $this->db->insert('bed_types', $data);
            if ($insert) {
                return json_encode(array('s', 'Successfully Created'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        } else {
            $data['bed_type_name'] = $bed_type_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $this->db->where('bed_type_id', $this->input->post('bed_type_id'));
            $update = $this->db->update('bed_types', $data);
            if ($update) {
                return json_encode(array('s', 'Successfully Updated'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        }
    }

    function edit_bed_type()
    {
        $this->db->select('*');
        $this->db->where('bed_type_id', $this->input->post('bed_type_id'));
        return $this->db->get('bed_types')->row_array();
    }

    function edit_aboutus()
    {
        $this->db->select('*');
        $this->db->where('id', $this->input->post('aboutus_id'));
        return $this->db->get('about_company')->row_array();
    }

    function delete_bedtype()
    {
        $bed_type_id = trim($this->input->post('bed_type_id'));
        $this->db->where('bed_type_id', $bed_type_id);
        $this->db->delete('bed_types');
        if ($this->db->affected_rows() > 0) {
            return json_encode(array('s', 'Successfully deleted'));
        } else {
            return json_encode(array('e', 'Failed'));
        }
    }

    function delete_roomtype()
    {
        $room_type_id = trim($this->input->post('room_type_id'));
        $this->db->where('room_type_id', $room_type_id);
        $this->db->delete('room_types');
        if ($this->db->affected_rows() > 0) {
            return json_encode(array('s', 'Successfully deleted'));
        } else {
            return json_encode(array('e', 'Failed'));
        }
    }

    function submit_room_type()
    {
        $room_name = trim($this->input->post('room_name'));
        $status = trim($this->input->post('status'));
        $room_type_id = trim($this->input->post('room_type_id'));
        if (empty($room_type_id)) {
            $data['room_name'] = $room_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $insert = $this->db->insert('room_types', $data);
            if ($insert) {
                return json_encode(array('s', 'Successfully Created'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        } else {
            $data['room_name'] = $room_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $this->db->where('room_type_id', $this->input->post('room_type_id'));
            $update = $this->db->update('room_types', $data);
            if ($update) {
                return json_encode(array('s', 'Successfully Updated'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        }
    }

    function edit_room_type()
    {
        $this->db->select('*');
        $this->db->where('room_type_id', $this->input->post('room_type_id'));
        return $this->db->get('room_types')->row_array();
    }

    function delete_roomamenities()
    {
        $amenity_id = trim($this->input->post('amenity_id'));
        $this->db->where('amenity_id', $amenity_id);
        $this->db->delete('room_amenities');
        if ($this->db->affected_rows() > 0) {
            return json_encode(array('s', 'Successfully deleted'));
        } else {
            return json_encode(array('e', 'Failed'));
        }
    }


    function submit_amenities()
    {
        $amenity_name = trim($this->input->post('amenity_name'));
        $status = trim($this->input->post('status'));
        $amenity_id = trim($this->input->post('amenity_id'));
        if (empty($amenity_id)) {
            $data['amenity_name'] = $amenity_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $insert = $this->db->insert('room_amenities', $data);
            if ($insert) {
                return json_encode(array('s', 'Successfully Created'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        } else {
            $data['amenity_name'] = $amenity_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $this->db->where('amenity_id', $this->input->post('amenity_id'));
            $update = $this->db->update('room_amenities', $data);
            if ($update) {
                return json_encode(array('s', 'Successfully Updated'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        }
    }

    function edit_amenity_type()
    {
        $this->db->select('*');
        $this->db->where('amenity_id', $this->input->post('amenity_id'));
        return $this->db->get('room_amenities')->row_array();
    }

    function delete_bathroomtype()
    {
        $bathroom_type_id = trim($this->input->post('bathroom_type_id'));
        $this->db->where('bathroom_type_id', $bathroom_type_id);
        $this->db->delete('bathroom_types');
        if ($this->db->affected_rows() > 0) {
            return json_encode(array('s', 'Successfully deleted'));
        } else {
            return json_encode(array('e', 'Failed'));
        }
    }

    function submit_bathroom()
    {
        $bathroom_type_name = trim($this->input->post('bathroom_type_name'));
        $bathroom_count = trim($this->input->post('bathroom_count'));
        $status = trim($this->input->post('status'));
        $bathroom_type_id = trim($this->input->post('bathroom_type_id'));
        if (empty($bathroom_type_id)) {
            $data['bathroom_type_name'] = $bathroom_type_name;
            $data['bathroom_count'] = $bathroom_count;
            $data['status'] = (!empty($status) ? $status : 0);
            $insert = $this->db->insert('bathroom_types', $data);
            if ($insert) {
                return json_encode(array('s', 'Successfully Created'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        } else {
            $data['bathroom_type_name'] = $bathroom_type_name;
            $data['bathroom_count'] = $bathroom_count;
            $data['status'] = (!empty($status) ? $status : 0);
            $this->db->where('bathroom_type_id', $this->input->post('bathroom_type_id'));
            $update = $this->db->update('bathroom_types', $data);
            if ($update) {
                return json_encode(array('s', 'Successfully Updated'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        }
    }

    function edit_bathroom_type()
    {
        $this->db->select('*');
        $this->db->where('bathroom_type_id', $this->input->post('bathroom_type_id'));
        return $this->db->get('bathroom_types')->row_array();
    }

    function submit_country()
    {
        $country_name = trim($this->input->post('country_name'));
        $status = trim($this->input->post('status'));
        $country_id = trim($this->input->post('country_id'));
        if (empty($country_id)) {
            $data['country_name'] = $country_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $insert = $this->db->insert('country', $data);
            if ($insert) {
                return json_encode(array('s', 'Successfully Created'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        } else {
            $data['country_name'] = $country_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $this->db->where('country_id', $this->input->post('country_id'));
            $update = $this->db->update('country', $data);
            if ($update) {
                return json_encode(array('s', 'Successfully Updated'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        }
    }

    function delete_country()
    {
        $country_id = trim($this->input->post('country_id'));
        $this->db->where('country_id', $country_id);
        $this->db->delete('country');
        if ($this->db->affected_rows() > 0) {
            return json_encode(array('s', 'Successfully deleted'));
        } else {
            return json_encode(array('e', 'Failed'));
        }
    }

    function edit_country()
    {
        $this->db->select('*');
        $this->db->where('country_id', $this->input->post('country_id'));
        return $this->db->get('country')->row_array();
    }

    function submit_city()
    {
        $city_name = trim($this->input->post('city_name'));
        $status = trim($this->input->post('status'));
        $country_id = trim($this->input->post('country_id'));
        $city_id = trim($this->input->post('city_id'));
        if (empty($city_id)) {
            $data['city_name'] = $city_name;
            $data['country_id'] = $country_id;
            $data['status'] = (!empty($status) ? $status : 0);
            $insert = $this->db->insert('city', $data);
            if ($insert) {
                return json_encode(array('s', 'Successfully Created'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        } else {
            $data['city_name'] = $city_name;
            $data['status'] = (!empty($status) ? $status : 0);
            $this->db->where('city_id', $this->input->post('city_id'));
            $update = $this->db->update('city', $data);
            if ($update) {
                return json_encode(array('s', 'Successfully Updated'));
            } else {
                return json_encode(array('e', 'Failed'));
            }
        }
    }

    function edit_city()
    {
        $this->db->select('*');
        $this->db->where('city_id', $this->input->post('city_id'));
        return $this->db->get('city')->row_array();
    }

    function delete_city()
    {
        $city_id = trim($this->input->post('city_id'));
        $this->db->where('city_id', $city_id);
        $this->db->delete('city');
        if ($this->db->affected_rows() > 0) {
            return json_encode(array('s', 'Successfully deleted'));
        } else {
            return json_encode(array('e', 'Failed'));
        }
    }

    function submit_users()
    {
        $Ename1 = trim($this->input->post('Ename1'));
        $EEmail = trim($this->input->post('EEmail'));
        $EpTelephone = trim($this->input->post('EpTelephone'));
        $EpMobile = trim($this->input->post('EpMobile'));
        $EpSkype = trim($this->input->post('EpSkype'));
        $EpDesignation = $this->input->post('EpDesignation');
        $EpNationality = $this->input->post('EpNationality');
        $EpLanguages = $this->input->post('EpLanguages');
        $EpLinkedin = $this->input->post('EpLinkedin');
        $adminoragent = trim($this->input->post('adminoragent'));
        $Password = trim($this->input->post('Password'));
        $pwd = trim($this->input->post('Password'));;
        $md5pwd = md5($pwd);
        /*$admin=0;
        $agent=0;
        if($adminoragent==1){
            $admin=1;
            $agent=0;
            $company=0;
        }else{
            $admin=0;
            $agent=1;
        }*/
        $status = trim($this->input->post('status'));
        $EIdNo = trim($this->input->post('EIdNo'));

        if (empty($EIdNo)) {

            $this->db->select('UserName');
            $this->db->where('UserName', $EEmail);
            $employee = $this->db->get('srp_employeesdetails')->row_array();
            if (!empty($employee)) {
                return json_encode(array('e', 'User name already exist'));
            } else {
                $dataI['Ename1'] = $Ename1;
                $dataI['Ename2'] = $Ename1;
                $dataI['UserName'] = $EEmail;
                $dataI['Password'] = $md5pwd;
                $dataI['EpTelephone'] = $EpTelephone;
                $dataI['EpMobile'] = $EpMobile;
                $dataI['EpSkype'] = $EpSkype;
                $dataI['EmpDesignation'] = $EpDesignation;
                $dataI['EpNationality'] = $EpNationality;
                $dataI['EpLanguages'] = $EpLanguages;
                $dataI['EpLinkedin'] = $EpLinkedin;
                /*$dataI['isSystemAdmin'] = $admin;*/
                $dataI['isAgent'] = 1;
                if (isCompany()) {
                  // $dataI['company_id'] = current_userID();
                     $eid = current_userID();
                     $dataI['company_id'] = get_agent_company($eid);
                }
                $dataI['isActive'] = (!empty($status) ? $status : 0);
                $dataI['Timestamp'] = date("Y-m-d h:i:s");
                $insert = $this->db->insert('srp_employeesdetails', $dataI);
                if ($insert) {
                    return json_encode(array('s', 'Successfully Created'));
                } else {
                    return json_encode(array('e', 'Failed'));
                }
            }
        } else {

            $this->db->select('UserName');
            $this->db->where('UserName', $EEmail);
            $this->db->where('EIdNo !=', $EIdNo);
            $employee = $this->db->get('srp_employeesdetails')->row_array();
            if (!empty($employee)) {
                return json_encode(array('e', 'User name already exist'));
            } else {
                if ($Password != '******') {
                    $data['Password'] = $md5pwd;
                }
                $data['Ename1'] = $Ename1;
                $data['UserName'] = $EEmail;
                $data['EpTelephone'] = $EpTelephone;
                $data['EpMobile'] = $EpMobile;
                $data['EpSkype'] = $EpSkype;
                $data['EpMobile'] = $EpMobile;
                $data['EmpDesignation'] = $EpDesignation;
                /*$data['isSystemAdmin'] = $admin;
                $data['isAgent'] = $agent;*/
                $data['isActive'] = (!empty($status) ? $status : 0);
                $this->db->where('EIdNo', $this->input->post('EIdNo'));
                $update = $this->db->update('srp_employeesdetails', $data);
                if ($update) {
                    return json_encode(array('s', 'Successfully Updated'));
                } else {
                    return json_encode(array('e', 'Failed'));
                }
            }
        }
    }

    function edit_user()
    {
        $this->db->select('*');
        $this->db->where('EIdNo', $this->input->post('EIdNo'));
        return $this->db->get('srp_employeesdetails')->row_array();
    }

    function delete_employee()
    {
        $EIdNo = trim($this->input->post('EIdNo'));
        $this->db->where('EIdNo', $EIdNo);
        $this->db->delete('srp_employeesdetails');
        if ($this->db->affected_rows() > 0) {
            return json_encode(array('s', 'Successfully deleted'));
        } else {
            return json_encode(array('e', 'Failed'));
        }
    }

     function get_property_log()
    {       
        $property_id = trim($this->input->post('property_id'));

        $this->db->select('property_id,property_price,date');
        $this->db->from('property_price_log');
        $this->db->where('property_id', $property_id);
        $output = $this->db->get()->result_array();
         return json_encode($output);
    }


}