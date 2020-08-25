<?php
/** Loading Data table Library*/
echo load_lib_dataTable();
?>
<style>
    .list {
        list-style: none;
    }

    hr {
        margin: 0px 0px 10px 0px !important;
    }
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.custom.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/daterangepicker.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-colorpicker.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/select2/css/select2.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colorbox.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dropzone/dropzone.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-fileupload/bootstrap-fileupload.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/iCheck/all.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/iCheck/square/purple.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/system/css/style.css"/>
<script src="<?php echo base_url(); ?>assets/dropzone/dropzone.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.colorbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/iCheck/icheck.js"></script>
<script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDAHr5u7C9IEnjGBD35cfL0PxDDtNbAaAg&sensor=false&libraries=places"></script>
<div>
    <h3>Manage About Us <!--[<i class="fa fa-plus green"></i> <i class="fa fa-pencil-square-o blue"></i> <i
            class="fa fa-times red"></i> ]-->
        <span class="pull-right">
        <button class="btn btn-primary btn-xs " type="button"
                                                                  onclick="init_addAboutUs()">Add New <i
                    class="fa fa-plus"></i></button>
       </span>
    </h3>
</div>
<table class="table table-striped table-hover" id="property_table">
    <thead>
    <tr>
        <th>#</th>
        <th><i class="fa fa-home"></i> Description</th>      
        <th>Year</th>
        
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    $(document).ready(function () {
        load_aboutus_table();
    })

    function load_aboutus_table() {
        $('#property_table').DataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "StateSave": true,
            "sAjaxSource": "<?php echo site_url('Property/get_aboutus_dataTable'); ?>",
            "aaSorting": [[1, 'desc']],
            "fnInitComplete": function () {

            },
            "fnDrawCallback": function (oSettings) {
                //tableBgColorJs();
            },
            "aoColumns": [
                {"mData": "id"},               
                {"mData": "description"},               
                {"mData": "year"},

                {"mData": "btn_set"}
            ],
            "fnServerData": function (sSource, aoData, fnCallback) {
                aoData.push({'name': 'menuCatID', 'value': ''});
                $.ajax({
                    'dataType': 'json',
                    'type': 'POST',
                    'url': sSource,
                    'data': aoData,
                    'success': fnCallback
                });
            }
        });
    }

    function init_addAboutUs() {
        $("#modal_addAboutUs").modal('show');
        initialize_map(23.5838, 58.3887);
    }
</script>

<!--Drop Zone code -->
<!--<div style="z-index: 100000 !important;
    position: inherit;" >
    <form action="ajax/dms-draganddrop-upload.php" class="dropzone"
          id="myawesomedropzone"></form>
</div>-->



