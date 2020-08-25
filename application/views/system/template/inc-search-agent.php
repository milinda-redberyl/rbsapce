<style>
    .autocomplete-suggestions {
        border: 1px solid #999;
        background: #FFF;
        overflow: auto;
        cursor: pointer;
    }

    .autocomplete-suggestion {
        padding: 2px 5px;
        white-space: nowrap;
        cursor: pointer;
    }

    .autocomplete-selected {
        background: #F0F0F0;
    }

    .autocomplete-suggestions strong {
        font-weight: normal;
        color: #3399FF;
        cursor: pointer;
    }

    .autocomplete-group {
        padding: 2px 5px;
        cursor: pointer;
    }

    .autocomplete-group strong {
        display: block;
        border-bottom: 1px solid #000;
        cursor: pointer;
    }

</style>
<div class="ins-search-wrap">
    <div class="container">
        <div class="hm-search-form">
            <div class="agent-tb-nav">
                <h1>Great agents find great properties.</h1>
                <ul class="tb-nav" role="tablist">
                    <li role="presentation" class="active"><a href="#tb-agents"
                                                              data-target="#tb-agents, #tb-agents-list"
                                                              aria-controls="tb-agents" role="tab" data-toggle="tab">agents</a>
                    </li>
                    <li role="presentation"><a href="#tb-companies" data-target="#tb-companies, #tb-companies-list"
                                               aria-controls="tb-companies" role="tab" data-toggle="tab">companies</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <form action="">
                    <div role="tabpanel" class="tab-pane fade in active" id="tb-agents">

                        <div class="row search-row">
                            <div class="col-md-12 col-sm-12 col-xs-12 search-padd">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Enter location agent name"
                                               id="ci_search" style="color: #ffffff;">
                                        <input id="agentSearch_EIdNo" type="hidden" name="EIdNo">

                                        <div class="input-group-btn">
                                            <button class="btn btn-search" type="button" onclick="load_property_agents()"><span>FIND</span> <img
                                                    src="<?php echo base_url('assets/system/') ?>images/icon-search.png"
                                                    alt="Search"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 search-padd">
                                <div class="form-group">
                                    <?php
                                    $languageDrop = drop_language_master();
                                    echo form_dropdown('languageID', $languageDrop, '', 'class="selectpicker show-tick form-control" id="languageID" onchange="load_property_agents()"')
                                    ?>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 search-padd">
                                <div class="form-group">
                                    <?php
                                    $countryDrop = drop_country();
                                    echo form_dropdown('countryID', $countryDrop, '', 'class="selectpicker show-tick form-control" id="countryID" onchange="load_property_agents()"')
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tb-companies">
                        <div class="row search-row">
                            <div class="col-md-12 col-sm-12 col-xs-12 search-padd tb-company-set">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="companies name" id="ci_search_com">
                                        <input id="companySearch_IdNo" type="hidden" name="EIdNo">

                                        <div class="input-group-btn">
                                            <button class="btn btn-search" type="button" onclick="load_property_companys()"><span>FIND</span> <img
                                                    src="<?php echo base_url('assets/system/') ?>images/icon-search.png"
                                                    alt="Search"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
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