<?php

// Redirect all default requests to homepage
/* header("Location: /");
exit; */
require_once('requestIntegrity.php');

echo userIPStatus(array("ip"=>"::1"));
// Or render a 404 page not found error:
// header("HTTP/1.0 404 Not Found");
// exit;

?>
