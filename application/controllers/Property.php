<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        /* if (empty(trim($this->common_data['status']))) {
             header('Location: ' . site_url('Login/logout'));
             exit;
         } else {*/
        $this->load->model('property_model');
        //}
    }

    function tmp()
    {
        $this->load->view('admin/property_test');
    }


    function manage_property_controller()
    {
        if (empty(trim($this->session->userdata['status']))) {
            header('Location: ' . site_url('Login/logout'));
            exit;
        } else {
            $data['title'] = 'Manage Property';
            $data['main_content'] = 'admin/manage_property_view';
            //$data['extra'] = $this->dashboard_model->get_all_property();
            $this->load->view('includes/template', $data);
        }
    }


    function manage_about_us()
    {
        if (empty(trim($this->session->userdata['status']))) {
            header('Location: ' . site_url('Login/logout'));
            exit;
        } else {
            $data['title'] = 'Manage About Us ';
            $data['main_content'] = 'admin/manage_about_us_view';
            //$data['extra'] = $this->dashboard_model->get_all_property();
            $this->load->view('includes/template', $data);
        }

    }

    function manage_pending_property()
    {
        $id = $this->input->post('id');
        if (empty(trim($this->session->userdata['status']))) {
            header('Location: ' . site_url('Login/logout'));
            exit;
        } else {
            $data['title'] = 'Manage pending approval properties ';
            $data['main_content'] = 'admin/manage_pending_approval_property';
            $data['extra'] = $this->property_model->get_pending_approval_property();
            $this->load->view('includes/template', $data);
        }

    }

    function manage_company_users()
    {
        if (empty(trim($this->session->userdata['status']))) {
            header('Location: ' . site_url('Login/logout'));
            exit;
        } else {
            $data['title'] = 'Manage Property ';
            //$data['main_content'] = 'admin/manage_property_view';
            //$data['extra'] = $this->dashboard_model->get_all_property();
            $this->load->view('includes/template', $data);
        }
    }




    function get_property_dataTable()
    {
        $this->datatables->select('p.property_id as property_id, cm.*, p.country_id, em.Ename1, p.agent_id, p.city_id, p.property_type_id, p.furniture_type_id, p.category_type_id, p.property_name, p.description, p.property_price, p.area, p.rent_duration, p.property_address, p.telephone_number, p.mobile_number, p.permit_No, pt.property_type_name, ct.category_name, p.reference, p.isActive', false)
            ->from('property p')
            ->where('p.status', 1)
            ->join('property_types pt', 'p.property_type_id = pt.property_type_id', 'left')
            ->join('category_types ct', 'ct.category_id = p.category_type_id', 'left')
            ->join('srp_employeesdetails em', 'em.EIdNo = p.agent_id', 'left')
            ->join('company_master cm', 'cm.company_id = em.company_id', 'left');



        $this->datatables->add_column('DT_RowId', 'propertyID_$1', 'property_id')
            ->add_column('btn_set', '$1', 'get_dt_col_property(property_id)')
            ->add_column('property_active_status', '$1', 'property_active_status(property_id)');

        $isSystemAdmin = $this->session->userdata('isSystemAdmin');
        if (isAgent()) {
            $this->datatables->where('p.agent_id', current_userID());
        }
        if (isCompany()) {
            $this->datatables->where('p.company_id', current_userID());
        }

        //->edit_column('edit', '$1', 'col_pos_packItem(id)');
        echo $this->datatables->generate();
    }

    function get_aboutus_dataTable()
    {
        $this->datatables->select('id as id, description,status, year', false)
            ->from('about_company');
        //->where('packMenuID', $id)

        $this->datatables->add_column('DT_RowId', 'propertyID_$1', 'id')
            ->add_column('btn_set', '$1', 'get_dt_col_aboutus(id)');

        echo $this->datatables->generate();
    }

    function fetch_property_amenities()
    {
        $property_id = trim($this->input->post('property_id'));
        $this->datatables->select('ra.amenity_id as amenityAutoid,ra.amenity_name as name', false)
            ->from('room_amenities as ra')
            ->where('status', 1);
        $this->datatables->where('NOT EXISTS(SELECT property_id FROM amenities WHERE ra.amenity_id = amenities.amenity_id AND property_id  = ' . $property_id . ')');
        $this->datatables->add_column('edit', '<div style="text-align: center;"><div class="skin skin-square item-iCheck"> <div class="skin-section extraColumns"><input id="selectItem_$1" onclick="" type="checkbox" class="columnSelected"  value="$1" ><label for="checkbox">&nbsp;</label> </div></div></div>', 'amenityAutoid');
        echo $this->datatables->generate();
    }

    function save_property()
    {
        $this->form_validation->set_rules('category_type_id', 'Category Type', 'trim|required');
        $this->form_validation->set_rules('property_type_id', 'Property Type', 'trim|required');
        $this->form_validation->set_rules('furniture_type_id', 'Furniture Type', 'trim|required');
        $this->form_validation->set_rules('property_name', 'Property Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('property_price', 'Price', 'numeric|trim|required');
        $this->form_validation->set_rules('price_negotiable', 'Price Negotiable', 'trim');
        $this->form_validation->set_rules('area', 'Area ', 'numeric|trim|required');
        $this->form_validation->set_rules('telephone_number', 'Telephone', 'numeric|trim|required');				$this->form_validation->set_rules('property_availability', 'Property Availability', 'trim|required');		$this->form_validation->set_rules('car_parking_space', 'Car Parking Space', 'trim');				$this->form_validation->set_rules('deposit_period', 'Deposit Period', 'trim');				


        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('error' => 1, 'message' => validation_errors()));
        } else {

            $property_id = $this->input->post('property_id');
            if ($property_id) {
                /** update */
                $this->property_model->update_property();
                $this->property_model->insert_property_price();   // Price history table for save current modified data
                if (isset($_FILES['upload_image'])) {
                    $name = strtolower($_FILES['upload_image']['name']);
                    $size = $_FILES['upload_image']['size'];
                    if (strlen($name)) {
                        $TmpExt = pathinfo($name);
                        $ext = $TmpExt ['extension'];
                        $filenameOnly = $TmpExt ['filename'];
                        $valid_formats = array("jpeg", "png", "jpg");
                        if (in_array($ext, $valid_formats)) {
                            if ($size < (1024 * 1024 * 2)) {
                                //$images_path = UPLOAD_PATH . base_url() . 'uploads/';
                                $images_path = './uploads/';
                                $tmpFileName = $filenameOnly . '_' . time() . "." . $ext;
                                $file_name = $images_path . $tmpFileName;
                                $tmp = $_FILES['upload_image']['tmp_name'];


                                if (move_uploaded_file($tmp, $file_name)) {

                                    $data_img['property_id'] = $property_id;
                                    $data_img['image_link'] = $tmpFileName;
                                    $data_img['priority'] = generate_image_priority($property_id);
                                    $this->property_model->insert_property_images($data_img);

                                    $uploaded = true;


                                } else {
                                    echo json_encode(array("error" => 1, "message" => "Failed to upload, please try again!"));
                                    exit;
                                }
                            } else {
                                echo json_encode(array("error" => 1, "message" => "Document size max 2MB!"));
                                exit;
                            }
                        } else {
                            echo json_encode(array("error" => 1, "message" => "File format <strong>\"" . $ext . "\"</strong> NOT allowed"));
                            exit;
                        }
                    } else {
                        echo json_encode(array("error" => 1, "message" => "Please select a document file!"));
                        exit;
                    }
                }

                $uploadStatus = isset($uploaded) && $uploaded ? 1 : 0;
                echo json_encode(array('error' => 0, 'message' => 'Record successfully updated', 'property_id' => $property_id, 'uploadStatus' => $uploadStatus));
            } else {
                /** Insert */
                $uploadStatus = 0;
                $last_id = $this->property_model->insert_property();

                echo json_encode(array('error' => 0, 'message' => 'Record successfully inserted', 'property_id' => $last_id, 'uploadStatus' => $uploadStatus));
            }
        }
    }


    function save_article()
    {
        $this->form_validation->set_rules('article_title', 'Article Title', 'trim|required');
        $this->form_validation->set_rules('article_des', 'Article description', 'trim|required');
        $this->form_validation->set_rules('article_category', 'Category', 'trim|required');
        $this->form_validation->set_rules('position', 'Position', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('error' => 1, 'message' => validation_errors()));
        } else {

            $property_id = 0;
            if ($property_id) {
                /** update */
                $this->property_model->update_property();
                if (isset($_FILES['upload_image'])) {
                    $name = strtolower($_FILES['upload_image']['name']);
                    $size = $_FILES['upload_image']['size'];
                    if (strlen($name)) {
                        $TmpExt = pathinfo($name);
                        $ext = $TmpExt ['extension'];
                        $filenameOnly = $TmpExt ['filename'];
                        $valid_formats = array("jpeg", "png", "jpg");
                        if (in_array($ext, $valid_formats)) {
                            if ($size < (1024 * 1024 * 2)) {
                                $images_path = UPLOAD_PATH . base_url() . '/uploads/blog/';
                                $tmpFileName = $filenameOnly . '_' . time() . "." . $ext;
                                $file_name = $images_path . $tmpFileName;
                                $tmp = $_FILES['upload_image']['tmp_name'];


                                if (move_uploaded_file($tmp, $file_name)) {

                                    $data_img['property_id'] = $property_id;
                                    $data_img['image_link'] = $tmpFileName;
                                    $data_img['priority'] = generate_image_priority($property_id);
                                    $this->property_model->insert_property_images($data_img);

                                    $uploaded = true;


                                } else {
                                    echo json_encode(array("error" => 1, "message" => "Failed to upload, please try again!"));
                                    exit;
                                }
                            } else {
                                echo json_encode(array("error" => 1, "message" => "Document size max 2MB!"));
                                exit;
                            }
                        } else {
                            echo json_encode(array("error" => 1, "message" => "File format <strong>\"" . $ext . "\"</strong> NOT allowed"));
                            exit;
                        }
                    } else {
                        echo json_encode(array("error" => 1, "message" => "Please select a document file!"));
                        exit;
                    }
                }

                $uploadStatus = isset($uploaded) && $uploaded ? 1 : 0;
                echo json_encode(array('error' => 0, 'message' => 'Record successfully updated', 'property_id' => $property_id, 'uploadStatus' => $uploadStatus));
            } else {
                /** Insert */
                $uploadStatus = 0;

                //$last_id = $this->property_model->insert_property();
                $last_id = $this->property_model->insert_article();
                echo json_encode(array('error' => 0, 'message' => 'Record successfully inserted', 'uploadStatus' => $uploadStatus));
            }
        }
    }

    function load_property()
    {
        $id = $this->input->post('id');
        $result = $this->property_model->get_property($id);
        if (!empty($result)) {
            echo json_encode(array('error' => 0, 'message' => 'record not found', 'output' => $result));
        } else {
            echo json_encode(array('error' => 1, 'message' => 'record not found'));
        }

    }

    function load_property_images()
    {
        $id = $this->input->post('id');
        $result = $this->property_model->get_property_images($id);
        if (!empty($result)) {
            echo json_encode(array('error' => 0, 'message' => 'record not found', 'output' => $result));
        } else {
            echo json_encode(array('error' => 1, 'message' => 'record not found'));
        }

    }

    function load_property_by_city()
    {
        $result = $this->property_model->load_property_by_city();
        if (!empty($result)) {
            echo json_encode(array('error' => 0, 'message' => 'record found', 'output' => $result));
        } else {
            echo json_encode(array('error' => 1, 'message' => 'record not found'));
        }
    }

    public function propertyFilter()
    {
        echo json_encode(newprojectPagination());
    }

    function assign_property_amenities()
    {
        $this->form_validation->set_rules('selectedItemsSync[]', 'Amenities', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {
            echo json_encode($this->property_model->assign_property_amenities());
        }

    }

    function load_property_amenities_details()
    {
        $data['header'] = $this->property_model->load_property_amenities_details();
        $this->load->view('admin/ajax/load-property-amenities-details', $data);
    }

    function delete_property_amenities_details()
    {
        echo json_encode($this->property_model->delete_property_amenities_details());
    }

    function delete_single_property()
    {
        echo json_encode($this->property_model->delete_single_property());
    }

    function delete_single_img()
    {
        echo json_encode($this->property_model->delete_single_img());
    }


    function load_property_email_body()
    {
        $property_id = trim($this->input->post('property_id'));
        $data['header'] = $this->db->query("SELECT pro.property_id,pro.property_name,pro.property_price,pro.reference,bt.bed_type_name as bedroomNo,srp_employeesdetails.Ename1,pro.agent_id,
srp_employeesdetails.Ename2 FROM property pro LEFT JOIN bed_types bt ON bt.bed_type_id = pro.bed_type_id Left JOIN srp_employeesdetails ON pro.agent_id = srp_employeesdetails.EIdNo WHERE pro.property_id = {$property_id}")->row_array();
        $data['image'] = $this->db->query("SELECT image_link FROM property_images WHERE property_id = {$property_id}")->row_array();

        $this->load->view('admin/ajax/load-property-email-body-details', $data);
    }

    function send_property_Email()
    {
        $this->form_validation->set_rules('senderName', 'Sender Name', 'required');
        $this->form_validation->set_rules('senderEmail', 'Sender Email', 'required');
        $this->form_validation->set_rules('senderPhone', 'Sender Phone', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {
            echo json_encode($this->property_model->send_property_Email());
        }
    }

    function share_property_Email()
    {
        $this->form_validation->set_rules('description', 'Sender Name', 'required');
        $this->form_validation->set_rules('yourEmail', 'Your Email', 'required');
        $this->form_validation->set_rules('friendEmail', 'Friend Email', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('e', validation_errors()));
        } else {
            echo json_encode($this->property_model->share_property_Email());
        }
    }

    function ajax_saved_properties()
    {
        //$this->session->unset_userdata('save_properties');exit;
        $save_properties = $this->session->userdata('save_');
        $id = trim($this->input->post('id'));
        $status = trim($this->input->post('status'));

        $property_details_q = "SELECT
                property.property_id,
                property.property_name,
                property.property_type_id,
                property.property_price,
                property.category_type_id,
                property_types.property_type_name,
                property_images.image_link
                FROM
                property
                INNER JOIN property_types ON property.property_type_id = property_types.property_type_id
                INNER JOIN property_images ON property.property_id = property_images.property_id
                WHERE
                property.property_id = " . $id . " AND
                property_images.priority = 1";
        $property_details = $this->db->query($property_details_q)->row();

        $save_properties[$id] = array('property_id' => $id,
            'property_name' => $property_details->property_name,
            'property_type_name' => $property_details->property_type_name,
            'property_price' => $property_details->property_price,
            'category_type_id' => $property_details->category_type_id,
            'image_link' => base_url() . 'uploads/' . $property_details->image_link
        );

        if (!$status) {
            unset($save_properties[$id]);
        }

        $this->session->set_userdata(array(
            'save_' => $save_properties
        ));

        $this->load->view('includes/ajax/saved_properties_view');

        //echo '<pre>';
        //print_r($this->session->all_userdata());
        //echo '</pre>';

    }

}
