<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/core/modal/initialize.php');
// Brute force throttling

// IMPORTANT: The session is used for demonstration purposes only.
// A hacker attempting a brute force attack would not bother to send 
// cookies, which would mean that you could not use the session 
// (which is referenced by a cookie).
// In real life, use a real database.

function record_failed_login($username) {
	$failed_login = find_one_in_fake_db('failed_logins', 'username', sql_prep($username));

	if(!isset($failed_login)) {
		$failed_login = [
			'username' => sql_prep($username), 
			'count' => 1, 
			'last_time' => time()
		];
		add_record_to_fake_db('failed_logins', $failed_login);
	} else {
		// existing failed_login record
		$failed_login['count'] = $failed_login['count'] + 1;
		$failed_login['last_time'] = time();
		update_record_in_fake_db('failed_logins', 'username', $failed_login);
	}
	
	return true;
}

function clear_failed_logins($username) {
	$failed_login = find_one_in_fake_db('failed_logins', 'username', sql_prep($username));

	if(isset($failed_login)) {
		$failed_login['count'] = 0;
		$failed_login['last_time'] = time();
		update_record_in_fake_db('failed_logins', 'username', $failed_login);
	}
	
	return true;
}

// Returns the number of minutes to wait until logins 
// are allowed again.
function throttleFailedLogins($failedLoginsIP, $username) {
	global $link;
	global $loginURL;

	$throttle_at = 5;
	$delay_in_minutes = 1;
	$delay = 60 * $delay_in_minutes;
	$accountStatus= "TEMPORARILY BLOCKED";
	$accountBlockedAt= date("Y-m-d H:i:s"); //current time
	
	$stmt= $link->prepare("UPDATE `user_accounts` SET account_status=:account_status, account_blocked_at=:account_blocked_at, 
	user_ip=:user_ip WHERE username=:username");

	$stmt->bindParam(":account_status", $accountStatus, PDO::PARAM_STR);
	$stmt->bindParam("account_blocked_at", $accountBlockedAt, PDO::PARAM_STR);
	$stmt->bindParam(":user_ip", $failedLoginsIP, PDO::PARAM_STR);
	$stmt->bindParam(":username", $username, PDO::PARAM_STR);
	if($stmt->execute()){
		$_SESSION['message']= "Your account is TEMPORARILY BLOCKED";
		redirect_to($loginURL);
	}

	//dispose off the db connection
	$link= NULL;
}



//blcklist the IP
function throttleFailedLoginIPs($failedLoginsIP) {
	global $link;
	global $loginURL;

	$throttle_at = 5;
	$delay_in_minutes = 1;
	$delay = 60 * $delay_in_minutes;
	$IPStatus= "BLOCKED";
	$IPBlockedAt= date("Y-m-d H:i:s"); //current time
	
	$stmt= $link->prepare("UPDATE `blacklisted_ips` SET ip_blocked_at=:ip_blocked_at, ip_status=:ip_status
	 WHERE ip_address=:ip_address");

	$stmt->bindParam("ip_blocked_at", $IPBlockedAt, PDO::PARAM_STR);
	$stmt->bindParam(":ip_status", $IPStatus, PDO::PARAM_STR);
	$stmt->bindParam(":ip_address", $failedLoginsIP, PDO::PARAM_STR);
	if($stmt->execute()){
		$_SESSION['message']= "Your account is BLOCKED";
		redirect_to($loginURL);
	}

	//dispose off the db connection
	$link= NULL;
}



//this method will increment the failed login value into the database
function countFailedLogins($username){
	global $link;
	global $loginURL;

	$stmt= $link->prepare("SELECT failed_login_count FROM `user_accounts` WHERE username=:username");
	$stmt->bindParam(":username", $username, PDO::PARAM_STR);
	$stmt->execute();

	while($row= $stmt->fetch()){
		$failedLoginCount= $row['failed_login_count'];
	}
	
	if($failedLoginCount>2){
		return FALSE;
	}else{
	$stmt= $link->prepare("UPDATE `user_accounts` SET failed_login_count= failed_login_count + 1 WHERE username=:username");
	$stmt->bindParam(":username", $username, PDO::PARAM_STR);
	if($stmt->execute()){
		return TRUE;
	}
	}

	//dispose off the db connection
	$link= NULL;
} 


//this method will increment the failed login IP ADDRESSES value into the database
function countFailedIPLogins($failedLoginIP){
	global $link;
	global $loginURL;
	$failedLoginCount= 1;
	$ipBlockedAt= date("Y-m-d H:i:s"); //current time

	$stmt= $link->prepare("SELECT failed_login_count FROM `blacklisted_ips` WHERE ip_address=:ip_address");
	$stmt->bindParam(":ip_address", $failedLoginIP, PDO::PARAM_STR);
	$stmt->execute();

	if($stmt->rowCount() > 0){
		while($row= $stmt->fetch()){
			$failedLoginCount= $row['failed_login_count'];
		}
		
		if($failedLoginCount>2){
			return FALSE;
		}else{
		$stmt= $link->prepare("UPDATE `blacklisted_ips` SET failed_login_count= failed_login_count + 1 WHERE ip_address=:ip_address");
		$stmt->bindParam(":ip_address", $failedLoginIP, PDO::PARAM_STR);
		if($stmt->execute()){
			return TRUE;
		}
		}

	}else{
		$stmt= $link->prepare("INSERT INTO `blacklisted_ips` (ip_address, failed_login_count) VALUES
		(:ip_address, :failed_login_count)");
	$stmt->bindParam(":ip_address", $failedLoginIP, PDO::PARAM_STR);
	$stmt->bindParam(":failed_login_count", $failedLoginCount, PDO::PARAM_INT);
	
	if($stmt->execute()){
		return TRUE;
	}
	
}

	//dispose off the db connection
	$link= NULL;
} 


//this method will check either user should be renewed access to its account or not by checking the blocked time
function shouldAccountReActivate($username){

	global $link;
	global $loginURL;
	$accountBlockedFor= "+1 minutes"; //block account for 1 minute

	$stmt= $link->prepare("SELECT account_status, account_blocked_at FROM `user_accounts` WHERE username=:username");
	$stmt->bindParam(":username", $username, PDO::PARAM_STR);
	$stmt->execute();

	while($row= $stmt->fetch()){
		$accountStatus= $row['account_status'];
		$accountBlockedAt= $row['account_blocked_at'];
	}

	//calculating the time when the account should reactive
	$accountShouldReActivateAt= strtotime(date('Y-m-d H:i:s', strtotime($accountBlockedFor, strtotime($accountBlockedAt))));

	//current time
	$currentTime= strtotime(date('Y-m-d H:i:s'));

	//if the allocated time is completed
	if($accountShouldReActivateAt < $currentTime AND $accountStatus=== 'TEMPORARILY BLOCKED'){
		$accountStatus= "ACTIVE";
		$failedLoginCount= 0;
		$userIP= "";
		$accountUnBlockedAt= date("Y-m-d H:i:s");

		$stmt= $link->prepare("UPDATE `user_accounts` SET account_status=:account_status, failed_login_count=:failed_login_count,
		 account_unblocked_at=:account_unblocked_at, user_ip=:user_ip WHERE username=:username");
		$stmt->bindParam(":account_status", $accountStatus, PDO::PARAM_STR);
		$stmt->bindParam("failed_login_count", $failedLoginCount, PDO::PARAM_INT);
		$stmt->bindParam("account_unblocked_at", $accountUnBlockedAt, PDO::PARAM_STR);
		$stmt->bindParam(":user_ip", $userIP, PDO::PARAM_STR);
		$stmt->bindParam(":username", $username, PDO::PARAM_STR);
		if($stmt->execute()){
			return TRUE;
		}

	}else{
		//time still remaining
		return FALSE;
	}


	//dispose off the database connection
	$link= NULL;
}


//this method tells weather the mentioned IP is blacklisted or NOT
function isIPBlackListed($IP){

	global $link;
	$failedLoginCount= 3; //max failed login count

	$stmt= $link->prepare("SELECT ip_address, ip_status FROM `blacklisted_ips` WHERE ip_address=:ip_address AND failed_login_count=
	:failed_login_count");
	$stmt->bindParam(":ip_address", $IP, PDO::PARAM_STR);
	$stmt->bindParam(":failed_login_count", $failedLoginCount, PDO::PARAM_INT);
	$stmt->execute();

	if($stmt->rowCount() === 0){
		return FALSE;
		exit;
	}else{
		return TRUE;
		exit;
	}

	//dispose off the database connection
	$link= NULL;
}


//this method will clear the failed login records from the database
function clearFailedLogins($username){
	global $link;
	$failedLoginCount= 0;

	$stmt= $link->prepare("UPDATE `user_accounts` SET failed_login_count=:failed_login_count WHERE username=:username");
	$stmt->bindParam(":failed_login_count", $failedLoginCount, PDO::PARAM_INT);
	$stmt->bindParam(":username", $username, PDO::PARAM_STR);
	if($stmt->execute()){
		return TRUE;
		exit;
	}else{
		return FALSE;
		exit;
	}

	//dispose off the database connection
	$link= NULL;
}

?>
