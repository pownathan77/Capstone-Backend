<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$email = json_decode($_POST["email"], FALSE);
$userpassword = json_decode($_POST["userPassword"], FALSE);

$username = 'root';
$password = 'Panther$';
$databaseName = 'ecommerce';
$con=mysqli_connect("localhost",$username,$password,$databaseName);

$query = "CALL usp_GetLoginInfo('".$email."', '".$userpassword."')";
$sqlsearch = $con->query($query) or die($con->error);

$rows = array();
  while($r = $sqlsearch->fetch_assoc()) {
    $rows[] = $r;
  }

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, HEAD');
header('Access-Control-Allow-Headers: X-Requested-With');
print json_encode($rows);
?>
