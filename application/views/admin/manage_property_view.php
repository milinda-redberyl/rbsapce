<<<<<<< HEAD
<?php

/** Loading Data table Library*/

echo load_lib_dataTable();

?>

<style>

    .list {

        list-style: none;

    }



    hr {

        margin: 0px 0px 10px 0px !important;

    }

    .card.card-xs {

        height: 95px;

        overflow: hidden;

    }

    .card .card-body {

        padding: 2.083rem;

        font-weight: 400;

    }

    .card .card-body .tile-left {

        position: absolute;

    }

    .card .card-body .tile-right {

        text-align: right;

        line-height: 1.618;

    }

    .card .card-body .tile-right .tile-number {

        font-size: 2rem;

        font-weight: 400;

    }

    .card {

        height: 100%;

        box-shadow: 0 9px 23px rgba(0, 0, 0, 0.09), 0 5px 5px rgba(0, 0, 0, 0.06) !important;

        -webkit-transition: box-shadow 0.7s cubic-bezier(0.25, 0.8, 0.25, 1) !important;

        -moz-transition: box-shadow 0.7s cubic-bezier(0.25, 0.8, 0.25, 1) !important;

        -o-transition: box-shadow 0.7s cubic-bezier(0.25, 0.8, 0.25, 1) !important;

        transition: box-shadow 0.7s cubic-bezier(0.25, 0.8, 0.25, 1) !important;

        -webkit-border-radius: 0.4167rem;

        -moz-border-radius: 0.4167rem;

        -ms-border-radius: 0.4167rem;

        -o-border-radius: 0.4167rem;

        border-radius: 0.4167rem;

    }

    .card:hover, .card:focus {

        box-shadow: 0 9px 23px rgba(0, 0, 0, 0.18), 0 5px 5px rgba(0, 0, 0, 0.12) !important;

        cursor: pointer;

    }

    .bg-gradient {

        color: #FFFFFF !important;

        background: #07a7e3;

        background: -moz-linear-gradient(-45deg, #07a7e3 0%, #32dac3 100%);

        background: -webkit-linear-gradient(-45deg, #07a7e3 0%, #32dac3 100%);

        background: linear-gradient(135deg, #07a7e3 0%, #32dac3 100%);

        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=$qp-color-1, endColorstr=$qp-color-2,GradientType=1 );

        -webkit-transition: opacity 0.2s ease-out;

        -moz-transition: opacity 0.2s ease-out;

        -o-transition: opacity 0.2s ease-out;

        transition: opacity 0.2s ease-out;

    }

</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.custom.min.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.min.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/daterangepicker.min.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-colorpicker.min.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/select2/css/select2.min.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colorbox.min.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dropzone/dropzone.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-fileupload/bootstrap-fileupload.min.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/iCheck/all.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/iCheck/square/purple.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.min.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/system/css/style.css"/>

<script src="<?php echo base_url(); ?>assets/dropzone/dropzone.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.colorbox.min.js"></script>

<script src="<?php echo base_url(); ?>assets/iCheck/icheck.js"></script>

<script type="text/javascript"

        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDAHr5u7C9IEnjGBD35cfL0PxDDtNbAaAg&sensor=false&libraries=places"></script>





<?php

$property_pending = "SELECT property.property_type_id FROM property WHERE property.isActive = 0";

$pending_property_r = $this->db->query($property_pending)->result_array();

$pending_property_count = count($pending_property_r);



?>

<div class="row">

    <div class="col-md-12">

        <div class="pending-property-sec">

            <div class="col-md-3 col-lg-3 col-xl-3 mb-5">

                <a href="<?php echo site_url('pending_property') ?>" style="text-decoration: none;">

                    <div class="card card-tile card-xs bg-primary bg-gradient text-center">

                        <div class="card-body p-4">

                            <!-- Accepts .invisible: Makes the items. Use this only when you want to have an animation called on it later -->

                            <div class="tile-left">

                                <i class="fa fa-align-left" style="font-size: 36px;"></i>

                            </div>

                            <div class="tile-right">

                                <div class="tile-number"><?php echo $pending_property_count ?></div>

                                <div class="tile-description">Pending approval property</div>

                            </div>

                        </div>

                    </div>

                </a>

            </div>

        </div>

    </div>

</div>



<div>

    <h3>Manage Property <!--[<i class="fa fa-plus green"></i> <i class="fa fa-pencil-square-o blue"></i> <i

            class="fa fa-times red"></i> ]-->

        <span class="pull-right">

         <button class="btn btn-default btn-xs" type="button" onclick="load_property_table()">Refresh <i

                 class="fa fa-refresh"></i></button>&nbsp;<button class="btn btn-primary btn-xs " type="button"

                                                                  onclick="init_addProperty()">Add Property <i

                    class="fa fa-plus"></i></button>

       </span>

    </h3>

</div>

<!--<h1><?php /*echo generate_property_reference() */?></h1>-->

<table class="table table-striped table-hover" id="property_table">

    <thead>

    <tr>

        <!-- <th>#</th>

        <th>Property Type</th>

        <th>Category Type</th>

        <th><i class="fa fa-home"></i> Property Name</th>

        <th><i class="fa fa-money"></i> Price</th>

        <th>Area</th>

        <th>Address</th>

        <th><i class="fa fa-phone"></i> Telephone</th>

        <th>Permit No</th>

        <th>Reference</th> -->

        <th>Reference</th>

        <th><i class="fa fa-home"></i> Property Name</th>

        <th>Agent</th>

        <th>Telephone</th>

        <th>Company Name</th>

        <th>Status</th>

        <th>&nbsp;</th>

    </tr>

    </thead>

    <tbody>



    </tbody>

</table>



<script>

    $(document).ready(function () {

        load_property_table();

    })



    function load_property_table() {

        $('#property_table').DataTable({

            "bProcessing": true,

            "bServerSide": true,

            "bDestroy": true,

            "StateSave": true,

            "sAjaxSource": "<?php echo site_url('Property/get_property_dataTable'); ?>",

            "aaSorting": [[1, 'desc']],

            "fnInitComplete": function () {



            },

            "fnDrawCallback": function (oSettings) {

                //tableBgColorJs();

            },

            "aoColumns": [

                /*{"mData": "property_id"},

                {"mData": "property_type_name"},

                {"mData": "category_name"},

                {"mData": "property_name"},

                {"mData": "property_price"},

                {"mData": "area"},

                {"mData": "property_address"},

                {"mData": "telephone_number"},

                {"mData": "permit_No"},

                {"mData": "reference"},*/

                {"mData": "reference"},

                {"mData": "property_name"},

                {"mData": "Ename1"},

                {"mData": "telephone_number"},

                {"mData": "company_name"},

                {"mData": "property_active_status"},

                {"mData": "btn_set"}

            ],

            "fnServerData": function (sSource, aoData, fnCallback) {

                aoData.push({'name': 'menuCatID', 'value': ''});

                $.ajax({

                    'dataType': 'json',

                    'type': 'POST',

                    'url': sSource,

                    'data': aoData,

                    'success': fnCallback

                });

            }

        });

    }



    function init_addProperty() {

        $("#modal_addManageProperty").modal('show');

        initialize_map(6.927079, 79.861244);

    }

</script>



<!--Drop Zone code -->

<!--<div style="z-index: 100000 !important;

    position: inherit;" >

    <form action="ajax/dms-draganddrop-upload.php" class="dropzone"

          id="myawesomedropzone"></form>

</div>-->



<!--Modal Assign  Amenities -->

<div class="modal" data-backdrop="static" id="modal_assignAmenities" role="dialog">

    <div class="modal-dialog modal-lg" style="width:50%">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

                        aria-hidden="true">&times;</span></button>

                <h4 class="modal-title">Assign Amenities</h4>

            </div>

            <div class="modal-body">

                <div id="sysnc">

                    <div class="table-responsive">

                        <table id="amenities_sync" class="table table-striped table-condensed">

                            <thead>

                            <tr>

                                <th style="min-width: 10%">#</th>

                                <th style="min-width: 80%">Name</th>

                                <th style="min-width: 10%">&nbsp;

                                    <button type="button" data-text="Add" onclick="add_property_amenities()"

                                            class="btn btn-xs btn-primary">

                                        <i class="fa fa-plus" aria-hidden="true"></i> Assign Amenities

                                    </button>

                                </th>

                            </tr>

                            </thead>

                        </table>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>

            </div>

        </div>

    </div>

</div>



<!--Modal Add Property -->

<div class="modal " data-backdrop="static" id="modal_addManageProperty" role="dialog">

    <div class="modal-dialog modal-lg" style="margin-top: 6px;">

        <div class="modal-content">

            <div class="modal-header modal-header-mini" style="padding: 5px 10px;">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true"

                          style="color:red;">&times;</span>

                </button>

                <h4 class="modal-title"><i class="fa fa-building-o"></i> Add Property </h4></div>

            <div class="modal-body" style="min-height: 200px; ">

                <form role="form" enctype="multipart/form-data" id="from_property" class="form-horizontal">

                    <input type="hidden" value="0" id="property_id" name="property_id">



                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                            <div class="form-group">

                                <label class="col-sm-6 control-label no-padding-right" for="category_type_id">

                                    <?php echo required() ?> Category

                                    Type</label>



                                <div class="col-sm-6">

                                    <?php

                                    $category_list = drop_category_type();

                                    echo form_dropdown('category_type_id', $category_list, '1', 'class="chosen-select form-control" id="category_type_id"');

                                    ?>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                            <div class="form-group">

                                <label class="col-sm-6 control-label no-padding-right" for="property_type_id" data-toggle="tooltip" data-placement="top" title="Make sure you post in the correct type">

                                    <?php echo required() ?> Property

                                    Type</label>



                                <div class="col-sm-6">

                                    <?php

                                    $property_list = drop_property_type();

                                    echo form_dropdown('property_type_id', $property_list, '', 'class="chosen-select form-control" id="property_type_id"');

                                    ?>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                            <div class="form-group">

                                <label class="col-sm-6 control-label no-padding-right" for="furniture_type_id">

                                    <?php echo required() ?> Furniture Type </label>



                                <div class="col-sm-6">

                                    <?php

                                    $furniture_list = drop_furniture_type();

                                    echo form_dropdown('furniture_type_id', $furniture_list, '', 'class="chosen-select form-control" id="furniture_type_id"');

                                    ?>

                                </div>

                            </div>

                        </div>



                    </div>



                    <hr>



                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="form-group">

                                <label class="col-md-2 control-label" for="property_name" data-toggle="tooltip" data-placement="top" title="Keep it short and catchy!"><?php echo required() ?>

                                    Name </label>



                                <div class="col-sm-10">

                                    <input name="property_name" id="property_name" class="form-control"/>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="form-group">

                                <label class="col-md-2 control-label" for="description"  data-toggle="tooltip" data-placement="top" title="More details = more responses!"><?php echo required() ?>

                                    Description </label>



                                <div class="col-sm-10">

                                    <textarea name="description" id="description" cols="30" rows="2"

                                              class="form-control"></textarea>

                                    <!--<input type="text" id="description" placeholder="description"  />-->

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="city_id"  data-toggle="tooltip" data-placement="top" title="Make sure you select the correct city of the property"> City </label>



                                <div class="col-sm-8">

                                    <?php

                                    $city_list = drop_getCity();

                                    echo form_dropdown('city_id', $city_list, '', 'class="chosen-select form-control" id="city_id"');

                                    ?>

                                </div>

                            </div>

                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="permit_No"> Bed count </label>



                                <div class="col-sm-8">

                                    <?php

                                    $bedType_list = drop_getBedType();

                                    echo form_dropdown('bed_type_id', $bedType_list, '', 'class="chosen-select form-control" id="bed_type_id"');

                                    ?>

                                </div>

                            </div>

                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="city_id"> Bathroom count </label>



                                <div class="col-sm-8">

                                    <?php

                                    $bath_list = drop_getBathroom();

                          echo form_dropdown('bathroom_type_id', $bath_list, '', 'class="chosen-select form-control" id="bathroom_type_id"');

                                    ?>

                                </div>

                            </div>

                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="permit_No"> Units </label>



                               <div class="col-sm-8">

                                    <input type="text" id="units" name="units" placeholder="units" class="form-control"/>

                                </div>

                            </div>

                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="property_price"  data-toggle="tooltip" data-placement="top"  title="Pick a rate. If it is negotiable select the tick box"><?php echo required() ?>

                                    Price </label>



                                <div class="col-sm-4">

                                    <input type="text" id="property_price" name="property_price" placeholder="Price"

                                           class="form-control"/>

                                </div>

                                <div class="col-sm-4">

                                    <input type="checkbox" name="price_negotiable" value="1" /> Negotiable

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="area" data-toggle="tooltip" data-placement="top" title="Enter the size in sq. ft"> Area sq.ft</label>



                                <div class="col-sm-8">

                                    <input type="text" id="area" name="area" placeholder="area" class="form-control"/>

                                </div>

                            </div>

                        </div>
						
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="Floor" data-toggle="tooltip" data-placement="top" title="Floor"> Floor</label>



                                <div class="col-sm-8">

                                    <input type="text" id="floor" name="floor" placeholder="Floor count" class="form-control"/>

                                </div>

                            </div>

                        </div>
						
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="Energy" data-toggle="tooltip" data-placement="top" title="Energy"> Energy</label>



                                <div class="col-sm-8">

                                    <input type="text" id="energy" name="energy" placeholder="Energy" class="form-control"/>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="rent_duration"> Rent Duration </label>



                                <div class="col-sm-8">

                                    <input type="text" id="rent_duration" name="rent_duration"

                                           placeholder="Rent Duration"

                                           class="form-control"/>

                                </div>

                            </div>

                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="property_address" data-toggle="tooltip" data-placement="top" title="Enter the street, house no. and/or post code."> Address </label>



                                <div class="col-sm-8">

                                    <input type="text" id="property_address" name="property_address"

                                           placeholder="Address"

                                           class="form-control"/>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="telephone_number"> <i

                                        class="fa fa-phone"></i><?php echo required() ?> Telephone </label>



                                <div class="col-sm-8">

                                    <input type="text" id="telephone_number" name="telephone_number" placeholder="Tel"

                                           class="form-control" maxlength="10"/>

                                </div>

                            </div>

                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="mobile_number"> Mobile </label>



                                <div class="col-sm-8">

                                    <input type="text" id="mobile_number" name="mobile_number" placeholder="Mobile"

                                           class="form-control" maxlength="10" />

                                </div>

                            </div>

                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="permit_No"> Permit No </label>



                                <div class="col-sm-8">

                                    <input type="text" id="permit_No" name="permit_No" placeholder="Permit No"

                                           class="form-control"/>

                                </div>

                            </div>

                        </div>
						
						
						
						 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="car_parking_space"> Car parking spaces </label>



                                <div class="col-sm-8">

                                    <input type="number" id="car_parking_space" name="car_parking_space" placeholder="Add count"

                                           class="form-control"/>

                                </div>

                            </div>

                        </div>



                          <!-- sold / rented section ---- -->

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="property_availability"> Property Availability </label>



                                <div class="col-sm-8">

                                    <input type="text" id="property_availability" name="property_availability" placeholder="Available / Not Available"

                                           class="form-control"/>

                                </div>

                            </div>

                        </div>
						
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="bill_included"> Bills included?  </label>



                                <div class="col-sm-8">

                                    <!--<input type="text" id="bill_included" name="bill_included" placeholder="Yes/No"

                                           class="form-control"/>-->
										   <p>
												<input type="radio" name="bill_included" value="Yes" checked> Yes</input>
											</p>
											<p>
												<input type="radio" name="bill_included" value="No" > No</input>
											</p>

                                </div>

                            </div>

                        </div>
						
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="deposit_period"> Deposit Period</label>



                                <div class="col-sm-8">

                                    <input type="number" id="deposit_period" name="deposit_period" placeholder="Add No of months"

                                           class="form-control"/>

                                </div>

                            </div>

                        </div>



                        <!-- sold / rented section ---- -->



                        <!--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="reference"> Reference</label>



                                <div class="col-sm-8">

                                    <input type="text" readonly id="reference" name="reference" placeholder="reference"

                                           class="form-control" value="<?php /*echo generate_property_reference(); */?>" onfocus="set_reference()"/>

                                </div>

                            </div>

                        </div>-->



                        <?php if ($this->session->userdata('isSystemAdmin') == 1) { ?>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                <div class="form-group">

                                    <label class="col-md-4 control-label" for="agent_id"> Partner</label>

                                    <div class="col-sm-8">

                                        <?php

                                        $partner_list = drop_allPartner();

                                       // var_dump($agent_list);

                                        echo form_dropdown('agent_id', $partner_list, '', 'class="chosen-select form-control" id="agent_id" ');

                                        ?>



                                    </div>

                                </div>

                            </div>

                        <?php } ?>



                        <?php if ($this->session->userdata('isAgent') == 1) {

                            $empID = $this->session->userdata('empID');

                            $empName = $this->session->userdata('empname');

                            ?>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                <div class="form-group">

                                    <label class="col-md-4 control-label hide" for="agent_id"> Agent </label>

                                    <div class="col-sm-8">

                                        <input type="hidden" data-id="<?php echo $empName; ?>" id="agent_id"

                                               name="agent_id" class="form-control agent_id"

                                               value="<?php echo $empID; ?>"/>

                                    </div>

                                </div>

                            </div>

                        <?php } ?>



                        <?php if (isCompany()) {

                            ?>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                <div class="form-group">

                                    <label class="col-md-4 control-label" for="agent_id"> Agent </label>

                                    <div class="col-sm-8">

                                        <?php

                                        $agent_list = drop_allAgent();

                                        echo form_dropdown('agent_id', $agent_list, '', 'class="chosen-select  form-control" id="agent_id"');

                                        ?>

                                    </div>

                                </div>

                            </div>



                        <?php } ?>



                      



                    </div>
					
					
					<div class="row">
					
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h4 class="h4-bg-title">Add details about rental</h4>
						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="Rental Period" data-toggle="tooltip" data-placement="top" title="Rental Period"> Rental Period</label>



                                <div class="col-sm-8">

                                    <input type="text" id="rental_period" name="rental_period" placeholder="Ex: Unlimited" class="form-control"/>

                                </div>

                            </div>

                        </div>
						
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="Monthly rent" data-toggle="tooltip" data-placement="top" title="Monthly rent"> Monthly rent</label>



                                <div class="col-sm-8">

                                    <input type="text" id="monthly_rent" name="monthly_rent" placeholder="Ex: USD 1,000.00" class="form-control"/>

                                </div>

                            </div>

                        </div>
						
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="Security deposit" data-toggle="tooltip" data-placement="top" title="Security deposit"> Security deposit</label>



                                <div class="col-sm-8">

                                    <input type="text" id="security_deposit" name="security_deposit" placeholder="Ex: USD 6,000.00" class="form-control"/>

                                </div>

                            </div>

                        </div>
						
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="Occupancy Rate" data-toggle="tooltip" data-placement="top" title="Occupancy Rate"> Occupancy Rate</label>



                                <div class="col-sm-8">

                                    <input type="text" id="occupancy_rate" name="occupancy_rate" placeholder="Ex: USD 500.00" class="form-control"/>

                                </div>

                            </div>

                        </div>
						
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="Takeover Date" data-toggle="tooltip" data-placement="top" title="Takeover Date"> Takeover Date</label>



                                <div class="col-sm-8">

                                    <input type="date" id="takeover_date" name="takeover_date" placeholder="Takeover Date" class="form-control"/>

                                </div>

                            </div>

                        </div>
						
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="Advances" data-toggle="tooltip" data-placement="top" title="Advances"> Advances</label>



                                <div class="col-sm-8">

                                    <input type="text" id="advances" name="advances" placeholder="Ex: USD 5,000.00" class="form-control"/>

                                </div>

                            </div>

                        </div>
						
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="Prepaid rent" data-toggle="tooltip" data-placement="top" title="Prepaid rent"> Prepaid rent</label>



                                <div class="col-sm-8">

                                    <input type="text" id="prepaid_rent" name="prepaid_rent" placeholder="Ex: USD 5,000.00" class="form-control"/>

                                </div>

                            </div>

                        </div>
						
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div class="form-group">

                                <label class="col-md-4 control-label" for="Creation date" data-toggle="tooltip" data-placement="top" title="Creation date"> Creation date</label>



                                <div class="col-sm-8">

                                    <input type="date" id="creation_date" name="creation_date" placeholder="Creation date" class="form-control"/>

                                </div>

                            </div>

                        </div>
					
					</div>



                    <div id="google_map">

                        <div class="row">
						
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h4 class="h4-bg-title">Set loaction</h4>
						</div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                <div class="col-xs-12 col-sm-12">

                                    <div id="map_canvas" style="height: 450px"></div>

                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top: 10px">

                                    <div class="form-group">

                                        <label class="col-md-4 control-label" for="long" data-toggle="tooltip" data-placement="top" title="You can pick choose the exact location of the property"> Long </label>



                                        <div class="col-sm-8">

                                            <input type="text" id="long" name="longitude" placeholder="Long"

                                                   class="form-control" value="23.58589"

                                                   onchange="changeMarkerPosition()"/>

                                        </div>

                                    </div>

                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top: 10px">

                                    <div class="form-group">

                                        <label class="col-md-4 control-label" for="lat"> Lat </label>



                                        <div class="col-sm-8">

                                            <input type="text" id="lat" name="latitude" placeholder="Lat"

                                                   class="form-control" value="58.4059227"

                                                   onchange="changeMarkerPosition()"/>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <hr>

                    <div id="property_other_detail" style="display: none;">

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                <hr>

                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                <h4>Images </h4>

                                <input multiple="" type="file" id="upload_image" name="upload_image"/>



                                <ul class="ace-thumbnails clearfix" id="imagesSetList">

                                    <li>

                                        <a href="<?php echo base_url() ?>assets/images/gallery/image-1.jpg"

                                           title="Photo Title" data-rel="colorbox">

                                            <img style="max-height: 100px;" alt="150x150"

                                                 src="<?php echo base_url() ?>assets/images/gallery/thumb-1.jpg"/>

                                        </a>



                                        <div class="tools">

                                            <a href="#">

                                                <i class="ace-icon fa fa-times red"></i>

                                            </a>

                                        </div>

                                    </li>

                                    <li>

                                        <a href="<?php echo base_url() ?>assets/images/gallery/image-1.jpg"

                                           title="Photo Title" data-rel="colorbox">

                                            <img style="max-height: 100px;" alt="150x150"

                                                 src="<?php echo base_url() ?>assets/images/gallery/thumb-1.jpg"/>

                                        </a>



                                        <div class="tools">

                                            <a href="#">

                                                <i class="ace-icon fa fa-times red"></i>

                                            </a>

                                        </div>

                                    </li>



                                </ul>

                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                <h4>

                                    Amenities

                                    <button class="btn btn-default btn-primary btn-xs pull-right" type="button"

                                            onclick="amenities_assign_model()">Assign Amenities

                                    </button>

                                </h4>

                                <div id="div_amenities_added">

                                </div>



                            </div>



                        </div>

                    </div>





                   <!-- <?php if ($this->session->userdata('isSystemAdmin') == 1) { ?>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="form-group">

                                <div class="col-sm-8">

                                    <input type="hidden" id="active_property"

                                           name="active_property" class="form-control active_property"

                                           value="1"/>

                                </div>

                            </div>

                        </div>

                    <?php } ?>



                    <?php if ($this->session->userdata('isPartner') == 1) { ?>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="form-group">

                                <div class="col-sm-8">

                                    <input type="hidden" id="active_property"

                                           name="active_property" class="form-control active_property"

                                           value="0"/>

                                </div>

                            </div>

                        </div>

                    <?php } ?>-->



                    <hr>



                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">



                            <div class="form-group">

                                <label class="col-md-10 control-label no-padding-right"> &nbsp; </label>



                                <div class="col-sm-2">

                                    <button class="btn btn-primary btn-xs" type="button" onclick="save_property()">

                                        <i class="fa fa-floppy-o"></i> Save

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

            <div class="modal-footer" style="padding: 5px 10px;">

                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>

            </div>

        </div>

    </div>

</div>



<script>

    /** modal related scripts */



    var map;

    var marker;

    var selectedItemsSync = [];

    var infowindow = new google.maps.InfoWindow();



    $(document).ready(function () {

        $('.select2').select2();



        $('.modal').on('hidden.bs.modal', function (e) {

            if ($('.modal').hasClass('in')) {

                $('body').addClass('modal-open');

            }

        });



        /*Dropzone.options.myawesomedropzone = {

         paramName: "file",

         maxFilesize: 5, // MB

         maxFiles: 50,



         acceptedFiles: "image/jpeg, image/jpg, image/png",

         accept: function (file, done) {

         done();

         },

         init: function () {

         thisDropzone = this;



         this.on("queuecomplete", function (file) {

         console.log(file);



         });



         this.on("complete", function (file) {

         setTimeout(function () {

         thisDropzone.removeFile(file);

         }, 500);



         });



         }, queuecomplete: function (file) {

         GetFiles($("#dd_companyID").val(), $("#dd_parentFolderID").val())

         },

         };*/

 /**********

        $('#upload_image').ace_file_input({

            style: 'well',

            btn_choose: 'Drop Image here or click to choose',

            btn_change: null,

            no_icon: 'ace-icon fa fa-image',

            droppable: true,

            thumbnail: 'small'//large | fit

            //,icon_remove:null//set null, to hide remove/reset button

            /**,before_change:function(files, dropped) {

						//Check an example below

						//or examples/file-upload.html

						return true;

					}*/

            /**,before_remove : function() {

						return true;

					}*/

           

    /**********   ,      preview_error: function (filename, error_code) {

                //name of the file that failed

                //error_code values

                //1 = 'FILE_LOAD_FAILED',

                //2 = 'IMAGE_LOAD_FAILED',

                //3 = 'THUMBNAIL_FAILED'

                //alert(error_code);

            }       ****************/



    /********    }).on('change', function () {

            //console.log($(this).data('ace_input_files'));

            //console.log($(this).data('ace_input_method'));

        });***********/



        $('#upload_image').ace_file_input({

            style: 'well',

            btn_choose: 'Drop Image here or click to choose',

            btn_change: null,

            no_icon: 'ace-icon fa fa-image',

            droppable: true,

            thumbnail: 'large',//large | fit

            maxSize: 500000//bytes

            //,icon_remove:null//set null, to hide remove/reset button

            ,before_change:function(files, dropped) {

                //Check an example below

                //or examples/file-upload.html

                var file = files[0];

                if(file.size > 60000000){

                    return true;

                } else {

                    alert('Invalid file dimensions/size! Minimum size 60KB & Minimum dimensions 760*430');

                    return false;

                }

            }

            /**,before_remove : function() {

                        return true;

                    }*/

            // ,

            preview_error: function (filename, error_code) {

                //name of the file that failed

                //error_code values

                //1 = 'FILE_LOAD_FAILED',

                //2 = 'IMAGE_LOAD_FAILED',

                //3 = 'THUMBNAIL_FAILED'

                //alert(error_code);

            }



        }).on('file.error.ace', function(ev, info) {

            if(info.error_count['ext'] || info.error_count['mime']) alert('Invalid file type! Please select an image!');

            if(info.error_count['size']) alert('Invalid file dimensions/size! Minimum size 60KB & Minimum dimensions 760*430');

            

            //you can reset previous selection on error

            //ev.preventDefault();

            //file_input.ace_file_input('reset_input');

        });





        initGalary();



        $(document).one('ajaxloadstart.page', function (e) {

            $('#colorbox, #cboxOverlay').remove();

        });





        $('#modal_addManageProperty').on('hidden.bs.modal', function () {

            clearProperty();

        });



        //google.maps.event.addDomListener(window, "load", initialize_map);



    });



    $(document).on('show.bs.modal', '.modal', function () {

        var zIndex = 1040 + (10 * $('.modal:visible').length);

        $(this).css('z-index', zIndex);

        setTimeout(function () {

            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');

        }, 0);

    });



        function initialize_map(lat, long) {

        var myLatlng = new google.maps.LatLng(23.58589, 58.4059227);

        var myOptions = {zoom: 13, center: myLatlng, mapTypeId: google.maps.MapTypeId.ROADMAP}

        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        var manualLatlng = new google.maps.LatLng(lat, long);

        var companyLogo = new google.maps.MarkerImage('<?php echo base_url('assets/system/') ?>images/icon-home.png',

            new google.maps.Size(50, 50),

            new google.maps.Point(0, 0),

            new google.maps.Point(50, 50)

        );



        // Bounds for Oman

        var strictBounds = new google.maps.LatLngBounds(

            new google.maps.LatLng(17.01505, 54.09237),

            new google.maps.LatLng(26.17993, 59.52889),

        );



        var markerOptions = {map: map, position: manualLatlng, icon: companyLogo, draggable: true};

        marker = setMarker(markerOptions);

        google.maps.event.addListener(marker, "drag", function (event) {

            setGeoLocation(event.latLng.lat(), event.latLng.lng());

        });

        //map.fitBounds(strictBounds);

        map.panTo(new google.maps.LatLng(lat, long));

    }



    function setMarker(markerOptions) {

        var markerPoint = new google.maps.Marker(markerOptions);

        return markerPoint;

    }



    function changeMarkerPosition() {

        var long = $('#long').val();

        var lat = $('#lat').val();



        var latlng = new google.maps.LatLng(lat, long);

        marker.setPosition(latlng);

        map.panTo(new google.maps.LatLng(lat, long));

    }





    function setGeoLocation(lat, long) {

        $("#long").val(long);

        $("#lat").val(lat);

    }



    function save_property() {

        $("#from_property").ajaxForm(

            {

                type: 'post',

                dataType: 'json',

                contentType: false,

                cache: false,

                mimeType: "multipart/form-data",

                processData: false,

                url: '<?php echo site_url('Property/save_property'); ?>',

                data: $("#frm_upload_file").serialize(),

                beforeSend: function () {

                    startLoad();

                },

                success: function (data) {



                    stopLoad();

                    if (data['error'] == 1) {

                        myAlert('d', data['message']);

                    } else if (data['error'] == 0) {

                        $("#property_id").val(data['property_id']);

                        $("#property_other_detail").show();

                        $(".remove").click();

                        load_property_images(data['property_id']);

                        myAlert('s', data['message']);

                    }

                },



                uploadProgress: function (event, position, total, percentComplete) {

                    $("#upload-progress").removeClass("hide");

                    var percentVal = percentComplete + '%';

                    $("#upload-progress .bar").width(percentVal);

                    $("#upload_prgress_info").show();

                    $("#upload_prgress_info").html('Uploading ' + percentVal);



                },

                error: function (jqXHR, textStatus, errorThrown) {

                    stopLoad();

                    myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)

                }

            }).submit();



        /**$.ajaxForm({

            type: 'POST',

            dataType: 'json',

            contentType: false, // Added

            mimeType: "multipart/form-data", // Added

            processData: false, // Added

            url: "<?php //echo site_url('Property/save_property'); ?>",

            data: $("#from_property").serialize(),

            cache: false,

            beforeSend: function () {

                startLoad();



            },

            uploadProgress: function (event, position, total, percentComplete) {

                $("#upload-progress").removeClass("hide");

                var percentVal = percentComplete + '%';

                $("#upload-progress .bar").width(percentVal);

                $("#upload_prgress_info").show();

                $("#upload_prgress_info").html('Uploading ' + percentVal);



            },

            success: function (data) {

                stopLoad();

                if (data['error'] == 1) {

                    myAlert('d', data['message']);

                } else if (data['error'] == 0) {

                    $("#property_id").val(data['property_id']);

                    $("#property_other_detail").show();

                    myAlert('s', data['message']);

                }

            },

            error: function (jqXHR, textStatus, errorThrown) {

                stopLoad();

                myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)

            }

        });*/

    }



    function initGalary() {

        /*Gallary */



        var $overflow = '';

        var colorbox_params = {

            rel: 'colorbox',

            reposition: true,

            scalePhotos: true,

            scrolling: false,

            previous: '<i class="ace-icon fa fa-arrow-left"></i>',

            next: '<i class="ace-icon fa fa-arrow-right"></i>',

            close: '&times;',

            current: '{current} of {total}',

            maxWidth: '100%',

            maxHeight: '100%',

            onOpen: function () {

                $overflow = document.body.style.overflow;

                document.body.style.overflow = 'hidden';

            },

            onClosed: function () {

                document.body.style.overflow = $overflow;

            },

            onComplete: function () {

                $.colorbox.resize();

            }

        };



        $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);

        $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon



    }



    function load_property(id) {

        $.ajax({

            type: 'POST',

            dataType: 'json',

            url: "<?php echo site_url('Property/load_property'); ?>",

            data: {id: id},

            cache: false,

            beforeSend: function () {

                startLoad();

            },

            success: function (data) {

                stopLoad();

                if (data['error'] == 0) {

                    $("#modal_addManageProperty").modal('show');

                    if (data['output']['longitude'] != "" && data['output']['latitude'] != "") {

                        initialize_map(data['output']['latitude'], data['output']['longitude']);

                    } else {

                        initialize_map(6.927079, 79.861244);

                    }



                    /*console.log(data['output']);

                     return false;*/

                    $("#property_id").val(data['output']['property_id']);

                    $("#property_type_id").val(data['output']['property_type_id']).change();

                    $("#city_id").val(data['output']['city_id']).change();

                    $("#bed_type_id").val(data['output']['bed_type_id']).change();

                    $("#furniture_type_id").val(data['output']['furniture_type_id']).change();

                    $("#category_type_id").val(data['output']['category_type_id']).change();

                    $("#agent_id").val(data['output']['agent_id']).change();

                    $("#property_name").val(data['output']['property_name']);

                    $("#description").val(data['output']['description']);

                    $("#property_price").val(data['output']['property_price']);

                    $("#area").val(data['output']['area']);

                    $("#rent_duration").val(data['output']['rent_duration']);

                    $("#property_address").val(data['output']['property_address']);

                    $("#telephone_number").val(data['output']['telephone_number']);

                    $("#mobile_number").val(data['output']['mobile_number']);

                    $("#permit_No").val(data['output']['permit_No']);
					
					$("#property_availability").val(data['output']['property_availability']);
					
					$("#deposit_period").val(data['output']['deposit_period']);
					
					$("#car_parking_space").val(data['output']['car_parking_space']);
					
					$("#rental_period").val(data['output']['rental_period']);
					
					$("#security_deposit").val(data['output']['security_deposit']);
					
					$("#takeover_date").val(data['output']['takeover_date']);
					
					$("#prepaid_rent").val(data['output']['prepaid_rent']);
					
					$("#monthly_rent").val(data['output']['monthly_rent']);
					
					$("#occupancy_rate").val(data['output']['occupancy_rate']);
					
					$("#advances").val(data['output']['advances']);
					
					$("#creation_date").val(data['output']['creation_date']);

                    $("#reference").val(data['output']['reference']);

                    $("#long").val(data['output']['longitude']);

                    $("#lat").val(data['output']['latitude']);

                    $("#property_other_detail").show();

                    $("#property_other_detail").show();

                    fetch_property_amenities_details();

                    load_property_images(data['output']['property_id']);

                    $(".chosen-select").trigger("chosen:updated");

                } else if (data['error'] == 1) {

                    myAlert('e', data['message']);

                }

            },

            error: function (jqXHR, textStatus, errorThrown) {

                stopLoad();

                myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)

            }

        });

    }



    function delete_single_property(id) {





        swal({

            title: 'Are you sure',

            text: 'You want to delete this ?',

            type: 'warning',

            showCancelButton: true,

            confirmButtonColor: "#DD6B55",

            confirmButtonText: 'Yes, delete it!',

            cancelButtonText: 'No, keep it'

        }).then((result) => {

            if (result.value) {

                $.ajax({

                    type: 'POST',

                    dataType: 'json',

                    url: "<?php echo site_url('Property/delete_single_property'); ?>",

                    data: {id: id},

                    cache: false,

                    beforeSend: function () {

                        startLoad();

                    },

                    success: function (data) {

                        myAlert('s', 'Deleted Successfully');

                        stopLoad();

                         setTimeout(function() {

                             window.location.reload();

                         }, 3000);

                    },

                    error: function (jqXHR, textStatus, errorThrown) {

                        stopLoad();

                        myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)

                    }

                });

                // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'

            }

            else if (result.dismiss === 'cancel') {

                swal(

                    'Cancelled',

                    'Your record is safe :)',

                    'error'

                )

            }

        })

    }



    function load_property_images(id) {

        var path = '<?php echo base_url('uploads/')?>';

        $.ajax({

            type: 'POST',

            dataType: 'json',

            url: "<?php echo site_url('Property/load_property_images'); ?>",

            data: {id: id},

            cache: false,

            beforeSend: function () {

                startLoad();

                $("#imagesSetList").empty();



            },

            success: function (data) {

               stopLoad();

                if (data['error'] == 0) {



                    $.each(data['output'], function (key, value) {

                        var imglink = value['image_link'];

                        var property_img_id = value['property_image_id'];

                        var htmlSet = '<li> <a href="' + path + imglink + '" title="Photo Title" data-rel="colorbox"> <img style="max-height: 100px; max-width: 100px" alt="150x150" src="' + path + imglink + '"/> </a>  <div class="tools"> <a href="#" onclick="delete_img('+property_img_id+')"> <i class="ace-icon fa fa-times red"></i> </a> </div> </li>';

                        $("#imagesSetList").append(htmlSet);



                    });

                    initGalary();

                } else if (data['error'] == 1) {



                }

            },

            error: function (jqXHR, textStatus, errorThrown) {

                stopLoad();

                myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)

            }

        });

    }



    function clearProperty() {

        $("#property_id").val(0);

        $("#property_type_id").val('').change();

        $("#bed_type_id").val('').change();

        $("#furniture_type_id").val('').change();

        $("#category_type_id").val(1).change();

        $("#property_name").val('');

        $("#description").val('');

        $("#property_price").val('');

        $("#area").val('');

        $("#rent_duration").val('');

        $("#property_address").val('');

        $("#telephone_number").val('');

        $("#mobile_number").val('');

        $("#permit_No").val('');
		
		$("#car_parking_space").val('');
		
		$("#property_availability").val('');
		
		$("#deposit_period").val('');

        $("#reference").val('');

        $("#property_other_detail").hide();

        $(".chosen-select").trigger("chosen:updated");

    }



    function amenities_assign_model() {

        selectedItemsSync = [];

        load_property_amenities_table();

        $('#modal_assignAmenities').modal('show');

    }



    function load_property_amenities_table() {

        $('#amenities_sync').DataTable({

            "bProcessing": true,

            "bServerSide": true,

            "bDestroy": true,

            "StateSave": true,

            "sAjaxSource": "<?php echo site_url('Property/fetch_property_amenities'); ?>",

            "aaSorting": [[0, 'desc']],

            "fnInitComplete": function () {

            },

            "fnDrawCallback": function (oSettings) {

                $("[rel=tooltip]").tooltip();

                var tmp_i = oSettings._iDisplayStart;

                var iLen = oSettings.aiDisplay.length;

                var x = 0;

                for (var i = tmp_i; (iLen + tmp_i) > i; i++) {

                    $('td:eq(0)', oSettings.aoData[oSettings.aiDisplay[x]].nTr).html(i + 1);

                    x++;

                }

                $('.item-iCheck').iCheck('uncheck');

                if (selectedItemsSync.length > 0) {

                    $.each(selectedItemsSync, function (index, value) {

                        $("#selectItem_" + value).iCheck('check');

                    });

                }

                $('.extraColumns input').iCheck({

                    checkboxClass: 'icheckbox_square_relative-purple',

                    radioClass: 'iradio_square_relative-purple',

                    increaseArea: '20%'

                });

                $('input').on('ifChecked', function (event) {

                    ItemsSelectedSync(this);

                });

                $('input').on('ifUnchecked', function (event) {

                    ItemsSelectedSync(this);

                });

            },

            "aoColumns": [

                {"mData": "amenityAutoid"},

                {"mData": "name"},

                {"mData": "edit"}

            ],

            "fnServerData": function (sSource, aoData, fnCallback) {

                aoData.push({"name": "property_id", "value": $('#property_id').val()});

                $.ajax({

                    'dataType': 'json',

                    'type': 'POST',

                    'url': sSource,

                    'data': aoData,

                    'success': fnCallback

                });

            }

        });

    }



    function ItemsSelectedSync(item) {

        var value = $(item).val();

        if ($(item).is(':checked')) {

            var inArray = $.inArray(value, selectedItemsSync);

            if (inArray == -1) {

                selectedItemsSync.push(value);

            }

        }

        else {

            var i = selectedItemsSync.indexOf(value);

            if (i != -1) {

                selectedItemsSync.splice(i, 1);

            }

        }

    }





    function add_property_amenities() {

        var property_id = $('#property_id').val();

        $.ajax({

            type: 'POST',

            url: '<?php echo site_url("Property/assign_property_amenities"); ?>',

            dataType: 'json',

            data: {'selectedItemsSync': selectedItemsSync, 'property_id': property_id},

            async: false,

            beforeSend: function () {

                startLoad();

            },

            success: function (data) {

                stopLoad();

                myAlert(data[0], data[1]);

                if (data[0] == 's') {

                    fetch_property_amenities_details();

                    $("#modal_assignAmenities").modal('hide');

                    $('.extraColumns input').iCheck('uncheck');

                }

            },

            error: function (xhr, ajaxOptions, thrownError) {



            }

        });

    }



    function fetch_property_amenities_details() {

        var property_id = $('#property_id').val();

        $.ajax({

            async: true,

            type: 'post',

            dataType: 'html',

            data: {property_id: property_id},

            url: "<?php echo site_url('Property/load_property_amenities_details'); ?>",

            beforeSend: function () {

                startLoad();

            },

            success: function (data) {

                $('#div_amenities_added').html(data);

                stopLoad();

            },

            error: function (jqXHR, textStatus, errorThrown) {

                stopLoad();

                myAlert('e', '<br>Message: ' + errorThrown);

            }

        });

    }



    function delete_property_amenties(id) {

        swal({

            title: 'Are you sure',

            text: 'You want to delete this ?',

            type: 'warning',

            showCancelButton: true,

            confirmButtonColor: "#DD6B55",

            confirmButtonText: 'Yes, delete it!',

            cancelButtonText: 'No, keep it'

        }).then((result) => {

            if (result.value) {

                $.ajax({

                    async: true,

                    type: 'post',

                    dataType: 'json',

                    data: {'amenities_detail_id': id},

                    url: "<?php echo site_url('Property/delete_property_amenities_details'); ?>",

                    beforeSend: function () {

                        startLoad();

                    },

                    success: function (data) {

                        stopLoad();

                        if (data == true) {

                            myAlert('s', 'Deleted Successfully');

                            fetch_property_amenities_details();

                        } else {

                            myAlert('e', 'Deletion Failed');

                        }



                    }, error: function () {

                        swal("Cancelled", "Your file is safe :)", "error");

                    }

                });

                // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'

            }

            else if (result.dismiss === 'cancel') {

                swal(

                    'Cancelled',

                    'Your record is safe :)',

                    'error'

                )

            }

        })

    }





    function delete_img(id) {



        swal({

            title: 'Are you sure',

            text: 'You want to delete this ?',

            type: 'warning',

            showCancelButton: true,

            confirmButtonColor: "#DD6B55",

            confirmButtonText: 'Yes, delete it!',

            cancelButtonText: 'No, keep it'

        }).then((result) => {

            if (result.value) {

                $.ajax({

                    async: true,

                    type: 'post',

                    dataType: 'json',

                    data: {'property_image_id': id},

                    url: "<?php echo site_url('Property/delete_single_img'); ?>",

                    beforeSend: function () {

                        startLoad();

                    },

                    success: function (data) {

                        stopLoad();

                        if (data == true) {

                            myAlert('s', 'Deleted Successfully');

                        } else {

                            myAlert('e', 'Deletion Failed');

                        }



                    }, error: function () {

                        swal("Cancelled", "Your image is safe :)", "error");

                    }

                });

                // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'

            }

            else if (result.dismiss === 'cancel') {

                swal(

                    'Cancelled',

                    'Your image is safe :)',

                    'error'

                )

            }

        })

    }



    function set_reference() {



        //   var x = $( "#agent_id option:selected" ).text();

        //    var first_letter = x.charAt(0);

        //  var second_letter = x.charAt(1);

        //   var third_letter = x.charAt(2);

        //   var part1 = first_letter+second_letter+third_letter ;  // Get first 3 letters from selected Agent name

        /*   var ss = $("#agent_id").attr("data-id");

         console.log(ss);

         $("#reference").val("Dolly Duck");*/

    }



