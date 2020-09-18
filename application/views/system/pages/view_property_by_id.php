<?php

$this->output->set_header("HTTP/1.0 200 OK");

$this->output->set_header("HTTP/1.1 200 OK");

$this->output->set_header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');

$this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');

$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");

$this->output->set_header("Cache-Control: post-check=0, pre-check=0");

$this->output->set_header("Pragma: no-cache");

?>

<link href="<?php echo base_url('assets/system/') ?>css/flexslider.css" rel="stylesheet"> 
<link href="<?php echo base_url('assets/system/') ?>css/chatbox.css" rel="stylesheet"> 



<style>

    .tabbable-panel {

        border: 1px solid #eee;

    }



    /* Default mode */

    .tabbable-line > .nav-tabs {

        border: none;

        margin: 0px;

    }



    .tabbable-line > .nav-tabs > li {

        margin-right: 2px;

    }



    .tabbable-line > .nav-tabs > li > a {

        border: 0;

        margin-right: 0;

        color: #737373;

    }



    .tabbable-line > .nav-tabs > li > a > i {

        color: #a6a6a6;

    }



    .tabbable-line > .nav-tabs > li.open, .tabbable-line > .nav-tabs > li:hover {

        border-bottom: 4px solid #fbcdcf;

    }



    .tabbable-line > .nav-tabs > li.open > a, .tabbable-line > .nav-tabs > li:hover > a {

        border: 0;

        background: none !important;

        color: #333333;

    }



    .tabbable-line > .nav-tabs > li.open > a > i, .tabbable-line > .nav-tabs > li:hover > a > i {

        color: #a6a6a6;

    }



    .tabbable-line > .nav-tabs > li.open .dropdown-menu, .tabbable-line > .nav-tabs > li:hover .dropdown-menu {

        margin-top: 0px;

    }



    .tabbable-line > .nav-tabs > li.active {

        border-bottom: 4px solid #f3565d;

        position: relative;

    }



    .tabbable-line > .nav-tabs > li.active > a {

        border: 0;

        color: #333333;

    }



    .tabbable-line > .nav-tabs > li.active > a > i {

        color: #404040;

    }



    .tabbable-line > .tab-content {

        margin-top: -3px;

        background-color: #fff;

        border: 0;

        border-top: 1px solid #eee;

        padding: 2px 0;

    }



    .portlet .tabbable-line > .tab-content {

        padding-bottom: 0;

    }



    /* Below tabs mode */



    .tabbable-line.tabs-below > .nav-tabs > li {

        border-top: 4px solid transparent;

    }



    .tabbable-line.tabs-below > .nav-tabs > li > a {

        margin-top: 0;

    }



    .tabbable-line.tabs-below > .nav-tabs > li:hover {

        border-bottom: 0;

        border-top: 4px solid #fbcdcf;

    }



    .tabbable-line.tabs-below > .nav-tabs > li.active {

        margin-bottom: -2px;

        border-bottom: 0;

        border-top: 4px solid #f3565d;

    }



    .tabbable-line.tabs-below > .tab-content {

        margin-top: -10px;

        border-top: 0;

        border-bottom: 1px solid #eee;

        padding-bottom: 15px;

    }



    .panel {

        border: none !important;

    }



    .panel-title {

        color: #07779C;

        font-size: 17px;

        font-weight: 500;

        text-rendering: optimizeLegibility !important;

        -webkit-font-smoothing: antialiased !important;

        /*text-transform: uppercase;*/

        margin: 10px 0 25px;

        line-height: 100%;

    }



    .panel-heading {

        padding: 0px 14px !important;

    }



    .panel-body {

        background-color: #FFFFFF !important;

    }



    .ppt-facts ul li {

        padding: 8px 0px !important;

        font-size: 13px !important;

    }

</style>

