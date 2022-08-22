<?php
require_once(APP_ROOT . "/modal/initialize.php");
require_once('User.class.php');

class Patient extends User{

    //define the patient attributes
    private $mrNumber;
    private $patientFullName;
    private $patientGender;
    private $patientAge;
    private $patientContactNumber;
    private $patientEmail;
    private $patientAddress;
    private $patientStatus;
    private $patientPreMedHistory;
    private $patientRegisteredBy;
    private $patientRegisteredAt;
    private $patientUpdatedBy;
    private $patientUpdatedAt;
    private $patientRemarks;

    //define constructor
    public function __construct(){

    }

    //create the new patient instance
    //parameters data type is array and can be accessed via key name.
    public function registerNewPatientSelf($params){

        //set the patient attributes
        $this->mrNumber= $this->generateMrNumber();
        $this->patientFullName= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['fullName']));
        $this->patientGender= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['gender']));
        $this->patientAge= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['age']));
        $this->patientContactNumber= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['contactNumber']));
        $this->patientEmail= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['email']));
        $this->patientAddress= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['address']));
        $this->patientStatus= 'ACTIVE';
        $this->patientPreMedHistory= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['previousMedicalHistory']));
        $this->patientRegisteredBy= 'SELF';
        $this->patientRegisteredAt= date("F j, Y, g:i a");
        $this->patientUpdatedBy= 'NULL';
        $this->patientUpdatedAt= 'NULL';
        $this->patientRemarks= 'Self registered through website.';

        //getting the instance of Database Connection
        global $link;

        //first insert the relevant data in user_accounts table that will manage login
           $stmt= $link->prepare("INSERT INTO `opd_patients` (mrNumber, patientFullName, patientGender, patientAge, patientContactNumber,
                                               patientEmail, patientAddress, patientStatus, patientPreMedHistory, patientRegisteredBy,
                                               patientRegisteredAt, patientUpdatedBy, patientUpdatedAt, patientRemarks)
                                         VALUES (:mrNumber, :patientFullName, :patientGender, :patientAge, :patientContactNumber,
                                                :patientEmail, :patientAddress, :patientStatus, :patientPreMedHistory, :patientRegisteredBy,
                                                :patientRegisteredAt, :patientUpdatedBy, :patientUpdatedAt, :patientRemarks)");
           $stmt->bindParam(":mrNumber", $this->mrNumber, PDO::PARAM_STR);
           $stmt->bindParam(":patientFullName", $this->patientFullName, PDO::PARAM_STR);
           $stmt->bindParam(":patientGender", $this->patientGender, PDO::PARAM_STR);
           $stmt->bindParam(":patientAge", $this->patientAge, PDO::PARAM_INT);
           $stmt->bindParam(":patientContactNumber", $this->patientContactNumber, PDO::PARAM_STR);
           $stmt->bindParam(":patientEmail", $this->patientEmail, PDO::PARAM_STR);
           $stmt->bindParam(":patientAddress", $this->patientAddress, PDO::PARAM_STR);
           $stmt->bindParam(":patientStatus", $this->patientStatus, PDO::PARAM_STR);
           $stmt->bindParam(":patientPreMedHistory", $this->patientPreMedHistory, PDO::PARAM_STR);
           $stmt->bindParam(":patientRegisteredBy", $this->patientRegisteredBy, PDO::PARAM_STR);
           $stmt->bindParam(":patientRegisteredAt", $this->patientRegisteredAt, PDO::PARAM_STR);
           $stmt->bindParam(":patientUpdatedBy", $this->patientUpdatedBy, PDO::PARAM_STR);
           $stmt->bindParam(":patientUpdatedAt", $this->patientUpdatedAt, PDO::PARAM_STR);
           $stmt->bindParam(":patientRemarks", $this->patientRemarks, PDO::PARAM_STR);
       
           //run the query
           if($stmt->execute()){

                //after the successfull patient registration, user account against the patient will be generated.
                parent::registerNewUser();

               $result= array("status"=>true, "mrNumber"=>$this->mrNumber);
               return $result;
           }else{
               $result= array("status"=>false, "mrNumber"=>"NULL");
               return $result;
           }

                   //dispose the db connection
                   $link= NULL;
                   $stmt= NULL;
        
        
    }

    //generate a unique MR Number (Medical Record number) for patient
    private function generateMrNumber(){
        //$prefix= "OPD";
        $salt= rand(100,999);

        $year= date("y");
        $month= date("m");
        $day= date("d");
        $time= substr(time(), 7, 7);

        $mrNumber= $year. $month . $day . $time . $salt;

        return $mrNumber;
    }

}



?>