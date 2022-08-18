<?php
//get header for this page
require_once('adminHeader.inc.php');
$userController= new UserController();
?>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar" pcoded-header-position="relative">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-40" src="../assets/images/user.png" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span><?php echo $userBasicData['full_name'] ?></span>
                                        <span id="more-details"><?php echo $userBasicData['role'] ?></span>
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
                                            
                                            <!-- Manufacturers card start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card client-blocks dark-primary-border">
                                                    <div class="card-block">
                                                        <h5>Total Doctors</h5>
                                                        <ul>
                                                            <li>
                                                                <i class="fa fa-industry"></i>
                                                            </li>
                                                            <li class="text-right">
                                                               <?php echo $userController->getManufacturers('count', ''); ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Manufacturers card end -->
                                            <!-- Products card start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card client-blocks warning-border">
                                                    <div class="card-block">
                                                        <h5>Total Patients</h5>
                                                        <ul>
                                                            <li>
                                                                <i class="fa fa-check-square"></i>
                                                            </li>
                                                            <li class="text-right text-warning">
                                                                0
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- New Products card end -->
                                            <!-- New files card start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card client-blocks success-border">
                                                    <div class="card-block">
                                                        <h5>Total Departments</h5>
                                                        <ul>
                                                            <li>
                                                                <i class="fa fa-warning"></i>
                                                            </li>
                                                            <li class="text-right text-success">
                                                                0
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- New files card end -->
                                            <!-- Open Project card start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card client-blocks">
                                                    <div class="card-block">
                                                        <h5>Total Appointments</h5>
                                                        <ul>
                                                            <li>
                                                                <i class="fa fa-calendar-plus-o"></i>
                                                            </li>
                                                            <li class="text-right text-primary">
                                                                0
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Open Project card end -->
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
require_once('adminFooter.inc.php');
?>
</body>

</html>

