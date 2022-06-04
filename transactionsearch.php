<?php

header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');

$sdate=$data->startdate;
$ldate=$data->enddate;

// $sql="SELECT * FROM transaction where date between '2022-01-01' and '2022-06-31'";
$sql="SELECT * FROM transaction where date between '$sdate' and '$ldate'";
$run=mysqli_query($conn,$sql);
$products=mysqli_fetch_all($run,MYSQLI_ASSOC);
echo json_encode($products);