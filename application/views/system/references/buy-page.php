
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Bait</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/system/') ?>css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/owl.theme.default.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/bootstrap-select.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/hover.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/animate.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url('assets/system/') ?>css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/system/') ?>css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo base_url('assets/system/') ?>js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url('assets/system/') ?>js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Navbar -->
<div class="menu">
    <nav class="navbar navbar-default">
        <div class="container menu-container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <div class="logo"><a href="index.html"><img src="<?php echo base_url('assets/system/') ?>images/amlak-logo.png" alt="Amlak Logo"></a></div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">BUY</a></li>
                    <li><a href="#">RENT</a></li>
                    <li><a href="#">COMMERCIAL</a></li>
                    <li><a href="#">FIND AGENT</a></li>
                    <li><a href="#">NEW PROJECTS</a></li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MORE <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><img src="<?php echo base_url('assets/system/') ?>images/icon-lock.png" alt="Icon"> Login</a></li>
                    <li><a href="#"><img src="<?php echo base_url('assets/system/') ?>images/icon-user.png" alt="Icon"> Register</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
</div>
<div class="ins-search-wrap">
    <div class="container">
        <div class="hm-search-form">
            <div class="row search-row">
                <div class="col-md-3 col-sm-6 col-xs-12 search-padd">
                    <div class="form-group">
                        <select class="selectpicker show-tick form-control">
                            <option>Rent</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-9 col-sm-6 col-xs-12 search-padd">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="City or Community or Tower" name="q">
                            <div class="input-group-btn">
                                <button class="btn btn-search" type="submit"><span>SEARCH</span> <img src="<?php echo base_url('assets/system/') ?>images/icon-search.png" alt="Search"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 search-padd">
                    <div class="form-group">
                        <select class="selectpicker show-tick form-control">
                            <option>Property Type</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 search-padd">
                    <div class="form-group">
                        <select class="selectpicker show-tick form-control">
                            <option>Yearly</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 search-padd">
                    <div class="row search-sub-row">
                        <div class="col-md-6 col-xs-6 search-sub-padd">
                            <div class="form-group">
                                <select class="selectpicker show-tick form-control">
                                    <option>Min.price</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6 search-sub-padd">
                            <div class="form-group">
                                <select class="selectpicker show-tick form-control">
                                    <option>Max.price</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 search-padd">
                    <div class="row search-sub-row">
                        <div class="col-md-6 col-xs-6 search-sub-padd">
                            <div class="form-group">
                                <select class="selectpicker show-tick form-control">
                                    <option>Min.bed</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6 search-sub-padd">
                            <div class="form-group">
                                <select class="selectpicker show-tick form-control">
                                    <option>Max.bed</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 search-padd">
                    <div class="row search-sub-row">
                        <div class="col-md-6 col-xs-6 search-sub-padd">
                            <div class="form-group">
                                <select class="selectpicker show-tick form-control">
                                    <option>Min.area</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6 search-sub-padd">
                            <div class="form-group">
                                <select class="selectpicker show-tick form-control">
                                    <option>Max.area</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 search-padd">
                    <div class="form-group">
                        <select class="selectpicker show-tick form-control">
                            <option>All Furnishings</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 search-padd">
                    <div class="form-group">
                        <input class="form-control" placeholder="Keywords">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
        <div class="col-md-6 col-xs-12">
            <div class="prpt-tile-cover">
                <div class="prpt-tile-img"> <img src="<?php echo base_url('assets/system/') ?>images/img-property-01.jpg" alt="Image">
                    <div class="tag-bldr"> <img src="<?php echo base_url('assets/system/') ?>images/builder-ppty.jpg" alt="Builder"> </div>
                    <div class="prpt-tile-rate">
                        <ul>
                            <li><span class="rate">2,65,000 OMR / Month</span></li>
                            <li><span class="rent">For Rent</span></li>
                        </ul>
                    </div>
                </div>
                <div class="prpt-tile-dtls">
                    <div class="col-lg-8 col-md-12 no-padding">
                        <h3>Luxury Apartment (Residential)</h3>
                        <div class="btn-conts">
                            <button class="btn btn-contact"><i class="fa fa-phone" aria-hidden="true"></i> Call</button>
                            <button class="btn btn-contact"><i class="fa fa-envelope" aria-hidden="true"></i> Email</button>
                            <button class="btn btn-contact"><i class="fa fa-heart" aria-hidden="true"></i> Save</button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 no-padding">
                        <div class="ppt-info">
                            <ul>
                                <li>2 BHK</li>
                                <li>2 <i class="fa fa-bed" aria-hidden="true"></i></li>
                                <li>1 <i class="fa fa-shower" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                        <div class="logo-builder">
                            <img src="<?php echo base_url('assets/system/') ?>images/builder-ppty.jpg" alt="Builder">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="prpt-tile-cover">
                <div class="prpt-tile-img"> <img src="<?php echo base_url('assets/system/') ?>images/img-property-02.jpg" alt="Image">
                    <div class="tag-bldr"> <img src="<?php echo base_url('assets/system/') ?>images/builder-ppty.jpg" alt="Builder"> </div>
                    <div class="prpt-tile-rate">
                        <ul>
                            <li><span class="rate">2,65,000 OMR / Month</span></li>
                            <li><span class="rent">For Rent</span></li>
                        </ul>
                    </div>
                </div>
                <div class="prpt-tile-dtls">
                    <div class="col-lg-8 col-md-12 no-padding">
                        <h3>Luxury Apartment (Residential)</h3>
                        <div class="btn-conts">
                            <a class="btn btn-contact"><i class="fa fa-phone" aria-hidden="true"></i> Call</a>
                            <a class="btn btn-contact"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a>
                            <a class="btn btn-contact"><i class="fa fa-heart" aria-hidden="true"></i> Save</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 no-padding">
                        <div class="ppt-info">
                            <ul>
                                <li>2 BHK</li>
                                <li>2 <i class="fa fa-bed" aria-hidden="true"></i></li>
                                <li>1 <i class="fa fa-shower" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                        <div class="logo-builder">
                            <img src="<?php echo base_url('assets/system/') ?>images/builder-ppty.jpg" alt="Builder">
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <div class="col-md-4 col-xs-12">
            <div class="side-ads"> <img src="<?php echo base_url('assets/system/') ?>images/ad-01.jpg" alt="Image"> </div>
            <div class="side-ads"> <img src="<?php echo base_url('assets/system/') ?>images/ad-02.jpg" alt="Image"> </div>
        </div>
    </div>
    <div class="article-cover">
        <img src="<?php echo base_url('assets/system/') ?>images/img-article.jpg" alt="Image">
    </div>
</div>
<footer class="footer-sec ft-inside">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="ft-social">
                    <ul>
                        <li><a href="#" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="twt"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="inst"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="gplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="ytube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="ft-btm-links">
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Client Login</a></li>
                        <li><a href="#">For Brokers</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="ft-apps">
                    <ul>
                        <li><a href="#"><img src="<?php echo base_url('assets/system/') ?>images/app-apple.png" alt="Apple"></a></li>
                        <li><a href="#"><img src="<?php echo base_url('assets/system/') ?>images/app-playstore.png" alt="Apple"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url('assets/system/') ?>js/jquery.min.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url('assets/system/') ?>js/ie10-viewport-bug-workaround.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/owl.carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/system/') ?>js/bootstrap-select.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/wow.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/main.js"></script>
<script>
    new WOW().init();
</script>
</body>
</html>
