<?php 
include_once 'authentication.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>PGSO Inventory System</title>

        <!--Morris Chart CSS -->
		 <link rel="stylesheet" href="assets/plugins/morris/morris.css">

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

    <body class="fixed-left" ng-app="dashboard" ng-controller="dashboardCtrl" account-profile>

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

                          <!--   <form role="search" class="navbar-left app-search pull-left hidden-xs">
			                     <input type="text" placeholder="Search..." class="form-control">
			                     <a href=""><i class="fa fa-search"></i></a>
			                </form> -->


                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="icon-bell"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{accountProfile.picture}}" alt="user-img" class="img-circle"></a>
                                    
                                    <ul class="dropdown-menu">

                                        <li><a href="#"><i class="ti-settings m-r-5"></i> Settings</a></li>
                                        <li><a href="javascript:;" logout-account><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <br>
                                    <span style="color: white;">{{accountProfile.fullname}}</span>
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
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                         <ul>
                                <!-- <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{accountProfile.picture}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{accountProfile.fullname}}</h2>
				<h6 class="text-default">{{accountProfile.account_type}}</h6>
              </div>
            </div> -->
                            <br>
                            <li class="text-muted menu-title">Navigation</li>


                            <li><a href="index.php" class="waves-effect active"><i class="ti-home active"></i><span> Dashboard </span></a>
                            </li>
                            <li class="has_sub" ng-show="accountProfile.pages_access.equipment.value">
                                <a href="Equipments.php" class="waves-effect"><i class="ti-write"></i>Equipment<span class="label label-success pull-right">5</span></a>
                                <ul class="list-unstyled">
                                    <li><a href="fill_equipment.php" class="waves-effect">Fill in Equipment</a></li>
                                    <li><a href="ackreciept.php">Acknowledgement Receipt</a></li>
                                    <li><a href="javascript:;">Return Slip</a></li>
                                    <li><a href="javascript:;">Re-property Acknowledgement Reciept</a></li>
                                    <li><a href="javascript:;">Track Property</a></li>
                                </ul>
                            </li>
                            <li class="has_sub" ng-show="accountProfile.pages_access.report.value">
                                <a href="#" class="waves-effect"><i class="ti-files"></i>Report<span class="label label-success pull-right">6</span></a>
                                <ul class="list-unstyled">
                                    <li><a href="PAR_report.php">Property Acknowledgement Receipt</a></li>
                                    <li><a href="returnSlip_report.php">Property Return Slip</a></li>
                                    <li><a href="javascript:;">Inventory of Equipment</a></li>
                                    <li><a href="javascript:;">Summary of Newly Acquired Equipment</a></li>
                                    <li><a href="javascript:;">Inventory Reconcilation Under Property, Plant And Equipment</a></li>
                                    <li><a href="javascript:;">Property, Plant and Equipment Schedule</a></li>

                                </ul>
                            </li>
                            <li class="has_sub" ng-show="accountProfile.pages_access.maintenance.value">
                                <a href="#" class="waves-effect"><i class="ti-files"></i>Maintenance<span class="label label-success pull-right">9</span></a>
                                <ul class="list-unstyled">
                                    <li><a href="brand.php">Brand</a></li>
                                    <li><a href="classification.php">Classification</a></li>
                                    <li><a href="model.php">Model</a></li>
                                    <li><a href="personnel.php">Personnel</a></li>
                                    <li><a href="department.php">Department</a></li>
                                    <li><a href="units.php">Units</a></li>
                                    <li><a href="type.php">Type</a></li>
                                    <li><a href="supply.php">Supplier</a></li>
                                    <li><a href="accountable.php">Accountable Officer</a></li>
                                </ul>
                            </li>
                            <li class="has_sub active" ng-show="accountProfile.pages_access.security.value">
                                <a href="#"><i class="ti ti-key"></i>Security<span class="label label-success pull-right">4</span></a>
                                <ul class="list-unstyled">
                                    <!-- <li><a href="javascript:;">Users</a></li> -->
                                    <li><a href="group.php">Group</a></li>
                                    <li><a href="javascript:;">Users</a></li>
                                    <li><a href="javascript:;">Audit Trail</a></li>
                                </ul>
                            </li>
                        </ul>
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
                            <div class="col-sm-12">
                                <h4 class="page-title">Dashboard</h4>
                                <p class="text-muted page-title-alt">Welcome to System</p>
                            </div>
                        </div>
						
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<div class="row">
										<div class="col-md-6">
											<div class = "content"> </div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- row -->
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
		
		<!-- Angular  -->
		<script src="angular/angular.min.js"></script>
		<script src="modules/fullscreen.js"></script>
		<script src="modules/bootstrap-modal.js"></script>
		<script src="modules/account.js"></script>
		<script src="controllers/dashboard.js"></script>



    </body>
</html>