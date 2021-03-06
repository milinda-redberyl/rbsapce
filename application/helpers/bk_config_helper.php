<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
$newurl = explode("/", $_SERVER['SCRIPT_NAME']);
$actual_link = "$protocol.$_SERVER[HTTP_HOST]/$newurl[1]/images/logo/";
define('UPLOAD_PATH', $_SERVER["DOCUMENT_ROOT"]);
define('UPLOAD_PATH_POS', $_SERVER["DOCUMENT_ROOT"] . '/amlak/');
define('LOGO', 'erp-logo.png');
define('SYS_NAME', 'SPUR');
define("mPDFImage", $actual_link);
define("favicon", 'favicon.png');
define('STATIC_LINK', "$protocol $_SERVER[HTTP_HOST]");
define('PROPERTY_IMAGE_LINK', STATIC_LINK . base_url() . 'uploads/');
//define('WEB_URL', 'http://188.135.48.165/amlak/index.php/');
define('WEB_URL', 'http://localhost/amlak/index.php/');


if (!function_exists('sys_name')) {
    function sys_name()
    {
        return 'Bait';
    }
}

if (!function_exists('isAgent')) {
    function isAgent()
    {
        $CI =& get_instance();
        if ($CI->session->userdata('isAgent') == 1) {
            return true;
        } else {
            return false;
        }
    }
}


if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        $CI =& get_instance();
        if ($CI->session->userdata('isAdmin') == 1) {
            return true;
        } else {
            return false;
        }
    }
}


if (!function_exists('isCompany')) {
    function isCompany()
    {
        $CI =& get_instance();
        if ($CI->session->userdata('isCompany') == 1) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('meta_description')) {
    function meta_description()
    {
        return 'Discover Your Dream Property | Sri Lanka leading Real estate agents | Property in Sri Lanka | Rent House in Sri Lanka | Buy house in Sri Lanka';
    }
}


if (!function_exists('required')) {
    function required()
    {
        return '<span class="red"> * </span>';
    }
}


if (!function_exists('table_class_pos')) {
    function table_class_pos($id = null)
    {
        switch ($id) {
            case 1:
                $output = 'table table-bordered table-striped table-hover table-condensed';

                break;
            case 2:
                $output = 'table table-bordered table-striped table-hover';
                break;
            case 3:
                $output = 'table table-bordered';
                break;
            case 4:
                $output = 'table table-striped table-hover table-condensed';
                break;
            case 5:
                $output = 'table table-bordered table-hover table-condensed';
                break;
            default:
                $output = 'table table-bordered table-striped table-condensed';
        }

        return $output;
    }
}


if (!function_exists('load_js_dataTable')) {
    function load_lib_dataTable()
    {
        $js[] = '<link rel="stylesheet" type="text/css" href="' . base_url('assets/datatables/dataTables.bootstrap.css') . '"/>';
        $js[] = '<link rel="stylesheet" type="text/css" href="' . base_url('assets/datatables/fixedColumns.dataTables.min.css') . '"/>';
        $js[] = '<link rel="stylesheet" type="text/css" href="' . base_url('assets/datatables/keyTable.dataTables.min.css') . '"/>';
        $js[] = '<link rel="stylesheet" type="text/css" href="' . base_url('assets/datatables/select.dataTables.min.css') . '"/>';
        $js[] = '<script type="text/javascript" src="' . base_url('assets/datatables/jquery.dataTables.min.js') . '"></script>';
        $js[] = '<script type="text/javascript" src="' . base_url('assets/datatables/dataTables.bootstrap.min.js') . '"></script>';
        $js[] = '<script type="text/javascript" src="' . base_url('assets/datatables/dataTables.fixedColumns.min.js') . '"></script>';
        $js[] = '<script type="text/javascript" src="' . base_url('assets/datatables/dataTables.select.js') . '"></script>';

        $output = '';
        foreach ($js as $val) {
            $output .= $val . "\n";
        }
        return $output;
    }
}

if (!function_exists('get_dt_col_property')) {
    function get_dt_col_property($id)
    {
        $btn = '<span class="pull-right"><span><a onclick="load_property(' . $id . ')"><i class="ace-icon fa fa-pencil bigger-130"></i></a></span> &nbsp;&nbsp; | &nbsp;&nbsp; <span><a onclick="load_property(' . $id . ')" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></span></span>';

        return $btn;
    }
}

if (!function_exists('get_dt_col_aboutus')) {
    function get_dt_col_aboutus($id)
    {
        $btn = '<span class="pull-right"><span><a onclick="edit_aboutus(' . $id . ')"><i class="ace-icon fa fa-pencil bigger-130"></i></a></span> &nbsp;&nbsp; | &nbsp;&nbsp; <span><a onclick="edit_aboutus(' . $id . ')" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a></span></span>';

        return $btn;
    }
}

if (!function_exists('load_colorcode_status')) {
    function load_colorcode_status($approval)
    {
        $status = '';
        if ($approval == 1) {
            $status .= '<span class="label label-sm label-success"><i class="fa fa-check"></i>Active</span>';
        } else {
            $status .= '<span class="label label-sm label-danger"><i class="fa fa-times"></i>in-Active</span>';
        }
        return $status;
    }
}

if (!function_exists('drop_category_type')) {
    function drop_category_type($category = 'Select Category')
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('category_types');
        $CI->db->where('status', '1');
        $CI->db->order_by('category_id', 'asc');
        $result = $CI->db->get()->result_array();

        $output = array('' => $category);
        if (!empty($result)) {
            foreach ($result as $row) {
                $output[trim($row['category_id'])] = trim($row['category_name']);
            }
        }

        return $output;
    }
}


