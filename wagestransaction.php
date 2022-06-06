<?php




header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');

// $employeeid=$_POST['id'];
// $ename=$_POST['name'];
// $mobile=$_POST['mobile'];
$url = "http://66.45.237.70/api.php";
$month=$data->month;
$month1=date("F", strtotime(date("Y") ."-". $month ."-01"));
$employeeid='$data->employeeid';

// echo $month;
$sql="SELECT COUNT(*) as 'att' FROM attendance where employeeid='$data->employeeid' AND status='1' AND MONTH(date)='$data->month' ";
$result=$conn->query($sql);
$row = mysqli_fetch_assoc($result);
$wage=$row['att']*300;

// echo $wage;

if($data->employeeid){
$sql8="INSERT INTO transaction(tid,date,employeeid,amount,type) VALUES ('$data->tid',CURRENT_TIME(),'$data->employeeid','$wage','wages') ";
}if (mysqli_query($conn, $sql8)) {
    $response[] = array('status'=>1);

    $text="Your wages of $month1 has been sent successfully!";
     echo $text;
    $sql9="SELECT mobile FROM users WHERE id='$data->employeeid'";
    $result1=$conn->query($sql9);
    
    if ($result1 ->num_rows > 0) {
        // output data of each row
        while($row = $result1 -> fetch_assoc()) {
          $number= $row['mobile'];
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
    }}}
 else {
    $response[] = array('status'=>0);
}
echo json_encode($response);