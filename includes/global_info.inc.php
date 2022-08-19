<?php
date_default_timezone_set("Asia/Karachi");
$currentYear= date("Y");

$version= " V1.0 BETA";
$appTitle= "OPD ";
$appHeading= $appTitle . $version;
$developerName= "Mudassir Mirza";
$copyrights= "Mudassir Mirza";
$footer= "$currentYear © $copyrights $version";

 function getNotification(){
    if(isset($_SESSION['notifStatus']) && $_SESSION['notifStatus'] != ''){
      
      
                            ?>
                          <script>  
                          alert('Message Sent');
                      </script>
<?php

unset($_SESSION['notifStatus']);

  
  }
}


?>