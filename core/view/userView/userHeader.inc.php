<?php 
//calling necessary include files
require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/includes/global_info.inc.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/core/modal/initialize.php');
//require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/core/view/userView/adminModals.inc.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/core/view/userView/userNav.inc.php');

//call this method in every private page to protect against unauthorized access
before_every_protected_page();

error_reporting(E_ALL); // Error/Exception engine, always use E_ALL
header("X-XSS-Protection: 1; mode=block");

$userObject= new User();
$userBasicData= $userObject->userProfile($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">

<!--
    Package Name: IRY - cPanel
    Author: Mudassir Mirza - B2B Productions
-->

<head>
    <title><?php echo $appHeading ?></title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
      <meta name="description" content="IRY - cPanel">
      <meta name="author" content="B2B Productions">
      <!-- Favicon icon -->
      <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
      <!-- flag icon framework css -->
      <link rel="stylesheet" type="text/css" href="../assets/pages/flag-icon/flag-icon.min.css">
      <!-- Menu-Search css -->
      <link rel="stylesheet" type="text/css" href="../assets/pages/menu-search/css/component.css">
      <!-- Horizontal-Timeline css -->
      <link rel="stylesheet" type="text/css" href="../assets/pages/dashboard/horizontal-timeline/css/style.css">
      <!-- amchart css -->
      <link rel="stylesheet" type="text/css" href="../assets/pages/dashboard/amchart/css/amchart.css">
      <!-- flag icon framework css -->
      <link rel="stylesheet" type="text/css" href="../assets/pages/flag-icon/flag-icon.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/style.scss">
      <!--color css-->
      <link rel="stylesheet" type="text/css" href="../assets/css/color/color-1.css" id="color" />
      <!-- Notification.css -->
      <link rel="stylesheet" type="text/css" href="../assets/pages/notification/notification.css">
      <!-- Animate.css -->
      <link rel="stylesheet" type="text/css" href="../bower_components/animate.css/animate.css"> 
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/font-awesome/css/font-awesome.min.css"> 
      <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="../bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

    <!-- sweet alert framework -->
    <link rel="stylesheet" type="text/css" href="../bower_components/sweetalert/dist/sweetalert.css">
    <script src="../bower_components/sweetalert/dist/sweetalert2.all.min.js"></script>
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/component.css">
     <!-- Date-time picker css -->
     <link rel="stylesheet" type="text/css" href="../assets/pages/advance-elements/css/bootstrap-datetimepicker.css">
    <!-- Date-range picker css  -->
    <link rel="stylesheet" type="text/css" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="../bower_components/datedropper/datedropper.min.css">
     <!-- jquery file upload Frame work -->
     <link href="../bower_components/jquery.filer/css/jquery.filer.css" type="text/css" rel="stylesheet" />
    <link href="../bower_components/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />

    <!-- toolbar css -->
    <link rel="stylesheet" type="text/css" href="../assets/pages/toolbar/jquery.toolbar.css">
    <link rel="stylesheet" type="text/css" href="../assets/pages/toolbar/custom-toolbar.css">

      <link rel="stylesheet" type="text/css" href="../assets/css/linearicons.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/simple-line-icons.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/ionicons.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">
      <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>
    <!-- Select 2 css -->
    <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css" />

  </head>

  <body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <!-- Menu header start -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header" header-theme="theme4">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="#">
                            <h1 class="nav-title"><?php echo $appHeading ?></h1>
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <div>
                            <ul class="nav-left">
                                <li>
                                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                                </li>
                                <li>
                                    <a href="#!" onclick="javascript:toggleFullScreen()">
                                        <i class="ti-fullscreen"></i>
                                    </a>
                                </li>
                               
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav-right">
                                <li class="header-notification">
                                    <a href="#!">
                                        <i class="ti-bell"></i>
                                        <span class="badge">1</span>
                                    </a>
                                    <ul class="show-notification">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center" src="../assets/images/user.png" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    
                                                    <p class="notification-msg">You have Signed In successfully.</p>
                                                    <span class="notification-time">Just Now</span>
                                                </div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </li>
                                
                                <li class="user-profile header-notification">
                                    <a href="#!">
                                        <img src="../assets/images/user.png" alt="User-Profile-Image">
                                        <span><?php echo $userBasicData['userFullName'] ?></span>
                                        <i class="ti-angle-down"></i>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                        <li>
                                            <a href="#">
                                                <i class="ti-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ti-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="../systemSignOut">
                                                <i class="ti-layout-sidebar-left"></i> Sign Out
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                          
                        </div>
                    </div>
                </div>
            </nav>
