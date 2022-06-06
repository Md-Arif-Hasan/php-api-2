<?php




header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');
$employeeid=$data->id;
$ename=$data->name;
$mobile=$data->mobile;
$amount=$data->amount;
if($employeeid){
$sql="INSERT INTO loan(employeeid,ename,mobile,amount) VALUES ('$employeeid','$ename','$mobile','$amount') ";

}
$result=$conn->query($sql);
if($result){
    $response[] = array('status'=>1);
}else{
    $response[] = array('status'=>0);
}
echo json_encode($response);