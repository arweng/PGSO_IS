<?php 
include_once 'authentication.php';
$sub="equipments";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Fill Equipment | Equipment</title>
		
		<!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <body class="fixed-left" ng-app="equipments" ng-controller="equipmentCtrl" account-profile>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                    <a href="index.php" class="logo"><i class="icon-c-logo"><img src="images/logo/pgso_logo_2.png" width="50" height="50"> </i><span><i><img class="company-logo" src="images/logo/pgso_logo_1.png" width="65" height="65"></i></span></a>

                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <!-- <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="icon-bell"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                </li> -->
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{accountProfile.picture}}" alt="user-img" class="img-circle"> {{accountProfile.fullname}} </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="profile-setting.php"><i class="ti-settings m-r-5"></i> Settings</a></li>
                                        <li><a href="javascript:;" logout-account><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    </ul>
                                </li>
                               
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft" style="overflow: hidden; width: auto; height: 704px;">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{accountProfile.picture}}" alt="user-img" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{accountProfile.fullname}}</a>
                            <p class="text-muted m-0">{{accountProfile.account_type}}</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                            <?php require_once'main-menu-navigation.php'?>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->


            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
						<div class="row">
							<div class="col-lg-12">
							   <div class = "x_content" id="x_content"> </div> <!-- it will display here -->
							</div>
						</div>
                    </div> <!-- container -->
                </div> <!-- content -->

                <footer class="footer text-right">
                   Copyright &copy; <?php echo date("Y"); ?>
                </footer>

            </div>
        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/plugins/peity/jquery.peity.min.js"></script>
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>


        <!-- jQuery  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>
        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
        <script src="assets/pages/jquery.dashboard.js"></script>
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script src="assets/js/bootbox.min.js"></script>
        <script src="modules/growl/jquery.bootstrap-growl.js"></script>
        
        <!-- blockui -->
        <script src="dist/jspdf.min.js"></script>
        <script src="dist/jspdf.debug.js"></script>
        <script src="dist/jspdf.plugin.autotable.js"></script>	
        
		<script src="modules/blockui/jquery.blockUI.js"></script>
	
        <!-- Angular  -->
        <script src="angular/angular.min.js"></script>
        <script src="modules/fullscreen.js"></script>
		<script src="modules/blockui/blockui.js"></script>
        <script src="modules/bootstrap-modal.js"></script>
        <script src="modules/validation/validate.js"></script>
        <script src="modules/growl/growl.js"></script>
        <script src="modules/account.js"></script>
        <script src="modules/equipment_new.js"></script>
        <script src="controllers/equipment.js"></script>


    </body>
</html>