<section>



    <?php



    if (isset($property_data)) {
        // alert($property_data);
        // var_dump($property_data);

    }

    ?>



    <div class="container">

        <div class="over-view-top">

            <div class="bk-page">

                <?php

                if ($this->agent->is_referral()) {

                    $refer = $this->agent->referrer();

                    ?>

                    <a href="<?php echo $refer ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>

                        Back to search</a>

                    <?php

                }

                ?>



            </div>

            <div class="ppt-top-dtls">

                <div class="row">

                    <div class="col-md-12">

                        <div class="col-md-6 col-xs-12">

                            <div class="ppt-nm-dtls">

                                <h3><?php echo isset($property_data['property_name']) ? $property_data['property_name'] : '-'; ?></h3>

                                <?php echo isset($property_data['city_name']) ? '<h4>Located in  "' . $property_data['city_name'] . '"</h4>' : ''; ?>

                            </div>

                        </div>

                        <div class="col-md-6 col-xs-12 hidden-sm hidden-xs">

                            <div class="ppt-btn-gp pad_2">

                                <a class="btn btn-share"

                                   onclick="showTelNo(<?php echo $property_data['property_id']; ?>,'<?php echo $property_data['telephone_number']; ?>')">

                                    <i class="fa fa-phone" aria-hidden="true"></i> <span

                                            id="telNo_<?php echo $property_data['property_id']; ?>"><?php echo $this->lang->line('call_btn') ?></span>

                                </a>

                                <?php

                                $un = $this->session->userdata('status');

                                if (isset($un) && $un && false) { ?>

                                    <button class="btn btn-share"><i class="fa fa-heart" aria-hidden="true"></i> Save

                                    </button>

                                <?php } ?>



                                <button class="btn btn-share"

                                        onclick="share_property_Email_model(<?php echo $property_data['property_id']; ?>)">

                                    <i class="fa fa-share" aria-hidden="true"></i> <?php echo $this->lang->line('share_btn') ?>

                                </button>



                                <button class="btn btn-share" onclick="printDiv()"><i class="fa fa-print"

                                                                                      aria-hidden="true"></i> <?php echo $this->lang->line('print_btn') ?>

                                </button>

                            </div>

                        </div>



                    </div>

                    <div class="col-md-9 col-xs-12 left_part overview-w">

                        <div class="row">

                            <div class="col-md-12 col-xs-12">

                                <div class="ppt-photo-gallery">

                                    <div class="ppt-photo-big">

                                        <div id="slider" class="flexslider">

                                            <ul class="slides">

                                                <?php

                                                $images = get_all_propertyImage();

                                                //var_dump($images)

                                                if (!empty($images)) {

                                                    foreach ($images as $image) {

                                                        ?>

                                                        <li>

                                                            <img src="<?php echo base_url('uploads/' . $image['image_link']) ?>"/>

                                                        </li>

                                                        <?php

                                                    }

                                                }

                                                ?>

                                            </ul>

                                        </div>

                                    </div>

                                    <div class="ppt-photo-thumb">

                                        <div id="carousel" class="flexslider">

                                            <ul class="slides">

                                                <?php

                                                $images = get_all_propertyImage();

                                                //var_dump($images)

                                                if (!empty($images)) {

                                                    foreach ($images as $image) {

                                                        ?>

                                                        <li>

                                                            <img src="<?php echo base_url('uploads/' . $image['image_link']) ?>"/>

                                                        </li>

                                                        <?php

                                                    }

                                                }

                                                ?>



                                                <!-- items mirrored twice, total of 12 -->

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-xs-12" style="border: 1px solid #ddd"></div>

                                <br>   <br>



                                <div class="ppt-features mt-50">

                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                            <div class="panel-default">

                                                <div class="panel-heading">

                                                    <h3 class="panel-title"><?php echo $this->lang->line('facts') ?></h3>

                                                </div>

                                                <div class="panel-body">

                                                    <div class="ppt-facts">

                                                        <ul>

                                                            <li style="width: 100%;">

                                                                <div class="col-xs-5">

																			<span style="font-size: 13px;"> <?php echo $this->lang->line('prop_price') ?> <?php

																				echo isset($property_data['category_type_id']) && $property_data['category_type_id'] == 2 ? '/ Month ' : '';

																				?>
																			</span>
                                                                </div>

                                                                <div class="col-xs-7">

                                                                    <strong>LKR

                                                                        &nbsp;<?php echo isset($property_data['property_price']) ? number_format($property_data['property_price'], 3) : '-'; ?></strong>

                                                                    <?php

                                                                        if($property_data['price_negotiable'] == 1){

                                                                            echo "(Negotiable)" ;

                                                                        }

                                                                    ?>

                                                                </div>

                                                            </li>

                                                            <li style="width: 100%;">

                                                                <div class="col-xs-5">

                                                                    <span style="font-size: 13px;"><?php echo $this->lang->line('prop_bedrooms') ?></span></div>

                                                                <div class="col-xs-7">

                                                                    <strong> <?php echo isset($property_data['bed_type_name']) ? $property_data['bed_type_name'] : '-'; ?></strong>

                                                                </div>

                                                            </li>

                                                            <li style="width: 100%;">

                                                                <div class="col-xs-5">

                                                                    <span style="font-size: 13px;"><?php echo $this->lang->line('prop_type') ?></span>

                                                                </div>

                                                                <div class="col-xs-7">

                                                                    <strong>  <?php echo isset($property_data['property_type_name']) ? $property_data['property_type_name'] : '-'; ?></strong>

                                                                </div>

                                                            </li>

                                                            <!--<li style="width: 100%;">

                                                                <div class="col-xs-4"><span style="font-size: 13px;">Bathrooms</span></div>

                                                                <div class="col-xs-8">1</div>

                                                            </li>-->

                                                            <li style="width: 100%;">

                                                                <div class="col-xs-5">

                                                                    <span style="font-size: 13px;"><?php echo $this->lang->line('prop_reference') ?> </span>

                                                                </div>

                                                                <div class="col-xs-7">

                                                                    <strong>  <?php echo isset($property_data['reference']) ? $property_data['reference'] : '-'; ?></strong>

                                                                </div>

                                                            </li>

                                                            <li style="width: 100%;">

                                                                <div class="col-xs-5">

                                                                    <span style="font-size: 13px;"><?php echo $this->lang->line('prop_area') ?> </span></div>

                                                                <div class="col-xs-7">

                                                                    <strong>   <?php echo isset($property_data['area']) ? $property_data['area'] : '-'; ?>

                                                                        Sq.ft</strong>

                                                                </div>

                                                            </li>



                                                            <li style="width: 100%;">

                                                                <div class="col-xs-5">

                                                                    <span style="font-size: 13px;"><?php echo $this->lang->line('prop_price_sqft') ?></span>

                                                                </div>

                                                                <div class="col-xs-7">

                                                                    <strong>LKR

                                                                        &nbsp;<?php echo isset($property_data['property_price']) && $property_data['area'] > 0 ? number_format($property_data['property_price'] / $property_data['area'], 3) : '-'; ?>

                                                                    </strong>

                                                                </div>

                                                            </li>
															
															<li style="width: 100%;">

																	<div class="col-xs-5">
																		<span style="font-size: 13px;"><?php echo $this->lang->line('prop_car_parking_space') ?></span>
																	</div>

																	<div class="col-xs-7">
																		<strong>
																		<?php echo isset($property_data['car_parking_space']) ? $property_data['car_parking_space'] : '-'; ?>
																		</strong>

																	</div>
                                                            </li>
															
															  <li style="width: 100%;">

																	<div class="col-xs-5">
																		<span style="font-size: 13px;"><?php echo $this->lang->line('prop_availability') ?></span>
																	</div>

																	<div class="col-xs-7">
																		<span class="availble-property">
																		<?php echo isset($property_data['property_availability']) ? $property_data['property_availability'] : '-'; ?>
																		</span>

																	</div>

                                                            </li>
															
															 <li style="width: 100%;">

																	<div class="col-xs-5">
																		<span style="font-size: 13px;"><?php echo $this->lang->line('prop_bill_included') ?></span>
																	</div>

																	<div class="col-xs-7">
																		<strong>
																		<?php echo isset($property_data['bill_included']) ? $property_data['bill_included'] : '-'; ?>
																		</strong>

																	</div>

                                                            </li>
															
															 <li style="width: 100%;">

																	<div class="col-xs-5">
																		<span style="font-size: 13px;"><?php echo $this->lang->line('prop_deposit_period') ?></span>
																	</div>

																	<div class="col-xs-7">
																		<strong>
																		<?php echo isset($property_data['deposit_period']) ? $property_data['deposit_period'] . ' Months' : '-'; ?>
																		</strong>

																	</div>

                                                            </li>

                                                        </ul>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
										
										<?php if($property_data['category_type_id'] == 1) { ?>																					
																				
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-30">

                                            <div class="panel-default">

                                                <div class="panel-heading">

                                                    <h3 class="panel-title"><?php echo $this->lang->line('about_rental') ?> </h3>

                                                </div>

                                                <div class="panel-body">

                                                    <div class="ppt-facts">

                                                         <ul>

                                                          
                                                            <li style="width: 100%;">

                                                                <div class="col-xs-5">

                                                                    <span style="font-size: 13px;"><?php echo $this->lang->line('rental_period') ?>  </span></div>

                                                                <div class="col-xs-7">

                                                                    <strong> <?php echo isset($property_data['rental_period']) ? $property_data['rental_period'] : '-'; ?></strong>

                                                                </div>

                                                            </li>

                                                            <li style="width: 100%;">

                                                                <div class="col-xs-5">

                                                                    <span style="font-size: 13px;"><?php echo $this->lang->line('monthly_rent') ?></span>

                                                                </div>

                                                                <div class="col-xs-7">

                                                                    <strong>  <?php echo isset($property_data['monthly_rent']) ? $property_data['monthly_rent'] : '-'; ?></strong>

                                                                </div>

                                                            </li>
															
															 <li style="width: 100%;">

                                                                <div class="col-xs-5">

                                                                    <span style="font-size: 13px;"><?php echo $this->lang->line('security_deposit') ?></span>

                                                                </div>

                                                                <div class="col-xs-7">

                                                                    <strong>  <?php echo isset($property_data['security_deposit']) ? $property_data['security_deposit'] : '-'; ?></strong>

                                                                </div>

                                                            </li>
															
															 <li style="width: 100%;">

                                                                <div class="col-xs-5">

                                                                    <span style="font-size: 13px;"><?php echo $this->lang->line('occupancy_rate') ?>  </span>

                                                                </div>

                                                                <div class="col-xs-7">

                                                                    <strong>  <?php echo isset($property_data['occupancy_rate']) ? $property_data['occupancy_rate'] : '-'; ?></strong>

                                                                </div>

                                                            </li>
															
															 <li style="width: 100%;">

                                                                <div class="col-xs-5">

                                                                    <span style="font-size: 13px;"><?php echo $this->lang->line('takeover_date') ?> </span>

                                                                </div>

                                                                <div class="col-xs-7">

                                                                    <strong>  <?php echo isset($property_data['takeover_date']) ? $property_data['takeover_date'] : '-'; ?></strong>

                                                                </div>

                                                            </li>
															
															<li style="width: 100%;">

                                                                <div class="col-xs-5">

                                                                    <span style="font-size: 13px;"><?php echo $this->lang->line('advances') ?> </span>

                                                                </div>

                                                                <div class="col-xs-7">

                                                                    <strong>  <?php echo isset($property_data['advances']) ? $property_data['advances'] : '-'; ?></strong>

                                                                </div>

                                                            </li>
															
															<li style="width: 100%;">

                                                                <div class="col-xs-5">

                                                                    <span style="font-size: 13px;"><?php echo $this->lang->line('prepaid_rent') ?>  </span>

                                                                </div>

                                                                <div class="col-xs-7">

                                                                    <strong>  <?php echo isset($property_data['prepaid_rent']) ? $property_data['prepaid_rent'] : '-'; ?></strong>

                                                                </div>

                                                            </li>
															
															<li style="width: 100%;">

                                                                <div class="col-xs-5">

                                                                    <span style="font-size: 13px;"><?php echo $this->lang->line('creation_date') ?> </span>

                                                                </div>

                                                                <div class="col-xs-7">

                                                                    <strong>  <?php echo isset($property_data['creation_date']) ? $property_data['creation_date'] : '-'; ?></strong>

                                                                </div>

                                                            </li>
															
															
														</ul>	

                                                    </div>



                                                </div>

                                            </div>

                                        </div>
										
										<?php } ?>

                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                            <div class="panel-default">

                                                <div class="panel-heading">

                                                    <h3 class="panel-title"><?php echo $this->lang->line('amenities') ?></h3>

                                                </div>

                                                <div class="panel-body">

                                                    <div class="ppt-facts">

                                                        <ul>

                                                            <?php

                                                            $amenties = get_all_propertyAmenties();

                                                            if (!empty($amenties)) {

                                                                foreach ($amenties as $amt) {

                                                                    ?>

                                                                    <li>

                                                                        <i class="fa fa-check blue"

                                                                           style="color: #07779C;"></i> <?php echo $amt['amenity_name']; ?>

                                                                    </li>

                                                                    <?php

                                                                }

                                                            } else {



                                                            }

                                                            ?>

                                                        </ul>

                                                    </div>



                                                </div>

                                            </div>

                                        </div>
										
										
										

                                    </div>

                                    <br>

                                    <div class="panel panel-default">

                                        <div class="panel-heading">

                                            <h3 class="panel-title"><?php echo $this->lang->line('about_prop') ?></h3>

                                        </div>

                                        <div class="panel-body">

                                            <div class="ppt-abt">

                                                <p><?php echo isset($property_data['description']) ? $property_data['description'] : '-'; ?></p>

                                            </div>

                                        </div>

                                    </div>

                                </div>





                                <div class="row">

                                    <div class="col-md-12 col-xs-12">

                                        <h3 class="panel-title nearby-pad"><?php echo $this->lang->line('nearby_amenities') ?></h3>

                                        <div class="tabbable-panel" style="margin-top: 10px;">

                                            <div class="tabbable-line">

                                                <ul class="nav nav-tabs ">

                                                    <li class="active">

                                                        <a href="#tab_default_1" data-toggle="tab">

                                                        <?php echo $this->lang->line('prop_amenities') ?> </a>

                                                    </li>

                                                    <li>

                                                        <a href="#tab_default_2" data-toggle="tab">

                                                        <?php echo $this->lang->line('school_finder') ?> </a>

                                                    </li>

                                                </ul>

                                                <div class="tab-content">

                                                    <div class="tab-pane active" id="tab_default_1">

                                                        <div id="map_amenities" style="height: 450px"></div>

                                                    </div>

                                                    <div class="tab-pane" id="tab_default_2">

                                                        <div id="map_schools" style="height: 450px"></div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-md-12 col-sm-12">

                                <div class="panel-heading">

                                    <h3 class="txt-report"> <?php echo $this->lang->line('prop_problem') ?>

                                        <button class="btn btn-default" onclick="reportModal()"><i

                                                    class="fa fa-warning red" aria-hidden="true"></i>  <?php echo $this->lang->line('report_property') ?>

                                        </button>

                                    </h3>

                                </div>

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-md-12 col-sm-12">

                                <!-- <div class="panel-heading">

                                    <h3 class="panel-title"> <?php echo $this->lang->line('prices_trends') ?>*</h3>

                                </div> -->

                                <!-- <div id="chartdiv"></div> -->

                            </div>

                        </div>



                    </div>

                    <div class="col-md-3 col-xs-12 right_part">

                        <div class="row">



                            <div class="col-md-12 col-xs-12 set-r">

                                <div class="agent_section">



                                    <div class="row">

                                        <div class="col-md-12  hidden-xs hidden-sm">

                                            <div class="agent_logo">

                                                <!--imageLink-->

                                                <?php

                                                if ($property_data['imageLink'] && !empty($property_data['imageLink'])) {

                                                    ?>

                                                    <img src="<?php echo base_url('uploads/agents/' . $property_data['imageLink']) ?>"

                                                         alt="Image" class="img-responsive center-block ci">

                                                    <?php



                                                } else {

                                                    /*Default Image */

                                                    ?>

                                                    <img src="<?php echo base_url('uploads/agent_default.jpg') ?>"

                                                         alt="Image" class="img-responsive center-block di">



                                                    <?php

                                                }

                                                ?>

                                            </div>

                                        </div>

                                        <div class="col-md-12 ">

                                            <div class="agent_content">

                                                <div class="row  hidden-xs hidden-sm">

                                                    <div class="col-md-3 col-md-offset-1">

                                                        <h3 class="text_5"><?php echo $this->lang->line('agent') ?>: </h3>



                                                        <h3 class="text_5"><?php echo $this->lang->line('agent_company') ?>:</h3>





                                                    </div>

                                                    <div class="col-md-8 col-sm-7 col-xs-7">

                                                        <h3 class="a-name">
                                                            
                                                            <a  href="<?php echo site_url('agentOverview'); ?>/<?php echo $property_data['agent_id'];?>" >

                                                            <?php echo isset($property_data['agentName']) ? $property_data['agentName'] : '-'; ?>
                                                            
                                                            </a>

                                                        </h3>



                                                        <h3 class="text_6 m_1 ">

                                                            <strong><?php echo isset($property_data['company_name']) ? $property_data['company_name'] : '-'; ?></strong>

                                                        </h3>



                                                    </div>

                                                    <div class="col-md-12" style="display: none;">

                                                        <div class="link_prop">

                                                            <a href="<?php echo base_url(); ?>companyOverview/<?php echo $company_id; ?>">View

                                                                all our properties</a>

                                                        </div>

                                                    </div>

                                                </div>



                                                <div class="row pad-bottom-2">

                                                    <div class="col-md-12">

                                                        <div class="price_sec text-center">

                                                            <span><?php echo $property_data['property_price'] . " LKR"; ?></span>

                                                        </div>

                                                    </div>



                                                    <div class="col-md-12 btn-grp">

                                                        <a tabindex="0" data-html="true" data-toggle="popover"

                                                           data-trigger="focus"

                                                           data-content="<div class='text-center'>Mention the reference<br><b>bait <?php echo $property_data['reference']; ?></b></div>"

                                                           onclick="showTelNo_2(<?php echo $property_data['property_id']; ?>,'<?php echo $property_data['mobile_number']; ?>')"

                                                           class="btn btn-contact btn_set" style="position:  relative;">

                                                            <span class="glyphicon glyphicon-earphone"

                                                                  style="position:  absolute;font-size: 20px;margin-left: -40px;margin-top: 8px;"></span>

                                                            <span id="telNo2_<?php echo $property_data['property_id']; ?>"> <?php echo $this->lang->line('call_broker') ?></span></a>





                                                    </div>



                                                    <div class="col-md-12 btn-grp">

                                                        <a onclick="open_property_agent_email(<?php echo $property_data['agent_id']; ?>)"

                                                           class="btn btn-contact btn_set" style="position:  relative;">

                                                            <span class="glyphicon glyphicon-envelope"

                                                                  style="position:  absolute;font-size: 20px;margin-left: -40px;margin-top: 8px;"></span>

                                                                  <?php echo $this->lang->line('email_broker') ?></a>

                                                    </div>

                                                    <div class="col-md-12 btn-grp">

                                                        <a onclick="chatModal(<?php echo $property_data['property_id'];  ?>,<?php echo $property_data['agent_id']; ?>)"

                                                           class="btn btn-contact btn_set" style="position:  relative;">

                                                            <span class="glyphicon glyphicon-comment"

                                                                  style="position:  absolute;font-size: 20px;margin-left: -40px;margin-top: 8px;"></span>

                                                                 Chat - Owner
                                                          
                                                          
                                                          </a>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                </div>





                                <!-- -- paste here milinda-->



                                <div class="ppt-promo-ad">

                                    <?php

                                    if (!empty($sidebar_advertisement)) {

                                        $url = $sidebar_advertisement[0]['url'];

                                        $img_url = $sidebar_advertisement[0]['img_url'];



                                        ?>

                                        <a href="<?php echo $url ?>" target="_blank">

                                            <img src="<?php echo base_url() . $img_url; ?>" alt="Image">

                                        </a>

                                        <?php



                                    }

                                    ?>

                                </div>



                                <!-- -- paste here milinda-->

                                <?php

                                if (!empty($review_data)) { ?>

                                    <div class="sd-review-cover" style="border:  1px solid #ccc;">

                                        <div class="row">

                                            <div class="col-md-12 col-sm-12">

                                                <div class="review-line"

                                                     style="border-bottom: 1px solid #ccc;padding-bottom: 8px;">

                                                    <div class="row ">

                                                        <div class="col-md-11 col-sm-5 col-xs-5 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">

                                                            <h3 style="font-size: 16px;font-weight: 600;"><?php echo $review_data[0]['property_name']; ?></h3>

                                                        </div>

                                                        <!--<div class="col-md-6 col-sm-6 col-xs-6" style="height: 46px;   position: relative;">

                                                                <img src="<?php //echo base_url('assets/system/')  ?>images/star.jpg" alt="Star" style="position: absolute;top: 0;bottom: 0;left: 0;    right: 0;margin: auto;">

                                                            </div>-->

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-12 col-sm-12">

                                                <div class="review-line"

                                                     style="border-bottom: 1px solid #ccc;padding-bottom: 2px;margin-top: -5px;">

                                                    <div class="row">

                                                        <div class="col-md-11 col-sm-11 col-xs-11 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">

                                                            <h3 style="font-size: 16px;font-weight: 400;color: #8e8e8e;">

                                                                Latest Reviews</h3>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <?php foreach ($review_data as $review_r) { ?>



                                                <div class="col-md-12 col-sm-12">

                                                    <div class="review-sec"

                                                         style="border-bottom: 1px solid #ccc;padding-bottom: 2px;margin-top: -5px;">

                                                        <div class="row">

                                                            <div class="col-md-11 col-sm-11 col-xs-11 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">

                                                                <h3 style="font-size: 14px;font-weight: 400;color: #076573;">

                                                                    " <?php echo isset($review_r['review_title']) ? $review_r['review_title'] : '-'; ?>

                                                                    "</h3>

                                                                <div class="row">

                                                                    <div class="col-md-12 col-sm-12">

                                                                        <p style="font-size: 12px;">

                                                                            <img src="<?php echo base_url('assets/system/') ?>images/star.jpg"

                                                                                 alt="Star">

                                                                            <span><b>by a person</b></span> <?php echo isset($review_r['date']) ? $review_r['date'] : '-'; ?>

                                                                            .</p>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>



                                            <?php } ?>



                                            <div class="col-md-12 col-sm-12">

                                                <a href="#">

                                                    <h3 class="text-center"

                                                        style="font-size: 14px;font-weight: 400;color: #076573;padding-bottom: 10px;">

                                                        <a href="#" onclick="reviewmodal()"> <?php echo $this->lang->line('write_review') ?></a>

                                                    </h3>

                                                </a>

                                            </div>



                                        </div>

                                    </div>

                                <?php } else { ?>



                                    <div class="sd-review-cover" style="border:  1px solid #ccc;">

                                        <div class="row">

                                            <div class="col-md-12 col-sm-12">

                                                <div class="review-line"

                                                     style="border-bottom: 1px solid #ccc;padding-bottom: 8px;">

                                                    <div class="row ">

                                                        <div class="col-md-11 col-sm-5 col-xs-5 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">

                                                            <h3 style="font-size: 16px;font-weight: 600;"><?php echo $property_data['property_name']; ?></h3>

                                                        </div>



                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-12 col-sm-12">

                                                <div class="review-line"

                                                     style="border-bottom: 1px solid #ccc;padding-bottom: 2px;margin-top: -5px;">

                                                    <div class="row">

                                                        <div class="col-md-11 col-sm-11 col-xs-11 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">

                                                            <h3 style="font-size: 16px;font-weight: 400;color: #8e8e8e;">

                                                            <?php echo $this->lang->line('latest_review') ?></h3>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>





                                            <div class="col-md-12 col-sm-12">

                                                <div class="review-sec"

                                                     style="border-bottom: 1px solid #ccc;padding-bottom: 2px;margin-top: -5px;">

                                                    <div class="row">

                                                        <div class="col-md-11 col-sm-11 col-xs-11 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">



                                                            <div class="row">

                                                                <div class="col-md-12 col-sm-12">

                                                                    <h5><?php echo $this->lang->line('no_review') ?></h5>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>





                                            <div class="col-md-12 col-sm-12">

                                                <a href="#">

                                                    <h3 class="text-center"

                                                        style="font-size: 14px;font-weight: 400;color: #076573;padding-bottom: 10px;">

                                                        <a href="#" onclick="reviewmodal()"> <?php echo $this->lang->line('write_review') ?></a>

                                                    </h3>

                                                </a>

                                            </div>



                                        </div>

                                    </div>

                                <?php } ?>





                            </div>

                        </div>

                    </div>



                </div>

            </div>

        </div>



        <hr>



    </div>

