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
                                            <h4><i class="fa fa-calendar-plus-o"></i> Manage Appointments</h4>
                                        </div>
                                        <div class="page-header-breadcrumb">
                                            <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard">
                                                        <i class="icofont icofont-home"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Appointments</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="deviceProblems">Manage Appointments</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                   <div id="response"></div>
                                    <div class="page-body">
                                    <?php $userObject->getNotification(); ?>
                                            
                                    <!-- Column Rendering table start -->
                                        <div class="card">
                                        <div class="card-header">
                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="simpletable" class="table table-striped table-bordered nowrap" style="table-layout: fixed;">
                                                        <thead>
                                                            <tr>
                                                                <th>App. #</th>
                                                                <th style='white-space: pre-wrap;'>Customer Name</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th style='white-space: pre-wrap;'>Customer Device</th>
                                                                <th style='white-space: pre-wrap;'>Appointment Slot</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $userObject->getAppointments("ListForTable", ""); ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>App. #</th>
                                                                <th style='white-space: pre-wrap;'>Customer Name</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th style='white-space: pre-wrap;'>Customer Device</th>
                                                                <th style='white-space: pre-wrap;'>Appointment Slot</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Appointment Details Starts Model-->

                                        <div class="md-modal md-effect-1 detailsAppointmentM modal-lg" id="detailsAppointment">
                                            <div class="md-content">
                                                <h3 class="f-26">Appointment Details</h3>
                                                <div>
                                                    <div id="appDetails"></div>
                                            
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 md-close d-inline-block closeModal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="md-overlay"></div>
                                        <!-- Appointment Details Ends Model-->

                                        <div class="md-modal md-effect-1 modal-flex" id="demoM" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <ul class="nav nav-tabs" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#tab-home" role="tab">Home</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#tab-profile" role="tab">Profile</a>
                                                            </li>
                                                            <li class="nav-ite m">
                                                                <a class="nav-link" data-toggle="tab" href="#tab-messages" role="tab">Messages</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#tab-settings" role="tab">Settings</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content modal-body">
                                                            <div class="tab-pane active" id="tab-home" role="tabpanel">
                                                                <h6>Home</h6>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing</p>
                                                            </div>
                                                            <div class="tab-pane" id="tab-profile" role="tabpanel">
                                                                <h6>Profile</h6>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing</p>
                                                            </div>
                                                            <div class="tab-pane" id="tab-messages" role="tabpanel">
                                                                <h6>Messages</h6>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing</p>
                                                            </div>
                                                            <div class="tab-pane" id="tab-settings" role="tabpanel">
                                                                <h6>Settings</h6>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing</p>
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
$userBasicData= $userObject= $link= NULL;
?>


    <script>

        $(".detailsAppointment").on('click', function(){
            let id= $(this).attr("id");
            $.ajax({
                url: '../core/view/getUserController?f=getAppointmentDetails',
                type: 'post',
                data: {id: id},
                success: function(response){
                    $("#appDetails").html(response);
                    
                }
            }); 
        });
        
        $(".deleteAppointment").on('click', function(e){
            e.preventDefault();
            let id= $(this).attr("id");
            $.ajax({
                url: '../core/view/dataParser?f=deleteAppointment',
                type: 'post',
                data: {id: id},
                success: function(response){
                    $("#simpletable").load(window.location + " #simpletable");
                    notify('Success : Appointment deleted.', 'inverse');
        }
     });
        });

        function notify(message, type){
        $.growl({
            message: message
        },{
            type: type,
            allow_dismiss: true,
            label: 'Cancel',
            className: 'btn-xs btn-inverse',
            placement: {
                from: 'top',
                align: 'center'
            },
            delay: 4000,
            animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
            },
            offset: {
                x: 30,
                y: 30
            }
        });
    };


    </script>
</body>

</html>

