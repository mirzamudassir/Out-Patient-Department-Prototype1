<?php
require_once(realpath(dirname(__FILE__) . '/..') . '/modal/initialize.php');
require_once 'classes/User.class.php';
global $link;
global $WidgetLink;
class UserController extends User{


  public function getUserBasicData($username){
    return parent::getUserBasicData($username);
  }

  public function getUsersList(){
    return parent::getUsersList();
  }

  public function getUserDetails($userID){
    return parent::getUserDetails($userID);
  }


  public function getManufacturers($query, $params){
    global $WidgetLink;

    if($query == 'ListForTable'){
      $stmt= $WidgetLink->prepare("SELECT * FROM `manufacturers` ORDER BY manufacturer_name ASC");
      
      try{
        $stmt->execute();
        while($row= $stmt->fetch()){
          $manID= $row['id'];
          $manufacturerName= $row['manufacturer_name'];
          $manIMG= $row['man_image'];
          $description= $row['man_description'];

          echo "
            <tr>
              <td>$manufacturerName</td>
              <td><img src='../$manIMG'></td>
              <td>$description</td>
              <td>
              <div class='card-block'>
              <div class='dropdown-primary dropdown open'>
                                                            <button class='btn btn-primary btn-sm dropdown-toggle waves-effect waves-light ' type='button' id='dropdown-2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'><i class='icofont icofont-info-square'></i>Info</button>
                                                            <div class='dropdown-menu' aria-labelledby='dropdown-2' data-dropdown-in='fadeIn' data-dropdown-out='fadeOut'>
                                                                <a class='dropdown-item waves-light waves-effect md-trigger updateManufacturer pointer' data-modal='updateManufacturer' id='$manID'>Update</a>
                                                                <div class='dropdown-divider'></div>
                                                                <a class='dropdown-item waves-light waves-effect deleteManufacturer' href='' id='$manID'>Delete</a>
                                                                
                                                            </div>
                                                        </div></div>
              </td>
            </tr>
      ";
        }

      }catch(PDOException $e){
        echo "ERR_UC: Kindky report to administrator.";
      }
    }else if($query == 'DetailsArray'){
      $manID= $params['man_id'];
      $stmt= $WidgetLink->prepare("SELECT * FROM `manufacturers` WHERE id= :id");
      $stmt->bindParam(":id", $manID, PDO::PARAM_STR);
      try{
        $stmt->execute();
        while($row= $stmt->fetch()){
          $manID= $row['id'];
          $manufacturerName= $row['manufacturer_name'];
          $manIMG= $row['man_image'];
          $description= $row['man_description'];

          $arr= array($manID, $manufacturerName, $manIMG, $description);
        }
        if($params['output'] == 'JS'){
        return json_encode($arr);
        }else if($params['output'] == 'PHP'){
          return $arr;
        }

      }catch(PDOException $e){
        echo "ERR_UC: Kindky report to administrator.";
      }


      
    }else if($query == 'ListForDropDown'){

      $stmt= $WidgetLink->prepare("SELECT * FROM `manufacturers`");
      try{
        $stmt->execute();
        if($stmt->rowCount() == 0){
          echo "<option value=''>No manufacturer found.</option>";
        }else{
        while($row= $stmt->fetch()){
          $manID= $row['id'];
          $manufacturerName= $row['manufacturer_name'];

          echo "<option value='$manID'>$manufacturerName</option>";
        }
      }

      }catch(PDOException $e){
        echo "<option value='NULL'>ERROR: Report to Admin</option>";
      }
      
    }else if($query == 'count'){

      $stmt= $WidgetLink->prepare("SELECT * FROM `manufacturers`");
      try{
        $stmt->execute();
        $count= $stmt->rowCount();
        return $count;

      }catch(PDOException $e){
        return "ERROR: Report to admin.";
      }
      
    }
  }
  

