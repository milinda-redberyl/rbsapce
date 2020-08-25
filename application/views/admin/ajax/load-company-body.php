<?php
/**
 * Created by PhpStorm.
 * User: Madura
 * Date: 3/14/2018
 * Time: 4:17 PM
 */

//print_r($company_details);

?>

<div class="agent-tab-cont">
    <?php
    if (!empty($company)) {
        //var_dump($topAgentList);
        foreach ($company as $com) {
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12 set-outer">
                <div class="list-agent-cover">
                    <div class="list-agent-img">
                        <img src="<?php
                        if (!empty($com['companyLogo'])) {
                            echo base_url('uploads/company_image/' . $com['companyLogo']);
                        } else {
                            echo base_url('uploads/company_image/default-company_image.jpg');
                        }
                        ?>" alt="Logo">
                    </div>
                    <div class="list-agent-dtls" style="border-bottom: 1px solid #ededed;">
                        <h3 class="agent-nm"><?php echo $com['company_name'] ?></h3>
                        <h3 class="company-c text-center"><?php echo count($agents); ?> AGENTS</h3>

                        <h3 class="company-head-ofc text-center">HEAD OFFICE</h3>
                        <h3 class="head-ofc text-center"><?php echo $com['company_address']; ?></h3>
                        <!--<h4 class="agent-des">Selling agent</h4>-->

                    </div>
                    <?php $company['EIdNo'] =13;
                    $sql_c = $this->db->query("SELECT EIdNo from srp_employeesdetails WHERE company_id = '" . $com['company_id'] . "' and isCompany = 1 and isActive = 1");
                    $resultset_c = $sql_c->result_array();
                    $CEN = $resultset_c[0]['EIdNo'];
                     ?>
                    <div class="tile_counters">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-4" style="border-right: 1px solid #ededed;">
                                                <div class="text-center counter tile_counter">
                                                    <div class="counter_count">
                                                            <?php $rent = get_rent_count_company($CEN);

                                                            $id = $rent[0]['cid'];
                                                            echo $id;

                                                            ?>                                            
                                                    </div>
                                                    <div class="counter_label">for rent</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                <div class="text-center counter tile_counter">
                                                    <div class="counter_count">
                                                        <?php $rent = get_sale_count_company($CEN);

                                                            $id = $rent[0]['cid'];
                                                            echo $id;

                                                            ?>      
                                                    </div>
                                                    <div class="counter_label">for sale</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-4" style="border-left: 1px solid #ededed;">
                                                <div class="text-center counter tile_counter">
                                                    <div class="counter_count">
                                                          <?php $rent = get_commercial_count_company($CEN);

                                                            $id = $rent[0]['cid'];
                                                            echo $id;

                                                            ?>      
                                                    </div>
                                                    <div class="counter_label" style="margin-left: -10px;">Commercial</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-agent-view">
                                        <a href="<?php echo site_url('companyOverview/' . $CEN.'/1') ?>">View Details <i class="fa fa-long-arrow-right"
                                                                    aria-hidden="true"></i></a>
                                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-danger">
            <h4>We currently have no Companies</h4>
            <!--<h5>You could try the following:</h5>
            <ul>
                <li>Adjust the filters in your search</li>
            </ul>-->
        </div>

        <?php
    }
    ?>
</div>
