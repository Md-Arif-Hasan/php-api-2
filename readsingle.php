<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');
include_once('db.php');

session_start();

$data=json_decode(file_get_contents("php://input"));

$url = "http://66.45.237.70/api.php";
$token=rand(1000,9999);
// echo $token;
$sql1="UPDATE registration SET token='$token' WHERE id='$data->id' AND name='$data->name' ";
$result2=$conn->query($sql1);
    
        $sql="SELECT * FROM registration WHERE id='$data->id' AND name='$data->name' ";
    
        $result1=$conn->query($sql);
    
        if ($result1 ->num_rows > 0) {
          $response[] = array('status'=>1);
            // output data of each row
            while($row = $result1 -> fetch_assoc()) {
              $number= $row['mobile'];
              $token=$row['token'];
              $_SESSION["sesid"]=$row['id'];
              
              
              $text="Your Sultan tea garden OTP is ".$row['token']."!";
              // echo $text;
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
            // echo $sendstatus;

            }
          } else {
            $response[] = array('status'=>0);
          }
          echo json_encode($response);