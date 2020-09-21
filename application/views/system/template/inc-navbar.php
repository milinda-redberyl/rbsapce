<!-- Navbar -->

<div class="menu">

    <nav class="navbar navbar-default">

        <div class="container menu-container">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"

                        aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>

                </button>

                <div class="logo"><a href="<?php echo base_url() ?>"><img class="grow"

                                src="<?php echo base_url('assets/system/') ?>images/space-envoy-logo-header.png"

                                alt="RB Space" width="180px"></a>

                </div>

            </div>

            <div id="navbar" class="navbar-collapse collapse">

                <ul class="nav navbar-nav">

                    <li><a href="<?php echo site_url('buy') ?>"><?php echo $this->lang->line('buy') ?></a></li>

                    <li><a href="<?php echo site_url('rent') ?>"><?php echo $this->lang->line('rent') ?></a></li>

                    <li><a href="<?php echo site_url('commercial') ?>"><?php echo $this->lang->line('commercial') ?></a></li>

                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                        <?php echo $this->lang->line('space') ?>

                            <span class="caret"></span>

                        </a>

                        <ul class="dropdown-menu menu_drop_bg profile_sec" style="border-radius: 0px;">

                            <li>

                                <a href="<?php echo site_url('find-space') ?>">

                                <?php echo $this->lang->line('find_space') ?>

                                </a>

                            </li>

                            <li>

                                <a href="<?php echo site_url('list-space') ?>">

                                <?php echo $this->lang->line('list_space') ?>

                                </a>

                            </li>

                        </ul>

                    </li>

                    <li><a href="<?php echo site_url('customer_login') ?>"><?php echo $this->lang->line('customer_register') ?></a></li>


                    <li><a href="<?php echo site_url('partner_login') ?>"><?php echo $this->lang->line('partner_register') ?></a></li>


                    <!--<li><a href="<?php echo site_url('project') ?>">NEW PROJECTS</a></li>-->

                    <li>



                        <div class="dropdown">

                            <button class="dropbtn"><?php echo $this->lang->line('more') ?> <span class="caret"></span></button>

                            <div class="dropdown-content">

                                <img class="menu_dropdownimg"

                                     src="<?php echo base_url('assets/system/') ?>images/blog.jpg" alt="">

                                <a href="<?php echo site_url('blog') ?>"><?php echo $this->lang->line('blog') ?></a>

                            </div>

                        </div>



                    </li>



                    <!-- Add Property Part-->

                    <?php



                    if ($this->session->userdata('empname')) {
                        if(2==$this->session->userdata('userStatus')){
                        ?>

                        <li><a href="<?php echo site_url('chat') ?>"> <i class="fa fa-home"></i> MY PROPERTY</a>

                        </li>

                        <?php
                        }else{
                            ?>
                            <li><a href="<?php echo site_url('property') ?>"> <i class="fa fa-home"></i> MY PROPERTY</a>

                            </li>

                            <?php
                        }
                    } ?>

                    <!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"

                                            aria-haspopup="true" aria-expanded="false">MORE <span class="caret"></span></a>

                        <ul class="dropdown-menu">

                            <li><a href="#">Action</a></li>

                            <li><a href="#">Another action</a></li>

                            <li><a href="#">Something else here</a></li>

                            <li><a href="#">Separated link</a></li>

                            <li><a href="#">One more separated link</a></li>

                        </ul>

                    </li>-->

                </ul>

                <ul class="nav navbar-nav navbar-right">

                    <?php



                    if ($this->session->userdata('empname')) {

                        ?>

                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" style="padding: 31px;"

                               aria-haspopup="true" aria-expanded="false">

                                <img class="nav-user-photo" width="25px"

                                     src="<?php echo base_url('assets/system/') ?>images/icon-user.png"

                                     alt="<?php echo $this->session->userdata('empname') ?> Photo">

                                <?php //echo $this->session->userdata('empname') ?>

                                <span class="caret"></span>

                            </a>

                            <ul class="dropdown-menu menu_drop_bg profile_sec" style="border-radius: 0px;">

                                <?php if (isAgent()) { ?>

                                    <li>

                                        <a href="<?php

                                        $user = current_userID();

                                        echo site_url('agentOverview/' . $user . '/1')

                                        ?>">

                                            <i class="fa fa-user"></i>

                                            My profile

                                        </a>

                                    </li>

                                <?php } ?>

                                <li>

                                    <a href="<?php echo site_url('Login/logout') ?>">

                                        <i class="ace-icon fa fa-power-off"></i>

                                        Logout

                                    </a>

                                </li>

                            </ul>

                        </li>



                        <?php

                    } else {

                        ?>

                        <li><a href="#" type="button" data-toggle="modal" data-target="#loginModal" class="login login-btn-n">

                                <i class="fa fa-lock"></i> <?php echo $this->lang->line('header_login_btn') ?></a>

                        </li>
						
						<li style="margin-top: 23px;margin-left: 5px;">
							<div class="dropdown dropdown-set">
								<button class="btn dropdown-toggle" type="button" data-toggle="dropdown"><img src="https://media.flaticon.com/dist/min/img/flags/en.svg" class="mg-right-lv2" style="width: 16px;"> English
								<span class="caret"></span></button>
								<ul class="dropdown-menu dropdown-menu-set">
								  <li><a href="<?php echo base_url('lang?lang=english') ?>"><img src="https://image.flaticon.com/icons/svg/197/197484.svg" class="mg-right-lv2" style="width: 16px;"> English</a></li>
								  <li><a href="<?php echo base_url('lang?lang=danish') ?>"><img src="https://image.flaticon.com/icons/svg/197/197565.svg" class="mg-right-lv2" style="width: 16px;"> Danish</a></li></ul>
							  </div>
						</li>

                        <!-- <li><a href="#" type="button" data-toggle="modal" data-target="#registerModal"

                               class="login"><img src="<?php // echo base_url('assets/system/') ?>images/icon-user.png"

                                                  alt="Icon"> Register1</a></li> -->

                        <?php

                    }

                    ?>



                </ul>

            </div>

            <!--/.nav-collapse -->

        </div>

    </nav>

