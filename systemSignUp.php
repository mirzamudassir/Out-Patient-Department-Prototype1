<!--
    Package Name: Robust
    Author: Mudassir Mirza - B2B Productions

-->
<?php 
//get the file that includes the basic information about the application like application name, verison, header info, footer info,
require_once($_SERVER['DOCUMENT_ROOT'] . '/iry-cpanel/includes/global_info.inc.php');
session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $appHeading ?></title>
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
      <meta name="description" content="IRY - cPanel">
      <meta name="author" content="B2B Productions">
    <!-- Favicon icon -->
    
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- sweet alert framework -->
    <link rel="stylesheet" type="text/css" href="bower_components/sweetalert/dist/sweetalert.css">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="assets/css/component.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/pages/multi-step-sign-up/css/reset.min.css">
    <link rel="stylesheet" href="assets/pages/multi-step-sign-up/css/style.css">
</head>

<body class="multi-step-sign-up">
    <form id="msform">
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Personal Details</li>
            <li>Social Profiles</li>
            <li>Personal Details</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <img class="logo" src="assets/images/opd-logo-green-transparent.png" alt="logo.png">
            <h2 class="fs-title">Sign up</h2>
            <h3 class="fs-subtitle">Let’s have a new beginning. Sign up for new you</h3>
            <div class="input-group">
                <input type="text" class="form-control" name="fullName" placeholder="Full Name" />
            </div>
            <div class="input-group">
                <select class="form-control" name="gender">
                    <option value="NULL">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="input-group">
                <input type="number" class="form-control" name="age" min="0" max="150" placeholder="Age" />
            </div>
            <div class="input-group">
                <input type="password" class="form-control" name="cpass" placeholder="Confirm Password" />
            </div>
            <button type="button" name="next" class="btn btn-primary next" value="Next">Next</button>
        </fieldset>
        <fieldset>
        <img class="logo" src="assets/images/opd-logo-green-transparent.png" alt="logo.png">
            <h2 class="fs-title">Social Profiles</h2>
            <h3 class="fs-subtitle">Little bit about your presence on social media</h3>
            <div class="input-group">
                <input type="text" class="form-control" name="twitter" placeholder="Twitter" />
            </div>
            <div class="input-group">
                <input type="text" class="form-control" name="facebook" placeholder="Facebook" />
            </div>
            <div class="input-group">
                <input type="text" class="form-control" name="gplus" placeholder="Google Plus" />
            </div>
            <button type="button" name="previous" class="btn btn-inverse btn-outline-inverse previous" value="Previous">Previous</button>
            <button type="button" name="next" class="btn btn-primary next" value="Next">Next</button>
        </fieldset>
        <fieldset>
        <img class="logo" src="assets/images/opd-logo-green-transparent.png" alt="logo.png">
            <h2 class="fs-title">Personal Details</h2>
            <h3 class="fs-subtitle">And something about yourself!</h3>
            <div class="input-group">
                <input type="text" class="form-control" name="fname" placeholder="First Name" />
            </div>
            <div class="input-group">
                <input type="text" class="form-control" name="lname" placeholder="Last Name" />
            </div>
            <div class="input-group">
                <input type="text" class="form-control" name="phone" placeholder="Phone" />
            </div>
            <div class="input-group">
                <textarea name="address" class="form-control" placeholder="Address"></textarea>
            </div>
            <button type="button" name="previous" class="btn btn-inverse btn-outline-inverse previous" value="Previous">Previous</button>
            <button type="button" name="next" class="btn btn-primary" value="submit">Submit</button>
            <p class="m-t-20">Already have an account? <a href="systemSignIn">Sign in</a></p>
        </fieldset>
    </form>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="bower_components/tether/dist/js/tether.min.js"></script>
    <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    <!-- sweet alert js -->
    <script type="text/javascript" src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="assets/js/modal.js"></script>
    <!-- sweet alert modal.js intialize js -->
    <!-- modalEffects js nifty modal window effects -->
    <script type="text/javascript" src="assets/js/modalEffects.js"></script>
    <script type="text/javascript" src="assets/js/classie.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="bower_components/i18next/i18next.min.js"></script>
    <script type="text/javascript" src="bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="bower_components/jquery-i18next/jquery-i18next.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script type="text/javascript" src="assets/js/blockUI.js"></script>
    <!-- classie js -->
    <script type="text/javascript" src="../bower_components/classie/classie.js"></script>
    <script src='../../../cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script src="assets/pages/multi-step-sign-up/js/main.js"></script>
</body>
</html>