  public function getProducts($query, $params){
    global $WidgetLink;

    if($query == 'ListForTable'){
      $stmt= $WidgetLink->prepare("SELECT * FROM `products`");
      
      try{
        $stmt->execute();
        while($row= $stmt->fetch()){
          $product_id= $row['id'];
          $device_name= $row['device_name'];
          $model_name= $row['model_name'];
          $manufacturer= $row['manufacturer'];
          $model_image= $row['model_image'];
          

          $arr= $this->getManufacturers("DetailsArray", array("man_id"=>$manufacturer, "output"=>"PHP"));
          $manufacturerName= $arr[1];

          echo "
            <tr>
              <td>$device_name</td>
              <td>$model_name</td>
              <td>$manufacturerName</td>
              <td><img src='../$model_image'></td>
              <td>
              <div class='card-block'>
              <div class='dropdown-primary dropdown open'>
                                                            <button class='btn btn-primary btn-sm dropdown-toggle waves-effect waves-light ' type='button' id='dropdown-2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'><i class='icofont icofont-info-square'></i>Info</button>
                                                            <div class='dropdown-menu' aria-labelledby='dropdown-2' data-dropdown-in='fadeIn' data-dropdown-out='fadeOut'>
                                                                <a class='dropdown-item waves-light waves-effect md-trigger updateProductBtn pointer' data-modal='updateProduct' id='$product_id'>Update</a>
                                                                <div class='dropdown-divider'></div>
                                                                <a class='dropdown-item waves-light waves-effect deleteProduct' href='' id='$product_id'>Delete</a>
                                                                
                                                            </div>
                                                        </div></div>
              </td>
            </tr>
      ";
        }

      }catch(PDOException $e){
        echo "ERR_UC: Kindky report to administrator.";
      }
    }else if($query == 'DetailsArray'){
      $product_id= $params['product_id'];
      $stmt= $WidgetLink->prepare("SELECT * FROM `products` WHERE id= :id");
      $stmt->bindParam(":id", $product_id, PDO::PARAM_STR);
      try{
        $stmt->execute();
        if($stmt->rowCount() == 0){
          return array("N/A", "N/A", "N/A");
        }else{
        while($row= $stmt->fetch()){
          $productID= $row['id'];
          $device_name= $row['device_name'];
          $model_name= $row['model_name'];
          $manufacturer= $row['manufacturer'];
          $model_image= $row['model_image'];

          //get manufacturer details
          $arr1= $this->getManufacturers("DetailsArray", array("man_id"=>$manufacturer, "output"=>"PHP"));
          $manufacturerName= $arr1[1]; //manufacturer_name

          $arr= array($productID, $device_name, $model_name, $manufacturerName, $model_image);
        }
        if($params['output'] == 'JS'){
        return json_encode($arr);
        }else if($params['output'] == 'PHP'){
          return $arr;
        }

      }
    }catch(PDOException $e){
      echo "ERR_UC: Kindky report to administrator.";
    }


      
    }else if($query == 'ListForDropDown'){
      $manID= $params['man_id'];

      $stmt= $WidgetLink->prepare("SELECT * FROM `products` WHERE manufacturer= :manufacturer");
      $stmt->bindParam(":manufacturer", $manID, PDO::PARAM_INT);
      try{
        $stmt->execute();
        if($stmt->rowCount() == 0){
          echo "<option value=''>No models found.</option>";
        }else{
        while($row= $stmt->fetch()){
          $modelID= $row['id'];
          $model_name= $row['model_name'];

          echo "<option value=''></option>
          <option value='$modelID'>$model_name</option>";
        }
      }

      }catch(PDOException $e){
        echo "<option value='NULL'>ERROR: Report to Admin</option>";
      }
      
    }else if($query == 'count'){

      $stmt= $WidgetLink->prepare("SELECT COUNT(*) FROM `products` AS count");
      try{
        $stmt->execute();
        while($row= $stmt->fetch()){
            
          $count= $row['count'];
        }
        return $count;

      }catch(PDOException $e){
        return "ERROR: Report to admin.";
      }
      
    }
  }



