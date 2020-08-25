
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="-1"/>
    <link rel="icon" href="favicon.ico">
    <title>AMLAK</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/system/') ?>css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/owl.theme.default.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/bootstrap-select.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/hover.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/flexslider.css" rel="stylesheet">
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
                            <button class="btn btn-map"><i class="fa fa-map-marker" aria-hidden="true"></i> View Map</button>
                        </li>
                        <li><span class="result">3956 Results</span></li>
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
</div>



<section>

    <div class="container">
        <div class="over-view-top">
            <div class="bk-page">
                <a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to search</a>
            </div>
            <div class="ppt-top-dtls">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="col-md-6 col-xs-12">
                            <div class="ppt-nm-dtls">
                                <h3>Talat Al Khoudh Villas; 4 Bed Villa</h3>
                                <h4>Located in “Al Khoud”</h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="ppt-sq-dtl">
                                <ul>
                                    <li><span>Area:</span> 421 sq.m</li>
                                    <li><span>Rent:</span> 150,000 / month</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="ppt-btn-gp">
                            <button class="btn btn-share"><i class="fa fa-heart" aria-hidden="true"></i> Save</button>
                            <button class="btn btn-share"><i class="fa fa-share" aria-hidden="true"></i> Share</button>
                            <button class="btn btn-share"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="ppt-photo-gallery">
                    <div class="ppt-photo-big">
                        <div id="slider" class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="<?php echo base_url('assets/system/') ?>images/gallery-big-01.jpg" />
                                </li>
                                <li>
                                    <img src="<?php echo base_url('assets/system/') ?>images/gallery-big-01.jpg" />
                                </li>
                                <li>
                                    <img src="<?php echo base_url('assets/system/') ?>images/gallery-big-01.jpg" />
                                </li>
                                <li>
                                    <img src="<?php echo base_url('assets/system/') ?>images/gallery-big-01.jpg" />
                                </li>
                                <!-- items mirrored twice, total of 12 -->
                            </ul>
                        </div>
                    </div>
                    <div class="ppt-photo-thumb">
                        <div id="carousel" class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="<?php echo base_url('assets/system/') ?>images/gallery-big-01.jpg" />
                                </li>
                                <li>
                                    <img src="<?php echo base_url('assets/system/') ?>images/gallery-big-01.jpg" />
                                </li>
                                <li>
                                    <img src="<?php echo base_url('assets/system/') ?>images/gallery-big-01.jpg" />
                                </li>
                                <li>
                                    <img src="<?php echo base_url('assets/system/') ?>images/gallery-big-01.jpg" />
                                </li>
                                <!-- items mirrored twice, total of 12 -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="ppt-features">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">About apartment:</h3>
                        </div>
                        <div class="panel-body">
                            <div class="ppt-abt">
                                <p>High-end duplexes situated in Madinat Qaboos that offer luxurious living. Spread over two levels, this unit features a modular kitchen that looks into an open plan living and dining area and an outdoor entertainment / sit out area. </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Facts</h3>
                        </div>
                        <div class="panel-body">
                            <div class="ppt-facts">
                                <ul>
                                    <li>
                                        <div class="col-xs-6"><span>Price</span></div>
                                        <div class="col-xs-6">450,000 AED</div>
                                    </li>
                                    <li>
                                        <div class="col-xs-6"><span>Bedrooms</span></div>
                                        <div class="col-xs-6">Studio</div>
                                    </li>
                                    <li>
                                        <div class="col-xs-6"><span>Type</span></div>
                                        <div class="col-xs-6">Apartment</div>
                                    </li>
                                    <li>
                                        <div class="col-xs-6"><span>Bathrooms</span></div>
                                        <div class="col-xs-6">1</div>
                                    </li>
                                    <li>
                                        <div class="col-xs-6"><span>Reference </span></div>
                                        <div class="col-xs-6">RIG-S-D014</div>
                                    </li>
                                    <li>
                                        <div class="col-xs-6"><span>Area</span></div>
                                        <div class="col-xs-6">41 sqm / 445 sqft</div>
                                    </li>
                                    <li>
                                        <div class="col-xs-6"><span>RERA Permit No.</span></div>
                                        <div class="col-xs-6">18112</div>
                                    </li>
                                    <li>
                                        <div class="col-xs-6"><span>Price / Sqft   </span></div>
                                        <div class="col-xs-6">1,011 AED</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="sd-agent-dtls">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Agent Details</h3>
                        </div>
                        <div class="panel-body">
                            <img src="<?php echo base_url('assets/system/') ?>images/agent-img-01.jpg" alt="Image">
                            <h3>Mobile: <br>   + Phone: +8089579575 <br> Email: saudbahwan@gmai.com <br> Skype:</h3>
                        </div>
                    </div>
                </div>
                <div class="ppt-promo-ad">
                    <img src="<?php echo base_url('assets/system/') ?>images/ad-01.jpg" alt="Image">
                </div>
                <div class="sd-review-cover">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="col-sm-6 col-xs-12">
                                <h3>Mulbery</h3>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <img src="<?php echo base_url('assets/system/') ?>images/star.jpg" alt="Star">
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="sd-review-cover">
                                <ul>
                                    <li>
                                        <h4>Latest Reviews</h4>
                                    </li>
                                    <li>zsasd</li>
                                    <li>zsasd</li>
                                    <li>zsasd</li>
                                    <li>zsasd</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="builder-carousel">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, corporis maiores! Animi quisquam placeat vero nulla mollitia quibusdam accusamus eligendi, iusto nemo nostrum, inventore maiores maxime, tenetur quaerat amet blanditiis.
        </div>
    </div>
</section>

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
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug 123-->
<script src="<?php echo base_url('assets/system/') ?>js/ie10-viewport-bug-workaround.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/owl.carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/system/') ?>js/bootstrap-select.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/wow.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/jquery.flexslider.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/main.js"></script>
<script>
   // new WOW().init();
</script>
<script type="text/javascript">
    /*$(function(){
        SyntaxHighlighter.all();
    });*/
    $(window).load(function(){
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 100,
            itemMargin: 10,
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
</script>
</body>
</html>
