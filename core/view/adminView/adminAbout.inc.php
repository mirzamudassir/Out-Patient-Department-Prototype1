<?php
//get header for this page
require_once('adminHeader.inc.php');
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
                                            <h4><i class="ti-user"></i> System Properties</h4>
                                        </div>
                                        <div class="page-header-breadcrumb">
                                            <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard">
                                                        <i class="icofont icofont-home"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">About</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="userAccounts">System Properties</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="page-body">
                                    
                                            
                                    <!-- Main Content -->
                                    <!-- Page-body start -->
            <div class="page-body">
                <!--profile cover start-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cover-profile">
                           
                        </div>
                    </div>
                </div>
                <!--profile cover end-->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- tab header start -->
                        <div class="tab-header">
                            <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#system" role="tab">System</a>
                                    <div class="slide"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#activation" role="tab">Product Activation</a>
                                    <div class="slide"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#updates" role="tab">Updates</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                        <!-- tab header end -->
                        <!-- tab content start -->
                        <div class="tab-content">
                            <!-- tab panel system start -->
                            <div class="tab-pane active" id="system" role="tabpanel">
                                <!-- system card start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-header-text">System Information</h5>
                                        </button>
                                    </div>
                                    <div class="card-block">
                                        <div class="view-info">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="general-info">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-xl-6">
                                                                <table class="table m-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">Package Name</th>
                                                                            <td>IRY - cPanel</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Type</th>
                                                                            <td>Web Application</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Copyrights</th>
                                                                            <td>irepairyork.com</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Product Status</th>
                                                                            <td><label class='label bg-success'>ACTIVATED</label></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Issued To</th>
                                                                            <td><a href="https://irepairyork.com/" target="_blank">iRepair York</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- end of table col-lg-6 -->
                                                            <div class="col-lg-12 col-xl-6">
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">Version</th>
                                                                            <td>V1.0 BETA</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Release Date</th>
                                                                            <td>15 January 2022</td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <th scope="row">License Number</th>
                                                                            <td>GKPI-76YA-BHK0-8888</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Expiring At</th>
                                                                            <td>Lifetime</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Issuer</th>
                                                                            <td>B2B Productions</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- end of table col-lg-6 -->
                                                        </div>
                                                        <!-- end of row -->
                                                    </div>
                                                    <!-- end of general info -->
                                                </div>
                                                <!-- end of col-lg-12 -->
                                            </div>
                                            <!-- end of row -->
                                        </div>
                                        <!-- end of view-info -->

                                        <!-- end of edit-info -->
                                    </div>
                                    <!-- end of card-block -->
                                </div>
                                <!-- personal card end-->
                            </div>
                            <!-- tab pane personal end -->
                            <!-- tab pane activation start -->
                            <div class="tab-pane" id="activation" role="tabpanel">
                                <!-- info card start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-header-text">Product License Activation Information</h5>
                                    </div>
                                    <div class="card-block">
                                    <div class="view-info">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="general-info">
                                                        <div class="row">
                                                            <hp>No data available.</p>
                                                        </div>
                                                        <!-- end of row -->
                                                    </div>
                                                    <!-- end of general info -->
                                                </div>
                                                <!-- end of col-lg-12 -->
                                            </div>
                                            <!-- end of row -->
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <!-- info card end -->
                            </div>
                            <!-- tab pane activation end -->

                            <!-- tab pane updates start -->
                            <div class="tab-pane" id="updates" role="tabpanel">
                                <!-- info card start -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-header-text">Product Updates</h5>
                                    </div>
                                    <div class="card-block">
                                    <div class="view-info">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="general-info">
                                                        <div class="row">
                                                            <p>No updates available.</p>
                                                        </div>
                                                        <!-- end of row -->
                                                    </div>
                                                    <!-- end of general info -->
                                                </div>
                                                <!-- end of col-lg-12 -->
                                            </div>
                                            <!-- end of row -->
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <!-- info card end -->
                            </div>
                            <!-- tab pane updates end -->
                            
                            <div class="tab-pane" id="review" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-header-text">Review</h5>
                                    </div>
                                    <div class="card-block">
                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object img-circle comment-img" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Sortino media<span class="f-12 text-muted m-l-5">Just now</span></h6>
                                                    <div class="stars-example-css review-star">
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                    </div>
                                                    <p class="m-b-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                                    <div class="m-b-25">
                                                        <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a href="#!" class="f-12">Edit</a> </span>
                                                    </div>
                                                    <hr>
                                                    <!-- Nested media object -->
                                                    <div class="media mt-2">
                                                        <a class="media-left" href="#">
                                                            <img class="media-object img-circle comment-img" src="assets/images/avatar-2.png" alt="Generic placeholder image">
                                                        </a>
                                                        <div class="media-body">
                                                            <h6 class="media-heading">Larry heading <span class="f-12 text-muted m-l-5">Just now</span></h6>
                                                            <div class="stars-example-css review-star">
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                            </div>
                                                            <p class="m-b-0"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                                            <div class="m-b-25">
                                                                <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a href="#!" class="f-12">Edit</a> </span>
                                                            </div>
                                                            <hr>
                                                            <!-- Nested media object -->
                                                            <div class="media mt-2">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object img-circle comment-img" src="assets/images/avatar-3.png" alt="Generic placeholder image">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Colleen Hurst <span class="f-12 text-muted m-l-5">Just now</span></h6>
                                                                    <div class="stars-example-css review-star">
                                                                        <i class="icofont icofont-star"></i>
                                                                        <i class="icofont icofont-star"></i>
                                                                        <i class="icofont icofont-star"></i>
                                                                        <i class="icofont icofont-star"></i>
                                                                        <i class="icofont icofont-star"></i>
                                                                    </div>
                                                                    <p class="m-b-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                                                    <div class="m-b-25">
                                                                        <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a href="#!" class="f-12">Edit</a> </span>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Nested media object -->
                                                    <div class="media mt-2">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object img-circle comment-img" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="media-heading">Cedric Kelly<span class="f-12 text-muted m-l-5">Just now</span></h6>
                                                            <div class="stars-example-css review-star">
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                            </div>
                                                            <p class="m-b-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                                            <div class="m-b-25">
                                                                <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a href="#!" class="f-12">Edit</a> </span>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="media mt-2">
                                                        <a class="media-left" href="#">
                                                            <img class="media-object img-circle comment-img" src="assets/images/avatar-4.png" alt="Generic placeholder image">
                                                        </a>
                                                        <div class="media-body">
                                                            <h6 class="media-heading">Larry heading <span class="f-12 text-muted m-l-5">Just now</span></h6>
                                                            <div class="stars-example-css review-star">
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                            </div>
                                                            <p class="m-b-0"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                                            <div class="m-b-25">
                                                                <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a href="#!" class="f-12">Edit</a> </span>
                                                            </div>
                                                            <hr>
                                                            <!-- Nested media object -->
                                                            <div class="media mt-2">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object img-circle comment-img" src="assets/images/avatar-3.png" alt="Generic placeholder image">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Colleen Hurst <span class="f-12 text-muted m-l-5">Just now</span></h6>
                                                                    <div class="stars-example-css review-star">
                                                                        <i class="icofont icofont-star"></i>
                                                                        <i class="icofont icofont-star"></i>
                                                                        <i class="icofont icofont-star"></i>
                                                                        <i class="icofont icofont-star"></i>
                                                                        <i class="icofont icofont-star"></i>
                                                                    </div>
                                                                    <p class="m-b-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                                                    <div class="m-b-25">
                                                                        <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a href="#!" class="f-12">Edit</a> </span>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media mt-2">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object img-circle comment-img" src="assets/images/avatar-2.png" alt="Generic placeholder image">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="media-heading">Mark Doe<span class="f-12 text-muted m-l-5">Just now</span></h6>
                                                            <div class="stars-example-css review-star">
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                            </div>
                                                            <p class="m-b-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                                            <div class="m-b-25">
                                                                <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a href="#!" class="f-12">Edit</a> </span>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="md-float-material d-flex">
                                            <div class="md-group-add-on p-relative col-lg-12">
                                                <div class="input-group input-group-button input-group-primary">
                                                    <span class="input-group-addon"><i class="icofont icofont-comment"></i></span>
                                                    <input type="text" class="form-control" placeholder="Write Comment">
                                                    <span class="input-group-addon">
                                       <button class="btn btn-primary"><i class="icofont icofont-plus"></i>Add Comment</button>
                                       </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab content end -->
                    </div>
                </div>
            </div>
            <!-- Page-body end -->
                                       
                                        <!-- Main Content end -->
                                        
                                    
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
$userBasicData= NULL;
$userObject= NULL;
$link= NULL;
?>

<script type='text/javascript'>


    const li= document.querySelectorAll('li');
    li.forEach((element) => {
        let val= element.getAttribute('id');
        if(val == 'dashboard'){
            element.setAttribute('class', '');
        }else if(val == 'about'){
            element.setAttribute('class', 'active');
        }
    });

</script>
</body>

</html>
