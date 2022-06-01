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
$html="";
$html.="<h1 align='center'> WAREHOUSE REPORT </h1>";
$html.="<h3 align='center'> Sultan Tea Garden </h3>";
$html.="Month:".date("F", strtotime(date("Y") ."-". $_GET['month'] ."-01"));
$html.="<br> <br>";
$teaincome="SELECT SUM(amount) as 'teaincome' FROM warehouse WHERE item='tea' AND status='1' AND MONTH(date)='$_GET[month]' ";
$result=$conn->query($teaincome);
$row=mysqli_fetch_assoc($result);

$teaout="SELECT SUM(amount) as 'teaout' FROM warehouse WHERE item='tea' AND status='0' AND MONTH(date)='$_GET[month]' ";
$result1=$conn->query($teaout);
$row1=mysqli_fetch_assoc($result1);

$ferincome="SELECT SUM(amount) as 'ferincome' FROM warehouse WHERE item='fertilizer' AND status='1' AND MONTH(date)='$_GET[month]' ";
$result2=$conn->query($ferincome);
$row2=mysqli_fetch_assoc($result2);

$ferout="SELECT SUM(amount) as 'ferout' FROM warehouse WHERE item='fertilizer' AND status='0' AND MONTH(date)='$_GET[month]' ";
$result3=$conn->query($ferout);
$row3=mysqli_fetch_assoc($result3);

$pestincome="SELECT SUM(amount) as 'pestincome' FROM warehouse WHERE item='pesticide' AND status='1' AND MONTH(date)='$_GET[month]' ";
$result4=$conn->query($pestincome);
$row4=mysqli_fetch_assoc($result4);

$pestout="SELECT SUM(amount) as 'pestout' FROM warehouse WHERE item='pesticide' AND status='0' AND MONTH(date)='$_GET[month]' ";
$result5=$conn->query($pestout);
$row5=mysqli_fetch_assoc($result5);

$totaltea=$row['teaincome']-$row1['teaout'];
$totalfert=$row2['ferincome']-$row3['ferout'];
$totalpest=$row4['pestincome']-$row5['pestout'];

  $html.=
  "<table border='1' width='600' cellspacing='0'>

<tr>

<th colspan='2'>Tea</th>

<th colspan='2'>Fertilizer</th> 

<th colspan='2'>Pesticide</th> 
 
</tr>";
$html.=
"<tr>
<td>Tea Leaf Incoming</td>

<td>Tea Leaf Outgoing</td>
 
<td>Fertilizer Incoming</td>
<td>Fertilizer Outgoing</td>
<td>Pesticide Incoming</td>
<td>Pesticide Outgoing</td> </tr>";

$html.=
"<tr>
<td>".$row['teaincome'];
$html.="</td>";
$html.=
"
<td>".$row1['teaout'];
$html.="</td>";
$html.=
"
<td>".$row2['ferincome'];
$html.="</td>";

$html.=
"
<td>".$row3['ferout'];
$html.="</td>";

$html.=
"
<td>".$row4['pestincome'];
$html.="</td>";

$html.=
"
<td>".$row5['pestout'];
$html.="</td></tr>";

$html.="<tr > <td rowspan='2'> <b>Net Tea Leaf</b></td> <td rowspan='2'>".$totaltea;
$html.="</td>";
$html.="<td rowspan='2'><b> Net Fertilizer</b></td> <td rowspan='2'>".$totalfert;
$html.="</td>";
$html.="<td rowspan='2'><b> Net Pesticide </b></td> <td rowspan='2'>".$totalpest;
$html.="</td> </tr>";



$html.=
 "
 </table>";
      // output data of each row
   


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
         
  