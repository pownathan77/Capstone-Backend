<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aid = $_POST['aid'];

$username = 'root';
$password = 'Panther$';
$databasename = 'ecommerce';
$con=mysqli_connect("localhost",$username,$password,$databasename);

$query = "CALL usp_GetCart('".$aid."')";
$sqlsearch = $con->query($query) or die($con->error);

$rows = array();
  while($r = mysqli_fetch_assoc($sqlsearch)) {
    $rows[] = $r;
  }

print json_encode($rows);
?>
