<?php
/**
 * Created by PhpStorm.
 * User: Madura
 * Date: 4/10/2018
 * Time: 12:55 PM
 */

//echo '<pre>';
//print_r($this->session->all_userdata());
//echo '</pre>';

$user_data = $this->session->all_userdata();
$empID = $user_data['empID'];

if ($user_data['isSystemAdmin']) {

    $company_count = 0;
    $agent_count = 0;
    $rent_count = 0;
    $sales_count = 0;

    //echo '<h3>isSystemAdmin</h3>';

    $company_details_q = "SELECT * FROM srp_employeesdetails WHERE srp_employeesdetails.isActive = 1 AND srp_employeesdetails.isCompany = 1";
    $company_details = $this->db->query($company_details_q)->result_array();
    $company_count = count($company_details);

    $agent_details_q = "SELECT * FROM srp_employeesdetails WHERE srp_employeesdetails.isActive = 1 AND srp_employeesdetails.isAgent = 1";
    $agent_details = $this->db->query($agent_details_q)->result_array();
    $agent_count = count($agent_details);

    $rent_details_q = "SELECT * FROM property WHERE property.category_type_id = 1 OR property.category_type_id = 3 OR property.category_type_id = 5 AND property.isActive = 1";
    $rent_details = $this->db->query($rent_details_q)->result_array();
    $rent_count = count($rent_details);

    $sales_details_q = "SELECT * FROM property WHERE property.category_type_id = 2 OR property.category_type_id = 4 OR property.category_type_id = 6 AND property.isActive = 1";
    $sales_details = $this->db->query($sales_details_q)->result_array();
    $sales_count = count($sales_details);


    ?>
    <!--<div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center ef1 bg-color-green">
            <div class="panel-body">
                <i class="fa fa-bar-chart-o fa-5x"></i>
                <h3><?php //echo $company_count; ?></h3>
            </div>
            <div class="panel-footer back-footer-green">
                Companies
            </div>
        </div>
    </div>-->
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center ef1 bg-color-brown">
            <div class="panel-body">
                <i class="fa fa-users fa-5x"></i>
                <h3><?php echo $agent_count; ?></h3>
            </div>
            <div class="panel-footer back-footer-brown">
                Partners
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center ef1 bg-color-blue">
            <div class="panel-body">
                <i class="fa fa-shopping-cart fa-5x"></i>
                <h3><?php echo $sales_count; ?></h3>
            </div>
            <div class="panel-footer back-footer-blue">
                Total Sales
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center ef1 bg-color-red">
            <div class="panel-body">
                <i class="fa fa fa-archive fa-5x"></i>
                <h3><?php echo $rent_count; ?></h3>
            </div>
            <div class="panel-footer back-footer-red">



                Total Rent Properties
            </div>
        </div>
    </div>
    <?php
}




if ($user_data['isCompany']) {
    $company_id = $user_data['empID'];

    $agent_count = 0;

    //echo '<h3>isCompany</h3>';

    $company_details_q = "SELECT * FROM srp_employeesdetails WHERE srp_employeesdetails.isActive = 1";
    $company_details = $this->db->query($company_details_q)->result_array();

    $company_id = $company_details[0]['company_id'];

    $company_agent_details_q = "SELECT * FROM srp_employeesdetails WHERE srp_employeesdetails.isActive = 1 AND srp_employeesdetails.isPartner = 1";
    $company_agent_details = $this->db->query($company_agent_details_q)->result_array();
    $agent_count = count($company_agent_details);

    ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center ef1 bg-color-brown">
            <div class="panel-body">
                <i class="fa fa-users fa-5x"></i>
                <h3><?php echo $agent_count; ?></h3>
            </div>
            <div class="panel-footer back-footer-brown">
                Partners
            </div>
        </div>
    </div>
    <?php
}

if ($user_data['isAgent']) {
    $agent_id = $user_data['empID'];

    $project_count = 0;
    $sold_count = 0;

    //echo '<h3>isAgent</h3>';

    $project_details_q = "SELECT * FROM property WHERE property.category_type_id = 7 AND property.isActive = 1 AND property.agent_id = " . $agent_id;
    $project_details = $this->db->query($project_details_q)->result_array();
    $project_count = count($project_details);

    $sold_details_q = "SELECT * FROM property WHERE property.category_type_id = 6 AND property.isActive = 1 AND property.agent_id = " . $agent_id;
    $sold_details = $this->db->query($sold_details_q)->result_array();
    $sold_count = count($sold_details);

    ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center ef1 bg-color-blue">
            <div class="panel-body">
                <i class="fa fa-shopping-cart fa-5x"></i>
                <h3><?php echo $sold_count; ?></h3>
            </div>
            <div class="panel-footer back-footer-blue">
                Sold Count
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="panel panel-primary text-center ef1 bg-color-red">
            <div class="panel-body">
                <i class="fa fa fa-archive fa-5x"></i>
                <h3><?php echo $project_count; ?></h3>
            </div>
            <div class="panel-footer back-footer-red">
                Project Count
            </div>
        </div>
    </div>
    <?php
}

?>
