<?php
//set this page to private
define("PRIVATE", TRUE);

//now render the view of this page according to the access level of the user
require_once($_SERVER['DOCUMENT_ROOT'] . '/iry-cpanel/core/view/renderView.php');

//now call the renderView method and pass the argumetns
renderView($_SESSION['id'], $_SESSION['accessLevel'], 'Dashboard');

?>