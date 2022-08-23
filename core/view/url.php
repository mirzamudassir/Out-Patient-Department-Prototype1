<?php
function str($input){
    //sanitization level 1
    $level_1= htmlspecialchars($input);

    //sanitization level 2
    $level_2= addslashes($level_1);

    //sanitization level 3
    $sanitizedInput= filter_var($level_2, FILTER_SANITIZE_STRING);

    return $sanitizedInput;
}

$input= "What was your first car?";

echo str($input);

?>