<?php
require_once(APP_ROOT . "/modal/initialize.php");

class User{
  //define the attributes for User Account
  private $registrationNumber;
  private $username;
  private $passwordHash;
  private $userRole;
  private $userAccessLevel;
  private $userAccountSatus;
  private $userSecurityQuestion;
  private $userSecurityAnswer;
  private $accountBlockedAt;
  private $accountUnblockedAt;
  private $userRegisteredBy;
  private $userRegisteredAt;
  private $userUpdatedBy;
  private $userUpdatedAt;
  private $userRemarks;



    //protected method to register a new user to database
    //this method requrires a unique registration number e.g MR Number, Employee ID, Doctor ID....
    protected function registerNewUser($params){

      //generate the password hash from user input
      $plainTextPassword= $params['password'];
      $passwordHash= $this->generateHash($plainTextPassword);

      //generate the security answer hash
      $plainTextSecurityAnswer= $params['userSecurityAnswer'];
      $securityAnswerHash= $this->generateHash($plainTextSecurityAnswer);

      //collect, sanitize and set the patient attributes
      $this->registrationNumber= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['registrationNumber']));
      $this->username= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['username']));
      $this->passwordHash= $passwordHash;
      $this->userRole= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['userRole']));
      $this->userAccessLevel= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['userAccessLevel']));
      $this->userAccountStatus= 'ACTIVE';
      $this->userSecurityQuestion= sanitizeInput(array("inputDataType" => "STRING", "input" => $params['userSecurityQuestion']));
      $this->userSecurityAnswer= $securityAnswerHash;
      $this->accountBlockedAt= 'NULL';
      $this->accountUnblockedAt= 'NULL';
      $this->userRegisteredBy= 'SELF';
      $this->userRegisteredAt= date("F j, Y, g:i a");
      $this->userUpdatedBy= 'NULL';
      $this->userUpdatedAt= 'NULL';
      $this->userRemarks= 'Self registered through website.';

      //getting the instance of Database Connection
      global $link;

      //first insert the relevant data in user_accounts table that will manage login
         $stmt= $link->prepare("INSERT INTO `opd_user_accounts` (registrationNumber, username, passwordHash, userRole, userAccessLevel,
                                             userAccountStatus, userSecurityQuestion, userSecurityAnswer, accountBlockedAt, accountUnblockedAt,
                                             userRegisteredBy, userRegisteredAt, userUpdatedBy, userUpdatedAt, userRemarks)
                                       VALUES (:registrationNumber, :username, :passwordHash, :userRole, :userAccessLevel,
                                              :userAccountStatus, :userSecurityQuestion, :userSecurityAnswer, :accountBlockedAt, :accountUnblockedAt,
                                              :userRegisteredBy, :userRegisteredAt, :userUpdatedBy, :userUpdatedAt, :userRemarks)");
         $stmt->bindParam(":registrationNumber", $this->registrationNumber, PDO::PARAM_STR);
         $stmt->bindParam(":username", $this->username, PDO::PARAM_STR);
         $stmt->bindParam(":passwordHash", $this->passwordHash, PDO::PARAM_STR);
         $stmt->bindParam(":userRole", $this->userRole, PDO::PARAM_STR);
         $stmt->bindParam(":userAccessLevel", $this->userAccessLevel, PDO::PARAM_STR);
         $stmt->bindParam(":userAccountStatus", $this->userAccountStatus, PDO::PARAM_STR);
         $stmt->bindParam(":userSecurityQuestion", $this->userSecurityQuestion, PDO::PARAM_STR);
         $stmt->bindParam(":userSecurityAnswer", $this->userSecurityAnswer, PDO::PARAM_STR);
         $stmt->bindParam(":accountBlockedAt", $this->accountBlockedAt, PDO::PARAM_STR);
         $stmt->bindParam(":accountUnblockedAt", $this->accountUnblockedAt, PDO::PARAM_STR);
         $stmt->bindParam(":userRegisteredBy", $this->userRegisteredBy, PDO::PARAM_STR);
         $stmt->bindParam(":userRegisteredAt", $this->userRegisteredAt, PDO::PARAM_STR);
         $stmt->bindParam(":userUpdatedBy", $this->userUpdatedBy, PDO::PARAM_STR);
         $stmt->bindParam(":userUpdatedAt", $this->userUpdatedAt, PDO::PARAM_STR);
         $stmt->bindParam(":userRemarks", $this->userRemarks, PDO::PARAM_STR);
     
         //run the query
         if($stmt->execute()){
             $result= array("status"=>"true");
             return $result;
         }else{
             $result= array("status"=>"false");
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
      
      //if username is available
      $response = "false";

      //if username is not available
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
    private function generateHash($plainText){

      //using default bcrypt hsahing technique
      $hashString= password_hash($plainText, PASSWORD_DEFAULT);
      return $hashString;
    }


    //this method will return user profile
    public function userProfile($username){
      //getting the instance of Database Connection
      global $link;

      //execute the query
      $stmt= $link->prepare("SELECT registrationNumber, userRole FROM `opd_user_accounts` WHERE username=:username");
      $stmt->bindParam(":username", $username, PDO::PARAM_STR);
      $stmt->execute();

      if($stmt->rowCount() > 0){
        while($row= $stmt->fetch()){
          $registrationNumber= $row['registrationNumber'];
          $userRole= $row['userRole'];
        }



          //execute the query
          $stmt= $link->prepare("SELECT * FROM `opd_patients` WHERE mrNumber=:mrNumber");
          $stmt->bindParam(":mrNumber", $registrationNumber, PDO::PARAM_STR);
          $stmt->execute();

          while($row= $stmt->fetch()){
            $patientFullName= $row['patientFullName'];

          }

          $result= array("userFullName"=>$patientFullName, "userRole"=>$userRole);

          return $result;
      }else{
        return array("NULL");
      }

      
      //dispose the objects
      $stmt= NULL;
      $link= NULL;
    }

    
}


?>