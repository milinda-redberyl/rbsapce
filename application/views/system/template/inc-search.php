<style>

    /** Jquery Auto complete  */

    .autocomplete-suggestions {

        border: 1px solid #999 !important;

        background: #FFF !important;

        overflow: auto !important;

    }



    .autocomplete-suggestion {

        padding: 2px 5px !important;

        white-space: nowrap !important;

        overflow: hidden !important;

    }



    .autocomplete-selected {

        background: #F0F0F0 !important;

    }



    .autocomplete-suggestions strong {

        font-weight: normal !important;

        color: #3399FF !important;

    }



    .autocomplete-group {

        padding: 2px 5px !important;

    }



    .autocomplete-group strong {

        display: block !important;

        border-bottom: 1px solid #000 !important;

    }

</style>

<form action="<?php echo site_url('/search') ?>" method="get">

    <div class="search-form-wrap">

        <div class="container">

            <div class="hm-search-form">

                <div class="row search-row">

                    <div class="col-md-3 col-sm-6 col-xs-12 search-padd yy">

                        <div class="form-group">

                            <?php

                            $ct_get = $this->input->get('ct');

                            echo form_dropdown('ct', drop_category_type(), $ct_get, 'class="selectpicker show-tick form-control"');

                            ?>

                        </div>

                    </div>

                    <div class="col-md-9 col-sm-6 col-xs-12 search-padd">

                        <div class="form-group">

                            <div class="input-group">

                                <input class="form-control cty" style="color:#ffffff;"

                                       placeholder="<?php echo $this->lang->line('more_locations') ?>">

                                <input type="hidden" name="cty" class="cty_id" value="">

                                <div class="input-group-btn">

                                    <button class="btn btn-search" type="submit"><span><?php echo $this->lang->line('search_btn') ?></span> <img

                                            src="<?php echo base_url('assets/system/') ?>images/icon-search.png"

                                            alt="Search"></button>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 search-padd">

                        <div class="form-group">

                            <?php

                            $pt_get = $this->input->get('pt');

                            echo form_dropdown('pt', drop_property_type(), $pt_get, 'class="selectpicker show-tick form-control"')

                            ?>

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 search-padd">

                        <div class="form-group">

                            <?php

                            $periodType['y'] = 'Yearly';

                            $periodType['m'] = 'Monthly';

                            $periodType['w'] = 'Weekly';

                            $periodType['d'] = 'Daily';



                            $pd_get = $this->input->get('pd');

                            echo form_dropdown('pd', $periodType, $pd_get, 'class="selectpicker show-tick form-control"')

                            ?>

                            <!--<select name="pd" class="selectpicker show-tick form-control">

                                <option value="y" selected>Yearly</option>

                                <option value="m">Monthly</option>

                                <option value="w">Weekly</option>

                                <option value="d">Daily</option>

                            </select>-->

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12  hidden-sm hidden-xs search-padd">

                        <div class="row search-sub-row">

                            <div class="col-md-6 col-xs-6 search-sub-padd">

                                <div class="form-group">

                                    <?php

                                    $pmi_get = $this->input->get('pmi');

                                    echo form_dropdown('pmi', drop_price_list('MIN'), $pmi_get, 'class="selectpicker show-tick form-control"');

                                    ?>

                                </div>

                            </div>

                            <div class="col-md-6 col-xs-6 search-sub-padd">

                                <div class="form-group">

                                    <?php

                                    $pmx_get = $this->input->get('pmx');

                                    echo form_dropdown('pmx', drop_price_list('MAX'), $pmx_get, 'class="selectpicker show-tick form-control"');

                                    ?>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 hidden-sm hidden-xs  search-padd">

                        <div class="row search-sub-row">

                            <div class="col-md-6 col-xs-6 search-sub-padd">

                                <div class="form-group">



                                    <?php

                                    $btmn_get = $this->input->get('btmn');

                                    echo form_dropdown('btmn', drop_bed_type('MIN'), $btmn_get, 'class="selectpicker show-tick form-control"');

                                    ?>



                                </div>

                            </div>

                            <div class="col-md-6 col-xs-6 search-sub-padd">

                                <div class="form-group">

                                    <?php

                                    $btmx_get = $this->input->get('btmx');

                                    echo form_dropdown('btmx', drop_bed_type('MAX'), $btmx_get, 'class="selectpicker show-tick form-control"');

                                    ?>



                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 hidden-sm hidden-xs  search-padd">

                        <div class="row search-sub-row">

                            <div class="col-md-6 col-xs-6 search-sub-padd">

                                <div class="form-group">

                                    <?php

                                    $ami_get = $this->input->get('ami');

                                    echo form_dropdown('ami', drop_area_master('MIN'), $ami_get, 'class="selectpicker show-tick form-control"') ?>



                                </div>

                            </div>

                            <div class="col-md-6 col-xs-6 search-sub-padd">

                                <div class="form-group">

                                    <?php

                                    $amx_get = $this->input->get('amx');

                                    echo form_dropdown('amx', drop_area_master('MAX'), $amx_get, 'class="selectpicker show-tick form-control"') ?>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12  hidden-sm hidden-xs search-padd">

                        <div class="form-group">

                            <?php

                            $ft_get = $this->input->get('ft');

                            echo form_dropdown('ft', drop_furniture_type(), $ft_get, 'class="selectpicker show-tick form-control"') ?>

                        </div>

                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12  hidden-sm hidden-xs search-padd">

                        <div class="form-group">

                            <input name="k" class="form-control" placeholder="<?php echo $this->lang->line('keywords') ?>">

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</form>

