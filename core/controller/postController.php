<?php
require_once(dirname(dirname(__FILE__)) . "/modal/initialize.php");
require_once('classes/SupportTicket.class.php');

if(isset($_GET['m'])){
    $method= $_GET['m'];

    switch($method){

        case 'contactUs':
            //create the new ticket instance
            $SupportTicket= new SupportTicket();

            //collect the ticket parameters from the contact us page
            $ticketParams= array("name" => $_POST['name'], "contactNumber"=>$_POST['contactNumber'], "email"=>$_POST['email'], 
                           "messageTitle"=>$_POST['messageTitle'], "messageBody"=>$_POST['messageBody']);
            
            $result= $SupportTicket->generateSupportTicket($ticketParams);

            if($result==1){
                    $arr= array("Success", "Message Sent.");
                    $_SESSION['notifStatus']= $arr;
                    redirect_to($appBaseURL . "/systemContactUs"); 
            }elseif($result==0){
                    $arr= array("Error", "Message not Sent.");
                    $_SESSION['notifStatus']= $arr;
                    redirect_to($appBaseURL . "/systemContactUs"); 
            }

            break;
        


        default:
        echo "ERR_CONTROLLER";

    }


}


    
?>