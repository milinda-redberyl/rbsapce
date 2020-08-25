<link rel="stylesheet" href="<?php echo base_url('assets/system/') ?>css/buttons-si.css">
<!-- Modal -->
<div class="modal fade register-modal" data-easein="flipBounceYIn" id="registerModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form role="form" id="form_register" name="form_register">
                    <div class="modal-form">
                        <button type="button" class="popup-close" data-dismiss="modal" aria-label="Close"><img
                                    src="<?php echo base_url('assets/system/') ?>images/close.png" alt="Image"></button>
                        <h2>Partner Register</h2>

                        <div class="form-group">
                            <input class="form-control" name="firstName" id="firstName"
                                   placeholder="Name*">
                        </div>

                        <div class="form-group">
                            <input class="form-control" name="companyName" id="companyName"
                                   placeholder="Registered name of your company (If Any)">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="registrationNumber" id="registrationNumber"
                                   placeholder="Business Registration Number (If Any)">
                        </div>
                       <!-- <div class="form-group">
                            <?php // echo form_dropdown('countryID', drop_country(), '1', 'class="form-control select2 countryID" '); ?>
                        </div> -->
                        <div class="form-group">
                            <input class="form-control" name="partnerAddress" id="partnerAddress"
                                   placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="EEmail" id="EEmail"
                                   placeholder="Email*">
                        </div>

                        <div class="form-group">
                            <?php
                                $city_list = partner_getCity();
                                echo form_dropdown('city_id', $city_list, '', 'class="chosen-select form-control" id="city_id"');
                            ?>
                        </div>

                        <div class="form-group">
                            <input class="form-control" id="EpTelephone" name="EpTelephone" placeholder="Phone*"
                                   maxlength="10" minlength="9">
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="checkboxes">Service Type</label>
                                <div class="col-md-12">
                                    <?php
                                    $category_list = get_category_type();
                                    foreach ($category_list as $val ){
                                        ?>
                                        <input type="checkbox" name="category_list[]" value="<?php echo $val['category_id']?>" /> <?php echo " ".$val['category_name']?><br>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="checkboxes">Types of Property</label>
                                <div class="col-md-12">
                                    <?php
                                    $property_list = get_property_type();
                                    foreach ($property_list as $val2 ){
                                        ?>
                                        <input type="checkbox" name="property_list[]" value="<?php echo $val2['property_type_id']?>" /> <?php echo " ".$val2['property_type_name']?><br>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <input class="form-control" name="Password" id="reg_Password" type="password"
                                   placeholder="Password*">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="confirmPassword" type="password" id="confirmPassword"
                                   placeholder="Confirm Password*">
                        </div>

                        <button class="btn btn-block btn-register" type="button" onclick="loginRegister()">
                            REGISTER
                            <span id="ajax_loader_reg_btn" style="display: none;">
                                <i class="fa fa-refresh fa-spin"></i>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade register-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?php echo site_url('login/loginSubmit') ?>" id="login_form" method="post">
                    <input type="hidden" id="loginpage" name="loginpage" value="1">
                    <div class="modal-form">
                        <button type="button" class="popup-close" data-dismiss="modal" aria-label="Close"><img
                                    src="<?php echo base_url('assets/system/') ?>images/close.png" alt="Image"></button>
                        <h2>Login</h2>

                        <div class="form-group text-center">
                            <button class="btn-si btn-google">Sign in with Google</button>
                            <button class="btn-si btn-facebook">Sign in with Facebook</button>
                        </div>

                        <div class="form-group">
                            <input class="form-control" id="Username" name="Username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" id="Password" name="Password"
                                   placeholder="Password">
                        </div>
                        <button type="button" onclick="Login()" class="btn btn-block btn-register" id="btn_login">LOGIN
                            <span id="spinner_login" style="display: none;"> <i class="fa fa-refresh fa-spin"
                                                                                aria-hidden="true"></i> </span></button>
                        <?php if ($this->session->flashdata('msg')) { ?>
                            <div role="alert"
                                 class="alert alert-success"><?php echo $this->session->flashdata('msg'); ?></div>
                        <?php } ?>
                        <?php if (!empty($extra) && ($type == 'e')) { ?>
                            <div role="alert" class="alert alert-danger"><?php echo $extra; ?></div>
                        <?php } elseif (!empty($extra) && ($type == 's')) {
                            ?>
                            <div role="alert" class="alert alert-success"><?php echo $extra; ?></div>
                            <?php
                        } ?>
                        <div id="output_msg" style="display: none; margin-top:10px; font-weight: 700">&nbsp;</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade register-modal" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?php echo site_url('login/signupSubmit') ?>" id="signup_form" method="post">
                    <input type="hidden" id="loginpage" name="loginpage" value="1">
                    <div class="modal-form">
                        <button type="button" class="popup-close" data-dismiss="modal" aria-label="Close"><img
                                    src="<?php echo base_url('assets/system/') ?>images/close.png" alt="Image"></button>
                        <h2>Sign Up</h2>

                        <div class="form-group">
                            <input class="form-control" id="firstName" name="firstName" placeholder="firstName">
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="Username" name="Username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="EEmail" id="EEmail"
                                   placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" id="Password" name="Password"
                                   placeholder="Password">
                        </div>
                        <button type="button" onclick="Signup()" class="btn btn-block btn-register" id="btn_login">REGISTER
                            <span id="spinner_login" style="display: none;"> <i class="fa fa-refresh fa-spin"
                                                                                aria-hidden="true"></i> </span></button>
                        <?php if ($this->session->flashdata('msg')) { ?>
                            <div role="alert"
                                 class="alert alert-success"><?php echo $this->session->flashdata('msg'); ?></div>
                        <?php } ?>
                        <?php if (!empty($extra) && ($type == 'e')) { ?>
                            <div role="alert" class="alert alert-danger"><?php echo $extra; ?></div>
                        <?php } elseif (!empty($extra) && ($type == 's')) {
                            ?>
                            <div role="alert" class="alert alert-success"><?php echo $extra; ?></div>
                            <?php
                        } ?>
                        <div id="output_msg" style="display: none; margin-top:10px; font-weight: 700">&nbsp;</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#EpTelephone").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        });
        $("#EpTelephone").keyup(function () {
            var nums = this.value;
            var num = nums.slice(0, 1);
            if (num < 9 ) {
                return true;
            } else {
                $("#EpTelephone").val('');
            }
        });
        $('#Password').keyup(function (e) {
            if (e.keyCode == 13) {
                Login();
            }
        });

        $('#confirmPassword').keyup(function (e) {
            if (e.keyCode == 13) {
                loginRegister();
            }
        });
    });

    function Login() {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('login/loginSubmit_ajax'); ?>",
            data: $("#login_form").serialize(),
            cache: false,
            beforeSend: function () {
                $("#btn_login").prop('disabled', true);
                $("#spinner_login").show();
                $("#output_msg").hide();
            },
            success: function (data) {
                var redirect = false;
                $("#btn_login").prop('disabled', false);
                $("#spinner_login").hide();
                var class_variable = 'alert-danger';
                switch (data.status) {
                    case 'i':
                        class_variable = "alert-info";
                        break;
                    case 's':
                        class_variable = "alert-success";
                        redirect = true;
                        break;
                    case 'w':
                        class_variable = "alert-warning";
                        break;
                }

                setTimeout(function () {
                    if (redirect) {
                        window.location.replace(data['url']);
                    }
                }, 1000);


                $("#output_msg").html('<div class="alert ' + class_variable + '">' + data['message'] + ' </div>');
                $("#output_msg").show();

            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#btn_login").prop('disabled', false);
                $("#spinner_login").hide();
                myAlert('e', '<br>Message: ' + errorThrown);
            }
        });
    }


    function Signup() {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('login/signupSubmit_ajax'); ?>",
            data: $("#signup_form").serialize(),
            cache: false,
            beforeSend: function () {
                $("#btn_login").prop('disabled', true);
                $("#spinner_login").show();
                $("#output_msg").hide();
            },
            success: function (data) {
                console.log("testttttttttttttttttttttttttttttttttttttt");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("errorrrrrrrrrrrrrrrrrrrrr");
            }
        });
    }
</script>