  public function getProblems($query, $params){
    global $WidgetLink;

    if($query == 'ListForTable'){
      $stmt= $WidgetLink->prepare("SELECT * FROM `problems`");
      
      try{
        $stmt->execute();
        while($row= $stmt->fetch()){
          $problem_id= $row['id'];
          $manufacturer= $row['manufacturer'];
          $model= $row['model'];
          $problem_title= $row['problem_title'];
          $problem_description= $row['problem_description'];
          $problem_price= $row['problem_price'];
          

          $arr= $this->getManufacturers("DetailsArray", array("man_id"=>$manufacturer, "output"=>"PHP"));
          $manufacturerName= $arr[1];

          $arr1= $this->getProducts("DetailsArray", array("product_id"=>$model, "output"=>"PHP"));
          $modelName= $arr1[2];

          echo "
            <tr>
              <td>$manufacturerName</td>
              <td>$modelName</td>
              <td style='white-space: pre-wrap;'>$problem_title</td>
              <td style='white-space: pre-wrap;'>$problem_description</td>
              <td>$problem_price</td>
              <td>
              <div class='card-block'>
              <div class='dropdown-primary dropdown open'>
                                                            <button class='btn btn-primary btn-sm dropdown-toggle waves-effect waves-light ' type='button' id='dropdown-2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'><i class='icofont icofont-info-square'></i>Info</button>
                                                            <div class='dropdown-menu' aria-labelledby='dropdown-2' data-dropdown-in='fadeIn' data-dropdown-out='fadeOut'>
                                                            <a class='dropdown-item waves-light waves-effect md-trigger updateDeviceProblem pointer' data-modal='updateDeviceProblem' id='$problem_id'>Update</a>
                                                            <div class='dropdown-divider'></div>
                                                                <a class='dropdown-item waves-light waves-effect deleteDeviceProblem' href='' id='$problem_id'>Delete</a>
                                                                
                                                            </div>
                                                        </div></div>
              </td>
            </tr>
      ";
        }

      }catch(PDOException $e){
        echo "ERR_UC: Kindky report to administrator.";
      }
    }else if($query == 'DetailsArray'){
      $problem_id= $params['problem_id'];
      $stmt= $WidgetLink->prepare("SELECT * FROM `problems` WHERE id= :id");
      $stmt->bindParam(":id", $problem_id, PDO::PARAM_STR);
      try{
        $stmt->execute();
        while($row= $stmt->fetch()){
          $problem_id= $row['id'];
          $manufacturer= $row['manufacturer'];
          $model= $row['model'];
          $problem_title= $row['problem_title'];
          $problem_description= $row['problem_description'];
          $problem_price= $row['problem_price'];

          //get model details
          $arr= $this->getProducts("DetailsArray", array("product_id"=>$model, "output"=>"PHP"));
          $modelName= $arr[2]; //model_name

          //get manufacturer details
          $arr1= $this->getManufacturers("DetailsArray", array("man_id"=>$manufacturer, "output"=>"PHP"));
          $manufacturerName= $arr1[1]; //manufacturer_name

          //remove the .00 from the price
          $problem_price= substr($problem_price, 0, -3);

          $arr= array($problem_id, $manufacturerName, $modelName, $problem_title, $problem_description, $problem_price);
        }
        if($params['output'] == 'JS'){
        return json_encode($arr);
        }else if($params['output'] == 'PHP'){
          return $arr;
        }

      }catch(PDOException $e){
        echo "ERR_UC: Kindky report to administrator.";
      }


      
    }else if($query == 'ListForDropDown'){
      $manID= $params['man_id'];

      $stmt= $WidgetLink->prepare("SELECT * FROM `products` WHERE manufacturer= :manufacturer");
      $stmt->bindParam(":manufacturer", $manID, PDO::PARAM_INT);
      try{
        $stmt->execute();
        if($stmt->rowCount() == 0){
          echo "<option value=''>No models found.</option>";
        }else{
        while($row= $stmt->fetch()){
          $modelID= $row['id'];
          $model_name= $row['model_name'];

          echo "<option value=''></option>
          <option value='$modelID'>$model_name</option>";
        }
      }

      }catch(PDOException $e){
        echo "<option value='NULL'>ERROR: Report to Admin</option>";
      }
      
    }else if($query == 'count'){

      $stmt= $WidgetLink->prepare("SELECT COUNT(*) FROM `problems` AS count");
      try{
        $stmt->execute();
        while($row= $stmt->fetch()){
            
          $count= $row['count'];
        }
        return $count;

      }catch(PDOException $e){
        return "ERROR: Report to admin.";
      }
      
    }
  }