</section>

<!--<section>

    <div class="container">

        <div class="builder-carousel">

            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, corporis maiores! Animi quisquam placeat

            vero nulla mollitia quibusdam accusamus eligendi, iusto nemo nostrum, inventore maiores maxime, tenetur

            quaerat amet blanditiis.

        </div>

    </div>

</section>-->





<div id="DivIdToPrint" style="display: none;">

    <div class="col-md-8 col-xs-12">

        <div class="col-md-6 col-xs-12">

            <div class="ppt-nm-dtls">

                <h3><?php echo isset($property_data['property_name']) ? $property_data['property_name'] : '-'; ?></h3>

                <?php echo isset($property_data['city_name']) ? '<h4>Located in  "' . $property_data['city_name'] . '"</h4>' : ''; ?>

            </div>

        </div>

        <div class="col-md-6 col-xs-12">

            <div class="ppt-sq-dtl">

                <ul>

                    <li>

                        <span>Area:</span> <?php echo isset($property_data['area']) ? number_format($property_data['area'], 0) . ' sqft&nbsp;' : '-'; ?>

                    </li>

                    <li>

                        <?php if ($property_data['category_type_id'] == 1) {

                            echo '<span>  Rent:</span>';

                        } else {

                            echo 'Price';

                        } ?>

                        <?php echo isset($property_data['category_type_id']) ? number_format($property_data['property_price'], 3) . ' OMR &nbsp;' : '-'; ?>

                        <?php if ($property_data['category_type_id'] == 1) {

                            echo '/ month';

                        } ?>

                    </li>

                </ul>

            </div>

        </div>

    </div>



    <?php

    $images = get_all_propertyImage();

    //var_dump($images)

    if (!empty($images[0]['image_link'])) {

        ?>

        <div style="margin: 5px 0px;">

            <img src="<?php echo base_url('uploads/' . $images[0]['image_link']) ?>"/>

        </div>

        <?php

    }

    ?>





    <div class="ppt-features">

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">About <?php echo $property_data['property_type_name'] ?> :</h3>

            </div>

            <div class="panel-body">

                <div class="ppt-abt">

                    <p><?php echo isset($property_data['description']) ? $property_data['description'] : '-'; ?></p>

                </div>

            </div>

        </div>

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">Facts</h3>

            </div>

            <div class="panel-body">

                <div class="ppt-facts">

                    <ul>

                        <li>

                            <div class="col-xs-6"><span>Price</span></div>

                            <div class="col-xs-6">

                                <?php echo isset($property_data['property_price']) ? number_format($property_data['property_price'], 3) . ' OMR &nbsp;' : '-'; ?>

                            </div>

                        </li>

                        <li>

                            <div class="col-xs-6"><span>Bedrooms</span></div>

                            <div class="col-xs-6">

                                <?php echo isset($property_data['bed_type_name']) ? $property_data['bed_type_name'] : '-'; ?>

                            </div>

                        </li>

                        <li>

                            <div class="col-xs-6"><span>Type</span></div>

                            <div

                                    class="col-xs-6"><?php echo isset($property_data['property_type_name']) ? $property_data['property_type_name'] : '-'; ?></div>

                        </li>

                        <li>

                            <div class="col-xs-6"><span>Bathrooms</span></div>

                            <div class="col-xs-6">1</div>

                        </li>

                        <li>

                            <div class="col-xs-6"><span>Reference </span></div>

                            <div

                                    class="col-xs-6"><?php echo isset($property_data['reference']) ? $property_data['reference'] : '-'; ?></div>

                        </li>

                        <li>

                            <div class="col-xs-6"><span>Area</span></div>

                            <div

                                    class="col-xs-6"><?php echo isset($property_data['area']) ? $property_data['area'] : '-'; ?>

                                sqft

                            </div>

                        </li>

                        <li>

                            <div class="col-xs-6"><span>RERA Permit No.</span></div>

                            <div

                                    class="col-xs-6"><?php echo isset($property_data['permit_No']) ? $property_data['permit_No'] : '-'; ?></div>

                        </li>

                        <li>

                            <div class="col-xs-6"><span>Price / Sq.ft   </span></div>

                            <div

                                    class="col-xs-6"><?php echo isset($property_data['property_price']) && $property_data['area'] > 0 ? number_format($property_data['property_price'] / $property_data['area'], 3) . ' OMR' : '-'; ?>



                            </div>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>





