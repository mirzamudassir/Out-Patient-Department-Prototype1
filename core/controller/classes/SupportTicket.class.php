<?php
require_once(dirname(__FILE__,3) . "/modal/initialize.php");

class SupportTicket{

    //define the ticket attributes
    private $ticketNumber;
    private $ticketFrom;
    private $ticketContact;
    private $ticketEmail;
    private $ticketTitle;
    private $ticketQuery;
    private $ticketResponse;
    private $ticketResponsePostedBy;
    private $ticketStatus;
    private $ticketCreatedAt;
    private $ticketUpdatedAt;
    private $ticketRemarks;

    //define constructor
    public function __construct(){

    }

    //method to create the new ticket instance
    //parameters data type is array and can be accessed via key name.
    public function generateSupportTicket($ticketParams){

        //set the ticket attributes and sanitize the inputs
        $this->ticketNumber= $this->generateTicketNumber();
        $this->ticketFrom= sanitizeInput(array("inputDataType" => "STRING", "input" => $ticketParams['name']));
        $this->ticketContact= sanitizeInput(array("inputDataType" => "INT", "input" => $ticketParams['contactNumber']));
        $this->ticketEmail= sanitizeInput(array("inputDataType" => "EMAIL", "input" => $ticketParams['email']));
        $this->ticketTitle= sanitizeInput(array("inputDataType" => "STRING", "input" => $ticketParams['messageTitle']));
        $this->ticketQuery= sanitizeInput(array("inputDataType" => "STRING", "input" => $ticketParams['messageBody']));
        $this->ticketResponse= 'NULL';
        $this->ticketResponsePostedBy= 'NULL';
        $this->ticketStatus= 'POSTED';
        $this->ticketCreatedAt= date("F j, Y, g:i a");
        $this->ticketUpdatedAt= 'NULL';
        $this->ticketRemarks= 'NULL';


        //getting the instance of Database Connection
            global $link;

         //first insert the relevant data in user_accounts table that will manage login
            $stmt= $link->prepare("INSERT INTO `opd_support_tickets` (ticketNumber, ticketFrom, ticketContact, ticketEmail, ticketTitle, ticketQuery,
                                                ticketResponse, ticketResponsePostedBy, ticketStatus, ticketCreatedAt, ticketUpdatedAt, ticketRemarks)
                                          VALUES (:ticketNumber, :ticketFrom, :ticketContact, :ticketEmail, :ticketTitle, :ticketQuery,
                                                :ticketResponse, :ticketResponsePostedBy, :ticketStatus, :ticketCreatedAt, :ticketUpdatedAt, :ticketRemarks)");
            $stmt->bindParam(":ticketNumber", $this->ticketNumber, PDO::PARAM_STR);
            $stmt->bindParam(":ticketFrom", $this->ticketFrom, PDO::PARAM_STR);
            $stmt->bindParam(":ticketContact", $this->ticketContact, PDO::PARAM_STR);
            $stmt->bindParam(":ticketEmail", $this->ticketEmail, PDO::PARAM_STR);
            $stmt->bindParam(":ticketTitle", $this->ticketTitle, PDO::PARAM_STR);
            $stmt->bindParam(":ticketQuery", $this->ticketQuery, PDO::PARAM_STR);
            $stmt->bindParam(":ticketResponse", $this->ticketResponse, PDO::PARAM_STR);
            $stmt->bindParam(":ticketResponsePostedBy", $this->ticketResponsePostedBy, PDO::PARAM_STR);
            $stmt->bindParam(":ticketStatus", $this->ticketStatus, PDO::PARAM_STR);
            $stmt->bindParam(":ticketCreatedAt", $this->ticketCreatedAt, PDO::PARAM_STR);
            $stmt->bindParam(":ticketUpdatedAt", $this->ticketUpdatedAt, PDO::PARAM_STR);
            $stmt->bindParam(":ticketRemarks", $this->ticketRemarks, PDO::PARAM_STR);
        
            //run the query
            if($stmt->execute()){
                $result= array("status"=>"true", "ticketNumber"=>$this->ticketNumber);
                return $result;
            }else{
                $result= array("status"=>"false", "ticketNumber"=>"NULL");
                return $result;
            }

                    //dispose the db connection
                    $link= NULL;
                    $stmt= NULL;
    }


    //method to generate a unique ticket Number
    private function generateTicketNumber(){
        $prefix= "OPD";
        $salt= rand(100,999);

        $year= date("y");
        $month= date("m");
        $day= date("d");
        $time= substr(time(), 7, 7);

        $ticketNumber= $prefix . $day . $time . $salt;

        return $ticketNumber;
    }

}



?>