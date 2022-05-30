<?php




header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');



$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn=new mysqli($servername, $username, $password,'test');
$data=json_decode(file_get_contents("php://input"));
// $n = trim( $_POST['id'] );
 $employeeid=mysqli_real_escape_string($conn,$data->id);
 $ename=mysqli_real_escape_string($conn,$data->name);
 $mobile=mysqli_real_escape_string($conn,$data->mobile);
 $money=mysqli_real_escape_string($conn,$data->amount);
$sql="INSERT INTO loan(employeeid,ename,mobile,amount) VALUES ('$employeeid','$ename','$mobile','$money') ";
if(isset($employeeid) && isset($ename) && isset($mobile) && isset($money)){
if (mysqli_query($conn, $sql)) {
    echo "Loan set successfully";
    echo $data->id;
}
 else {
echo "Failed to upload file.";
}}

// '$data->id','$data->name','$data->mobile','$data->amount'
