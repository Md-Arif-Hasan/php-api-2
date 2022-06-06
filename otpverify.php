
<?php

header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');
session_start();

$data=json_decode(file_get_contents("php://input"));
include('db.php');


$sql="SELECT * FROM registration WHERE id='$data->id' AND token='$data->token' ";

$result=$conn->query($sql);
    
        if ($result ->num_rows > 0) {
            // output data of each row
            while($row = $result -> fetch_assoc()) {

              // echo $data->token;
    

              $sql1= "INSERT INTO users (id, name, mobile)
                SELECT id, name, mobile FROM registration WHERE id='$data->id'";
                $result1=$conn->query($sql1);
                if ($result1) {
                  $response[] = array('status'=>1);
                  } else {
                    $response[] = array('status'=>0);
            }}}
            else
            {
              $response[] = array('status'=>0);
            }
            echo json_encode($response);