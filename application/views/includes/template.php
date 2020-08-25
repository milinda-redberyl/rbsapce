<?php
/**
 * Project : AMLAK
 * Author : Mohamed Shafri
 * Created on 2018-01-23
 * Description : This template is custom made structure of above author made it to Codeigniter 3
 *
 * STRUCTURE OF THE CODE
 * =====================================================
 *
 * - header
 *      - title
 *      - libraries ( CSS & JS )
 * - top-navigation
 *      - includes/notification-link (hidden)
 *      - Logout & Menus
 * - navigation
 *      - includes/nav-menus
 *      - includes/breadcrumbs-search
 *      - includes/inc-settings (setup CSS styles)
 *      - PAGE CONTENT
 *      - includes/bottom-bar (copy right bar)
 * - includes/footer (JS Libraries)
 *
 * ======================================================
 *
 */


$this->load->helper('cookie');
$this->load->view('includes/header',$title);
$this->load->view('includes/top-navigation',$title);
$this->load->view('includes/navigation',$title);
/*content loaded inside navigation*/
$this->load->view('includes/footer');
