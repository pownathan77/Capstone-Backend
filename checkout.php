<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'root';
$password = 'Panther$';
$databasename = 'ecommerce';
$con=mysqli_connect("localhost",$username,$password,$databaseName);

$query = cart_to_purchase();
$sqlsearch = mysqli_query($con, $query);
$resultcount = mysqli_numrows($sqlsearch);

$rows = array();
  while($r = mysqli_fetch_assoc($sqlsearch)) {
    $rows[] = $r;
  }

print json_encode($rows);
?>