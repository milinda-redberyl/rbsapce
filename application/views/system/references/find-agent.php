
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Bait</title>

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

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/system/') ?>css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo base_url('assets/system/') ?>js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url('assets/system/') ?>js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Navbar -->
<div class="menu">
    <nav class="navbar navbar-default">
        <div class="container menu-container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <div class="logo"><a href="index.html"><img src="<?php echo base_url('assets/system/') ?>images/amlak-logo.png" alt="Amlak Logo"></a></div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">BUY</a></li>
                    <li><a href="#">RENT</a></li>
                    <li><a href="#">COMMERCIAL</a></li>
                    <li><a href="#">FIND AGENT</a></li>
                    <li><a href="#">NEW PROJECTS</a></li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MORE <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><img src="<?php echo base_url('assets/system/') ?>images/icon-lock.png" alt="Icon"> Login</a></li>
                    <li><a href="#"><img src="<?php echo base_url('assets/system/') ?>images/icon-user.png" alt="Icon"> Register</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
</div>
<div class="ins-search-wrap">
    <div class="container">
        <div class="hm-search-form">
            <div class="agent-tb-nav">
                <h1>Great agents find great properties.</h1>
                <ul class="tb-nav" role="tablist">
                    <li role="presentation" class="active"><a href="#tb-agents" data-target="#tb-agents, #tb-agents-list" aria-controls="tb-agents" role="tab" data-toggle="tab">agents</a>
                    </li>
                    <li role="presentation"><a href="#tb-companies" data-target="#tb-companies, #tb-companies-list" aria-controls="tb-companies" role="tab" data-toggle="tab">companies</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tb-agents">
                    <div class="row search-row">
                        <div class="col-md-12 col-sm-6 col-xs-12 search-padd">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter location agent name">
                                    <div class="input-group-btn">
                                        <button class="btn btn-search" type="submit"><span>FIND</span> <img src="<?php echo base_url('assets/system/') ?>images/icon-search.png" alt="Search"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 search-padd">
                            <div class="form-group">
                                <select class="selectpicker show-tick form-control">
                                    <option>Services Needed</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 search-padd">
                            <div class="form-group">
                                <select class="selectpicker show-tick form-control">
                                    <option>Languages</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 search-padd">
                            <div class="form-group">
                                <select class="selectpicker show-tick form-control">
                                    <option>Nationality</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tb-companies">
                    <div class="row search-row">
                        <div class="col-md-12 col-sm-6 col-xs-12 search-padd">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter location companies name">
                                    <div class="input-group-btn">
                                        <button class="btn btn-search" type="submit"><span>FIND</span> <img src="<?php echo base_url('assets/system/') ?>images/icon-search.png" alt="Search"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 search-padd">
                            <div class="form-group">
                                <select class="selectpicker show-tick form-control">
                                    <option>Services Needed</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 search-padd">
                            <div class="form-group">
                                <select class="selectpicker show-tick form-control">
                                    <option>Languages</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 search-padd">
                            <div class="form-group">
                                <select class="selectpicker show-tick form-control">
                                    <option>Nationality</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container wow fadeIn">
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="tb-agents-list">
            <div class="agent-tb-cover">
                <div class="agent-tb-hd">
                    <div class="col-md-6 col-xs-12">
                        <div class="agent-heading">
                            <h2>Our Top Agents</h2>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="bk-link"><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Search</a></div>
                    </div>
                </div>
                <div class="agent-tab-cont">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-agent-cover">
                            <div class="list-agent-img">
                                <img src="<?php echo base_url('assets/system/') ?>images/agent-img-01.jpg" alt="Logo">
                            </div>
                            <div class="list-agent-dtls">
                                <h3 class="agent-nm">Michale Suttherland</h3>
                                <h4 class="agent-des">Selling agent</h4>
                                <ul>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Phone: +968 24499537</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Mobile: +968 96122448</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Email: melody@amlak.com</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-skype" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Skype: john.doe</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-agent-view">
                                <a href="#">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-agent-cover">
                            <div class="list-agent-img">
                                <img src="<?php echo base_url('assets/system/') ?>images/agent-img-02.jpg" alt="Logo">
                            </div>
                            <div class="list-agent-dtls">
                                <h3 class="agent-nm">Michale Suttherland</h3>
                                <h4 class="agent-des">Selling agent</h4>
                                <ul>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Phone: +968 24499537</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Mobile: +968 96122448</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Email: melody@amlak.com</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-skype" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Skype: john.doe</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-agent-view">
                                <a href="#">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-agent-cover">
                            <div class="list-agent-img">
                                <img src="<?php echo base_url('assets/system/') ?>images/agent-img-03.jpg" alt="Logo">
                            </div>
                            <div class="list-agent-dtls">
                                <h3 class="agent-nm">Michale Suttherland</h3>
                                <h4 class="agent-des">Selling agent</h4>
                                <ul>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Phone: +968 24499537</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Mobile: +968 96122448</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Email: melody@amlak.com</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-skype" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Skype: john.doe</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-agent-view">
                                <a href="#">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-agent-cover">
                            <div class="list-agent-img">
                                <img src="<?php echo base_url('assets/system/') ?>images/agent-img-04.jpg" alt="Logo">
                            </div>
                            <div class="list-agent-dtls">
                                <h3 class="agent-nm">Michale Suttherland</h3>
                                <h4 class="agent-des">Selling agent</h4>
                                <ul>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Phone: +968 24499537</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Mobile: +968 96122448</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Email: melody@amlak.com</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-skype" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Skype: john.doe</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-agent-view">
                                <a href="#">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-agent-cover">
                            <div class="list-agent-img">
                                <img src="<?php echo base_url('assets/system/') ?>images/agent-img-05.jpg" alt="Logo">
                            </div>
                            <div class="list-agent-dtls">
                                <h3 class="agent-nm">Michale Suttherland</h3>
                                <h4 class="agent-des">Selling agent</h4>
                                <ul>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Phone: +968 24499537</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Mobile: +968 96122448</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Email: melody@amlak.com</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-skype" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Skype: john.doe</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-agent-view">
                                <a href="#">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-agent-cover">
                            <div class="list-agent-img">
                                <img src="<?php echo base_url('assets/system/') ?>images/agent-img-01.jpg" alt="Logo">
                            </div>
                            <div class="list-agent-dtls">
                                <h3 class="agent-nm">Michale Suttherland</h3>
                                <h4 class="agent-des">Selling agent</h4>
                                <ul>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Phone: +968 24499537</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Mobile: +968 96122448</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Email: melody@amlak.com</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-skype" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Skype: john.doe</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-agent-view">
                                <a href="#">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="agent-more">
                    <a href="#">View all companies</a>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tb-companies-list">
            <div class="agent-tb-cover">
                <div class="agent-tb-hd">
                    <div class="col-md-6 col-xs-12">
                        <div class="agent-heading">
                            <h2>Our Top Companies</h2>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="bk-link"><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Search</a></div>
                    </div>
                </div>
                <div class="agent-tab-cont">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-agent-cover">
                            <div class="list-agent-img">
                                <img src="<?php echo base_url('assets/system/') ?>images/agent-img-01.jpg" alt="Logo">
                            </div>
                            <div class="list-agent-dtls">
                                <h3 class="agent-nm">Michale Suttherland</h3>
                                <h4 class="agent-des">Selling agent</h4>
                                <ul>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Phone: +968 24499537</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Mobile: +968 96122448</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Email: melody@amlak.com</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-skype" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Skype: john.doe</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-agent-view">
                                <a href="#">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-agent-cover">
                            <div class="list-agent-img">
                                <img src="<?php echo base_url('assets/system/') ?>images/agent-img-02.jpg" alt="Logo">
                            </div>
                            <div class="list-agent-dtls">
                                <h3 class="agent-nm">Michale Suttherland</h3>
                                <h4 class="agent-des">Selling agent</h4>
                                <ul>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Phone: +968 24499537</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Mobile: +968 96122448</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Email: melody@amlak.com</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-skype" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Skype: john.doe</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-agent-view">
                                <a href="#">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-agent-cover">
                            <div class="list-agent-img">
                                <img src="<?php echo base_url('assets/system/') ?>images/agent-img-03.jpg" alt="Logo">
                            </div>
                            <div class="list-agent-dtls">
                                <h3 class="agent-nm">Michale Suttherland</h3>
                                <h4 class="agent-des">Selling agent</h4>
                                <ul>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Phone: +968 24499537</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Mobile: +968 96122448</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Email: melody@amlak.com</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-skype" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Skype: john.doe</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-agent-view">
                                <a href="#">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-agent-cover">
                            <div class="list-agent-img">
                                <img src="<?php echo base_url('assets/system/') ?>images/agent-img-04.jpg" alt="Logo">
                            </div>
                            <div class="list-agent-dtls">
                                <h3 class="agent-nm">Michale Suttherland</h3>
                                <h4 class="agent-des">Selling agent</h4>
                                <ul>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Phone: +968 24499537</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Mobile: +968 96122448</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Email: melody@amlak.com</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-skype" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Skype: john.doe</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-agent-view">
                                <a href="#">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-agent-cover">
                            <div class="list-agent-img">
                                <img src="<?php echo base_url('assets/system/') ?>images/agent-img-05.jpg" alt="Logo">
                            </div>
                            <div class="list-agent-dtls">
                                <h3 class="agent-nm">Michale Suttherland</h3>
                                <h4 class="agent-des">Selling agent</h4>
                                <ul>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Phone: +968 24499537</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Mobile: +968 96122448</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Email: melody@amlak.com</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-skype" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Skype: john.doe</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-agent-view">
                                <a href="#">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="list-agent-cover">
                            <div class="list-agent-img">
                                <img src="<?php echo base_url('assets/system/') ?>images/agent-img-01.jpg" alt="Logo">
                            </div>
                            <div class="list-agent-dtls">
                                <h3 class="agent-nm">Michale Suttherland</h3>
                                <h4 class="agent-des">Selling agent</h4>
                                <ul>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Phone: +968 24499537</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Mobile: +968 96122448</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Email: melody@amlak.com</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="section-table">
                                            <div class="section-table-cell icon-info"><i class="fa fa-skype" aria-hidden="true"></i></div>
                                            <div class="section-table-cell">Skype: john.doe</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-agent-view">
                                <a href="#">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="agent-more">
                    <a href="#">View all companies</a>
                </div>
            </div>
        </div>
    </div>

</div>
<footer class="footer-sec ft-inside">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="ft-social">
                    <ul>
                        <li><a href="#" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="twt"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="inst"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="gplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="ytube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="ft-btm-links">
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Client Login</a></li>
                        <li><a href="#">For Brokers</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="ft-apps">
                    <ul>
                        <li><a href="#"><img src="<?php echo base_url('assets/system/') ?>images/app-apple.png" alt="Apple"></a></li>
                        <li><a href="#"><img src="<?php echo base_url('assets/system/') ?>images/app-playstore.png" alt="Apple"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url('assets/system/') ?>js/jquery.min.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url('assets/system/') ?>js/ie10-viewport-bug-workaround.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/owl.carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/system/') ?>js/bootstrap-select.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/wow.js"></script>
<script src="<?php echo base_url('assets/system/') ?>js/main.js"></script>
<script>
    new WOW().init();
</script>
</body>
</html>
