<?php
//set this page to private
define("PRIVATE", TRUE);

//now render the view of this page according to the access level of the user
require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/core/view/renderView.php');

//now call the renderView method and pass the argumetns
if($_SESSION['username'] !== NULL){
    renderView($_SESSION['username'], $_SESSION['userAccessLevel'], 'Dashboard');
}else{
    header("Location: ../index");
}
?>