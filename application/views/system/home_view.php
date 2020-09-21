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



<!-- Modal -->

<div class="modal fade register-modal" data-easein="flipBounceYIn" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-body">

                <div class="modal-form">

                    <button type="button" class="popup-close" data-dismiss="modal" aria-label="Close"><img src="<?php echo base_url('assets/system/') ?>images/close.png" alt="Image"></button>

                    <h2>Register</h2>

                    <div class="form-group">

                        <input class="form-control" placeholder="Name">

                    </div>

                    <div class="form-group">

                        <input class="form-control" placeholder="Email">

                    </div>

                    <div class="form-group">

                        <input class="form-control" placeholder="Phone">

                    </div>

                    <div class="form-group">

                        <input class="form-control" placeholder="Website">

                    </div>

                    <div class="form-group">

                        <input class="form-control" placeholder="Company">

                    </div>

                    <button class="btn btn-block btn-register">REGISTER</button>

                </div>

            </div>

        </div>

    </div>

</div>


<div class="modal fade register-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-body">

                <div class="modal-form">

                    <button type="button" class="popup-close" data-dismiss="modal" aria-label="Close"><img src="<?php echo base_url('assets/system/') ?>images/close.png" alt="Image"></button>

                    <h2>Login</h2>

                    <div class="form-group">

                        <input class="form-control" placeholder="Username">

                    </div>

                    <div class="form-group">

                        <input class="form-control" placeholder="Password">

                    </div>

                    <button class="btn btn-block btn-register">LOGIN</button>

                </div>

            </div>

        </div>

    </div>

</div>



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

                    <li><a href="#">FIND AGENT1</a></li>

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

                    <li><a href="#" type="button" data-toggle="modal" data-target="#loginModal" class="login"><img src="<?php echo base_url('assets/system/') ?>images/icon-lock.png" alt="Icon"> Login</a></li>

                    <li><a href="#" type="button" data-toggle="modal" data-target="#registerModal" class="login"><img src="<?php echo base_url('assets/system/') ?>images/icon-user.png" alt="Icon"> Register</a></li>

                </ul>

            </div>

            <!--/.nav-collapse -->

        </div>

    </nav>

</div>

<div class="banner">

    <div id="carousel-banner" class="carousel slide" data-ride="carousel">



        <!-- Wrapper for slides -->

        <div class="carousel-inner" role="listbox">

            <div class="item active"> <img src="<?php echo base_url('assets/system/') ?>images/slider-01.jpg" alt="banner"> </div>

            <div class="item"> <img src="<?php echo base_url('assets/system/') ?>images/slider-02.jpg" alt="banner"> </div>

            <div class="item"> <img src="<?php echo base_url('assets/system/') ?>images/slider-03.jpg" alt="banner"> </div>

        </div>

    </div>

    <div class="banner-heading">

        <div class="container">

            <div class="bn-heading"> <img src="<?php echo base_url('assets/system/') ?>images/banner-logo.png" class="bn-logo" alt="Logo">

                <h1>Discover Your Dream Property</h1>

                <h4>Sri Lanka’s Leading Real Estate Company</h4>




            </div>

        </div>

    </div>

    <div class="search-form-wrap">

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

                                <input class="form-control" placeholder="City or Community or Tower">

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

</div>

