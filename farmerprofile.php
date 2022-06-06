<?php
header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');


    $sql = "SELECT * FROM loan where employeeid='$data->id' ";
    $run=mysqli_query($conn,$sql);
    $products=mysqli_fetch_all($run,MYSQLI_ASSOC);
    echo json_encode($products);