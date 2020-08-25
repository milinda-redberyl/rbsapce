<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="description" content="<?php echo meta_description() ?>">

    <meta name="author" content="<?php echo sys_name(); ?>">

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>

    <meta http-equiv="Pragma" content="no-cache"/>

    <meta http-equiv="Expires" content="0"/>

    <link rel="icon" href="<?php echo base_url('assets/system/') ?>favicon.ico">

    <title><?php echo isset($title) ? $title : sys_name(); ?></title>



    <!-- Bootstrap core CSS -->

    <link href="<?php echo base_url('assets/system/') ?>css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/system/') ?>css/bootstrap.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/system/') ?>css/owl.carousel.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/system/') ?>css/owl.theme.default.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/system/') ?>css/bootstrap-select.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/system/') ?>css/hover.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/system/') ?>css/animate.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <link href="<?php echo base_url('assets/system/') ?>css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/xeditable/') ?>css/bootstrap-editable.css" rel="stylesheet">

    <link href='<?php echo base_url('assets/css/') ?>tabulous.css' rel='stylesheet' type='text/css'>

    <link href='<?php echo base_url('assets/system/css/') ?>pignose.calendar.css' rel='stylesheet' type='text/css'>



    <style>



        .p-txt {

            position: relative;

            font-family: sans-serif;

            text-transform: uppercase;

            font-size: 5em;

            letter-spacing: 4px;

            overflow: hidden;

            background: linear-gradient(90deg, #000, #fff, #f1c40f);

            background-repeat: no-repeat;

            background-size: 80%;

            animation: animate 3s linear infinite;

            -webkit-background-clip: text;

            -webkit-text-fill-color: rgba(255, 255, 255, 0);

        }



        @keyframes animate {

            0% {

                background-position: -500%;

            }

            100% {

                background-position: 500%;

            }

        }

    </style>





    <!-- Custom styles for this template -->

    <link href="<?php echo base_url('assets/system/') ?>css/style.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/system/') ?>css/jquery.mCustomScrollbar.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/toastr/build/toastr.min.css"/>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweetalert/dist/sweetalert2.min.css">

    <!--<link href="<?php /*echo base_url(); */ ?>assets/select2/css/select2.min.css"/>-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->

    <!--[if lt IE 9]>

    <script src="<?php echo base_url('assets/system/') ?>js/ie8-responsive-file-warning.js"></script><![endif]-->

    <script src="<?php echo base_url('assets/system/') ?>js/ie-emulation-modes-warning.js"></script>

    <script src="<?php echo base_url('assets/system/') ?>js/jquery.min.js"></script>

    <!--<script src="<?php /*echo base_url('assets/system/') */ ?>js/parallax.min.js"></script>-->



    <!-- AM CHART -->

    <script src="<?php echo base_url('assets/system/') ?>js/amcharts.js"></script>

    <script src="<?php echo base_url('assets/system/') ?>js/serial.js"></script>

    <script src="<?php echo base_url('assets/system/') ?>js/export.min.js"></script>

    <link href="<?php echo base_url('assets/system/') ?>css/export.css" rel="stylesheet">

    <script src="<?php echo base_url('assets/system/') ?>js/light.js"></script>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>



<body>