</div>





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





<!-- Modal start review-->

<div class="modal" data-backdrop="static" id="modal_review" role="dialog">

    <div class="modal-dialog modal-md">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title"><?php echo isset($property_data['property_name']) ? $property_data['property_name'] : '-'; ?></h4>

            </div>

            <div class="modal-body">



                <div class="row">

                    <div class="col-md-12">



                        <h2 class="review-h3">Please rate:</h2>



                        <form class="form-horizontal" role="form" id="form_property_review">



                            <div class="form-group set-rate-sec-1">

                                <div class="col-md-4">

                                    <h2 class="review-ques">Maintenance</h2>

                                </div>

                                <div class="col-md-8">

                                    <fieldset class="rating_1">

                                        <input type="radio" id="star5" name="rating1" value="5"/><label for="star5"

                                                                                                        title="5 stars">

                                            5 stars</label>

                                        <input type="radio" id="star4" name="rating1" value="4"/><label for="star4"

                                                                                                        title="4 stars">

                                            4 stars</label>

                                        <input type="radio" id="star3" name="rating1" value="3"/><label for="star3"

                                                                                                        title="3 stars">

                                            3 stars</label>

                                        <input type="radio" id="star2" name="rating1" value="2"/><label for="star2"

                                                                                                        title="2 stars">

                                            2 stars</label>

                                        <input type="radio" id="star1" name="rating1" value="1"/><label for="star1"

                                                                                                        title="1 stars">

                                            1 star</label>

                                    </fieldset>

                                </div>

                            </div>



                            <div class="form-group set-rate-sec-2">

                                <div class="col-md-4">

                                    <h2 class="review-ques">Staff / Security</h2>

                                </div>

                                <div class="col-md-8">

                                    <fieldset class="rating_33">

                                        <input type="radio" id="star5" name="rating2" value="5"/><label for="star5"

                                                                                                        title="5 stars">

                                            5 stars</label>

                                        <input type="radio" id="star4" name="rating2" value="4"/><label for="star4"

                                                                                                        title="4 stars">

                                            4 stars</label>

                                        <input type="radio" id="star3" name="rating2" value="3"/><label for="star3"

                                                                                                        title="3 stars">

                                            3 stars</label>

                                        <input type="radio" id="star2" name="rating2" value="2"/><label for="star2"

                                                                                                        title="2 stars">

                                            2 stars</label>

                                        <input type="radio" id="star1" name="rating2" value="1"/><label for="star1"

                                                                                                        title="1 stars">

                                            1 star</label>

                                    </fieldset>

                                </div>

                            </div>



                            <div class="form-group set-rate-sec-1">

                                <div class="col-md-4">

                                    <h2 class="review-ques">Gym / pool</h2>

                                </div>

                                <div class="col-md-8">

                                    <fieldset class="rating_4">

                                        <input type="radio" id="star5" name="rating3" value="5"/><label for="star5"

                                                                                                        title="5 stars">5

                                            stars</label>

                                        <input type="radio" id="star4" name="rating3" value="4"/><label for="star4"

                                                                                                        title="4 stars">4

                                            stars</label>

                                        <input type="radio" id="star3" name="rating3" value="3"/><label for="star3"

                                                                                                        title="3 stars">3

                                            stars</label>

                                        <input type="radio" id="star2" name="rating3" value="2"/><label for="star2"

                                                                                                        title="2 stars">2

                                            stars</label>

                                        <input type="radio" id="star1" name="rating3" value="1"/><label for="star1"

                                                                                                        title="1 stars">1

                                            star</label>

                                    </fieldset>

                                </div>

                            </div>



                            <div class="form-group set-rate-sec-2">

                                <div class="col-md-4">

                                    <h2 class="review-ques">Children friendly</h2>

                                </div>

                                <div class="col-md-8">

                                    <fieldset class="rating_5">

                                        <input type="radio" id="star5" name="rating4" value="5"/><label for="star5"

                                                                                                        title="5 stars">5

                                            stars</label>

                                        <input type="radio" id="star4" name="rating4" value="4"/><label for="star4"

                                                                                                        title="4 stars">4

                                            stars</label>

                                        <input type="radio" id="star3" name="rating4" value="3"/><label for="star3"

                                                                                                        title="3 stars">3

                                            stars</label>

                                        <input type="radio" id="star2" name="rating4" value="2"/><label for="star2"

                                                                                                        title="2 stars">2

                                            stars</label>

                                        <input type="radio" id="star1" name="rating4" value="1"/><label for="star1"

                                                                                                        title="1 stars">1

                                            star</label>

                                    </fieldset>

                                </div>

                            </div>



                            <div class="form-group set-rate-sec-1">

                                <div class="col-md-4">

                                    <h2 class="review-ques">Traffic near property</h2>

                                </div>

                                <div class="col-md-8">

                                    <fieldset class="rating_6">

                                        <input type="radio" id="star5" name="rating5" value="5"/><label for="star5"

                                                                                                        title="5 stars">5

                                            stars</label>

                                        <input type="radio" id="star4" name="rating5" value="4"/><label for="star4"

                                                                                                        title="4 stars">4

                                            stars</label>

                                        <input type="radio" id="star3" name="rating5" value="3"/><label for="star3"

                                                                                                        title="3 stars">3

                                            stars</label>

                                        <input type="radio" id="star2" name="rating5" value="2"/><label for="star2"

                                                                                                        title="2 stars">2

                                            stars</label>

                                        <input type="radio" id="star1" name="rating5" value="1"/><label for="star1"

                                                                                                        title="1 stars">1

                                            star</label>

                                    </fieldset>

                                </div>

                            </div>



                            <div class="form-group set-rate-sec-2">

                                <div class="col-md-4">

                                    <h2 class="review-ques">Guest parking</h2>

                                </div>

                                <div class="col-md-8">

                                    <fieldset class="rating_7">

                                        <input type="radio" id="star5" name="rating6" value="5"/><label for="star5"

                                                                                                        title="5 stars">5

                                            stars</label>

                                        <input type="radio" id="star4" name="rating6" value="4"/><label for="star4"

                                                                                                        title="4 stars">4

                                            stars</label>

                                        <input type="radio" id="star3" name="rating6" value="3"/><label for="star3"

                                                                                                        title="3 stars">3

                                            stars</label>

                                        <input type="radio" id="star2" name="rating6" value="2"/><label for="star2"

                                                                                                        title="2 stars">2

                                            stars</label>

                                        <input type="radio" id="star1" name="rating6" value="1"/><label for="star1"

                                                                                                        title="1 stars">1

                                            star</label>

                                    </fieldset>

                                </div>

                            </div>

                            <?php $u_id = $this->session->userdata('empID'); ?>



                            <fieldset>

                                <input id="property_id" value="<?php echo $property_data['property_id']; ?>"

                                       name="property_id" type="hidden">



                                <input id="emp_id" value=" <?php echo isset($u_id) ? $u_id : '0'; ?>" name="emp_id"

                                       type="hidden">



                                <!-- Text input-->

                                <div class="form-group">

                                    <div class="col-md-12">

                                        <input id="review_title" name="review_title" type="text"

                                               placeholder="Title of your review" class="form-control input-md">



                                    </div>

                                </div>



                                <!-- Textarea -->

                                <div class="form-group">

                                    <div class="col-md-12">

                                        <textarea rows="5" cols="50" class="form-control" id="review_description"

                                                  name="review_description"

                                                  placeholder="Write your review - Tell people about your experience (at least 150 characters)"></textarea>

                                    </div>

                                </div>

                            </fieldset>



                            <fieldset>

                                <h2 class="review-h3">Enter your details</h2>

                                <input id="agent_id" value="<?php echo $property_data['EIdNo']; ?>" name="agent_id"  type="hidden">



                                <!-- Text input-->

                                <div class="form-group">

                                    <div class="col-md-12">

                                        <input id="user_name" name="user_name" type="text" placeholder="enter your name"

                                               class="form-control input-md">



                                    </div>

                                </div>



                                <!-- Text input-->

                                <div class="form-group">

                                    <div class="col-md-12">

                                        <input id="user_email" name="user_email" type="text"

                                               placeholder="enter your email" class="form-control input-md">



                                    </div>

                                </div>



                            </fieldset>



                        </form>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-primary" onclick="submit_review_data()">Submit</button>

            </div>

        </div>

    </div>

