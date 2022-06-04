
<?php



header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');

  $transactionid= rand(200000,299999);
  $sql = "SELECT COUNT(*) as 'att' FROM attendance where employeeid='$data->employeeid' AND status='1' AND MONTH(date)='$data->month' ";
  $result=$conn->query($sql);
  $html="";
  $html.="<h1 align='center'> Payslip  </h1>";
  $sql1="SELECT id FROM users where id='$data->employeeid' ";
  $result1=$conn->query($sql1);
  $row1=mysqli_fetch_assoc($result1);
  $html.="<div ><p align='left'> Employee ID:".$row1['id'];
  
  $sql2="SELECT name FROM users WHERE id='$data->employeeid' ";
  $result2=$conn->query($sql2);
  $row2=mysqli_fetch_assoc($result2);
 
   $html.="&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Month:".date("F", strtotime(date("Y") ."-". '$data->month' ."-01"));
   

  $html.="</p>";
  $html.="<p> Name:".$row2['name'];
 $html.="</p> ";
 $html.="<p> Transaction ID: ";
 $html.=$transactionid;
  $row = mysqli_fetch_assoc($result); 
   
 $html.="<p> Attendance :" .$row['att'];
 
 $sql3 = "SELECT COUNT(*) as 'abs' FROM attendance where employeeid='$data->employeeid' AND status='0' AND MONTH(date)='$data->month' ";
 $result3=$conn->query($sql3);
 $row3 = mysqli_fetch_assoc($result3); 
 $html.="&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Absence :".$row3['abs'];
$sql4="SELECT basic FROM salary where employeeid='$data->employeeid'";
$result4=$conn->query($sql4);
$row4 = mysqli_fetch_assoc($result4);
if('$data->month'==5 || '$data->month'==7)
{
  $bonus=$row4['basic'];
} 
else
{$bonus=0;}
$absence=$row3['abs']*600;
$sql5="SELECT tax FROM salary where employeeid='$data->employeeid'";
$result5=$conn->query($sql5);
$row5 = mysqli_fetch_assoc($result5); 

$sql6="SELECT rent FROM salary where employeeid='$data->employeeid'";
$result6=$conn->query($sql6);
$row6 = mysqli_fetch_assoc($result6); 

$sql7="SELECT medical FROM salary where employeeid='$data->employeeid'";
$result7=$conn->query($sql7);
$row7 = mysqli_fetch_assoc($result7); 

$gross=$row4['basic']+$bonus+$row6['rent']+$row7['medical'];
$net=$gross-$absence-$row5['tax'];
  $html.=
  "<table border='1' width='600' cellspacing='0'>

<tr>

<th>Emuloments</th>

<th>Amount</th> 

<th>Deductions</th> 
<th>Amount</th> 
</tr>";
$html.=
"<tr>
<td>Basic Pay</td>
<td>".$row4['basic'];

$html.="</td> ";
$html.=
"
<td>Profession Tax</td>
<td>".$row5['tax'];

$html.="</td> </tr>";
$html.=
"<tr>
<td>Rent Allowance</td>
<td>".$row6['rent'];
$html.="</td> </tr>";
$html.=
"
<td>Absence</td>
<td>".$absence;
$html.="</td> </tr>";
$html.=
"<tr>
<td>Medical Allowance</td>
<td>".$row7['medical'];
$html.="</td> </tr>";
$html.=
"<tr>
<td>Holiday Bonus</td>
<td>".$bonus;

$html.="</td> </tr>";

$html.=
"<tr>
<td><b>Gross Pay</b></td>
<td>".$gross;

$html.="</td>";
$html.="<td><b>Net Pay</b></td>
<td>".$net;

$html.=
 "
 </table>";
      // output data of each row
   


        // // $html.=  "<td>" .$row['att'] "</td>"
        // //   "</table>";
        //   // echo $html;
        //     require_once __DIR__ . '/vendor/autoload.php';
        //   $mpdf = new \Mpdf\Mpdf();
        //   $mpdf->WriteHTML($html);
        //   $mpdf->Output();
        //   
        //   </body>
        //   </html>
         ?>
  