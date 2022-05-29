<?php




header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');
$employeeid=$_POST['id'];
$ename=$_POST['name'];
$mobile=$_POST['mobile'];
$sql="INSERT INTO loan(employeeid,ename,mobile) VALUES ('$employeeid','$ename','$mobile') ";
if (mysqli_query($conn, $sql)) {
    echo "File uploaded successfully";
}
 else {
echo "Failed to upload file.";
}