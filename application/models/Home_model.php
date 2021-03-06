<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends ERP_Model
{

    function __contruct()
    {
        parent::__contruct();
        $this->load->model('ERP_model');
    }

    function get_sidebar_advertisement()
    {
        $this->db->select('*');
        $this->db->where('position', 'sidebar');
        $this->db->from('advertisement_master');
        $this->db->order_by('rand()');
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_sidebar_advertisement()
    {
        $this->db->select('*');
        $this->db->where('position', 'sidebar');
        $this->db->from('advertisement_master');
        $this->db->order_by('rand()');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_category_types(){
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->from('category_types');
        $this->db->order_by('category_id');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_property_types(){
        $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->from('property_types');
        $this->db->order_by('property_type_id');

        $query = $this->db->get();
        return $query->result_array();
    }

    function search_property($limit = 10, $from = 0)
    {
        $this->db->select('ct.category_name AS category_nameas,
                    pt.property_type_name AS property_type_name,
                    "property.jpg"  AS imageLink,a.EmpImage as agentImageLink, bt.bed_type_name, p.* ');
        $this->db->from('property AS p');
        $this->db->join('category_types ct', 'ct.category_id = p.category_type_id', 'LEFT');
        $this->db->join('property_types pt', 'pt.property_type_id = p.property_type_id', 'LEFT');
        $this->db->join('srp_employeesdetails a', 'a.EIdNo=  p.agent_id', 'LEFT');
        $this->db->join('bed_types bt', 'bt.bed_type_id =  p.bed_type_id', 'LEFT');

        $ct = $this->input->get('ct');
        if (isset($ct) && !empty($ct)) {
            $this->db->where('p.category_type_id', $ct);
        }

        $cty = $this->input->get('cty');
        if (isset($cty) && !empty($cty)) {
            $this->db->where('p.city_id', $cty);
        }

        $pt = $this->input->get('pt');
        if (isset($pt) && !empty($pt)) {
            $this->db->where('p.property_type_id', $pt);
        }

        $ft = $this->input->get('ft');
        if (isset($ft) && !empty($ft)) {
            $this->db->where('p.furniture_type_id', $ft);
        }

        /** Price */
        /* $pmi = $this->input->get('pmi');
         $pmx = $this->input->get('pmx');

         if (!empty($pmi) && !empty($pmx)) {
             $this->db->where('p.property_price >=', $pmi);
             $this->db->where('p.property_price <=', $pmx);
         } else if (!empty($pmi)) {
             $this->db->where('p.property_price >=', $pmi);
         } else if (!empty($pmx)) {
             $this->db->where('p.property_price <=', $pmx);
         }*/
        /**  end of Price */

        /** Price */
        $pmi = $this->input->get('pmi');
        $pmx = $this->input->get('pmx');

        if (!empty($pmi) && !empty($pmx)) {
            $this->db->where('p.property_price >=', $pmi);
            $this->db->where('p.property_price <=', $pmx);
        } else if (!empty($pmi)) {
            $this->db->where('p.property_price >=', $pmi);
        } else if (!empty($pmx)) {
            $this->db->where('p.property_price <=', $pmx);
        }
        /**  end of Price */

        /** Area  */
        $ami = $this->input->get('ami');
        $amx = $this->input->get('amx');

        if (!empty($ami) && !empty($amx)) {
            $this->db->where('p.area >=', $ami);
            $this->db->where('p.area <=', $amx);
        } else if (!empty($ami)) {
            $this->db->where('p.area >=', $ami);
        } else if (!empty($amx)) {
            $this->db->where('p.area <=', $amx);
        }				 $this->db->where('p.status =', 1);
        /**  end of Area */


        /** Bed Room  */
        /*   $btmn = $this->input->get('btmn');
           $btmx = $this->input->get('btmx');

           if (!empty($btmn) && !empty($btmx)) {
               $this->db->where('p.area >=', $btmn);
               $this->db->where('p.area <=', $btmx);
           } else if (!empty($btmn)) {
               $this->db->where('p.area >=', $btmn);
           } else if (!empty($btmx)) {
               $this->db->where('p.area <=', $btmx);
           }*/
        $btmn = $this->input->get('btmn');
        $btmx = $this->input->get('btmx');

        if (!empty($btmn) && !empty($btmx)) {
            $this->db->where('p.bed_type_id >=', $btmn);
            $this->db->where('p.bed_type_id <=', $btmx);
        } else if (!empty($btmn)) {
            $this->db->where('p.bed_type_id >=', $btmn);
        } else if (!empty($btmx)) {
            $this->db->where('p.bed_type_id <=', $btmx);
        }
        /**  end of Bed Room*/


        /** Footer Filters */

        /*Studio Filter */
        $stdo = $this->input->get('stdo');
        if (!empty($stdo)) {
            $this->db->where('p.bed_type_id', $stdo);
        }

        $agentID = $this->uri->segment(3);
        if (!empty($agentID) && $agentID > 0) {
            $this->db->where('p.agent_id', $agentID);
        }


        /** end of Footer Filters */


        $page = $this->uri->segment(2);
        if ($page > 1) {
            $limit_from = ($page - 1) * $limit;
        } else {
            $limit_from = 0;

        }
        $this->db->limit($limit, $limit_from);

        $pt = $this->input->get('ob');
        if (isset($pt) && !empty($pt)) {
            switch ($pt) {
                case "ob_nd":
                    /* Newes */
                    $this->db->order_by('p.property_id', 'DESC');
                    break;
                case "ob_pa":
                    /*Price Low*/
                    $this->db->order_by('p.property_price', 'ASC');
                    break;
                case "ob_pd":
                    /*Price High */
                    $this->db->order_by('p.property_price', 'DESC');
                    break;
                case "ob_ba":
                    /*Beds Low */
                    $this->db->order_by('p.bed_type_id', 'ASC');
                    break;
                case "ob_bd":
                    /*Beds Most */
                    $this->db->order_by('p.bed_type_id', 'DESC');
                    break;
            }
        }

        $result = $this->db->get()->result_array();
        return $result;

    }


    function search_property_count($limit = 10)
    {
        $this->db->select('ct.category_name AS category_nameas,
                    pt.property_type_name AS property_type_name,
                    "property.jpg"  AS imageLink, a.EmpImage as agentImageLink, p.* ');
        $this->db->from('property AS p');
        $this->db->join('category_types ct', 'ct.category_id = p.category_type_id', 'LEFT');
        $this->db->join('property_types pt', 'pt.property_type_id = p.property_type_id', 'LEFT');
        $this->db->join('srp_employeesdetails a', 'a.EIdNo=  p.agent_id', 'LEFT');
        //$this->db->query($q);

        $ct = $this->input->get('ct');
        if (isset($ct) && !empty($ct)) {
            $this->db->where('p.category_type_id', $ct);
        }

        $cty = $this->input->get('cty');
        if (isset($cty) && !empty($cty)) {
            $this->db->where('p.city_id', $cty);
        }

        $pt = $this->input->get('pt');
        if (isset($pt) && !empty($pt)) {
            $this->db->where('p.property_type_id', $pt);
        }

        $ft = $this->input->get('ft');
        if (isset($ft) && !empty($ft)) {
            $this->db->where('p.furniture_type_id', $ft);
        }

        /** Price */
        $pmi = $this->input->get('pmi');
        $pmx = $this->input->get('pmx');

        if (!empty($pmi) && !empty($pmx)) {
            $this->db->where('p.property_price >=', $pmi);
            $this->db->where('p.property_price <=', $pmx);
        } else if (!empty($pmi)) {
            $this->db->where('p.property_price >=', $pmi);
        } else if (!empty($pmx)) {
            $this->db->where('p.property_price <=', $pmx);
        }
        /**  end of Price */

        /** Area  */
        $ami = $this->input->get('ami');
        $amx = $this->input->get('amx');

        if (!empty($ami) && !empty($amx)) {
            $this->db->where('p.area >=', $ami);
            $this->db->where('p.area <=', $amx);
        } else if (!empty($ami)) {
            $this->db->where('p.area >=', $ami);
        } else if (!empty($amx)) {
            $this->db->where('p.area <=', $amx);
        }
        /**  end of Area */


        /** Bed Room  */
        $btmn = $this->input->get('btmn');
        $btmx = $this->input->get('btmx');

        if (!empty($btmn) && !empty($btmx)) {
            $this->db->where('p.area >=', $btmn);
            $this->db->where('p.area <=', $btmx);
        } else if (!empty($btmn)) {
            $this->db->where('p.area >=', $btmn);
        } else if (!empty($btmx)) {
            $this->db->where('p.area <=', $btmx);
        }
        /**  end of Bed Room*/


        /** Footer Filters */

        /*Studio Filter */
        $stdo = $this->input->get('stdo');
        if (!empty($stdo)) {
            $this->db->where('p.bed_type_id', $stdo);
        }


        /** end of Footer Filters */

        $agentID = $this->uri->segment(3);
        if (!empty($agentID) && $agentID > 0) {
            $this->db->where('p.agent_id', $agentID);
        }				 $this->db->where('p.status =', 1);


        $result = $this->db->count_all_results();
        //echo $this->db->last_query();
        return $result;

    }

    function get_specific_property($id)
    {
        $this->db->select('ct.category_name AS category_nameas, cm.company_name,
                    pt.property_type_name AS property_type_name, "property.jpg"  AS imageLink, 
                    a.Ename1 as agentName, a.EpTelephone as telephone, a.EmpImage as imageLink,
                    a.EpMobile as mobile,  a.EpSkype as skype, a.UserName as email,
                    bt.bed_type_name,
                    c.city_name, p.*, a.*, cm.*');
        $this->db->from('property AS p');
        $this->db->join('category_types ct', 'ct.category_id = p.category_type_id', 'LEFT');
        $this->db->join('property_types pt', 'pt.property_type_id = p.property_type_id', 'LEFT');
        $this->db->join('city c', 'c.city_id =  p.city_id', 'LEFT');
        $this->db->join('bed_types bt', 'bt.bed_type_id =  p.bed_type_id', 'LEFT');
        $this->db->join('srp_employeesdetails a', 'a.EIdNo=  p.agent_id', 'LEFT');
        $this->db->join('company_master cm', 'cm.company_id=  a.company_id', 'LEFT');
		 $this->db->where('p.status =', 1);

        $this->db->where('p.property_id', $id);
        $result = $this->db->get()->row_array();
        return $result;

    }

    function get_specific_review($id)
    {
        $this->db->select('review_master.rating_id,
                            review_master.review_title,
                            review_master.review_description,
                            review_master.rating_count,
                            review_master.date,property.property_name');
        $this->db->from('review_master');
        $this->db->join('property', 'property.property_id = review_master.property_id', 'INNER');
        $this->db->where('review_master.property_id', $id);
        $this->db->where('review_master.status', 1);
        $this->db->limit(3);
        $this->db->order_by('review_master.rating_id', 'DESC');
        $result = $this->db->get()->result_array();
        return $result;

    }

    function suggestedCategoryList()
    {
        $this->db->select('property_type_id,property_type_name');
        $this->db->from('property_types');
        $this->db->where('status', 1);
        $this->db->limit(9);
        //$this->db->order_by('rand( )');
        $output = $this->db->get()->result_array();
        return $output;
    }

    function aboutusList()
    {
        $this->db->select('id,description,year');
        $this->db->from('about_company');
        $this->db->where('status', 1);
        // $this->db->limit(9);
        //$this->db->order_by('rand( )');
        $output = $this->db->get()->result_array();
        return $output;
    }

    function get_specific_agent($id)
    {
       /* $this->db->select('emp.EIdNo,cm.company_name,cm.company_id,cm.companyLogo,pr.reference,emp.Ename1,emp.EmpImage,emp.EpTelephone,emp.EpMobile,emp.UserName,emp.EpSkype,emp.EmpImage,ct.country_name,emp.EpMobile,emp.EpLanguages,emp.EpNationality,emp.EpLinkedin,emp.empDesignation,emp.EmpDesignationId,emp.Nationality as countryCode,EXTRACT(YEAR FROM emp.CreatedDate) as createdYear,emp.myProfile');*/
       $this->db->select('emp.EIdNo,
                            emp.company_id,
                            emp.Ename1,
                            cm.company_name,
                            cm.companyLogo,
                            pr.reference,
                            emp.EmpImage,
                            emp.EpTelephone,
                            emp.EpMobile,
                            emp.UserName,
                            emp.EpSkype,
                            emp.EmpImage,
                            ct.country_name,
                            emp.EpMobile,
                            emp.EpLanguages,
                            emp.EpNationality,
                            emp.EpLinkedin,
                            emp.empDesignation,
                            emp.EmpDesignationId,
                            emp.Nationality AS countryCode,
                            EXTRACT( YEAR FROM emp.CreatedDate ) AS createdYear,
                            emp.myProfile');

        $this->db->from('srp_employeesdetails emp');
        $this->db->join('country ct', 'ct.country_id = emp.Nationality', 'LEFT');
        $this->db->join('property pr', 'pr.agent_id = emp.EIdNo', 'LEFT');
        $this->db->join('company_master cm', 'cm.company_id = emp.company_id', 'LEFT');
        $this->db->where('emp.isAgent', 1);
        $this->db->where('emp.isActive', 1);
        $this->db->where('emp.EIdNo ', $id);
        $result = $this->db->get()->row_array();
        return $result;

    }

    function get_specific_agent_transaction($id)
    {
        $this->db->select('*');
        $this->db->from('property');
        $this->db->where('isActive', 1);
        $this->db->where('agent_id', $id);
        $where = '(category_type_id="6" or category_type_id = "5")';
        $this->db->where($where);

        $result = $this->db->get()->result_array();
        return count($result);
    }

    function get_specific_agent_active_listing($id)
    {
        $this->db->select('*');
        $this->db->from('property');
        $this->db->where('isActive', 1);
        $this->db->where('agent_id', $id);
        $result = $this->db->get()->result_array();
        return count($result);
    }

    function get_specific_agent_active_listing_all()
    {
        $this->db->select('*');
        $this->db->from('property');
        $this->db->where('isActive', 1);
        $result = $this->db->get()->result_array();
        return $result;
    }


    function get_specific_company($id)
    {
        $this->db->select('company_master.company_id,
                            company_master.company_name,
                            company_master.company_address,
                            company_master.company_telephone,
                            company_master.company_email,
                            company_master.companyLogo,
                            company_master.about_company,
                            srp_employeesdetails.isActive,
                            srp_employeesdetails.EIdNo');
        $this->db->from('company_master');
        $this->db->join('srp_employeesdetails', 'company_master.company_id = srp_employeesdetails.company_id', 'LEFT');
        $this->db->where('srp_employeesdetails.isActive', 1);
        $this->db->where('srp_employeesdetails.EIdNo', $id);
        $result = $this->db->get()->row_array();

        //echo $this->db->last_query();
        return $result;

    }

    function get_specific_agents_incompany($id)
    {
        $this->db->select('*');
        $this->db->from('srp_employeesdetails');
        $this->db->where('company_id', $id);
        $result = $this->db->get()->row_array();

        //echo $this->db->last_query();
        return $result;

    }

    function fetch_property_agents()
    {
        $dataArr = array();
        $dataArr2 = array();
        $search_string = "%" . $_GET['query'] . "%";
        $sql = 'SELECT emp.EIdNo,emp.Ename1 AS "Match" FROM srp_employeesdetails emp WHERE (Ename1 LIKE "' . $search_string . '" OR Ename2) AND isAgent = "1" AND isActive = "1"';
        $data = $this->db->query($sql)->result_array();
        if (!empty($data)) {
            foreach ($data as $val) {
                $dataArr[] = array('value' => $val["Match"], 'data' => $val['EIdNo'], 'EIdNo' => $val['EIdNo']);
            }
        }
        $dataArr2['suggestions'] = $dataArr;
        return $dataArr2;
    }

    function fetch_property_companys()
    {
        $dataArr = array();
        $dataArr2 = array();
        $search_string = "%" . $_GET['query'] . "%";
        $sql = 'SELECT company_master.company_id,company_master.company_name AS "Match" FROM srp_employeesdetails emp INNER JOIN company_master ON emp.company_id = company_master.company_id WHERE (company_name LIKE "' . $search_string . '") GROUP BY company_id ';
        $data = $this->db->query($sql)->result_array();
        if (!empty($data)) {
            foreach ($data as $val) {
                $dataArr[] = array('value' => $val["Match"], 'data' => $val['company_id'], 'company_id' => $val['company_id']);
                //$dataArr = array('value' => $val["Match"], 'data' => $val['company_id'], 'company_id' => $val['company_id']);
            }
        }
        $dataArr2['suggestions'] = $dataArr;
        //echo $this->db->last_query().'<br>';
        return $dataArr2;
    }

    function send_agent_requestDetail_Email()
    {
        $EIdNo = trim($this->input->post('EIdNo'));
        $senderName = trim($this->input->post('senderName'));
        $senderEmail = trim($this->input->post('senderEmail'));
        $senderPhone = trim($this->input->post('senderPhone'));
        $message = trim($this->input->post('description'));

        $data['header'] = $this->get_specific_agent($EIdNo);
        $param["empName"] = $senderName;
        $param["message"] = $message;
        $param["body"] = $data;
        $mailData = [
            'toEmail' => $senderEmail,
            'subject' => $data['header']['Ename1'] . " Contact information",
            'param' => $param
        ];

        send_email($mailData, 'load-agent-email-template-one');

        return array('s', 'Email Send Successfully !');
    }

    function new_project_request_email()
    {
        $senderName = trim($this->input->post('name'));
        $senderEmail = trim($this->input->post('email'));
        $senderPhone = trim($this->input->post('mobile'));
        $company_email = trim($this->input->post('company_email'));

        $message = "Request details by :".$senderEmail.'. Mobile : '.$senderPhone;

        $data['header'] = $this->get_specific_agent($senderName);
        $param["empName"] = $senderName;
        $param["message"] = $message;
        $param["body"] = $message;
        $mailData = [
            'toEmail' => $company_email,
            'subject' => "Request details",
            'param' => $param
        ];

        //send_email($mailData, 'load-agent-email-template-one');
        send_email($mailData, 'new_project_request_details_template');

        return array('s', 'Email Send Successfully !');
    }

    function update_agentDetail()
    {
        $column = $this->input->post('name');
        $value = trim($this->input->post('value'));
        $empID = $this->input->post('pk');
        $this->db->where(['EIdNo' => $empID]);
        $result = $this->db->update('srp_employeesdetails', [$column => $value]);
        if ($result) {
            return array('s', 'Updated successfully.');
        } else {
            return array('e', 'Error In update process');
        }

    }

    function agent_image_upload()
    {
        $this->db->trans_start();
        $output_dir = "uploads/agents/";
        if (!file_exists($output_dir)) {
            mkdir("uploads/agents", 007);
        }
        $attachment_file = $_FILES["files"];
        $info = new SplFileInfo($_FILES["files"]["name"]);
        $fileName = 'Agent_' . trim($this->input->post('EIdNo')) . "_" . time() . '.' . $info->getExtension();
        move_uploaded_file($_FILES["files"]["tmp_name"], $output_dir . $fileName);

        $data['EmpImage'] = $fileName;

        $this->db->where('EIdNo', trim($this->input->post('EIdNo')));
        $this->db->update('srp_employeesdetails', $data);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return array('e', "Image Upload Failed." . $this->db->_error_message());
        } else {
            $this->db->trans_commit();
            return array('s', 'Image uploaded  Successfully.');
        }
    }

    function company_image_upload()
    {
        $this->db->trans_start();
        $output_dir = "uploads/company_image/";
        if (!file_exists($output_dir)) {
            mkdir("uploads/company_image", 007);
        }
        $attachment_file = $_FILES["files"];
        $info = new SplFileInfo($_FILES["files"]["name"]);
        $fileName = 'Company_' . trim($this->input->post('EIdNo')) . "_" . time() . '.' . $info->getExtension();
        move_uploaded_file($_FILES["files"]["tmp_name"], $output_dir . $fileName);

        $data['companyLogo'] = $fileName;

        $this->db->where('company_id', trim($this->input->post('EIdNo')));
        $this->db->update('company_master', $data);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return array('e', "Image Upload Failed." . $this->db->_error_message());
        } else {
            $this->db->trans_commit();
            return array('s', 'Image uploaded  Successfully.');
        }
    }


    function search_property_agent($limit = 10, $from = 0)
    {
        $this->db->select('ct.category_name AS category_nameas,
                    pt.property_type_name AS property_type_name,
                    "property.jpg"  AS imageLink,a.EmpImage as agentImageLink, bt.bed_type_name, p.* ');
        $this->db->from('property AS p');
        $this->db->join('category_types ct', 'ct.category_id = p.category_type_id', 'LEFT');
        $this->db->join('property_types pt', 'pt.property_type_id = p.property_type_id', 'LEFT');
        $this->db->join('srp_employeesdetails a', 'a.EIdNo=  p.agent_id', 'LEFT');
        $this->db->join('bed_types bt', 'bt.bed_type_id =  p.bed_type_id', 'LEFT');

        $ct = $this->input->get('ct');
        if (isset($ct) && !empty($ct)) {
            $this->db->where('p.category_type_id', $ct);
        }

        $cty = $this->input->get('cty');
        if (isset($cty) && !empty($cty)) {
            $this->db->where('p.city_id', $cty);
        }

        $pt = $this->input->get('pt');
        if (isset($pt) && !empty($pt)) {
            $this->db->where('p.property_type_id', $pt);
        }

        $ft = $this->input->get('ft');
        if (isset($ft) && !empty($ft)) {
            $this->db->where('p.furniture_type_id', $ft);
        }

        /** Price */
        $pmi = $this->input->get('pmi');
        $pmx = $this->input->get('pmx');

        if (!empty($pmi) && !empty($pmx)) {
            $this->db->where('p.property_price >=', $pmi);
            $this->db->where('p.property_price <=', $pmx);
        } else if (!empty($pmi)) {
            $this->db->where('p.property_price >=', $pmi);
        } else if (!empty($pmx)) {
            $this->db->where('p.property_price <=', $pmx);
        }
        /**  end of Price */

        /** Area  */
        $ami = $this->input->get('ami');
        $amx = $this->input->get('amx');

        if (!empty($ami) && !empty($amx)) {
            $this->db->where('p.area >=', $ami);
            $this->db->where('p.area <=', $amx);
        } else if (!empty($ami)) {
            $this->db->where('p.area >=', $ami);
        } else if (!empty($amx)) {
            $this->db->where('p.area <=', $amx);
        }
        /**  end of Area */


        /** Bed Room  */
        $btmn = $this->input->get('btmn');
        $btmx = $this->input->get('btmx');

        if (!empty($btmn) && !empty($btmx)) {
            $this->db->where('p.area >=', $btmn);
            $this->db->where('p.area <=', $btmx);
        } else if (!empty($btmn)) {
            $this->db->where('p.area >=', $btmn);
        } else if (!empty($btmx)) {
            $this->db->where('p.area <=', $btmx);
        }
        /**  end of Bed Room*/


        /** Footer Filters */

        /*Studio Filter */
        $stdo = $this->input->get('stdo');
        if (!empty($stdo)) {
            $this->db->where('p.bed_type_id', $stdo);
        }

        $agentID = $this->uri->segment(2);
        if (!empty($agentID) && $agentID > 0) {
            $this->db->where('p.agent_id', $agentID);
        }


        /** end of Footer Filters */


        $page = $this->uri->segment(3);
        if ($page > 1) {
            $limit_from = ($page - 1) * $limit;
        } else {
            $limit_from = 0;

        }
        $this->db->limit($limit, $limit_from);

        $pt = $this->input->get('ob');
        if (isset($pt) && !empty($pt)) {
            switch ($pt) {
                case "ob_nd":
                    /* Newes */
                    $this->db->order_by('p.property_id', 'DESC');
                    break;
                case "ob_pa":
                    /*Price Low*/
                    $this->db->order_by('p.property_price', 'ASC');
                    break;
                case "ob_pd":
                    /*Price High */
                    $this->db->order_by('p.property_price', 'DESC');
                    break;
                case "ob_ba":
                    /*Beds Low */
                    $this->db->order_by('p.bed_type_id', 'ASC');
                    break;
                case "ob_bd":
                    /*Beds Most */
                    $this->db->order_by('p.bed_type_id', 'DESC');
                    break;
            }
        }

        $result = $this->db->get()->result_array();
        return $result;

    }


    function search_property_count_agent($limit = 10)
    {
        $this->db->select('ct.category_name AS category_nameas,
                    pt.property_type_name AS property_type_name,
                    "property.jpg"  AS imageLink, a.EmpImage as agentImageLink, p.* ');
        $this->db->from('property AS p');
        $this->db->join('category_types ct', 'ct.category_id = p.category_type_id', 'LEFT');
        $this->db->join('property_types pt', 'pt.property_type_id = p.property_type_id', 'LEFT');
        $this->db->join('srp_employeesdetails a', 'a.EIdNo=  p.agent_id', 'LEFT');
        //$this->db->query($q);

        $ct = $this->input->get('ct');
        if (isset($ct) && !empty($ct)) {
            $this->db->where('p.category_type_id', $ct);
        }

        $cty = $this->input->get('cty');
        if (isset($cty) && !empty($cty)) {
            $this->db->where('p.city_id', $cty);
        }

        $pt = $this->input->get('pt');
        if (isset($pt) && !empty($pt)) {
            $this->db->where('p.property_type_id', $pt);
        }

        $ft = $this->input->get('ft');
        if (isset($ft) && !empty($ft)) {
            $this->db->where('p.furniture_type_id', $ft);
        }

        /** Price */
        $pmi = $this->input->get('pmi');
        $pmx = $this->input->get('pmx');

        if (!empty($pmi) && !empty($pmx)) {
            $this->db->where('p.property_price >=', $pmi);
            $this->db->where('p.property_price <=', $pmx);
        } else if (!empty($pmi)) {
            $this->db->where('p.property_price >=', $pmi);
        } else if (!empty($pmx)) {
            $this->db->where('p.property_price <=', $pmx);
        }
        /**  end of Price */

        /** Area  */
        $ami = $this->input->get('ami');
        $amx = $this->input->get('amx');

        if (!empty($ami) && !empty($amx)) {
            $this->db->where('p.area >=', $ami);
            $this->db->where('p.area <=', $amx);
        } else if (!empty($ami)) {
            $this->db->where('p.area >=', $ami);
        } else if (!empty($amx)) {
            $this->db->where('p.area <=', $amx);
        }
        /**  end of Area */


        /** Bed Room  */
        $btmn = $this->input->get('btmn');
        $btmx = $this->input->get('btmx');

        if (!empty($btmn) && !empty($btmx)) {
            $this->db->where('p.area >=', $btmn);
            $this->db->where('p.area <=', $btmx);
        } else if (!empty($btmn)) {
            $this->db->where('p.area >=', $btmn);
        } else if (!empty($btmx)) {
            $this->db->where('p.area <=', $btmx);
        }
        /**  end of Bed Room*/


        /** Footer Filters */

        /*Studio Filter */
        $stdo = $this->input->get('stdo');
        if (!empty($stdo)) {
            $this->db->where('p.bed_type_id', $stdo);
        }


        /** end of Footer Filters */

        $agentID = $this->uri->segment(2);
        if (!empty($agentID) && $agentID > 0) {
            $this->db->where('p.agent_id', $agentID);
        }


        $result = $this->db->count_all_results();
        //echo $this->db->last_query();
        return $result;

    }

    /*
     * Start New project
     */
    function get_specific_new_project($id)
    {
        $this->db->select('*');
        $this->db->from('property AS p');
        $this->db->join('category_types ct', 'ct.category_id = p.category_type_id', 'LEFT');
        $this->db->join('property_types pt', 'pt.property_type_id = p.property_type_id', 'LEFT');
        $this->db->join('city c', 'c.city_id =  p.city_id', 'LEFT');
        $this->db->join('bed_types bt', 'bt.bed_type_id =  p.bed_type_id', 'LEFT');
        $this->db->join('srp_employeesdetails a', 'a.EIdNo=  p.agent_id', 'LEFT');
        $this->db->join('company_master cm', 'cm.company_id=  a.company_id', 'LEFT');


        $this->db->where('p.property_id', $id);
        $result = $this->db->get()->row_array();
        return $result;

    }

    function get_specific_new_project_images($id)
    {
        $this->db->select('*');
        $this->db->from('property_images AS pi');
        $this->db->where('pi.property_id', $id);
        $result = $this->db->get()->result_array();
        return $result;
    }

    function get_specific_new_project_amenities($id)
    {
        $amenities_q = $this->db->query("SELECT
                        amenities.*,
                        room_amenities.* 
                    FROM
                        amenities
                        INNER JOIN room_amenities ON amenities.amenity_id = room_amenities.amenity_id 
                    WHERE
                        amenities.property_id = " . $id . " 
                        AND room_amenities.`status` = 1");

        return $amenities_q->result_array();
    }

    function get_specific_new_project_company($id)
    {
        $company_q = $this->db->query("SELECT
                        company_master.*,
                        property.agent_id,
                        srp_employeesdetails.EIdNo 
                    FROM
                        company_master
                        INNER JOIN srp_employeesdetails ON srp_employeesdetails.company_id = company_master.company_id
                        INNER JOIN property ON property.agent_id = srp_employeesdetails.EIdNo 
                    WHERE
                        property.property_id =" . $id);

        return $company_q->result_array();
    }

    function get_specific_new_project_units($id)
    {
        $company_q = $this->db->query("SELECT
	new_projects.id,
	new_projects.property_id,
	new_projects.bed_count,
	new_projects.property_type,
	new_projects.floor,
	new_projects.size,
	new_projects.image_type,
	new_projects.image_url,
	new_projects.`status`,
	property_types.property_type_name 
FROM
	new_projects
	INNER JOIN property_types ON new_projects.property_type = property_types.property_type_id 
WHERE
	new_projects.property_id =" . $id);

        return $company_q->result_array();
    }

    function get_specific_new_project_units_by_group($id)
    {
        $company_q = $this->db->query("SELECT
new_projects.id,
new_projects.property_id,
new_projects.bed_count,
new_projects.property_type,
new_projects.floor,
new_projects.size,
new_projects.image_type,
new_projects.image_url,
new_projects.`status`,
property_types.property_type_name
FROM
new_projects
INNER JOIN property_types ON new_projects.property_type = property_types.property_type_id
WHERE
new_projects.property_id = " . $id . "
GROUP BY
new_projects.bed_count,
new_projects.property_type");

        return $company_q->result_array();
    }


    /*
     * End New project
     */


}