<?php
require_once("../modal/initialize.php");

$userid = 0;
global $link;
if(isset($_POST['userid'])){
   $userid = filter_var($_POST['userid'], FILTER_SANITIZE_STRING);


$sql = $link->prepare("SELECT * FROM `user_accounts` WHERE id= :id");
$sql->bindParam(":id", $userid, PDO::PARAM_STR);
$sql->execute();
while( $row = $sql->fetch()){
 $id = $row['id'];
 $username = $row['username'];
 $full_name= $row['full_name'];
 $role = $row['user_role'];
 $contact_no = $row['contact_no'];
}

echo "

<form action='../core/view/dataParser?f=updateUser' method='POST'>
<div class='form-group row'>
<div class='col-sm-4'>
<input type='text' class='form-control' name='full_name' value='$full_name' required>
</div>
<div class='col-sm-4'>
<select name='user_role' class='form-control' required>
<option value=''>-- SELECT ROLE --</option>
 
</select>
</div>
<div class='col-sm-4'>
<input type='number' class='form-control' name='contact' placeholder='Contact No' required>
</div>

</div>
<div class='form-group row'>
<div class='col-sm-4'>
<input type='email' class='form-control' name='email' placeholder='Email' required>
</div>
<div class='col-sm-4'>
<select name='access_level' class='form-control' required>
<option value=''>-- Access Level --</option>
<option value='USER'>USER</option>
<option value='ADMIN'>ADMIN</option>
</select>
</div>
<div class='col-sm-4'>
<select name='account_status' class='form-control' required>
<option value=''>-- Account Status --</option>
<option value='ACTIVE'>ACTIVE</option>
<option value='TEMPORARY DISABLED'>TEMPORARY DISABLED</option>
<option value='DORMANT'>DORMANT</option>
</select>
</div>

</div>
<div class='form-group row'>
<div class='col-sm-4'>
<input type='text' name='username' class='form-control' placeholder='Username' required>
</div>
<div class='col-sm-4'>
<input type='password' name='password' class='form-control' placeholder='Password' required>
</div>

</div>
    <div class='text-center'>
        <button type='submit' class='btn btn-primary waves-effect m-r-20 f-w-600 d-inline-block'>Save</button>
        <button type='button' class='btn btn-primary waves-effect m-r-20 f-w-600 md-close d-inline-block'>Close</button>
    </div>
    </form>


 ";
}

exit;
?>