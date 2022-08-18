<?php
//set this page to private
define("PRIVATE", TRUE);

//now render the view of this page according to the access level of the user
require_once($_SERVER['DOCUMENT_ROOT'] . '/iry-cpanel/core/view/renderView.php');

/*

=> now call the renderView method and pass the arguments
=> first argument is user id that is signed in
=> second argument is the access level of the user that is signed in. view will be
   generated according to access level e.g admin
=> third argument is the view name

*/
renderView($_SESSION['id'], $_SESSION['accessLevel'], 'UserAccounts');

?>