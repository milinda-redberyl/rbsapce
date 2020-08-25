<style>
    /* custom inclusion of right, left and below tabs */

    .tab-pane {
        padding: 10px;
    }

    .tabs-right > .nav-tabs,
    .tabs-left > .nav-tabs {
        border-bottom: 0;
    }

    .tab-content > .tab-pane,
    .pill-content > .pill-pane {
        display: none;
    }

    .tab-content > .active,
    .pill-content > .active {
        display: block;
    }

    .tabs-left > .nav-tabs > li,
    .tabs-right > .nav-tabs > li {
        float: none;
        background: #007096;
    }

    .tabs-left > .nav-tabs > li > a,
    .tabs-right > .nav-tabs > li > a {
        min-width: 74px;
        margin-right: 0;
        margin-bottom: 0px;
    }

    .tabs-left > .nav-tabs {
        float: left;
        margin-right: 19px;
        border-right: 1px solid #ddd;
    }

    .tabs-left > .nav-tabs > li > a {
        margin-right: -1px;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
        padding: 15px;
        color: #ffffff;
    }

    .tabs-left > .nav-tabs > li > a:hover,
    .tabs-left > .nav-tabs > li > a:focus {
        border-color: #eeeeee #dddddd #eeeeee #eeeeee;
        color: #000;
    }

    .tabs-left > .nav-tabs .active > a,
    .tabs-left > .nav-tabs .active > a:hover,
    .tabs-left > .nav-tabs .active > a:focus {
        border-color: #ddd transparent #ddd #ddd;
        color: #2d2d2d;
        /*border-right: solid 2px #0c0c0c;*/
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent;
        border-left: 5px solid #b2b3b2;
    }

    .arrow_box {
        position: relative;
        background: #88b7d5;
        border: 4px solid #c2e1f5;
    }

    .arrow_box:after, .arrow_box:before {
        left: 100%;
        top: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
    }

    .arrow_box:after {
        border-color: rgba(136, 183, 213, 0);
        border-left-color: #88b7d5;
        border-width: 30px;
        margin-top: -30px;
    }

    .arrow_box:before {
        border-color: rgba(194, 225, 245, 0);
        border-left-color: #c2e1f5;
        border-width: 36px;
        margin-top: -36px;
    }

</style>

<?php
//print_r($new_project_data);

$property_id = "";
$property_name = "";
$property_price = "";
$description = "";
$city_name = "";
$total_units = "";
$image1 = "";
$image2 = "";
$longitude = "";
$latitude = "";
$about_company = "";
$company_telephone = "Call Now";
$company_email = "";

$property_id = $new_project_data['property_id'];
$property_name = $new_project_data['property_name'];
$property_price = $new_project_data['property_price'];
$description = $new_project_data['description'];
$city_name = $new_project_data['city_name'];
$total_units = $new_project_data['units'];

if (!empty($new_project_images)) {
    if (isset($new_project_images[0]['image_link'])) {
        $image1 = base_url() . 'uploads/' . $new_project_images[0]['image_link'];
    }
    if (isset($new_project_images[1]['image_link'])) {
        $image2 = base_url() . 'uploads/' . $new_project_images[1]['image_link'];
    }
}

//print_r($new_project_company_details);

if (!empty($new_project_company_details)) {
    $about_company = $new_project_company_details[0]['about_company'];
    $company_telephone = $new_project_company_details[0]['company_telephone'];
    $company_email = $new_project_company_details[0]['company_email'];
}

if (isset($new_project_company_details[0]['companyLogo'])) {
    $companyLogo = base_url() . "uploads/company_image/" . $new_project_company_details[0]['companyLogo'];
} else {
    $companyLogo = base_url() . "uploads/company_image/default-company_image.jpg";
}

?>