</div>

<!-- Review Modal end-->



<!----- Start report modal  ---->



<div class="modal in" data-backdrop="static" id="modal_report" role="dialog">

    <div class="modal-dialog modal-sm">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">×</button>

                <h2 class="text-center red"><i class="fa fa-warning" aria-hidden="true"></i></h2>

                <h4 class="modal-title text-center">Report property</h4>

            </div>

            <div class="modal-body">



                <div class="row">

                    <div class="col-md-12">

                        <form class="form-horizontal" role="form" id="form_report">

                            <fieldset>

                                <input id="property_id" value="<?php echo $property_data['property_id']; ?>"

                                       name="property_id" type="hidden">



                                <!-- Text input-->

                                <div class="form-group">

                                    <div class="col-md-12">

                                        <input id="u_email" name="u_email" type="text" placeholder="Email"

                                               class="form-control input-md">



                                    </div>

                                </div>



                                <div class="form-group">

                                    <div class="col-md-12">

                                        <select name="reason_id" required="" title="Please select a reason"

                                                data-h5-errorid="form-1-reason_id-1-error" class="form-control">

                                            <option value="">Select a reason</option>

                                            <option value="Property not available">

                                                Property not available

                                            </option>

                                            <option value="Inaccurate price">

                                                Inaccurate price

                                            </option>

                                            <option value="No response from broker">

                                                No response from broker

                                            </option>

                                            <option value="No property details">

                                                No property details

                                            </option>

                                            <option value="Poor quality or irrelevant photos">

                                                Poor quality or irrelevant photos

                                            </option>

                                            <option value="Poorly typed description">

                                                Poorly typed description

                                            </option>

                                            <option value="Inaccurate location">

                                                Inaccurate location

                                            </option>

                                            <option value="Inaccurate number of bedrooms">

                                                Inaccurate number of bedrooms

                                            </option>

                                            <option value="Incorrect property type">

                                                Incorrect property type

                                            </option>

                                        </select>

                                    </div>

                                </div>



                                <!-- Textarea -->

                                <div class="form-group">



                                    <div class="col-md-12">

                                        <label for="textarea">Additional Comments</label>

                                        <textarea class="form-control" id="u_msg" name="u_msg"></textarea>

                                    </div>

                                </div>



                            </fieldset>

                        </form>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-danger" onclick="submit_report_data()">Send Report</button>

            </div>

        </div>

    </div>

