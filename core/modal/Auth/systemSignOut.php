<?php
	require_once("../initialize.php");

	// Do the logout processes and redirect to login page.
	after_successful_logout();
	$_SESSION['message']= "Signed Out Successfully";
	redirect_to($appBaseURL);

?>