if (!function_exists('drop_property_type')) {
    function drop_property_type()
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('property_types');
        $CI->db->where('status', '1');
        $CI->db->order_by('property_type_name', 'asc');
        $result = $CI->db->get()->result_array();

        $output = array('' => 'Select Property Type');
        if (!empty($result)) {
            foreach ($result as $row) {
                $output[trim($row['property_type_id'])] = trim($row['property_type_name']);
            }
        }
        return $output;
    }
}

if (!function_exists('drop_furniture_type')) {
    function drop_furniture_type()
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('furniture_types');
        $CI->db->where('status', '1');
        $CI->db->order_by('furniture_name', 'asc');
        $result = $CI->db->get()->result_array();

        $output = array('' => 'All Furnishings');
        if (!empty($result)) {
            foreach ($result as $row) {
                $output[trim($row['furniture_type_id'])] = trim($row['furniture_name']);
            }
        }

        return $output;
    }
}

if (!function_exists('generate_image_priority')) {
    function generate_image_priority($propertyID)
    {
        $CI =& get_instance();
        $CI->db->select('priority');
        $CI->db->from('property_images');
        $CI->db->where('property_id', $propertyID);
        $CI->db->order_by('priority', 'desc');
        $priority = $CI->db->get()->row('priority');
        if ($priority) {
            return $priority + 1;
        } else {
            return 1;
        }
    }
}


if (!function_exists('current_userID')) {
    function current_userID()
    {
        $CI =& get_instance();
        $user = $CI->session->userdata('empID');
        $userID = !empty($user) ? $user : NULL;

        return trim($userID);
    }
}

if (!function_exists('current_companyID')) {
    function current_companyID()
    {
        $CI =& get_instance();
        $user = $CI->session->userdata('companyID');
        $userID = !empty($user) ? $user : NULL;

        return trim($userID);
    }
}


if (!function_exists('get_agent_company')) {
    function get_agent_company($empID)
    {

        $CI =& get_instance();
        $CI->db->select('company_id');
        $CI->db->from('srp_employeesdetails');
        $CI->db->where('EIdNo', $empID);
        $company_id = $CI->db->get()->row('company_id');

        return $company_id;
    }
}


if (!function_exists('current_user')) {
    function current_user()
    {
        $CI =& get_instance();
        $userID = isset($CI->common_data['current_user']) ? $CI->common_data['current_user'] : NULL;

        return trim($userID);
    }
}

if (!function_exists('format_date_mysql_datetime')) {
    function format_date_mysql_datetime($date = NULL)
    {
        if (isset($date)) {
            if (!empty($date)) {
                return date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $date)));
            }
        } else {
            return date('Y-m-d H:i:s', time());
        }
    }
}


if (!function_exists('current_pc')) {
    function current_pc()
    {
        return trim(gethostbyaddr($_SERVER['REMOTE_ADDR']));
    }
}

if (!function_exists('load_colorcode_role')) {
    function load_colorcode_role($isSystemAdmin, $isAgent = 0, $isCompany = 0)
    {
        $status = '';
        if ($isSystemAdmin == 1) {
            $status .= '<span class="label label-sm label-danger"><i class="fa fa fa-cog"></i> Admin</span></td>';
        } else if ($isCompany == 1) {
            $status .= '<span class="label label-sm label-success"><i class="fa fa fa-building"></i> Company</span></td>';
        } else {
            $status .= '<span class="label label-sm label-info"><i class="fa fa fa-user"></i> Agent</span></td>';
        }
        return $status;
    }
}

if (!function_exists('drop_price_list')) {
    function drop_price_list($type = 'MIN')
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('price_master');
        $CI->db->where('priceType', $type);
        $CI->db->order_by('priceID', 'asc');
        $result = $CI->db->get()->result_array();

        $output = array('' => ucfirst(strtolower($type)) . '. price');
        if (!empty($result)) {
            foreach ($result as $row) {
                $output[trim($row['price'])] = trim(number_format($row['price'])) . ' ' . $row['currency'] . '/year';
            }
        }

        return $output;
    }
}


if (!function_exists('drop_area_master')) {
    function drop_area_master($type = 'MIN')
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('area_master');
        $CI->db->where('areaType', $type);
        $CI->db->order_by('areaID', 'asc');
        $result = $CI->db->get()->result_array();

        $output = array('' => ucfirst(strtolower($type)) . '. area');
        if (!empty($result)) {
            foreach ($result as $row) {
                $output[trim($row['area'])] = trim(number_format($row['area'])) . ' ' . $row['unit'];
            }
        }

        return $output;
    }
}


if (!function_exists('drop_bed_type')) {
    function drop_bed_type($type = 'MIN', $flag = 0)
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('bed_types');
        $CI->db->where('status', '1');
        $CI->db->order_by('bed_type_id', 'asc');
        $result = $CI->db->get()->result_array();

        if ($flag == 0) {
            $output = array('' => ucfirst(strtolower($type)) . '. bed');
        } else {
            $output = array('' => $type);
        }
        if (!empty($result)) {
            foreach ($result as $row) {
                $output[trim($row['bed_type_id'])] = trim($row['bed_type_name']);
            }
        }

        return $output;
    }
}

if (!function_exists('get_pagination')) {
    function get_pagination($url = '#', $total = 0, $pages = 10)
    {
        $CI =& get_instance();
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';


        $config['prev_link'] = '<i class="fa fa-chevron-left"></i> Prev ';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';


        $config['next_link'] = ' <i class="fa fa-chevron-right" ></i> Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['base_url'] = site_url($url . '/');// . $genGETVariable; // search
        $config['total_rows'] = $total;
        $config['per_page'] = $pages;
        $CI->pagination->initialize($config);
        return $CI->pagination->create_links();

    }
}