<div class="container wow fadeIn">

    <div class="hm-property-carousel">

        <h2><span>Recommended properties</span></h2>

        <div id="carousel-property" class="owl-carousel owl-theme">

            <div class="item">

                <div class="hm-ppt-cover">

                    <div class="hm-ppt-img grow"> <img src="<?php echo base_url('assets/system/') ?>images/img-property-01.jpg" alt="Image">

                        <div class="tag-bldr"> <img src="<?php echo base_url('assets/system/') ?>images/builder-ppty.jpg" alt="Builder"> </div>

                        <div class="hm-ppt-rate">

                            <ul>

                                <li><span class="rate">2,65,000 OMR / year</span></li>

                                <li><span class="rent">For Rent</span></li>

                            </ul>

                        </div>

                    </div>

                    <div class="hm-ppt-dtls">

                        <h3>Luxury Apartment (Residential)</h3>

                        <ul>

                            <li>2 BHK</li>

                            <li>2 <i class="fa fa-bed" aria-hidden="true"></i></li>

                            <li>1 <i class="fa fa-shower" aria-hidden="true"></i></li>

                        </ul>

                    </div>

                </div>

            </div>

            <div class="item">

                <div class="hm-ppt-cover">

                    <div class="hm-ppt-img"> <img src="<?php echo base_url('assets/system/') ?>images/img-property-02.jpg" alt="Image">

                        <div class="tag-bldr"> <img src="<?php echo base_url('assets/system/') ?>images/builder-ppty.jpg" alt="Builder"> </div>

                        <div class="hm-ppt-rate">

                            <ul>

                                <li><span class="rate">2,65,000 OMR / year</span></li>

                                <li><span class="rent">For Rent</span></li>

                            </ul>

                        </div>

                    </div>

                    <div class="hm-ppt-dtls">

                        <h3>Luxury Apartment (Residential)</h3>

                        <ul>

                            <li>2 BHK</li>

                            <li>2 <i class="fa fa-bed" aria-hidden="true"></i></li>

                            <li>1 <i class="fa fa-shower" aria-hidden="true"></i></li>

                        </ul>

                    </div>

                </div>

            </div>

            <div class="item">

                <div class="hm-ppt-cover">

                    <div class="hm-ppt-img"> <img src="<?php echo base_url('assets/system/') ?>images/img-property-03.jpg" alt="Image">

                        <div class="tag-bldr"> <img src="<?php echo base_url('assets/system/') ?>images/builder-ppty.jpg" alt="Builder"> </div>

                        <div class="hm-ppt-rate">

                            <ul>

                                <li><span class="rate">2,65,000 OMR / year</span></li>

                                <li><span class="rent">For Rent</span></li>

                            </ul>

                        </div>

                    </div>

                    <div class="hm-ppt-dtls">

                        <h3>Luxury Apartment (Residential)</h3>

                        <ul>

                            <li>2 BHK</li>

                            <li>2 <i class="fa fa-bed" aria-hidden="true"></i></li>

                            <li>1 <i class="fa fa-shower" aria-hidden="true"></i></li>

                        </ul>

                    </div>

                </div>

            </div>

            <div class="item">

                <div class="hm-ppt-cover">

                    <div class="hm-ppt-img"> <img src="<?php echo base_url('assets/system/') ?>images/img-property-03.jpg" alt="Image">

                        <div class="tag-bldr"> <img src="<?php echo base_url('assets/system/') ?>images/builder-ppty.jpg" alt="Builder"> </div>

                        <div class="hm-ppt-rate">

                            <ul>

                                <li><span class="rate">2,65,000 OMR / year</span></li>

                                <li><span class="rent">For Rent</span></li>

                            </ul>

                        </div>

                    </div>

                    <div class="hm-ppt-dtls">

                        <h3>Luxury Apartment (Residential)</h3>

                        <ul>

                            <li>2 BHK</li>

                            <li>2 <i class="fa fa-bed" aria-hidden="true"></i></li>

                            <li>1 <i class="fa fa-shower" aria-hidden="true"></i></li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="article-cover">

        <img src="<?php echo base_url('assets/system/') ?>images/img-article.jpg" alt="Image">

    </div>

</div>

<footer class="footer-sec">

    <div class="container">

        <div class="row">

            <div class="col-md-3 col-sm-6 col-xs-12">

                <div class="ft-links">

                    <h3>Popular Searches</h3>

                    <ul>

                        <li><a href="#">Studios for rent</a></li>

                        <li><a href="#">Apartments for rent</a></li>

                        <li><a href="#">Villas for rent</a></li>

                        <li><a href="#">Apartments for sale</a></li>

                        <li><a href="#">Villas for sale</a></li>

                        <li><a href="#">Land for sale</a></li>

                        <li><a href="#">Real Estate</a></li>

                    </ul>

                </div>

            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">

                <div class="ft-links">

                    <h3>Popular Areas</h3>

                    <ul>

                        <li><a href="#">Studios for rent</a></li>

                        <li><a href="#">Apartments for rent</a></li>

                        <li><a href="#">Villas for rent</a></li>

                        <li><a href="#">Apartments for sale</a></li>

                        <li><a href="#">Villas for sale</a></li>

                        <li><a href="#">Land for sale</a></li>

                        <li><a href="#">Real Estate</a></li>

                    </ul>

                </div>

            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">

                <div class="ft-links">

                    <h3>Trending Areas</h3>

                    <ul>

                        <li><a href="#">Studios for rent</a></li>

                        <li><a href="#">Apartments for rent</a></li>

                        <li><a href="#">Villas for rent</a></li>

                        <li><a href="#">Apartments for sale</a></li>

                        <li><a href="#">Villas for sale</a></li>

                        <li><a href="#">Land for sale</a></li>

                        <li><a href="#">Real Estate</a></li>

                    </ul>

                </div>

            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">

                <div class="ft-links">

                    <h3>Trending Searches</h3>

                    <ul>

                        <li><a href="#">Studios for rent</a></li>

                        <li><a href="#">Apartments for rent</a></li>

                        <li><a href="#">Villas for rent</a></li>

                        <li><a href="#">Apartments for sale</a></li>

                        <li><a href="#">Villas for sale</a></li>

                        <li><a href="#">Land for sale</a></li>

                        <li><a href="#">Real Estate</a></li>

                    </ul>

                </div>

            </div>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

<script>
    anime.timeline({loop: true})
        .add({
            targets: '.ml15 .word',
            scale: [14,1],
            opacity: [0,1],
            easing: "easeOutCirc",
            duration: 800,
            delay: function(el, i) {
                return 800 * i;
            }
        }).add({
        targets: '.ml15',
        opacity: 0,
        duration: 1000,
        easing: "easeOutExpo",
        delay: 1000
    });
</script>


<script>

    new WOW().init();

</script>

</body>

</html>