</div>



<!----- end report modal  ----> 

<!----- Chat Modal modal  ---->

<div id="chatModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-comment"></span>&nbsp;Chat - Owner</h4> 
        <input type="hidden" id="HiddenPrpertyId"/> 
        <input type="hidden" id="ArgentID"/> 
        <input type="hidden" id="userID" value="<?php echo $this->session->userdata('empID'); ?>"/>

      </div>
      <div class="modal-body">
      <div class="row chat-window fluid" id="chat_window_1" >
        <div class="col-xs-12 col-md-12">
        	<div class="panel panel-default">
                  <div class="msg_container_base col-md-12">
                   
                    
                   
                 
                   
                    
                    
                </div>
                <div class="panel-footer col-md-12">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
                        </span>
                    </div>
                </div>
    		</div>
        </div>
    </div>
    
    <div class="btn-group dropup">
        <!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-cog"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#" id="new_chat"><span class="glyphicon glyphicon-plus"></span> Novo</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-list"></span> Ver outras</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-remove"></span> Fechar Tudo</a></li>
            <li class="divider"></li>
            <li><a href="#"><span class="glyphicon glyphicon-eye-close"></span> Invisivel</a></li>
        </ul> -->
    </div>
      </div>
     
    </div>

  </div>
</div>

<!----- end chat modal  ----> 





