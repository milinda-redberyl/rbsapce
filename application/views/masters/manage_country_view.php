<?php
echo load_lib_dataTable();
?>

<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue"><i class="menu-icon fa fa-flag"></i> Country </h3>
        <div class="row" style="margin-top: 5px">
            <div class="col-xs-12">
                <button onclick="countryModalOpen()" class="btn btn-primary btn-xs pull-right" role="button">Add
                    Country
                </button>
            </div>
        </div>
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <table id="country_table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th style="min-width: 30%">Country</th>
                <th style="min-width: 10%">Status</th>
                <th style="min-width: 10%">Action</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

<div class="modal fade" id="countryModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Country</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" role="form" id="form_country">
                    <input type="hidden" id="country_idhn" name="country_id">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Country </label>

                        <div class="col-sm-9">
                            <input type="text" id="country_name" name="country_name" placeholder="Country" class="col-xs-10 col-sm-5"/>
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
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right "></label>

                        <button class="btn btn-info btn-xs" onclick="submit_country()" type="button">
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



<div class="modal fade" id="cityModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">City</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="form_city">
                    <input type="hidden" id="country_id_city" name="country_id">
                    <input type="hidden" id="city_idhn" name="city_id">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> City </label>

                        <div class="col-sm-9">
                            <input type="text" id="city_name" name="city_name" placeholder="City" class="col-xs-10 col-sm-5"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right ">Active</label>

                        <div class="checkbox">
                            <label>
                                <input id="status_city" name="status" type="checkbox" value="1" class="ace"/>
                                <span class="lbl"> </span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right "></label>

                        <button class="btn btn-info btn-xs" onclick="submit_city()" type="button">
                            Submit
                        </button>
                    </div>
                </form>
                <div class="row">
                    <div class="col-xs-12">
                        <table id="city_table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="min-width: 30%">City</th>
                                <th style="min-width: 10%">Status</th>
                                <th style="min-width: 10%">Action</th>
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

<script type="text/javascript">
    $(document).ready(function () {
        country_table();
    });

    function country_table() {
        $('#country_table').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "StateSave": true,
            "sAjaxSource": "<?php echo site_url('Masters/fetch_country'); ?>",
            "aaSorting": [[0, 'desc']],
            "fnInitComplete": function () {

            },
            "fnDrawCallback": function (oSettings) {
                //tableBgColorJs();
            },
            "aoColumns": [
                {"mData": "country_name"},
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

    function countryModalOpen() {
        $('#country_name').val('');
        $('#country_idhn').val('');
        $('#countryModal').modal('show');
    }

    function submit_country() {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Masters/submit_country'); ?>",
            data: $("#form_country").serialize(),
            cache: false,
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                myAlert(data[0], data[1]);
                if (data[0] == 's') {
                    $('#countryModal').modal('hide');
                    country_table();

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    }

    function delete_country(id) {


        swal({
            title: 'Are you sure',
            text: 'You want to delete this ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if(result.value
    )
        {
            $.ajax({
                async: true,
                type: 'post',
                dataType: 'json',
                data: {'country_id': id},
                url: "<?php echo site_url('Masters/delete_country'); ?>",
                beforeSend: function () {
                    startLoad();
                },
                success: function (data) {
                   stopLoad();
                    if (data[0] == 's') {
                        country_table();
                    }
                    myAlert(data[0],data[1])

                }, error: function () {
                    swal("Cancelled", "Your file is safe :)", "error");
                }
            });
            // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
        }
    else
        if (result.dismiss === 'cancel') {
            swal(
                'Cancelled',
                'Your record is safe :)',
                'error'
            )
        }
    })
    }

    function edit_country(country_id){
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: {'country_id': country_id},
            url: "<?php echo site_url('Masters/edit_country'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                $('#country_idhn').val(country_id);
                $('#country_name').val(data['country_name']);
                if (data['status'] == 1) {
                    $('#status').attr('checked', true);
                } else {
                    $('#status').attr('checked', false);
                }
                $('#countryModal').modal('show');
            }, error: function () {
                swal("Cancelled", "Your file is safe :)", "error");
            }
        });
    }

    function add_city_model(country_id){
        $('#cityModal').modal('show');
        $('#city_idhn').val('');
        $('#country_id_city').val(country_id);
        $('#city_name').val('');
        fetch_city()
    }

    function fetch_city(){
        $('#city_table').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "StateSave": true,
            "sAjaxSource": "<?php echo site_url('Masters/fetch_city'); ?>",
            "aaSorting": [[0, 'desc']],
            "fnInitComplete": function () {

            },
            "fnDrawCallback": function (oSettings) {
                //tableBgColorJs();
            },
            "aoColumns": [
                {"mData": "city_name"},
                {"mData": "statuscolor"},
                {"mData": "edit"}
            ],
            "fnServerData": function (sSource, aoData, fnCallback) {
                aoData.push({'name': 'country_id', 'value': $('#country_id_city').val()});
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

    function submit_city(){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Masters/submit_city'); ?>",
            data: $("#form_city").serialize(),
            cache: false,
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                myAlert(data[0], data[1]);
                if (data[0] == 's') {
                    $('#city_idhn').val('');
                    $('#city_name').val('');
                    $('#status_city').attr('checked',false);
                    fetch_city();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    }

    function edit_city(city_id){
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: {'city_id': city_id},
            url: "<?php echo site_url('Masters/edit_city'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                $('#city_idhn').val(city_id);
                $('#city_name').val(data['city_name']);
                if (data['status'] == 1) {
                    $('#status_city').attr('checked', true);
                } else {
                    $('#status_city').attr('checked', false);
                }
                $('#cityModal').modal('show');
            }, error: function () {
                swal("Cancelled", "Your file is safe :)", "error");
            }
        });
    }


    function delete_city(id) {


        swal({
            title: 'Are you sure',
            text: 'You want to delete this ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if(result.value
    )
        {
            $.ajax({
                async: true,
                type: 'post',
                dataType: 'json',
                data: {'city_id': id},
                url: "<?php echo site_url('Masters/delete_city'); ?>",
                beforeSend: function () {
                    startLoad();
                },
                success: function (data) {
                    stopLoad();
                    if (data[0] == 's') {
                        fetch_city();
                    }
                    myAlert(data[0],data[1])

                }, error: function () {
                    swal("Cancelled", "Your file is safe :)", "error");
                }
            });
            // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
        }
    else
        if (result.dismiss === 'cancel') {
            swal(
                'Cancelled',
                'Your record is safe :)',
                'error'
            )
        }
    })
    }


</script>