if (!function_exists('get_pagination_style2')) {
    function get_pagination_style2($url = '#', $total = 0, $pages = 10)
    {
        $CI =& get_instance();
        $config['reuse_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['full_tag_open'] = "<div class='map-pagenation'><ul>";
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';


        $config['prev_link'] = '<i class="fa fa-chevron-left"></i> Prev ';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';


        $config['next_link'] = ' <i class="fa fa-chevron-right" ></i> Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['base_url'] = site_url($url . '/');// . $genGETVariable; // search
        $config['total_rows'] = $total;
        $config['per_page'] = $pages;
        $CI->pagination->initialize($config);
        return $CI->pagination->create_links();

    }
}


if (!function_exists('get_pagination_style3')) {
    function get_pagination_style3($url = '#', $total = 0, $pages = 10)
    {
        $CI =& get_instance();
        $config['reuse_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['full_tag_open'] = "<div class='map-pagenation'><ul>";
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';


        $config['prev_link'] = '<i class="fa fa-chevron-left"></i> Prev ';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';


        $config['next_link'] = ' <i class="fa fa-chevron-right" ></i> Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['base_url'] = site_url($url . '/');// . $genGETVariable; // search
        $config['total_rows'] = $total;
        $config['per_page'] = $pages;
        $CI->pagination->initialize($config);
        return $CI->pagination->create_links();

    }
}

if (!function_exists('get_suggestion')) {
    function get_suggestion($ct = '')
    {
        $CI =& get_instance();
        $qTmp = '';
        if (!empty($ct)) {
            $qTmp = ' AND p.category_type_id= ' . $ct;
        }
        $q = "SELECT

                    ct.category_name as category_nameas, 
                    pt.property_type_name as property_type_name,
                    IFNULL(pi.image_link,'no-property.jpg') as imageLink,
                    pi.propertyID,
                    IFNULL(a.EmpImage,'default-agent.jpg') as agentImageLink,
                    bt.bed_type_name,
                    p.* 
                    FROM
                    property AS p
                    LEFT JOIN ( SELECT property_id as propertyID, image_link FROM property_images GROUP BY property_id  ) pi ON pi.propertyID = p.property_id 
                        LEFT JOIN category_types ct ON ct.category_id = p.category_type_id
                        LEFT JOIN property_types pt ON pt.property_type_id = p.property_type_id
                        LEFT JOIN srp_employeesdetails a ON a.EIdNo=  p.agent_id
                        LEFT JOIN bed_types bt ON bt.bed_type_id =  p.bed_type_id
                        WHERE pi.image_link <> 'property.jpg' " . $qTmp . "
                        ORDER BY
                    rand( ) LIMIT 2";

        $output = $CI->db->query($q)->result_array();
        return $output;
    }
}


if (!function_exists('get_recommended')) {
    function get_recommended($ct = '', $pt = '')
    {
        $CI =& get_instance();
        $qTmp = '';
        if (!empty($ct) && !empty($pt)) {
            $qTmp = 'WHERE p.category_type_id= ' . $ct . ' AND p.property_type_id = ' . $ct;
        } else if (!empty($ct)) {
            $qTmp = 'WHERE p.category_type_id= ' . $ct;
        } else if (!empty($pt)) {
            $qTmp = 'WHERE p.property_type_id = ' . $ct;

        }
        $q = "SELECT

                    ct.category_name as category_nameas, 
                    pt.property_type_name as property_type_name,
                    IFNULL(pi.image_link,'no-property.jpg') as imageLink,
                    IFNULL(a.EmpImage,'default-agent.jpg') as agentImageLink,
                    pi.propertyID,
                    bt.bed_type_name,
                    p.* 
                    FROM
                    property AS p
                    LEFT JOIN ( SELECT property_id as propertyID, image_link FROM property_images GROUP BY property_id  ) pi ON pi.propertyID = p.property_id 
                        LEFT JOIN category_types ct ON ct.category_id = p.category_type_id
                        LEFT JOIN property_types pt ON pt.property_type_id = p.property_type_id
                        LEFT JOIN srp_employeesdetails a ON a.EIdNo=  p.agent_id
                        LEFT JOIN bed_types bt ON bt.bed_type_id =  p.bed_type_id
                        " . $qTmp . "
                        ORDER BY
                    rand( ) LIMIT 5";

        $output = $CI->db->query($q)->result_array();

        return $output;
    }
}


if (!function_exists('get_propertyImage')) {
    function get_propertyImage($id)
    {
        $CI =& get_instance();
        $CI->db->select('image_link');
        $CI->db->from('property_images');
        $CI->db->where('property_id', $id);
        $image_link = $CI->db->get()->row('image_link');
        if (!empty($image_link)) {
            $img = base_url('uploads/' . $image_link);
        } else {
            $img = base_url('uploads/no-property.jpg');
        }
        return $img;
    }
}

if (!function_exists('get_propertyTypeName')) {
    function get_propertyTypeName($id)
    {
        $CI =& get_instance();
        $CI->db->select('property_type_name');
        $CI->db->from('property_types');
        $CI->db->where('property_type_id', $id);
        $propName = $CI->db->get()->row('property_type_name');
        //var_dump($city_name);
        return $propName;
    }
}

if (!function_exists('get_BedTypeName')) {
    function get_BedTypeName($id)
    {
        $CI =& get_instance();
        $CI->db->select('bed_type_name');
        $CI->db->from('bed_types');
        $CI->db->where('bed_type_id', $id);
        $BedName = $CI->db->get()->row('bed_type_name');
        //var_dump($city_name);
        return $BedName;
    }
}

if (!function_exists('get_cityName')) {
    function get_cityName($cid)
    {
        $CI =& get_instance();
        $CI->db->select('city_name');
        $CI->db->from('city');
        $CI->db->where('city_id', $cid);
        $city_name = $CI->db->get()->row('city_name');
        //var_dump($city_name);
        return $city_name;
    }
}

if (!function_exists('get_all_propertyImage')) {
    function get_all_propertyImage()
    {
        $CI =& get_instance();
        $id = $CI->uri->segment(2);
        $CI->db->select('image_link');
        $CI->db->from('property_images');
        $CI->db->where('property_id', $id);
        $image_link = $CI->db->get()->result_array();
        $noImage = array();
        if (empty($image_link)) {
            $noImage[0]['image_link'] = 'no-property.jpg';
            $image_link = $noImage;
        }
        return $image_link;
    }
}


if (!function_exists('newprojectPagination')) {
    function newprojectPagination()
    {
        $CI =& get_instance();
        $CI->load->library("pagination");

        $data_pagination = $CI->input->post('data_pagination');
        $per_page = 5;
        $count = $CI->db->query("SELECT COUNT(*) AS propCount FROM property")->row('propCount');
        $isFiltered = 0;
        $location_filter = '';
        $city_id = $CI->input->post('city_id');
        $type = $CI->input->post('type');
        $cat_type = $CI->input->post('cat_type');
        $bed = $CI->input->post('bed');
        $minArea = $CI->input->post('minArea');
        $maxArea = $CI->input->post('maxArea');

        if ($type == 1) {
            if ($city_id != null) {
                //$location_filter = 'WHERE city_id =' . $city_id;
                $isFiltered = 1;
            }
        } else if ($type == 2) {
            /* $location_filter = ' WHERE `latitude` > ' . $CI->input->post('sw_lat') . '
 AND `latitude` < ' . $CI->input->post('ne_lat') . '
 AND `longitude` > ' . $CI->input->post('sw_long') . '
 AND `longitude` < ' . $CI->input->post('ne_long');
             if ($city_id) {
                 $location_filter .= ' AND city_id =' . $city_id;
             }*/
            $isFiltered = 1;
        }
        $countFilter = 0;

        if ($isFiltered == 1) {
            //$countFilterWhere = $location_filter;
            $CI->db->from('property p');
            $CI->db->join('category_types ct', 'ct.category_id = p.category_type_id', 'LEFT');
            $CI->db->join('property_types pt', 'pt.property_type_id = p.property_type_id', 'LEFT');
            if ($type == 1) {
                if ($city_id != null) {
                    $CI->db->where('city_id', $city_id);
                }
            } else if ($type == 2) {
                $CI->db->where('latitude >', $CI->input->post('sw_lat'));
                $CI->db->where('latitude <', $CI->input->post('ne_lat'));
                $CI->db->where('longitude >', $CI->input->post('sw_long'));
                $CI->db->where('longitude <', $CI->input->post('ne_long'));
                if ($city_id) {
                    $CI->db->where('city_id', $city_id);
                }
            }

            if (isset($cat_type) && !empty($cat_type)) {
                $CI->db->where('p.category_type_id', $cat_type);
            }

            if (isset($bed) && !empty($bed)) {
                $CI->db->where('p.bed_type_id', $bed);
            }

            /** Area */
            if (!empty($minArea) && !empty($maxArea)) {
                $CI->db->where('p.area >=', $minArea);
                $CI->db->where('p.area <=', $maxArea);
            } else if ($minArea) {
                $CI->db->where('p.area >=', $minArea);
            } else if ($maxArea) {
                $CI->db->where('p.area <=', $maxArea);
            }

            $countFilter = $CI->db->count_all_results();
        }

        $config = array();
        $config["base_url"] = "#ajax-list";
        $config["total_rows"] = ($isFiltered == 1) ? $countFilter : $count;
        $config["per_page"] = $per_page;
        $config["data_page_attr"] = 'data-ajax-pagination';
        $config["uri_segment"] = 3;
        $CI->pagination->initialize($config);
        $page = (!empty($data_pagination)) ? (($data_pagination - 1) * $per_page) : 0;
        $propertyData = load_property_data($page, $per_page);
        $dataCount = $propertyData['dataCount'];

        $data["propCount"] = $count;
        $data["property_list"] = $propertyData['property_list'];
        $data["pagination"] = $CI->pagination->create_ajax_links();
        $data["per_page"] = $per_page;
        $data["dataCount"] = $dataCount;
        $data["displayCount"] = $countFilter;
        $data["property_data"] = $propertyData['property_data'];
        $thisPageStartNumber = ($page + 1);
        $thisPageEndNumber = $page + $dataCount;

        if ($isFiltered == 1) {
            $data["filterDisplay"] = "Showing {$thisPageStartNumber} to {$thisPageEndNumber} of {$countFilter} entries (filtered from {$count} total entries)";
        } else {
            $data["filterDisplay"] = "Showing {$thisPageStartNumber} to {$thisPageEndNumber} of {$count} entries";
        }

        return $data;
    }
}


if (!function_exists('load_property_data')) {
    function load_property_data($page, $per_page)
    {
        $location_filter = '';

        $CI =& get_instance();
        $city_id = $CI->input->post('city_id');
        $type = $CI->input->post('type');
        $cat_type = $CI->input->post('cat_type');
        $bed = $CI->input->post('bed');
        $minArea = $CI->input->post('minArea');
        $maxArea = $CI->input->post('maxArea');

        $sort = $CI->input->post('sort');
        $category_type_id = $CI->input->post('category_type_id');

        /*if ($type == 1) {
            if ($city_id != null) {
                $location_filter = 'WHERE city_id =' . $city_id;
            }
        } else if ($type == 2) {
            $location_filter = 'WHERE latitude > `' . $CI->input->post('sw_lat') . '`
AND latitude < `' . $CI->input->post('ne_lat') . '`
AND longitude > ' . $CI->input->post('sw_long') . '
AND longitude < ' . $CI->input->post('ne_long');
            if ($city_id) {
                $location_filter .= ' AND city_id =' . $city_id;
            }
        }*/

        $CI->db->select('ct.category_name AS category_nameas,
                    pt.property_type_name AS property_type_name,
                    IFNULL(pi.image_link,"no-property.jpg") as imageLink, p.* ');
        $CI->db->from('property AS p');
        $CI->db->join('category_types ct', 'ct.category_id = p.category_type_id', 'LEFT');
        $CI->db->join('property_types pt', 'pt.property_type_id = p.property_type_id', 'LEFT');
        $CI->db->join('(SELECT property_id as propertyID, image_link FROM property_images GROUP BY property_id) pi', 'pi.propertyID = p.property_id ', 'LEFT');
        if ($type == 1) {
            if ($city_id != null) {
                $CI->db->where('city_id', $city_id);
            }
        } else if ($type == 2) {
            $CI->db->where('latitude >', $CI->input->post('sw_lat'));
            $CI->db->where('latitude <', $CI->input->post('ne_lat'));
            $CI->db->where('longitude >', $CI->input->post('sw_long'));
            $CI->db->where('longitude <', $CI->input->post('ne_long'));
            if ($city_id) {
                $CI->db->where('city_id', $city_id);
            }
        }

        if (isset($cat_type) && !empty($cat_type)) {
            $CI->db->where('p.category_type_id', $cat_type);
        }

        if (isset($bed) && !empty($bed)) {
            $CI->db->where('p.bed_type_id', $bed);
        }

        /** Area */
        if (!empty($minArea) && !empty($maxArea)) {
            $CI->db->where('p.area >=', $minArea);
            $CI->db->where('p.area <=', $maxArea);
        } else if ($minArea) {
            $CI->db->where('p.area >=', $minArea);
        } else if ($maxArea) {
            $CI->db->where('p.area <=', $maxArea);
        }

        /* Property type */
        if (isset($category_type_id)) {
            $CI->db->where('p.category_type_id', $category_type_id);
        }


        $CI->db->limit($per_page, $page);

        /* Sort By : */
        if (isset($sort)) {
            if ($sort == "bedrooms_least") {
                $CI->db->order_by('p.bed_type_id', 'ASC');
            }
            if ($sort == "bedrooms_most") {
                $CI->db->order_by('p.bed_type_id', 'DESC');
            }
            if ($sort == "area_min") {
                $CI->db->order_by('p.area', 'ASC');
            }
            if ($sort == "area_max") {
                $CI->db->order_by('p.area', 'DESC');
            }
            if ($sort == "property_price_low") {
                $CI->db->order_by('p.property_price', 'ASC');
            }
            if ($sort == "property_price_high") {
                $CI->db->order_by('p.property_price', 'DESC');
            }
        }

        //echo $CI->db->last_query();

        $data = $CI->db->get()->result_array();
        //echo $CI->db->last_query();
        /*$data = $CI->db->query("SELECT ct.category_name as category_nameas,
                    pt.property_type_name as property_type_name,
                    IFNULL(pi.image_link,'no-property.jpg') as imageLink,
                    property.*
                    FROM property LEFT JOIN ( SELECT property_id as propertyID, image_link FROM property_images GROUP BY property_id  ) pi ON pi.propertyID = property.property_id 
                        LEFT JOIN category_types ct ON ct.category_id = property.category_type_id
                        LEFT JOIN property_types pt ON pt.property_type_id = property.property_type_id $location_filter LIMIT {$page}, {$per_page}")->result_array();*/
        //echo $CI->db->last_query();

        $property_list = $data;
        $returnData = '';
        //print_r($property_list);
        if (!empty($property_list)) {

            foreach ($property_list as $key => $propData) {
                $image = get_propertyImage($propData['property_id']);
                //$p_url = base_url() . 'project/' . $propData['property_id'];
                //site_url('overview/' . $item['property_id'])
                $p_url = site_url('project/' . $propData['property_id']);
                $city_id = $propData['city_id'];

                $city_q = $CI->db->query("SELECT * FROM city WHERE city_id =" . $city_id);
                $city = $city_q->result_array();
                $city_name = "";
                if (!empty($city)) {
                    $city_name = $city[0]['city_name'];
                }

                $companyLogo = base_url() . "uploads/company_image/default-company_image.jpg";

                if ($propData['agent_id']) {
                    $company_details_q = "SELECT
                            srp_employeesdetails.*,
                            company_master.* 
                        FROM
                            srp_employeesdetails
                            INNER JOIN company_master ON srp_employeesdetails.company_id = company_master.company_id 
                        WHERE
                            srp_employeesdetails.isAgent = " . $propData['agent_id'] . " 
                            AND srp_employeesdetails.EIdNo = 2";

                    $company_details = $CI->db->query($company_details_q)->result_array();
                    if (!empty($company_details)) {
                        if ($company_details[0]['companyLogo'] != "") {
                            $companyLogo = base_url() . 'uploads/company_image/' . $company_details[0]['companyLogo'];
                        }
                    }
                }

                $returnData .= '<div class="prpt-hor-cover" data-lat="' . $propData['latitude'] . '" data-long="' . $propData['longitude'] . '">
                        <div class="media">                        
                        <div class="col-md-5 col-sm-12 col-xs-12 no-padding">
                            <div class="media-left">
                                <a href="' . $p_url . '">
                                <div class="prpt-hor-img">
                                    <img src="' . $image . '" class="img-responsive pull-left"  alt="Image">
                                    <span class="rent"><!--Rent-->' . $propData['category_nameas'] . '</span>
                                </div>
                                </a>
                            </div>
                        </div>
                         <div class="col-md-7 col-sm-12 col-xs-12">
                           <div class="media-body1">
                                <div class="prpt-hor-dtls">
                                    <a href="' . $p_url . '">
                                        <h3 class="title"> ' . $propData['property_name'] . ' <!--(Residential) --></h3>
                                    </a>
                                    <h4 class="location">' . $city_name . '</h4>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <h4 class="rent">' . number_format($propData['property_price']) . ' OMR /
                                                Month</h4>
                                            <ul>
                                                <li>' . $propData['bed_type_id'] . ' <i class="fa fa-bed" aria-hidden="true"></i></li>
                                                <li>1 <i class="fa fa-shower" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-5">
                                            <div class="builder-logo">
                                            <img src="' . $companyLogo . '" width="50" class="img-responsive" alt="Image"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col - md - 12 col - sm - 12 col - xs - 12 no - padding - xs">
                                        <div class="btn - conts">
                                                 <a class="btn btn-contact" style="padding: 6px 6px;" 
                                               onclick="showTelNo(' . $propData['property_id'] . ',' . $propData['telephone_number'] . ')">
                                                <i class="fa fa-phone" aria-hidden="true"></i> <span
                                                    id="telNo_' . $propData['property_id'] . '">Call</span>
                                                     </a>

                                                 <a class="btn btn-contact"  style="padding: 6px 6px;" onclick="send_property_email(' . $propData['property_id'] . ')"><i class="fa fa-envelope" aria-hidden="true"></i>
                                                Email</a>

                                            <a class="btn btn-contact"  style="padding: 6px 6px;"><i class="fa fa-heart" aria-hidden="true"></i>
                                                Save</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        </div>
                    </div>';
            }
        } else {
            $returnData .= '<div class="text - center"><img src="' . base_url("assets/system/images/empty_map.png") . '" class="img - responsive" style="margin: 0 auto;">
<h4>NO NEW PROJECTS FOUND
IN THIS AREA</h4>
<button class="btn btn - primary" onclick="resetMap()"><span>RESET MAP</span></button></div>';
        }
        return [
            'dataCount' => count($property_list),
            'property_list' => $returnData,
            'property_data' => $property_list,
        ];
    }
}


if (!function_exists('get_active_cities')) {
    function get_active_cities()
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('city');
        $CI->db->where('status', 1);
        $city = $CI->db->get()->result_array();
        $dataArr = array();
        if (!empty($city)) {
            foreach ($city as $val) {
                $dataArr[] = array('value' => $val['city_name'], 'data' => $val["city_id"], 'longitude' => $val['longitude'], 'latitude' => $val['latitude']);
            }
        }
        return $dataArr;
    }
}


if (!function_exists('drop_getCity')) {
    function drop_getCity()
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('city');
        $CI->db->where('status', '1');
        $CI->db->order_by('city_name', 'asc');
        $result = $CI->db->get()->result_array();

        $output = array('' => 'Please Select');
        if (!empty($result)) {
            foreach ($result as $row) {
                $output[trim($row['city_id'])] = trim($row['city_name']);
            }
        }
        return $output;
    }
}


if (!function_exists('drop_getBedType')) {
    function drop_getBedType()
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('bed_types');
        $CI->db->where('status', '1');
        $CI->db->order_by('bed_type_id', 'asc');
        $result = $CI->db->get()->result_array();

        $output = array('' => 'Select Bed Type');
        if (!empty($result)) {
            foreach ($result as $row) {
                $output[trim($row['bed_type_id'])] = trim($row['bed_type_name']);
            }
        }
        return $output;
    }
}

