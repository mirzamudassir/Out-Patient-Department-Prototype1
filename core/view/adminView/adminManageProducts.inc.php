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
                                            <h4><i class='fa fa-check-square'></i> Manage Products</h4>
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
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="page-body">
                                    <?php $userObject->getNotification(); ?>
                                            
                                    <!-- Column Rendering table start -->
                                    <div class="card">
                                        <div class="card-header">
                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light md-trigger" data-modal="modal-1"> <i class="icofont icofont-plus m-r-5"></i> Add Product
                                                </button>
                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" onClick="location.href='manageManufacturers'"> <i class="fa fa-industry"></i> Manage Manufacturers
                                                </button>
                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="simpletable" class="table table-striped table-bordered nowrap" style="table-layout: fixed;">
                                                        <thead>
                                                            <tr>
                                                                <th>Device</th>
                                                                <th>Model</th>
                                                                <th>Manufacturer</th>
                                                                <th>Display Image</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $userObject->getProducts("ListForTable", ""); ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Device</th>
                                                                <th>Model</th>
                                                                <th>Manufacturer</th>
                                                                <th>Display Image</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Add Product Start Model -->
                                        
                                        <div class="md-modal md-effect-1 addProduct" id="modal-1">
                                            <div class="md-content">
                                                <h3 class="f-26">Add Product</h3>
                                                <div>
                                                <form action="../core/view/dataParser?f=addProduct" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control" name="device_name" placeholder="Device Name" required>
                                            </div>
                                            <div class="col-sm-6">
                                            <input type="text" class="form-control" name="model" placeholder="Model Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-sm-6">
                                            <select name="manufacturer" class="form-control selectman">
                                                <option value=""></option>
                                                <?php $userObject->getManufacturers("ListForDropDown", ""); ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                        <input type="file" class="form-control" name="product_img" id="product_img" required>
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
                                        <!-- Add Product Ends Model-->
                                        </div>
                                        <div class="md-overlay"></div>
                                        <!-- Add Device Problem Ends Model-->

                                        <!-- Update Device Problem Starts Model-->

                                        <div class="md-modal md-effect-1 updateProduct" id="updateProductModal">
                                            <div class="md-content">
                                                <h3 class="f-26">Update Product</h3>
                                                <div>
                                                <form action="../core/view/dataParser?f=updateProduct" method="POST" id="updateProduct" enctype="multipart/form-data">
                                                    <div id="updateItems"></div>
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

    $(".selectmanMultiple").select2({
        placeholder: "Select Color ",
        theme: "default",
        dropdownParent: $('#modal-1'),
    });

    

    $(".deleteProduct").on('click', function(e){
            e.preventDefault();
            let id= $(this).attr("id");
            $.ajax({
                url: '../core/view/dataParser?f=deleteProduct',
                type: 'post',
                data: {id: id},
                success: function(response){
                    $("#simpletable").load(window.location + " #simpletable");
                    notify('Success : Product deleted.', 'inverse');
        }
     });
        });


});    

$(".updateProductBtn").on('click', function(){
            let id= $(this).attr("id");
            $.ajax({
                url: '../core/view/getUserController?f=getProductDetails',
                type: 'post',
                data: {id: id},
                success: function(response){
                    //let data= JSON.parse(response);
                    $("#updateItems").html(response);
                   /*  $("#device_name_u").val(data[1]);
                    $("#model_u").val(data[2]);
                    $("#p_id_u").val(data[0]); */
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

