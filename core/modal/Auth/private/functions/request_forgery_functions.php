<?php

$sessSalt= "jdfDK#*iu&0";

// Use with request_is_post() to block posting from off-site forms
function isRequestFromSameDomain() {
	if(!isset($_SERVER['HTTP_REFERER'])) {
		// No refererer sent, so can't be same domain
		return FALSE;
	} else {
		return TRUE;
	}
}

// Uncomment for testing
// if(request_is_same_domain()) {
// 	echo 'Same domain. POST requests should be allowed.<br />';
// } else {
// 	echo 'Different domain. POST requests should be forbidden.<br />';
// }
// echo '<br />';
// echo '<a href="">Same domain link</a><br />';

?>
