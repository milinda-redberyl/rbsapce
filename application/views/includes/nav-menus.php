<?php

$isSystemAdmin = $this->session->userdata('isSystemAdmin');

$isAgent = $this->session->userdata('isAgent');

$isCompany = $this->session->userdata('isCompany');

$isPartner = $this->session->userdata('isPartner');

$userStatus = $this->session->userdata('userStatus');

if ($isSystemAdmin == 1 || $isAgent == 1) {

    ?>



    <li>

        <a href="<?php echo site_url('dashboard') ?>">

            <i class="menu-icon fa fa-arrows"></i>

            <span class="menu-text"> Dashboard </span>

        </a>

        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('/') ?>">

            <!--<i class="menu-icon fa fa-home"></i>-->

            <i class="menu-icon fa fa-globe"></i>

            <span class="menu-text">  Website   </span>

        </a>

        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('property') ?>">

            <i class="menu-icon fa fa-home"></i>

            <span class="menu-text">  Property  </span>

        </a>

        <b class="arrow"></b>

    </li>







    <li>

        <a href="<?php echo site_url('new_project_section') ?>">

            <i class="menu-icon fa fa-home"></i>

            <span class="menu-text">  New Projects  </span>

        </a>

        <b class="arrow"></b>

    </li>





<?php }

if ($isCompany == 1) {

    ?>

    <li>

        <a href="<?php echo site_url('dashboard') ?>">

            <i class="menu-icon fa fa-arrows"></i>

            <span class="menu-text"> Dashboard </span>

        </a>

        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('users') ?>">

            <!--<i class="menu-icon fa fa-tachometer"></i>--> <!--<i class="menu-icon  fa fa-puzzle-piece"></i>-->

            <i class="menu-icon fa fa-users"></i>

            <span class="menu-text"> Agents </span>

        </a>



        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('/') ?>">

            <!--<i class="menu-icon fa fa-home"></i>-->

            <i class="menu-icon fa fa-globe"></i>

            <span class="menu-text">  Website   </span>

        </a>

        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('property') ?>">

            <i class="menu-icon fa fa-home"></i>

            <span class="menu-text">  Property  </span>

        </a>

        <b class="arrow"></b>

    </li>



    <?php

}


if ($userStatus == 1 ) {

    ?>

    <li>

        <a href="<?php echo site_url('dashboard') ?>">

            <i class="menu-icon fa fa-arrows"></i>

            <span class="menu-text"> Dashboard </span>

        </a>

        <b class="arrow"></b>

    </li>



<!--    <li>-->
<!---->
<!--        <a href="--><?php //echo site_url('users') ?><!--">-->
<!---->
<!--            <i class="menu-icon fa fa-tachometer"></i>--> <!--<i class="menu-icon  fa fa-puzzle-piece"></i>-->
<!---->
<!--            <i class="menu-icon fa fa-users"></i>-->
<!---->
<!--            <span class="menu-text"> Agents </span>-->
<!---->
<!--        </a>-->
<!---->
<!---->
<!---->
<!--        <b class="arrow"></b>-->
<!---->
<!--    </li>-->



    <li>

        <a href="<?php echo site_url('/') ?>">

            <!--<i class="menu-icon fa fa-home"></i>-->

            <i class="menu-icon fa fa-globe"></i>

            <span class="menu-text">  Website   </span>

        </a>

        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('property') ?>">

            <i class="menu-icon fa fa-home"></i>

            <span class="menu-text">  Property  </span>

        </a>

        <b class="arrow"></b>

    </li> 

    <li>

        <a href="<?php echo site_url('/chat') ?>">

            <!--<i class="menu-icon fa fa-home"></i>-->

            <i class="menu-icon fa fa-comment"></i>

            <span class="menu-text">  Chat   </span>

        </a>

        <b class="arrow"></b>

    </li>



    <?php
    }else if ($userStatus == 2 ) {

    ?>

    <li>

        <a href="<?php echo site_url('dashboard') ?>">

            <i class="menu-icon fa fa-arrows"></i>

            <span class="menu-text"> Dashboard </span>

        </a>

        <b class="arrow"></b>

    </li>
    <li>

        <a href="<?php echo site_url('/') ?>">

            <!--<i class="menu-icon fa fa-home"></i>-->

            <i class="menu-icon fa fa-globe"></i>

            <span class="menu-text">  Website   </span>

        </a>

        <b class="arrow"></b>

    </li>
    <li>

        <a href="<?php echo site_url('/chat') ?>">

            <!--<i class="menu-icon fa fa-home"></i>-->

            <i class="menu-icon fa fa-comment"></i>

            <span class="menu-text">  Chat   </span>

        </a>

        <b class="arrow"></b>

    </li>



    <?php

}else{?>
    <li>

        <a href="<?php echo site_url('/chat') ?>">

            <!--<i class="menu-icon fa fa-home"></i>-->

            <i class="menu-icon fa fa-comment"></i>

            <span class="menu-text">  Chat   </span>

        </a>

        <b class="arrow"></b>

    </li>
<?php }

