<?php
$tmpCat = isset($ct) ? $ct : '';
$randomResult = get_suggestion($tmpCat);

//print_r($randomResult);

if (!empty($randomResult)) {
    foreach ($randomResult as $item) {
        //print_r($item);

        $companyLogo = base_url() . "uploads/company_image/default-company_image.jpg";

        if ($item['agent_id']) {
            $company_details_q = "SELECT
                            srp_employeesdetails.*,
                            company_master.* 
                        FROM
                            srp_employeesdetails
                            INNER JOIN company_master ON srp_employeesdetails.company_id = company_master.company_id 
                        WHERE
                            srp_employeesdetails.isAgent = 1 
                            AND srp_employeesdetails.EIdNo = " . $item['agent_id'] . "";

            $company_details = $this->db->query($company_details_q)->result_array();
            if (!empty($company_details)) {
                if ($company_details[0]['companyLogo'] != "") {
                    $companyLogo = base_url() . 'uploads/company_image/' . $company_details[0]['companyLogo'];
                }
            }
        }

        ?>
        <div class="col-md-6 col-xs-12">
            <div class="prpt-tile-cover">
                <div class="prpt-tile-img">
                    <a href="<?php echo site_url('overview/' . $item['property_id']) ?>">
                        <img src="<?php echo base_url('uploads/' . $item['imageLink']) ?>"
                             alt="Image">
                        <div class="tag-bldr" style="max-width: 20%;">
                            <!--<img src="<?php /*echo base_url('assets/system/') */ ?>images/builder-ppty.jpg"
                                 alt="Builder">-->
                            <!-- <img style="" src="<?php echo base_url('uploads/') . $item['agentImageLink'] ?>"
                                 alt="Builder">-->

                        </div>
                    </a>
                    <div class="prpt-tile-rate">
                        <ul>
                            <!--
                            <li>
                                <span class="rate"><?php echo number_format($item['property_price']) ?>
                                    OMR </span></li>
                            <li>
                                <span class="rent">
                                    <?php echo (strtolower($item['category_nameas']) == 'rent') ? 'For ' : ''; ?><?php echo $item['category_nameas'] ?>
                                </span>
                            </li>-->
                        </ul>
                    </div>
                </div>
                <div class="prpt-tile-dtls">
                    <div class="col-lg-12 col-md-12 no-padding">
                        <h3 class="title"><?php echo $item['property_name'] ?></h3>
                        <h5 class="location_title"><i class="fa fa-map-marker"
                                                      aria-hidden="true"></i>&nbsp;<?php echo $item['property_address'] ?>
                        </h5>
                    </div>

                    <div class="col-lg-12 col-md-12 no-padding">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-7 col-xs-12">
                                <div class="ppt-info">
                                    <h4 class="rent txt-black"><?php echo number_format($item['property_price']) ?>
                                        <span>LKR</span></h4>
                                    <ul>
                                        <li><?php echo $item['property_type_name'] ?></li>
                                        <li><i class="fa fa-bed"
                                               aria-hidden="true"></i> <?php echo $item['bed_type_name'] ?></li>
                                        <li><i class="fa fa-shower" aria-hidden="true"></i> 2</li>
                                        <li> <?php echo isset($item['area']) ? $item['area'] : '-'; ?>
                                            Sq.ft
                                        </li>
                                    </ul>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-6">
                                <div class="logo-builder">
                                    <img src="<?php echo $companyLogo; ?>" width="100"
                                         alt="Builder">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 no-padding">

                        <div class="btn-conts">
                            <a class="btn btn-contact"
                               onclick="showTelNo_suggestion(<?php echo $item['property_id']; ?>,'<?php echo $item['telephone_number']; ?>')">
                                <i class="fa fa-phone" aria-hidden="true"></i> <span
                                        id="suggestion_telNo_<?php echo $item['property_id']; ?>">Call</span>
                            </a>
                            <button class="btn btn-contact" type="button"
                                    onclick="send_property_email(<?php echo $item['property_id']; ?>)"><i
                                        class="fa fa-envelope" aria-hidden="true"></i>
                                Email
                            </button>
                            <?php
                            $save_properties = $this->session->userdata('save_');
                            if (isset($save_properties)) {
                                if (array_key_exists($item['property_id'], $save_properties)) {
                                    ?>
                                    <a class="btn btn-contact save_<?php echo $item['property_id']; ?>"
                                       id="element<?php echo $item['property_id']; ?>"
                                       onclick="save_property_by_click(<?php echo $item['property_id']; ?>)"><i
                                                class="fa fa-check" aria-hidden="true"></i> Saved</a>
                                    <?php
                                } else {
                                    ?>
                                    <a class="btn btn-contact save_<?php echo $item['property_id']; ?>"
                                       id="element<?php echo $item['property_id']; ?>"
                                       onclick="save_property_by_click(<?php echo $item['property_id']; ?>)"><i
                                                class="fa fa-heart" aria-hidden="true"></i> Save</a>
                                    <?php
                                }
                            } else {
                                ?>
                                <a class="btn btn-contact save_<?php echo $item['property_id']; ?>"
                                   id="element<?php echo $item['property_id']; ?>"
                                   onclick="save_property_by_click(<?php echo $item['property_id']; ?>)"><i
                                            class="fa fa-heart" aria-hidden="true"></i> Save</a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <?php
    }
}


?>
<script>
    function showTelNo_suggestion(id, tel) {
        $("#suggestion_telNo_" + id).html(tel);
    }
</script>