if (!function_exists('drop_getBathroom')) {
    function drop_getBathroom()
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('bathroom_types');
        $CI->db->where('status', '1');
        $CI->db->order_by('bathroom_type_id', 'asc');
        $result = $CI->db->get()->result_array();

        $output = array('' => 'Select Bathroom Count');
        if (!empty($result)) {
            foreach ($result as $row) {
                $output[trim($row['bathroom_type_id'])] = trim($row['bathroom_count']);
            }
        }
        return $output;
    }
}

if (!function_exists('drop_allAgent')) {
    function drop_allAgent()
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('srp_employeesdetails');
        $CI->db->where('isAgent', '1');
        $CI->db->where('isActive', '1');
        if (isCompany()) {
            $CI->db->where('company_id', current_userID());
        }
        $CI->db->order_by('Ename1', 'asc');
        $result = $CI->db->get()->result_array();

        //echo $CI->db->last_query();
        $output = array('' => 'Select Agent');
        if (!empty($result)) {
            foreach ($result as $row) {
                $ename2 = !empty($row['Ename2']) ? ' (' . $row['Ename2'] . ')' : '';
                $output[trim($row['EIdNo'])] = trim($row['Ename1']) . $ename2;
            }
        }
        return $output;
    }
}


if (!function_exists('drop_country')) {
    function drop_country()
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('country');
        $CI->db->where('status', '1');
        $CI->db->order_by('country_name', 'asc');
        $result = $CI->db->get()->result_array();

        $output = array('' => 'Please Select');
        if (!empty($result)) {
            foreach ($result as $row) {
                $output[trim($row['country_id'])] = trim($row['country_name']);
            }
        }
        return $output;
    }
}

