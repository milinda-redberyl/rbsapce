<?php
/**
 * Created by PhpStorm.
 * User: Madura
 * Date: 3/13/2018
 * Time: 4:32 AM
 */
?>

<div class="modal fade" id="addAdvertisementModal" tabindex="-1" role="dialog" aria-labelledby="addAdvertisementModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Advertisement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" name="addAdvertisement" action="advertisement/submit" id="addAdvertisement">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">URL:</label>
                        <input type="url" class="form-control" name="url" id="url" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Position:</label>
                        <select id="position" name="position" onchange="img_info_fun(this.value)" required>
                            <option value="-1">Select one</option>
                            <option value="sidebar">Sidebar</option>
                            <option value="footer">Footer</option>
                        </select>
                    </div>
                    <div class="alert alert-info" id="img_info" style="display: none;">
                        <strong>Info!</strong> Indicates a neutral informative change or action.
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Image:</label>
                        <input type="file" class="form-control" name="image_file" id="image_file" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Status:</label>
                        <select id="status" name="status" required>
                            <option value="0">Deactivate</option>
                            <option value="1">Active</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" value="" name="edit_id" id="edit_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue"><i class="menu-icon fa fa-tag"></i> Advertisement Manager </h3>
        <div class="row" style="margin-top: 5px">
            <div class="col-xs-12">
                <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#addAdvertisementModal">Add Advertisement</button>
            </div>
        </div>
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <table id="property_type_table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th style="min-width: 30%">Title</th>
                <th style="min-width: 10%">Advertisement URL</th>
                <th style="min-width: 10%">Position</th>
                <th style="min-width: 10%">Status</th>
                <th style="min-width: 10%">Image URL</th>
                <th style="min-width: 10%">Action</th>

            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($extra as $value){
                    ?>
                    <tr>
                        <td><?php echo $value['title']?></td>
                        <td><?php echo $value['url']?></td>
                        <td><?php echo $value['position']?></td>
                        <td>
                            <?php
                                if($value['status'] == 1){
                                    echo '<span class="label label-success">Active</span>';
                                } else if($value['status'] == 0) {
                                    echo '<span class="label label-default">Inactive</span>';
                                }
                            ?>
                        </td>
                        <td width="15%">
                            <?php if(empty($value['img_url'])){ ?>
                                <img class="img-responsive"  src="<?php echo base_url('uploads/blog/blog-dummy.jpg') ?>"/>
                            <?php } else { ?>
                                <img class="img-responsive"  src="<?php echo base_url($value['img_url']) ?>"/>
                            <?php  } ?>

                        </td>
                        <td>
                            <a href="javascript:;" onclick="edit_advertisement(<?php echo $value['id']?>)"><i class="ace-icon fa fa-pencil bigger-130"></i></a> |
                            <a href="javascript:;" onclick="delete_advertisement(<?php echo $value['id']?>)" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="confirm_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Delete Advertisement</h5>
            </div>
            <div class="modal-body">
                Are you sure delete this advertisement?
            </div>
            <input type="hidden" value="" id="del_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <a class="btn btn-danger btn_delete">Yes</a>
            </div>
        </div>
    </div>
</div>

<script>
    function img_info_fun(value) {
        if(value === 'footer'){
            var alert = "Check image <strong>(1070*165)</strong> dimensions before uploading image."
        } else if (value === 'sidebar'){
            var alert = "Check image <strong>(260*217)</strong> dimensions before uploading image."
        }
        myAlert('d', alert);
    }

    function delete_advertisement(id) {
        $('#confirm_delete').modal('show');
        $('#del_id').val(id);
    }

    $('.btn_delete').click(function() {
        var id = $('#del_id').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('advertisement/delete'); ?>",
            data: {id : id},
            cache: false,
            success: function (data) {

            }
        });
        location.reload();
    });

    function edit_advertisement(id) {

        $("#image_file").removeAttr("required");

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('advertisement/get_advertisement_by_id'); ?>",
            data: {id : id},
            cache: false,
            success: function (data) {
                $.each(data, function (index, value) {

                    $('#addAdvertisementModal').modal('show');

                    $("#edit_id").val(value.id);
                    $("#title").val(value.title);
                    $("#url").val(value.url);
                    $("#position").val(value.position);
                    $("#status").val(value.status);
                });
            }
        });
        //location.reload();
    }

</script>
