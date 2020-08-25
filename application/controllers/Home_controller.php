<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('masters_model');
        $this->load->model('article_model');
        $this->load->library('session');
        $lang = $this->session->get_userdata('language');
        $this->load->language('test', isset($lang['language']) && !empty($lang) ? $lang['language'] : 'english');
        
    }

    function changeLang()
    {
        $lang = isset($_GET['lang']) ? $_GET['lang'] : 'english';
        $this->session->set_userdata(['language' => $lang]);
        redirect('/');
    }


    function search()
    {


        $get = $this->input->get();


        $genGETVariable = '?';


        if (!empty($get)) {


            $i = 0;


            foreach ($get as $key => $val) {


                $genGETVariable .= $i != 0 ? '&' : '';


                $genGETVariable .= $key . '=' . $val;


                $i++;


            }


        }


        $controller_url = 'search';


        $data['title'] = 'RB Space | Home Page | ' . meta_description();


        $data['home'] = true;


        $data['recommended_properties'] = true;


        $data['classic_search'] = false;


        $data['suggestedCategoryList'] = $this->home_model->suggestedCategoryList();


        $data['search_suggestion'] = true;


        $data['s_result'] = $this->home_model->search_property();


        $data['count'] = $this->home_model->search_property_count();


        $data['suggestedCategoryList'] = $this->home_model->suggestedCategoryList();


        $pagination = get_pagination_style2($controller_url, $data['count']);


        $data['pagination'] = $pagination;


        $data['suggestion'] = false;


        $data['content_page'] = 'system/pages/search_result';


        $this->load->view('system/template/home-template', $data);


    }


    function loginHome()


    {


    }


    function index()
    {


        $data['title'] = 'RB Space | Home Page | ' . meta_description();


        $data['home'] = true;


        $data['recommended_properties'] = true;


        $data['classic_search'] = false;


        /*$data['content_page'] = 'system/pages/search_result';*/


        $this->load->view('system/template/home-template', $data);


    }


    function buy()


    {


        /** Filtered by Category type 2 */


        $_GET['ct'] = 2;


        $data['suggestedCategoryList'] = $this->home_model->suggestedCategoryList();


        $data['search_suggestion'] = true;


        $controller_url = 'buy';


        $data['s_result'] = $this->home_model->search_property(5);


        $data['count'] = $this->home_model->search_property_count();


        $pagination = get_pagination_style2($controller_url, $data['count'], 5);


        $data['pagination'] = $pagination;


        $data['suggestion'] = true;


        $data['content_page'] = 'system/pages/search_result';


        /** End of Filtered by Category type 2 */


        $data['title'] = 'RB Space | Buy Property | ' . meta_description();


        $data['ct'] = 2;


        $data['sub_title'] = 'Properties for sale in Sri Lanks';


        $data['home'] = false;


        $data['recommended_properties'] = false;


        $data['suggestion'] = true;


        $data['classic_search'] = true;


        $data['default_property'] = 2;


        //$data['content_page'] = 'system/pages/buy_page_content';


        $this->load->view('system/template/home-template', $data);


    }


    function rent()


    {


        /** Filtered by Category type 2 */


        $_GET['ct'] = 1;


        $controller_url = 'rent';


        $data['s_result'] = $this->home_model->search_property(5);


        $data['count'] = $this->home_model->search_property_count();


        $data['suggestedCategoryList'] = $this->home_model->suggestedCategoryList();


        $pagination = get_pagination_style2($controller_url, $data['count'], 5);


        $data['pagination'] = $pagination;


        $data['suggestion'] = true;


        $data['content_page'] = 'system/pages/search_result';


        /** End of Filtered by Category type 2 */


        $data['ct'] = 1;


        $data['title'] = 'RB Space | Rent Property | ' . meta_description();


        $data['sub_title'] = 'Properties for Rent in Sri Lanka';


        $data['home'] = false;


        $data['recommended_properties'] = false;


        $data['classic_search'] = true;


        $data['suggestion'] = true;


        $data['search_suggestion'] = true;


        $data['default_property'] = 1;


        /*$data['content_page'] = 'system/pages/buy_page_content';*/


        $this->load->view('system/template/home-template', $data);


    }


    function commercial()


    {


        /** Filtered by Category type 2 */


        $_GET['ct'] = 3;


        $controller_url = 'commercial';


        $data['s_result'] = $this->home_model->search_property(5);


        $data['count'] = $this->home_model->search_property_count();


        $pagination = get_pagination_style2($controller_url, $data['count'], 5);


        $data['pagination'] = $pagination;


        $data['suggestion'] = true;


        $data['content_page'] = 'system/pages/search_result';


        /** End of Filtered by Category type 2 */


        $data['ct'] = 3;


        $data['title'] = 'RB Space | Commercial Property | ' . meta_description();


        $data['sub_title'] = 'Commercial Properties in Sri Lanka';


        $data['home'] = false;


        $data['recommended_properties'] = false;


        $data['classic_search'] = true;


        $data['suggestedCategoryList'] = $this->home_model->suggestedCategoryList();


        $data['search_suggestion'] = true;


        $data['sidebar_advertisements'] = $this->home_model->get_all_sidebar_advertisement();


        $data['default_property'] = 3;


        //$data['content_page'] = 'system/pages/commercial_page_content';


        $this->load->view('system/template/home-template', $data);


    }


    function find_agent()


    {


        $data['title'] = 'Find agent and company';


        $data['home'] = false;


        $data['recommended_properties'] = false;


        $data['agent_search'] = true;


        $data['content_page'] = 'system/pages/find_agent_page_content';


        $this->load->view('system/template/home-template', $data);


    }


    function new_project()


    {


        $data['title'] = 'New Project';


        $data['home'] = false;


        $data['recommended_properties'] = false;


        $data['search'] = false;


        $data['suggestion'] = get_active_cities();


        $data['content_page'] = 'system/pages/new_project_page_content';


        $this->load->view('system/template/home-template', $data);


    }


    function view_single_new_project()
    {


        $id = $this->uri->segment(2);


        $data['title'] = 'New Project Details';


        $data['home'] = false;


        $data['recommended_properties'] = false;


        $data['search'] = false;


        $data['new_project_data'] = $this->home_model->get_specific_new_project($id);


        $data['new_project_images'] = $this->home_model->get_specific_new_project_images($id);


        $data['new_project_amenities'] = $this->home_model->get_specific_new_project_amenities($id);


        $data['new_project_company_details'] = $this->home_model->get_specific_new_project_company($id);


        $data['new_project_units'] = $this->home_model->get_specific_new_project_units($id);


        $data['new_project_units_by_group'] = $this->home_model->get_specific_new_project_units_by_group($id);


        $data['content_page'] = 'system/pages/new_projects_details';


        $this->load->view('system/template/home-template', $data);


    }


    function view_single_property()

    {


        $id = $this->uri->segment(2);

        $data['title'] = 'RB Space | Buy Property | ' . meta_description();

        $data['home'] = false;

        $data['recommended_properties'] = false;

        $data['classic_search'] = true;

        $data['suggestion'] = false;

        $data['property_data'] = $this->home_model->get_specific_property($id);

        $data['sidebar_advertisement'] = $this->home_model->get_sidebar_advertisement();

        $data['review_data'] = $this->home_model->get_specific_review($id);


        //var_dump($data['review_data']);

        /** for recommended property */

        $ct = isset($data['property_data']['category_type_id']) ? $data['property_data']['category_type_id'] : '';

        $pt = isset($data['property_data']['property_type_id']) ? $data['property_data']['property_type_id'] : '';

        $data['ct'] = $ct;

        $data['pt'] = $pt;


        $data['default_property'] = 2;

        $data['content_page'] = 'system/pages/view_property_by_id';


        $this->load->view('system/template/home-template', $data);

    }


    function view_single_space()

    {

        $id = $this->uri->segment(2);

        $data['title'] = 'RB Space | Sell Space | ' . meta_description();

        $data['home'] = false;

        $data['recommended_properties'] = false;

        $data['classic_search'] = true;

        $data['suggestion'] = false;

        /*$data['property_data'] = $this->home_model->get_specific_property($id);

        $data['sidebar_advertisement'] = $this->home_model->get_sidebar_advertisement();

        $data['review_data'] = $this->home_model->get_specific_review($id);*/


        //var_dump($data['review_data']);

        /** for recommended property */

        /* $ct = isset($data['property_data']['category_type_id']) ? $data['property_data']['category_type_id'] : '';

         $pt = isset($data['property_data']['property_type_id']) ? $data['property_data']['property_type_id'] : '';

         $data['ct'] = $ct;

         $data['pt'] = $pt; */


        /*$data['default_property'] = 2;*/

        $data['content_page'] = 'system/pages/view_space_by_id';


        $this->load->view('system/template/home-template', $data);

    }


    function tmp()

    {

        $data['title'] = 'TMP page';

        $this->load->view('system/references/find-agent', $data);

    }


    function page_not_found()

    {

        $data['title'] = '404 | Page Not Found!';

        $data['error_title'] = '404 Page Not Found';

        $data['empty_page'] = true;

        //$data['content_page'] = 'system/pages/404';

        $this->load->view('system/template/home-template', $data);

    }


    function internal_server_error()

    {

        $data['title'] = ' 500 Something Went Wrong';

        $data['error_title'] = ' 500 Something Went Wrong';

        $data['error_sub'] = ' <h3 class="lighter smaller" style="color:#ffffff;">

											But we are working

											<i class="ace-icon fa fa-wrench icon-animated-wrench bigger-125"></i>

											on it!

										</h3>';

        $data['empty_page'] = true;

        //$data['content_page'] = 'system/pages/404';

        $this->load->view('system/template/home-template', $data);

    }


    function fetch_property_agents()

    {

        echo json_encode($this->home_model->fetch_property_agents());

    }


    function fetch_property_companys()

    {

        echo json_encode($this->home_model->fetch_property_companys());

    }


    function load_property_agents_details()

    {

        $EIdNo = trim($this->input->post('EIdNo'));

        $countryID = trim($this->input->post('countryID'));

        $languageID = trim($this->input->post('languageID'));

        $where_EIdNo = '';

        if (!empty($EIdNo)) {

            $where_EIdNo = " AND emp.EIdNo = {$EIdNo}";

        }

        $where_countryID = '';

        if (!empty($countryID)) {

            $where_countryID = " AND emp.Nationality = {$countryID}";

        }

        $where_languageID = '';

        if (!empty($languageID)) {

            $where_languageID = " AND lang.languageID = {$languageID}";

        }

        $data['header'] = $this->db->query("SELECT emp.EIdNo,emp.Ename1,emp.EmpImage,emp.EpTelephone,emp.EpMobile,emp.UserName,emp.EpSkype,emp.EpNationality,emp.EpLanguages,lang.languageID, emp.empDesignation FROM srp_employeesdetails emp LEFT JOIN language lang ON lang.agent_id = emp.EIdNo WHERE isAgent = 1 AND isActive = 1 $where_EIdNo $where_countryID $where_languageID GROUP BY EIdNo")->result_array();

        //echo $this->db->last_query();

        //exit();

        $data['get_specific_agent_active_listing_all'] = $this->home_model->get_specific_agent_active_listing_all();

        //var_dump($data['get_specific_agent_active_listing_all']);

        $this->load->view('admin/ajax/load-agent-body', $data);

    }


    function load_property_companys_details()

    {

        $CNo = trim($this->input->post('CNo'));

        $data['company'] = $this->db->query("SELECT * FROM company_master WHERE company_id =" . $CNo)->result_array();

        $data['agents'] = $this->db->query("SELECT

                            srp_employeesdetails.*,

                            company_master.* 

                        FROM

                            srp_employeesdetails

                            INNER JOIN company_master ON company_master.company_id = srp_employeesdetails.company_id 

                        WHERE

                            srp_employeesdetails.isAgent = 1 

                            AND company_master.company_id =" . $CNo)->result_array();

        $data['company_details'] = $this->db->query("SELECT

                            srp_employeesdetails.*,

                            company_master.* 

                        FROM

                            srp_employeesdetails

                            INNER JOIN company_master ON company_master.company_id = srp_employeesdetails.company_id 

                        WHERE

                            srp_employeesdetails.isCompany = 1 

                            AND company_master.company_id =" . $CNo)->result_array();

        /* echo $this->db->last_query();

         exit();*/

        $this->load->view('admin/ajax/load-company-body', $data);

    }


    function view_single_agent()

    {

        $id = $this->uri->segment(2);

        $data['title'] = 'RB Space | Buy Property | ' . meta_description();

        $data['home'] = false;

        $data['recommended_properties'] = true;

        $data['classic_search'] = false;

        $data['agent_overvw'] = true;

        $data['suggestion'] = false;

        $data['agent_data'] = $this->home_model->get_specific_agent($id);

        $data['l_data'] = $this->home_model->get_specific_agent($id);

        $data['get_specific_agent_transaction'] = $this->home_model->get_specific_agent_transaction($id);

        $data['get_specific_agent_active_listing'] = $this->home_model->get_specific_agent_active_listing($id);

        //var_dump($data['get_specific_agent_transaction']);


        $data['content_page'] = 'system/pages/view_agent_by_id';

        $data['propertyDetail'] = $this->get_agent_property_detail();

        $data['propertyTransaction'] = $this->get_agent_transaction();


        $this->load->view('system/template/home-template', $data);


    }

    function get_agent_property_detail()


    {


        $get = $this->input->get();


        $genGETVariable = '?';


        if (!empty($get)) {


            $i = 0;


            foreach ($get as $key => $val) {


                $genGETVariable .= $i != 0 ? '&' : '';


                $genGETVariable .= $key . '=' . $val;


                $i++;


            }


        }


        $agentID = $this->uri->segment(2);


        $controller_url = 'agentOverview/' . $agentID . '/';


        $data['title'] = 'RB Space | Home Page | ' . meta_description();


        $data['home'] = true;


        $data['recommended_properties'] = false;


        $data['classic_search'] = false;


        $data['suggestedCategoryList'] = $this->home_model->suggestedCategoryList();


        $data['search_suggestion'] = false;


        $data['s_result'] = $this->home_model->search_property_agent(5);


        $data['count'] = $this->home_model->search_property_count_agent();


        $pagination = get_pagination_style3($controller_url, $data['count'], 5);


        $data['pagination'] = $pagination;


        /*



        $data['s_result'] = $this->home_model->search_property();



        $data['count'] = $this->home_model->search_property_count();



        $pagination = get_pagination_style2($controller_url, $data['count']);



        */


        $data['suggestion'] = false;


        $result = $data['content_page'] = $this->load->view('system/pages/search_result_only', $data, true);


        return $result;


    }

    function get_agent_transaction()


    {


        $get = $this->input->get();


        $genGETVariable = '?';


        if (!empty($get)) {


            $i = 0;


            foreach ($get as $key => $val) {


                $genGETVariable .= $i != 0 ? '&' : '';


                $genGETVariable .= $key . '=' . $val;


                $i++;


            }


        }


        $agentID = $this->uri->segment(2);


        $controller_url = 'agentOverview/' . $agentID . '/';


        $data['title'] = 'RB Space | Home Page | ' . meta_description();


        $data['home'] = true;


        $data['recommended_properties'] = false;


        $data['classic_search'] = false;


        $data['suggestedCategoryList'] = $this->home_model->suggestedCategoryList();


        $data['search_suggestion'] = false;


        $data['s_result'] = $this->home_model->search_property_agent(5);


        $data['count'] = $this->home_model->search_property_count_agent();


        $pagination = get_pagination_style3($controller_url, $data['count'], 5);


        $data['pagination'] = $pagination;


        /*



        $data['s_result'] = $this->home_model->search_property();



        $data['count'] = $this->home_model->search_property_count();



        $pagination = get_pagination_style2($controller_url, $data['count']);



        */


        $data['suggestion'] = false;


        $result = $data['content_page'] = $this->load->view('system/pages/search_result_only', $data, true);


        return $result;


    }

    function view_single_company()

    {

        $id = $this->uri->segment(2);

        $data['title'] = 'RB Space | Buy Property | ' . meta_description();

        $data['home'] = false;

        $data['recommended_properties'] = true;

        $data['classic_search'] = true;

        $data['suggestion'] = false;

        $data['agent_data'] = $this->home_model->get_specific_agent($id);

        $data['company_data'] = $this->home_model->get_specific_company($id);

        // $data['agents'] = $this->home_model->get_specific_agents_incompany($id);

        //$data['l_data'] = $this->home_model->get_specific_company($id);


        $data['content_page'] = 'system/pages/view_company_by_id';

        $data['propertyDetail'] = $this->get_agent_property_detail();

        $data['companyDetail'] = $this->get_agents_by_relevent_company();


        $this->load->view('system/template/home-template', $data);


    }

    function get_agents_by_relevent_company()


    {


        $get = $this->input->get();


        $genGETVariable = '?';


        if (!empty($get)) {


            $i = 0;


            foreach ($get as $key => $val) {


                $genGETVariable .= $i != 0 ? '&' : '';


                $genGETVariable .= $key . '=' . $val;


                $i++;


            }


        }


        $agentID = $this->uri->segment(2);


        $controller_url = 'agentOverview/' . $agentID . '/';


        $data['title'] = 'RB Space | Home Page | ' . meta_description();


        $data['home'] = true;


        $data['recommended_properties'] = false;


        $data['classic_search'] = false;


        $data['suggestedCategoryList'] = $this->home_model->suggestedCategoryList();


        $data['search_suggestion'] = false;


        $data['s_result'] = $this->home_model->search_property_agent(5);


        $data['count'] = $this->home_model->search_property_count_agent();


        $pagination = get_pagination_style3($controller_url, $data['count'], 5);


        $data['pagination'] = $pagination;


        /*



        $data['s_result'] = $this->home_model->search_property();



        $data['count'] = $this->home_model->search_property_count();



        $pagination = get_pagination_style2($controller_url, $data['count']);



        */


        $data['suggestion'] = false;


        $result = $data['content_page'] = $this->load->view('system/pages/search_result_only', $data, true);


        return $result;


    }

    function load_agent_email_body()

    {

        $EIdNo = trim($this->input->post('EIdNo'));

        $data['header'] = $this->home_model->get_specific_agent($EIdNo);


        $this->load->view('admin/ajax/load-property-agent-email-body', $data);

    }

    function send_agent_requestDetail_Email()


    {


        $this->form_validation->set_rules('EIdNo', 'Agent ID', 'required');


        $this->form_validation->set_rules('description', 'Your Message', 'required');


        $this->form_validation->set_rules('senderName', 'Sender Name', 'required');


        $this->form_validation->set_rules('senderEmail', 'Sender Email', 'required');


        $this->form_validation->set_rules('senderPhone', 'Sender Phone', 'required');


        if ($this->form_validation->run() == FALSE) {


            echo json_encode(array('e', validation_errors()));


        } else {


            echo json_encode($this->home_model->send_agent_requestDetail_Email());


        }


    }

    function new_project_request_email()


    {


        $this->form_validation->set_rules('name', 'Name', 'required');


        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');


        $this->form_validation->set_rules('mobile', 'Mobile', 'required');


        if ($this->form_validation->run() == FALSE) {


            echo json_encode(array('e', validation_errors()));


        } else {


            echo json_encode($this->home_model->new_project_request_email());


        }


    }

    function update_agentDetail()


    {


        echo json_encode($this->home_model->update_agentDetail());


    }

    function agent_image_upload()


    {


        $this->form_validation->set_rules('EIdNo', 'Agent ID is missing', 'trim|required');


        if ($this->form_validation->run() == FALSE) {


            echo json_encode(array('e', validation_errors()));


        } else {


            echo json_encode($this->home_model->agent_image_upload());


        }


    }

    function company_image_upload()


    {


        $this->form_validation->set_rules('EIdNo', 'Company ID is missing', 'trim|required');


        if ($this->form_validation->run() == FALSE) {


            echo json_encode(array('e', validation_errors()));


        } else {


            echo json_encode($this->home_model->company_image_upload());


        }


    }

    function broker_login()

    {

        $id = $this->uri->segment(2);

        $data['title'] = 'RB Space | Broker Login | ' . meta_description();


        $data['home'] = false;

        $data['recommended_properties'] = false;

        $data['agent_search'] = false;

        $data['classic_search'] = false;

        $data['suggestion'] = false;

        $data['search'] = false;


        $data['content_page'] = 'system/pages/broker_login';

        $this->load->view('system/template/home-template', $data);

    }


    function space()

    {

        $id = $this->uri->segment(2);

        $data['title'] = 'RB Space | Find a Space | List a Space | ' . meta_description();


        $data['home'] = false;

        $data['recommended_properties'] = false;

        $data['agent_search'] = false;

        $data['classic_search'] = false;

        $data['suggestion'] = false;

        $data['search'] = false;


        $data['content_page'] = 'system/pages/space';

        $this->load->view('system/template/home-template', $data);

    }


    function list_space()

    {

        $id = $this->uri->segment(2);

        $data['title'] = 'RB Space | Find a Space | List a Space | ' . meta_description();


        $data['home'] = false;

        $data['recommended_properties'] = false;

        $data['agent_search'] = false;

        $data['classic_search'] = false;

        $data['suggestion'] = false;

        $data['search'] = false;


        $data['content_page'] = 'system/pages/list_space';

        $this->load->view('system/template/home-template', $data);

    }


    function terms_and_conditions()


    {


        $id = $this->uri->segment(2);


        $data['title'] = 'RB Space | Terms and Conditions | ' . meta_description();


        $data['home'] = false;


        $data['recommended_properties'] = false;


        $data['agent_search'] = false;


        $data['classic_search'] = false;


        $data['suggestion'] = false;


        $data['search'] = false;


        $data['content_page'] = 'system/pages/terms_and_conditions';


        $this->load->view('system/template/home-template', $data);


    }


    function privacy_policy()


    {


        $id = $this->uri->segment(2);


        $data['title'] = 'RB Space | Privacy Policy | ' . meta_description();


        $data['home'] = false;


        $data['recommended_properties'] = false;


        $data['agent_search'] = false;


        $data['classic_search'] = false;


        $data['suggestion'] = false;


        $data['search'] = false;


        $data['content_page'] = 'system/pages/privacy_policy';


        $this->load->view('system/template/home-template', $data);


    }


    function about_us()


    {


        $id = $this->uri->segment(2);


        $data['title'] = 'RB Space | About Us | ' . meta_description();


        $data['home'] = false;


        $data['recommended_properties'] = false;


        $data['agent_search'] = false;


        $data['classic_search'] = true;


        $data['suggestion'] = false;


        $data['search'] = false;


        $data['s_result'] = $this->home_model->aboutusList();


        // var_dump( $data['s_result']);


        $data['content_page'] = 'system/pages/about_us';


        $this->load->view('system/template/home-template', $data);


    }


    function new_projects_details()


    {


        $id = $this->uri->segment(2);


        $data['title'] = 'RB Space | New project details | ' . meta_description();


        $data['home'] = false;


        $data['recommended_properties'] = false;


        $data['agent_search'] = false;


        $data['classic_search'] = false;


        $data['suggestion'] = false;


        $data['search'] = false;


        $data['content_page'] = 'system/pages/new_projects_details';


        $this->load->view('system/template/home-template', $data);


    }


    function blog()


    {


        $id = $this->uri->segment(2);


        $data['title'] = 'RB Space | blog | ' . meta_description();


        $data['home'] = false;


        $data['recommended_properties'] = false;


        $data['agent_search'] = false;


        $data['classic_search'] = false;


        $data['suggestion'] = false;


        $data['blog'] = true;


        $data['most_popular_posts'] = $this->article_model->get_most_popular_list();


        $data['latest_posts'] = $this->article_model->get_latest_list();


        $data['all_posts'] = $this->article_model->get_all_list();


        $data['content_page'] = 'system/pages/blog';


        $this->load->view('system/template/home-template', $data);


    }


    function blog_view()


    {


        $id = $this->uri->segment(2);


        $data['title'] = 'RB Space | News | ' . meta_description();


        $data['home'] = false;


        $data['recommended_properties'] = false;


        $data['agent_search'] = false;


        $data['classic_search'] = false;


        $data['suggestion'] = false;


        $data['blog_view'] = true;


        $data['most_popular_posts'] = $this->article_model->get_most_popular_list();


        $data['latest_posts'] = $this->article_model->get_latest_list();


        $data['get_post'] = $this->article_model->get_post($id);


        $data['content_page'] = 'system/pages/blog_view';


        $this->load->view('system/template/home-template', $data);


    }


    function submit_review_data()

    {


        $this->form_validation->set_rules('review_title', 'Enter Review Title', 'trim|required');

        $this->form_validation->set_rules('review_description', 'Add your description', 'trim|required');


        $this->form_validation->set_rules('user_name', 'Your Name', 'trim|required');

        $this->form_validation->set_rules('user_email', 'Your Email', 'trim|required');


        if ($this->form_validation->run() == FALSE) {

            echo json_encode(array('e', validation_errors()));

        } else {


            echo $this->masters_model->submit_review_data();


        }

    }


    function get_property_log()

    {

        echo $this->masters_model->get_property_log();

    }


}

