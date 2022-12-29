<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/core/modal/Auth/configurations.inc.php');
// Useful php.ini file settings:
// session.cookie_lifetime = 0
// session.cookie_secure = 1
// session.cookie_httponly = 1
// session.use_only_cookies = 1
// session.entropy_file = "/dev/urandom"

// Must have already called:
// session_start();



// Function to forcibly end the session
function end_session() {
	// Use both for compatibility with all browsers
	// and all versions of PHP.
	session_unset();
  session_destroy();
}

// Does the request IP match the stored value?
function requestIPMatchesSessionIP() {
	// return false if either value is not set
	if(!isset($_SESSION['ip']) || !isset($_SERVER['REMOTE_ADDR'])) {
		return FALSE;
	}
	if($_SESSION['ip'] === $_SERVER['REMOTE_ADDR']) {
		return TRUE;
	} else {
		return FALSE;
	}
}

// Does the request user agent match the stored value?
function requestUserAgentMatchesSession() {
	// return false if either value is not set
	if(!isset($_SESSION['user_agent']) || !isset($_SERVER['HTTP_USER_AGENT'])) {
		return FALSE;
	}
	if($_SESSION['user_agent'] === $_SERVER['HTTP_USER_AGENT']) {
		return TRUE;
	} else {
		return FALSE;
	}
}

// Has too much time passed since the last login?
function isLastLoginRecent() {
	$max_elapsed = 60 * 60 * 8; // 8 hours
	// return false if value is not set
	if(!isset($_SESSION['last_login'])) {
		return FALSE;
	}
	if(($_SESSION['last_login'] + $max_elapsed) >= time()) {
		return TRUE;
	} else {
		return FALSE;
	}
}

// Should the session be considered valid?
function isSessionValid() {

	if(requestUserAgentMatchesSession() === FALSE) {
		return FALSE;
		exit;
	}
	if(isLastLoginRecent() === FALSE) {
		return FALSE;
		exit;
	}
	if(requestIPMatchesSessionIP() === FALSE){
		return FALSE;
		exit;
	}
	return TRUE;
}

// If session is not valid, end and redirect to login page.
function confirm_session_is_valid() {
	
	if(isSessionValid() === FALSE) {
		return FALSE;
		exit;
	}else{
		return TRUE;
	}
	
}


// Is user logged in already?
function isUserAlreadyLoggedIn() {
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === TRUE){
		return TRUE;
	}else{
		end_session();
		return FALSE;
	}
}


// Actions to preform after every successful login
function after_successful_login($id, $username, $userAccessLevel, $fullName) {
	// Regenerate session ID to invalidate the old one.
	// Super important to prevent session hijacking/fixation.
	
	//creating dateTime object
	$DateTime= new DateTime();

	session_start();
	$_SESSION['logged_in'] = true;

	// Save these values in the session, even when checks aren't enabled 
    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
	$_SESSION['last_login'] = time();
	$_SESSION['ip']= $_SERVER['REMOTE_ADDR'];
	$_SESSION['username'] = $username;
	$_SESSION['accessLevel']= $accessLevel;
	$_SESSION['id'] = $id;
	$_SESSION['full_name']= $fullName;
	$_SESSION['timestamp']= $DateTime->getTimeStamp();
	
	
}

//validate the session ID
function isSessionIDValid($sessID){
	global $sessSalt;
	$id= session_id() . $sessSalt;

	if($sessID === $id){
		return true;
	}else{
		exit("ERR_SESS_ID");
		return false;
	}
}

// Actions to preform after every successful logout
function after_successful_logout() {
	$_SESSION['logged_in'] = false;
	setcookie('PHPSESSID', '', time() - 3600, '/');
	end_session();
}

// Actions to preform before giving access to any 
// access-restricted page.
function before_every_protected_page() {
	global $signInURL;
	
	if($_SESSION['username'] === NULL){
		session_destroy();
		redirectTo($signInURL);
	}
}

?>
