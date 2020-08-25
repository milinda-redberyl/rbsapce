<?php
$data_arr = newprojectPagination();
$property_list = $data_arr['property_list'];
$pagination = $data_arr['pagination'];
$per_page = $data_arr['per_page'];
$filterDisplay = $data_arr['filterDisplay'];
$propCount = $data_arr['propCount'];
$dataCount = $data_arr['dataCount'];
?>
<style>
    .autocomplete-suggestions {
        border: 1px solid #999;
        background: #FFF;
        overflow: auto;
    }

    .autocomplete-suggestion {
        padding: 2px 5px;
        white-space: nowrap;
        overflow: hidden;
    }

    .autocomplete-selected {
        background: #F0F0F0;
    }

    .autocomplete-suggestions strong {
        font-weight: normal;
        color: #3399FF;
    }

    .autocomplete-group {
        padding: 2px 5px;
    }

    .autocomplete-group strong {
        display: block;
        border-bottom: 1px solid #000;
    }

    input[type=search]::-webkit-search-cancel-button {
        -webkit-appearance: searchfield-cancel-button;
    }

    .prpt-hor-cover:hover {
        border: 1px solid #4b8df8;
    }

    .map-ppt-scroll {
        height: 700px !important;
    }

</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/JLoadingOverlay/css/jloading-overlay.css"/>
<script src="<?php echo base_url(); ?>assets/jquery-autocomplete/scripts/jquery.mockjax.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery-autocomplete/src/jquery.autocomplete.js"></script>
<script src="<?php echo base_url(); ?>assets/JLoadingOverlay/js/jloading-overlay.js"></script>
<section>
    <div class="container-fluid ppt-map-search">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-xs-12">
                    <div class="breadcrumb-menu">
                        <div class="ppt-search">
                            <div class="input-group">
                                <input class="form-control" type="search" placeholder="Location, developer, project"
                                       id="location" onsearch="OnSearch(this)">
                                <input type="hidden" id="city_id">
                                <input type="hidden" id="longitude">
                                <input type="hidden" id="latitude">
                                <div class="input-group-btn">
                                    <button class="btn btn-search" type="submit"><span>SEARCH</span>
                                        <img src="<?php echo base_url('assets/system/') ?>images/icon-search.png"
                                             alt="Search"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="ppt-map-filter">
                        <ul class="row">
                            <li class="col-xs-4">
                                <div class="form-group">
                                    <label class="sr-only">Type</label>
                                    <?php
                                    $category = drop_category_type('Select Cat.');
                                    echo form_dropdown('',$category,'' ,'class="selectpicker show-tick form-control" id="cat_type"')
                                    ?>
                                </div>
                            </li>
                            <li class="col-xs-4">
                                <div class="form-group">
                                    <label class="sr-only">Bedroom</label>
                                    <?php
                                    $drop_bed = drop_bed_type('Select Bed',1);
                                    echo form_dropdown('',$drop_bed,'' ,'class="selectpicker show-tick form-control" id="bed"')
                                    ?>
                                    <!--<select class="selectpicker show-tick form-control">
                                        <option>Bedroom</option>
                                    </select>-->
                                </div>
                            </li>
                            <li class="col-xs-4">
                                <div class="form-group">
                                    <label class="sr-only">Size</label>
                                    <?php
                                    $minA = drop_area_master();
                                    echo form_dropdown('',$minA,'' ,'class="selectpicker show-tick form-control" id="minArea"')
                                    ?>
                                </div>
                            </li>
                            <li class="col-xs-4">
                                <div class="form-group">
                                    <label class="sr-only">Size</label>
                                    <?php
                                    $maxA = drop_area_master('MAX');
                                    echo form_dropdown('',$minA,'' ,'class="selectpicker show-tick form-control" id="maxArea"')
                                    ?>
                                    <!--<select class="selectpicker show-tick form-control">
                                        <option>Size</option>
                                    </select>-->
                                </div>
                            </li>
                            <!--<li>
                                <div class="form-group">
                                    <label class="sr-only">Possession</label>
                                    <select class="selectpicker show-tick form-control">
                                        <option>Possession</option>
                                    </select>
                                </div>
                            </li>-->
                            <li class="col-xs-4"><a href="#" onclick="resetMap()" class="btn">Reset</a></li>
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
                <h3><strong>Displaying <span id="dataCount">0</span> of <?php echo $propCount ?> new
                        projects in Oman</strong></h3>
                <div class="col-md-8 col-xs-12">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sort by :</label>
                            <div class="col-sm-9">
                                <select class="selectpicker show-tick form-control" onchange="propertyFilter(this.value)">
                                    <option value="featured">Featured</option>
                                    <option value="bedrooms_least">Bedrooms (Least)</option>
                                    <option value="bedrooms_most">Bedrooms (most)</option>
                                    <option value="area_min">Area (min)</option>
                                    <option value="area_max">Area (max)</option>
                                    <option value="property_price">Property price (high)</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="map-ppt-list" style="overflow-y: scroll">
                <div class="map-ppt-scroll">
                    <div id="property-list"><?php //echo $property_list ?></div>
                </div>
            </div>
            <div class="map-pagenation">
                <ul id="pagination-ul">
                    <?php //echo $pagination ?>
                </ul>
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
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAHr5u7C9IEnjGBD35cfL0PxDDtNbAaAg&v=3.exp&amp;sensor=false&amp;.js"></script>
<script type="text/javascript">

    $( document ).ready(function() {
        //resetMap();
    });

    var countries = <?php echo json_encode($suggestion) ?>;

    if (localStorage.getItem("type") != null) {
        if (localStorage.getItem("city_id") != "") {
            $("#location").val(localStorage.getItem("city_name"));
            $("#longitude").val(localStorage.getItem("longitude"));
            $("#latitude").val(localStorage.getItem("latitude"));
            $("#city_id").val(localStorage.getItem("city_id"));
        }
    }

    $('#location').autocomplete({
        lookup: countries,
        onSelect: function (suggestion) {
            $("#city_id").val(suggestion.data);
            $("#longitude").val(suggestion.longitude);
            $("#latitude").val(suggestion.latitude);
            localStorage.setItem("longitude", suggestion.longitude);
            localStorage.setItem("latitude", suggestion.latitude);
            localStorage.setItem("city_name", suggestion.value);
            loadRecords();
        }
    });

    var map;
    var markers = [];
    var MY_MAPTYPE_ID = 'custom_style';
    var companyLogo = new google.maps.MarkerImage('<?php echo base_url('assets/system/') ?>images/icon-home.png',
        new google.maps.Size(50, 50),
        new google.maps.Point(0, 0),
        new google.maps.Point(50, 50)
    );
    var ne_lat = "25.047527059156547";
    var ne_long = "60.13615813828119";
    var sw_lat = "20.747630957322787";
    var sw_long = "56.42827239609369";
    var center_lat = "22.91462707667666";
    var center_long = "58.28221526718744";
    var type = 2;
    var city_id = "";
    var data_pagination = localStorage.getItem('data_pagination');
    var zoomLevel = 8;
    if (localStorage.getItem("zoomLevel") != null) {
        zoomLevel = localStorage.getItem('zoomLevel');
    }
    if (localStorage.getItem("type") != null) {
        center_lat = localStorage.getItem("center_lat");
        center_long = localStorage.getItem("center_long");
        city_id = localStorage.getItem('city_id');
        ne_lat = localStorage.getItem('ne_lat');
        ne_long = localStorage.getItem('ne_long');
        sw_lat = localStorage.getItem('sw_lat');
        sw_long = localStorage.getItem('sw_long');
        type = localStorage.getItem('type');
    }

    $('#cat_type').val(localStorage.getItem('cat_type'));
    $('#bed').val(localStorage.getItem('bed'));
    $('#minArea').val(localStorage.getItem('minArea'));
    $('#maxArea').val(localStorage.getItem('maxArea'));

    $('#cat_type').change(function () {
        localStorage.setItem('cat_type', $(this).val());
        propertyFilter();
    });

    $('#bed').change(function () {
        localStorage.setItem('bed', $(this).val());
        propertyFilter();
    });

    $('#minArea').change(function () {
        localStorage.setItem('minArea', $(this).val());
        propertyFilter();
    });

    $('#maxArea').change(function () {
        localStorage.setItem('maxArea', $(this).val());
        propertyFilter();
    });

    function initialize() {
        var featureOpts = [{
            "elementType": "geometry",
            "stylers": [{"gamma": 1}, {"lightness": -2}, {"saturation": -90}, {"weight": 1}, {"visibility": "simplified"}]
        }];

        var mapOptions = {
            scroll: {x: $(window).scrollLeft(), y: $(window).scrollTop()},
            zoom: parseFloat(zoomLevel),
            center: new google.maps.LatLng(center_lat, center_long),
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

        var offset = $(map.getDiv()).offset();
        map.panBy(((mapOptions.scroll.x - offset.left) / 3), ((mapOptions.scroll.y - offset.top) / 8));
        google.maps.event.addDomListener(window, 'scroll', function () {
            var scrollY = $(window).scrollTop(),
                scrollX = $(window).scrollLeft(),
                scroll = map.get('scroll');
            if (scroll) {
                map.panBy(-((scroll.x - scrollX) / 3), -((scroll.y - scrollY) / 8));
            }
            map.set('scroll', {x: scrollX, y: scrollY})

        });

        var styledMapOptions = {
            name: 'Amlak'
        };

        var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

        map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

        google.maps.event.addListener(map, 'dragend', function () {
            center_lat = map.getCenter().lat();
            center_long = map.getCenter().lng();

            localStorage.setItem('center_lat', center_lat);
            localStorage.setItem('center_long', center_long);

            loadMapMoveRecords(map.getBounds());
        });

        google.maps.event.addListener(map, 'zoom_changed', function () {
            center_lat = map.getCenter().lat();
            center_long = map.getCenter().lng();

            localStorage.setItem('center_lat', center_lat);
            localStorage.setItem('center_long', center_long);

            ne_lat = map.getBounds().getNorthEast().lat();
            ne_long = map.getBounds().getNorthEast().lng();
            sw_lat = map.getBounds().getSouthWest().lat();
            sw_long = map.getBounds().getSouthWest().lng();

            localStorage.setItem('ne_lat', ne_lat);
            localStorage.setItem('ne_long', ne_long);
            localStorage.setItem('sw_lat', sw_lat);
            localStorage.setItem('sw_long', sw_long);
            localStorage.setItem('zoomLevel', map.getZoom());

            propertyFilter();

        });

        propertyFilter();
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    function clearMarkers() {
        setMapOnAll(null);
    }

    function showMarkers() {
        setMapOnAll(map);
    }

    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }

    function setMarkers(markersRec) {
        var currentInfoWindow = null;
        $.each(markersRec, function (index, item) {
            var contentString =
                '<div class="map-popup" style="padding:0px">' +
                '<div class="section-table-cell">' +
                '<img src="<?php echo base_url('uploads/') ?>' + item["imageLink"] + '" style="width:150px; max-height: 100px;"  alt="Image">' +
                '</div>' +
                '<div class="section-table-cell pop-dtl">' +
                '<h3>' + item["property_name"] + '</h3>' +
                '<h4>' + item["property_price"] + '</h4>' +
                '</div>' +
                '</div>' +
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                //disableAutoPan: true,
                maxWidth: 300,
            });

            var companyPos = new google.maps.LatLng(item["latitude"], item["longitude"]);
            var companyMarker = new google.maps.Marker({
                position: companyPos,
                map: map,
                icon: companyLogo,
                title: "oman"
            });

            google.maps.event.addListener(companyMarker, 'click', function () {
                if (currentInfoWindow != null) {
                    currentInfoWindow.close();
                }
                infowindow.open(map, companyMarker);
                currentInfoWindow = infowindow;
            });

            markers.push(companyMarker);
        });

        google.maps.event.addListener(map, 'click', function () {
            currentInfoWindow.close();
        });

        showMarkers();
    }

    function loadRecords() {
        city_id = $("#city_id").val();
        type = 1;
        localStorage.setItem('city_id', city_id);
        localStorage.setItem('type', type);
        localStorage.setItem('data_pagination', 0);
        map.panTo(new google.maps.LatLng($("#latitude").val(), $("#longitude").val()));
        map.setZoom(8);
        data_pagination = 0;
        propertyFilter();

    }

    function loadMapMoveRecords(bound) {
        ne_lat = bound.getNorthEast().lat();
        ne_long = bound.getNorthEast().lng();
        sw_lat = bound.getSouthWest().lat();
        sw_long = bound.getSouthWest().lng();
        type = 2;
        city_id = $("#city_id").val();
        localStorage.setItem('ne_lat', ne_lat);
        localStorage.setItem('ne_long', ne_long);
        localStorage.setItem('sw_lat', sw_lat);
        localStorage.setItem('sw_long', sw_long);
        localStorage.setItem('city_id', city_id);
        localStorage.setItem('type', type);
        localStorage.setItem('data_pagination', 0);
        data_pagination = 0;
        propertyFilter();
    }

    function pagination(obj) {
        $('.ajax-pagination').removeClass('paginationSelected');
        $(obj).addClass('paginationSelected');

        data_pagination = $('.ajax-pagination.paginationSelected').attr('data-ajax-pagination');
        localStorage.setItem('data_pagination', data_pagination);

        propertyFilter();
    }

    function propertyFilter(sort) {

        var per_page = 5;
        // data_pagination = $('.ajax-pagination.paginationSelected').attr('data-ajax-pagination');
        var uriSegment = (data_pagination == undefined) ? 0 : ((parseInt(data_pagination) - 1) * per_page);
        var dataPost = [];
        dataPost.push({'name': 'data_pagination', 'value': data_pagination});
        dataPost.push({'name': 'city_id', 'value': city_id});
        dataPost.push({'name': 'ne_lat', 'value': ne_lat});
        dataPost.push({'name': 'ne_long', 'value': ne_long});
        dataPost.push({'name': 'sw_lat', 'value': sw_lat});
        dataPost.push({'name': 'sw_long', 'value': sw_long});
        dataPost.push({'name': 'type', 'value': type});
        dataPost.push({'name': 'cat_type', 'value':  localStorage.getItem('cat_type')});
        dataPost.push({'name': 'bed', 'value':  localStorage.getItem('bed')});
        dataPost.push({'name': 'minArea', 'value':  localStorage.getItem('minArea')});
        dataPost.push({'name': 'maxArea', 'value':  localStorage.getItem('maxArea')});

        dataPost.push({'name': 'sort', 'value': sort});

        dataPost.push({'name': 'category_type_id', 'value': '7'});


        if (localStorage.getItem("type") != null) {
            if (localStorage.getItem("type") == 1) {
                map.panTo(new google.maps.LatLng($("#latitude").val(), $("#longitude").val()));
            }
        }
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: dataPost,
            url: '<?php echo site_url("Property/propertyFilter"); ?>/' + uriSegment,
            beforeSend: function () {
                $('#property-list').jLoadingOverlay('', {fullscreen: false});
            },
            success: function (data) {
                //stopLoad();
                //$('#property-list').jLoadingOverlay('close');
                $('#property-list').html(data['property_list']);
                $('#pagination-ul').html(data['pagination']);
                $('#dataCount').html(data['displayCount']);
                per_page = data['per_page'];
                $("html, body").animate({scrollTop: "0px"}, 10);
                if (!$.isEmptyObject(data["property_data"])) {
                    deleteMarkers();
                    setMarkers(data["property_data"]);
                } else {
                    deleteMarkers();
                }
                $(".prpt-hor-cover").hover(function () {
                    google.maps.event.trigger(getMarkerbyLocation(new google.maps.LatLng($(this).data("lat"), $(this).data("long"))), 'click');
                });
            }, error: function () {
                myAlert('e', 'Error Occurred');
                /*An Error Occurred! Please Try Again*/
                //stopLoad();
            }
        });

    }

    function OnSearch(input) {
        if (input.value == "" && $("#city_id").val() != "") {
            resetMap();
        }
    }

    function resetMap() {
        data_pagination = 0;
        city_id = "";
        type = 2;
        ne_lat = "25.047527059156547";
        ne_long = "60.13615813828119";
        sw_lat = "20.747630957322787";
        sw_long = "56.42827239609369";
        center_lat = "22.91462707667666";
        center_long = "58.28221526718744";

        localStorage.setItem('city_id', "");
        localStorage.setItem('longitude', "");
        localStorage.setItem('latitude', "");
        localStorage.setItem('city_name', "");
        localStorage.setItem('type', 2);
        localStorage.setItem('data_pagination', data_pagination);
        localStorage.setItem('ne_lat', ne_lat);
        localStorage.setItem('ne_long', ne_long);
        localStorage.setItem('sw_lat', sw_lat);
        localStorage.setItem('sw_long', sw_long);
        localStorage.setItem('center_lat', center_lat);
        localStorage.setItem('center_long', center_long);

        localStorage.setItem('bed', "");
        localStorage.setItem('cat_type', "");
        localStorage.setItem('maxArea', "");
        localStorage.setItem('minArea', "");

        $("#longitude").val('');
        $("#latitude").val('');
        $("#city_id").val('');
        $("#location").val('');

        $('.selectpicker').selectpicker('deselectAll');
        $('.selectpicker').val('');

        map.panTo(new google.maps.LatLng(center_lat, center_long));
        propertyFilter();
    }

    function getMarkerbyLocation(location) {
        for (var i = 0; i < markers.length; i++) {
            if (markers[i].getPosition().lat() == location.lat() && markers[i].getPosition().lng() == location.lng())
                return markers[i];
        }
    }

</script>

<hr>