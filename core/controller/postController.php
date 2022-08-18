<?php
require_once(APP_ROOT . "/modal/initialize.php");
$userObject= new UserController();

    function addManufacturer($manufacturerName, $manIMG, $description){
        global $WidgetLink;
        global $userObject;
        global $appBaseURL;

        //first insert the relevant data in user_accounts table that will manage login
        $query= $WidgetLink->prepare("INSERT INTO `manufacturers` (manufacturer_name, man_image, man_description)
                                      VALUES (:manufacturer_name, :man_image, :man_description)");
        $query->bindParam(":manufacturer_name", $manufacturerName, PDO::PARAM_STR);
        $query->bindParam(":man_image", $manIMG, PDO::PARAM_STR);
        $query->bindParam(":man_description", $description, PDO::PARAM_STR);
    
   
        if($query->execute()){
            

                    $arr= array("Success", "Manufacturer saved.");
                    $_SESSION['notifStatus']= $arr;
                    redirect_to($appBaseURL . "/public/manageManufacturers");  
        }
        
        else{
            $arr= array("Error", "Kindly report to administrator.");
            $_SESSION['notifStatus']= $arr;
            redirect_to($appBaseURL . "/public/manageManufacturers");  
        }

        //dispose the db connection
        $WidgetLink= NULL;
        //dispose the userObject
        $userObject= NULL;
        }


        function updateManufacturer($man_id, $manufacturerName, $manIMG, $description){
            global $WidgetLink;
            global $userObject;
            global $appBaseURL;
    
            //first insert the relevant data in user_accounts table that will manage login
            $query= $WidgetLink->prepare("UPDATE `manufacturers` SET manufacturer_name= :manufacturer_name, man_image= :man_image,
                                          man_description= :man_description WHERE id= :id");
            $query->bindParam(":manufacturer_name", $manufacturerName, PDO::PARAM_STR);
            $query->bindParam(":man_image", $manIMG, PDO::PARAM_STR);
            $query->bindParam(":man_description", $description, PDO::PARAM_STR);
            $query->bindParam(":id", $man_id, PDO::PARAM_INT);
        
       
            if($query->execute()){
                
    
                        $arr= array("Success", "Manufacturer updated.");
                        $_SESSION['notifStatus']= $arr;
                        redirect_to($appBaseURL . "/public/manageManufacturers");  
            }
            
            else{
                $arr= array("Error", "Kindly report to administrator.");
                $_SESSION['notifStatus']= $arr;
                redirect_to($appBaseURL . "/public/manageManufacturers");  
            }
    
            //dispose the db connection
            $WidgetLink= NULL;
            //dispose the userObject
            $userObject= NULL;
            }




        function addProduct($deviceName, $model, $manufacturerName, $productImage){
            global $WidgetLink;
            global $userObject;
            global $appBaseURL;
    
            //first insert the relevant data in user_accounts table that will manage login
            $query= $WidgetLink->prepare("INSERT INTO `products` (device_name, model_name, manufacturer, model_image)
                                          VALUES (:device_name, :model_name, :manufacturer, :model_image)");
            $query->bindParam(":device_name", $deviceName, PDO::PARAM_STR);
            $query->bindParam(":model_name", $model, PDO::PARAM_STR);
            $query->bindParam(":manufacturer", $manufacturerName, PDO::PARAM_STR);
            $query->bindParam(":model_image", $productImage, PDO::PARAM_STR);
        
       
            if($query->execute()){
                
    
                        $arr= array("Success", "Product saved.");
                        $_SESSION['notifStatus']= $arr;
                        redirect_to($appBaseURL . "/public/manageProducts");  
            }
            
            else{
                $arr= array("Error", "Kindly report to administrator.");
                $_SESSION['notifStatus']= $arr;
                redirect_to($appBaseURL . "/public/manageProducts");  
            }
    
            //dispose the db connection
            $WidgetLink= NULL;
            //dispose the userObject
            $userObject= NULL;
            }

            

            function deleteManufacturer($manID){
                global $WidgetLink;
                global $appBaseURL;
            
                $query= $WidgetLink->prepare("DELETE FROM `manufacturers` WHERE id= :id");
                $query->bindParam(':id', $manID, PDO::PARAM_STR);

                if($query->execute() === TRUE){
                    
                    echo "
                    <div class='alert alert-success background-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='icofont icofont-close-line-circled text-white'></i>
                    </button>
                    <strong>Success!</strong> Manufacturer deleted.
                </div>
                    ";
                    /* $arr= array("Success", "Manufacturer deleted.");
                    $_SESSION['notifStatus']= $arr;
                    redirect_to($appBaseURL . "/public/manageManufacturers");  */
                }
            
                else{
                    $arr= array("Error", "kindly report to administrator.");
                    $_SESSION['notifStatus']= $arr;
                    redirect_to($appBaseURL . "/public/manageManufacturers"); 
                }

                //dispose the db connection
                $WidgetLink= NULL;
                $appBaseURL= NULL;
            }



            function deleteProduct($productID){
                global $WidgetLink;
                global $appBaseURL;
            
                $query= $WidgetLink->prepare("DELETE FROM `products` WHERE id= :id");
                $query->bindParam(':id', $productID, PDO::PARAM_STR);

                if($query->execute() === TRUE){
                    
                    echo "
                    <div class='alert alert-success background-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='icofont icofont-close-line-circled text-white'></i>
                    </button>
                    <strong>Success!</strong> Product deleted.
                </div>
                    ";
                    /* $arr= array("Success", "Manufacturer deleted.");
                    $_SESSION['notifStatus']= $arr;
                    redirect_to($appBaseURL . "/public/manageProducts");  */
                }
            
                else{
                    $arr= array("Error", "kindly report to administrator.");
                    $_SESSION['notifStatus']= $arr;
                    redirect_to($appBaseURL . "/public/manageProducts"); 
                }

                //dispose the db connection
                $WidgetLink= NULL;
                $appBaseURL= NULL;
            }


            function addDeviceProblem($manufacturer, $model, $problem_title, $problem_description, $problem_price){
                global $WidgetLink;
                global $userObject;
                global $appBaseURL;

                //add decimal value to price
                $problem_price= $problem_price . ".00";
        
                //first insert the relevant data in problems table
                $query= $WidgetLink->prepare("INSERT INTO `problems` (manufacturer, model, problem_title, problem_description, problem_price)
                                              VALUES (:manufacturer, :model, :problem_title, :problem_description, :problem_price)");
                $query->bindParam(":manufacturer", $manufacturer, PDO::PARAM_INT);
                $query->bindParam(":model", $model, PDO::PARAM_INT);
                $query->bindParam(":problem_title", $problem_title, PDO::PARAM_STR);
                $query->bindParam(":problem_description", $problem_description, PDO::PARAM_STR);
                $query->bindParam(":problem_price", $problem_price, PDO::PARAM_STR);
            
           
                if($query->execute()){
                    
        
                            $arr= array("Success", "Problem saved.");
                            $_SESSION['notifStatus']= $arr;
                            redirect_to($appBaseURL . "/public/deviceProblems");  
                }
                
                else{
                    $arr= array("Error", "Kindly report to administrator.");
                    $_SESSION['notifStatus']= $arr;
                    redirect_to($appBaseURL . "/public/deviceProblems");  
                }
        
                //dispose the db connection
                $WidgetLink= NULL;
                //dispose the userObject
                $userObject= NULL;
                }


                function updateDeviceProblem($problemID, $problem_title, $problem_description, $problem_price){
                    global $WidgetLink;
                    global $userObject;
                    global $appBaseURL;

                    //add decimal value to price
                    $problem_price= $problem_price . ".00";
            
                    //first insert the relevant data in user_accounts table that will manage login
                    $query= $WidgetLink->prepare("UPDATE `problems` SET problem_title= :problem_title, problem_description= :problem_description,
                                                  problem_price= :problem_price WHERE id= :id");
                    $query->bindParam(":problem_title", $problem_title, PDO::PARAM_STR);
                    $query->bindParam(":problem_description", $problem_description, PDO::PARAM_STR);
                    $query->bindParam(":problem_price", $problem_price, PDO::PARAM_STR);
                    $query->bindParam(":id", $problemID, PDO::PARAM_INT);
                
               
                    if($query->execute()){
                        
            
                                $arr= array("Success", "Problem updated.");
                                $_SESSION['notifStatus']= $arr;
                                redirect_to($appBaseURL . "/public/deviceProblems");  
                    }
                    
                    else{
                        $arr= array("Error", "Kindly report to administrator.");
                        $_SESSION['notifStatus']= $arr;
                        redirect_to($appBaseURL . "/public/deviceProblems");  
                    }
            
                    //dispose the db connection
                    $WidgetLink= NULL;
                    //dispose the userObject
                    $userObject= NULL;
                    }


                function updateProduct($producrID, $deviceName, $model, $productIMG){
                    global $WidgetLink;
                    global $userObject;
                    global $appBaseURL;
            
                    $query= $WidgetLink->prepare("UPDATE `products` SET device_name= :device_name, model_name= :model_name,
                                                  model_image= :model_image WHERE id= :id");
                    $query->bindParam(":device_name", $deviceName, PDO::PARAM_STR);
                    $query->bindParam(":model_name", $model, PDO::PARAM_STR);
                    $query->bindParam(":model_image", $productIMG, PDO::PARAM_STR);
                    $query->bindParam(":id", $producrID, PDO::PARAM_INT);
                
               
                    if($query->execute()){
                        
            
                                $arr= array("Success", "Product updated.");
                                $_SESSION['notifStatus']= $arr;
                                redirect_to($appBaseURL . "/public/manageProducts");  
                    }
                    
                    else{
                        $arr= array("Error", "Kindly report to administrator.");
                        $_SESSION['notifStatus']= $arr;
                        redirect_to($appBaseURL . "/public/manageProducts"); 
                    }
            
                    //dispose the db connection
                    $WidgetLink= NULL;
                    //dispose the userObject
                    $userObject= NULL;
                    }



                function deleteDeviceProblem($problemID){
                    global $WidgetLink;
                    global $appBaseURL;
                
                    $query= $WidgetLink->prepare("DELETE FROM `problems` WHERE id= :id");
                    $query->bindParam(':id', $problemID, PDO::PARAM_STR);
    
                    if($query->execute() === TRUE){
                        
                        echo "
                        <div class='alert alert-success background-success'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <i class='icofont icofont-close-line-circled text-white'></i>
                        </button>
                        <strong>Success!</strong> Problem deleted.
                    </div>
                        ";
                        /* $arr= array("Success", "Manufacturer deleted.");
                        $_SESSION['notifStatus']= $arr;
                        redirect_to($appBaseURL . "/public/manageProducts");  */
                    }
                
                    else{
                        $arr= array("Error", "kindly report to administrator.");
                        $_SESSION['notifStatus']= $arr;
                        redirect_to($appBaseURL . "/public/deviceProblems"); 
                    }
    
                    //dispose the db connection
                    $WidgetLink= NULL;
                    $appBaseURL= NULL;
                }


                function deleteAppointment($appID){
                    global $WidgetLink;
                    global $appBaseURL;
                
                    $query= $WidgetLink->prepare("DELETE FROM `appointments` WHERE id= :id");
                    $query->bindParam(':id', $appID, PDO::PARAM_STR);
    
                    if($query->execute() === TRUE){
                        
                        echo "
                        <div class='alert alert-success background-success'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <i class='icofont icofont-close-line-circled text-white'></i>
                        </button>
                        <strong>Success!</strong> Appointment deleted.
                    </div>
                        ";
                        /* $arr= array("Success", "Manufacturer deleted.");
                        $_SESSION['notifStatus']= $arr;
                        redirect_to($appBaseURL . "/public/manageProducts");  */
                    }
                
                    else{
                        $arr= array("Error", "kindly report to administrator.");
                        $_SESSION['notifStatus']= $arr;
                        redirect_to($appBaseURL . "/public/manageAppointments"); 
                    }
    
                    //dispose the db connection
                    $WidgetLink= NULL;
                    $appBaseURL= NULL;
                }
    
?>