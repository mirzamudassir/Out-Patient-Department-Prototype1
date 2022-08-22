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

            if($result['status'] === true){
                $ticketNumber= $result['ticketNumber'];

                echo json_encode(array('true', 'Message Sent', 'Ticket #: ' . $ticketNumber . '. We will contact you soon.'));
            }elseif($result['status'] === false){
                echo json_encode(array('false', 'Message Not Sent', 'Kindly try again later.'));
            }

            break;
        
        case 'signUp':
            //create the new ticket instance
            $SupportTicket= new SupportTicket();

            //collect the ticket parameters from the contact us page
            $ticketParams= array("name" => $_POST['name'], "contactNumber"=>$_POST['contactNumber'], "email"=>$_POST['email'], 
                           "messageTitle"=>$_POST['messageTitle'], "messageBody"=>$_POST['messageBody']);
            
            $result= $SupportTicket->generateSupportTicket($ticketParams);

            if($result['status'] === true){
                $ticketNumber= $result['ticketNumber'];

                echo json_encode(array('true', 'Message Sent', 'Ticket #: ' . $ticketNumber . '. We will contact you soon.'));
            }elseif($result['status'] === false){
                echo json_encode(array('false', 'Message Not Sent', 'Kindly try again later.'));
            }

            break;
        


        default:
        echo "ERR_P_CONTROLLER";

    }


}


    
?>