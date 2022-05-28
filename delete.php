<?php
header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');



if($data->id)
{
    

$query="DELETE FROM registration  WHERE id=".$data->id;
$run=mysqli_query($conn,$query);
if($run)
{
    echo json_encode(['status' => 'success','msg'=>'product Deleted']);
}

else {
    echo json_encode(['status' => 'failed','msg'=>'sorry!']);
  }

}
else{
    echo json_encode(['status' => 'failed','msg'=>'no user id!']);
}