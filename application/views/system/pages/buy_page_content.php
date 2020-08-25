<div class="container wow fadeIn">
    <div class="ppty-sort-cover">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <h3>Properties  for sale in Oman</h3>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="ppt-filter-list">
                    <ul>
                        <li>Sort By: </li>
                        <li>
                            <div class="form-group">
                                <select class="selectpicker show-tick form-control">
                                    <option>Features</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <a href="<?php echo site_url('project') ?>" class="btn btn-map"><i class="fa fa-map-marker" aria-hidden="true"></i> View Map
                            </a>
                        </li>
                        <li><span class="result"><?php echo isset($count) ? $count : 0; ?> Results<!--3956 Results--></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="ppt-search-count">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <ul>
                <li>Apartments (3507)</li>
                <li>Villas (6251)</li>
                <li>Buildings (34567)</li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <ul>
                <li>Land (3507)</li>
                <li>Basements (6251)</li>
                <li>Showroom (34567)</li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <ul>
                <li>Warehouse (3507)</li>
                <li>Labor camps (6251)</li>
            </ul>
        </div>
    </div>
    <div class="row">

        <?php
        if (isset($suggestion) && $suggestion) {
            $this->load->view('system/template/inc-suggestion');
        }
        ?>
        <div class="col-md-8 col-xs-12">
            <div class="prpt-hor-cover">
                <div class="media">
                    <div class="media-left">
                        <div class="prpt-hor-img">
                            <img src="<?php echo base_url('assets/system/') ?>images/img-ppt-list-01.jpg" alt="Image">
                            <span class="rent">Rent</span>
                        </div>
                    </div>
                    <div class="media-body">
                        <div class="prpt-hor-dtls">
                            <h3 class="title">Luxury Apartment (Residential)</h3>
                            <h4 class="location">Madinat Al Sultan Qaboos</h4>
                            <div class="row">
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <h4 class="rent">2,65,000 OMR / Month</h4>
                                    <ul>
                                        <li>2 BHK</li>
                                        <li>2 <i class="fa fa-bed" aria-hidden="true"></i></li>
                                        <li>1 <i class="fa fa-shower" aria-hidden="true"></i></li>
                                    </ul>
                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="builder-logo"> <img src="<?php echo base_url('assets/system/') ?>images/logo-builder-01.jpg" class="img-responsive" alt="Image"> </div>
                                </div>
                            </div>
                            <div class="btn-conts"> <a class="btn btn-contact"><i class="fa fa-phone" aria-hidden="true"></i> Call</a> <a class="btn btn-contact"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a> <a class="btn btn-contact"><i class="fa fa-heart" aria-hidden="true"></i> Save</a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="prpt-hor-cover">
                <div class="media">
                    <div class="media-left">
                        <div class="prpt-hor-img">
                            <img src="<?php echo base_url('assets/system/') ?>images/img-ppt-list-01.jpg" alt="Image">
                            <span class="rent">Rent</span>
                        </div>
                    </div>
                    <div class="media-body">
                        <div class="prpt-hor-dtls">
                            <h3 class="title">Luxury Apartment (Residential)</h3>
                            <h4 class="location">Madinat Al Sultan Qaboos</h4>
                            <div class="row">
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <h4 class="rent">2,65,000 OMR / Month</h4>
                                    <ul>
                                        <li>2 BHK</li>
                                        <li>2 <i class="fa fa-bed" aria-hidden="true"></i></li>
                                        <li>1 <i class="fa fa-shower" aria-hidden="true"></i></li>
                                    </ul>
                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="builder-logo"> <img src="<?php echo base_url('assets/system/') ?>images/logo-builder-01.jpg" class="img-responsive" alt="Image"> </div>
                                </div>
                            </div>
                            <div class="btn-conts"> <a class="btn btn-contact"><i class="fa fa-phone" aria-hidden="true"></i> Call</a> <a class="btn btn-contact"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a> <a class="btn btn-contact"><i class="fa fa-heart" aria-hidden="true"></i> Save</a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="prpt-hor-cover">
                <div class="media">
                    <div class="media-left">
                        <div class="prpt-hor-img">
                            <img src="<?php echo base_url('assets/system/') ?>images/img-ppt-list-01.jpg" alt="Image">
                            <span class="rent">Rent</span>
                        </div>
                    </div>
                    <div class="media-body">
                        <div class="prpt-hor-dtls">
                            <h3 class="title">Luxury Apartment (Residential)</h3>
                            <h4 class="location">Madinat Al Sultan Qaboos</h4>
                            <div class="row">
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <h4 class="rent">2,65,000 OMR / Month</h4>
                                    <ul>
                                        <li>2 BHK</li>
                                        <li>2 <i class="fa fa-bed" aria-hidden="true"></i></li>
                                        <li>1 <i class="fa fa-shower" aria-hidden="true"></i></li>
                                    </ul>
                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="builder-logo"> <img src="<?php echo base_url('assets/system/') ?>images/logo-builder-01.jpg" class="img-responsive" alt="Image"> </div>
                                </div>
                            </div>
                            <div class="btn-conts"> <a class="btn btn-contact"><i class="fa fa-phone" aria-hidden="true"></i> Call</a> <a class="btn btn-contact"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a> <a class="btn btn-contact"><i class="fa fa-heart" aria-hidden="true"></i> Save</a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="prpt-hor-cover">
                <div class="media">
                    <div class="media-left">
                        <div class="prpt-hor-img">
                            <img src="<?php echo base_url('assets/system/') ?>images/img-ppt-list-01.jpg" alt="Image">
                            <span class="rent">Sale</span>
                        </div>
                    </div>
                    <div class="media-body">
                        <div class="prpt-hor-dtls">
                            <h3 class="title">Luxury Apartment (Residential)</h3>
                            <h4 class="location">Madinat Al Sultan Qaboos</h4>
                            <div class="row">
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <h4 class="rent">&nbsp;</h4>
                                    <ul>
                                        <li>2 BHK</li>
                                        <li>2 <i class="fa fa-bed" aria-hidden="true"></i></li>
                                        <li>1 <i class="fa fa-shower" aria-hidden="true"></i></li>
                                    </ul>
                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="builder-logo"> <img src="<?php echo base_url('assets/system/') ?>images/logo-builder-01.jpg" class="img-responsive" alt="Image"> </div>
                                </div>
                            </div>
                            <div class="btn-conts"> <a class="btn btn-contact"><i class="fa fa-phone" aria-hidden="true"></i> Call</a> <a class="btn btn-contact"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a> <a class="btn btn-contact"><i class="fa fa-heart" aria-hidden="true"></i> Save</a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="prpt-pagenation">
                <ul>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#" class="next">NEXT ></a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 col-xs-12">aaa
            <div class="side-ads"> <img src="<?php echo base_url('assets/system/') ?>images/ad-01.jpg" alt="Image"> </div>
            <div class="side-ads"> <img src="<?php echo base_url('assets/system/') ?>images/ad-02.jpg" alt="Image"> </div>
        </div>
    </div>
    <div class="article-cover">
        <img src="<?php echo base_url('assets/system/') ?>images/img-article.jpg" alt="Image">
    </div>
</div>