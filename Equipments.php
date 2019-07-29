<?php include_once 'authentication.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Ubold - Responsive Admin Dashboard Template</title>

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
    <body class="fixed-left" ng-app="equipments" ng-controller="equipmentCtrl" account-profile>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.php" class="logo"><i class="icon-magnet icon-c-logo"></i><span><img class="company-logo" src="images/logo/pgso_logo_1.png" width="70" height="70"></i></span></a>
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

                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                 <input type="text" placeholder="Search..." class="form-control">
                                 <a href=""><i class="fa fa-search"></i></a>
                            </form>


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
                                    <!-- <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{accountProfile.picture}}" alt="user-img" class="img-circle"> </a> -->
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="ti-settings m-r-5"></i> Settings</a></li>
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
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                            <li class="text-muted menu-title">Navigation</li>
                            <li class="has_sub">
                                <li><a href="index.php" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                                </li>
                                <li class="has_sub"><a href="Equipments.php" class="waves-effect active"><i class="ti-file"></i><span>Equipment</span></a>   
                                </li>
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
                                <h4 class="page-title">Equipment</h4>
                                <p class="text-muted page-title-alt">Welcome to System</p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs"> 
                                    <li class="active"> 
                                        <a href="#add_form" data-toggle="tab" aria-expanded="false">
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">Add Form</span> 
                                        </a> 
                                    </li> 
                                    <li class=""> 
                                        <a href="#temp_2" data-toggle="tab" aria-expanded="true"> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">Acknowledgement Reciept</span> 
                                        </a> 
                                    </li> 
                                    <li class=""> 
                                        <a href="#temp_3" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                            <span class="hidden-xs">Return Slip</span> 
                                        </a> 
                                    </li> 
                                    <li class=""> 
                                        <a href="#temp_4" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                            <span class="hidden-xs">Re-property Acknowledgement Reciept</span> 
                                        </a> 
                                    </li>
                                    <li class=""> 
                                        <a href="#temp_5" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                            <span class="hidden-xs">Track Property</span> 
                                        </a> 
                                    </li> 
                                </ul>
                                <div class="card-box">

                                    <div class="tab-content">
                                        <!-- INFORMATION HERE -->
                                        <div class="tab-pane active" id="add_form">
                                            <div>
                                                <button class="btn btn-info waves-effect waves-light btn-sm" ng-click="myEquipment.equipAdd(this)" ng-disabled="btns.add">Add</button>

                                                <button class="btn btn-info waves-effect waves-light btn-sm" ng-click="myEquipment.multiple.add(this)" id="add" ng-disabled="btns.multiple">Add Forms</button>
                                                    
                                                <button class="btn btn-info waves-effect waves-light btn-sm" ng-click="myEquipment.multiple.remove(this)" id="remove" ng-disabled="btns.multiple">Remove</button>
                                            </div>
                                            <br>

                                            <div id="content"></div>
                                        </div>

                                        <div class="tab-pane" id="temp_2">
                                            <div id="AR_form"></div>
                                        </div>
                                        <div class="tab-pane" id="temp_3">
                                            Hi
                                        </div>
                                        <div class="tab-pane" id="temp_4">
                                            Fuck you
                                        </div>
                                        <div class="tab-pane" id="temp_5">
                                            Ow yeah
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class = "a_content" id="a_content"> </div>
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
        <script src="modules/equipment.js"></script>
        <script src="controllers/equipment.js"></script>



    </body>
</html>