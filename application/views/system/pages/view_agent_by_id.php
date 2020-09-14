<link href="<?php echo base_url('assets/system/') ?>css/agentStyle.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/fixedheader/3.1.3/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css" rel="stylesheet">
<style>
    .btn-contact_n {
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

    .btn-contact_n:hover {
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
        <?php //print_r($this->agent->is_referral());?>
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
                                    <?php if (!empty($agent_data['EmpImage'])) { ?>
                                        <img src="<?php echo base_url('uploads/agents/' . $agent_data['EmpImage']) ?>"
                                             id="changeImg" style="width: 100%"/>
                                    <?php } else { ?>
                                        <img src="<?php echo base_url('uploads/agents/default-user-img.jpg') ?>"
                                             id="changeImg" style="width: 100%"/>
                                    <?php }
                                    if ($this->session->userdata('empID') == $agent_data['EIdNo']) { ?>
                                        <input type="file" name="contactImage" id="itemImage" style="display: none;"
                                               onchange="loadImage(this)"/>
                                        <input type="hidden" name="EIdNo" id="hiddenID_EIdNo"
                                               value="<?php echo $agent_data['EIdNo']; ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-7 col-xs-11 col-md-offset-0 col-xs-offset-1">
                                <?php
                                if ($this->session->userdata('empID') == $agent_data['EIdNo']) {
                                    ?>
                                    <div
                                            style="font-size: 20px;font-weight: 600;color: #0194AC;font-family: 'Roboto', sans-serif;margin-top: 10px;">
                                        <a href="#" data-type="text" data-placement="bottom"
                                           data-url="<?php echo site_url('home_controller/update_agentDetail') ?>"
                                           data-pk="<?php echo $agent_data['EIdNo'] ?>" data-name="Ename1"
                                           data-title="Designation" class="xEditable"
                                           data-value="<?php echo $agent_data['Ename1'] ?>"
                                           data-related="_manPowerNo">
                                            <?php echo $agent_data['Ename1']; ?>
                                        </a>
                                    </div>
                                    <?php
                                } else { ?>
                                    <h2 style="font-size: 20px;font-weight: 600;color: #0194AC;font-family: 'Roboto', sans-serif;"><?php echo $agent_data['Ename1']; ?></h2>
                                <?php } ?>

                                <?php
                                if ($this->session->userdata('empID') == $agent_data['EIdNo']) {
                                    ?>
                                    <div
                                            style="font-size: 14px;font-weight: 500;color: #797979;font-family: 'Roboto', sans-serif;margin-top: 2px; padding-bottom: 5px;
}">
                                        <a href="#" data-type="text" data-placement="bottom"
                                           data-url="<?php echo site_url('home_controller/update_agentDetail') ?>"
                                           data-pk="<?php echo $agent_data['EIdNo'] ?>" data-name="EmpDesignationId"
                                           data-title="Designation" class="xEditable"
                                           data-value="<?php echo $agent_data['EmpDesignationId'] ?>"
                                           data-related="_manPowerNo">
                                            <?php echo $agent_data['empDesignation'] ?>
                                            <?php //print_r($agent_data); ?>
                                        </a></div>
                                    <?php
                                } else { ?>
                                    <h3 style="font-size: 14px;font-weight: 500;color: #797979;font-family: 'Roboto', sans-serif;margin-top: 10px;">
                                        <?php echo $agent_data['empDesignation'] ?>
                                    </h3>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                        <h3 class="text_5"> Nationality:</h3>

                                        <h3 class="text_5"> Languages:</h3>

                                        <h3 class="text_5"> Transactions:</h3>
                                    </div>
                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                        <!-- ********************* -->
                                        <?php
                                        if (!empty($agent_data['EpNationality'])) { ?>
                                            <h3 class="text_6 m_1 "><?php echo $agent_data['EpNationality']; ?></h3>
                                        <?php } else { ?>
                                            <h3 class="text_6 m_1 "><?php echo "--"; ?></h3>
                                        <?php } ?>
                                        <!-- ********************* -->
                                        <?php
                                        if (!empty($agent_data['EpLanguages'])) { ?>
                                            <h3 class="text_6 m_1 "><?php echo $agent_data['EpLanguages']; ?></h3>
                                        <?php } else { ?>
                                            <h3 class="text_6 m_1 "><?php echo "--"; ?></h3>
                                        <?php } ?>
                                        <!-- ********************* -->

                                        <h3 class="text_3 m_1 ">
                                            <?php
                                            echo !empty($get_specific_agent_transaction) && isset($get_specific_agent_transaction) ? $get_specific_agent_transaction : 0; ?>
                                            (last months )</h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row p_4">
                            <div class="col-md-11 col-sm-11 col-xs-11 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                                <h2 style="font-size: 19px;font-weight: 500;color: #444444;font-family: 'Roboto', sans-serif;">
                                    Personal information</h2>
                            </div>
                            <div class="col-md-12" style="padding-bottom: 35px;">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
                                        <h3 class="text_5">ACTIVE LISTINGS:</h3>

                                        <h3 class="text_5">EXPERIENCE SINCE:</h3>

                                        <h3 class="text_5">LINKEDIN:</h3>
                                    </div>
                                    <div class="col-md-8 col-sm-7 col-xs-7">
                                        <h3 class="text_3 m_1 ">
                                            <?php
                                            echo !empty($get_specific_agent_active_listing) && isset($get_specific_agent_active_listing) ? $get_specific_agent_active_listing : 0; ?>
                                            Properties</h3>

                                        <h3 class="text_6 m_1 ">--</h3>

                                        <h3 class="text_3 m_1 "><a href="<?php echo $agent_data['EpLinkedin']; ?>"
                                                                   target="_blank">View profile</a></h3>

                                    </div>
                                </div>
                                <?php
                                if ($this->session->userdata('empID') == $agent_data['EIdNo']) { ?>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" onclick="testmodal()">
                                                Edit your details
                                            </button>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row set_right_box">
                    <div class="agent_contact">
                        <div class="col-md-12" style="border-bottom: 1px solid #c3c1c1;padding-bottom: 5px;">
                            <h2 class="text_1">Contact this agent</h2>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12"
                                     style="padding-top: 35px;text-align:  center;padding-bottom: 15px;">
                                    <a onclick="showTelNo(<?php echo $agent_data['EIdNo']; ?>,'<?php echo $agent_data['EpMobile']; ?>')"
                                       class="btn btn-contact_n btn_set" style="position:  relative;"><i
                                                class="fa fa-phone" aria-hidden="true"></i> <span
                                                id="telNo_<?php echo $agent_data['EIdNo']; ?>">Call Agent</span>
                                    </a>
                                </div>
                                <div class="col-md-12"
                                     style="padding-top: 6px;text-align:  center;padding-bottom: 25px;">
                                    <a href="#" onclick="open_property_agent_email(<?php echo $agent_data['EIdNo']; ?>)"
                                       class="btn btn-contact_n btn_set" style="position:  relative;"><span
                                                class="glyphicon glyphicon-envelope"
                                                style="position:  absolute;font-size: 20px;margin-left: -50px;margin-top: 8px;"></span>
                                        Email agent</a>
                                </div> 
                              

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row set_right_box">
                    <div class="agent_company">
                        <div class="col-md-12 col-sm-12 col-xs-12 p_1">
                            <h2 class="text_1">Company</h2>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-2 col-xs-4">
                                    <img src="<?php
                                    if (!empty($agent_data['companyLogo'])) {
                                        echo base_url('uploads/company_image/' . $agent_data['companyLogo']);
                                    } else {
                                        echo base_url('uploads/company_image/default-company_image.jpg');
                                    }
                                    ?>" alt="Logo" class="img-responsive">
                                </div>
                                <?php
                                $companyID = $agent_data['company_id'];
                                $sql = $this->db->query("SELECT EIdNo FROM srp_employeesdetails WHERE company_id = '" . $companyID . "' AND isCompany = '1'");
                                $resultset_CID = $sql->result_array();

                                ?>

                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <h3 class="text_2"><?php echo $agent_data['company_name']; ?></h3>
                                    <?php if (!empty($resultset_CID)){ ?>
                                    <a href="<?php echo site_url('companyOverview/' . $resultset_CID[0]['EIdNo'] . '/1') ?>">
                                        <h3 class="text_3 m_1">View profile</h3>
                                        <?php } ?>
                                    </a>
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
                        <li style="width: 30%;">
                            <a href="#11" data-toggle="tab">About me</a>
                        </li>
                        <li class="active" style="width: 35%;border-bottom-color: transparent;"><a href="#22"
                                                                                                   data-toggle="tab">My
                                properties</a>
                        </li>
                        <li style="width: 35%;border-left-color: transparent;"><a href="#33" data-toggle="tab">My
                                transactions </a>
                        </li>
                    </ul>

                    <div class="tab-content tab-set">
                        <div class="tab-pane " id="11">
                            <h3 style="font-size: 14px;font-weight: 500;color: #747474;font-family: 'Roboto', sans-serif;">
                                <?php echo isset($agent_data['myProfile']) ? $agent_data['myProfile'] : 'Not available'; ?>
                            </h3>
                        </div>
                        <div class="tab-pane active" id="22">
                            <h3 style="font-size: 14px;font-weight: 500;color: #747474;font-family: 'Roboto', sans-serif;"></h3>
                            <?php
                            echo isset($propertyDetail) ? $propertyDetail : '';
                            ?>
                        </div>
                        <div class="tab-pane" id="33">
                            <h3 style="font-size: 14px;font-weight: 500;color: #747474;font-family: 'Roboto', sans-serif;"></h3>
                            <?php
                            $sql = $this->db->query('SELECT
                                                property.property_name,
                                                property.description,
                                                property.property_price,
                                                property.area,
                                                property.property_address,
                                                property_types.property_type_name,
                                                bed_types.bed_type_name,
                                                property.updated_at,
                                                property.isActive,category_types.category_id,
                                                category_types.category_name
                                                FROM
                                                srp_employeesdetails
                                                left JOIN property ON srp_employeesdetails.EIdNo = property.agent_id
                                                left JOIN property_types ON property.property_id = property_types.property_type_id
                                                left JOIN bed_types ON property.bed_type_id = bed_types.bed_type_id
                                                INNER JOIN category_types ON property.category_type_id = category_types.category_id
                                                WHERE category_types.category_id= 5 or category_types.category_id=6
                                                ');
                            $resultset = $sql->result(); ?>

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
                                                    <span class="label label-default"><?php echo $item->category_name; ?></span>
                                                <?php } else { ?>
                                                    <span class="label label-primary"><?php echo $item->category_name; ?></span>
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

<!--Edit Modal start-->
<div class="modal" data-backdrop="static" id="modal_agent_details_edit" role="dialog">
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
                                <input id="agent_id" value="<?php echo $agent_data['EIdNo']; ?>" name="agent_id"
                                       type="hidden">

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="agent_name">Name</label>
                                    <div class="col-md-6">
                                        <input id="agent_name" name="agent_name" type="text" placeholder="Name"
                                               value="<?php echo $agent_data['Ename1']; ?>"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linkedin">LinkedIn</label>
                                    <div class="col-md-6">
                                        <input id="linkedin" name="linkedin" type="text"
                                               placeholder="Add your LinkedIn profile link here"
                                               value="<?php echo $agent_data['EpLinkedin']; ?>"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linkedin">Nationality</label>
                                    <div class="col-md-6">
                                        <input id="nationality" name="nationality" type="text"
                                               placeholder="Add your Nationality"
                                               value="<?php echo $agent_data['EpNationality']; ?>"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="linkedin">Languages</label>
                                    <div class="col-md-6">
                                        <input id="languages" name="languages" type="text"
                                               placeholder="Add your Languages"
                                               value="<?php echo $agent_data['EpLanguages']; ?>"
                                               class="form-control input-md">

                                    </div>
                                </div>

                                <!-- Textarea -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textarea">About me</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" id="about_agent"
                                                  name="about_agent"><?php echo $agent_data['myProfile']; ?></textarea>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submit_agent_data()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal end-->

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
            url: "<?php echo site_url('home_controller/agent_image_upload'); ?>",
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

    function submit_agent_data() {

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Masters/submit_agent_data'); ?>",
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
    function testmodal() {

        $('#modal_agent_details_edit').modal('show');
    }
</script>
