<div class="modal fade" id="addNewProjectModal" tabindex="-1" role="dialog" aria-labelledby="addNewProjectModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit New Projects Unit Configurations </h5>
            </div>
            <form method="post" enctype="multipart/form-data" name="editNewProjects"
                  action="<?php echo site_url('newprojects/submit_unit'); ?>" id="editNewProjects">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Count of Bedrooms:</label>
                        <select class="form-control" name="bed_count" id="bed_count" required>
                            <?php
                            for ($i = 1; $i <= 100; $i++) {
                                $Beds = "Bedrooms";
                                if ($i == 1) {
                                    $Beds = "Bedroom";
                                }
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i . " " . $Beds; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Property Type:</label>
                        <select class="form-control" name="property_type" id="property_type" required>
                            <?php
                            foreach ($property_types as $property_type) {
                                ?>
                                <option value="<?php echo $property_type['property_type_id']; ?>"><?php echo $property_type['property_type_name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Floor:</label>
                        <select class="form-control" name="floor" id="floor" required>
                            <option value="First floor">First floor</option>
                            <option value="Second floor">Second floor</option>
                            <option value="Third floor">Third floor</option>
                            <option value="Fourth floor">Fourth floor</option>
                            <option value="Fifth floor">Fifth floor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Size:</label>
                        <input type="text" class="form-control" placeholder="3,052 sqft" name="size" id="size" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Image Type:</label>
                        <select class="form-control" name="image_type" id="image_type" required>
                            <option value="2D">2D</option>
                            <option value="3D">3D</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Status:</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="0">Deactivate</option>
                            <option value="1">Activate</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Image:</label>
                        <input type="file" class="form-control" name="image_url" id="image_url">
                    </div>
                    <hr>
                </div>
                <input type="hidden" value="" name="edit_id" id="edit_id">
                <input type="hidden" value="" name="add_id" id="add_id">
                <input type="hidden" value="" name="property_id" id="property_id">
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
        <h3 class="header smaller lighter blue"><i class="menu-icon fa fa-tag"></i> Manage New Project Units </h3>
        <div class="row" style="margin-top: 5px">
            <div class="col-xs-12">
                <button onclick="edit_new_project(<?php echo $property_id; ?>)"
                        class="btn btn-primary btn-xs pull-right" role="button">Add Unit
                </button>
            </div>
            <div class="col-xs-12">
                <a href="<?php echo site_url('new_project_section'); ?>" class="btn btn-primary btn-xs">Back</a>
            </div>
        </div>
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <table id="property_type_table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th style="min-width: 25%">Project ID</th>
                <th style="min-width: 40%">Bed Count</th>
                <th style="min-width: 40%">Property Type</th>
                <th style="min-width: 10%">Floor</th>
                <th style="min-width: 15%">Size</th>
                <th style="min-width: 15%">Image 2D/3D</th>
                <th style="min-width: 15%">Image</th>
                <th style="min-width: 15%">Status</th>
                <th style="min-width: 15%">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($new_project_units as $new_project_unit) {
                $unit_id = $new_project_unit['id'];
                $property_id = $new_project_unit['property_id'];
                $property_name = $new_project_unit['property_name'];
                $bed_count = $new_project_unit['bed_count'];
                $property_type = $new_project_unit['property_type'];
                $floor = $new_project_unit['floor'];
                $size = $new_project_unit['size'];
                $image_type = $new_project_unit['image_type'];
                $image_url = $new_project_unit['image_url'];
                $status = $new_project_unit['status'];

                ?>
                <tr>
                    <td><?php echo $property_name; ?></td>
                    <td><?php echo $bed_count; ?></td>
                    <td><?php echo $property_type; ?></td>
                    <td><?php echo $floor; ?></td>
                    <td><?php echo $size; ?> sqft</td>
                    <td><?php echo $image_type; ?></td>
                    <td><a href="<?php echo base_url().$image_url;?>" target="_blank">View</a></td>
                    <td>
                        <?php
                        if ($new_project_unit['status'] == 1) {
                            echo '<span class="label label-success">Active</span>';
                        } else if ($new_project_unit['status'] == 0) {
                            echo '<span class="label label-default">Inactive</span>';
                        }
                        ?>
                    </td>

                    <td>
                        <a href="javascript:;"
                           onclick="edit_new_project(<?php echo $property_id; ?>, <?php echo $unit_id;?>)">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a> |
                        <a href="javascript:;" class="red"
                           onclick="delete_new_project(<?php echo $unit_id;?>)">
                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                        </a>
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
    function edit_new_project(id, unit_id) {
        clear_form();

        $("#property_id").val(id);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('newprojects/get_new_project_by_id'); ?>",
            data: {'id': unit_id},
            cache: false,
            success: function (data) {
                $.each(data, function (index, value) {

                    $('#addNewProjectModal').modal('show');

                    $("#add_id").val("");
                    $("#edit_id").val(unit_id);

                    $("#bed_count").val(value.bed_count);
                    $("#property_type").val(value.property_type);
                    $("#floor").val(value.floor);
                    $("#size").val(value.size);
                    $("#image_type").val(value.image_type);
                    $("#status").val(value.status);

                    //$("#edit_id").val(value.NewProjects_id);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#addNewProjectModal').modal('show');

                $("#edit_id").val("");
                $("#add_id").val(id);
            }
        });
        //location.reload();
    }

    function delete_new_project(unit_id) {
        $('#confirm_delete').modal('show');
        $('#del_id').val(unit_id);
    }

    $('.btn_delete').click(function() {
        var id = $('#del_id').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('newprojects/delete_unit'); ?>",
            data: {'id': id},
            cache: false,
            success: function (data) {
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
        location.reload();
    });
    
    function clear_form() {
        $("#bed_count").val("");
        $("#property_type").val("");
        $("#floor").val("");
        $("#size").val("");
        $("#image_type").val("");
        $("#status").val("");
    }
    
</script>
