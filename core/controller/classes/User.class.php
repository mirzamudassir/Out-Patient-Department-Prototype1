<?php
require_once(APP_ROOT . "/modal/initialize.php");

class User{
  //define the attributes for User Account
  private $username;
  private $passwordHash;
  private $userRole;
  private $userAccessLevel;
  private $userType;
  private $userAccountSatus;
  private $userSecurityQuestion;
  private $userSecurityAnswer;
  private $failedLoginCount;
  private $accountBlockedAt;
  private $accountUnblockedAt;
  private $userIP;
  private $userRegisteredBy;
  private $userRegisteredAt;
  private $userUpdatedBy;
  private $userUpdatedAt;
  private $userRemarks;



    //protected method to register a new user to database
    //this method requrires a unique registration number e.g MR Number, Employee ID, Doctor ID....
    final protected function registerNewUser($params){

      //generate the password hash from user input
      $plainTextPassword= $params['password'];
      $passwordHash= $this->generatePasswordHash($plainTextPassword);

      //get the registration number of user from the parameters list
      $registrationNumber= $params['registrationNumber'];

      //set the patient attributes
      $this->username= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['username']));
      $this->passwordHash= $passwordHash;
      $this->userRole= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['userRole']));
      $this->userAccessLevel= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['userAccessLevel']));
      $this->userType= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['userType']));
      $this->userAccountSatus= 'ACTIVE';
      $this->userSecurityQuestion= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['securityQuestion']));
      $this->userSecurityAnswer= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['securityAnswer']));
      $this->failedLoginCount= 0;
      $this->accountBlockedAt= 'NULL';
      $this->accountUnblockedAt= 'NULL';
      $this->userIP= 'NULL';
      $this->userRegisteredBy= 'SELF';
      $this->userRegisteredAt= date("F j, Y, g:i a");
      $this->userUpdatedBy= 'NULL';
      $this->userUpdatedAt= 'NULL';
      $this->userRemarks= 'Self registered through website.';

      //getting the instance of Database Connection
      global $link;

      //first insert the relevant data in user_accounts table that will manage login
         $stmt= $link->prepare("INSERT INTO `opd_user_accounts` (registrationNumber, username, passwordHash, userRole, userAccessLevel,
                                             userType, userAccountSatus, userSecurityQuestion, userSecurityAnswer, failedLoginCount, accountBlockedAt, accountUnblockedAt,
                                             userIP, userRegisteredBy, userRegisteredAt, userUpdatedBy, userUpdatedAt userRemarks)
                                       VALUES (:registrationNumber, :username, :passwordHash, :userRole, :userAccessLevel,
                                              :userType, :userAccountSatus, :userSecurityQuestion, :userSecurityAnswer, :failedLoginCount, :accountBlockedAt, :accountUnblockedAt,
                                              :userIP, :userRegisteredBy, :userRegisteredAt, :userUpdatedBy, :userUpdatedBy, :userRemarks)");
         $stmt->bindParam(":registrationNumber", $this->mrNumber, PDO::PARAM_STR);
         $stmt->bindParam(":username", $this->patientFullName, PDO::PARAM_STR);
         $stmt->bindParam(":passwordHash", $this->patientGender, PDO::PARAM_STR);
         $stmt->bindParam(":userRole", $this->patientAge, PDO::PARAM_INT);
         $stmt->bindParam(":userAccessLevel", $this->patientContactNumber, PDO::PARAM_STR);
         $stmt->bindParam(":userType", $this->patientEmail, PDO::PARAM_STR);
         $stmt->bindParam(":userAccountSatus", $this->patientAddress, PDO::PARAM_STR);
         $stmt->bindParam(":userSecurityQuestion", $this->userSecurityQuestion, PDO::PARAM_STR);
         $stmt->bindParam(":userSecurityAnswer", $this->userSecurityAnswer, PDO::PARAM_STR);
         $stmt->bindParam(":failedLoginCount", $this->patientStatus, PDO::PARAM_STR);
         $stmt->bindParam(":accountBlockedAt", $this->patientPreMedHistory, PDO::PARAM_STR);
         $stmt->bindParam(":accountUnblockedAt", $this->patientRegisteredBy, PDO::PARAM_STR);
         $stmt->bindParam(":userIP", $this->patientRegisteredAt, PDO::PARAM_STR);
         $stmt->bindParam(":userRegisteredBy", $this->patientUpdatedBy, PDO::PARAM_STR);
         $stmt->bindParam(":userRegisteredAt", $this->patientUpdatedAt, PDO::PARAM_STR);
         $stmt->bindParam(":userUpdatedBy", $this->userUpdatedBy, PDO::PARAM_STR);
         $stmt->bindParam(":userUpdatedAt", $this->userUpdatedAt, PDO::PARAM_STR);
         $stmt->bindParam(":userRemarks", $this->patientRemarks, PDO::PARAM_STR);
     
         //run the query
         if($stmt->execute()){
             $result= array("status"=>true);
             return $result;
         }else{
             $result= array("status"=>false);
             return $result;
         }

                 //dispose the db connection
                 $link= NULL;
                 $stmt= NULL;

    }

    

    //this method will check the username availability from the database
    public function checkUsernameAvailability($username){
      //get the database connection
      global $link;
      
      // Check username
      $stmt = $link->prepare("SELECT * FROM `opd_user_accounts` WHERE username='" . $username . "'");
      $stmt->execute();
   
      $response = "false";
      if($stmt->rowCount()>0){
         $response = "<span style='color: red;'>Username is Not Available.</span>";
      }
   
      return $response;
      exit;

                          //dispose the db connection
                          $link= NULL;
                          $stmt= NULL;
    }



    //this method will generate the password hash from the plain text
    private function generatePasswordHash($plainText){

      //using default bcrypt hsahing technique
      $passwordHash= password_hash($plainText, PASSWORD_DEFAULT);
      return $passwordHash;
    }
    
}


?>