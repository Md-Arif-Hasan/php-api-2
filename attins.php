<?php

header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');
session_start();

$data=json_decode(file_get_contents("php://input"));
include('db.php');

// Create connection

 
// $date = date('Y-m-d', strtotime('date1'));

//  $date = date('Y-m-d', strtotime('$data->date'));
 $sql = "INSERT INTO attendance (employeeid,date,status) VALUES ('$data->employeeid','$data->date','$data->status')";  

$result=$conn->query($sql);

if ($result) {
    echo json_encode(['status' => 'success','msg'=>'added!']);
  } else {
    echo json_encode(['status' => 'failed','msg'=>'sorry!']);}
