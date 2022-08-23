<?php
require_once(dirname(dirname(__FILE__)) . "/modal/initialize.php");
require_once('classes/SupportTicket.class.php');
require_once('classes/Patient.class.php');

if(isset($_GET['m'])){
    $method= $_GET['m'];

    switch($method){

        case 'contactUs':
            //create the new ticket instance
            $SupportTicket= new SupportTicket();

            //collect the ticket parameters from the contact us page
            $ticketParams= array("name" => $_POST['name'], "contactNumber"=>$_POST['contactNumber'], "email"=>$_POST['email'], 
                           "messageTitle"=>$_POST['messageTitle'], "messageBody"=>$_POST['messageBody']);
            
            $result= $SupportTicket->generateSupportTicket($ticketParams);

            if($result['status'] === true){
                $ticketNumber= $result['ticketNumber'];

                echo json_encode(array('true', 'Message Sent', 'Ticket #: ' . $ticketNumber . '. We will contact you soon.'));
            }elseif($result['status'] === false){
                echo json_encode(array('false', 'Message Not Sent', 'Kindly try again later.'));
            }

            //dispose the objects
            $SupportTicket= NULL;

            break;
        
        case 'signUp':
            //create the new patient instance
            $Patient= new Patient();

            //validate the user input against the criteria
            $gender= $_POST['gender'];
            $age= $_POST['age'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            //set the criteria manually
            $minAge= 0;
            $maxAge= 150;
            $minPasswordLength= 8;

            //validate each input against the defined criteria
            if($Patient->checkUsernameAvailability($username) === 'false'){
                //check if password at least 8 characters
                if(strlen($password)>7){
                    //check if age is valid
                    if($age>-1 AND $age <151){
                        //check if gender is valid
                        if($gender== 'Male' OR $gender == 'Female' OR $gender == 'Other'){

                            //now execute the registration process
                            //collect the patient parameters from the patient sign up page
                            $patientParams= array("fullName" => $_POST['fullName'], "gender"=>$gender, "age"=>$age, 
                                                "address"=>$_POST['address'], "email"=>$_POST['email'], "contactNumber"=>$_POST['contactNumber'],
                                                "prevMedicalHistory"=>$_POST['prevMedicalHistory'], "username"=>$username, "password"=>$password,
                                                "securityQuestion"=>$_POST['securityQuestion'], "securityAnswer"=>$_POST['securityAnswer']);

                            $result= $Patient->registerNewPatientSelf($patientParams);

                            if($result['status'] == 'true'){
                                $mrNumber= $result['mrNumber'];

                                echo json_encode(array('true', 'Account Registered', 'MR #: ' . $mrNumber . '. Use your credentials to sign in.'));
                            }elseif($result['status'] == 'false'){
                                echo json_encode(array('false', 'Error', 'Kindly try again later.'));
                            }



                        }else{
                            echo json_encode(array('false', 'Gender is invalid', 'Kindly select the appropiate gender from the list.'));

                        }
                    }else{
                        echo json_encode(array('false', 'Age is invalid', 'Age should be greater than 0 and less than 150.'));

                    }
                }else{
                    echo json_encode(array('false', 'Weak Passwords', 'Password should be at least 8 characters long.'));

                }
            }else{
                echo json_encode(array('false', 'Username already exists', 'Try another username.'));

            }

            
            break;


        
        case 'signIn':

            //collect and validate the sign in parameters from the sign in page
            $username= $_POST['username'];
            $password= $_POST['password'];

            if(empty($username) OR empty($password)){
                echo json_encode(array('false', 'Invalid Credentials', 'Please input your valid credentials to sign in.'));
                exit;
            }else{
    
                $signInParams= array("username" => $username, "password"=>$password);
                echo authentication($signInParams);
            }


            break;
        


        default:
        echo "ERR_P_CONTROLLER";

    }


}


    
?>