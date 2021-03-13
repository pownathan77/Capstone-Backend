<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'root';
$password = 'Panther$';
$databasename = 'ecommerce';
$con=mysqli_connect("localhost",$username,$password,$databaseName);

$query = check_login_info(accountid);
$sqlsearch = $con->query($query) or die($con->error);

$rows = array();
  while($r = $sqlsearch->fetch_assoc()) {
    $rows[] = $r;
  }

print json_encode($rows);
?>