<script src="<?php echo base_url('assets/system/') ?>js/ie10-viewport-bug-workaround.js"></script>

<!--<script src="<?php /*echo base_url('assets/system/') */ ?>js/owl.carousel.js" type="text/javascript"></script>-->

<script src="<?php echo base_url('assets/system/') ?>js/bootstrap-select.js"></script>

<script src="<?php echo base_url('assets/system/') ?>js/wow.js"></script>

<script src="<?php echo base_url('assets/system/') ?>js/jquery.flexslider.js"></script>

<script src="<?php echo base_url('assets/system/') ?>js/main.js"></script>

<script

        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAHr5u7C9IEnjGBD35cfL0PxDDtNbAaAg&v=3.exp&libraries=places&sensor=false"></script>

<script type="text/javascript">





    var map;

    var map2;

    var infowindow2;

    var propertyData = <?php echo json_encode($property_data) ?>;

    var companyLogo = new google.maps.MarkerImage('<?php echo base_url('assets/system/') ?>images/icon-home.png',

        new google.maps.Size(50, 50),

        new google.maps.Point(0, 0),

        new google.maps.Point(50, 50)

    );

    var schoolLogo = new google.maps.MarkerImage('<?php echo base_url('assets/system/') ?>images/schools.png',

        new google.maps.Size(50, 50),

        new google.maps.Point(0, 0),

        new google.maps.Point(50, 50)

    );

    $(document).ready(function () {

        $(function () {

            SyntaxHighlighter.all();

        });

        $(window).load(function () {

            $('#carousel').flexslider({

                animation: "slide",

                controlNav: false,

                animationLoop: false,

                slideshow: false,

                itemWidth: 100,

                itemMargin: 10,

                asNavFor: '#slider'

            });



            $('#slider').flexslider({

                animation: "slide",

                controlNav: false,

                animationLoop: false,

                slideshow: false,

                sync: "#carousel",

                start: function (slider) {

                    $('body').removeClass('loading');

                }

            });

        });

        google.maps.event.addDomListener(window, 'load', initialize);

        google.maps.event.addDomListener(window, 'load', initialize_school);



        initialize();



        $("a[href='#tab_default_1']").on('shown.bs.tab', function () {

            initialize();

        });



        $("a[href='#tab_default_2']").on('shown.bs.tab', function () {

            initialize_school();

        });

    });



    function showTelNo(id, tel) {

        $("#telNo_" + id).html(tel);

    }



    function showTelNo_2(id, tel) {

        $("#telNo2_" + id).html(tel);

    }



    function initialize() {

        var position = new google.maps.LatLng(propertyData["latitude"], propertyData["longitude"]);

        var mapOptions = {

            zoom: 15,

            /*center: position,*/

            panControl: true,

            panControlOptions: {

                position: google.maps.ControlPosition.LEFT_CENTER

            },



            zoomControl: true,

            zoomControlOptions: {

                style: google.maps.ZoomControlStyle.SMALL,

                position: google.maps.ControlPosition.LEFT_CENTER

            },

            mapTypeId: google.maps.MapTypeId.ROADMAP,

            scaleControl: false,

            scrollwheel: false,

            streetViewControl: true,

        };



        map = new google.maps.Map(document.getElementById('map_amenities'), mapOptions);



        var bounds = new google.maps.LatLngBounds();

        var marker = new google.maps.Marker({

            position: position,

            map: map,

            icon: companyLogo,

            title: "oman",

        });

        //bounds.extend(marker.position);

        bounds.extend(position);

        map.fitBounds(bounds);

        zoomChangeBoundsListener =

            google.maps.event.addListenerOnce(map, 'bounds_changed', function (event) {

                if (this.getZoom()) {

                    this.setZoom(15);

                }

            });

    }



    function initialize_school() {

        var pyrmont = {lat: parseFloat(propertyData["latitude"]), lng: parseFloat(propertyData["longitude"])};

        var mapOptions2 = {

            zoom: 15,

            center: pyrmont,

            panControl: true,

            panControlOptions: {

                position: google.maps.ControlPosition.LEFT_CENTER

            },



            zoomControl: true,

            zoomControlOptions: {

                style: google.maps.ZoomControlStyle.SMALL,

                position: google.maps.ControlPosition.LEFT_CENTER

            },

            mapTypeId: google.maps.MapTypeId.ROADMAP,

            scaleControl: false,

            scrollwheel: false,

            streetViewControl: true,

        };



        map2 = new google.maps.Map(document.getElementById('map_schools'), mapOptions2);



        infowindow2 = new google.maps.InfoWindow();

        var service = new google.maps.places.PlacesService(map2);

        service.nearbySearch({

            location: pyrmont,

            radius: 500,

            type: ['school']

        }, schoolCallback);



        var bounds2 = new google.maps.LatLngBounds();



        var styledMapOptions2 = {

            name: 'Amlak'

        };



    }



    function schoolCallback(results, status) {

        if (status === google.maps.places.PlacesServiceStatus.OK) {

            for (var i = 0; i < results.length; i++) {

                createSchoolMarker(results[i]); //results doesn't contain anything related to type (school,store,etc)

            }

        }

    }



    function createSchoolMarker(place) {

        var placeLoc = place.geometry.location;

        var marker = new google.maps.Marker({

            icon: schoolLogo,

            map: map2,

            position: place.geometry.location

        });





        google.maps.event.addListener(marker, 'click', function () {

            infowindow2.setContent(place.name);

            infowindow2.open(map2, this);

        });

    }



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





</script>



<script>

    $(function () {

        // Enables popover

        $("[data-toggle=popover]").popover({

            animation: false,

            placement: 'auto top'

        });

    });

</script>

