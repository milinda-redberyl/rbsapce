<div id="navbar" class="navbar navbar-default ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="<?php echo base_url() ?>" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    <?php echo sys_name() ?>
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <?php //$this->load->view('includes/notification-link')

                /*echo '<pre>';
                print_r($this->session->all_userdata());
                echo '</pre>';*/

                $empID = "";
                $user_details = "";
                $full_name = "";
                $myProfile = "";
                $UserName = "";
                $profile_pic = base_url() . "assets/images/avatars/profile-pic.jpg";

                if ($this->session->all_userdata()) {
                    $user_data = $this->session->all_userdata();
                    $empID = $user_data['empID'];

                    $user_details_q = "SELECT
                        * 
                    FROM
                        srp_employeesdetails 
                    WHERE
                        srp_employeesdetails.EIdNo = " . $empID;
                    $user_details = $this->db->query($user_details_q)->result_array();

                    $full_name = $user_details[0]['Ename1'];
                    $myProfile = $user_details[0]['myProfile'];
                    $UserName = $user_details[0]['UserName'];
                    if ($user_details[0]['EmpImage'] != "") {
                        $profile_pic = base_url('uploads/agents/' . $user_details[0]['EmpImage']);
                    }
                }

                ?>

                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="<?php echo $profile_pic; ?>"
                             alt="Jason's Photo"/>
                        <span class="user-info">
									<small>Welcome,</small>
                            <?php
                            $empName = $this->session->userdata('empname');
                            echo $empName
                            ?>
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <?php

                        $isSystemAdmin = $this->session->userdata('isSystemAdmin');
                        if ($isSystemAdmin == 1) {
                            ?>

                            <li>
                                <a href="<?php echo site_url('settings') ?>">
                                    <i class="ace-icon fa fa-cog"></i>
                                    Settings
                                </a>
                            </li>

                            <li class="divider"></li>
                        <?php } ?>
                        <li>
                            <a href="<?php echo site_url('profile') ?>">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Login/logout') ?>">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>
<?php
/*$session = $this->session->userdata();
var_dump($session);*/
?>