<?php

header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');

$url = "http://66.45.237.70/api.php";
// if(isset($_GET['id'])){
//     $sql="SELECT mobile FROM registration WHERE id=".$_GET['id'];
//    # $sql1="SELECT token FROM registration WHERE id=".$_GET['id'];
// }

$sql="SELECT mobile,token FROM registration where id='123455'";
$run=mysqli_query($conn,$sql);
#$run1=mysqli_query($conn,$sql1);
while ($row = $run->fetch_assoc()) {
    $number= $row['mobile'];
    $token=$row['token'];
}
$text="Your one time pass is".'$token'."!";
$data= array(
'username'=>"G4L18",
'password'=>"59FZRDXM",
'number'=>"$number",
'message'=>"$text"
);


$ch = curl_init(); // Initialize cURL
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$smsresult = curl_exec($ch);
$p = explode("|",$smsresult);
$sendstatus = $p[0];
echo $sendstatus;

echo json_encode(['status' => 'success','msg'=>'added!']);


//Send SMS  from your database using php


?>