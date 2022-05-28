<?php
header('Access-Control-Allow-Origin:*');
header('Content-type:application/json');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-With');


$data=json_decode(file_get_contents("php://input"));
include('db.php');
if (isset($_GET['file_id'])){
$id = $_GET['file_id'];

// fetch file to download from database
$sql = "SELECT * FROM file WHERE id=$id";
$result = mysqli_query($conn, $sql);

$file = mysqli_fetch_assoc($result);
$filepath = 'uploads/' . $file['name'];

if (file_exists($filepath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($filepath));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('uploads/' . $file['name']));
    readfile('uploads/' . $file['name']);

    // Now update downloads count
    $newCount = $file['downloads'] + 1;
    $updateQuery = "UPDATE file SET downloads=$newCount WHERE id=$id";
    mysqli_query($conn, $updateQuery);
    exit;
}}