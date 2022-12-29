<?php
require_once("../modal/initialize.php");
global $WidgetLink;

if(isset($_GET['q'])){

    $query= $_GET['q'];

    $stmt= $WidgetLink->prepare("SELECT * FROM `manufacturers` WHERE manufacturer_name LIKE ?");
    $param= "%$query%";
    $stmt->bindParam("ss", $param, $param);
    $data= array();
    if($stmt->execute()){
        $result= $stmt->get_result();
        if($result->num_rows>0){
            while($row= $result->fetch_assoc()){
                $id= $row['id'];
                $manufacturerName= $row['manufacturer_name'];
                $data[]= array('id'=>$id, 'man_name'=>$manufacturerName);
            }
            $stmt->close();
        }else{
            $data[]= array('id'=>0, 'man_name'=>'No data found.');
        }

        echo json_encode($data);
    }

}