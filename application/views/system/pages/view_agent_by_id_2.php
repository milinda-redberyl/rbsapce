<link href="<?php echo base_url('assets/system/') ?>css/agentStyle.css" rel="stylesheet">
<style>
    .btn-contact {
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

    .btn-contact:hover {
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
                                <?php if (!empty($agent_data['EmpImage'])) { ?>
                                    <img src="<?php echo base_url('uploads/agents/' . $agent_data['EmpImage']) ?>"
                                         style="width: 100%"/>
                                <?php } else { ?>
                                    <img src="<?php echo base_url('uploads/agents/default-user-img.jpg') ?>" style="width: 100%"/>
                                <?php } ?>
                            </div>
                            <div class="col-md-7 col-xs-11 col-md-offset-0 col-xs-offset-1">
                                <h2 style="font-size: 20px;font-weight: 600;color: #0194AC;font-family: 'Roboto', sans-serif;">
                                    <?php echo $agent_data['Ename1']; ?></h2>

                                <h3 class="text_4">Senior Leasing Consultant</h3>

                                <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                        <h3 class="text_5">Nationality:</h3>

                                        <h3 class="text_5">Languages:</h3>

                                        <h3 class="text_5">Transactions:</h3>
                                    </div>
                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                        <h3 class="text_6 m_1 "><?php echo $agent_data['country_name']; ?></h3>

                                        <h3 class="text_6 m_1 ">English</h3>

                                        <h3 class="text_3 m_1 ">11 (last months )</h3>
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
                                    <div
                                        class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-4 col-xs-offset-1">
                                        <h3 class="text_5">ACTIVE LISTINGS:</h3>

                                        <h3 class="text_5">EXPERIENCE SINCE:</h3>

                                        <h3 class="text_5">LINKEDIN:</h3>
                                    </div>
                                    <div class="col-md-8 col-sm-7 col-xs-7">
                                        <h3 class="text_3 m_1 ">22 Properties</h3>

                                        <h3 class="text_6 m_1 ">2015</h3>

                                        <h3 class="text_3 m_1 ">View profile</h3>
                                    </div>
                                </div>
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
                                       class="btn btn-contact btn_set" style="position:  relative;"><i
                                            class="fa fa-phone" aria-hidden="true"></i> <span
                                            id="telNo_<?php echo $agent_data['EIdNo']; ?>">Call Agent</span>
                                    </a>
                                </div>
                                <div class="col-md-12"
                                     style="padding-top: 6px;text-align:  center;padding-bottom: 25px;">
                                    <a href="#" onclick="open_property_agent_email(<?php echo $agent_data['EIdNo']; ?>)"
                                       class="btn btn-contact btn_set" style="position:  relative;"><span
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
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <img src="images/company_logo.png" class="img-responsive" alt="">
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <h3 class="text_2">Suhai Bahawan Group</h3>
                                    <a href="#"><h3 class="text_3 m_1">View profile</h3></a>
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
                        <li class="active" style="width: 25%;">
                            <a href="#1" data-toggle="tab">About me</a>
                        </li>
                        <li style="width: 25%;border-bottom-color: transparent;"><a href="#2" data-toggle="tab">My
                                properties (11)</a>
                        </li>
                        <li style="width: 25%;border-left-color: transparent;"><a href="#3" data-toggle="tab">My
                                transactions (19)</a>
                        </li>
                    </ul>

                    <div class="tab-content tab-set">
                        <div class="tab-pane active" id="1">
                            <h3 style="font-size: 14px;font-weight: 500;color: #747474;font-family: 'Roboto', sans-serif;">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In diam diam, placerat a
                                maximus et, porttitor sit amet tellus. Interdum et malesuada fames ac ante ipsum primis
                                in faucibus. Sed ut gravida ante, vitae placerat quam. Nullam sed neque nec tortor
                                molestie vestibulum ac sed ligula. Proin pretium vestibulum nisi quis iaculis. In
                                elementum, nisl non pulvinar ornare, ante nibh blandit nibh, condimentum facilisis ante
                                neque non risus.</h3>
                        </div>
                        <div class="tab-pane" id="2">
                            <h3 style="font-size: 14px;font-weight: 500;color: #747474;font-family: 'Roboto', sans-serif;">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In diam diam, placerat a
                                maximus et, porttitor sit amet tellus. Interdum et malesuada fames ac ante ipsum primis
                                in faucibus. Sed ut gravida ante, vitae placerat quam. Nullam sed neque nec tortor
                                molestie vestibulum ac sed ligula. Proin pretium vestibulum nisi quis iaculis. In
                                elementum, nisl non pulvinar ornare, ante nibh blandit nibh, condimentum facilisis ante
                                neque non risus.</h3>
                        </div>
                        <div class="tab-pane" id="3">
                            <h3 style="font-size: 14px;font-weight: 500;color: #747474;font-family: 'Roboto', sans-serif;">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In diam diam, placerat a
                                maximus et, porttitor sit amet tellus. Interdum et malesuada fames ac ante ipsum primis
                                in faucibus. Sed ut gravida ante, vitae placerat quam. Nullam sed neque nec tortor
                                molestie vestibulum ac sed ligula. Proin pretium vestibulum nisi quis iaculis. In
                                elementum, nisl non pulvinar ornare, ante nibh blandit nibh, condimentum facilisis ante
                                neque non risus.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal" data-backdrop="static" id="modal_property_agent_sendEmail" role="dialog">
    <div class="modal-dialog modal-lg" style="width:40%">
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
<script>

    function open_property_agent_email(EIdNo) {
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'html',
            data: {EIdNo: EIdNo},
            url: "<?php echo site_url('home_controller/load_property_email_body'); ?>",
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

    function showTelNo(id, tel) {
        $("#telNo_" + id).html(tel);
    }
</script>