if ($isSystemAdmin == 1) {

    ?>

    <li>

        <a href="<?php echo site_url('users') ?>">

            <!--<i class="menu-icon fa fa-tachometer"></i>--> <!--<i class="menu-icon  fa fa-puzzle-piece"></i>-->

            <i class="menu-icon fa fa-users"></i>

            <span class="menu-text"> Users</span>

        </a>



        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('category') ?>">

            <i class="menu-icon fa fa-tag"></i>

            <span class="menu-text"> Category Type</span>

        </a>

        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('property_type') ?>">

            <i class="menu-icon fa fa-list"></i>

            <span class="menu-text"> Property Type</span>

        </a>

        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('furniture') ?>">

            <i class="menu-icon fa fa-bars"></i>

            <span class="menu-text"> Furniture Types</span>

        </a>

        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('bed-type') ?>">

            <i class="menu-icon fa fa-bed"></i>

            <span class="menu-text"> Bed Types</span>

        </a>

        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('room-type') ?>">

            <i class="menu-icon fa fa-building"></i>

            <span class="menu-text"> Room Types</span>

        </a>

        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('room-amenities') ?>">

            <i class="menu-icon fa fa-wifi"></i>

            <span class="menu-text"> Room Amenities</span>

        </a>

        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('bathroom-types') ?>">

            <i class="menu-icon fa fa-bullhorn"></i>

            <span class="menu-text"> Bathroom Types</span>

        </a>

        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('country') ?>">

            <i class="menu-icon fa fa-flag"></i>

            <span class="menu-text"> Country</span>

        </a>

        <b class="arrow"></b>

    </li>

    <li>

        <a href="<?php echo site_url('aboutus') ?>">

            <!--<i class="menu-icon fa fa-home"></i>-->

            <i class="menu-icon fa fa-desktop"></i>

            <span class="menu-text">  Manage About Us   </span>

        </a>

        <b class="arrow"></b>

    </li>

    <li>

        <a href="<?php echo site_url('article_manager') ?>">

            <!--<i class="menu-icon fa fa-home"></i>-->

            <i class="menu-icon fa fa-eye"></i>

            <span class="menu-text">  Article Manager   </span>

        </a>

        <b class="arrow"></b>

    </li>

    <li>

        <a href="<?php echo site_url('advertisement_manager') ?>">

            <i class="menu-icon fa fa-arrow-circle-o-right"></i>

            <span class="menu-text">  Adds Manager  </span>

        </a>

        <b class="arrow"></b>

    </li>



    <li>

        <a href="<?php echo site_url('social-media') ?>">

            <i class="menu-icon fa fa-facebook"></i>

            <span class="menu-text">  Social Media Links </span>

        </a>

        <b class="arrow"></b>

    </li>

    <li>

        <a href="<?php echo site_url('review_manager') ?>">

            <i class="menu-icon fa fa-picture-o"></i>

            <span class="menu-text"> Review Manager </span>

        </a>

        <b class="arrow"></b>

    </li> 
    
    



<?php }



?>

<!--

 <li class="">

    <a href="#" class="dropdown-toggle">

        <i class="menu-icon fa fa-desktop"></i>

        <span class="menu-text">

                    UI &amp; Elements

                </span>



        <b class="arrow fa fa-angle-down"></b>

    </a>



    <b class="arrow"></b>



    <ul class="submenu">

        <li class="">

            <a href="#" class="dropdown-toggle">

                <i class="menu-icon fa fa-caret-right"></i>



                Layouts

                <b class="arrow fa fa-angle-down"></b>

            </a>



            <b class="arrow"></b>



            <ul class="submenu">

                <li class="">

                    <a href="top-menu.html">

                        <i class="menu-icon fa fa-caret-right"></i>

                        Top Menu

                    </a>



                    <b class="arrow"></b>

                </li>



                <li class="">

                    <a href="two-menu-1.html">

                        <i class="menu-icon fa fa-caret-right"></i>

                        Two Menus 1

                    </a>



                    <b class="arrow"></b>

                </li>



                <li class="">

                    <a href="two-menu-2.html">

                        <i class="menu-icon fa fa-caret-right"></i>

                        Two Menus 2

                    </a>



                    <b class="arrow"></b>

                </li>



                <li class="">

                    <a href="mobile-menu-1.html">

                        <i class="menu-icon fa fa-caret-right"></i>

                        Default Mobile Menu

                    </a>



                    <b class="arrow"></b>

                </li>



                <li class="">

                    <a href="mobile-menu-2.html">

                        <i class="menu-icon fa fa-caret-right"></i>

                        Mobile Menu 2

                    </a>



                    <b class="arrow"></b>

                </li>



                <li class="">

                    <a href="mobile-menu-3.html">

                        <i class="menu-icon fa fa-caret-right"></i>

                        Mobile Menu 3

                    </a>



                    <b class="arrow"></b>

                </li>

            </ul>

        </li>



        <li class="">

            <a href="typography.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Typography

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="elements.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Elements

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="buttons.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Buttons &amp; Icons

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="content-slider.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Content Sliders

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="treeview.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Treeview

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="jquery-ui.html">

                <i class="menu-icon fa fa-caret-right"></i>

                jQuery UI

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="nestable-list.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Nestable Lists

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="#" class="dropdown-toggle">

                <i class="menu-icon fa fa-caret-right"></i>



                Three Level Menu

                <b class="arrow fa fa-angle-down"></b>

            </a>



            <b class="arrow"></b>



            <ul class="submenu">

                <li class="">

                    <a href="#">

                        <i class="menu-icon fa fa-leaf green"></i>

                        Item #1

                    </a>



                    <b class="arrow"></b>

                </li>



                <li class="">

                    <a href="#" class="dropdown-toggle">

                        <i class="menu-icon fa fa-pencil orange"></i>



                        4th level

                        <b class="arrow fa fa-angle-down"></b>

                    </a>



                    <b class="arrow"></b>



                    <ul class="submenu">

                        <li class="">

                            <a href="#">

                                <i class="menu-icon fa fa-plus purple"></i>

                                Add Product

                            </a>



                            <b class="arrow"></b>

                        </li>



                        <li class="">

                            <a href="#">

                                <i class="menu-icon fa fa-eye pink"></i>

                                View Products

                            </a>



                            <b class="arrow"></b>

                        </li>

                    </ul>

                </li>

            </ul>

        </li>

    </ul>

