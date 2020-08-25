<div class="wow fadeIn">
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

        <div class="col-md-12 col-xs-12" style="margin-top: 10px">
            <?php
            if (isset($s_result) && !empty($s_result)) {
                foreach ($s_result as $item) {
                    $id = $item['property_id'];
                    $image = get_propertyImage($id);

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

                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                <div class="prpt-hor-img">
                                    <a href="<?php echo site_url('overview/' . $item['property_id']) ?>">
                                        <img src="<?php echo $image; ?>" class="center-block"
                                             style="width:100%; height: auto;"
                                             alt="Image">
                                        <span class="rent"><?php echo $item['category_nameas'] ?><!--Rent--></span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pad_L_0">
                                <div class="media-body">
                                    <div class="prpt-hor-dtls">
                                        <h3 class="title"> <?php echo $item['property_name'] ?>
                                            <!--(Residential) --></h3>
                                        <!-- <h4 class="location"><?php
                                        $string = strip_tags($item['description']);

                                        if (strlen($string) > 80) {

                                            // truncate string
                                            $stringCut = substr($string, 0, 80);

                                            // make sure it ends in a word so assassinate doesn't become ass...
                                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . '... <a href="' . site_url('overview/' . $item['property_id']) . '">Read More</a>';
                                        }
                                        echo $string;

                                        ?></h4> -->
                                        <div class="row">
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <h4 class="rent"><?php echo number_format($item['property_price']) ?>
                                                    OMR
                                                    <?php echo isset($item['category_type_id']) && $item['category_type_id'] == 1 ? ' / Month' : ''; ?>

                                                </h4>
                                                <ul>
                                                    <!--<li>2 BHK</li>-->
                                                    <li><i class="fa fa-bed"
                                                           aria-hidden="true"></i> <?php echo $item['bed_type_name'] ?>
                                                    </li>
                                                    <li><i class="fa fa-shower" aria-hidden="true"></i>2</li>
                                                    <li><?php echo $item['property_type_name'] ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="builder-logo">
                                                    <img src="<?php echo $companyLogo; ?>"
                                                         class="img-responsive" alt="Image" width="90">
                                                </div>
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
                    <h4>We currently have no properties for this agent</h4>
                    <ul>
                        <li>oops</li>
                    </ul>
                </div><?php
            }
            ?>


        </div>

        <div style="text-align: center">
            <?php
            if (isset($pagination)) {
                echo $pagination;
            }
            ?>
        </div>


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