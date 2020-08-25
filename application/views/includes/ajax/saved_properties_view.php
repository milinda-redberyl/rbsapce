<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                <i class="fa fa-heart tc-1" aria-hidden="true"></i> Saved properties
            </a>
        </li>
        <?php
        if ($this->session->userdata('save_')) {
            $save_properties = $this->session->userdata('save_');
            //print_r($save_properties);
            foreach ($save_properties as $save_property) {
                if($save_property['category_type_id'] == "7"){
                    $url_pro = base_url() . 'project/' . $save_property['property_id'];
                } else{
                    $url_pro = base_url() . 'overview/' . $save_property['property_id'];
                }
                ?>
                <a href="<?php echo $url_pro; ?>">
                    <li>
                        <div class="row">
                            <div class="col-md-12 sliding-set hov-row">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?php echo $save_property['image_link']; ?>"
                                             width="50">
                                    </div>
                                    <div class="col-md-8">
                                        <p class="slide_propertytitle"><?php echo $save_property['property_name']; ?></p>
                                        <p class="slide_propertyprice">
                                            OMR <?php echo $save_property['property_price']; ?></p>
                                        <div class="card1_closebtn" style="display: none;">
                                            <button type="button" class="popup-close  close-i" data-dismiss="modal"
                                                    aria-label="Close"><img
                                                        src="<?php echo base_url('assets/system/') ?>images/close.png"
                                                        alt="Image" width="10"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </a>
                <?php
            }
        }
        ?>
    </ul>

</nav>