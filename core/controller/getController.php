<?php
require_once(dirname(dirname(__FILE__)) . "/modal/initialize.php");
require_once('classes/User.class.php');

if(isset($_GET['f'])){
    $method= $_GET['f'];

    switch($method){

        case 'checkUsernameAvailability':
            //create the new ticket instance
            $User= new User();

            //collect the input and sanitize
            $username = sanitizeInput(array("inputDataType"=>"STRING", "input"=>$_POST['username']));
            
            echo $User->checkUsernameAvailability($username);

            //dispose the objects
            $User= NULL;

            break;

        case 'checkPassword':
            $password= $_POST['password'];

             // Check password length
            if(strlen($password)<8){
            $response = "<span style='color: red;'>Password should be at least 8 characters long.</span>";
            echo $response;
            }else{
                $response= "false";
                echo $response;
            }

            break;
        


        default:
        echo "ERR_G_CONTROLLER";

    }


}


    
?>