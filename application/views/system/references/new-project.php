
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
    <title>AMLAK</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/system/') ?>css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/owl.theme.default.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/bootstrap-select.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/hover.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/system/') ?>css/jquery.mCustomScrollbar.css" rel="stylesheet">
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

<section>
    <div class="container-fluid ppt-map-search">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-xs-12">
                    <div class="breadcrumb-menu">
                        <div class="ppt-search">
                            <div class="input-group">
                                <input class="form-control" placeholder="Location, developer, project">
                                <div class="input-group-btn">
                                    <button class="btn btn-search" type="submit"><span>SEARCH</span> <img src="<?php echo base_url('assets/system/') ?>images/icon-search.png" alt="Search"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="ppt-map-filter">
                        <ul>
                            <li>
                                <div class="form-group">
                                    <label class="sr-only">Type</label>
                                    <select class="selectpicker show-tick form-control">
                                        <option>Type</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label class="sr-only">Bedroom</label>
                                    <select class="selectpicker show-tick form-control">
                                        <option>Bedroom</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label class="sr-only">Size</label>
                                    <select class="selectpicker show-tick form-control">
                                        <option>Size</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <label class="sr-only">Possession</label>
                                    <select class="selectpicker show-tick form-control">
                                        <option>Possession</option>
                                    </select>
                                </div>
                            </li>
                            <li><a href="#" class="btn">Reset</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid no-padding wow fadeIn">
    <div class="col-md-6 col-xs-12 no-padding">
        <div class="property-map">
            <div id="map-canvas"></div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12 no-padding">
        <div class="map-ppt-cover">
            <div class="map-ppt-filter">
                <h3>Displaying 47 of 50 new projects in Oman</h3>
                <div class="col-md-8 col-xs-12">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sort by :</label>
                            <div class="col-sm-9">
                                <select class="selectpicker show-tick form-control">
                                    <option>Featured</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="map-ppt-list">
                <div class="map-ppt-scroll">
                    <div class="prpt-map-cover">
                        <div class="media">
                            <div class="media-left">
                                <div class="prpt-map-img">
                                    <img src="<?php echo base_url('assets/system/') ?>images/img-ppt-list-01.jpg" alt="Image">
                                    <span class="rent">Rent</span>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="prpt-map-dtls">
                                    <h3 class="title">Al Madina Plaza</h3>
                                    <h4 class="stat">Real Estate Development</h4>
                                    <div class="row">
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <h4 class="location"><img src="<?php echo base_url('assets/system/') ?>images/icon-map.png" alt="Icon"> WadiKabir</h4>
                                            <h4 class="units"><span>225 Units</span> <br> Under Construction</h4>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <div class="builder-logo"> <img src="<?php echo base_url('assets/system/') ?>images/logo-builder-01.jpg" class="img-responsive" alt="Image"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prpt-map-cover">
                        <div class="media">
                            <div class="media-left">
                                <div class="prpt-map-img">
                                    <img src="<?php echo base_url('assets/system/') ?>images/img-ppt-list-01.jpg" alt="Image">
                                    <span class="rent">Rent</span>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="prpt-map-dtls">
                                    <h3 class="title">Al Madina Plaza</h3>
                                    <h4 class="stat">Real Estate Development</h4>
                                    <div class="row">
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <h4 class="location"><img src="<?php echo base_url('assets/system/') ?>images/icon-map.png" alt="Icon"> WadiKabir</h4>
                                            <h4 class="units"><span>225 Units</span> <br> Under Construction</h4>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <div class="builder-logo"> <img src="<?php echo base_url('assets/system/') ?>images/logo-builder-01.jpg" class="img-responsive" alt="Image"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prpt-map-cover">
                        <div class="media">
                            <div class="media-left">
                                <div class="prpt-map-img">
                                    <img src="<?php echo base_url('assets/system/') ?>images/img-ppt-list-01.jpg" alt="Image">
                                    <span class="rent">Rent</span>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="prpt-map-dtls">
                                    <h3 class="title">Al Madina Plaza</h3>
                                    <h4 class="stat">Real Estate Development</h4>
                                    <div class="row">
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <h4 class="location"><img src="<?php echo base_url('assets/system/') ?>images/icon-map.png" alt="Icon"> WadiKabir</h4>
                                            <h4 class="units"><span>225 Units</span> <br> Under Construction</h4>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <div class="builder-logo"> <img src="<?php echo base_url('assets/system/') ?>images/logo-builder-01.jpg" class="img-responsive" alt="Image"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prpt-map-cover">
                        <div class="media">
                            <div class="media-left">
                                <div class="prpt-map-img">
                                    <img src="<?php echo base_url('assets/system/') ?>images/img-ppt-list-01.jpg" alt="Image">
                                    <span class="rent">Rent</span>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="prpt-map-dtls">
                                    <h3 class="title">Al Madina Plaza</h3>
                                    <h4 class="stat">Real Estate Development</h4>
                                    <div class="row">
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <h4 class="location"><img src="<?php echo base_url('assets/system/') ?>images/icon-map.png" alt="Icon"> WadiKabir</h4>
                                            <h4 class="units"><span>225 Units</span> <br> Under Construction</h4>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <div class="builder-logo"> <img src="<?php echo base_url('assets/system/') ?>images/logo-builder-01.jpg" class="img-responsive" alt="Image"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="map-pagenation">
                        <ul>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="container">
        <div class="article-cover">
            <img src="<?php echo base_url('assets/system/') ?>images/img-article.jpg" alt="Image">
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
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url('assets/system/') ?>js/ie10-viewport-bug-workaround.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/owl.carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/system/') ?>js/bootstrap-select.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/wow.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/main.js"></script>
<script>
    new WOW().init();
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAHr5u7C9IEnjGBD35cfL0PxDDtNbAaAg&v=3.exp&amp;sensor=false&amp;.js"></script>
<script type="text/javascript">

    var map;
    var newyork = new google.maps.LatLng(22.907137,56.718037);
    var MY_MAPTYPE_ID = 'custom_style';

    function initialize() {

        var featureOpts = [ { "elementType": "geometry", "stylers": [ { "gamma": 1 }, { "lightness": -2 }, { "saturation": -90 }, { "weight": 1 }, { "visibility": "simplified" } ] } ];

        var mapOptions = {
            scroll:{x:$(window).scrollLeft(),y:$(window).scrollTop()},
            zoom: 10,
            center: new google.maps.LatLng(23.5839931, 58.3536264),
            panControl: true,
            panControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },

            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.LEFT_CENTER
            },

            scaleControl: false,
            scrollwheel: false,
            streetViewControl: false,
            mapTypeControlOptions: {
                mapTypeIds: [MY_MAPTYPE_ID]
            },
            mapTypeId: MY_MAPTYPE_ID,
        };


        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


        var contentString =
            '<div class="map-popup">'+
            '<div class="section-table-cell">'+
            '<img src="<?php echo base_url('assets/system/') ?>images/map-popup.jpg" alt="Image">'+
            '</div>'+
            '<div class="section-table-cell pop-dtl">'+
            '<h3>Luxury Apartment </h3>'+
            '<h4>2,65,000 OMR</h4>'+
            '</div>'+
            '</div>'+
            '</div>';

        var contentString2 =
            '<div class="map-popup">'+
            '<div class="section-table-cell">'+
            '<img src="<?php echo base_url('assets/system/') ?>images/map-popup.jpg" alt="Image">'+
            '</div>'+
            '<div class="section-table-cell pop-dtl">'+
            '<h3>Luxury Apartment </h3>'+
            '<h4>2,65,000 OMR</h4>'+
            '</div>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var infowindow2 = new google.maps.InfoWindow({
            content: contentString2
        });




        var companyLogo = new google.maps.MarkerImage('<?php echo base_url('assets/system/') ?>images/icon-home.png',
            new google.maps.Size(50,50),
            new google.maps.Point(0,0),
            new google.maps.Point(50,50)
        );

        var companyPos = new google.maps.LatLng(23.5838077,58.38648);
        var companyMarker = new google.maps.Marker({
            position: companyPos,
            map: map,
            icon: companyLogo,
            title:"oman"
        });

        var companyPos = new google.maps.LatLng(23.6121007,58.549274);
        var companyMarker2 = new google.maps.Marker({
            position: companyPos,
            map: map,
            icon: companyLogo,
            title:"oman"
        });











        var offset=$(map.getDiv()).offset();
        map.panBy(((mapOptions.scroll.x-offset.left)/3),((mapOptions.scroll.y-offset.top)/8));
        google.maps.event.addDomListener(window, 'scroll', function(){
            var scrollY=$(window).scrollTop(),
                scrollX=$(window).scrollLeft(),
                scroll=map.get('scroll');
            if(scroll){
                map.panBy(-((scroll.x-scrollX)/3),-((scroll.y-scrollY)/8));
            }
            map.set('scroll',{x:scrollX,y:scrollY})

        });


        var styledMapOptions = {
            name: 'Amrt3trelak'
        };

        var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions)
            ;


        map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

        google.maps.event.addListener(companyMarker, 'click', function() {
            infowindow.open(map,companyMarker);

        });
        google.maps.event.addListener(companyMarker2, 'click', function() {
            infowindow2.open(map,companyMarker2);

        });

    }


    google.maps.event.addDomListener(window, 'load', initialize);var map;var map;
</script>
</body>
</html>
