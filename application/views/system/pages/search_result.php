<script

        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAHr5u7C9IEnjGBD35cfL0PxDDtNbAaAg&v=3.exp&amp;sensor=false&amp;.js"></script>

<div class="container wow fadeIn">

    <div class="ppty-sort-cover">

        <div class="row">

            <div class="col-md-6 col-xs-12">

                <h3>

                    <?php echo isset($sub_title) && !empty($sub_title) ? $sub_title : '<i class="fa fa-search"></i> Filtered Properties '; ?>

                </h3>

            </div>

            <div class="col-md-6 col-xs-12">

                <div class="ppt-filter-list">

                    <ul>

                        <li>Sort By:</li>

                        <li>

                            <div class="form-group">

                                <?php

                                $ob = $this->input->get('ob');

                                $currentURL = current_url();

                                $params = $_SERVER['QUERY_STRING'];



                                $fullURL = $currentURL . '?' . $params;

                                ?>



                                <select class="selectpicker show-tick form-control" name="search-order-by"

                                        onchange="window.location = this.value"

                                        style="display: none;">

                                    <!--<option value="/en/buy/properties-for-sale.html?ob=mr">Featured</option>-->

                                    <option value="<?php echo $fullURL ?>&ob=ob_nd" <?php if ($ob == 'ob_nd') {

                                        echo 'selected';

                                    } ?> >Newest

                                    </option>

                                    <option value="<?php echo $fullURL ?>&ob=ob_nd" <?php if ($ob == 'ob_nd') {

                                        echo 'selected';

                                    } ?> >Featured

                                    </option>

                                    <option value="<?php echo $fullURL ?>&ob=ob_pa" <?php if ($ob == 'ob_pa') {

                                        echo 'selected';

                                    } ?>>Price (low)

                                    </option>

                                    <option value="<?php echo $fullURL ?>&ob=ob_pd" <?php if ($ob == 'ob_pd') {

                                        echo 'selected';

                                    } ?>>Price (high)

                                    </option>

                                    <option value="<?php echo $fullURL ?>&ob=ob_ba" <?php if ($ob == 'ob_ba') {

                                        echo 'selected';

                                    } ?>>Beds (least)

                                    </option>

                                    <option value="<?php echo $fullURL ?>&ob=ob_bd" <?php if ($ob == 'ob_bd') {

                                        echo 'selected';

                                    } ?>>Beds (most)

                                    </option>

                                </select>





                                <!--<select >

                                    <option>Features</option>

                                    <option>2</option>

                                    <option>3</option>

                                </select>-->

                            </div>

                        </li>



                        <li>

                            <a href="#" onclick="loadMap(this)" data-open="0" data-hide="0" id="mapShowHide"

                               class="btn btn-map"><i class="fa fa-map-marker"

                                                      aria-hidden="true"></i>

                                View Map

                            </a>

                        </li>

                        <li><span class="result"><?php echo isset($count) ? $count : 0; ?> Results

                                <!--3956 Results--></span>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>



    <?php

    if (isset($search_suggestion) && $search_suggestion) {

        $this->load->view('system/template/inc-search-suggestion');

    }

    ?>





    <div class="row">

        <?php

        if (isset($suggestion) && $suggestion) {

            $this->load->view('system/template/inc-suggestion');

        }

        ?>

        <div class="col-md-8 col-xs-12">

            <div class="property-map">

                <div id="loadMap" style="height: 450px;display: none">



                </div>

            </div>

        </div>



        <div class="col-md-9 col-sm-12 col-xs-12" style="margin-top: 10px">

            <?php

            if (isset($s_result) && !empty($s_result)) {

                foreach ($s_result as $item) {

                    $id = $item['property_id'];

                    $city_id = $item['city_id'];

                    $image = get_propertyImage($id);

                    $city_name = get_cityName($city_id);

                    $companyLogo = base_url() . "uploads/company_image/default-company_image.jpg";



                    if ($item['agent_id']) {

                        $company_details_q = "SELECT

                            srp_employeesdetails.*,

                            company_master.* 

                        FROM

                            srp_employeesdetails

                            INNER JOIN company_master ON srp_employeesdetails.company_id = company_master.company_id 

                        WHERE

                            srp_employeesdetails.isAgent = 1 

                            

                            AND srp_employeesdetails.EIdNo = " . $item['agent_id'] . "";



                        $company_details = $this->db->query($company_details_q)->result_array();

                        if (!empty($company_details)) {

                            if ($company_details[0]['companyLogo'] != "") {

                                $companyLogo = base_url() . 'uploads/company_image/' . $company_details[0]['companyLogo'];

                            }

                        }

                    }



                    ?>

                    <div class="prpt-hor-cover">

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                                <div class="media-left center-block">

                                    <div class="prpt-hor-img">

                                        <a href="<?php echo site_url('overview/' . $item['property_id']) ?>">

                                            <img src="<?php echo $image ?>" class="center-block"

                                                 style="width:100%; height: auto;"

                                                 alt="Image">

                                            <!--<span class="rent"><?php //echo $item['category_nameas'] ?></span> -->

                                        </a>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 pad_L_0">

                                <div class="media-body">

                                    <div class="prpt-hor-dtls pr-set">

                                        <a href="<?php echo site_url('overview/' . $item['property_id']) ?>"><h3

                                                    class="title"> <?php echo $item['property_name'] ?></h3></a>

                                        <!--(Residential) --></h3>

                                        <h5 class="location_title"><i class="fa fa-map-marker"

                                                                      aria-hidden="true"></i> <?php echo $city_name;; ?>

                                        </h5>

                                        <div class="row">

                                            <div class="col-md-9 col-sm-7 col-xs-12 pad-bottom-2">

                                                <h4 class="rent"><?php echo number_format($item['property_price']) ?>

                                                    <span>LKR</span>

                                                    <?php echo isset($item['category_type_id']) && $item['category_type_id'] == 1 ? ' / Month' : ''; ?>



                                                </h4>

                                                <ul>

                                                    <!--<li>2 BHK</li>-->

                                                    <li><?php echo $item['property_type_name'] ?></li>

                                                    <li><i class="fa fa-bed"

                                                           aria-hidden="true"></i> <?php echo $item['bed_type_name'] ?>

                                                    </li>

                                                    <li><i class="fa fa-shower"

                                                           aria-hidden="true"></i> <?php echo "3"; ?>

                                                    </li>

                                                    <li> <?php echo isset($item['area']) ? $item['area'] : '-'; ?>

                                                        Sq.ft

                                                    </li>



                                                </ul>

                                            </div>

                                            <div class="col-md-3 col-sm-5 col-xs-6">

                                                <div class="builder-logo">

                                                    <img src="<?php echo $companyLogo; ?>"

                                                         class="img-responsive pull-right" width="70" alt="Image"></div>

                                            </div>

                                        </div>

                                        <div class="btn-conts">

                                            <a class="btn btn-contact"

                                               onclick="showTelNo(<?php echo $item['property_id']; ?>,'<?php echo $item['telephone_number']; ?>')">

                                                <i class="fa fa-phone" aria-hidden="true"></i> <span

                                                        id="telNo_<?php echo $item['property_id']; ?>">Call</span>

                                            </a>

                                            <a class="btn btn-contact"

                                               onclick="send_property_email(<?php echo $item['property_id']; ?>)">

                                                <i class="fa fa-envelope" aria-hidden="true"></i>

                                                Email

                                            </a>



                                            <?php

                                            $save_properties = $this->session->userdata('save_');

                                            if (isset($save_properties)) {

                                                if (array_key_exists($item['property_id'], $save_properties)) {

                                                    ?>

                                                    <a class="btn btn-contact save_<?php echo $item['property_id']; ?>"

                                                       id="element<?php echo $item['property_id']; ?>"

                                                       onclick="save_property_by_click(<?php echo $item['property_id']; ?>)"><i

                                                                class="fa fa-check" aria-hidden="true"></i> Saved</a>

                                                    <?php

                                                } else {

                                                    ?>

                                                    <a class="btn btn-contact save_<?php echo $item['property_id']; ?>"

                                                       id="element<?php echo $item['property_id']; ?>"

                                                       onclick="save_property_by_click(<?php echo $item['property_id']; ?>)"><i

                                                                class="fa fa-heart" aria-hidden="true"></i> Save</a>

                                                    <?php

                                                }

                                            } else {

                                                ?>

                                                <a class="btn btn-contact save_<?php echo $item['property_id']; ?>"

                                                   id="element<?php echo $item['property_id']; ?>"

                                                   onclick="save_property_by_click(<?php echo $item['property_id']; ?>)"><i

                                                            class="fa fa-heart" aria-hidden="true"></i> Save</a>

                                                <?php

                                            }

                                            ?>

                                            <div id="result_<?php echo $item['property_id']; ?>"></div>

                                            <?php

                                            $un = $this->session->userdata('status');

                                            if (isset($un) && $un) { ?>

                                                <!--<a class="btn btn-contact">

                                                    <i class="fa fa-heart" aria-hidden="true"></i>

                                                    Save

                                                </a>-->

                                            <?php } ?>

                                        </div>

                                    </div>

                                </div>

                            </div>





                        </div>

                    </div>

                    <?php

                }

            } else {

                ?>

                <div class="alert alert-danger">

                    <h4>We currently have no properties matching your search</h4>

                    <h5>You could try the following:</h5>

                    <ul>

                        <li>Adjust the filters in your search</li>

                    </ul>

                </div><?php

            }

            ?>





        </div>



        <div class="col-md-3 col-sm-12 col-xs-12">



            <?php

            if (!empty($sidebar_advertisements)) {

                //echo count($sidebar_advertisements);

                if (count($sidebar_advertisements) <= 6) {

                    for ($i = 0; $i < count($sidebar_advertisements); $i++) {

                        $url = $sidebar_advertisements[$i]['url'];

                        $img_url = $sidebar_advertisements[$i]['img_url'];



                        ?>

                        <div class="side-ads">

                            <a href="<?php echo $url ?>" target="_blank">

                                <img src="<?php echo base_url() . $img_url; ?>" alt="Image">

                            </a>

                        </div>

                        <?php

                    }

                }

            }

            ?>



            <!-- <div class="side-ads"><img src="<?php echo base_url('assets/system/') ?>images/ad-01.jpg" alt="Image"></div>

            <div class="side-ads"><img src="<?php echo base_url('assets/system/') ?>images/ad-02.jpg" alt="Image"></div> -->

        </div>

    </div>

    <div style="text-align: center">

        <?php

        if (isset($pagination)) {

            echo $pagination;

        }

        ?>

    </div>

    <!--<div class="prpt-pagenation">

        <ul>

            <li class="active"><a href="#">1</a></li>

            <li><a href="#">2</a></li>

            <li><a href="#">3</a></li>

            <li><a href="#">4</a></li>

            <li><a href="#">5</a></li>

            <li><a href="#">6</a></li>

            <li><a href="#" class="next">NEXT ></a></li>

        </ul>

    </div>-->

    <div class="article-cover">

        <img src="<?php echo base_url('assets/system/') ?>images/img-article.jpg" alt="Image">

    </div>

