<?php
echo load_lib_dataTable();
?>
<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue"><i class="menu-icon fa fa-tag"></i> Property </h3>
        <div class="row" style="margin-top: 5px">
            <div class="col-xs-12">
                <button onclick="propertyModalOpen()" class="btn btn-primary btn-xs pull-right" role="button">Add property type</button>
            </div>
        </div>
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <table id="property_type_table" class="table table-striped table-bordered table-hover">
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

<div class="modal fade" id="propertyModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Property</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" role="form" id="form_property">
                    <input id="property_type_idhn" name="property_type_id" type="hidden" >
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Property
                            Type </label>

                        <div class="col-sm-9">
                            <input type="text" id="property_type_name" name="property_type_name"
                                   placeholder="Property Name"
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

                        <button class="btn btn-info btn-xs" onclick="submit_property()" type="button">
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
        property_type_table();
    });

    function propertyModalOpen() {
        $('#property_type_idhn').val('');
        $('#property_type_name').val('');
        $('#propertyModal').modal('show');
    }

    function submit_property() {

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Masters/submit_property'); ?>",
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


    function delete_property(id) {


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
                    data: {'property_type_id': id},
                    url: "<?php echo site_url('Masters/delete_property'); ?>",
                    beforeSend: function () {
                        startLoad();
                    },
                    success: function (data) {
                        stopLoad();
                        if (data[0] == 's') {
                            property_type_table();
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
                    'Your record file is safe :)',
                    'error'
                )
            }
        })
    }

    function edit_property(property_type_id){
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: {'property_type_id': property_type_id},
            url: "<?php echo site_url('Masters/edit_property'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                $('#property_type_idhn').val(property_type_id);
                $('#property_type_name').val(data['property_type_name']);
                if(data['status']==1){
                    $('#status').attr('checked',true);
                }else{
                    $('#status').attr('checked',false);
                }
                $('#propertyModal').modal('show');
            }, error: function () {
                swal("Cancelled", "Your file is safe :)", "error");
            }
        });
    }


    function property_type_table() {
        $('#property_type_table').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "StateSave": true,
            "sAjaxSource": "<?php echo site_url('Masters/fetch_property_type'); ?>",
            "aaSorting": [[1, 'desc']],
            "fnInitComplete": function () {

            },
            "fnDrawCallback": function (oSettings) {
                //tableBgColorJs();
            },
            "aoColumns": [
                {"mData": "property_type_name"},
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