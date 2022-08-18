<?php
//get header for this page
require_once('adminHeader.inc.php');
$userObject= new UserController();
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
                                            <h4><i class="ti-user"></i> User Accounts</h4>
                                        </div>
                                        <div class="page-header-breadcrumb">
                                            <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard">
                                                        <i class="icofont icofont-home"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Security</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="userAccounts">User Accounts</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="page-body">
                                    <?php $userObject->getNotification(); ?>
                                            
                                    <!-- Column Rendering table start -->
                                        <div class="card">
                                        <div class="card-header">
                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Full Name</th>
                                                                <th>Username</th>
                                                                <th>Role</th>
                                                                <th>Access Level</th>
                                                                <th>Account Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $userObject->getUsersList(); ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Full Name</th>
                                                                <th>Username</th>
                                                                <th>Role</th>
                                                                <th>Access Level</th>
                                                                <th>Account Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <!-- Column Rendering table end-->
                                    
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

//dispose off the objects
$userBasicData= $userObject= $link= NULL;
?>

</body>

</html>

