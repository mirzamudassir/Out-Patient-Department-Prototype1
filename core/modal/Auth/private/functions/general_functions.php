<?
/**
 * @author Mudassir Mirza
 * @package Robust - B2B Productions
 * @version 1.0 beta
 */

// Put all of your general functions in this file

// header redirection often requires output buffering 
// to be turned on in php.ini.
require_once(dirname(__FILE__,4) . "/initialize.php");

function afterSuccessfullAuthentication($params){
  // Regenerate session ID to invalidate the old one.
	// Super important to prevent session hijacking/fixation.

  //creating dateTime object
	$DateTime= new DateTime();

	session_start();
	$_SESSION['signedIn'] = true;

	// Save these values in the session, even when checks aren't enabled 
  $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
	$_SESSION['last_login'] = time();
	$_SESSION['ip']= $_SERVER['REMOTE_ADDR'];
	$_SESSION['username'] = $params['username'];
	$_SESSION['userAccessLevel']= $params['userAccessLevel'];
	$_SESSION['userRole'] = $userRole;
	$_SESSION['timestamp']= $DateTime->getTimeStamp();
}


//method to perform authorization against 
//return type of this method is string
function authorization($params){
  //get the database connection
  global $link;


  $stmt = $link->prepare("SELECT username, userAccountStatus, userAccessLevel FROM `opd_user_accounts` WHERE username=:username");
  $stmt->bindParam(":username", $params['username'], PDO::PARAM_STR);

  if($stmt->execute()){
    if($row= $stmt->fetch()){

      $id= $row['id'];
      $username= $row['username'];
      $userAccountStatus= $row['userAccountStatus'];
      $userAccessLevelActual= $row['userAccessLevel'];

      if($userAccountStatus === 'ACTIVE' AND $userAccessLevelActual === $params['userAccessLevel']){
        return "true";
      }else{

        //if authorization fails
        return "false";
      }
    
      }else{

        //if records does not exists
        return "false";
      }
    }else{

      //if query does not executes
      return "false";
    }
}



function redirectTo($new_location) {
  header("Location: " . $new_location);
  exit;
}





?>
