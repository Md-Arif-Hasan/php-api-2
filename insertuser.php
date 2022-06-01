<?php

header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');

// Create connection
$id=$data->id;
$name=$data->name;
$mobile=$data->mobile;

// $date = date('Y-m-d', strtotime('date1'));

//  $date = date('Y-m-d', strtotime('$data->date'));
if($id){
 $sql = "INSERT INTO registration (id,name,mobile) VALUES ('$id','$name','$mobile')";  
}
$result=$conn->query($sql);

if($result){
  $response[] = array('status'=>1);
}else{
  $response[] = array('status'=>0);
}
echo json_encode($response);