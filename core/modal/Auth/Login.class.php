<?php

//require_once('../initialize.php');

global $link;
class RobustLogin{
    public $fullName;

  public function signIn($username, $pwd){
    //getting the instance of Database Connection
  global $link;

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
            if($account_status === 'ACTIVE'){
          
          //validate the password hash
          if(password_verify($pwd, $hashed_password)){
            
                
                $arr= array(
                    'Full Name' => $fullName,
                    'Session ID' => session_id()
                );
                return $arr;
            }else{
                return "ERROR LOGIN";
            }
        
 
    }else{
        return "Your account is blocked";
    }

        }else{
            return "Invalid Username";
        }
    }else{
        return "Invalid Username";
    }
}else{
    return "INTERNAL ERROR";
}





}

}

?>