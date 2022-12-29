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
                                            <h4><i class="fa fa-warning"></i> Device Problems</h4>
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
                                                <li class="breadcrumb-item"><a href="deviceProblems">Device Problems</a>
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
                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light md-trigger" data-modal="modal-1"> <i class="icofont icofont-plus m-r-5"></i> Add Device Problem
                                                </button>
                                               
                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="simpletable" class="table table-striped table-bordered nowrap" style="table-layout: fixed;">
                                                        <thead>
                                                            <tr>
                                                                <th>Manufacturer</th>
                                                                <th>Model</th>
                                                                <th>Problem</th>
                                                                <th>Description</th>
                                                                <th>Price</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $userObject->getProblems("ListForTable", ""); ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Manufacturer</th>
                                                                <th>Model</th>
                                                                <th>Problem</th>
                                                                <th>Description</th>
                                                                <th>Price</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Add Device Problem Start Model -->
                                        
                                        <div class="md-modal md-effect-1 addDeviceProblem" id="modal-1">
                                            <div class="md-content">
                                                <h3 class="f-26">Add Device Problem</h3>
                                                <div>
                                                <form action="../core/view/dataParser?f=addDeviceProblem" method="POST" id="addDeviceProblem">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <select name="manufacturer" class="form-control selectman" id="mans" required>
                                                    <option value=""></option>
                                                    <?php $userObject->getManufacturers("ListForDropDown", ""); ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select name="model" class="form-control selectmod" id="mods" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="problem_title" placeholder="Problem Title" required>
                                            </div>
                                            <div class="col-sm-6 input-group">
                                                    <span class="input-group-addon">£</span>
                                                    <input type="number" min="1" class="form-control" name="problem_price" placeholder="Price" required>
                                                    <span class="input-group-addon">.00</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="problem_description" placeholder="Problem Description" required>
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
                                        <!-- Add Device Problem Ends Model-->

                                        <!-- Update Device Problem Starts Model-->

                                        <div class="md-modal md-effect-1 updateDeviceProblem" id="updateDeviceProblem">
                                            <div class="md-content">
                                                <h3 class="f-26">Update Device Problem</h3>
                                                <div>
                                                <form action="../core/view/dataParser?f=updateDeviceProblem" method="POST" id="updateDeviceProblem">
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="manufacturer" value="" disabled>
                                                </div>
                                                <div class="col-sm-6">
                                                <input type="text" class="form-control" id="model" value="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="problem_title" id="problem_title" placeholder="Problem Title" required>
                                                </div>
                                                <div class="col-sm-6 input-group">
                                                        <span class="input-group-addon">£</span>
                                                        <input type="number" min="1" class="form-control" name="problem_price" id="problem_price" placeholder="Price" required>
                                                        <span class="input-group-addon">.00</span>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="problem_description" id="problem_description" placeholder="Problem Description" required>
                                            </div>
                                        </div>
                                            <input type="hidden" name="p_id" id="p_id_u" value="">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary waves-effect m-r-20 f-w-600 d-inline-block">Update</button>
                                                        <button type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 md-close d-inline-block">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="md-overlay"></div>
                                        <!-- Update Device Problem Ends Model-->
                                        

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
         $(document).ready(function(){    
    $(".selectman").select2({
        placeholder: "Select Manufacturer ",
        theme: "default",
        dropdownParent: $('#modal-1'),
    });

    $(".selectmod").select2({
        placeholder: "Select Model ",
        theme: "default",
        dropdownParent: $('#modal-1'),
    });

    $("#mans").change(function(){
        let man= $(this).children("option:selected").val();
        $.ajax({
            url: '../core/view/getUserController?f=getModelsOptions',
            type: 'post',
            data: {man: man},
            success: function(response){
                $("#mods").html(response);
            }
        });
    });

});

        $(".updateDeviceProblem").on('click', function(){
            let id= $(this).attr("id");
            $.ajax({
                url: '../core/view/getUserController?f=getDeviceProblemDetails',
                type: 'post',
                data: {id: id},
                success: function(response){
                    let data= JSON.parse(response);
                    $("#manufacturer").val(data[1]);
                    $("#model").val(data[2]);
                    $("#problem_title").val(data[3]);
                    $("#problem_description").val(data[4]);
                    $("#problem_price").val(data[5]);
                    $("#p_id_u").val(data[0]);
                }
            }); 
        });
        
        $(".deleteDeviceProblem").on('click', function(e){
            e.preventDefault();
            let id= $(this).attr("id");
            $.ajax({
                url: '../core/view/dataParser?f=deleteDeviceProblem',
                type: 'post',
                data: {id: id},
                success: function(response){
                    $("#simpletable").load(window.location + " #simpletable");
                    notify('Success : Problem deleted.', 'inverse');
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