<!--Modal Add about us -->
<div class="modal " data-backdrop="static" id="modal_addAboutUs" role="dialog">
    <div class="modal-dialog modal-lg" style="margin-top: 6px;">
        <div class="modal-content">
            <div class="modal-header modal-header-mini" style="padding: 5px 10px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"
                          style="color:red;">&times;</span>
                </button>
                <h4 class="modal-title"><i class="fa fa-desktop"></i> About Us </h4></div>
            <div class="modal-body" style="min-height: 200px; ">
                <form role="form" enctype="multipart/form-data" id="from_property" class="form-horizontal">
                    <input type="hidden" id="aboutus_idnn" name="aboutus_id">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="property_name"><?php echo required() ?>
                                    Year </label>

                                <div class="col-sm-10">
                                    <input name="about_year" id="about_year" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="description"><?php echo required() ?>
                                    Description </label>

                                <div class="col-sm-10">
                                    <textarea name="about_description" id="about_description" cols="30" rows="2"
                                              class="form-control"></textarea>
                                    <!--<input type="text" id="description" placeholder="description"  />-->
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                             <div class="form-group">
                                <label class="col-md-2 control-label no-padding-right ">Active</label>

                                <div class="checkbox">
                                    <label>
                                        <input id="status" name="status" type="checkbox" value="1" class="ace"/>
                                        <span class="lbl"> </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                                  
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="form-group">
                                <label class="col-md-10 control-label no-padding-right"> &nbsp; </label>

                                <div class="col-sm-2">
                                    <button class="btn btn-primary btn-xs" type="button" onclick="submit_aboutus()">
                                        <i class="fa fa-floppy-o"></i> Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="padding: 5px 10px;">
                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    /** modal related scripts */

    var map;
    var marker;
    var selectedItemsSync = [];
    var infowindow = new google.maps.InfoWindow();

    $(document).ready(function () {
        $('.select2').select2();

        $('.modal').on('hidden.bs.modal', function (e) {
            if ($('.modal').hasClass('in')) {
                $('body').addClass('modal-open');
            }
        });

        /*Dropzone.options.myawesomedropzone = {
         paramName: "file",
         maxFilesize: 5, // MB
         maxFiles: 50,

         acceptedFiles: "image/jpeg, image/jpg, image/png",
         accept: function (file, done) {
         done();
         },
         init: function () {
         thisDropzone = this;

         this.on("queuecomplete", function (file) {
         console.log(file);

         });

         this.on("complete", function (file) {
         setTimeout(function () {
         thisDropzone.removeFile(file);
         }, 500);

         });

         }, queuecomplete: function (file) {
         GetFiles($("#dd_companyID").val(), $("#dd_parentFolderID").val())
         },
         };*/

        $('#upload_image').ace_file_input({
            style: 'well',
            btn_choose: 'Drop Image here or click to choose',
            btn_change: null,
            no_icon: 'ace-icon fa fa-image',
            droppable: true,
            thumbnail: 'small'//large | fit
            //,icon_remove:null//set null, to hide remove/reset button
            /**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
            /**,before_remove : function() {
						return true;
					}*/
            ,
            preview_error: function (filename, error_code) {
                //name of the file that failed
                //error_code values
                //1 = 'FILE_LOAD_FAILED',
                //2 = 'IMAGE_LOAD_FAILED',
                //3 = 'THUMBNAIL_FAILED'
                //alert(error_code);
            }

        }).on('change', function () {
            //console.log($(this).data('ace_input_files'));
            //console.log($(this).data('ace_input_method'));
        });

        initGalary();

        $(document).one('ajaxloadstart.page', function (e) {
            $('#colorbox, #cboxOverlay').remove();
        });


        $('#modal_addManageProperty').on('hidden.bs.modal', function () {
            clearProperty();
        });

        //google.maps.event.addDomListener(window, "load", initialize_map);

    });

    $(document).on('show.bs.modal', '.modal', function () {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function () {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });

    function initialize_map(lat, long) {
        var myLatlng = new google.maps.LatLng(23.58589, 58.4059227);
        var myOptions = {zoom: 13, center: myLatlng, mapTypeId: google.maps.MapTypeId.ROADMAP}
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        var manualLatlng = new google.maps.LatLng(lat, long);
        var companyLogo = new google.maps.MarkerImage('<?php echo base_url('assets/system/') ?>images/icon-home.png',
            new google.maps.Size(50, 50),
            new google.maps.Point(0, 0),
            new google.maps.Point(50, 50)
        );

        // Bounds for Oman
        var strictBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(17.01505, 54.09237),
            new google.maps.LatLng(26.17993, 59.52889),
        );

        var markerOptions = {map: map, position: manualLatlng, icon: companyLogo, draggable: true};
        marker = setMarker(markerOptions);
        google.maps.event.addListener(marker, "drag", function (event) {
            setGeoLocation(event.latLng.lat(), event.latLng.lng());
        });
        //map.fitBounds(strictBounds);
        map.panTo(new google.maps.LatLng(lat, long));
    }

    function setMarker(markerOptions) {
        var markerPoint = new google.maps.Marker(markerOptions);
        return markerPoint;
    }

    function changeMarkerPosition() {
        var long = $('#long').val();
        var lat = $('#lat').val();

        var latlng = new google.maps.LatLng(lat, long);
        marker.setPosition(latlng);
        map.panTo(new google.maps.LatLng(lat, long));
    }


    function setGeoLocation(lat, long) {
        $("#long").val(long);
        $("#lat").val(lat);
    }

    function save_property() {
        $("#from_property").ajaxForm(
            {
                type: 'post',
                dataType: 'json',
                contentType: false,
                cache: false,
                mimeType: "multipart/form-data",
                processData: false,
                url: '<?php echo site_url('Property/save_property'); ?>',
                data: $("#frm_upload_file").serialize(),
                beforeSend: function () {
                    startLoad();
                },
                success: function (data) {

                    stopLoad();
                    if (data['error'] == 1) {
                        myAlert('d', data['message']);
                    } else if (data['error'] == 0) {
                        $("#property_id").val(data['property_id']);
                        $("#property_other_detail").show();
                        $(".remove").click();
                        load_property_images(data['property_id']);
                        myAlert('s', data['message']);
                    }
                },

                uploadProgress: function (event, position, total, percentComplete) {
                    $("#upload-progress").removeClass("hide");
                    var percentVal = percentComplete + '%';
                    $("#upload-progress .bar").width(percentVal);
                    $("#upload_prgress_info").show();
                    $("#upload_prgress_info").html('Uploading ' + percentVal);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    stopLoad();
                    myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)
                }
            }).submit();

        /**$.ajaxForm({
            type: 'POST',
            dataType: 'json',
            contentType: false, // Added
            mimeType: "multipart/form-data", // Added
            processData: false, // Added
            url: "<?php //echo site_url('Property/save_property'); ?>",
            data: $("#from_property").serialize(),
            cache: false,
            beforeSend: function () {
                startLoad();

            },
            uploadProgress: function (event, position, total, percentComplete) {
                $("#upload-progress").removeClass("hide");
                var percentVal = percentComplete + '%';
                $("#upload-progress .bar").width(percentVal);
                $("#upload_prgress_info").show();
                $("#upload_prgress_info").html('Uploading ' + percentVal);

            },
            success: function (data) {
                stopLoad();
                if (data['error'] == 1) {
                    myAlert('d', data['message']);
                } else if (data['error'] == 0) {
                    $("#property_id").val(data['property_id']);
                    $("#property_other_detail").show();
                    myAlert('s', data['message']);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                stopLoad();
                myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)
            }
        });*/
    }


    function submit_aboutus() {

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Masters/submit_aboutus'); ?>",
            data: $("#from_property").serialize(),
            cache: false,
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                myAlert(data[0], data[1]);
                if (data[0] == 's') {
                    $('#bedtypeModal').modal('hide');
                    bed_type_table();

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    }

     function edit_aboutus(id){
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'json',
            data: {'aboutus_id': id},
            url: "<?php echo site_url('Masters/edit_aboutus'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                $('#aboutus_idnn').val(id);
                $('#about_year').val(data['year']);
                $('#about_description').val(data['description']);
                if (data['status'] == 1) {
                    $('#status').attr('checked', true);
                } else {
                    $('#status').attr('checked', false);
                }
                $('#modal_addAboutUs').modal('show');
            }, error: function () {
                swal("Cancelled", "Your file is safe :)", "error");
            }
        });
    }

    function initGalary() {
        /*Gallary */

        var $overflow = '';
        var colorbox_params = {
            rel: 'colorbox',
            reposition: true,
            scalePhotos: true,
            scrolling: false,
            previous: '<i class="ace-icon fa fa-arrow-left"></i>',
            next: '<i class="ace-icon fa fa-arrow-right"></i>',
            close: '&times;',
            current: '{current} of {total}',
            maxWidth: '100%',
            maxHeight: '100%',
            onOpen: function () {
                $overflow = document.body.style.overflow;
                document.body.style.overflow = 'hidden';
            },
            onClosed: function () {
                document.body.style.overflow = $overflow;
            },
            onComplete: function () {
                $.colorbox.resize();
            }
        };

        $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
        $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon

    }

    function load_property(id) {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Property/load_property'); ?>",
            data: {id: id},
            cache: false,
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                if (data['error'] == 0) {
                    $("#modal_addManageProperty").modal('show');
                    if (data['output']['longitude'] != "" && data['output']['latitude'] != "") {
                        initialize_map(data['output']['latitude'], data['output']['longitude']);
                    } else {
                        initialize_map(23.5838, 58.3887);
                    }

                    /*console.log(data['output']);
                     return false;*/
                    $("#property_id").val(data['output']['property_id']);
                    $("#property_type_id").val(data['output']['property_type_id']).change();
                    $("#city_id").val(data['output']['city_id']).change();
                    $("#bed_type_id").val(data['output']['bed_type_id']).change();
                    $("#furniture_type_id").val(data['output']['furniture_type_id']).change();
                    $("#category_type_id").val(data['output']['category_type_id']).change();
                    $("#agent_id").val(data['output']['agent_id']).change();
                    $("#property_name").val(data['output']['property_name']);
                    $("#description").val(data['output']['description']);
                    $("#property_price").val(data['output']['property_price']);
                    $("#area").val(data['output']['area']);
                    $("#rent_duration").val(data['output']['rent_duration']);
                    $("#property_address").val(data['output']['property_address']);
                    $("#telephone_number").val(data['output']['telephone_number']);
                    $("#mobile_number").val(data['output']['mobile_number']);
                    $("#permit_No").val(data['output']['permit_No']);
                    $("#reference").val(data['output']['reference']);
                    $("#long").val(data['output']['longitude']);
                    $("#lat").val(data['output']['latitude']);
                    $("#property_other_detail").show();
                    $("#property_other_detail").show();
                    fetch_property_amenities_details();
                    load_property_images(data['output']['property_id']);
                    $(".chosen-select").trigger("chosen:updated");
                } else if (data['error'] == 1) {
                    myAlert('e', data['message']);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                stopLoad();
                myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)
            }
        });
    }

    function load_property_images(id) {
        var path = '<?php echo base_url('uploads/')?>';
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('Property/load_property_images'); ?>",
            data: {id: id},
            cache: false,
            beforeSend: function () {
                startLoad();
                $("#imagesSetList").empty();

            },
            success: function (data) {
                stopLoad();
                if (data['error'] == 0) {

                    $.each(data['output'], function (key, value) {
                        var imglink = value['image_link'];
                        var htmlSet = '<li> <a href="' + path + imglink + '" title="Photo Title" data-rel="colorbox"> <img style="max-height: 100px; max-width: 100px" alt="150x150" src="' + path + imglink + '"/> </a>  <div class="tools"> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div> </li>';
                        $("#imagesSetList").append(htmlSet);

                    });
                    initGalary();
                } else if (data['error'] == 1) {

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                stopLoad();
                myAlert('e', jqXHR + ' ' + textStatus + ' ' + errorThrown)
            }
        });
    }

    function clearProperty() {
        $("#property_id").val(0);
        $("#property_type_id").val('').change();
        $("#bed_type_id").val('').change();
        $("#furniture_type_id").val('').change();
        $("#category_type_id").val(1).change();
        $("#property_name").val('');
        $("#description").val('');
        $("#property_price").val('');
        $("#area").val('');
        $("#rent_duration").val('');
        $("#property_address").val('');
        $("#telephone_number").val('');
        $("#mobile_number").val('');
        $("#permit_No").val('');
        $("#reference").val('');
        $("#property_other_detail").hide();
        $(".chosen-select").trigger("chosen:updated");
    }

    function amenities_assign_model() {
        selectedItemsSync = [];
        load_property_amenities_table();
        $('#modal_assignAmenities').modal('show');
    }

    function load_property_amenities_table() {
        $('#amenities_sync').DataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bDestroy": true,
            "StateSave": true,
            "sAjaxSource": "<?php echo site_url('Property/fetch_property_amenities'); ?>",
            "aaSorting": [[0, 'desc']],
            "fnInitComplete": function () {
            },
            "fnDrawCallback": function (oSettings) {
                $("[rel=tooltip]").tooltip();
                var tmp_i = oSettings._iDisplayStart;
                var iLen = oSettings.aiDisplay.length;
                var x = 0;
                for (var i = tmp_i; (iLen + tmp_i) > i; i++) {
                    $('td:eq(0)', oSettings.aoData[oSettings.aiDisplay[x]].nTr).html(i + 1);
                    x++;
                }
                $('.item-iCheck').iCheck('uncheck');
                if (selectedItemsSync.length > 0) {
                    $.each(selectedItemsSync, function (index, value) {
                        $("#selectItem_" + value).iCheck('check');
                    });
                }
                $('.extraColumns input').iCheck({
                    checkboxClass: 'icheckbox_square_relative-purple',
                    radioClass: 'iradio_square_relative-purple',
                    increaseArea: '20%'
                });
                $('input').on('ifChecked', function (event) {
                    ItemsSelectedSync(this);
                });
                $('input').on('ifUnchecked', function (event) {
                    ItemsSelectedSync(this);
                });
            },
            "aoColumns": [
                {"mData": "amenityAutoid"},
                {"mData": "name"},
                {"mData": "edit"}
            ],
            "fnServerData": function (sSource, aoData, fnCallback) {
                aoData.push({"name": "property_id", "value": $('#property_id').val()});
                $.ajax({
                    'dataType': 'json',
                    'type': 'POST',
                    'url': sSource,
                    'data': aoData,
                    'success': fnCallback
                });
            }
        });
    }

    function ItemsSelectedSync(item) {
        var value = $(item).val();
        if ($(item).is(':checked')) {
            var inArray = $.inArray(value, selectedItemsSync);
            if (inArray == -1) {
                selectedItemsSync.push(value);
            }
        }
        else {
            var i = selectedItemsSync.indexOf(value);
            if (i != -1) {
                selectedItemsSync.splice(i, 1);
            }
        }
    }


    function add_property_amenities() {
        var property_id = $('#property_id').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url("Property/assign_property_amenities"); ?>',
            dataType: 'json',
            data: {'selectedItemsSync': selectedItemsSync, 'property_id': property_id},
            async: false,
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                stopLoad();
                myAlert(data[0], data[1]);
                if (data[0] == 's') {
                    fetch_property_amenities_details();
                    $("#modal_assignAmenities").modal('hide');
                    $('.extraColumns input').iCheck('uncheck');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {

            }
        });
    }

    function fetch_property_amenities_details() {
        var property_id = $('#property_id').val();
        $.ajax({
            async: true,
            type: 'post',
            dataType: 'html',
            data: {property_id: property_id},
            url: "<?php echo site_url('Property/load_property_amenities_details'); ?>",
            beforeSend: function () {
                startLoad();
            },
            success: function (data) {
                $('#div_amenities_added').html(data);
                stopLoad();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                stopLoad();
                myAlert('e', '<br>Message: ' + errorThrown);
            }
        });
    }

    function delete_property_amenties(id) {
        swal({
            title: 'Are you sure',
            text: 'You want to delete this ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.value
            ) {
                $.ajax({
                    async: true,
                    type: 'post',
                    dataType: 'json',
                    data: {'amenities_detail_id': id},
                    url: "<?php echo site_url('Property/delete_property_amenities_details'); ?>",
                    beforeSend: function () {
                        startLoad();
                    },
                    success: function (data) {
                        stopLoad();
                        if (data == true) {
                            myAlert('s', 'Deleted Successfully');
                            fetch_property_amenities_details();
                        } else {
                            myAlert('e', 'Deletion Failed');
                        }

                    }, error: function () {
                        swal("Cancelled", "Your file is safe :)", "error");
                    }
                });
                // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            }
            else if (result.dismiss === 'cancel') {
                swal(
                    'Cancelled',
                    'Your record is safe :)',
                    'error'
                )
            }
        })
    }

    function set_reference(){

      //   var x = $( "#agent_id option:selected" ).text();
     //    var first_letter = x.charAt(0);
       //  var second_letter = x.charAt(1);
      //   var third_letter = x.charAt(2);
      //   var part1 = first_letter+second_letter+third_letter ;  // Get first 3 letters from selected Agent name
      /*   var ss = $("#agent_id").attr("data-id");
         console.log(ss);
         $("#reference").val("Dolly Duck");*/
    }

</script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/spinbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/daterangepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.knob.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/autosize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.inputlimiter.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-tag.min.js"></script>
<script src="<?php echo base_url(); ?>assets/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap-fileupload/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

<!-- ace scripts -->
<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {


        if (!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect: true});
            //resize the chosen on window resize

            $(window)
                .off('resize.chosen')
                .on('resize.chosen', function () {
                    $('.chosen-select').each(function () {
                        var $this = $(this);
                        $this.next().css({'width': $this.parent().width()});
                    })
                }).trigger('resize.chosen');
            //resize chosen on sidebar collapse/expand


        }


    });
</script>
