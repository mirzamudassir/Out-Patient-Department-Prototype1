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


require_once(dirname(__FILE__,2) . '/initialize.php');
function authentication($params){

  //getting the instance of Database Connection
  global $link;

    // retrieve the values submitted via the form
    $username = sanitizeInput(array("inputDataType" => "STRING", "input" => $params['username']));
    $pwd = $params['password'];

      $stmt = $link->prepare("SELECT * FROM `opd_user_accounts` WHERE username=:username");
      $stmt->bindParam(":username", $username, PDO::PARAM_STR);

      if($stmt->execute()){
        if($stmt->rowCount()>0){
          if($row= $stmt->fetch()){

            $id= $row['id'];
            $username= $row['username'];
            $passwordHash= $row['passwordHash'];
            $userRole= $row['userRole'];
            $userAccessLevel= $row['userAccessLevel'];
            $IP= $_SERVER['REMOTE_ADDR'];


              //check the status of account if active or not
              $accountStatus= userAccountStatus(array("username"=>$username));
              if($accountStatus === "ACTIVE"){
                if(password_verify($pwd, $passwordHash)){
                  $params= array("username"=>$username, "userAccessLevel"=>$userAccessLevel, "userRole"=>$userRole);
                  afterSuccessfullAuthentication($params);
                  return "true";
                }else{
                  echo json_encode(array('false', 'Invalid Credentials', 'Please provide your valid credentials to sign in.'));
                }
                

              }else{
                echo json_encode(array('false', 'Account is ' . $accountStatus . '.', 'Please contact system admin for help.'));
              }
            
          }else{
            echo json_encode(array('false', 'Invalid Credentials', 'Please provide your valid credentials to sign in.'));
          }

        }else{
          echo json_encode(array('false', 'Invalid Credentials', 'Please provide your valid credentials to sign in.'));
          }
        

      }else{
          echo json_encode(array('false', 'Invalid Credentials', 'Please provide your valid credentials to sign in.'));
        }



        //dispose off the database connection 
        $link= NULL;
}
  
?>