  public function getAppointments($query, $params){
    global $WidgetLink;

    if($query == 'ListForTable'){
      $stmt= $WidgetLink->prepare("SELECT * FROM `appointments` ORDER BY id DESC");
      
      try{
        $stmt->execute();
        while($row= $stmt->fetch()){
          $appID= $row['id'];
          $appointment_id= $row['appointment_id'];
          $customer_first_name= $row['customer_first_name'];
          $customer_last_name= $row['customer_last_name'];
          $email= $row['email'];
          $phone= $row['phone'];
          $imei_no= $row['imei_no'];
          $customer_device= $row['customer_device'];
          $appointment_slot= $row['appointment_slot'];

          $customerName= $customer_first_name . " " . $customer_last_name;

          echo "
            <tr>
              <td style='white-space: pre-wrap; white-space: normal;'>$appointment_id</td>
              <td style='white-space: pre-wrap;'>$customerName</td>
              <td style='word-wrap: break-word; white-space: normal;'>$email</td>
              <td style='white-space: pre-wrap; white-space: normal;'>$phone</td>
              <td style='white-space: pre-wrap;'>$customer_device</td>
              <td style='white-space: pre-wrap;'>$appointment_slot</td>
              <td>
              <div class='card-block'>
              <div class='dropdown-primary dropdown open'>
                                                            <button class='btn btn-primary btn-sm dropdown-toggle waves-effect waves-light ' type='button' id='dropdown-2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'><i class='icofont icofont-info-square'></i>Info</button>
                                                            <div class='dropdown-menu' aria-labelledby='dropdown-2' data-dropdown-in='fadeIn' data-dropdown-out='fadeOut'>
                                                                <a class='dropdown-item waves-light waves-effect md-trigger detailsAppointment pointer' data-modal='detailsAppointment' id='$appID'>Details</a>
                                                                <div class='dropdown-divider'></div>
                                                                <a class='dropdown-item waves-light waves-effect deleteAppointment' href='' id='$appID'>Delete</a>
                                                                
                                                            </div>
                                                        </div></div>
              </td>
            </tr>
      ";
        }

      }catch(PDOException $e){
        echo "ERR_UC: Kindky report to administrator.";
      }
    }else if($query == 'DetailsArray'){
      $appointment_id= $params['appointment_id'];
      $stmt= $WidgetLink->prepare("SELECT * FROM `appointments` WHERE id= :id");
      $stmt->bindParam(":id", $appointment_id, PDO::PARAM_STR);
      try{
        $stmt->execute();
        while($row= $stmt->fetch()){
          $appID= $row['id'];
          $appointment_id= $row['appointment_id'];
          $customer_first_name= $row['customer_first_name'];
          $customer_last_name= $row['customer_last_name'];
          $email= $row['email'];
          $phone= $row['phone'];
          $imei_no= $row['imei_no'];
          $customer_address= $row['customer_address'];
          $customer_message= $row['customer_message'];
          $customer_device= $row['customer_device'];
          $device_problems= $row['device_problems'];
          $cd_device_problems= $row['cd_device_problems'];
          $quote_price= $row['quote_price'];
          $customer_type= $row['customer_type'];
          $appointment_slot= $row['appointment_slot'];
          $customer_reached_through= $row['customer_reached_through'];
          $appointment_timestamp= $row['appointment_timestamp'];

          //get problem_details
          $problemTitle= array();
          $arr= explode(',', $device_problems);
          for($i=0; $i<count($arr)-1; $i++){
            $probID= $arr[$i];
            $data= $this->getProblems("DetailsArray", array("problem_id"=>$probID, "output"=>"PHP"));
            $problemTitle[]= $data[3]; //problem_title
          }

          $arr= array($appID, $appointment_id, $customer_first_name, $customer_last_name, $email, $phone, $imei_no, $customer_address, $customer_message,
                      $customer_device, $problemTitle, $cd_device_problems, $quote_price, $customer_type, $appointment_slot, $customer_reached_through,
                      $appointment_timestamp);
        }
        if($params['output'] == 'JS'){
        return json_encode($arr);
        }else if($params['output'] == 'PHP'){
          return $arr;
        }

      }catch(PDOException $e){
        echo "ERR_UC: Kindky report to administrator.";
      }


      
    }else if($query == 'count'){

      $stmt= $WidgetLink->prepare("SELECT COUNT(*) FROM `appointments` AS count");
      try{
        $stmt->execute();
        while($row= $stmt->fetch()){
            
          $count= $row['count'];
        }
        return $count;

      }catch(PDOException $e){
        return "ERROR: Report to admin.";
      }
      
    }
  }



