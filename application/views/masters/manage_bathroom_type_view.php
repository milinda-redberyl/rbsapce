<?php
echo load_lib_dataTable();
?>

<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue"><i class="menu-icon fa fa-bars"></i> Bathroom Type </h3>
        <div class="row" style="margin-top: 5px">
            <div class="col-xs-12">
                <button onclick="bathroomModalOpen()" class="btn btn-primary btn-xs pull-right" role="button">Add
                    Bathroom
                    type
                </button>
            </div>
        </div>
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <table id="bathroom_type_table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th style="min-width: 30%">Type</th>
                <th style="min-width: 10%">Status</th>
                <th style="min-width: 10%">Action</th>

            </tr>
            </thead>
        </table>
    </div>
</div>

<div class="modal fade" id="bathroomModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Bathroom Type</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" role="form" id="form_bathroom">
                    <input type="hidden" id="bathroom_type_idhn" name="bathroom_type_id">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bathroom
                            Type </label>

                        <div class="col-sm-9">
                            <input type="text" id="bathroom_type_name" name="bathroom_type_name" placeholder="Bathroom Type" class="col-xs-10 col-sm-5"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bathroom
                            Count </label>

                        <div class="col-sm-9">
                            <input type="text" id="bathroom_count" name="bathroom_count" placeholder="Bathroom Count" class="col-xs-10 col-sm-5"/>
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

                        <button class="btn btn-info btn-xs" onclick="submit_bathroom()" type="button">
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
        bathroom_type_table();
    });

    function bathroom_type_table() {
        $('#bathroom_type_table').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "StateSave": true,
            "sAjaxSource": "<?php echo site_url('Masters/fetch_bathroom_type'); ?>",
            "aaSorting": [[1, 'desc']],
            "fnInitComplete": function () {

            },
            "fnDrawCallback": function (oSettings) {
                //tableBgColorJs();
            },
            "aoColumns": [
                {"mData": "bathroom_type_name"},
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

    function bathroomModalOpen() {
        $('#bathroom_type_name').val('');
        $('#bathroom_type_idhn').val('');
        $('#bathroomModal').modal('show');
    }

    function submit_bathroom() {

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Masters/submit_bathroom'); ?>",
            data: $("#form_bathroom").serialize(),
            cache: false,
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                myAlert(data[0], data[1]);
                if (data[0] == 's') {
                    $('#bathroomModal').modal('hide');
                    bathroom_type_table();

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    }

    function delete_bathroomtype(id) {


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
                data: {'bathroom_type_id': id},
                url: "<?php echo site_url('Masters/delete_bathroomtype'); ?>",
                beforeSend: function () {
                    startLoad();
                },
                success: function (data) {
                   stopLoad();
                    if (data[0] == 's') {
                        bathroom_type_table();
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

    function edit_bathroom_type(bathroom_type_id){
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: {'bathroom_type_id': bathroom_type_id},
            url: "<?php echo site_url('Masters/edit_bathroom_type'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                $('#bathroom_type_idhn').val(bathroom_type_id);
                $('#bathroom_type_name').val(data['bathroom_type_name']);
                $('#bathroom_count').val(data['bathroom_count']);
                if (data['status'] == 1) {
                    $('#status').attr('checked', true);
                } else {
                    $('#status').attr('checked', false);
                }
                $('#bathroomModal').modal('show');
            }, error: function () {
                swal("Cancelled", "Your file is safe :)", "error");
            }
        });
    }


</script>