</script>

<script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/spinbox.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/daterangepicker.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-colorpicker.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.knob.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/autosize.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.inputlimiter.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-tag.min.js"></script>

<script src="<?php echo base_url(); ?>assets/select2/js/select2.full.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/bootstrap-fileupload/jquery.form.js"></script>

<script src="<?php echo base_url(); ?>assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>



<!-- ace scripts -->

<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>



<script type="text/javascript">

    jQuery(function ($) {





        if (!ace.vars['touch']) {

            $('.chosen-select').chosen({allow_single_deselect: true});

            //resize the chosen on window resize



            $(window)

                .off('resize.chosen')

                .on('resize.chosen', function () {

                    $('.chosen-select').each(function () {

                        var $this = $(this);

                        $this.next().css({'width': $this.parent().width()});

                    })

                }).trigger('resize.chosen');

            //resize chosen on sidebar collapse/expand





        }





    });

</script>

=======
<?php/** Loading Data table Library*/echo load_lib_dataTable();?><style>    .list {        list-style: none;    }    hr {        margin: 0px 0px 10px 0px !important;    }    .card.card-xs {        height: 95px;        overflow: hidden;    }    .card .card-body {        padding: 2.083rem;        font-weight: 400;    }    .card .card-body .tile-left {        position: absolute;    }    .card .card-body .tile-right {        text-align: right;        line-height: 1.618;    }    .card .card-body .tile-right .tile-number {        font-size: 2rem;        font-weight: 400;    }    .card {        height: 100%;        box-shadow: 0 9px 23px rgba(0, 0, 0, 0.09), 0 5px 5px rgba(0, 0, 0, 0.06) !important;        -webkit-transition: box-shadow 0.7s cubic-bezier(0.25, 0.8, 0.25, 1) !important;        -moz-transition: box-shadow 0.7s cubic-bezier(0.25, 0.8, 0.25, 1) !important;        -o-transition: box-shadow 0.7s cubic-bezier(0.25, 0.8, 0.25, 1) !important;        transition: box-shadow 0.7s cubic-bezier(0.25, 0.8, 0.25, 1) !important;        -webkit-border-radius: 0.4167rem;        -moz-border-radius: 0.4167rem;        -ms-border-radius: 0.4167rem;        -o-border-radius: 0.4167rem;        border-radius: 0.4167rem;    }    .card:hover, .card:focus {        box-shadow: 0 9px 23px rgba(0, 0, 0, 0.18), 0 5px 5px rgba(0, 0, 0, 0.12) !important;        cursor: pointer;    }    .bg-gradient {        color: #FFFFFF !important;        background: #07a7e3;        background: -moz-linear-gradient(-45deg, #07a7e3 0%, #32dac3 100%);        background: -webkit-linear-gradient(-45deg, #07a7e3 0%, #32dac3 100%);        background: linear-gradient(135deg, #07a7e3 0%, #32dac3 100%);        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=$qp-color-1, endColorstr=$qp-color-2,GradientType=1 );        -webkit-transition: opacity 0.2s ease-out;        -moz-transition: opacity 0.2s ease-out;        -o-transition: opacity 0.2s ease-out;        transition: opacity 0.2s ease-out;    }</style><link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.custom.min.css"/><link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css"/><link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.min.css"/><link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/daterangepicker.min.css"/><link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css"/><link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-colorpicker.min.css"/><link rel="stylesheet" href="<?php echo base_url(); ?>assets/select2/css/select2.min.css"/><link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colorbox.min.css"/><link rel="stylesheet" href="<?php echo base_url(); ?>assets/dropzone/dropzone.css"/><link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-fileupload/bootstrap-fileupload.min.css"/><link rel="stylesheet" href="<?php echo base_url(); ?>assets/iCheck/all.css"/><link rel="stylesheet" href="<?php echo base_url(); ?>assets/iCheck/square/purple.css"/><link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.min.css"/><link rel="stylesheet" href="<?php echo base_url(); ?>assets/system/css/style.css"/><script src="<?php echo base_url(); ?>assets/dropzone/dropzone.js"></script><script src="<?php echo base_url(); ?>assets/js/jquery.colorbox.min.js"></script><script src="<?php echo base_url(); ?>assets/iCheck/icheck.js"></script><script type="text/javascript"        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDAHr5u7C9IEnjGBD35cfL0PxDDtNbAaAg&sensor=false&libraries=places"></script><?php$property_pending = "SELECT property.property_type_id FROM property WHERE property.isActive = 0";$pending_property_r = $this->db->query($property_pending)->result_array();$pending_property_count = count($pending_property_r);?><div class="row">    <div class="col-md-12">        <div class="pending-property-sec">            <div class="col-md-3 col-lg-3 col-xl-3 mb-5">                <a href="<?php echo site_url('pending_property') ?>" style="text-decoration: none;">                    <div class="card card-tile card-xs bg-primary bg-gradient text-center">                        <div class="card-body p-4">                            <!-- Accepts .invisible: Makes the items. Use this only when you want to have an animation called on it later -->                            <div class="tile-left">                                <i class="fa fa-align-left" style="font-size: 36px;"></i>                            </div>                            <div class="tile-right">                                <div class="tile-number"><?php echo $pending_property_count ?></div>                                <div class="tile-description">Pending approval property</div>                            </div>                        </div>                    </div>                </a>            </div>        </div>    </div></div><div>    <h3>Manage Property <!--[<i class="fa fa-plus green"></i> <i class="fa fa-pencil-square-o blue"></i> <i            class="fa fa-times red"></i> ]-->        <span class="pull-right">         <button class="btn btn-default btn-xs" type="button" onclick="load_property_table()">Refresh <i                 class="fa fa-refresh"></i></button>&nbsp;<button class="btn btn-primary btn-xs " type="button"                                                                  onclick="init_addProperty()">Add Property <i                    class="fa fa-plus"></i></button>       </span>    </h3></div><!--<h1><?php /*echo generate_property_reference() */?></h1>--><table class="table table-striped table-hover" id="property_table">    <thead>    <tr>        <!-- <th>#</th>        <th>Property Type</th>        <th>Category Type</th>        <th><i class="fa fa-home"></i> Property Name</th>        <th><i class="fa fa-money"></i> Price</th>        <th>Area</th>        <th>Address</th>        <th><i class="fa fa-phone"></i> Telephone</th>        <th>Permit No</th>        <th>Reference</th> -->        <th>Reference</th>        <th><i class="fa fa-home"></i> Property Name</th>        <th>Agent</th>        <th>Telephone</th>        <th>Company Name</th>        <th>Status</th>        <th>&nbsp;</th>    </tr>    </thead>    <tbody>    </tbody></table><script>    $(document).ready(function () {        load_property_table();    })    function load_property_table() {        $('#property_table').DataTable({            "bProcessing": true,            "bServerSide": true,            "bDestroy": true,            "StateSave": true,            "sAjaxSource": "<?php echo site_url('Property/get_property_dataTable'); ?>",            "aaSorting": [[1, 'desc']],            "fnInitComplete": function () {            },            "fnDrawCallback": function (oSettings) {                //tableBgColorJs();            },            "aoColumns": [                /*{"mData": "property_id"},                {"mData": "property_type_name"},                {"mData": "category_name"},                {"mData": "property_name"},                {"mData": "property_price"},                {"mData": "area"},                {"mData": "property_address"},                {"mData": "telephone_number"},                {"mData": "permit_No"},                {"mData": "reference"},*/                {"mData": "reference"},                {"mData": "property_name"},                {"mData": "Ename1"},                {"mData": "telephone_number"},                {"mData": "company_name"},                {"mData": "property_active_status"},                {"mData": "btn_set"}            ],            "fnServerData": function (sSource, aoData, fnCallback) {                aoData.push({'name': 'menuCatID', 'value': ''});                $.ajax({                    'dataType': 'json',                    'type': 'POST',                    'url': sSource,                    'data': aoData,                    'success': fnCallback                });            }        });    }    function init_addProperty() {        $("#modal_addManageProperty").modal('show');        initialize_map(6.927079, 79.861244);    }</script><!--Drop Zone code --><!--<div style="z-index: 100000 !important;    position: inherit;" >    <form action="ajax/dms-draganddrop-upload.php" class="dropzone"          id="myawesomedropzone"></form></div>--><!--Modal Assign  Amenities --><div class="modal" data-backdrop="static" id="modal_assignAmenities" role="dialog">    <div class="modal-dialog modal-lg" style="width:50%">        <div class="modal-content">            <div class="modal-header">                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span                        aria-hidden="true">&times;</span></button>                <h4 class="modal-title">Assign Amenities</h4>            </div>            <div class="modal-body">                <div id="sysnc">                    <div class="table-responsive">                        <table id="amenities_sync" class="table table-striped table-condensed">                            <thead>                            <tr>                                <th style="min-width: 10%">#</th>                                <th style="min-width: 80%">Name</th>                                <th style="min-width: 10%">&nbsp;                                    <button type="button" data-text="Add" onclick="add_property_amenities()"                                            class="btn btn-xs btn-primary">                                        <i class="fa fa-plus" aria-hidden="true"></i> Assign Amenities                                    </button>                                </th>                            </tr>                            </thead>                        </table>                    </div>                </div>            </div>            <div class="modal-footer">                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>            </div>        </div>    </div></div><!--Modal Add Property --><div class="modal " data-backdrop="static" id="modal_addManageProperty" role="dialog">    <div class="modal-dialog modal-lg" style="margin-top: 6px;">        <div class="modal-content">            <div class="modal-header modal-header-mini" style="padding: 5px 10px;">                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                    <span aria-hidden="true"                          style="color:red;">&times;</span>                </button>                <h4 class="modal-title"><i class="fa fa-building-o"></i> Add Property </h4></div>            <div class="modal-body" style="min-height: 200px; ">                <form role="form" enctype="multipart/form-data" id="from_property" class="form-horizontal">                    <input type="hidden" value="0" id="property_id" name="property_id">                    <div class="row">                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">                            <div class="form-group">                                <label class="col-sm-6 control-label no-padding-right" for="category_type_id">                                    <?php echo required() ?> Category                                    Type</label>                                <div class="col-sm-6">                                    <?php                                    $category_list = drop_category_type();                                    echo form_dropdown('category_type_id', $category_list, '1', 'class="chosen-select form-control" id="category_type_id"');                                    ?>                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">                            <div class="form-group">                                <label class="col-sm-6 control-label no-padding-right" for="property_type_id" data-toggle="tooltip" data-placement="top" title="Make sure you post in the correct type">                                    <?php echo required() ?> Property                                    Type</label>                                <div class="col-sm-6">                                    <?php                                    $property_list = drop_property_type();                                    echo form_dropdown('property_type_id', $property_list, '', 'class="chosen-select form-control" id="property_type_id"');                                    ?>                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">                            <div class="form-group">                                <label class="col-sm-6 control-label no-padding-right" for="furniture_type_id">                                    <?php echo required() ?> Furniture Type </label>                                <div class="col-sm-6">                                    <?php                                    $furniture_list = drop_furniture_type();                                    echo form_dropdown('furniture_type_id', $furniture_list, '', 'class="chosen-select form-control" id="furniture_type_id"');                                    ?>                                </div>                            </div>                        </div>                    </div>                    <hr>                    <div class="row">                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                            <div class="form-group">                                <label class="col-md-2 control-label" for="property_name" data-toggle="tooltip" data-placement="top" title="Keep it short and catchy!"><?php echo required() ?>                                    Name </label>                                <div class="col-sm-10">                                    <input name="property_name" id="property_name" class="form-control"/>                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                            <div class="form-group">                                <label class="col-md-2 control-label" for="description"  data-toggle="tooltip" data-placement="top" title="More details = more responses!"><?php echo required() ?>                                    Description </label>                                <div class="col-sm-10">                                    <textarea name="description" id="description" cols="30" rows="2"                                              class="form-control"></textarea>                                    <!--<input type="text" id="description" placeholder="description"  />-->                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="country_id"  data-toggle="tooltip" data-placement="top" title="Make sure you select the correct city of the property"> Country </label>                                <div class="col-sm-8">                                    <?php                                    $country_list = drop_getCountry();                                    echo form_dropdown('country_id', $country_list, '', 'class="chosen-select form-control" id="country_id"');                                    ?>                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="city_id"  data-toggle="tooltip" data-placement="top" title="Make sure you select the correct city of the property"> City </label>                                <div class="col-sm-8">                                    <select id="city_id" class="form-control"></select>                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="permit_No"> Bed count </label>                                <div class="col-sm-8">                                    <?php                                    $bedType_list = drop_getBedType();                                    echo form_dropdown('bed_type_id', $bedType_list, '', 'class="chosen-select form-control" id="bed_type_id"');                                    ?>                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="city_id"> Bathroom count </label>                                <div class="col-sm-8">                                    <?php                                    $bath_list = drop_getBathroom();                          echo form_dropdown('bathroom_type_id', $bath_list, '', 'class="chosen-select form-control" id="bathroom_type_id"');                                    ?>                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="permit_No"> Units </label>                               <div class="col-sm-8">                                    <input type="text" id="units" name="units" placeholder="units" class="form-control"/>                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="property_price"  data-toggle="tooltip" data-placement="top"  title="Pick a rate. If it is negotiable select the tick box"><?php echo required() ?>                                    Price </label>                                <div class="col-sm-4">                                    <input type="text" id="property_price" name="property_price" placeholder="Price"                                           class="form-control"/>                                </div>                                <div class="col-sm-4">                                    <input type="checkbox" name="price_negotiable" value="1" /> Negotiable                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="area" data-toggle="tooltip" data-placement="top" title="Enter the size in sq. ft"> Area sq.ft</label>                                <div class="col-sm-8">                                    <input type="text" id="area" name="area" placeholder="area" class="form-control"/>                                </div>                            </div>                        </div>												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="Floor" data-toggle="tooltip" data-placement="top" title="Floor"> Floor</label>                                <div class="col-sm-8">                                    <input type="text" id="floor" name="floor" placeholder="Floor count" class="form-control"/>                                </div>                            </div>                        </div>												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="Energy" data-toggle="tooltip" data-placement="top" title="Energy"> Energy</label>                                <div class="col-sm-8">                                    <input type="text" id="energy" name="energy" placeholder="Energy" class="form-control"/>                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="rent_duration"> Rent Duration </label>                                <div class="col-sm-8">                                    <input type="text" id="rent_duration" name="rent_duration"                                           placeholder="Rent Duration"                                           class="form-control"/>                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="property_address" data-toggle="tooltip" data-placement="top" title="Enter the street, house no. and/or post code."> Address </label>                                <div class="col-sm-8">                                    <input type="text" id="property_address" name="property_address"                                           placeholder="Address"                                           class="form-control"/>                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="telephone_number"> <i                                        class="fa fa-phone"></i><?php echo required() ?> Telephone </label>                                <div class="col-sm-8">                                    <input type="text" id="telephone_number" name="telephone_number" placeholder="Tel"                                           class="form-control" maxlength="10"/>                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="mobile_number"> Mobile </label>                                <div class="col-sm-8">                                    <input type="text" id="mobile_number" name="mobile_number" placeholder="Mobile"                                           class="form-control" maxlength="10" />                                </div>                            </div>                        </div>                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="permit_No"> Permit No </label>                                <div class="col-sm-8">                                    <input type="text" id="permit_No" name="permit_No" placeholder="Permit No"                                           class="form-control"/>                                </div>                            </div>                        </div>																								 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="car_parking_space"> Car parking spaces </label>                                <div class="col-sm-8">                                    <input type="number" id="car_parking_space" name="car_parking_space" placeholder="Add count"                                           class="form-control"/>                                </div>                            </div>                        </div>                          <!-- sold / rented section ---- -->                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="property_availability"> Property Availability </label>                                <div class="col-sm-8">                                    <input type="text" id="property_availability" name="property_availability" placeholder="Available / Not Available"                                           class="form-control"/>                                </div>                            </div>                        </div>												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="bill_included"> Bills included?  </label>                                <div class="col-sm-8">                                    <!--<input type="text" id="bill_included" name="bill_included" placeholder="Yes/No"                                           class="form-control"/>-->										   <p>												<input type="radio" name="bill_included" value="Yes" checked> Yes</input>											</p>											<p>												<input type="radio" name="bill_included" value="No" > No</input>											</p>                                </div>                            </div>                        </div>												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="deposit_period"> Deposit Period</label>                                <div class="col-sm-8">                                    <input type="number" id="deposit_period" name="deposit_period" placeholder="Add No of months"                                           class="form-control"/>                                </div>                            </div>                        </div>                        <!-- sold / rented section ---- -->                        <!--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="reference"> Reference</label>                                <div class="col-sm-8">                                    <input type="text" readonly id="reference" name="reference" placeholder="reference"                                           class="form-control" value="<?php /*echo generate_property_reference(); */?>" onfocus="set_reference()"/>                                </div>                            </div>                        </div>-->                        <?php if ($this->session->userdata('isSystemAdmin') == 1) { ?>                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                                <div class="form-group">                                    <label class="col-md-4 control-label" for="agent_id"> Partner</label>                                    <div class="col-sm-8">                                        <?php                                        $partner_list = drop_allPartner();                                       // var_dump($agent_list);                                        echo form_dropdown('agent_id', $partner_list, '', 'class="chosen-select form-control" id="agent_id" ');                                        ?>                                    </div>                                </div>                            </div>                        <?php } ?>                        <?php if ($this->session->userdata('isAgent') == 1) {                            $empID = $this->session->userdata('empID');                            $empName = $this->session->userdata('empname');                            ?>                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                                <div class="form-group">                                    <label class="col-md-4 control-label hide" for="agent_id"> Agent </label>                                    <div class="col-sm-8">                                        <input type="hidden" data-id="<?php echo $empName; ?>" id="agent_id"                                               name="agent_id" class="form-control agent_id"                                               value="<?php echo $empID; ?>"/>                                    </div>                                </div>                            </div>                        <?php } ?>                        <?php if (isCompany()) {                            ?>                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                                <div class="form-group">                                    <label class="col-md-4 control-label" for="agent_id"> Agent </label>                                    <div class="col-sm-8">                                        <?php                                        $agent_list = drop_allAgent();                                        echo form_dropdown('agent_id', $agent_list, '', 'class="chosen-select  form-control" id="agent_id"');                                        ?>                                    </div>                                </div>                            </div>                        <?php } ?>                                          </div>															<div class="row">											<div class="col-xs-12 col-sm-12 col-md-12">							<h4 class="h4-bg-title">Add details about rental</h4>						</div>												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="Rental Period" data-toggle="tooltip" data-placement="top" title="Rental Period"> Rental Period</label>                                <div class="col-sm-8">                                    <input type="text" id="rental_period" name="rental_period" placeholder="Ex: Unlimited" class="form-control"/>                                </div>                            </div>                        </div>												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="Monthly rent" data-toggle="tooltip" data-placement="top" title="Monthly rent"> Monthly rent</label>                                <div class="col-sm-8">                                    <input type="text" id="monthly_rent" name="monthly_rent" placeholder="Ex: USD 1,000.00" class="form-control"/>                                </div>                            </div>                        </div>												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="Security deposit" data-toggle="tooltip" data-placement="top" title="Security deposit"> Security deposit</label>                                <div class="col-sm-8">                                    <input type="text" id="security_deposit" name="security_deposit" placeholder="Ex: USD 6,000.00" class="form-control"/>                                </div>                            </div>                        </div>												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="Occupancy Rate" data-toggle="tooltip" data-placement="top" title="Occupancy Rate"> Occupancy Rate</label>                                <div class="col-sm-8">                                    <input type="text" id="occupancy_rate" name="occupancy_rate" placeholder="Ex: USD 500.00" class="form-control"/>                                </div>                            </div>                        </div>												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="Takeover Date" data-toggle="tooltip" data-placement="top" title="Takeover Date"> Takeover Date</label>                                <div class="col-sm-8">                                    <input type="date" id="takeover_date" name="takeover_date" placeholder="Takeover Date" class="form-control"/>                                </div>                            </div>                        </div>												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="Advances" data-toggle="tooltip" data-placement="top" title="Advances"> Advances</label>                                <div class="col-sm-8">                                    <input type="text" id="advances" name="advances" placeholder="Ex: USD 5,000.00" class="form-control"/>                                </div>                            </div>                        </div>												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="Prepaid rent" data-toggle="tooltip" data-placement="top" title="Prepaid rent"> Prepaid rent</label>                                <div class="col-sm-8">                                    <input type="text" id="prepaid_rent" name="prepaid_rent" placeholder="Ex: USD 5,000.00" class="form-control"/>                                </div>                            </div>                        </div>												<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                            <div class="form-group">                                <label class="col-md-4 control-label" for="Creation date" data-toggle="tooltip" data-placement="top" title="Creation date"> Creation date</label>                                <div class="col-sm-8">                                    <input type="date" id="creation_date" name="creation_date" placeholder="Creation date" class="form-control"/>                                </div>                            </div>                        </div>										</div>                    <div id="google_map">                        <div class="row">												<div class="col-xs-12 col-sm-12 col-md-12">							<h4 class="h4-bg-title">Set loaction</h4>						</div>                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                                <div class="col-xs-12 col-sm-12">                                    <div id="map_canvas" style="height: 450px"></div>                                </div>                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top: 10px">                                    <div class="form-group">                                        <label class="col-md-4 control-label" for="long" data-toggle="tooltip" data-placement="top" title="You can pick choose the exact location of the property"> Long </label>                                        <div class="col-sm-8">                                            <input type="text" id="long" name="longitude" placeholder="Long"                                                   class="form-control" value="23.58589"                                                   onchange="changeMarkerPosition()"/>                                        </div>                                    </div>                                </div>                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top: 10px">                                    <div class="form-group">                                        <label class="col-md-4 control-label" for="lat"> Lat </label>                                        <div class="col-sm-8">                                            <input type="text" id="lat" name="latitude" placeholder="Lat"                                                   class="form-control" value="58.4059227"                                                   onchange="changeMarkerPosition()"/>                                        </div>                                    </div>                                </div>                            </div>                        </div>                    </div>                    <hr>                    <div id="property_other_detail" style="display: none;">                        <div class="row">                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                                <hr>                            </div>                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                                <h4>Images </h4>                                <input multiple="" type="file" id="upload_image" name="upload_image"/>                                <ul class="ace-thumbnails clearfix" id="imagesSetList">                                    <li>                                        <a href="<?php echo base_url() ?>assets/images/gallery/image-1.jpg"                                           title="Photo Title" data-rel="colorbox">                                            <img style="max-height: 100px;" alt="150x150"                                                 src="<?php echo base_url() ?>assets/images/gallery/thumb-1.jpg"/>                                        </a>                                        <div class="tools">                                            <a href="#">                                                <i class="ace-icon fa fa-times red"></i>                                            </a>                                        </div>                                    </li>                                    <li>                                        <a href="<?php echo base_url() ?>assets/images/gallery/image-1.jpg"                                           title="Photo Title" data-rel="colorbox">                                            <img style="max-height: 100px;" alt="150x150"                                                 src="<?php echo base_url() ?>assets/images/gallery/thumb-1.jpg"/>                                        </a>                                        <div class="tools">                                            <a href="#">                                                <i class="ace-icon fa fa-times red"></i>                                            </a>                                        </div>                                    </li>                                </ul>                            </div>                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">                                <h4>                                    Amenities                                    <button class="btn btn-default btn-primary btn-xs pull-right" type="button"                                            onclick="amenities_assign_model()">Assign Amenities                                    </button>                                </h4>                                <div id="div_amenities_added">                                </div>                            </div>                        </div>                    </div>                   <!-- <?php if ($this->session->userdata('isSystemAdmin') == 1) { ?>                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                            <div class="form-group">                                <div class="col-sm-8">                                    <input type="hidden" id="active_property"                                           name="active_property" class="form-control active_property"                                           value="1"/>                                </div>                            </div>                        </div>                    <?php } ?>                    <?php if ($this->session->userdata('isPartner') == 1) { ?>                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                            <div class="form-group">                                <div class="col-sm-8">                                    <input type="hidden" id="active_property"                                           name="active_property" class="form-control active_property"                                           value="0"/>                                </div>                            </div>                        </div>                    <?php } ?>-->                    <hr>                    <div class="row">                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                            <div class="form-group">                                <label class="col-md-10 control-label no-padding-right"> &nbsp; </label>                                <div class="col-sm-2">                                    <button class="btn btn-primary btn-xs" type="button" onclick="save_property()">                                        <i class="fa fa-floppy-o"></i> Save                                    </button>                                </div>                            </div>                        </div>                    </div>                </form>            </div>            <div class="modal-footer" style="padding: 5px 10px;">                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>            </div>        </div>    </div></div><script>    /** modal related scripts */    $('#country_id').on('change',function () {        var CountryName=$('#country_id').val();        $.ajax({            type: 'POST',            dataType: 'json',            url: "<?php echo site_url('Property/getCity'); ?>",            data: {CountryName: CountryName},            cache: false,            beforeSend: function () {                // startLoad();            },            success: function (data) {                var html="";                html+=' <option disabled="disabled" value="" selected="selected">Select</option>';                $(data.output).each(function (key, val) {                    html+='<option value='+val.city_id+'>'+val.city_name+'</option>';                });               $('#city_id').html("");               $('#city_id').html(html);            },            error: function (jqXHR, textStatus, errorThrown) {                alert(jqXHR.responseText);                // myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)            }        });    });    var map;    var marker;    var selectedItemsSync = [];    var infowindow = new google.maps.InfoWindow();    $(document).ready(function () {        $('.select2').select2();        $('.modal').on('hidden.bs.modal', function (e) {            if ($('.modal').hasClass('in')) {                $('body').addClass('modal-open');            }        });        /*Dropzone.options.myawesomedropzone = {         paramName: "file",         maxFilesize: 5, // MB         maxFiles: 50,         acceptedFiles: "image/jpeg, image/jpg, image/png",         accept: function (file, done) {         done();         },         init: function () {         thisDropzone = this;         this.on("queuecomplete", function (file) {         console.log(file);         });         this.on("complete", function (file) {         setTimeout(function () {         thisDropzone.removeFile(file);         }, 500);         });         }, queuecomplete: function (file) {         GetFiles($("#dd_companyID").val(), $("#dd_parentFolderID").val())         },         };*/ /**********        $('#upload_image').ace_file_input({            style: 'well',            btn_choose: 'Drop Image here or click to choose',            btn_change: null,            no_icon: 'ace-icon fa fa-image',            droppable: true,            thumbnail: 'small'//large | fit            //,icon_remove:null//set null, to hide remove/reset button            /**,before_change:function(files, dropped) {						//Check an example below						//or examples/file-upload.html						return true;					}*/            /**,before_remove : function() {						return true;					}*/               /**********   ,      preview_error: function (filename, error_code) {                //name of the file that failed                //error_code values                //1 = 'FILE_LOAD_FAILED',                //2 = 'IMAGE_LOAD_FAILED',                //3 = 'THUMBNAIL_FAILED'                //alert(error_code);            }       ****************/    /********    }).on('change', function () {            //console.log($(this).data('ace_input_files'));            //console.log($(this).data('ace_input_method'));        });***********/        $('#upload_image').ace_file_input({            style: 'well',            btn_choose: 'Drop Image here or click to choose',            btn_change: null,            no_icon: 'ace-icon fa fa-image',            droppable: true,            thumbnail: 'large',//large | fit            maxSize: 500000//bytes            //,icon_remove:null//set null, to hide remove/reset button            ,before_change:function(files, dropped) {                //Check an example below                //or examples/file-upload.html                var file = files[0];                if(file.size > 60000){                    return true;                } else {                    alert('Invalid file dimensions/size! Minimum size 60KB & Minimum dimensions 760*430');                    return false;                }            }            /**,before_remove : function() {                        return true;                    }*/            ,            preview_error: function (filename, error_code) {                //name of the file that failed                //error_code values                //1 = 'FILE_LOAD_FAILED',                //2 = 'IMAGE_LOAD_FAILED',                //3 = 'THUMBNAIL_FAILED'                //alert(error_code);            }        }).on('file.error.ace', function(ev, info) {            if(info.error_count['ext'] || info.error_count['mime']) alert('Invalid file type! Please select an image!');            if(info.error_count['size']) alert('Invalid file dimensions/size! Minimum size 60KB & Minimum dimensions 760*430');                        //you can reset previous selection on error            //ev.preventDefault();            //file_input.ace_file_input('reset_input');        });        initGalary();        $(document).one('ajaxloadstart.page', function (e) {            $('#colorbox, #cboxOverlay').remove();        });        $('#modal_addManageProperty').on('hidden.bs.modal', function () {            clearProperty();        });        //google.maps.event.addDomListener(window, "load", initialize_map);    });    $(document).on('show.bs.modal', '.modal', function () {        var zIndex = 1040 + (10 * $('.modal:visible').length);        $(this).css('z-index', zIndex);        setTimeout(function () {            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');        }, 0);    });        function initialize_map(lat, long) {        var myLatlng = new google.maps.LatLng(23.58589, 58.4059227);        var myOptions = {zoom: 13, center: myLatlng, mapTypeId: google.maps.MapTypeId.ROADMAP}        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);        var manualLatlng = new google.maps.LatLng(lat, long);        var companyLogo = new google.maps.MarkerImage('<?php echo base_url('assets/system/') ?>images/icon-home.png',            new google.maps.Size(50, 50),            new google.maps.Point(0, 0),            new google.maps.Point(50, 50)        );        // Bounds for Oman        var strictBounds = new google.maps.LatLngBounds(            new google.maps.LatLng(17.01505, 54.09237),            new google.maps.LatLng(26.17993, 59.52889),        );        var markerOptions = {map: map, position: manualLatlng, icon: companyLogo, draggable: true};        marker = setMarker(markerOptions);        google.maps.event.addListener(marker, "drag", function (event) {            setGeoLocation(event.latLng.lat(), event.latLng.lng());        });        //map.fitBounds(strictBounds);        map.panTo(new google.maps.LatLng(lat, long));    }    function setMarker(markerOptions) {        var markerPoint = new google.maps.Marker(markerOptions);        return markerPoint;    }    function changeMarkerPosition() {        var long = $('#long').val();        var lat = $('#lat').val();        var latlng = new google.maps.LatLng(lat, long);        marker.setPosition(latlng);        map.panTo(new google.maps.LatLng(lat, long));    }    function setGeoLocation(lat, long) {        $("#long").val(long);        $("#lat").val(lat);    }    function save_property() {        $("#from_property").ajaxForm(            {                type: 'post',                dataType: 'json',                contentType: false,                cache: false,                mimeType: "multipart/form-data",                processData: false,                url: '<?php echo site_url('Property/save_property'); ?>',                data: $("#frm_upload_file").serialize(),                beforeSend: function () {                    startLoad();                },                success: function (data) {                    stopLoad();                    if (data['error'] == 1) {                        myAlert('d', data['message']);                    } else if (data['error'] == 0) {                        $("#property_id").val(data['property_id']);                        $("#property_other_detail").show();                        $(".remove").click();                        load_property_images(data['property_id']);                        myAlert('s', data['message']);                    }                },                uploadProgress: function (event, position, total, percentComplete) {                    $("#upload-progress").removeClass("hide");                    var percentVal = percentComplete + '%';                    $("#upload-progress .bar").width(percentVal);                    $("#upload_prgress_info").show();                    $("#upload_prgress_info").html('Uploading ' + percentVal);                },                error: function (jqXHR, textStatus, errorThrown) {                    stopLoad();                    myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)                }            }).submit();        /**$.ajaxForm({            type: 'POST',            dataType: 'json',            contentType: false, // Added            mimeType: "multipart/form-data", // Added            processData: false, // Added            url: "<?php //echo site_url('Property/save_property'); ?>",            data: $("#from_property").serialize(),            cache: false,            beforeSend: function () {                startLoad();            },            uploadProgress: function (event, position, total, percentComplete) {                $("#upload-progress").removeClass("hide");                var percentVal = percentComplete + '%';                $("#upload-progress .bar").width(percentVal);                $("#upload_prgress_info").show();                $("#upload_prgress_info").html('Uploading ' + percentVal);            },            success: function (data) {                stopLoad();                if (data['error'] == 1) {                    myAlert('d', data['message']);                } else if (data['error'] == 0) {                    $("#property_id").val(data['property_id']);                    $("#property_other_detail").show();                    myAlert('s', data['message']);                }            },            error: function (jqXHR, textStatus, errorThrown) {                stopLoad();                myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)            }        });*/    }    function initGalary() {        /*Gallary */        var $overflow = '';        var colorbox_params = {            rel: 'colorbox',            reposition: true,            scalePhotos: true,            scrolling: false,            previous: '<i class="ace-icon fa fa-arrow-left"></i>',            next: '<i class="ace-icon fa fa-arrow-right"></i>',            close: '&times;',            current: '{current} of {total}',            maxWidth: '100%',            maxHeight: '100%',            onOpen: function () {                $overflow = document.body.style.overflow;                document.body.style.overflow = 'hidden';            },            onClosed: function () {                document.body.style.overflow = $overflow;            },            onComplete: function () {                $.colorbox.resize();            }        };        $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);        $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon    }    function load_property(id) {        $.ajax({            type: 'POST',            dataType: 'json',            url: "<?php echo site_url('Property/load_property'); ?>",            data: {id: id},            cache: false,            beforeSend: function () {                startLoad();            },            success: function (data) {                stopLoad();                if (data['error'] == 0) {                    $("#modal_addManageProperty").modal('show');                    if (data['output']['longitude'] != "" && data['output']['latitude'] != "") {                        initialize_map(data['output']['latitude'], data['output']['longitude']);                    } else {                        initialize_map(6.927079, 79.861244);                    }                    /*console.log(data['output']);                     return false;*/                    $("#property_id").val(data['output']['property_id']);                    $("#property_type_id").val(data['output']['property_type_id']).change();                    $("#city_id").val(data['output']['city_id']).change();                    $("#bed_type_id").val(data['output']['bed_type_id']).change();                    $("#furniture_type_id").val(data['output']['furniture_type_id']).change();                    $("#category_type_id").val(data['output']['category_type_id']).change();                    $("#agent_id").val(data['output']['agent_id']).change();                    $("#property_name").val(data['output']['property_name']);                    $("#description").val(data['output']['description']);                    $("#property_price").val(data['output']['property_price']);                    $("#area").val(data['output']['area']);                    $("#rent_duration").val(data['output']['rent_duration']);                    $("#property_address").val(data['output']['property_address']);                    $("#telephone_number").val(data['output']['telephone_number']);                    $("#mobile_number").val(data['output']['mobile_number']);                    $("#permit_No").val(data['output']['permit_No']);										$("#property_availability").val(data['output']['property_availability']);										$("#deposit_period").val(data['output']['deposit_period']);										$("#car_parking_space").val(data['output']['car_parking_space']);										$("#rental_period").val(data['output']['rental_period']);										$("#security_deposit").val(data['output']['security_deposit']);										$("#takeover_date").val(data['output']['takeover_date']);										$("#prepaid_rent").val(data['output']['prepaid_rent']);										$("#monthly_rent").val(data['output']['monthly_rent']);										$("#occupancy_rate").val(data['output']['occupancy_rate']);										$("#advances").val(data['output']['advances']);										$("#creation_date").val(data['output']['creation_date']);                    $("#reference").val(data['output']['reference']);                    $("#long").val(data['output']['longitude']);                    $("#lat").val(data['output']['latitude']);                    $("#property_other_detail").show();                    $("#property_other_detail").show();                    fetch_property_amenities_details();                    load_property_images(data['output']['property_id']);                    $(".chosen-select").trigger("chosen:updated");                } else if (data['error'] == 1) {                    myAlert('e', data['message']);                }            },            error: function (jqXHR, textStatus, errorThrown) {                stopLoad();                myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)            }        });    }    function delete_single_property(id) {        swal({            title: 'Are you sure',            text: 'You want to delete this ?',            type: 'warning',            showCancelButton: true,            confirmButtonColor: "#DD6B55",            confirmButtonText: 'Yes, delete it!',            cancelButtonText: 'No, keep it'        }).then((result) => {            if (result.value) {                $.ajax({                    type: 'POST',                    dataType: 'json',                    url: "<?php echo site_url('Property/delete_single_property'); ?>",                    data: {id: id},                    cache: false,                    beforeSend: function () {                        startLoad();                    },                    success: function (data) {                        myAlert('s', 'Deleted Successfully');                        stopLoad();                         setTimeout(function() {                             window.location.reload();                         }, 3000);                    },                    error: function (jqXHR, textStatus, errorThrown) {                        stopLoad();                        myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)                    }                });                // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'            }            else if (result.dismiss === 'cancel') {                swal(                    'Cancelled',                    'Your record is safe :)',                    'error'                )            }        })    }    function load_property_images(id) {        var path = '<?php echo base_url('uploads/')?>';        $.ajax({            type: 'POST',            dataType: 'json',            url: "<?php echo site_url('Property/load_property_images'); ?>",            data: {id: id},            cache: false,            beforeSend: function () {                startLoad();                $("#imagesSetList").empty();            },            success: function (data) {               stopLoad();                if (data['error'] == 0) {                    $.each(data['output'], function (key, value) {                        var imglink = value['image_link'];                        var property_img_id = value['property_image_id'];                        var htmlSet = '<li> <a href="' + path + imglink + '" title="Photo Title" data-rel="colorbox"> <img style="max-height: 100px; max-width: 100px" alt="150x150" src="' + path + imglink + '"/> </a>  <div class="tools"> <a href="#" onclick="delete_img('+property_img_id+')"> <i class="ace-icon fa fa-times red"></i> </a> </div> </li>';                        $("#imagesSetList").append(htmlSet);                    });                    initGalary();                } else if (data['error'] == 1) {                }            },            error: function (jqXHR, textStatus, errorThrown) {                stopLoad();                myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)            }        });    }    function clearProperty() {        $("#property_id").val(0);        $("#property_type_id").val('').change();        $("#bed_type_id").val('').change();        $("#furniture_type_id").val('').change();        $("#category_type_id").val(1).change();        $("#property_name").val('');        $("#description").val('');        $("#property_price").val('');        $("#area").val('');        $("#rent_duration").val('');        $("#property_address").val('');        $("#telephone_number").val('');        $("#mobile_number").val('');        $("#permit_No").val('');				$("#car_parking_space").val('');				$("#property_availability").val('');				$("#deposit_period").val('');        $("#reference").val('');        $("#property_other_detail").hide();        $(".chosen-select").trigger("chosen:updated");    }    function amenities_assign_model() {        selectedItemsSync = [];        load_property_amenities_table();        $('#modal_assignAmenities').modal('show');    }    function load_property_amenities_table() {        $('#amenities_sync').DataTable({            "bProcessing": true,            "bServerSide": true,            "bDestroy": true,            "StateSave": true,            "sAjaxSource": "<?php echo site_url('Property/fetch_property_amenities'); ?>",            "aaSorting": [[0, 'desc']],            "fnInitComplete": function () {            },            "fnDrawCallback": function (oSettings) {                $("[rel=tooltip]").tooltip();                var tmp_i = oSettings._iDisplayStart;                var iLen = oSettings.aiDisplay.length;                var x = 0;                for (var i = tmp_i; (iLen + tmp_i) > i; i++) {                    $('td:eq(0)', oSettings.aoData[oSettings.aiDisplay[x]].nTr).html(i + 1);                    x++;                }                $('.item-iCheck').iCheck('uncheck');                if (selectedItemsSync.length > 0) {                    $.each(selectedItemsSync, function (index, value) {                        $("#selectItem_" + value).iCheck('check');                    });                }                $('.extraColumns input').iCheck({                    checkboxClass: 'icheckbox_square_relative-purple',                    radioClass: 'iradio_square_relative-purple',                    increaseArea: '20%'                });                $('input').on('ifChecked', function (event) {                    ItemsSelectedSync(this);                });                $('input').on('ifUnchecked', function (event) {                    ItemsSelectedSync(this);                });            },            "aoColumns": [                {"mData": "amenityAutoid"},                {"mData": "name"},                {"mData": "edit"}            ],            "fnServerData": function (sSource, aoData, fnCallback) {                aoData.push({"name": "property_id", "value": $('#property_id').val()});                $.ajax({                    'dataType': 'json',                    'type': 'POST',                    'url': sSource,                    'data': aoData,                    'success': fnCallback                });            }        });    }    function ItemsSelectedSync(item) {        var value = $(item).val();        if ($(item).is(':checked')) {            var inArray = $.inArray(value, selectedItemsSync);            if (inArray == -1) {                selectedItemsSync.push(value);            }        }        else {            var i = selectedItemsSync.indexOf(value);            if (i != -1) {                selectedItemsSync.splice(i, 1);            }        }    }    function add_property_amenities() {        var property_id = $('#property_id').val();        $.ajax({            type: 'POST',            url: '<?php echo site_url("Property/assign_property_amenities"); ?>',            dataType: 'json',            data: {'selectedItemsSync': selectedItemsSync, 'property_id': property_id},            async: false,            beforeSend: function () {                startLoad();            },            success: function (data) {                stopLoad();                myAlert(data[0], data[1]);                if (data[0] == 's') {                    fetch_property_amenities_details();                    $("#modal_assignAmenities").modal('hide');                    $('.extraColumns input').iCheck('uncheck');                }            },            error: function (xhr, ajaxOptions, thrownError) {            }        });    }    function fetch_property_amenities_details() {        var property_id = $('#property_id').val();        $.ajax({            async: true,            type: 'post',            dataType: 'html',            data: {property_id: property_id},            url: "<?php echo site_url('Property/load_property_amenities_details'); ?>",            beforeSend: function () {                startLoad();            },            success: function (data) {                $('#div_amenities_added').html(data);                stopLoad();            },            error: function (jqXHR, textStatus, errorThrown) {                stopLoad();                myAlert('e', '<br>Message: ' + errorThrown);            }        });    }    function delete_property_amenties(id) {        swal({            title: 'Are you sure',            text: 'You want to delete this ?',            type: 'warning',            showCancelButton: true,            confirmButtonColor: "#DD6B55",            confirmButtonText: 'Yes, delete it!',            cancelButtonText: 'No, keep it'        }).then((result) => {            if (result.value) {                $.ajax({                    async: true,                    type: 'post',                    dataType: 'json',                    data: {'amenities_detail_id': id},                    url: "<?php echo site_url('Property/delete_property_amenities_details'); ?>",                    beforeSend: function () {                        startLoad();                    },                    success: function (data) {                        stopLoad();                        if (data == true) {                            myAlert('s', 'Deleted Successfully');                            fetch_property_amenities_details();                        } else {                            myAlert('e', 'Deletion Failed');                        }                    }, error: function () {                        swal("Cancelled", "Your file is safe :)", "error");                    }                });                // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'            }            else if (result.dismiss === 'cancel') {                swal(                    'Cancelled',                    'Your record is safe :)',                    'error'                )            }        })    }    function delete_img(id) {        swal({            title: 'Are you sure',            text: 'You want to delete this ?',            type: 'warning',            showCancelButton: true,            confirmButtonColor: "#DD6B55",            confirmButtonText: 'Yes, delete it!',            cancelButtonText: 'No, keep it'        }).then((result) => {            if (result.value) {                $.ajax({                    async: true,                    type: 'post',                    dataType: 'json',                    data: {'property_image_id': id},                    url: "<?php echo site_url('Property/delete_single_img'); ?>",                    beforeSend: function () {                        startLoad();                    },                    success: function (data) {                        stopLoad();                        if (data == true) {                            myAlert('s', 'Deleted Successfully');                        } else {                            myAlert('e', 'Deletion Failed');                        }                    }, error: function () {                        swal("Cancelled", "Your image is safe :)", "error");                    }                });                // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'            }            else if (result.dismiss === 'cancel') {                swal(                    'Cancelled',                    'Your image is safe :)',                    'error'                )            }        })    }    function set_reference() {        //   var x = $( "#agent_id option:selected" ).text();        //    var first_letter = x.charAt(0);        //  var second_letter = x.charAt(1);        //   var third_letter = x.charAt(2);        //   var part1 = first_letter+second_letter+third_letter ;  // Get first 3 letters from selected Agent name        /*   var ss = $("#agent_id").attr("data-id");         console.log(ss);         $("#reference").val("Dolly Duck");*/    }</script><script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script><script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script><script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script><script src="<?php echo base_url(); ?>assets/js/spinbox.min.js"></script><script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script><script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script><script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script><script src="<?php echo base_url(); ?>assets/js/daterangepicker.min.js"></script><script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script><script src="<?php echo base_url(); ?>assets/js/bootstrap-colorpicker.min.js"></script><script src="<?php echo base_url(); ?>assets/js/jquery.knob.min.js"></script><script src="<?php echo base_url(); ?>assets/js/autosize.min.js"></script><script src="<?php echo base_url(); ?>assets/js/jquery.inputlimiter.min.js"></script><script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script><script src="<?php echo base_url(); ?>assets/js/bootstrap-tag.min.js"></script><script src="<?php echo base_url(); ?>assets/select2/js/select2.full.min.js"></script><script src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script><script src="<?php echo base_url(); ?>assets/bootstrap-fileupload/jquery.form.js"></script><script src="<?php echo base_url(); ?>assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script><!-- ace scripts --><script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script><script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script><script type="text/javascript">    jQuery(function ($) {        if (!ace.vars['touch']) {            $('.chosen-select').chosen({allow_single_deselect: true});            //resize the chosen on window resize            $(window)                .off('resize.chosen')                .on('resize.chosen', function () {                    $('.chosen-select').each(function () {                        var $this = $(this);                        $this.next().css({'width': $this.parent().width()});                    })                }).trigger('resize.chosen');            //resize chosen on sidebar collapse/expand        }    });</script>
>>>>>>> dev
