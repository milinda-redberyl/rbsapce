<div class="container wow fadeIn">
    <div class="row">


        <div class="tab-content" style="width: 90%;padding-left: 15px;padding-right: 15px;float: none;margin: 0 auto;">
            <div role="tabpanel" class="tab-pane fade in active" id="tb-agents-list">
                <div class="agent-tb-cover">
                    <div class="agent-tb-hd">
                        <div class="col-md-6 col-xs-12">
                            <div class="agent-heading">
                                <h2>Our Top Agents</h2>
                            </div>
                        </div>
                        <?php
                        if ($this->agent->is_referral()) {
                            $refer = $this->agent->referrer();
                            ?>
                            <div class="col-md-6 col-xs-12">
                                <div class="bk-link">
                                    <a href="<?php echo $refer ?>">
                                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                        Back </a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div id="div_agents_added"></div>
                </div>
            </div>
            <div id="div_companies_added"></div>
            <div role="tabpanel" class="tab-pane fade" id="tb-companies-list">
                <div class="agent-tb-cover">
                    <div class="agent-tb-hd">
                        <div class="col-md-6 col-xs-12">
                            <div class="agent-heading">
                                <h2>Our Top Companies</h2>
                            </div>
                        </div>
                        <?php
                        if ($this->agent->is_referral()) {
                            $refer = $this->agent->referrer();
                            ?>
                            <div class="col-md-6 col-xs-12">
                                <div class="bk-link">
                                    <a href="<?php echo $refer ?>">
                                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                        Back <!--to Search-->
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                    <div class="agent-tab-cont">
                        <?php
                        /*Didn't give the logic in the SRS, therefore loaded old top 6 agent list */
                        $topCompaniesList = get_topCompanies();

                        if (!empty($topCompaniesList)) {
                            //var_dump($topAgentList);
                            foreach ($topCompaniesList as $company) {
                                ?>
                                <div class="col-md-4 col-sm-6 col-xs-12 set-outer">
                                    <div class="list-agent-cover">
                                        <div class="list-agent-img">
                                            <img src="<?php
                                            if (!empty($company['companyLogo'])) {
                                                echo base_url('uploads/company_image/' . $company['companyLogo']);
                                            } else {
                                                echo base_url('uploads/company_image/default-company_image.jpg');
                                            }
                                            ?>" alt="Logo">
                                        </div>
                                        <div class="list-agent-dtls" style="border-bottom: 1px solid #ededed;">
                                            <div style="height: 50px;">
                                                <h3 class="agent-nm"><?php echo $company['Ename1'] ?></h3>
                                            </div>

                                            <h3 class="company-c text-center">
                                                <?php $rent = get_agent_count_company($company['company_id']);

                                                $agentCount = $rent[0]['cid'];
                                                echo isset($agentCount) ? $agentCount : 'No';

                                                ?>
                                                AGENTS
                                            </h3>


                                            <h3 class="company-head-ofc text-center">HEAD OFFICE</h3>
                                            <h3 class="head-ofc text-center"><?php echo isset($company['company_address']) ? $company['company_address'] : '- -'; ?></h3>
                                            <!--<h4 class="agent-des">Selling agent</h4>-->

                                        </div>
                                        <div class="tile_counters">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-4 col-xs-4"
                                                     style="border-right: 1px solid #ededed;">
                                                    <div class="text-center counter tile_counter">
                                                        <div class="counter_count">
                                                            <?php $rent = get_rent_count_company($company['EIdNo']);

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
                                                            <?php $rent = get_sale_count_company($company['EIdNo']);

                                                            $id = $rent[0]['cid'];
                                                            echo $id;

                                                            ?>
                                                        </div>
                                                        <div class="counter_label">for sale</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-4"
                                                     style="border-left: 1px solid #ededed;">
                                                    <div class="text-center counter tile_counter">
                                                        <div class="counter_count">
                                                            <?php $rent = get_commercial_count_company($company['EIdNo']);

                                                            $id = $rent[0]['cid'];
                                                            echo $id;

                                                            ?>
                                                        </div>
                                                        <div class="counter_label" style="margin-left: -10px;">
                                                            Commercial
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-agent-view">
                                            <a href="<?php echo site_url('companyOverview/' . $company['EIdNo'] . '/1') ?>">View
                                                Details <i class="fa fa-long-arrow-right"
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
                    <div class="agent-more">
                        <a href="#">View all companies</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<script>
    $(document).ready(function () {
        $('#ci_search').autocomplete({
            serviceUrl: '<?php echo site_url();?>/home_controller/fetch_property_agents/',
            onSelect: function (suggestion) {
                setTimeout(function () {
                    $('#agentSearch_EIdNo').val(suggestion.data);
                }, 200);
            },
        });
    })

</script>
<script>
    $(document).ready(function () {
        $('#ci_search_com').autocomplete({
            serviceUrl: '<?php echo site_url();?>/home_controller/fetch_property_companys/',
            onSelect: function (suggestion) {
                setTimeout(function () {
                    $('#companySearch_IdNo').val(suggestion.data);
                }, 200);
            },
        });
    })

</script>
<script>

    $(document).ready(function () {
        load_property_agents();
        //load_property_companys();
    });

    /*  $('#ci_search').bind('input', function(){
          var search = $('#ci_search').val();
          if(search == ''){
              $('#agentSearch_EIdNo').val('0');
          }
      });
  */

    function load_property_agents() {
        $('#div_companies_added').hide();
        $('#div_agents_added').show();

        var EIdNo = $('#agentSearch_EIdNo').val();
        var countryID = $('#countryID').val();
        var languageID = $('#languageID').val();
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'html',
            data: {EIdNo: EIdNo, countryID: countryID, languageID: languageID},
            url: "<?php echo site_url('home_controller/load_property_agents_details'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                $('#div_agents_added').html(data);
                stopLoad();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                stopLoad();
                myAlert('e', '<br>Message: ' + errorThrown);
            }
        });
    }

    function load_property_companys() {
        $('#div_companies_added').show();
        $('#div_agents_added').hide();

        var CNo = $('#companySearch_IdNo').val();
        console.log(CNo);

        $.ajax({
            async: true,
            type: 'post',
            dataType: 'html',
            data: {CNo: CNo},
            url: "<?php echo site_url('home_controller/load_property_companys_details'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                $('#div_companies_added').html(data);
                stopLoad();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                stopLoad();
                myAlert('e', '<br>Message: ' + errorThrown);
            }
        });
    }


</script>