<?php 
/**
* Validation
*
* @category   Login Script
* @package    OPD
* @author     Mudassir Mirza
* @version    1.0
* @since      Available since Release 1.0
*/


require_once('../initialize.php');
if(isset($_POST['login'])){

  //getting the instance of Database Connection
  global $link;

    // retrieve the values submitted via the form
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $pwd = $_POST['password'];

      $query = $link->prepare("SELECT * FROM `user_accounts` WHERE username=:username");
      $query->bindParam(":username", $username, PDO::PARAM_STR);

      if($query->execute()){
        if($query->rowCount() == 1){
          if($row= $query->fetch()){

            $id= $row['id'];
            $username= $row['username'];
            $hashed_password= $row['password_hash'];
            $accessLevel= $row['access_level'];
            $account_status= $row['account_status'];
            $fullName= $row['full_name'];
            $IP= $_SERVER['REMOTE_ADDR'];

            //check weather the account is active or not AND IP of the user is not Black Listed
            if($account_status=== 'ACTIVE'){
              if(isIPBlackListed($IP) === FALSE AND isRequestFromSameDomain() === TRUE){
            
            //validate the password hash
            if(password_verify($pwd, $hashed_password)){
              
                  // successful login
                  after_successful_login($id, $username, $accessLevel, $fullName);

                  //clear the failed login records if available
                  clearFailedLogins($username);

                  $_SESSION['notifications'] = "Welcome";

                  redirect_to($dashboardURL);
              }else{
                  //here call the count login method to store the failed login attempts counts into the database
                  if(countFailedLogins($username) === TRUE ){
                    $_SESSION['message']= "Invalid Credentials";
                    redirect_to($loginURL);
                }else{

                  //get the IP of the user
                  $failedLoginIP= $_SERVER['REMOTE_ADDR'];
                  //call the method to temporary BLOCK the user account to avoid brute force attack
                  throttleFailedLogins($failedLoginIP, $username);

                  //set the message in the session to be dispalyed to user
                  $_SESSION['message']= "Your account is $account_status";
                  //redirect the user back to login page
                  redirect_to($loginURL);
                }//throttle failed login loop end

              }//password verify loop end

            //IP blacklist method loop end
            }else{
               
              //set the message in the session to be dispalyed to user
              $_SESSION['message']= "Your IP Address is BLOCKED";
              //redirect the user back to login page
              redirect_to($loginURL);
              exit();
              return false;
              
            }

             }else{
                //check either account status can be renewed to ACTIVE
                if(shouldAccountReActivate($username) === TRUE){

                  // successful login
                  after_successful_login($id, $username, $accessLevel, $fullName);
                  redirect_to($dashboardURL);
  
                }else{
  
                //redirect_to($appBaseURL . "/sandbox?error=ERR_ACCESS_DENIED::ACCOUNT $account_status::");
                //set the message in the session to be dispalyed to user
                $_SESSION['message']= "Your account is $account_status";
                //redirect the user back to login page
                redirect_to($loginURL);
                exit();
                return false;
                }
             }
            
             }
           }
           else{
              //get the IP of the user
            $failedLoginIP= $_SERVER['REMOTE_ADDR'];

            //here call the count login method to store the failed IP login attempts counts into the database
            if(countFailedIPLogins($failedLoginIP) === TRUE ){
              $_SESSION['message']= "Invalid Credentials";
              redirect_to($loginURL);
          }else{

            //call the method to temporary BLOCK the IP ADDRESS to avoid brute force attack
            throttleFailedLoginIPs($failedLoginIP);

            //set the message in the session to be dispalyed to user
            $_SESSION['message']= "Your IP Address is BLOCKED";
            //redirect the user back to login page
            redirect_to($loginURL);
          }
          }
         }

    }else{
      redirect_to($loginURL);
    }
      

    //dispose off the database connection 
    $link= NULL;
  
    
  
?>