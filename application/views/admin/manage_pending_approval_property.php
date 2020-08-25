<?php


$user_data = $this->session->all_userdata();
$empID = $user_data['empID'];

if ($user_data['isSystemAdmin']) {

    $pending_property_q = "SELECT
property.property_id,
property.city_id,
property.property_name,
property.property_price,
property.telephone_number,
property.mobile_number,
city.city_name
FROM
property
INNER JOIN city ON city.city_id = property.city_id
WHERE
property.isActive = 0
";
    $pending_property = $this->db->query($pending_property_q)->result_array();

}

?>

<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue"><i class="menu-icon fa fa-tag"></i> Manage pending approval properties </h3>
        <div class="row" style="margin-top: 5px">

        </div>
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <table id="property_type_table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th style="min-width: 25%">Property Name</th>
                <th style="min-width: 40%">City</th>
                <th style="min-width: 10%">Property Price</th>
                <th style="min-width: 10%">Mobile Number</th>
                <th style="min-width: 15%">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($extra as $value){
                    ?>
                    <tr>
                        <td><?php echo $value['property_name'] ?></td>
                        <td style="width: 15%;"><?php echo $value['city_name']?></td>
                        <td width="15%">
                               Rs <?php echo $value['property_price']; ?>
                        </td>
                        <td>
                            <?php
                               if(!empty($value['mobile_number'])){
                                    echo $value['mobile_number'];
                               } else{
                                   echo "Not available";
                               }
                            ?>
                        </td>

                        <td>
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
                        </td>
                    </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
