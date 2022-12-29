<?php
//get header for this page
require_once('adminHeader.inc.php');
$userObject= new UserController();
$storeSettings= $userObject->getStoreSettings();
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
                                            <h4><i class="fa fa-cogs"></i> Store Settings</h4>
                                        </div>
                                        <div class="page-header-breadcrumb">
                                            <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard">
                                                        <i class="icofont icofont-home"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Settings</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="storeSettings">Store Settings</a>
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
                                            <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a>
                                                <div class="slide"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#editProfile" role="tab">Edit Profile</a>
                                                <div class="slide"></div>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs-left-content card-block">
                                            <div class="tab-pane active" id="profile" role="tabpanel">
                                                <h2 class="store-heading">Store Name - <?php echo $storeSettings['storeName']; ?></h2>
                                                    <div class='form-group row store-settings'>
                                                                        <div class='col-sm-6'>
                                                                            <p>Currency Name: <?php echo $storeSettings['currencyName'] ?></p>
                                                                        </div>
                                                                        <div class='col-sm-6'>
                                                                            <p>Currency Symbol: &pound</p>
                                                                        </div>
                                                        </div> 
                                                        <div class='form-group row store-settings'>
                                                                        <div class='col-sm-6'>
                                                                            <p>Opening Time: <?php echo $storeSettings['openingTime'] ?></p>
                                                                        </div>
                                                                        <div class='col-sm-6'>
                                                                            <p>Closing Time: <?php echo $storeSettings['closingTime'] ?></p>
                                                                        </div>
                                                        </div> 
                                                        <div class='form-group row store-settings'>
                                                                        <div class='col-sm-6'>
                                                                            <p>Appointment Interval: <?php echo $storeSettings['bookingInterval'] ?></p>
                                                                        </div>
                                                                        <div class='col-sm-6'>
                                                                            <p>Half Day: <?php echo $storeSettings['halfDayName'] ?></p>
                                                                        </div>
                                                        </div> 
                                                        <div class='form-group row store-settings'>
                                                                        <div class='col-sm-6'>
                                                                            <p>Half Day Opening: <?php echo $storeSettings['halfDayOpeningTime'] ?></p>
                                                                        </div>
                                                                        <div class='col-sm-6'>
                                                                            <p>Half Day Closing: <?php echo $storeSettings['halfDayClosingTime'] ?></p>
                                                                        </div>
                                                        </div>
                                            </div>
                                            <div class="tab-pane" id="editProfile" role="tabpanel">
                                                        <div class='form-group row store-settings'>
                                                                        <div class='col-sm-12'>
                                                                            <span>Store Name *</span>
                                                                            <input type="text" class="form-control" name="store_name" id="store_name" value="" disabled>
                                                                        </div>
                                                        </div>
                                                        <div class='form-group row store-settings'>
                                                                        <div class='col-sm-6'>
                                                                        <span>Currency Name *</span>
                                                                            <input type="text" class="form-control" name="currency_name" id="currency_name" value="" disabled>
                                                                        </div>
                                                                        <div class='col-sm-6'>
                                                                        <span>Currency Symbol *</span>
                                                                            <input type="text" class="form-control" id="currency_symbol" value="" disabled>
                                                                        </div>
                                                        </div>
                                                        <div class='form-group row store-settings'>
                                                                        <div class='col-sm-6'>
                                                                        <span>Opening Time *</span>
                                                                            <input type="time" class="form-control" name="opening_time" value="" disabled>
                                                                        </div>
                                                                        <div class='col-sm-6'>
                                                                        <span>Closing Time *</span>
                                                                        <input type="time" class="form-control" name="closing_time" value="" disabled>
                                                                        </div>
                                                        </div>
                                                        <div class='form-group row store-settings'>
                                                                        <div class='col-sm-6'>
                                                                        <span>Booking Interval *</span>
                                                                            <input type="number" min="1" class="form-control" name="booking_interval" id="booking_interval" value="" disabled>
                                                                        </div>
                                                                        <div class='col-sm-6'>
                                                                            <span>Half Day *</span>
                                                                            <select name="manufacturer" class="form-control selectDay" disabled>
                                                                                <option value=""></option>
                                                                                <option value="Monday">Monday</option>
                                                                                <option value="Tuesday">Tuesday</option>
                                                                                <option value="Wednesday">Wednesday</option>
                                                                                <option value="Thursday">Thursday</option>
                                                                                <option value="Friday">Friday</option>
                                                                                <option value="Saturday">Saturday</option>
                                                                                <option value="Sunday">Sunday</option>
                                                                            </select>
                                                                        </div>
                                                        </div>
                                                        <div class='form-group row store-settings'>
                                                                        <div class='col-sm-6'>
                                                                            <span>Half Day Opening Time *</span>
                                                                            <input type="time" class="form-control" name="halfDay_opening_time" value="" disabled>
                                                                        </div>
                                                                        <div class='col-sm-6'>
                                                                        <span>Half Day Closing Time *</span>
                                                                        <input type="time" class="form-control" name="halfDay_closing_time" value="" disabled>
                                                                        </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-disabled disabled waves-effect m-r-20 f-w-600 d-inline-block">Save</button>
                                                        </div>
                                            </div>
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
$userBasicData= $userObject= $link= $storeSettings= NULL;
?>
<script>
    $(document).ready(function(){    
    $(".selectDay").select2({
        placeholder: "Select Half Day ",
        theme: "default",
    });

});
</script>
</body>

</html>