if (!function_exists('all_country')) {
    function all_country()
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('country');
        $CI->db->where('status', '1');
        $CI->db->order_by('country_name', 'asc');
        return $CI->db->get()->result_array();
    }
}


if (!function_exists('drop_language_master')) {
    function drop_language_master()
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('language_master');
        $CI->db->where('status', 1);
        $CI->db->order_by('languageName', 'asc');
        $result = $CI->db->get()->result_array();

        $output = array('' => 'Select Language');
        if (!empty($result)) {
            foreach ($result as $row) {
                $output[trim($row['languageID'])] = trim($row['languageName']);
            }
        }

        return $output;
    }
}

if (!function_exists('all_language_master')) {
    function all_language_master()
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('language_master');
        $CI->db->where('status', 1);
        $CI->db->order_by('languageName', 'asc');
        return $CI->db->get()->result_array();
    }
}

if (!function_exists('get_topAgentList')) {
    function get_topAgentList()
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('srp_employeesdetails');
        $CI->db->where('isAgent', 1);
        $CI->db->where('isActive', 1);
        $CI->db->order_by('EIdNo', 'asc');
        $CI->db->limit('6');
        $result = $CI->db->get()->result_array();
        return $result;
    }
}

if (!function_exists('get_topCompanies')) {
    function get_topCompanies()
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('srp_employeesdetails');
        $CI->db->join('company_master', 'company_master.company_id = srp_employeesdetails.company_id');
        $CI->db->where('srp_employeesdetails.isCompany', 1);
        $CI->db->where('srp_employeesdetails.isActive', 1);
        $CI->db->order_by('srp_employeesdetails.EIdNo', 'asc');
        //$CI->db->limit('9');
        $result = $CI->db->get()->result_array();
        return $result;
    }
}

