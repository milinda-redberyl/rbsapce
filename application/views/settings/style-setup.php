<?php
/*echo '<pre>';
print_r($this->session->all_userdata());
echo '</pre>';*/

$empID = "";
$user_details = "";
$full_name = "";
$myProfile = "";
$UserName = "";
$profile_pic = base_url() . "assets/images/avatars/profile-pic.jpg";

if ($this->session->all_userdata()) {
    $user_data = $this->session->all_userdata();
    $empID = $user_data['empID'];

    $user_details_q = "SELECT
                        * 
                    FROM
                        srp_employeesdetails 
                    WHERE
                        srp_employeesdetails.EIdNo = " . $empID;
    $user_details = $this->db->query($user_details_q)->result_array();

    $full_name = $user_details[0]['Ename1'];
    $myProfile = $user_details[0]['myProfile'];
    $UserName = $user_details[0]['UserName'];
    if ($user_details[0]['EmpImage'] != "") {
        $profile_pic = base_url('uploads/agents/' . $user_details[0]['EmpImage']);
    }
}

//print_r($user_details);

?>

<div id="user-profile-2" class="user-profile">
    <div class="tabbable">
        <ul class="nav nav-tabs padding-18">
            <li class="active">
                <a data-toggle="tab" href="#home" aria-expanded="true">
                    <i class="green ace-icon fa fa-user bigger-120"></i>
                    Profile
                </a>
            </li>
        </ul>

        <div class="tab-content no-border padding-24">
            <div id="home" class="tab-pane active">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 center">
                        <span class="profile-picture">
                            <img class="editable img-responsive" alt="Alex's Avatar"
                                 id="avatar2"
                                 src="<?php echo $profile_pic; ?>">
                        </span>

                        <div class="space space-4"></div>
                    </div><!-- /.col -->

                    <div class="col-xs-12 col-sm-9">
                        <h4 class="blue">
                            <span class="middle">
                                <?php echo $full_name; ?>
                            </span>
                        </h4>

                        <div class="profile-user-info">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Username</div>

                                <div class="profile-info-value">
                                    <span><?php echo $UserName; ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Password</div>

                                <div class="profile-info-value">
                                    <span>*******</span>
                                    <a href="javascript:;" onclick="edit_user(<?php echo $empID; ?>);">Change</a>
                                </div>
                            </div>
                        </div>

                        <div class="hr hr-8 dotted"></div>

                        <div class="profile-user-info">
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <div class="space-20"></div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="widget-box transparent">
                            <div class="widget-header widget-header-small">
                                <h4 class="widget-title smaller">
                                    <i class="ace-icon fa fa-check-square-o bigger-110"></i>
                                    Little About Me
                                </h4>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main">
                                    <p>
                                        <?php echo $myProfile; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /#home -->
        </div>
    </div>
</div>

<div class="modal fade" id="userModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Users</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" role="form" id="form_users">
                    <input type="hidden" id="EIdNohn" name="EIdNo">
                    <input type="hidden" id="status" name="status" value="1">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password</label>
                        <div class="col-sm-9">
                            <input type="password" id="Password" name="Password" value="******" placeholder="Password"
                                   class="col-xs-10 col-sm-5"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Confirm
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" id="confirmPassword" name="confirmPassword" value="******"
                                   placeholder="Password"
                                   class="col-xs-10 col-sm-5"/>
                        </div>
                    </div>

                    <div style="visibility: hidden; display: none;">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name</label>

                            <div class="col-sm-9">
                                <input type="text" id="Ename1" name="Ename1" placeholder="Name"
                                       class="col-xs-10 col-sm-5"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> User Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="EEmail" name="EEmail" placeholder="Email"
                                       class="col-xs-10 col-sm-5"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phone</label>
                            <div class="col-sm-9">
                                <input type="text" id="EpTelephone" name="EpTelephone" placeholder="Phone"
                                       class="col-xs-10 col-sm-5"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mobile</label>
                            <div class="col-sm-9">

                                <input type="text" id="EpMobile" maxlength="9" minlength="9" name="EpMobile"
                                       placeholder="Mobile"
                                       class="col-xs-10 col-sm-5"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Skype</label>
                            <div class="col-sm-9">
                                <input type="text" id="EpSkype" name="EpSkype" placeholder="Skype"
                                       class="col-xs-10 col-sm-5"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> LINKEDIN</label>
                            <div class="col-sm-9">
                                <input type="text" id="EpLinkedin" name="EpLinkedin" placeholder="Linkedin"
                                       class="col-xs-10 col-sm-5"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                Designation</label>
                            <div class="col-sm-9">
                                <input type="text" id="EpDesignation" name="EpDesignation" placeholder="Designation"
                                       class="col-xs-10 col-sm-5"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                Nationality</label>
                            <div class="col-sm-9">
                                <input type="text" id="EpNationality" name="EpNationality" placeholder="Nationality"
                                       class="col-xs-10 col-sm-5"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Languages</label>
                            <div class="col-sm-9">
                                <input type="text" id="EpLanguages" name="EpLanguages" placeholder="Languages"
                                       class="col-xs-10 col-sm-5"/>
                            </div>
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right ">Is Admin</label>

                        <div class="checkbox">
                            <label>
                                <input id="isSystemAdmin" name="adminoragent" value="1" type="radio" class="ace">
                                <span class="lbl"> </span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right ">Is Agent</label>

                        <div class="checkbox">
                            <label>
                                <input id="isAgent" name="adminoragent" value="2" type="radio" class="ace">
                                <span class="lbl"> </span>
                            </label>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right ">Is Company</label>

                        <div class="checkbox">
                            <label>
                                <input id="isCompany" name="adminoragent" value="3" type="radio" class="ace">
                                <span class="lbl"> </span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right ">Active</label>

                        <div class="checkbox">
                            <label>
                                <input id="status" name="status" type="checkbox" value="1" class="ace"/>
                                <span class="lbl"> </span>
                            </label>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right "></label>

                        <button class="btn btn-info btn-xs" onclick="submit_users()" type="button">
                            Submit
                        </button>
                    </div>


                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>

    function submit_users() {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Masters/submit_users'); ?>",
            data: $("#form_users").serialize(),
            cache: false,
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                myAlert(data[0], data[1]);
                if (data[0] == 's') {
                    $('#userModal').modal('hide');
                    load_users_view();

                }

            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    }

    function edit_user(EIdNo) {
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: {'EIdNo': EIdNo},
            url: "<?php echo site_url('Masters/edit_user'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                $('#EIdNohn').val(EIdNo);
                $('#Ename1').val(data['Ename1']);
                $('#EEmail').val(data['UserName']);
                $('#EpTelephone').val(data['EpTelephone']);
                $('#EpMobile').val(data['EpMobile']);
                $('#EpSkype').val(data['EpSkype']);
                $('#EpDesignation').val(data['empDesignation']);
                $('#EpNationality').val(data['EpNationality']);
                $('#EpLanguages').val(data['EpLanguages']);
                //$('#Password').val('******');

                if (data['isSystemAdmin'] == 1) {
                    $('#isSystemAdmin').prop('checked', true);
                } else {
                    $('#isSystemAdmin').prop('checked', false);
                }
                if (data['isAgent'] == 1) {
                    $('#isAgent').prop('checked', true);
                } else {
                    $('#isAgent').prop('checked', false);
                }
                if (data['isActive'] == 1) {
                    $('#status').prop('checked', true);
                } else {
                    $('#status').prop('checked', false);
                }
                $('#userModal').modal('show');
            }, error: function () {
                swal("Cancelled", "Your file is safe :)", "error");
            }
        });
    }
</script>