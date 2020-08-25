<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="<?php echo base_url('assets/system/') ?>js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url('assets/system/') ?>js/ie10-viewport-bug-workaround.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/owl.carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/system/') ?>js/bootstrap-select.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/wow.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/main.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>jquery-autocomplete/scripts/jquery.mockjax.js"></script>
<script src="<?php echo base_url('assets/'); ?>jquery-autocomplete/src/jquery.autocomplete.js"></script>
<!--<script src="<?php /*echo base_url('assets/'); */ ?>select2/js/select2.full.min.js"></script>-->

<script type="text/javascript" src="<?php echo base_url() ?>assets/toastr/build/toastr.min.js"></script>

<script src="<?php echo base_url() ?>assets/sweetalert/dist/sweetalert2.min.js"></script>
<script src="<?php echo base_url('assets/') ?>js/tabulous.js"></script>
<script src="<?php echo base_url('assets/') ?>js/js.js"></script>


<div class="modal" data-backdrop="static" id="modal_property_sendEmail" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 vv">
                        <div id="propertyEmailBody">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" data-backdrop="static" id="modal_share_property" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-10">
                        <h3>SHARE PROPERTY</h3>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form role="form" id="frm_share_property" name="frm_share_property" class="form-horizontal">
                            <input type="hidden" name="property_id" id="hn_share_property_id" >

                            <div class="row" style="margin-top: 4%;">
                                <div class="col-xs-12">

                             <textarea name="description" id="description" cols="30" rows="2" class="form-control"
                      style="border-radius:0px;">Hi, I found this home on <?php echo sys_name(); ?>. Please check it out and tell me what you think...</textarea>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 2%;">
                                <div class="col-xs-6">
                                    <input type="text" id="yourEmail" name="yourEmail" placeholder="Your email"
                                           class="form-control"
                                           style="border-radius:0px;height: 40px;">
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" id="friendEmail" name="friendEmail" placeholder="Friend's email"
                                           class="form-control"
                                           style="border-radius:0px;height: 40px;">
                                </div>
                            </div>
                        </form>
                        <div class="row" style="margin-top: 2%;">
                            <div class="col-xs-12">
                                <div class="input-group-btn ">
                                    <button class="btn btn-search pull-right" type="button"
                                            style="background-color:#3460aa;color: white;height: 40px;" onclick="share_property_email()">
                                        <span>Send</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function startLoad() {
        swal.showLoading();
    }

    function stopLoad() {
        swal.close();
    }

    $(document).ready(function () {
        // $('.select2').select2();
    })
    /*new WOW().init();*/
    var countries = <?php echo json_encode(get_active_cities()) ?>;
    $('.cty').autocomplete({
        lookup: countries,
        onSelect: function (suggestion) {
            $(".cty_id").val(suggestion.data);
        }
    });

    function myAlert(type, message, duration=null) {
        toastr.clear();
        initAlertSetup(duration);
        if (type == 'e' || type == 'd') {
            toastr.error(message, '<?php echo $this->lang->line('common_error');?>'/*'Error!'*/);
        } else if (type == 's') {
            toastr.success(message, '<?php echo $this->lang->line('common_success');?>'/*'Success!'*/);
        } else if (type == 'w') {
            toastr.warning(message, '<?php echo $this->lang->line('common_warning');?>'/*'Warning!'*/);
        } else if (type == 'i') {
            toastr.info(message, '<?php echo $this->lang->line('common_information');?>'/*'Information'*/);
        } else {
            toastr.error('wrong input type! type only allowed for "e","s","w","i"', 'Error!');
        }
    }

    function initAlertSetup(duration=null) {
        duration = ( duration == null ) ? '1000' : duration;
        toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right animated-panel fadeInTop",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": duration,
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }

    function loginRegister() {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Login/loginRegister'); ?>",
            data: $("#form_register").serialize(),
            cache: false,
            beforeSend: function () {
                $("#ajax_loader_reg_btn").show();
            },
            success: function (data) {
                $("#ajax_loader_reg_btn").hide();
                stopLoad();
                myAlert(data[0], data[1]);
                if (data[0] == 's') {
                    $('#registerModal').modal('hide');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#ajax_loader_reg_btn").hide();
            }
        });
    }

    function send_property_email(property_id) {
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'html',
            data: {property_id: property_id},
            url: "<?php echo site_url('Property/load_property_email_body'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                $('#propertyEmailBody').html(data);
                $('#modal_property_sendEmail').modal('show');
                stopLoad();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                stopLoad();
                myAlert('e', '<br>Message: ' + errorThrown);
            }
        });

    }

    function save_property_email() {
        var data = $("#frm_property_sendEmail").serializeArray();
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: data,
            url: "<?php echo site_url('Property/send_property_Email'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                myAlert(data[0], data[1]);
                if (data[0] == 's') {
                    $("#modal_property_sendEmail").modal('hide');
                }
            }, error: function () {
                alert('An Error Occurred! Please Try Again.');
                stopLoad();
                refreshNotifications(true);
            }
        });
    }

    function share_property_email() {
        var data = $("#frm_share_property").serializeArray();
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: data,
            url: "<?php echo site_url('Property/share_property_Email'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                myAlert(data[0], data[1]);
                if (data[0] == 's') {
                    $("#modal_share_property").modal('hide');
                }
            }, error: function () {
                alert('An Error Occurred! Please Try Again.');
                stopLoad();
                refreshNotifications(true);
            }
        });
    }

    function share_property_Email_model(id) {
        $('#hn_share_property_id').val(id);
        $('#modal_share_property').modal('show');
    }
</script>

<script type="text/javascript">
    
    function showTelNo(id, tel) {
        $("#telNo_" + id).html(tel);
    }
    
</script>

<?php
/*
$result = get_active_cities();
var_dump($result);*/
?>
</body>
</html>