</div>





<!--slide nav-collapse start-->

<div id="wrapper">

    <div class="overlay"></div>

    <!-- Sidebar -->



    <div id="saved_pro"></div>



    <div id="saved_pro_hide">

        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">

            <ul class="nav sidebar-nav">

                <li class="sidebar-brand">

                    <a href="#">

                        <i class="fa fa-heart tc-1" aria-hidden="true"></i> <?php echo $this->lang->line('Saved_properties') ?>

                    </a>

                </li>

                <?php

                if ($this->session->userdata('save_')) {

                    $save_properties = $this->session->userdata('save_');

                    foreach ($save_properties as $save_property) {

                        $url_pro = base_url() . 'overview/' . $save_property['property_id'];

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

                                                    <button type="button" class="popup-close  close-i"

                                                            data-dismiss="modal"

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

    </div>

    <!-- /#sidebar-wrapper -->



    <!-- Page Content -->

    <div id="page-content-wrapper">

        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">

            <span class="hamb-top"></span>

            <span class="hamb-middle"></span>

            <span class="hamb-bottom"></span>

        </button>

    </div>

</div>



<!--slide nav-collapse end -->





<script type="text/javascript">

    $(document).ready(function () {

        var trigger = $('.hamburger'),

            overlay = $('.overlay'),

            isClosed = false;



        trigger.click(function () {

            hamburger_cross();

        });



        function hamburger_cross() {



            if (isClosed == true) {

                overlay.hide();

                trigger.removeClass('is-open');

                trigger.addClass('is-closed');

                isClosed = false;

            } else {

                overlay.show();

                trigger.removeClass('is-closed');

                trigger.addClass('is-open');

                isClosed = true;

            }

        }



        $('[data-toggle="offcanvas"]').click(function () {

            $('#wrapper').toggleClass('toggled');

        });

    });

</script>


