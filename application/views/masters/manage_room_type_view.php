<?php
echo load_lib_dataTable();
?>

<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue"><i class="menu-icon fa fa-bars"></i> Room Type </h3>
        <div class="row" style="margin-top: 5px">
            <div class="col-xs-12">
                <button onclick="roomTypeModalOpen()" class="btn btn-primary btn-xs pull-right" role="button">Add
                    Room
                    type
                </button>
            </div>
        </div>
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <table id="room_type_table" class="table table-striped table-bordered table-hover">
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

<div class="modal fade" id="roomTypeModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Category</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" role="form" id="form_room_type">
                    <input type="hidden" id="room_type_idhn" name="room_type_id">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Room Type</label>

                        <div class="col-sm-9">
                            <input type="text" id="room_name" name="room_name" placeholder="Room Type"
                                   class="col-xs-10 col-sm-5"/>
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

                        <button class="btn btn-info btn-xs" onclick="submit_room_type()" type="button">
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
        room_type_table();
    });

    function roomTypeModalOpen() {
        $('#room_type_idhn').val('');
        $('#room_name').val('');
        $('#roomTypeModal').modal('show');
    }

    function submit_room_type() {

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Masters/submit_room_type'); ?>",
            data: $("#form_room_type").serialize(),
            cache: false,
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                myAlert(data[0], data[1]);
                if (data[0] == 's') {
                    $('#roomTypeModal').modal('hide');
                    room_type_table();

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    }

    function delete_roomtype(id) {


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
                data: {'room_type_id': id},
                url: "<?php echo site_url('Masters/delete_roomtype'); ?>",
                beforeSend: function () {
                    startLoad();
                },
                success: function (data) {
                    stopLoad();
                    if (data[0] == 's') {
                        room_type_table();
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

    function room_type_table() {
        $('#room_type_table').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "StateSave": true,
            "sAjaxSource": "<?php echo site_url('Masters/fetch_room_type'); ?>",
            "aaSorting": [[1, 'desc']],
            "fnInitComplete": function () {

            },
            "fnDrawCallback": function (oSettings) {
                //tableBgColorJs();
            },
            "aoColumns": [
                {"mData": "room_name"},
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

    function edit_room_type(room_type_id){
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: {'room_type_id': room_type_id},
            url: "<?php echo site_url('Masters/edit_room_type'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                $('#room_type_idhn').val(room_type_id);
                $('#room_name').val(data['room_name']);
                if (data['status'] == 1) {
                    $('#status').attr('checked', true);
                } else {
                    $('#status').attr('checked', false);
                }
                $('#roomTypeModal').modal('show');
            }, error: function () {
                swal("Cancelled", "Your file is safe :)", "error");
            }
        });
    }


</script>