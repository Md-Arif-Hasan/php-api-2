<?php




header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');
$employeeid=$data->id;
$ramount=$data->amount;
if($employeeid){
$sql1="SELECT * FROM loan WHERE employeeid='$employeeid'";}

$result1=$conn->query($sql1);

  $row1=mysqli_fetch_assoc($result1);
//   echo $row1['amount'];
$newamount=$row1['amount']-$ramount;
if($employeeid){
$sql="UPDATE loan SET amount='$newamount' WHERE employeeid='$employeeid' ";

}
$result=$conn->query($sql);
if($result){
    $response[] = array('status'=>1);
}else{
    $response[] = array('status'=>0);
}
echo json_encode($response);