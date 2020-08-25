<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue"><i class="menu-icon fa fa-tag"></i> Manage New Projects </h3>

        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <table id="property_type_table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Property Type</th>
                <th>Category Type</th>
                <th>Property Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($new_projects as $new_project) {
                $property_id = $new_project['property_id'];
                $property_type_name = $new_project['property_type_name'];
                ?>
                <tr>
                    <td><?php echo $new_project['property_id'] ?></td>
                    <td><?php echo $new_project['property_type_name'] ?></td>
                    <td><?php echo $new_project['category_name'] ?></td>
                    <td><?php echo $new_project['property_name'] ?></td>
                    <td>
                        <?php
                        if ($new_project['status'] == 1) {
                            echo '<span class="label label-success">Active</span>';
                        } else if ($new_project['status'] == 0) {
                            echo '<span class="label label-default">Inactive</span>';
                        }
                        ?>
                    </td>

                    <td>
                        <a href="<?php echo site_url('new_project_section/' . $property_id) ?>">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
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
