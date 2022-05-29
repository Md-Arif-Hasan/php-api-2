<html>
<head>
<title>...</title>
<style type="text/css">
/* table {
margin: 8px;
} */

th {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
background: #666;
color: #000;
padding: 2px 6px;
border-collapse: separate;
border: 1px solid #000;
}

td {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
border: 1px solid #DDD;
}
</style>
</head>
<body>
<?php



header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');


  $sql = "SELECT COUNT(*) as 'att' FROM attendance where employeeid='$_GET[id]' AND status='1' AND MONTH(date)='$_GET[month]' ";
  $result=$conn->query($sql);
  $html="";
  $html.="<h1 align='center'> Payslip  </h1>";
   $sql1="SELECT id FROM users where id='$_GET[id]' ";
  $result1=$conn->query($sql1);
  $row1=mysqli_fetch_assoc($result1);
  $html.="<div ><p align='left'> Employee ID:".$row1['id'];
  $html.="</p>";
 
  $html.="<p> Month:";
   $html.=date("F", strtotime(date("Y") ."-". $_GET['month'] ."-01"));
  $html.="</p> </div>";
  
  $html.=
  "<table border='1' width='300' cellspacing='0'>

<tr>

<th>Id</th>

<th>name</th> </tr>";

      // output data of each row
      $row = mysqli_fetch_assoc($result); 
    
$html.=
"<tr>
<td> " .$row['att'];
$html.=
"</td>
</table>";


        // // $html.=  "<td>" .$row['att'] "</td>"
        // //   "</table>";
        //   // echo $html;
            require_once __DIR__ . '/vendor/autoload.php';
          $mpdf = new \Mpdf\Mpdf();
          $mpdf->WriteHTML($html);
          $mpdf->Output();
          ?>
          </body>
          </html>
         
  