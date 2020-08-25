<?php
echo load_lib_dataTable();

$company_details_q = "SELECT
                company_master.*,
                srp_employeesdetails.*
                FROM
                company_master
                INNER JOIN srp_employeesdetails ON company_master.company_id = srp_employeesdetails.company_id
                WHERE
                srp_employeesdetails.isActive = 1 GROUP BY company_master.company_id";
$company_details = $this->db->query($company_details_q)->result_array();

?>

<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue"><i class="fa fa-users"></i> Users </h3>
        <div class="row" style="margin-top: 5px">
            <div class="col-xs-12">
                <button onclick="usersModalOpen()" class="btn btn-primary btn-xs pull-right" role="button">Add User</button>
            </div>
        </div>
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <table id="user_table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Registered On</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
            </thead>
        </table>
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

                    <?php
                    $user_data = $this->session->all_userdata();

                    if ($user_data['isSystemAdmin']) {
                        ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> User Type</label>
                            <div class="col-sm-9">
                                <select name="user_type" onchange="change_utype(this.value);" id="user_type" class="col-xs-10 col-sm-5">
                                    <option value="isCompany">Company</option>
                                    <option value="isAgent">Agent</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Company</label>
                            <div class="col-sm-9">
                                <select name="company_sel" id="company_sel" class="col-xs-10 col-sm-5">
                                    <option value="1">Administrator</option>
                                    <?php
                                    foreach ($company_details as $company_detail) {
                                        ?>
                                        <option value="<?php echo $company_detail['company_id']; ?>">
                                            <?php echo $company_detail['company_name']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password</label>
                        <div class="col-sm-9">
                            <input type="password" id="Password" name="Password" placeholder="Password"
                                   class="col-xs-10 col-sm-5"/>
                        </div>
                    </div>
                         <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Password"
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

                                   <input type="text" id="EpMobile" maxlength="9" minlength="9" name="EpMobile" placeholder="Mobile"
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
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Designation</label>
                        <div class="col-sm-9">
                            <input type="text" id="EpDesignation" name="EpDesignation" placeholder="Designation"
                                   class="col-xs-10 col-sm-5"/>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nationality</label>
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
                    </div>-->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right ">Active</label>

                        <div class="checkbox">
                            <!-- <label>
                                <input id="" name="status" type="checkbox" value="1" class="ace"/>
                                <span class="lbl"> </span>
                            </label> -->
                            <label class="inline">
                                <input type="hidden" name="status" id="status" value="0">
                                <input id="status_ch" type="checkbox" class="ace ace-switch ace-switch-5">
                                <span class="lbl middle"></span>
                            </label>
                        </div>
                    </div>

                    <input type="hidden" name="reg_status" id="reg_status" value="add">

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
<script type="text/javascript">
    $(document).ready(function () {
        load_users_view()
    });

    function load_users_view(){
        $('#user_table').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ],
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "StateSave": true,
            "sAjaxSource": "<?php echo site_url('Masters/fetch_users_view'); ?>",
            "aaSorting": [[0, 'desc']],
            "fnInitComplete": function () {

            },
            "fnDrawCallback": function (oSettings) {
                //tableBgColorJs();
            },
            "aoColumns": [
                {"mData": "Ename1"},
                {"mData": "UserName"},
                {"mData": "statusRole"},
                {"mData": "registerDate"},
                {"mData": "statuscolor"},
                {"mData": "edit"}
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

    function usersModalOpen(){
        $('#EIdNohn').val('');
        $('#Ename1').val('');
        $('#EEmail').val('');
        $('#Password').val('******');
        $('#EpTelephone').val('');
        $('#EpMobile').val('');
        $('#EpSkype').val('');
        $('#isAgent').attr('checked',true);
        $('#isSystemAdmin').attr('checked',false);
        $('#userModal').modal('show');

        $('#user_type').prop('disabled', false);
        $("#reg_status").val("add");

        $('#company_sel').prop('disabled', true);
        $('#company_sel').val('1');
    }

    function submit_users(){
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

    function edit_user(EIdNo){
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
                $('#Password').val('******');

                $('#company_sel').val(data['company_id']);

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

                if (data['isAgent'] == 1) {
                    $('#user_type').val("isAgent");
                    $('#user_type').prop('disabled', true);
                    $('#company_sel').prop('disabled', false);
                } else {
                    $('#user_type').val("isCompany");
                    $('#user_type').prop('disabled', true);
                    $('#company_sel').prop('disabled', true);
                    $('#company_sel').val(1);
                }

                if (data['isActive'] == 1) {
                    $('#status_ch').prop('checked', true);
                    $("#status").val("1");
                } else {
                    $('#status_ch').prop('checked', false);
                }

                $("#reg_status").val("edit");

                $('#userModal').modal('show');
            }, error: function () {
                swal("Cancelled", "Your file is safe :)", "error");
            }
        });
    }

    function delete_user(id) {
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
                data: {'EIdNo': id},
                url: "<?php echo site_url('Masters/delete_employee'); ?>",
                beforeSend: function () {
                    startLoad();
                },
                success: function (data) {
                    stopLoad();
                    if (data[0] == 's') {
                        load_users_view();
                    }
                    myAlert(data[0], data[1])

                }, error: function () {
                    swal("Cancelled", "Your file is safe :)", "error");
                }
            });
            // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
        }
    else if (result.dismiss === 'cancel') {
            swal(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })

    }

</script>
<script type="text/javascript">

    $(document).ready(function () {
      $("#EpMobile").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
       });
      $("#EpMobile").keyup(function () {
            var nums = this.value;
            var num = nums.slice(0,1);
          if (num < 9 ) {
               return true;
            } else {
               $("#EpMobile").val('');
            }
       });
    });

</script>
<script>
    $('#status_ch').on('change', function() {
        if(this.checked){
            $("#status").val("1");
        } else {
            $("#status").val("0");
        }
        //var val = this.checked ? this.value : '';

    });

    $(document).ready(function () {
        $('#company_sel').prop('disabled', true);
    });

    function change_utype(value) {
        if(value === "isAgent"){
            $('#company_sel').prop('disabled', false);
        } else if(value === "isCompany"){
            $('#company_sel').prop('disabled', true);
            $('#company_sel').val(1);
        }
    }

</script>