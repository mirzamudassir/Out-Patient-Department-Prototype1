<?php
require_once(APP_ROOT . "/modal/initialize.php");

class Patient{

    //define the patient attributes
    private $mrNumber;
    private $fullName;
    private $gender;
    private $age;
    private $contactNumber;
    private $email;
    private $address;
    private $previousMedicalHistory;

    //define constructor
    public function __construct(){

    }

    //create the new patient instance
    //parameters data type is array and can be accessed via key name.
    public function registerPatient($params){

        //set the patient attributes
        $this->mrNumber= $this->generateMrNumber();
        $this->fullName= $params['fullName'];
        $this->gender= $params['gender'];
        $this->age= $params['age'];
        $this->contactNumber= $params['contactNumber'];
        $this->email= $params['email'];
        $this->address= $params['address'];
        $this->previousMedicalHistory= $params['previousMedicalHistory'];
        
        
    }

    //generate a unique MR Number (Medical Record number) for patient
    private function generateMrNumber(){
        $prefix= "OPD";
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