  public function getStoreSettings(){
    global $WidgetLink;

    $stmt= $WidgetLink->prepare("SELECT * FROM `store-settings`");
      try{
        $stmt->execute();
        if($stmt->rowCount() == 0){
          echo "ERROR: Kindly report to administrator.";
        }else{
        while($row= $stmt->fetch()){
          $id= $row['id'];
          $store_name= $row['store_name'];
          $currency_name= $row['currency_name'];
          $currency_symbol= $row['currency_symbol'];
          $opening_time= $row['opening_time'];
          $closing_time= $row['closing_time'];
          $break_time= $row['break_time'];
          $booking_interval= $row['booking_interval'];
          $halfDay1_day_name= $row['halfDay1_day_name'];
          $halfDay1_opening_time= $row['halfDay1_opening_time'];
          $halfDay1_closing_time= $row['halfDay1_closing_time'];
          $holiday1_day_name= $row['holiday1_day_name'];

          //adding suffixes
          $booking_interval= $booking_interval . " mins";

          $result= array("id"=>$id, "storeName"=>$store_name, "currencyName"=>$currency_name, "currencySymbol"=>$currency_symbol,
                         "openingTime"=>$opening_time, "closingTime"=>$closing_time, "breakTime"=>$break_time, "bookingInterval"=>$booking_interval,
                         "halfDayName"=>$halfDay1_day_name, "halfDayOpeningTime"=>$halfDay1_opening_time, "halfDayClosingTime"=>$halfDay1_closing_time,
                         "holidayName"=>$holiday1_day_name);

          return $result;
        }
      }

      }catch(PDOException $e){
        echo "ERROR: Kindly report to administrator.";
      }    
  }


public function getErrorNotification(){
    if(isset($_SESSION['notifStatus']) && $_SESSION['notifStatus'] != ''){
      $flag= $_SESSION['notifStatus'];
      
                            ?>
                          <script>  
                          var flag= <?php echo json_encode($flag); ?>
                          
                          Swal.fire({
                           
                            icon: 'error',
                            title: eval(JSON.stringify(flag[0])),
                            text: eval(JSON.stringify(flag[1])),
                            //timer: 3000 //3 seconds
                          });
                      </script>
<?php

unset($_SESSION['notifStatus']);

  }
  }

  
  public function getNotification(){
    if(isset($_SESSION['notifStatus']) && $_SESSION['notifStatus'] != ''){
      $flag= $_SESSION['notifStatus'];

      if($flag[0]=="Error"){
        $this->getErrorNotification();
      }else{
      
                            ?>
                          <script>  
                          var flag= <?php echo json_encode($flag); ?>
                          
                    Swal.fire({
                            
                            icon: 'success',
                            title: eval(JSON.stringify(flag[0])),
                            text: eval(JSON.stringify(flag[1])),
                            //timer: 3000 // 3 seconds
                          });
                      </script>
<?php

unset($_SESSION['notifStatus']);

  }
  }
}



//it tells weather the problem already registered in the database or not
public function isProblemAlreadyExist($params){
  global $WidgetLink;
  $manID= $params['manufacturer'];
  $modelID= $params['model'];

  $stmt= $WidgetLink->prepare("SELECT * FROM `problems` WHERE manufacturer= :manufacturer AND model= :model");
  $stmt->bindParam(":manufacturer", $manID, PDO::PARAM_INT);
  $stmt->bindParam(":model", $modelID, PDO::PARAM_INT);
  $stmt->execute();

  if($stmt->rowCount() == 0){
    return FALSE;
  }else{
    return TRUE;
  }
}
  
  
  /**$current_location= dirname(__FILE__);
  if($current_location== 'F:\xampp\htdocs\project\core\controller' OR $current_location== 'F:\xampp\htdocs\project\core\view'){
    
  }else{
    require_once('footer.php');
  }**/
}
?>