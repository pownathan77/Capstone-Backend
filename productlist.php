<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'root';
$password = 'Panther$';
$databasename = 'ecommerce';
$con=mysqli_connect("localhost",$username,$password,$databaseName);

$query = "SELECT title, price FROM Product";
$sqlsearch = $con->query($query) or die($con->error);

$rows = array();
  while($r = $sqlsearch->fetch_assoc()) {
    $rows[] = $r;
  }

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, HEAD');
print json_encode($rows);
?>
