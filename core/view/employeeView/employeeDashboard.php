<?php
//get header for this page
require_once('employeeHeader.inc.php');
?>
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
                        <a href="index-2.html">
                            <img class="img-fluid" src="../assets/images/logo.png" alt="Theme-Logo" />
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
                                <li class="header-notification lng-dropdown">
                                    <a href="#" id="dropdown-active-item">
                                        <i class="flag-icon flag-icon-gb m-r-5"></i> English
                                    </a>
                                </li>
                                <li class="header-notification">
                                    <a href="#!">
                                        <i class="ti-bell"></i>
                                        <span class="badge">5</span>
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
                                                    <h5 class="notification-user">John Doe</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </li>
                                
                                <li class="user-profile header-notification">
                                    <a href="#!">
                                        <img src="../assets/images/user.png" alt="User-Profile-Image">
                                        <span>John Doe</span>
                                        <i class="ti-angle-down"></i>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                        <li>
                                            <a href="#!">
                                                <i class="ti-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.html">
                                                <i class="ti-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                                <i class="ti-email"></i> My Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html">
                                                <i class="ti-lock"></i> Lock Screen
                                            </a>
                                        </li>
                                        <li>
                                            <a href="../core/modal/Auth/systemSignOut">
                                                <i class="ti-layout-sidebar-left"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                          
                        </div>
                    </div>
                </div>
            </nav>

           
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar" pcoded-header-position="relative">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-40" src="../assets/images/user.png" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span>John Doe</span>
                                        <span id="more-details">UX Designer</span>
                                    </div>
                                </div>
                            </div>

                            <?php echo $mainMenu ?>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-header">
                                        <div class="page-header-title">
                                            <h4>Dashboard</h4>
                                        </div>
                                        <div class="page-header-breadcrumb">
                                            <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard">
                                                        <i class="icofont icofont-home"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-md-12 col-xl-4">
                                                <!-- table card start -->
                                                <div class="card table-card">
                                                    <div class="">
                                                        <div class="row-table">
                                                            <div class="col-sm-6 card-block-big br">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <i class="icofont icofont-eye-alt text-success"></i>
                                                                    </div>
                                                                    <div class="col-sm-8 text-center">
                                                                        <h5>10k</h5>
                                                                        <span>Visitors</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 card-block-big">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <i class="icofont icofont-ui-music text-danger"></i>
                                                                    </div>
                                                                    <div class="col-sm-8 text-center">
                                                                        <h5>100%</h5>
                                                                        <span>Volume</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="row-table">
                                                            <div class="col-sm-6 card-block-big br">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <i class="icofont icofont-files text-info"></i>
                                                                    </div>
                                                                    <div class="col-sm-8 text-center">
                                                                        <h5>2000 +</h5>
                                                                        <span>Files</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 card-block-big">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <i class="icofont icofont-envelope-open text-warning"></i>
                                                                    </div>
                                                                    <div class="col-sm-8 text-center">
                                                                        <h5>120</h5>
                                                                        <span>Mails</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- table card end -->
                                            </div>
                                            <div class="col-md-12 col-xl-4">
                                                <!-- table card start -->
                                                <div class="card table-card">
                                                    <div class="">
                                                        <div class="row-table">
                                                            <div class="col-sm-6 card-block-big br">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div id="barchart" style="height:40px;width:40px;"></div>
                                                                    </div>
                                                                    <div class="col-sm-8 text-center">
                                                                        <h5>1000</h5>
                                                                        <span>Shares</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 card-block-big">
                                                                <div class="row ">
                                                                    <div class="col-sm-4">
                                                                        <i class="icofont icofont-network text-primary"></i>
                                                                    </div>
                                                                    <div class="col-sm-8 text-center">
                                                                        <h5>600</h5>
                                                                        <span>Network</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="row-table">
                                                            <div class="col-sm-6 card-block-big br">
                                                                <div class="row ">
                                                                    <div class="col-sm-4">
                                                                        <div id="barchart2" style="height:40px;width:40px;"></div>
                                                                    </div>
                                                                    <div class="col-sm-8 text-center">
                                                                        <h5>350</h5>
                                                                        <span>Returns</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 card-block-big">
                                                                <div class="row ">
                                                                    <div class="col-sm-4">
                                                                        <i class="icofont icofont-network-tower text-primary"></i>
                                                                    </div>
                                                                    <div class="col-sm-8 text-center">
                                                                        <h5>100%</h5>
                                                                        <span>Connections</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- table card end -->
                                            </div>
                                            <div class="col-md-12 col-xl-4">
                                                <!-- widget primary card start -->
                                                <div class="card table-card widget-primary-card">
                                                    <div class="">
                                                        <div class="row-table">
                                                            <div class="col-sm-3 card-block-big">
                                                                <i class="icofont icofont-star"></i>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <h4>4000 +</h4>
                                                                <h6>Ratings Received</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- widget primary card end -->
                                                <!-- widget-success-card start -->
                                                <div class="card table-card widget-success-card">
                                                    <div class="">
                                                        <div class="row-table">
                                                            <div class="col-sm-3 card-block-big">
                                                                <i class="icofont icofont-trophy-alt"></i>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <h4>17</h4>
                                                                <h6>Achievements</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- widget-success-card end -->
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
//get footer for this page
require_once('employeeFooter.inc.php');
?>
</body>

</html>

