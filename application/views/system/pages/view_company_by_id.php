<link href="<?php echo base_url('assets/system/') ?>css/agentStyle.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/fixedheader/3.1.3/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css" rel="stylesheet">
<style>
    .btn-contact-n {
        background: #016e97;
        background-image: -webkit-linear-gradient(left, #016e97, #01a2b4);
        background-image: -moz-linear-gradient(left, #016e97, #01a2b4);
        background-image: -ms-linear-gradient(left, #016e97, #01a2b4);
        background-image: -o-linear-gradient(left, #016e97, #01a2b4);
        background-image: linear-gradient(to right, #016e97, #01a2b4);
        -webkit-border-radius: 10;
        -moz-border-radius: 10;
        border-radius: 10px;
        -webkit-box-shadow: 2px 2px 2px #292929;
        -moz-box-shadow: 2px 2px 2px #292929;
        box-shadow: 2px 2px 2px #292929;
        font-family: Arial;
        color: #ffffff;
        font-size: 16px;
        padding: 9px 20px 9px 20px;
        text-decoration: none;
    }

    .btn-contact-n:hover {
        background: #016e97;
        background-image: -webkit-linear-gradient(left, #016e97, #13D3E8);
        background-image: -moz-linear-gradient(left, #016e97, #13D3E8);
        background-image: -ms-linear-gradient(left, #016e97, #13D3E8);
        background-image: -o-linear-gradient(left, #016e97, #13D3E8);
        background-image: linear-gradient(to right, #016e97, #13D3E8);
        text-decoration: none;
        color: #ffffff;
    }

    .btn_set {
        width: 90%;
    }
</style>
<section>
    <div class="container">
        <?php

        $companyLogo = base_url() . "uploads/company_image/default-company_image.jpg";

        if ($company_data['companyLogo'] != "") {
            $companyLogo = base_url() . 'uploads/company_image/' . $company_data['companyLogo'];
        }

        $cid = $company_data['company_id'];
        $sql = $this->db->query("SELECT COUNT(EIdNo) from srp_employeesdetails WHERE company_id = '" . $cid . "' and isAgent = 1 and isActive = 1");
        $resultset_a = $sql->result_array(); ?>

        <?php $refer = $this->agent->referrer();
        // echo $refer;
        ?>
        <?php
        if ($this->agent->is_referral()) {
            $refer = $this->agent->referrer();
            ?>
            <div class="over-view-top">
                <div class="bk-page">
                    <a href="<?php echo $refer ?>">
                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                        Back to search</a>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="row">
            <div class="col-md-8">
                <div class="row" style="padding:11px;background-color:#fff;">
                    <div class="agent_info" style="height:auto; border: 1px solid #c3c1c1;">
                        <div class="row">
                            <div class="col-md-5 col-xs-11 col-md-offset-0 col-xs-offset-1">
                                <div class="box box-one agent-logo">
                                    <?php if (!empty($company_data['companyLogo'])) { ?>
                                        <img
                                                src="<?php echo base_url('uploads/company_image/' . $company_data['companyLogo']) ?>"
                                                id="changeImg" style="width: 100%"/>
                                    <?php } else { ?>
                                        <img
                                                src="<?php echo base_url('uploads/company_image/default-company_image.jpg') ?>"
                                                id="changeImg" style="width: 100%"/>
                                    <?php }
                                    if ($this->session->userdata('companyID') == $company_data['company_id']) { ?>
                                        <input type="file" name="contactImage" id="itemImage" style="display: none;"
                                               onchange="loadImage(this)"/>
                                        <input type="hidden" name="EIdNo" id="hiddenID_EIdNo"
                                               value="<?php echo $company_data['company_id']; ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-7 col-xs-11 col-md-offset-0 col-xs-offset-1">
                                <h2 style="font-size: 20px;font-weight: 600;color: #0194AC;font-family: 'Roboto', sans-serif;"><?php echo $company_data['company_name']; ?></h2>

                                <?php
                                $companyid = $company_data['company_id'];
                                //$cid= 13;
                                $sql3 = $this->db->query('SELECT srp_employeesdetails.EIdNo FROM srp_employeesdetails WHERE srp_employeesdetails.company_id = "' . $companyid . '" AND srp_employeesdetails.isAgent = 1');

                                $active_listing = 0;
                                $resultset_list = $sql3->result_array();

                                if (!empty($resultset_list)) {

                                    foreach ($resultset_list as $row2) {
                                        $sql4 = $this->db->query('SELECT property.property_id FROM property WHERE property.agent_id = "' . $row2['EIdNo'] . '"');
                                        $resultset_list_new[] = $sql4->result_array();
                                    }

                                    $active_listing = count($resultset_list_new, COUNT_RECURSIVE) / count($resultset_list) - 1;

                                    if ($active_listing == '-1' || $active_listing < '1') {
                                        $active_listing = 0;
                                    }
                                }

                                ?>



                                <?php
                                $cid = $company_data['company_id'];
                                $sql5 = $this->db->query('SELECT property.property_name, property.description, property.property_price, property.area, property.property_address, property_types.property_type_name, bed_types.bed_type_name, property.updated_at, property.isActive, category_types.category_id, category_types.category_name, srp_employeesdetails.company_id FROM    srp_employeesdetails    LEFT JOIN property ON srp_employeesdetails.EIdNo = property.agent_id    LEFT JOIN property_types ON property.property_id = property_types.property_type_id  LEFT JOIN bed_types ON property.bed_type_id = bed_types.bed_type_id INNER JOIN category_types ON property.category_type_id = category_types.category_id WHERE   category_types.category_id = 5 OR
    category_types.category_id = 6 AND  srp_employeesdetails.company_id = "' . $cid . '" ');

                                $resultset_t = $sql5->result_array();
                                ?>


                                <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                        <h3 class="text_5"> EMPLOYEES:</h3>

                                        <h3 class="text_5"> ACTIVE LISTINGS:</h3>

                                        <h3 class="text_5"> TRANSACTIONS:</h3>
                                    </div>
                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                        <h3 class="text_3 m_1 "><?php echo $resultset_a[0]['COUNT(EIdNo)']; ?>
                                            Agents</h3>

                                        <h3 class="text_3 m_1 "><?php echo $active_listing; ?> Properties </h3>

                                        <h3 class="text_3 m_1 "><?php echo COUNT($resultset_t); ?> (last 6 months)</h3>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row p_4">
                            <div class="col-md-11 col-sm-11 col-xs-11 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                                <h2 style="font-size: 19px;font-weight: 500;color: #444444;font-family: 'Roboto', sans-serif;">
                                    About <?php echo $company_data['company_name']; ?></h2>
                            </div>
                            <div class="col-md-12" style="padding-bottom: 35px;">
                                <div class="row">
                                    <div
                                            class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
                                        <!--<h3 class="text_5">RERA:</h3>-->
                                        <h3 class="text_5">HEAD OFFICE:</h3>
                                    </div>
                                    <div class="col-md-8 col-sm-7 col-xs-7">
                                        <!--<h3 class="text_6 m_1 ">#2062</h3>-->

                                        <h3 class="text_6 m_1 "><?php echo $company_data['company_address']; ?></h3>
                                    </div>
                                </div>
                                <?php
                                if ($this->session->userdata('companyID') == $company_data['company_id']) {
                                    if ($this->session->userdata('isCompany') == 1) { ?>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary"
                                                        onclick="company_edit_modal()">
                                                    Edit company details
                                                </button>
                                            </div>
                                        </div>
                                    <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row set_right_box">
                    <div class="agent_contact">
                        <div class="col-md-12" style="border-bottom: 1px solid #c3c1c1;padding-bottom: 5px;">
                            <h2 class="text_1">Contact this Broker</h2>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12"
                                     style="padding-top: 35px;text-align:  center;padding-bottom: 15px;">
                                    <a onclick="showTelNo(<?php echo $company_data['EIdNo']; ?>,'<?php echo $company_data['company_telephone']; ?>')"
                                       class="btn btn-contact-n btn_set" style="position:  relative;"><i
                                                class="fa fa-phone" aria-hidden="true"></i> <span
                                                id="telNo_<?php echo $company_data['EIdNo']; ?>">Call Broker</span>
                                    </a>
                                </div>
                                <div class="col-md-12"
                                     style="padding-top: 6px;text-align:  center;padding-bottom: 25px;">
                                    <a href="#"
                                       onclick="open_property_agent_email(<?php echo $company_data['EIdNo']; ?>)"
                                       class="btn btn-contact-n btn_set" style="position:  relative;"><span
                                                class="glyphicon glyphicon-envelope"
                                                style="position:  absolute;font-size: 20px;margin-left: -50px;margin-top: 8px;"></span>
                                        Email Broker</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="row p_2 p_3">
            <div class="col-md-12">
                <div id="exTab2" style="border:1px solid #ddd;border-top-color: transparent;">
                    <ul class="nav nav-tabs text-center">
                        <li class="active" style="width: 30%;">
                            <a href="#1" data-toggle="tab">Our Agents</a>
                        </li>
                        <li style="width: 35%;border-bottom-color: transparent;"><a href="#2" data-toggle="tab">Our
                                properties</a>
                        </li>
                        <li style="width: 35%;border-left-color: transparent;"><a href="#3" data-toggle="tab">Our
                                Transactions</a>
                        </li>
                    </ul>

                    <?php
                    $comid = $company_data['company_id'];
                    //$cid= 13;
                    $sql2 = $this->db->query('SELECT
                                                    srp_employeesdetails.Ename1,
                                                    srp_employeesdetails.Ename2,
                                                    srp_employeesdetails.company_id,
                                                    srp_employeesdetails.EpNationality,
                                                    srp_employeesdetails.EpLanguages,
                                                    srp_employeesdetails.empDesignation,
                                                    srp_employeesdetails.EmpImage,
                                                    srp_employeesdetails.EpMobile,
                                                    srp_employeesdetails.EIdNo
                                                    FROM
                                                    srp_employeesdetails
                                                    WHERE company_id = "' . $comid . '" AND
                                                    isAgent = 1');

                    $resultset_agents = $sql2->result(); ?>

                    <div class="tab-content tab-set">
                        <div class="tab-pane active" id="1">

                            <h3 style="font-size: 14px;font-weight: 500;color: #747474;font-family: 'Roboto', sans-serif;"></h3>

                            <?php
                            if (isset($resultset_agents) && !empty($resultset_agents)) {
                                foreach ($resultset_agents as $item_agent) { ?>
                                    <!-- ******** -->
                                    <div class="wow fadeIn" style="float:  none;">
                                        <div class="prpt-hor-cover">
                                            <div class="row">

                                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                                    <div class="prpt-hor-img">
                                                        <a href="#">
                                                            <?php if (!empty($item_agent->EmpImage)) {
                                                                $agent_img = $item_agent->EmpImage; ?>
                                                                <img class="center-block set-img-agent"
                                                                     src="<?php echo base_url('uploads/agents/' . $agent_img) ?>"
                                                                     id="changeImg" style="width: 100%"/>
                                                            <?php } else { ?>
                                                                <img class="center-block set-img-agent"
                                                                     src="<?php echo base_url('uploads/agents/default-user-img.jpg') ?>"
                                                                     id="changeImg" style="width: 100%"/>
                                                            <?php } ?>

                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pad_L_0">
                                                    <div class="media-body">
                                                        <div class="prpt-hor-dtls">
                                                            <h3 class="title4"><?php echo isset($item_agent->Ename1) ? $item_agent->Ename1 : '- -'; ?>  </h3>
                                                            <div class="row">
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <h4 class="title5"><?php echo isset($item_agent->empDesignation) ? $item_agent->empDesignation : '- -'; ?>
                                                                    </h4>

                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <div class="row"
                                                                         style="border-top: 1px solid #ccc;">
                                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                                            <h3 class="title6"> Company:</h3>

                                                                            <h3 class="title6"> Nationality:</h3>

                                                                            <h3 class="title6"> Languages:</h3>
                                                                        </div>
                                                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                                                            <!-- ********************* -->
                                                                            <h3 class="text_6 m_1 "><?php echo $company_data['company_name']; ?></h3>
                                                                            <!-- ********************* -->
                                                                            <h3 class="text_6 m_1 "><?php echo isset($item_agent->EpNationality) ? $item_agent->EpNationality : '- -'; ?>                 </h3>
                                                                            <!-- ********************* -->

                                                                            <h3 class="text_3 m_1 "> <?php echo isset($item_agent->EpLanguages) ? $item_agent->EpLanguages : '- -'; ?>                 </h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                                    <div class="builder-logo">
                                                                        <img src="<?php echo $companyLogo; ?>"
                                                                             class="img-responsive" alt="Image"
                                                                             width="90">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="btn-conts">
                                                                <a class="btn btn-contact"
                                                                   onclick="showTelNo(<?php echo $item_agent->EIdNo ?>,'<?php echo $item_agent->EpMobile ?>')">
                                                                    <i class="fa fa-phone" aria-hidden="true"></i> <span
                                                                            id="telNo_<?php echo $item_agent->EIdNo; ?>">Call</span>
                                                                </a>
                                                                <a class="btn btn-contact"
                                                                   onclick="open_property_agent_email(<?php echo $item_agent->EIdNo ?>)">
                                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                                    Email
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!-- *************  -->
                                <?php }
                            } ?>

                        </div>
                        <div class="tab-pane" id="2">
                            <h3 style="font-size: 14px;font-weight: 500;color: #747474;font-family: 'Roboto', sans-serif;"></h3>

                            <!--Get properties for the releavent company stART-->

                            <?php

                            $sql6 = $this->db->query('SELECT srp_employeesdetails.EIdNo FROM srp_employeesdetails WHERE srp_employeesdetails.company_id = "' . $companyid . '" AND srp_employeesdetails.isAgent = 1');

                            $active_list = 0;
                            $properties_list = $sql6->result_array();

                            if (!empty($properties_list)) {
                                foreach ($properties_list as $row_p) {
                                    $sql7 = $this->db->query('SELECT * FROM property WHERE property.agent_id = "' . $row_p['EIdNo'] . '"');
                                    $properties_list_new[$row_p['EIdNo']] = $sql7->result_array();
                                }
                            }

                            $aaa = 1;

                            //echo count($properties_list);

                            for ($i = 0; $i < count($properties_list); $i++) {
                                $agent_id = $properties_list[$i]['EIdNo'];

                                foreach ($properties_list_new[$agent_id] as $item) {
                                    //echo $aaa . '=' . $item['property_name'] . '<br>';

                                    $id = $item['property_id'];
                                    $image = get_propertyImage($id);

                                    $property_type_id = $item['property_type_id'];
                                    $propertyTypeName = get_propertyTypeName($property_type_id);

                                    $bed_type_id = $item['bed_type_id'];
                                    $bed_type_name = get_BedTypeName($bed_type_id);

                                    if (!empty($bed_type_name)) { ?>
                                        <div class="prpt-hor-cover">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                    <div class="prpt-hor-img">
                                                        <a href="<?php echo site_url('overview/' . $item['property_id']) ?>">
                                                            <img src="<?php echo $image ?>" class="center-block"
                                                                 style="width:100%; height: auto;"
                                                                 alt="Image">
                                                            <!--<span class="rent"><?php //echo $item['category_nameas']
                                                            ?></span> -->
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pad_L_0">
                                                    <div class="media-body">
                                                        <div class="prpt-hor-dtls">
                                                            <h3 class="title"> <?php echo $item['property_name']; ?>
                                                                <!--(Residential) --></h3>
                                                            <!-- <h4 class="location">High-end duplexes situated in Madinat Qaboos that offer luxurious living.... <a href="/amlak/index.php/overview/3">Read More</a></h4> -->
                                                            <div class="row">
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <h4 class="rent"><?php echo $item['property_price']; ?>
                                                                        LKR

                                                                    </h4>
                                                                    <ul>
                                                                        <!--<li>2 BHK</li>-->
                                                                        <li><i class="fa fa-bed"
                                                                               aria-hidden="true"></i> <?php echo $bed_type_name; ?>
                                                                        </li>
                                                                        <li><i class="fa fa-shower"
                                                                               aria-hidden="true"></i>&nbsp;
                                                                        </li>
                                                                        <li><?php echo $propertyTypeName; ?></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                                    <div class="builder-logo">
                                                                        <img src="<?php echo $companyLogo; ?>"
                                                                             class="img-responsive" alt="Image"
                                                                             width="90">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="btn-conts">
                                                                <a class="btn btn-contact"
                                                                   onclick="showTelNo(3,'123456')">
                                                                    <i class="fa fa-phone" aria-hidden="true"></i> <span
                                                                            id="telNo_3">Call</span>
                                                                </a>
                                                                <a class="btn btn-contact"
                                                                   onclick="send_property_email(3)">
                                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                                    Email
                                                                </a>
                                                                <?php
                                                                $save_properties = $this->session->userdata('save_');
                                                                if (isset($save_properties)) {
                                                                    if (array_key_exists($item['property_id'], $save_properties)) {
                                                                        ?>
                                                                        <a class="btn btn-contact save_<?php echo $item['property_id']; ?>"
                                                                           id="element<?php echo $item['property_id']; ?>"
                                                                           onclick="save_property_by_click(<?php echo $item['property_id']; ?>)"><i
                                                                                    class="fa fa-check"
                                                                                    aria-hidden="true"></i> Saved</a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a class="btn btn-contact save_<?php echo $item['property_id']; ?>"
                                                                           id="element<?php echo $item['property_id']; ?>"
                                                                           onclick="save_property_by_click(<?php echo $item['property_id']; ?>)"><i
                                                                                    class="fa fa-heart"
                                                                                    aria-hidden="true"></i> Save</a>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <a class="btn btn-contact save_<?php echo $item['property_id']; ?>"
                                                                       id="element<?php echo $item['property_id']; ?>"
                                                                       onclick="save_property_by_click(<?php echo $item['property_id']; ?>)"><i
                                                                                class="fa fa-heart"
                                                                                aria-hidden="true"></i> Save</a>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    <?php }
                                    ?>

                                    <?php


                                    $aaa++;
                                }


                            }

                            ?>
                            <!--Get properties for the releavent company -->


                        </div>

                        <div class="tab-pane" id="3">
                            <h3 style="font-size: 14px;font-weight: 500;color: #747474;font-family: 'Roboto', sans-serif;"></h3>
                            <?php
                            $cid = $company_data['company_id'];
                            $sql = $this->db->query('SELECT
                                                        property.property_name,
                                                        property.description,
                                                        property.property_price,
                                                        property.area,
                                                        property.property_address,
                                                        property_types.property_type_name,
                                                        bed_types.bed_type_name,
                                                        property.updated_at,
                                                        property.isActive,
                                                        category_types.category_id,
                                                        category_types.category_name,
                                                        srp_employeesdetails.company_id
                                                        FROM
                                                        srp_employeesdetails
                                                        LEFT JOIN property ON srp_employeesdetails.EIdNo = property.agent_id
                                                        LEFT JOIN property_types ON property.property_id = property_types.property_type_id
                                                        LEFT JOIN bed_types ON property.bed_type_id = bed_types.bed_type_id
                                                        INNER JOIN category_types ON property.category_type_id = category_types.category_id
                                                        WHERE
                                                        category_types.category_id = 5 OR
                                                        category_types.category_id = 6 AND
                                                        srp_employeesdetails.company_id = "' . $cid . '" ');

                            $resultset = $sql->result();

                            //$transaction_array = array(); ?>

                            <table id="example" class="table table-striped table-bordered nowrap" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Transaction type</th>
                                    <th>Location</th>
                                    <th>Proprty Type</th>
                                    <th>Beds</th>
                                    <th>Sqft</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($resultset) && !empty($resultset)) {
                                    foreach ($resultset as $item) { ?>
                                        <tr>
                                            <td><?php echo isset($item->updated_at) ? $propertyDetail->updated_at : '00-00-0000'; ?></td>
                                            <td><?php if ($item->category_id == 5) { ?>
                                                    <span
                                                            class="label label-default"><?php echo $item->category_name; ?></span>
                                                <?php } else { ?>
                                                    <span
                                                            class="label label-primary"><?php echo $item->category_name; ?></span>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $item->property_address; ?></td>
                                            <td><?php echo $item->property_type_name; ?></td>
                                            <td><?php echo $item->bed_type_name; ?></td>
                                            <td><?php echo $item->area; ?></td>
                                            <td><?php echo $item->property_price; ?></td>
                                        </tr>
                                    <?php }
                                } ?>

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--Edit Modal start-->
<div class="modal" data-backdrop="static" id="modal_company_details_edit" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form" id="form_property">
                            <fieldset>
                                <input id="company_id" value="<?php echo $company_data['company_id']; ?>"
                                       name="company_id" type="hidden">

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="agent_name">Company Name</label>
                                    <div class="col-md-6">
                                        <input id="company_name" name="company_name" type="text"
                                               placeholder="Company name"
                                               value="<?php echo $company_data['company_name']; ?>"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="">Company Address</label>
                                    <div class="col-md-6">
                                        <input id="company_address" name="company_address" type="text"
                                               placeholder="Company Address"
                                               value="<?php echo $company_data['company_address']; ?>"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="">Company Telephone</label>
                                    <div class="col-md-6">
                                        <input id="company_tel" name="company_tel" type="text"
                                               placeholder="Company Telephone"
                                               value="<?php echo $company_data['company_telephone']; ?>"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linkedin">Company Email</label>
                                    <div class="col-md-6">
                                        <input id="company_email" name="company_email" type="text"
                                               placeholder="Company Email"
                                               value="<?php echo $company_data['company_email']; ?>"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linkedin">Company Description</label>
                                    <div class="col-md-6">
										<textarea class="form-control" id="about_company"
                                                  name="about_company"><?php echo $company_data['about_company']; ?></textarea>
                                    </div>
                                </div>


                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submit_company_data()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal end-->


<div class="modal" data-backdrop="static" id="modal_property_agent_sendEmail" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="propertyAgentEmailBody">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        var table = $('#example').DataTable({
            responsive: true
        });

        new $.fn.dataTable.FixedHeader(table);
    });

</script>

<script>
    $(document).ready(function () {

        /*   $('.xEditable').editable({
               success: function () {
               }
           });

           $('.textMyProfile').editable({
               title: 'Enter comments',
               rows: 10
           });

           $('.countryDrop').editable({
               source: [
<?php
        $countryDrop = all_country();
        if (!empty($countryDrop)) {
            $i = 1;
            $count = count($countryDrop);
            foreach ($countryDrop as $country) {
                echo "{value: '" . $country['country_id'] . "', text: '" . trim($country['country_name']) . "'} ";
                if ($count != $i) {
                    echo ',';
                }
                $i++;
            }
        }
        ?>
            ],
            success: function () {
            }
        });

        $('.languageDrop').editable({
            source: [
                <?php
        $languageDrop = all_language_master();
        if (!empty($languageDrop)) {
            $i = 1;
            $count = count($languageDrop);
            foreach ($languageDrop as $language) {
                echo "{value: '" . $language['languageID'] . "', text: '" . trim($language['languageName']) . "'} ";
                if ($count != $i) {
                    echo ',';
                }
                $i++;
            }
        }
        ?>
            ],
            success: function () {
            }
        });*/
    });

    function open_property_agent_email(EIdNo) {
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'html',
            data: {EIdNo: EIdNo},
            url: "<?php echo site_url('home_controller/load_agent_email_body'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                $('#propertyAgentEmailBody').html(data);
                $('#modal_property_agent_sendEmail').modal('show');
                stopLoad();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                stopLoad();
                myAlert('e', '<br>Message: ' + errorThrown);
            }
        });

    }

    $('#changeImg').click(function () {
        $('#itemImage').click();
    });

    function loadImage(obj) {
        if (obj.files && obj.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#changeImg').attr('src', e.target.result);
            };
            reader.readAsDataURL(obj.files[0]);
            profileImageUploadContact();
        }
    }

    function profileImageUploadContact() {
        var imgageVal = new FormData();
        imgageVal.append('EIdNo', $('#hiddenID_EIdNo').val());
        var files = $("#itemImage")[0].files[0];
        imgageVal.append('files', files);
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data: imgageVal,
            contentType: false,
            cache: false,
            processData: false,
            url: "<?php echo site_url('home_controller/company_image_upload'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                myAlert(data[0], data[1], data[2]);
                if (data[0] == 's') {

                }
            }, error: function () {
                alert('An Error Occurred! Please Try Again.');
                stopLoad();
                refreshNotifications(true);
            }
        });
    }

    function showTelNo(id, tel) {
        $("#telNo_" + id).html(tel);
    }

    function send_agent_detailRequest_email() {
        var data = $("#frm_agent_detailRequest").serializeArray();
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: data,
            url: "<?php echo site_url('home_controller/send_agent_requestDetail_Email'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                myAlert(data[0], data[1]);
                if (data[0] == 's') {
                    $("#modal_property_agent_sendEmail").modal('hide');
                }
            }, error: function () {
                alert('An Error Occurred! Please Try Again.');
                stopLoad();
                refreshNotifications(true);
            }
        });
    }

    function submit_company_data() {

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Masters/submit_company_data'); ?>",
            data: $("#form_property").serialize(),
            cache: false,
            beforeSend: function () {
                startLoad();

            },
            success: function (data) {


                stopLoad();
                myAlert(data[0], data[1]);
                if (data[0] == 's') {
                    $('#propertyModal').modal('hide');
                    property_type_table();
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    }
</script>

<script type="text/javascript">
    function company_edit_modal() {

        $('#modal_company_details_edit').modal('show');
    }
</script>
