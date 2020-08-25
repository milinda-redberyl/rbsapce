<?php
echo load_lib_dataTable();
?>
<style>
    .social-media {
        text-align: center !important;
        color: #ffffff !important;
        font-size: 18px !important;
    }
</style>
<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue"><i class="fa fa-facebook" aria-hidden="true"></i> Social Media
            Management </h3>
        <div class="row" style="margin-top: 5px">

        </div>
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <table id="social_media_table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th style="min-width: 30%">id</th>
                <th>Media Name</th>
                <th>Link <i class="fa fa-link" aria-hidden="true"></i></th>
                <th> Media Colour</th>
                <th>Icon <i class="fa fa-facebook" aria-hidden="true"></i></th>
                <th style="text-align: center">Status</th>
                <th style="text-align: center">&nbsp;</th>

            </tr>
            </thead>
            <boday>
                <?php
                //var_dump($extra);
                if (isset($extra) && !empty($extra)) {
                    foreach ($extra as $sm) { ?>
                        <tr>
                            <td><?php echo $sm['sortOrder'] ?></td>
                            <td><?php echo $sm['mediaName'] ?></td>
                            <td><?php echo $sm['mediaURL'] ?></td>
                            <td>
                                <i class="fa fa-circle " style="color: <?php echo $sm['mediaColor'] ?>;"></i>
                                <?php echo $sm['mediaColor'] ?>
                            </td>
                            <td class="social-media" style="background-color: <?php echo $sm['mediaColor'] ?>;">
                                <?php echo $sm['mediaIcon'] ?>
                            </td>
                            <td style="text-align: center">


                                <?php
                                if ($sm['isActive'] == 1) {
                                    echo '<span class="badge" style="background-color: green"> <i class="fa fa-play text-white"  ></i> Active</span>';
                                } else {
                                    echo '<span class="badge" style="background-color: grey"> <i class="fa fa-stop text-white"  ></i> Inactive</span>';
                                } ?></td>
                            <td>
                                <button class="btn btn-xs  btn-default" type="button"
                                        onclick="editSocialMedia(<?php echo $sm['id'] ?>)"
                                        title="Edit"><i class="fa fa-pencil-square-o"></i>
                                </button>
                            </td>
                        </tr>
                    <?php }
                } ?>
            </boday>
        </table>
    </div>

</div>

<div class="modal fade" id="socialMediaModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-facebook" aria-hidden="true"></i> Social Media </h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" role="form" id="form_socialMedia">
                    <input id="id" name="id" type="hidden" value="0">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> Media Name </label>

                        <div class="col-sm-9">
                            <input type="text" id="mediaName" name="mediaName"
                                   placeholder="media Name"
                                   class="col-xs-10 col-sm-10"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Link <i
                                class="fa fa-link" aria-hidden="true"></i> </label>

                        <div class="col-sm-9">
                            <input type="text" id="mediaURL" name="mediaURL"
                                   placeholder="http Link"
                                   class="col-xs-10 col-sm-10"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Media Icon <i
                                class="fa fa-facebook"></i> </label>

                        <div class="col-sm-9">
                            <select id="mediaIcon" name="mediaIcon" style="" class="col-xs-10 col-sm-10">
                                <?php
                                $socialIcon [0]['ico'] = '<i class="fa fa-facebook" aria-hidden="true"></i>';
                                $socialIcon [0]['name'] = 'Facebook';

                                $socialIcon [1]['ico'] = '<i class="fa fa-twitter" aria-hidden="true"></i>';
                                $socialIcon [1]['name'] = 'Twitter';

                                $socialIcon [2]['ico'] = '<i class="fa fa-instagram" aria-hidden="true"></i>';
                                $socialIcon [2]['name'] = 'Instagram';

                                $socialIcon [3]['ico'] = '<i class="fa fa-google-plus" aria-hidden="true"></i>';
                                $socialIcon [3]['name'] = 'Google Plus';

                                $socialIcon [4]['ico'] = '<i class="fa fa fa-wordpress" aria-hidden="true"></i>';
                                $socialIcon [4]['name'] = 'Wordpress';

                                $socialIcon [5]['ico'] = '<i class="fa fa-linkedin" aria-hidden="true"></i>';
                                $socialIcon [5]['name'] = 'LinkedIn';

                                $socialIcon [6]['ico'] = '<i class="fa fa-skype" aria-hidden="true"></i>';
                                $socialIcon [6]['name'] = 'Skype';

                                $socialIcon [7]['ico'] = '<i class="fa fa-pinterest" aria-hidden="true"></i>';
                                $socialIcon [7]['name'] = 'Pinterest';


                                foreach ($socialIcon as $ico) {
                                    echo '<option value="' . htmlentities($ico['ico']) . '">' . $ico['name'] . '</option>';
                                }
                                ?>


                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Media Color </label>

                        <div class="col-sm-9">
                            <input type="color" id="mediaColor" name="mediaColor"
                                   placeholder="HTML Colour"
                                   class="col-xs-10 col-sm-5" style="height: 32px;"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> Order  </label>

                        <div class="col-sm-9">
                            <input type="number" id="sortOrder" name="sortOrder"
                                   placeholder="Sort Order "
                                   class="col-xs-10 col-sm-2" style="height: 32px;"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right ">Active</label>

                        <div class="checkbox">
                            <label>
                                <input id="isActive" name="isActive" type="checkbox" value="1" class="ace"/>
                                <span class="lbl"> </span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right "></label>

                        <button class="btn btn-info btn-xs" onclick="submit_socialMedia()" type="button">
                            Save <i class="fa fa-floppy-o" aria-hidden="true"></i>
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
        //social_media_table();
        $("#social_media_table").dataTable();
    });

    function editSocialMedia(id) {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Masters/loadSocialMedia'); ?>",
            data: {id: id},
            cache: false,
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                $("#id").val(id);
                $("#mediaName").val(data['mediaName']);
                $("#mediaURL").val(data['mediaURL']);
                $("#mediaColor").val(data['mediaColor']);
                $("#mediaIcon").val(data['mediaIcon']);
                $("#sortOrder").val(data['sortOrder']);
                if (data['isActive'] == 1) {
                    $("#isActive").prop('checked', true);
                } else {
                    $("#isActive").prop('checked', false);
                }


            },
            error: function (jqXHR, textStatus, errorThrown) {
                stopLoad();
                myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown);

            }
        });
        $('#socialMediaModal').modal('show');
    }

    function submit_socialMedia() {

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Masters/submit_socialMedia'); ?>",
            data: $("#form_socialMedia").serialize(),
            cache: false,
            beforeSend: function () {
                startLoad();

            },
            success: function (data) {
                stopLoad();
                myAlert(data['status'], data['message']);
                $('#socialMediaModal').modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 200);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                stopLoad();
                myAlert(jqXHR + ' ' + errorThrown);
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
                            social_media_table();
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

    function edit_property(property_type_id) {
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
                if (data['status'] == 1) {
                    $('#status').attr('checked', true);
                } else {
                    $('#status').attr('checked', false);
                }
                $('#socialMediaModal').modal('show');
            }, error: function () {
                swal("Cancelled", "Your file is safe :)", "error");
            }
        });
    }


    function social_media_table() {
        $('#social_media_table').dataTable({
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