<script type="text/javascript">

    var chartData = generateChartData();

    var chart = AmCharts.makeChart("chartdiv", {

        "hideCredits": true,

        "type": "serial",

        "theme": "light",

        "marginRight": 40,

        "marginLeft": 40,

        "autoMarginOffset": 20,

        "mouseWheelZoomEnabled": true,

        "dataDateFormat": "YYYY-MM-DD",

        "valueAxes": [{

            "id": "v1",

            "axisAlpha": 0,

            "position": "left",

            "ignoreAxisWidth": false

        }],

        "balloon": {

            "borderThickness": 1,

            "shadowAlpha": 0

        },

        "graphs": [{

            "id": "g1",

            "balloon": {

                "drop": true,

                "adjustBorderColor": false,

                "color": "#ffffff"

            },

            "bullet": "round",

            "bulletBorderAlpha": 1,

            "bulletColor": "#FFFFFF",

            "bulletSize": 5,

            "hideBulletsCount": 50,

            "lineThickness": 2,

            "title": "red line",

            "useLineColorForBulletBorder": true,

            "valueField": "value",

            "balloonText": "<span style='font-size:18px;'>[[value]]</span>"

        }],

        "chartScrollbar": {

            "enabled": false,

            "graph": "g1",

            "oppositeAxis": false,

            "offset": 30,

            "scrollbarHeight": 80,

            "backgroundAlpha": 0,

            "selectedBackgroundAlpha": 0.1,

            "selectedBackgroundColor": "#888888",

            "graphFillAlpha": 0,

            "graphLineAlpha": 0.5,

            "selectedGraphFillAlpha": 0,

            "selectedGraphLineAlpha": 1,

            "autoGridCount": true,

            "color": "#AAAAAA"

        },

        "chartCursor": {

            "pan": true,

            "valueLineEnabled": true,

            "valueLineBalloonEnabled": true,

            "cursorAlpha": 1,

            "cursorColor": "#258cbb",

            "limitToGraph": "g1",

            "valueLineAlpha": 0.2,

            "valueZoomable": true

        },

        "valueScrollbar": {

            "enabled": false,

            "oppositeAxis": false,

            "offset": 10,

            "scrollbarHeight": 10

        },

        "categoryField": "date",

        "categoryAxis": {

            "parseDates": true,

            "dashLength": 1,

            "minorGridEnabled": true

        },

        "export": {

            "enabled": true

        },

        "dataProvider": chartData

    });



    chart.addListener("rendered", zoomChart);

    chart.validateData();



    zoomChart();



    function zoomChart() {

        chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);

    }



    function generateChartData() {

        var chartData = [];

        //   for ( var i = 0; i < 3; i++ ) {

        /*

        var a = versionList[i];

        var b = countOfVersion[i];

        */

        /*        chartData.push( {

                  date: "2013-01-30",

                  value: 500

                } );*/

        //  }

        //     return chartData;



        var property_id = 2;

        $.ajax({

            type: 'POST',

            dataType: 'json',

            url: "<?php echo site_url('home_controller/get_property_log'); ?>",

            data: 'property_id=' + property_id,

            cache: false,



            success: function (data) {



                //  alert(data.length);



                for (var i = 0; i < data.length; i++) {

                    chartData.push({

                        date: data[i]['date'],

                        value: data[i]['property_price']

                    });

                }



            },

            error: function (jqXHR, textStatus, errorThrown) {



            }

        });

        return chartData





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



    function submit_review_data() {





        $.ajax({

            type: 'POST',

            dataType: 'json',

            url: "<?php echo site_url('home_controller/submit_review_data'); ?>",

            data: $("#form_property_review").serialize(),

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


    function chatModal(propertyId,argentId) {
    var userID=    $('#userID').val();
           if(userID=="" || userID==0){
            $('#loginModal').modal('show');
           }else{
            $('#chatModal').modal('show');
            $('#HiddenPrpertyId').val("");
            $('#ArgentID').val("");
            $('#HiddenPrpertyId').val(propertyId);
            $('#ArgentID').val(argentId);

            Lode_chat_history();
           }
        

    }

    function submit_report_data() {

       

        $.ajax({

            type: 'POST',

            dataType: 'json',

            url: "<?php 
             echo site_url('home_controller/submit_report_data'); ?>",

            data: $("#form_report").serialize(),

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

    function reviewmodal() {



        $('#modal_review').modal('show');

    }

</script>



<script type="text/javascript">

    function reportModal() {

        $('#modal_report').modal('show');

    }

</script>

<script>

    function printDiv() {

        alert('Print temporarily disabled');

         



    }



$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '#new_chat', function (e) {
    var size = $( ".chat-window:last-child" ).css("margin-left");
     size_total = parseInt(size) + 400;
    alert(size_total);
    var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
    clone.css("margin-left", size_total);
});
$(document).on('click', '.icon_close', function (e) {
    //$(this).parent().parent().parent().parent().remove();
    $( "#chat_window_1" ).remove();
});

// -----------------------chat script code strat()-------------------

       $('#btn-chat').on('click',function(){

        send_chat_message();
       
       });

       function send_chat_message(){
              var HiddenPrpertyId= $('#HiddenPrpertyId').val();     
              var ArgentID= $('#ArgentID').val();
              var userID=$('#userID').val();
              var Message=$('#btn-input').val();  

         $.ajax({

            type: "POST",

            url: "<?php echo base_url(); ?>" + "property/save_chat_message",

            data: {HiddenPrpertyId: HiddenPrpertyId,ArgentID:ArgentID,userID:userID,Message:Message},

            dataType: "text",

            cache: false,

            beforeSend: function () {

                // startLoad();

            },

            success: function (data) {
                    // stopLoad();
                    
                    Lode_chat_history();
            },
            error: function (jqXHR, textStatus, errorThrown) {

              alert(jqXHR.responseText);

            }

             });
        } 

      function  Lode_chat_history(){
              var HiddenPrpertyId= $('#HiddenPrpertyId').val();     
              var ArgentID= $('#ArgentID').val();
              var userID=$('#userID').val();


          $.ajax({

              type: 'POST',

              dataType: 'json',
                //Property/getCity
              url: "<?php echo site_url('Property/Lode_chat_history'); ?>",

              data: {HiddenPrpertyId:HiddenPrpertyId,ArgentID:ArgentID,userID:userID},

              cache: false,

              beforeSend: function () {

                  // startLoad();

              },

              success: function (data) {

                $('.msg_container_base').html("");
                var html="";
                $(data.output).each(function (key, val) {

                    if(val.createdBy==userID){
    
                     html+=' <div class="row msg_container base_sent">'+
                          '<div class="col-md-10 col-xs-10">'+
                         '<div class="messages msg_sent">'+
                         ' <p>'+val.message+'</p>'+
                          '<time datetime="2009-11-13T20:00">'+val.Ename1+' •'+val.createdDate+' </time>'+
                         ' </div>'+
                        ' </div>'+
                     '<div class="col-md-2 col-xs-2 avatar">'+
                    ' <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">'+
                     ' </div>'+
                        ' </div>';
                }else if(val.createdBy==ArgentID){

                 html+='<div class="row msg_container base_receive">'+
                 '<div class="col-md-2 col-xs-2 avatar">'+
                 '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">'+
                '</div>'+
                '<div class="col-md-10 col-xs-10">'+
                '<div class="messages msg_receive">'+
                 ' <p>'+val.message+'</p>'+
                 '<time datetime="2009-11-13T20:00">'+val.Ename1+' •'+val.createdDate+' </time>'+
                    ' </div>'+
                  '</div>'+
             ' </div>';
}
                   
                });
               
              
                 $('.msg_container_base').html(html);
                 

              },

              error: function (jqXHR, textStatus, errorThrown) {

                  alert(jqXHR.responseText);

              
              }

          });

      }

// -----------------------chat script code end()---------------------




</script>

