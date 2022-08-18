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
                                            <h4><i class="fa fa-industry"></i> Manufacturers</h4>
                                        </div>
                                        <div class="page-header-breadcrumb">
                                            <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="dashboard">
                                                        <i class="icofont icofont-home"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Products</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="manageProducts">Manage Products</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="manageManufacturers">Manage Manufacturers</a>
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
                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light md-trigger" data-modal="modal-1"> <i class="icofont icofont-plus m-r-5"></i> Add Manufacturer
                                                </button>
                                               
                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Manufacturer Name</th>
                                                                <th>Display Image</th>
                                                                <th>Description</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $userObject->getmanufacturers("ListForTable", ""); ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                               <th>Manufacturer Name</th>
                                                                <th>Display Image</th>
                                                                <th>Description</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Add manufacturer Start Model -->
                                        
                                        <div class="md-modal md-effect-1 addManufacturer" id="modal-1">
                                            <div class="md-content">
                                                <h3 class="f-26">Add Manufacturer</h3>
                                                <div>
                                                <form action="../core/view/dataParser?f=addManufacturer" method="POST" id="addManufacturer" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                            <input type="text" class="form-control" name="man_name" placeholder="Name" required>
                                            </div>
                                            <div class="col-sm-6">
                                            <input type="file" class="form-control" name="man_img" id="man_img" required>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" name="description" placeholder="Description">
                                            </div>
                                            
                                        </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary waves-effect m-r-20 f-w-600 d-inline-block">Save</button>
                                                        <button type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 md-close d-inline-block">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="md-overlay"></div>
                                        <!-- Add manufacturer Ends Model-->

                                        <!-- Update manufacturer Starts Model-->

                                        <div class="md-modal md-effect-1 updateManufacturer" id="updateManufacturer">
                                            <div class="md-content">
                                                <h3 class="f-26">Update Manufacturer</h3>
                                                <div>
                                                <form action="../core/view/dataParser?f=updateManufacturer" method="POST" id="updateManufacturer" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                            <input type="text" class="form-control" name="man_name" id="man_name_u" placeholder="Name" required>
                                            </div>
                                            <div class="col-sm-6">
                                            <input type="file" class="form-control" name="man_img" id="man_img_u">
                                            </div>
                                            <input type="hidden" name="man_id" id="man_id_u" value="">
                                            
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" name="man_description" id="man_description_u" placeholder="Description">
                                            </div>
                                            
                                        </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary waves-effect m-r-20 f-w-600 d-inline-block">Update</button>
                                                        <button type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 md-close d-inline-block">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="md-overlay"></div>
                                        <!-- Update manufacturer Ends Model-->
                                        

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
        $(".updateManufacturer").on('click', function(){
            let id= $(this).attr("id");
            $.ajax({
                url: '../core/view/getUserController?f=getManufacturerDetails',
                type: 'post',
                data: {id: id},
                success: function(response){
                    let data= JSON.parse(response);
                    $("#man_name_u").val(data[1]);
                    $("#man_description_u").val(data[3]);
                    $("#man_id_u").val(data[0]);
                }
            }); 
        });
        
        $(".deleteManufacturer").on('click', function(e){
            e.preventDefault();
            let id= $(this).attr("id");
            $.ajax({
                url: '../core/view/dataParser?f=deleteManufacturer',
                type: 'post',
                data: {id: id},
                success: function(response){
                    $("#simpletable").load(window.location + " #simpletable");
                    notify('Success : Manufacturer deleted.', 'inverse');
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

