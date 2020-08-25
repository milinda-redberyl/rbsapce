<div class="agent-tab-cont">
    <?php
    //$topAgentList = get_topAgentList();
    if (!empty($header)) {
        //var_dump($topAgentList);
        foreach ($header as $agent) {
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12 set-outer">
                <div class="list-agent-cover">
                    <div class="list-agent-img">
                        <img src="<?php
                        if (!empty($agent['EmpImage'])) {
                            echo base_url('uploads/agents/' . $agent['EmpImage']);
                        } else {
                            echo base_url('uploads/agent_default.jpg');
                        }
                        ?>" alt="Logo">
                    </div>
                    <div class="list-agent-dtls" style="border-bottom: 1px solid #ededed;">
                        <h3 class="agent-nm"><?php echo $agent['Ename1'] ?></h3>
                      
                        <p class="agent-desg">
                            <?php
                            if (!empty($agent['empDesignation'])) {
                                echo $agent['empDesignation'];
                            } else {
                                echo "&nbsp;";
                            } ?>
                        </p>

                        <!--<h4 class="agent-des">Selling agent</h4>-->

                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-5 agent-info_label">
                                <h3>NATIONALITY:</h3>
                                <h3>LANGUAGES:</h3>                               
                                <h3>TRANSACTIONS:</h3>
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-7 agent-info_input">
                                <h3>
                                    <?php
                                    if (!empty($agent['EpNationality'])) {
                                        echo $agent['EpNationality'];
                                    } else {
                                        echo "--";
                                    } ?>
                                </h3>
                                <h3> <?php
                                    if (!empty($agent['EpLanguages'])) {
                                        echo $agent['EpLanguages'];
                                    } else {
                                        echo "--";
                                    } ?>

                                </h3>
                               
                                <h3>
                                    <?php
                                    if (!empty($get_specific_agent_active_listing_all)) {
                                               echo "--";
                                    } else {
                                        echo "--";
                                    } ?>
                                </h3>
                            </div>
                        </div>

                    </div>

                    <div class="tile_counters">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6" style="border-right: 1px solid #ededed;">
                                <div class="text-center counter tile_counter">
                                    <div class="counter_count"><?php $rent = get_rent_count($agent['EIdNo']);

                                        $id = $rent[0]['cid'];
                                        echo $id;

                                        ?>
                                    </div>
                                    <div class="counter_label">for rent</div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="text-center counter tile_counter">
                                    <div class="counter_count"><?php $row = get_sale_count($agent['EIdNo']);

                                        $id = $row[0]['cid'];
                                        echo $id;

                                        ?></div>
                                    <div class="counter_label">for sale</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="list-agent-view">
                        <a href="<?php echo site_url('agentOverview/' . $agent['EIdNo'] . '/1') ?>">View Details<i
                                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-danger">
            <h4>We currently have no agents <!--matching your search--></h4>
            <h5>You could try the following:</h5>
            <ul>
                <li>Adjust the filters in your search</li>
            </ul>
        </div>

        <?php
    }
    ?>
</div>
<div class="agent-more">
    <a href="#">View all Agent</a>
</div>