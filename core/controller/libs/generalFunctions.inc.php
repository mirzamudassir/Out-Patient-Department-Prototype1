<?php
require_once(dirname(__FILE__,3) . "/modal/initialize.php");

function sanitizeInput($params){
    //this method performs sanitization and validation of input.
    //parameters have type of array that includes the input data type and the input validation criteria and input itself.

    $inputDataType= $params['inputDataType']; //it should be int, float, double....
    $input= $params['input']; //actual input data

    switch($inputDataType){
        
        case 'INT':
            //sanitization level 1
            $level_1= htmlspecialchars($input);

            //sanitization level 2
            $level_2= addslashes($level_1);

            //sanitization level 3
            $sanitizedInput= filter_var($level_2, FILTER_SANITIZE_NUMBER_INT);

            return $sanitizedInput;

            break;
        
        case 'FLOAT':
            //sanitization level 1
            $level_1= htmlspecialchars($input);

            //sanitization level 2
            $level_2= addslashes($level_1);

            //sanitization level 3
            $sanitizedInput= filter_var($level_2, FILTER_SANITIZE_NUMBER_FLOAT);

            return $sanitizedInput;

            break;

        case 'STRING':
            //sanitization level 1
            $level_1= htmlspecialchars($input);

            //sanitization level 2
            $level_2= addslashes($level_1);

            //sanitization level 3
            $sanitizedInput= filter_var($level_2, FILTER_SANITIZE_STRING);

            return $sanitizedInput;

            break;
        
        case 'EMAIL':
            //sanitization level 1
            $level_1= htmlspecialchars($input);

            //sanitization level 2
            $level_2= addslashes($level_1);

            //sanitization level 3
            $sanitizedInput= filter_var($level_2, FILTER_SANITIZE_EMAIL);

            return $sanitizedInput;

            break;
        
        case 'URL':
            //sanitization level 1
            $level_1= htmlspecialchars($input);

            //sanitization level 2
            $level_2= addslashes($level_1);

            //sanitization level 3
            $sanitizedInput= filter_var($level_2, FILTER_SANITIZE_URL);

            return $sanitizedInput;

            break;
    }

    
}



?>