</li>



<li class="">

    <a href="#" class="dropdown-toggle">

        <i class="menu-icon fa fa-list"></i>

        <span class="menu-text"> Tables </span>



        <b class="arrow fa fa-angle-down"></b>

    </a>



    <b class="arrow"></b>



    <ul class="submenu">

        <li class="">

            <a href="tables.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Simple &amp; Dynamic

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="jqgrid.html">

                <i class="menu-icon fa fa-caret-right"></i>

                jqGrid plugin

            </a>



            <b class="arrow"></b>

        </li>

    </ul>

</li>



<li class="">

    <a href="#" class="dropdown-toggle">

        <i class="menu-icon fa fa-pencil-square-o"></i>

        <span class="menu-text"> Forms </span>



        <b class="arrow fa fa-angle-down"></b>

    </a>



    <b class="arrow"></b>



    <ul class="submenu">

        <li class="">

            <a href="form-elements.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Form Elements

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="form-elements-2.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Form Elements 2

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="form-wizard.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Wizard &amp; Validation

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="wysiwyg.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Wysiwyg &amp; Markdown

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="dropzone.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Dropzone File Upload

            </a>



            <b class="arrow"></b>

        </li>

    </ul>

</li>



<li class="">

    <a href="widgets.html">

        <i class="menu-icon fa fa-list-alt"></i>

        <span class="menu-text"> Widgets </span>

    </a>



    <b class="arrow"></b>

</li>



<li class="">

    <a href="calendar.html">

        <i class="menu-icon fa fa-calendar"></i>



        <span class="menu-text">

                    Calendar



                    <span class="badge badge-transparent tooltip-error" title="2 Important Events">

                        <i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>

                    </span>

                </span>

    </a>



    <b class="arrow"></b>

</li>



<li class="">

    <a href="gallery.html">

        <i class="menu-icon fa fa-picture-o"></i>

        <span class="menu-text"> Gallery </span>

    </a>



    <b class="arrow"></b>

</li>



<li class="">

    <a href="#" class="dropdown-toggle">

        <i class="menu-icon fa fa-tag"></i>

        <span class="menu-text"> More Pages </span>



        <b class="arrow fa fa-angle-down"></b>

    </a>



    <b class="arrow"></b>



    <ul class="submenu">

        <li class="">

            <a href="profile.html">

                <i class="menu-icon fa fa-caret-right"></i>

                User Profile

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="inbox.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Inbox

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="pricing.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Pricing Tables

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="invoice.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Invoice

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="timeline.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Timeline

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="search.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Search Results

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="email.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Email Templates

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="login.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Login &amp; Register

            </a>



            <b class="arrow"></b>

        </li>

    </ul>

</li>



<li class="active open">

    <a href="#" class="dropdown-toggle">

        <i class="menu-icon fa fa-file-o"></i>



        <span class="menu-text">

                    Other Pages



                    <span class="badge badge-primary">5</span>

                </span>



        <b class="arrow fa fa-angle-down"></b>

    </a>



    <b class="arrow"></b>



    <ul class="submenu">

        <li class="">

            <a href="faq.html">

                <i class="menu-icon fa fa-caret-right"></i>

                FAQ

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="error-404.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Error 404

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="error-500.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Error 500

            </a>



            <b class="arrow"></b>

        </li>



        <li class="">

            <a href="grid.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Grid

            </a>



            <b class="arrow"></b>

        </li>



        <li class="active">

            <a href="blank.html">

                <i class="menu-icon fa fa-caret-right"></i>

                Blank Page

            </a>



            <b class="arrow"></b>

        </li>

    </ul>

</li>  -->