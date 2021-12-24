<?php
$con = mysqli_connect("localhost","root","","API_DATA");
if($con){
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if($id>0){
    $sql = "select * from data WHERE id =$id";
    $result = mysqli_query($con,$sql);
    if($result){
        header("Content-Type: JSON");
        $deatils = array();
     $result = mysqli_fetch_array($result);
     $deatils['id'] = $result['id'];
     $deatils['first_name'] = $result['first_name'];
     $deatils['last_name'] = $result['last_name'];
     $deatils['email_id'] = $result['email_id'];

    }
      // success  
      $response["success"] = 1;
      $response["details"] = array();  
      array_push($response["details"], $deatils); 
      echo json_encode($response,JSON_PRETTY_PRINT);  
    }
    else{
        // faillure
      $response["success"] = 0;  
      $response["msg"] = "No Record Found...";
        echo json_encode($response,JSON_PRETTY_PRINT);
    } 
}
    else{
        // faillure
      $response["success"] = 0;  
      $response["msg"] = "No Record Found...";
        echo json_encode($response,JSON_PRETTY_PRINT);
    }
 }
else{
    echo "Connection Failled...";
}
?>