<?php
header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:PUT');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');



if($data->id)
{
    $query2="SELECT * FROM registration WHERE id=".$data->id;
    $run2=mysqli_query($conn,$query2);
    $product=mysqli_fetch_assoc($run2);
    $id=$product['id'];
    $name=$product['name'];
    $email=$product['email'];

if($data->name!='')
{
    $name=$data->name;
}

if($data->email!='')
{
    $email=$data->email;
}

$query="UPDATE registration SET name='$name' , email='$email' WHERE id=".$data->id;
$run=mysqli_query($conn,$query);
if($run)
{
    echo json_encode(['status' => 'success','msg'=>'updated!']);
}

else {
    echo json_encode(['status' => 'failed','msg'=>'sorry!']);
  }

}
else{
    echo json_encode(['status' => 'failed','msg'=>'no user id!']);
}