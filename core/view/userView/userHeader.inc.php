<?php 
//calling necessary include files
require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/includes/global_info.inc.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/core/modal/initialize.php');
//require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/core/view/adminView/adminModals.inc.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/opd/core/view/adminView/adminNav.inc.php');

//call this method in every private page to protect against unauthorized access
before_every_protected_page();

//creating user object to access its properties
$userObject= new User();

error_reporting(E_ALL); // Error/Exception engine, always use E_ALL
?>

<!DOCTYPE html>
<html lang="en">

<!--
    Package Name: opd
    Author: Mudassir Mirza
    Copyrights: B2B Productions (www.b2bproductions.com.pk)

-->

<head>
    <title>Flat Able - Premium Admin Template by Phoenixcoded</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
      <meta name="description" content="opd - B2B Productions">
      <meta name="keywords" content="B2B Productions, opd, Web App">
      <meta name="author" content="B2B Productions">
      <!-- Favicon icon -->
      <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
      <!-- flag icon framework css -->
      <link rel="stylesheet" type="text/css" href="../assets/pages/flag-icon/flag-icon.min.css">
      <!-- Menu-Search css -->
      <link rel="stylesheet" type="text/css" href="../assets/pages/menu-search/css/component.css">
      <!-- Horizontal-Timeline css -->
      <link rel="stylesheet" type="text/css" href="../assets/pages/dashboard/horizontal-timeline/css/style.css">
      <!-- amchart css -->
      <link rel="stylesheet" type="text/css" href="../assets/pages/dashboard/amchart/css/amchart.css">
      <!-- flag icon framework css -->
      <link rel="stylesheet" type="text/css" href="../assets/pages/flag-icon/flag-icon.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
      <!--color css-->
      <link rel="stylesheet" type="text/css" href="../assets/css/color/color-1.css" id="color" />

      <link rel="stylesheet" type="text/css" href="../assets/css/linearicons.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/simple-line-icons.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/ionicons.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">

  </head>