<div class="full"
     style="background-image:url('<?php echo $image1; ?>');background-repeat: no-repeat;background-position: 0px;">
    <div class="container">
        <div class="row clearfix">
            <div class="pad-r">
                <div class="col-xs-5 line">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="container-details">
        <div class="row">
            <div class="col-md-8">
                <h2 class="title-m"><?php echo $property_name; ?></h2>
                <div class="ppt-facts">
                    <div class="row pad-bottom-2">
                        <div class="col-md-6 col-sm-12">
                            <div class="set-col-table">
                                <div class="row">
                                    <div class="line-row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <span style="font-size: 13px;">Starting Price</span>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <span style="font-size: 13px;color: red"><?php echo $property_price; ?>
                                                OMR</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="line-row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <span style="font-size: 13px;">Status</span></div>
                                        <div class="col-md-6 col-sm-6">
                                            <span style="font-size: 13px;">Under Construction</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="line-row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <span style="font-size: 13px;">Possession From</span>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <span style="font-size: 13px;">  Q3 2018</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="set-col-table">
                                <div class="row">
                                    <div class="line-row">
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-xs-6">
                                            <span style="font-size: 13px;">Price per sqft from </span>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <span style="font-size: 13px;"> Not yet released</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="line-row">
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-xs-6">
                                            <span style="font-size: 13px;">Total Units</span></div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <span style="font-size: 13px;">  <?php echo $total_units; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="line-row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <span style="font-size: 13px;">Location From</span>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <span style="font-size: 13px;">  <?php echo $city_name; ?></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="lead-generation-right-area">
                    <div class="lead-generation-right">

                        <div class="form-area">
                            <form id="mc-lead-form" novalidate="true">
                                <img class="center-block" style="max-height: 80px;padding: 5px 10px 15px 10px;"
                                     src="<?php echo $companyLogo; ?>"/>
                                <div class="form-group">
                                    <input type="text" class="form-control text-box-in" id="mc_name" name="name"
                                           placeholder="Name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control text-box-in" id="mc_email" name="email"
                                           placeholder="Email address" required="">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control text-box-in" id="mobile" name="mobile"
                                           placeholder="Mobile" required="">
                                </div>

                                <input type="hidden" name="company_email" value="<?php echo $company_email; ?>">

                            </form>

                            <div class="btn-grp">
                                <a onclick="new_project_request_email(<?php echo $property_id; ?>)"
                                   class="btn btn-contact btn_set_inquery"
                                   style="position:  relative;">

                                    Request Details</a>
                            </div>

                            <div class="btn-grp">
                                <a onclick="showTelNumber('<?php echo $company_telephone; ?>')"
                                   class="btn btn-contact btn_set_inquery">
                                    <span class="glyphicon glyphicon-earphone"
                                          style="position:  absolute;font-size: 20px;margin-left: -40px;margin-top: 8px;"></span>
                                    <span id="telNo2">Call Now</span>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <h2 class="title-m">About The Project</h2>

                <p class="p-text-1">
                    <?php echo $description; ?>
                </p>
            </div>
            <div class="col-md-4">
                <h2 class="title-m">Key Features</h2>

                <ul class="remove-s">
                    <?php
                    foreach ($new_project_amenities as $amenity) {
                        ?>
                        <li>
                            <i class="fa fa-check blue" style="color: #07779C;"></i> <span style="font-size: 13px;">
                                <?php echo $amenity['amenity_name']; ?>
                            </span>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

</div>


<div class="full"
     style="background-image:url('<?php echo $image2; ?>');background-repeat: no-repeat;background-position: 0px;">
    <div class="container">
        <div class="row clearfix">
            <div style="padding: 0 0 300px 0;">
                <div class="col-xs-5 line">

                </div>
            </div>
        </div>
    </div>
</div>

<?php
//print_r($new_project_units);

if (!empty($new_project_units)) {

    $units_count = count($new_project_units);

    ?>
    <section>
        <div class="container">
            <div class="container-details">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title-m">&nbsp;</h2>
                    </div>
                    <div class="col-md-12" style="border: solid 1px #ccc;margin-bottom: 25px;">
                        <div class="confg-cover" style="margin-left: -16px;margin-top: -1px;">
                            <!-- tabs left -->
                            <div class="tabbable tabs-left">
                                <ul class="nav nav-tabs">
                                    <li style="text-transform: uppercase;">
                                        <a href="javascript:;">Unit Configuration</a>
                                    </li>
                                    <?php
                                    $unit_tab = 1;
                                    foreach ($new_project_units as $new_project_unit) {
                                        $class = "";
                                        $unit_id = $new_project_unit['id'];
                                        $bed_count = $new_project_unit['bed_count'];
                                        $floor = $new_project_unit['floor'];
                                        $image_type = $new_project_unit['image_type'];
                                        $property_type_name = $new_project_unit['property_type_name'];
                                        $unit_name = $bed_count . ' Bedroom ' . $property_type_name;
                                        $unit_name_sub = $floor . ' ' . $image_type;
                                        if ($unit_tab == 1) {
                                            $class = "active";
                                        }
                                        ?>
                                        <li class="<?php echo $class; ?>">
                                            <a href="#<?php echo $unit_tab; ?>" data-toggle="tab">
                                                <?php echo $unit_name; ?><br>
                                                <span>
                                                    <?php echo $unit_name_sub; ?>
                                                </span>
                                            </a>
                                        </li>
                                        <?php
                                        $unit_tab++;
                                    }
                                    ?>
                                </ul>
                                <div class="tab-content">

                                    <?php

                                    $unit = 1;
                                    foreach ($new_project_units as $new_project_unit) {
                                        $class = "";
                                        $unit_id = $new_project_unit['id'];
                                        $bed_count = $new_project_unit['bed_count'];
                                        $property_type_name = $new_project_unit['property_type_name'];
                                        $size = $new_project_unit['size'];
                                        $floor = $new_project_unit['floor'];
                                        $unit_name = $bed_count . ' Bedroom ' . $property_type_name;
                                        $image_url = base_url() . $new_project_unit['image_url'];
                                        $image_type = $new_project_unit['image_type'];
                                        if ($unit == 1) {
                                            $class = "active";
                                        }

                                        $img_floor = "";
                                        $img_imgtype = "";

                                        if ($new_project_unit['image_url'] != "") {
                                            $trim_imgurl_string = $new_project_unit['image_url'];
                                            $trim_imgurl = substr($trim_imgurl_string, strpos($trim_imgurl_string, "/") + 20);

                                            $imgurl_array = explode("_", $trim_imgurl);
                                            //print_r($imgurl_array);
                                            if (isset($imgurl_array[3])) {
                                                $img_floor = $imgurl_array[1];
                                                $img_imgtype = $imgurl_array[3];
                                            }
                                        }

                                        ?>
                                        <div class="tab-pane <?php echo $class; ?>" id="<?php echo $unit ?>">
                                            <div class="actio_panel" style="display: none;">
                                                VIEW FLOOR :
                                                <select id="floor"
                                                        onchange="imagesetUfloor(this.value, <?php echo $unit ?>);">
                                                    <option value="Firstfloor">First floor</option>
                                                    <option value="Secondfloor">Second floor</option>
                                                    <option value="Thirdfloor">Third floor</option>
                                                    <option value="Fourthfloor">Fourth floor</option>
                                                    <option value="Fifthfloor">Fifth floor</option>
                                                </select>
                                                VIEW THE FLOORPLAN IN
                                                <select id="image_type_<?php echo $unit; ?>">
                                                    <option value="2D">2D</option>
                                                    <option value="3D">3D</option>
                                                </select>
                                                <hr>
                                            </div>
                                            <h4 class="text-center reset-font-1" style="text-transform: capitalize;">
                                                <?php echo $unit_name . ' - ' . $floor . ' ' . $image_type . ' view'; ?>
                                            </h4>
                                            <hr>
                                            <div class="row img_section"
                                                 id="img_<?php echo $img_floor . '_' . $img_imgtype; ?>">
                                                <div class="col-md-6 col-sm-6 col-xm-6">
                                                    <?php //echo $floor; ?>
                                                    <img src="<?php echo $image_url; ?>" class="img-responsive">
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xm-3 pull-right">
                                                    Size : <strong><?php echo $size; ?> sqft</strong>
                                                </div>
                                            </div>

                                        </div>
                                        <?php
                                        $unit++;
                                    }
                                    ?>
                                    <script>
                                        function imagesetUfloor(value, unit) {
                                            var image_type = $("#image_type_" + unit).val();
                                            var section = '#img_' + value + '_' + image_type;
                                            $(".img_section").hide();
                                            $(".tab-pane ").removeClass("active");
                                            $("#" + unit).addClass("active");

                                            $(section).show();
                                        }
                                    </script>
                                </div>
                            </div>
                            <!-- /tabs -->
                        </div>

                    </div>
                </div><!-- /row -->
            </div>
        </div>
    </section>
    <?php
}

?>


<section>
    <div class="container">
        <div class="container-details">
            <div class="row m-set">
                <div class="col-md-3">
                    <div class="pad-3">
                        <img class="center-block" width="100px"
                             src="<?php echo $companyLogo; ?>" alt="">
                    </div>
                </div>
                <div class="col-md-9 c-logo-sec">
                    <p><?php echo $about_company; ?></p>
                </div>
            </div><!-- /row -->
        </div>
    </div>
</section>

<script>
    function showTelNumber(tel) {
        if(tel !== ""){
            $("#telNo2").html(tel);
        } else {
            $("#telNo2").html("Call Now");
        }
        //var tel_s = ":" + tel;
        //$("telNo2").attr("href", tel_s);
    }

    function new_project_request_email(property_id) {
        var data = $("#mc-lead-form").serializeArray();
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: data,
            url: "<?php echo site_url('home_controller/new_project_request_email'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                myAlert(data[0], data[1]);
                clear_req_data();
            }, error: function () {
                alert('An Error Occurred! Please Try Again.');
                stopLoad();
            }
        });
    }

    function clear_req_data() {
        $("#mc_name").val("");
        $("#mc_email").val("");
        $("#mobile").val("");
    }
</script>