if (!function_exists('get_all_propertyAmenties')) {
    function get_all_propertyAmenties()
    {
        $CI =& get_instance();
        $id = $CI->uri->segment(2);
        $CI->db->select('amt.amenities_detail_id,ra.amenity_name');
        $CI->db->from('amenities amt');
        $CI->db->join('room_amenities ra', 'amt.amenity_id = ra.amenity_id');
        $CI->db->where('amt.property_id', $id);
        return $CI->db->get()->result_array();
    }
}

if (!function_exists('category_count')) {
    function category_count($property_type_id)
    {
        $CI =& get_instance();
        $CI->db->select('ct.category_name AS category_nameas,
                    pt.property_type_name AS property_type_name,
                    "property . jpg"  AS imageLink, a.EmpImage as agentImageLink, p.* ');
        $CI->db->from('property AS p');
        $CI->db->join('category_types ct', 'ct.category_id = p.category_type_id', 'LEFT');
        $CI->db->join('property_types pt', 'pt.property_type_id = p.property_type_id', 'LEFT');
        $CI->db->join('srp_employeesdetails a', 'a.EIdNo=  p.agent_id', 'LEFT');

        $CI->db->where('p.property_type_id', $property_type_id);

        $ct = $CI->input->get('ct');
        if (isset($ct) && !empty($ct)) {
            $CI->db->where('p.category_type_id', $ct);
        }

        $cty = $CI->input->get('cty');
        if (isset($cty) && !empty($cty)) {
            $CI->db->where('p.city_id', $cty);
        }


        $ft = $CI->input->get('ft');
        if (isset($ft) && !empty($ft)) {
            $CI->db->where('p.furniture_type_id', $ft);
        }

        /** Price */
        $pmi = $CI->input->get('pmi');
        $pmx = $CI->input->get('pmx');

        if (!empty($pmi) && !empty($pmx)) {
            $CI->db->where('p.property_price >=', $pmi);
            $CI->db->where('p.property_price <=', $pmx);
        } else if (!empty($pmi)) {
            $CI->db->where('p.property_price >=', $pmi);
        } else if (!empty($pmx)) {
            $CI->db->where('p.property_price <=', $pmx);
        }
        /**  end of Price */

        /** Area  */
        $ami = $CI->input->get('ami');
        $amx = $CI->input->get('amx');

        if (!empty($ami) && !empty($amx)) {
            $CI->db->where('p.area >=', $ami);
            $CI->db->where('p.area <=', $amx);
        } else if (!empty($ami)) {
            $CI->db->where('p.area >=', $ami);
        } else if (!empty($amx)) {
            $CI->db->where('p.area <=', $amx);
        }
        /**  end of Area */


        /** Bed Room  */
        $btmn = $CI->input->get('btmn');
        $btmx = $CI->input->get('btmx');

        if (!empty($btmn) && !empty($btmx)) {
            $CI->db->where('p.area >=', $btmn);
            $CI->db->where('p.area <=', $btmx);
        } else if (!empty($btmn)) {
            $CI->db->where('p.area >=', $btmn);
        } else if (!empty($btmx)) {
            $CI->db->where('p.area <=', $btmx);
        }
        /**  end of Bed Room*/


        /** Footer Filters */

        /*Studio Filter */
        $stdo = $CI->input->get('stdo');
        if (!empty($stdo)) {
            $CI->db->where('p.bed_type_id', $stdo);
        }


        /** end of Footer Filters */


        $result = $CI->db->count_all_results();
        return $result;

    }
}

if (!function_exists('send_email')) {
    function send_email($mailData, $template)
    {
        $CI =& get_instance();
        $toEmail = $mailData['toEmail'];
        $subject = $mailData['subject'];
        $param = $mailData['param'];

        $config['mailtype'] = "html";
        $config['wordwrap'] = TRUE;
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.sendgrid.net';
        $config['smtp_user'] = 'azure_61fdfd424467a8cecb84bf014f8b5e26@azure.com';
        $config['smtp_pass'] = 'P@ssw0rd240!';
        $config['smtp_crypto'] = 'tls';
        $config['smtp_port'] = '587';
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $CI->load->library('email', $config);
        $CI->email->from('noreply@amlak.com', sys_name());

        if (!empty($param)) {
            $CI->email->to($toEmail);
            $CI->email->subject($subject);
            $CI->email->message($CI->load->view('admin/emailTemplate/' . $template . '', $param, TRUE));
        }
        $result = $CI->email->send();
        $CI->email->clear(TRUE);
    }
}

if (!function_exists('get_all_agent_languages')) {
    function get_all_agent_languages($id)
    {
        $CI =& get_instance();
        $CI->db->select('lm.languageID,lm.languageName');
        $CI->db->from('language la');
        $CI->db->join('language_master lm', 'lm.languageID = la.languageID', 'LEFT');
        $CI->db->where('agent_id', $id);
        $CI->db->where('lm.status', 1);
        return $CI->db->get()->result_array();
    }
}

if (!function_exists('get_socialMediaIcons')) {
    function get_socialMediaIcons()
    {
        $CI =& get_instance();
        $CI->db->select('*');
        $CI->db->from('social_media_master');
        $CI->db->where('isActive', 1);
        $CI->db->order_by('sortOrder', 1);
        return $CI->db->get()->result_array();
    }
}

if (!function_exists('get_rent_count')) {
    function get_rent_count($id)
    {
        $CI =& get_instance();
        $CI->db->select('count(category_type_id) as cid');
        //$CI->db->select('count(*)');
        $CI->db->from('property');
        $CI->db->where('isActive', 1);
        $CI->db->where('agent_id', $id);
        $CI->db->where('category_type_id', 1);
        return $CI->db->get()->result_array();
    }
}

if (!function_exists('get_sale_count')) {
    function get_sale_count($id)
    {
        $CI =& get_instance();
        $CI->db->select('count(category_type_id) as cid');
        //$CI->db->select('count(*)');
        $CI->db->from('property');
        $CI->db->where('isActive', 1);
        $CI->db->where('agent_id', $id);
        $CI->db->where('category_type_id', 2);
        return $CI->db->get()->result_array();
    }
}

if (!function_exists('get_rent_count_company')) {
    function get_rent_count_company($id)
    {
        $CI =& get_instance();
        $CI->db->select('count(category_type_id) as cid');
        //$CI->db->select('count(*)');
        $CI->db->from('property');
        $CI->db->where('isActive', 1);
        $CI->db->where('company_id', $id);
        $CI->db->where('category_type_id', 1);
        return $CI->db->get()->result_array();
    }
}

if (!function_exists('get_sale_count_company')) {
    function get_sale_count_company($id)
    {
        $CI =& get_instance();
        $CI->db->select('count(category_type_id) as cid');
        //$CI->db->select('count(*)');
        $CI->db->from('property');
        $CI->db->where('isActive', 1);
        $CI->db->where('company_id', $id);
        $CI->db->where('category_type_id', 2);
        return $CI->db->get()->result_array();
    }
}

if (!function_exists('get_commercial_count_company')) {
    function get_commercial_count_company($id)
    {
        $CI =& get_instance();
        $CI->db->select('count(category_type_id) as cid');
        //$CI->db->select('count(*)');
        $CI->db->from('property');
        $CI->db->where('isActive', 1);
        $CI->db->where('company_id', $id);
        $CI->db->where('category_type_id', 3);
        return $CI->db->get()->result_array();
    }
}

if (!function_exists('get_agent_count_company')) {
    function get_agent_count_company($id)
    {
        $CI =& get_instance();
        $CI->db->select('count(EIdNo) as cid');
        //$CI->db->select('count(*)');
        $CI->db->from('srp_employeesdetails');
        $CI->db->where('isActive', 1);
        $CI->db->where('isAgent', 1);
        $CI->db->where('company_id', $id);
        return $CI->db->get()->result_array();
    }
}

if (!function_exists('generate_socialMedia')) {
    function generate_socialMedia()
    {
        $socialMedia = get_socialMediaIcons();
        if (!empty($socialMedia)) {

            $output = '<div class="ft-social">';
            $output .= '<ul>';
            foreach ($socialMedia as $SM) {
                $output .= '<li><a target="_blank" title="' . $SM['mediaName'] . '" href="' . $SM['mediaURL'] . '" style="background-color: ' . $SM['mediaColor'] . '">' . $SM['mediaIcon'] . '</a></li>';
            }
            $output .= '</ul>';
            $output .= '</div>';

            return $output;

            /*<li><a href="#" class="twt"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                < li><a href = "#" class="inst" ><i class="fa fa-instagram" aria - hidden = "true" ></i ></a ></li >
               <li ><a href = "#" class="gplus" ><i class="fa fa-google-plus" aria - hidden = "true" ></i ></a ></li >
               <li ><a href = "#" class="ytube" ><i class="fa fa-youtube" aria - hidden = "true" ></i ></a ></li >*/

        }

    }
}


if (!function_exists('generate_property_reference')) {
    function generate_property_reference()
    {
        $CI =& get_instance();
        $q = "SELECT MAX( property_id ) AS id  FROM property";

        $id = $CI->db->query($q)->row('id');
        $id++;
        $id_pad = str_pad($id, 8, '0', STR_PAD_LEFT);

        if (!empty(current_companyID())) {
            $companyID = current_companyID() . '/';
        } else {
            $companyID = '';
        }
        $gen_ref = $companyID . current_userID() . '/' . $id_pad;

        return $gen_ref;

    }
}
