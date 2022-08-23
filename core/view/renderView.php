<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/core/modal/initialize.php');

function renderView($username, $userAccessLevel, $callBackURL){
    global $sessSalt;
    global $appBaseURL;
    global $loginURL;
    $rootAdrr= $_SERVER['DOCUMENT_ROOT'];
    
    switch($userAccessLevel){
        case 'ROOT':

            /* if(authorization($userID) === TRUE){
                
                //$sessID= session_id() . $sessSalt;
                include "$rootAdrr/opd/core/view/adminView/admin$callBackURL.inc.php";

            }else{
                header("Location: $sandboxURL?error=ERR_ACCESS_DENIED");
                session_unset();
                session_destroy();
                exit();
                return false;
            } */
            redirectTo($signInURL);
            session_unset();
            session_destroy();
            exit();
            return false;

            break;


        case 'ADMIN':

            /* if(authorization($userID) === TRUE){
                
                //$sessID= session_id() . $sessSalt;
                include "$rootAdrr/opd/core/view/adminView/admin$callBackURL.inc.php";

            }else{
                header("Location: $sandboxURL?error=ERR_ACCESS_DENIED");
                session_unset();
                session_destroy();
                exit();
                return false;
            } */
                redirectTo($signInURL);
                session_unset();
                session_destroy();
                exit();
                return false;

            break;

        
        case 'USER':
            
            $params= array("username"=>$username, "userAccessLevel"=>"USER");
            if(authorization($params) === 'true'){

                //$sessID= session_id() . $sessSalt;
                include "$rootAdrr/opd/core/view/userView/user$callBackURL.php";
            }else{
                redirectTo($signInURL);
                session_unset();
                session_destroy();
                exit();
                return false;
            }

            break;
        
            default:
            $_SESSION['message']= "Please Sign In to continue";
            redirect_to($signInURL);
                exit();
            return false;
            
    }

}




?>