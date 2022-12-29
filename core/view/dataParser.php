<?php
require_once("../modal/initialize.php");
global $link;

if(isset($_GET['f'])){
$func= $_GET['f'];

switch($func){

        case 'addManufacturer':
            $folderToUploadPicture= "../../assets/images/products/manufacturers_images/";

            $manufacturerName= trim(filter_var($_POST['man_name'], FILTER_SANITIZE_STRING));
            $manIMG= $folderToUploadPicture . basename($_FILES['man_img']['name']);
            $picture_tmpName= $_FILES['man_img']['tmp_name'];
            $description= trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));

            $imageFileType = strtolower(pathinfo($manIMG,PATHINFO_EXTENSION));
            $imageSize= @getimagesize($_FILES['man_img']['tmp_name']);
            $widht= $imageSize[0];
            $height= $imageSize[1];

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {

                $arr= array("Error", "Only JPG, PNG file types are allowed.");
                        $_SESSION['notifStatus']= $arr;
                        redirect_to("/iry-cpanel/public/manageManufacturers");
                }else{

                    // Check file size, max upload size is 1MB
                    if ($_FILES["man_img"]["size"] < 1000000) {
                        //check for image dimensions
                        if($widht < 60 OR $height < 60){
                            if(move_uploaded_file($picture_tmpName, $manIMG)){
                                $manIMG= substr($manIMG, 6);
            
                                addManufacturer($manufacturerName, $manIMG, $description);
                            }else{
                                    $arr= array("Error", "There is an error in uploading Image.");
                                    $_SESSION['notifStatus']= $arr;
                                    redirect_to("/iry-cpanel/public/manageManufacturers");
                                }  
                        }else{
                            $arr= array("Error", "Maximum allowed image dimensions are (60x60)");
                            $_SESSION['notifStatus']= $arr;
                            redirect_to("/iry-cpanel/public/manageManufacturers");
                        }
                               
                    }else{
                        $arr= array("Error", "Image file size should be less than 1 MB");
                        $_SESSION['notifStatus']= $arr;
                        redirect_to("/iry-cpanel/public/manageManufacturers");
                    }
                }
                             
            break;


        case 'updateManufacturer':
            

            $manufacturerName= trim(filter_var($_POST['man_name'], FILTER_SANITIZE_STRING));
            $manIMG= basename($_FILES['man_img']['name']);
            $picture_tmpName= $_FILES['man_img']['tmp_name'];
            $description= trim(filter_var($_POST['man_description'], FILTER_SANITIZE_STRING));
            $man_id= trim(filter_var($_POST['man_id'], FILTER_SANITIZE_STRING));


                if(strlen($manIMG) === 0){
                    //getting old picture path from database
                    $userObj= new UserController();
                    $data= $userObj->getManufacturers("DetailsArray", array("man_id"=>$man_id, "output"=>"PHP"));
                    $manIMG= $data[2]; //man_img

                    updateManufacturer($man_id, $manufacturerName, $manIMG, $description);

                }else{
                    $imageFileType = strtolower(pathinfo($manIMG,PATHINFO_EXTENSION));
                    $imageSize= @getimagesize($_FILES['man_img']['tmp_name']);
                    $widht= $imageSize[0];
                    $height= $imageSize[1];

                    $folderToUploadPicture= "../../assets/images/products/manufacturers_images/";
                    $manIMG= $folderToUploadPicture . $manIMG;
                    $imageFileType = strtolower(pathinfo($manIMG,PATHINFO_EXTENSION));

                // Allow certain file formats
             if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {

                $arr= array("Error", "Only JPG, PNG file types are allowed.");
                        $_SESSION['notifStatus']= $arr;
                        redirect_to("/iry-cpanel/public/manageManufacturers");
                }else{

                    // Check file size, max upload size is 1MB
                    if ($_FILES["man_img"]["size"] < 1000000) {
                    
                        if($widht < 60 OR $height < 60){
                            if(move_uploaded_file($picture_tmpName, $manIMG)){
                                $manIMG= substr($manIMG, 6);
            
                                updateManufacturer($man_id, $manufacturerName, $manIMG, $description);
                            }else{
                                    $arr= array("Error", "There is an error in uploading Image.");
                                    $_SESSION['notifStatus']= $arr;
                                    redirect_to("/iry-cpanel/public/manageManufacturers");
                                }
                            }else{
                                $arr= array("Error", "Maximum allowed image dimensions are (60x60)");
                                $_SESSION['notifStatus']= $arr;
                                redirect_to("/iry-cpanel/public/manageManufacturers");
                            }
                            
                    }else{
                        $arr= array("Error", "Image file size should be less than 1 MB");
                        $_SESSION['notifStatus']= $arr;
                        redirect_to("/iry-cpanel/public/manageManufacturers");
                    }
                }
                }
    
            
            
            break;




        case 'deleteManufacturer':

            $manID= trim(filter_var($_POST['id'], FILTER_SANITIZE_STRING));
            deleteManufacturer($manID);

            break;

        
            case 'deleteProduct':

                $productID= trim(filter_var($_POST['id'], FILTER_SANITIZE_STRING));
                deleteProduct($productID);
    
                break;
        

         case 'addProduct':
            $folderToUploadPicture= "../../assets/images/products/products_images/";

            $deviceName= trim(filter_var($_POST['device_name'], FILTER_SANITIZE_STRING));
            $model= trim(filter_var($_POST['model'], FILTER_SANITIZE_STRING));
            $manufacturer= trim(filter_var($_POST['manufacturer'], FILTER_SANITIZE_STRING));
            $productImage= $folderToUploadPicture . basename($_FILES['product_img']['name']);
            $picture_tmpName= $_FILES['product_img']['tmp_name'];

            $imageFileType = strtolower(pathinfo($productImage,PATHINFO_EXTENSION));
            $imageSize= @getimagesize($_FILES['product_img']['tmp_name']);
            $widht= $imageSize[0];
            $height= $imageSize[1];

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {

                $arr= array("Error", "Only JPG, PNG file types are allowed.");
                        $_SESSION['notifStatus']= $arr;
                        redirect_to("/iry-cpanel/public/manageProducts");
                }else{

                    // Check file size, max upload size is 1MB
                    if ($_FILES["product_img"]["size"] < 1000000) {
                        //check for image dimensions
                        if($widht < 60 OR $height < 60){
                            if(move_uploaded_file($picture_tmpName, $productImage)){
                                $productImage= substr($productImage, 6);
            
                                addProduct($deviceName, $model, $manufacturer, $productImage);
                            }else{
                                    $arr= array("Error", "There is an error in uploading Image.");
                                    $_SESSION['notifStatus']= $arr;
                                    redirect_to("/iry-cpanel/public/manageProducts");
                                }  
                        }else{
                            $arr= array("Error", "Maximum allowed image dimensions are (60x60)");
                            $_SESSION['notifStatus']= $arr;
                            redirect_to("/iry-cpanel/public/manageProducts");
                        }
                               
                    }else{
                        $arr= array("Error", "Image file size should be less than 1 MB");
                        $_SESSION['notifStatus']= $arr;
                        redirect_to("/iry-cpanel/public/manageProducts");
                    }
                }
                             
            break;



        case 'updateProduct':

            $deviceName= trim(filter_var($_POST['device_name'], FILTER_SANITIZE_STRING));
            $model= trim(filter_var($_POST['model'], FILTER_SANITIZE_STRING));
            $productImage= basename($_FILES['product_img']['name']);
            $picture_tmpName= $_FILES['product_img']['tmp_name'];
            $producrID= trim(filter_var($_POST['p_id'], FILTER_SANITIZE_STRING));

            if(strlen($productImage) === 0){
                //getting old picture path from database
                $userObj= new UserController();
                $data= $userObj->getProducts("DetailsArray", array("product_id"=>$producrID, "output"=>"PHP"));
                $productIMG= $data[4]; //model_img

                updateProduct($producrID, $deviceName, $model, $productIMG);

            }else{
                $imageFileType = strtolower(pathinfo($productImage,PATHINFO_EXTENSION));
                $imageSize= @getimagesize($_FILES['product_img']['tmp_name']);
                $widht= $imageSize[0];
                $height= $imageSize[1];

                $folderToUploadPicture= "../../assets/images/products/products_images/";
                $productImage= $folderToUploadPicture . $productImage;
                $imageFileType = strtolower(pathinfo($productImage,PATHINFO_EXTENSION));

            // Allow certain file formats
         if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {

            $arr= array("Error", "Only JPG, PNG file types are allowed.");
                    $_SESSION['notifStatus']= $arr;
                    redirect_to("/iry-cpanel/public/manageProducts");
            }else{

                // Check file size, max upload size is 1MB
                if ($_FILES["product_img"]["size"] < 1000000) {
                
                    if($widht < 60 OR $height < 60){
                        if(move_uploaded_file($picture_tmpName, $productImage)){
                            $productImage= substr($productImage, 6);
        
                            updateProduct($producrID, $deviceName, $model, $productImage);
                        }else{
                                $arr= array("Error", "There is an error in uploading Image.");
                                $_SESSION['notifStatus']= $arr;
                                redirect_to("/iry-cpanel/public/manageProducts");
                            }
                        }else{
                            $arr= array("Error", "Maximum allowed image dimensions are (60x60)");
                            $_SESSION['notifStatus']= $arr;
                            redirect_to("/iry-cpanel/public/manageProducts");
                        }
                        
                }else{
                    $arr= array("Error", "Image file size should be less than 1 MB");
                    $_SESSION['notifStatus']= $arr;
                    redirect_to("/iry-cpanel/public/manageProducts");
                }
            }
            }
                             
            break;



        case 'addDeviceProblem':

            $manufacturer= trim(filter_var($_POST['manufacturer'], FILTER_SANITIZE_STRING));
            $model= trim(filter_var($_POST['model'], FILTER_SANITIZE_STRING));
            $problem_title= trim(filter_var($_POST['problem_title'], FILTER_SANITIZE_STRING));
            $problem_price= trim(filter_var($_POST['problem_price'], FILTER_SANITIZE_STRING));
            $problem_description= trim(filter_var($_POST['problem_description'], FILTER_SANITIZE_STRING));

                addDeviceProblem($manufacturer, $model, $problem_title, $problem_description, $problem_price);
                        
            break;


        case 'updateDeviceProblem':

                $problemID= trim(filter_var($_POST['p_id'], FILTER_SANITIZE_STRING));
                $problem_title= trim(filter_var($_POST['problem_title'], FILTER_SANITIZE_STRING));
                $problem_price= trim(filter_var($_POST['problem_price'], FILTER_SANITIZE_STRING));
                $problem_description= trim(filter_var($_POST['problem_description'], FILTER_SANITIZE_STRING));
    
                updateDeviceProblem($problemID, $problem_title, $problem_description, $problem_price);
                            
                break;


        case 'deleteDeviceProblem':

            $problemID= trim(filter_var($_POST['id'], FILTER_SANITIZE_STRING));
            deleteDeviceProblem($problemID);

            break;


        case 'deleteAppointment':

            $appID= trim(filter_var($_POST['id'], FILTER_SANITIZE_STRING));
            deleteAppointment($appID);

            break;


    default:

    echo "ERROR: ERR_DATAPARSER";


}
}
?>