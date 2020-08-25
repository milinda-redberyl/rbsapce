<?php
echo load_lib_dataTable();
?>

<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue"><i class="menu-icon fa fa-tag"></i> Category </h3>
        <div class="row" style="margin-top: 5px">
            <div class="col-xs-12">
                <button onclick="categoryModalOpen()" class="btn btn-primary btn-xs pull-right" role="button">Add
                    Category
                    type
                </button>
            </div>
        </div>
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <table id="category_type_table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th style="min-width: 30%">Type</th>
                <th style="min-width: 10%">Status</th>
                <th style="min-width: 10%;">Action</th>

            </tr>
            </thead>
        </table>
    </div>
</div>


<div class="modal fade" id="categoryModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Category</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" role="form" id="form_category">
                    <input type="hidden" id="category_idhn" name="category_id">
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category
                            Type </label>

                        <div class="col-sm-9">
                            <input type="text" id="category_name" name="category_name" placeholder="Category Name"
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

                        <button class="btn btn-info btn-xs" onclick="submit_category()" type="button">
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
    var Otable;
    $(document).ready(function () {
        category_type_table();
    });

    function categoryModalOpen() {
        $('#category_idhn').val('');
        $('#category_name').val('');
        $('#categoryModal').modal('show');
    }

    function submit_category() {

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Masters/submit_category'); ?>",
            data: $("#form_category").serialize(),
            cache: false,
            beforeSend: function () {
                startLoad();

            },
            success: function (data) {
                stopLoad();
                myAlert(data[0], data[1]);
                if (data[0] == 's') {
                    $('#categoryModal').modal('hide');
                    category_type_table();

                }

            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    }

    function delete_category(id) {


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
                    data: {'category_id': id},
                    url: "<?php echo site_url('Masters/delete_category'); ?>",
                    beforeSend: function () {
                        startLoad();
                    },
                    success: function (data) {
                        stopLoad();
                        if (data[0] == 's') {
                            category_type_table();
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

    function edit_category(category_id) {
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: {'category_id': category_id},
            url: "<?php echo site_url('Masters/edit_category'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                $('#category_idhn').val(category_id);
                $('#category_name').val(data['category_name']);
                if (data['status'] == 1) {
                    $('#status').attr('checked', true);
                } else {
                    $('#status').attr('checked', false);
                }
                $('#categoryModal').modal('show');
            }, error: function () {
                swal("Cancelled", "Your file is safe :)", "error");
            }
        });
    }


    function category_type_table() {
        $('#category_type_table').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "StateSave": true,
            "sAjaxSource": "<?php echo site_url('Masters/fetch_category_type'); ?>",
            "aaSorting": [[1, 'desc']],
            "fnInitComplete": function () {

            },
            "fnDrawCallback": function (oSettings) {
                //tableBgColorJs();
            },
            "aoColumns": [
                {"mData": "category_name"},
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


</script>