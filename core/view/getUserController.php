<?php
require_once("../modal/initialize.php");
global $link;
 $UserController = new UserController();

if(isset($_GET['f'])){
$func= $_GET['f'];

switch($func){

        case 'getManufacturerDetails':

            $manID= trim(filter_var($_POST['id'], FILTER_SANITIZE_STRING));
            echo $UserController->getManufacturers("DetailsArray", array("man_id"=>$manID, "output"=>"JS"));

            break;

        case 'getProductDetails':

            $product_id= trim(filter_var($_POST['id'], FILTER_SANITIZE_STRING));
            $arr= $UserController->getProducts("DetailsArray", array("product_id"=>$product_id, "output"=>"PHP"));

            //html response
            echo "

            <div class='form-group row'>
                <div class='col-sm-6'>
                    <input type='text' class='form-control' id='manufacturer' value='$arr[3]' disabled>
                </div>
                <div class='col-sm-6'>
                    <input type='text' class='form-control' name='device_name' id='device_name_u' value='$arr[1]' placeholder='Device Name' required>
                </div>
            </div>
            <div class='form-group row'>
                <div class='col-sm-6'>
                    <input type='text' class='form-control' name='model' id='model_u' value='$arr[2]' placeholder='Model Name' required>
                </div>
                <div class='col-sm-6'>
                    <input type='file' class='form-control' name='product_img' id='product_img'>
                </div>
            </div>
                <input type='hidden' name='p_id' id='p_id_u' value='$arr[0]'>
            ";

            break;
        
        case 'getModelsOptions':

            $manID= trim(filter_var($_POST['man'], FILTER_SANITIZE_STRING));
            echo $UserController->getProducts("ListForDropDown", array("man_id"=>$manID));
            break;

        case 'getDeviceProblemDetails':

            $problemID= trim(filter_var($_POST['id'], FILTER_SANITIZE_STRING));
            echo $UserController->getProblems("DetailsArray", array("problem_id"=>$problemID, "output"=>"JS"));
            break;

        case 'getAppointmentDetails':

            $appID= trim(filter_var($_POST['id'], FILTER_SANITIZE_STRING));
            $arr= $UserController->getAppointments("DetailsArray", array("appointment_id"=>$appID, "output"=>"PHP"));

            //array to string
            $problemsTitle= NULL;
            for($i=0; $i<count($arr[10]); $i++){
                $serial= $i+1;
                $probs= "<br>" . $serial . ": " . $arr[10][$i];
                $problemsTitle .= $probs;
            }

            //html response
            echo "

             <ul class='nav nav-tabs' role='tablist'>
                                                            <li class='nav-item'>
                                                                <a class='nav-link active' data-toggle='tab' href='#appointmentInfo' role='tab'>App. Info</a>
                                                            </li>
                                                            <li class='nav-item'>
                                                                <a class='nav-link' data-toggle='tab' href='#deviceInfo' role='tab'>Device Info</a>
                                                            </li>
                                                            <li class='nav-item'>
                                                                <a class='nav-link' data-toggle='tab' href='#customerInfo' role='tab'>Customer Info</a>
                                                            </li>
                                                            <li class='nav-item'>
                                                                <a class='nav-link' data-toggle='tab' href='#otherInfo' role='tab'>Other Info</a>
                                                            </li>
                                                        </ul>
                                                        <div class='tab-content modal-body'>
                                                            <div class='tab-pane active' id='appointmentInfo' role='tabpanel'>
                                                                    <div class='form-group row'>
                                                                        <div class='col-sm-6'>
                                                                            <p id='appID'>App#: $arr[1]</p>
                                                                        </div>
                                                                        <div class='col-sm-6'>
                                                                            <p id='c_f_name'>Quote Price: $arr[12]</p>
                                                                        </div>
                                                                    </div>   
                                                                     <div class='form-group row'>
                                                                        <div class='col-sm-12'>
                                                                            <p id='appID'>Appointment Slot: $arr[14]</p>
                                                                        </div>
                                                                    </div>   
                                                                    <div class='form-group row'>
                                                                        <div class='col-sm-12'>
                                                                            <p id='appID'>Confirmation Time: $arr[16]</p>
                                                                        </div>
                                                                    </div>   
                                                            </div>
                                                            <div class='tab-pane' id='deviceInfo' role='tabpanel'>
                                                                <div class='form-group row'>
                                                                        <div class='col-sm-8'>
                                                                            <p id='appID'>Device Name: $arr[9]</p>
                                                                        </div>
                                                                        <div class='col-sm-4'>
                                                                            <p id='appID'>IMEI#: $arr[6]</p>
                                                                        </div>
                                                                    </div>    
                                                                     <div class='form-group row'>
                                                                        <div class='col-sm-12'>
                                                                            <p id='appID'>Device Problems: $problemsTitle</p>
                                                                        </div>
                                                                    </div>   
                                                                    <div class='form-group row'>
                                                                        <div class='col-sm-12'>
                                                                            <p id='appID'>Customer Defined Problems: <br> 1: $arr[11]</p>
                                                                        </div>
                                                                    </div>   
                                                            </div>
                                                            <div class='tab-pane' id='customerInfo' role='tabpanel'>
                                                                <div class='form-group row'>
                                                                        <div class='col-sm-4'>
                                                                            <p>First Name: $arr[2]</p>
                                                                        </div>
                                                                        <div class='col-sm-4'>
                                                                            <p>Last Name: $arr[3]</p>
                                                                        </div>
                                                                        <div class='col-sm-4'>
                                                                            <p>Type: $arr[13]</p>
                                                                        </div>
                                                                    </div>   
                                                                    <div class='form-group row'>
                                                                        <div class='col-sm-8'>
                                                                            <p>Email: $arr[4]</p>
                                                                        </div>
                                                                        <div class='col-sm-4'>
                                                                            <p>Phone: $arr[5]</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class='form-group row'>
                                                                        <div class='col-sm-12'>
                                                                            <p>Address: $arr[7]</p>
                                                                        </div>
                                                                    </div>  
                                                                    <div class='form-group row'>
                                                                        <div class='col-sm-12'>
                                                                            <p>Message: $arr[8]</p>
                                                                        </div>
                                                                    </div>  
                                                            </div>
                                                            <div class='tab-pane' id='otherInfo' role='tabpanel'>
                                                                <div class='form-group row'>
                                                                        <div class='col-sm-12'>
                                                                            <p>Feedback: $arr[15]</p>
                                                                        </div>
                                                                    </div>  
                                                            </div>
                                                        </div>
                    
                                           

            ";

            break;

    default:

    echo "ERROR: ERR_DATAPARSER";


}
}
?>