<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/includes/global_info.inc.php');

	// Do the logout processes and redirect to login page.
	// Use both for compatibility with all browsers
	// and all versions of PHP.
	/* session_unset(); */
    session_start();
    session_destroy();

	header("Location: $signInURL");

?>