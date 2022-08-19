<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/core/modal/initialize.php');

function renderView($userID, $accessLevel, $callBackURL){
    global $sessSalt;
    global $appBaseURL;
    global $loginURL;
    $rootAdrr= $_SERVER['DOCUMENT_ROOT'];
    
    switch($accessLevel){
        case 'ADMIN':

            if(isAdminValid($userID) === TRUE){
                
                //$sessID= session_id() . $sessSalt;
                include "$rootAdrr/opd/core/view/adminView/admin$callBackURL.inc.php";

            }else{
                header("Location: $sandboxURL?error=ERR_ACCESS_DENIED");
                session_unset();
                session_destroy();
                exit();
                return false;
            }

            break;

        
        case 'USER':
            
            if(isEmployeeValid($userID) === TRUE){

                //$sessID= session_id() . $sessSalt;
                include "$rootAdrr/opd/core/view/employeeView/employee$callBackURL.php";
            }else{
                header("Location: $sandboxURL?error=ERR_ACCESS_DENIED");
                session_unset();
                session_destroy();
                exit();
                return false;
            }

            break;
        
            default:
            $_SESSION['message']= "Please Sign In to continue";
            redirect_to($loginURL);
                exit();
            return false;
            
    }

}




?>