</div>

<script>

    var map;

    var markers = [];

    var MY_MAPTYPE_ID = 'custom_style';

    var companyLogo = new google.maps.MarkerImage('<?php echo base_url('assets/system/') ?>images/icon-home.png',

        new google.maps.Size(50, 50),

        new google.maps.Point(0, 0),

        new google.maps.Point(50, 50)

    );

    var center_lat = "22.91462707667666";

    var center_long = "58.28221526718744";



    function showTelNo(id, tel) {

        $("#telNo_" + id).html(tel);

    }



    var property = <?php echo json_encode($s_result) ?>;



    function initialize() {



        var featureOpts = [{

            "elementType": "geometry",

            "stylers": [{"gamma": 1}, {"lightness": -2}, {"saturation": -90}, {"weight": 1}, {"visibility": "simplified"}]

        }];



        var mapOptions = {

            scroll: {x: $(window).scrollLeft(), y: $(window).scrollTop()},

            zoom: 7,

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



        map = new google.maps.Map(document.getElementById('loadMap'), mapOptions);



        var bounds = new google.maps.LatLngBounds();



        var styledMapOptions = {

            name: 'Amlak'

        };



        var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);



        map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

        var currentInfoWindow = null;



        $.each(property, function (index, item) {

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

                maxWidth: 300,

            });

            var marker = new google.maps.Marker({

                position: new google.maps.LatLng(item["latitude"], item["longitude"]),

                map: map,

                icon: companyLogo,

                title: "oman",

            });

            bounds.extend(marker.position);

            google.maps.event.addListener(marker, 'click', function () {

                if (currentInfoWindow != null) {

                    currentInfoWindow.close();

                }

                infowindow.open(map, marker);

                currentInfoWindow = infowindow;

            });

            markers.push(marker);

        });

        showMarkers();

        map.fitBounds(bounds);

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



    function loadMap(element) {

        $("#loadMap").toggle();

        if ($(element).data("open") == 0) {

            initialize();

            $(element).data('open', 1)

        }

        if ($(element).data("hide") == 0) {

            $("html, body").animate({scrollTop: $('#loadMap').offset().top}, 1000);

            $(element).data('hide', 1);

            $(element).html('<i class="fa fa-bars" aria-hidden="true"></i> Hide map')

        } else {

            $(element).data('hide', 0);

            $(element).html('<i class="fa fa-map-marker" aria-hidden="true"></i> View map');

        }

    }

</script>



