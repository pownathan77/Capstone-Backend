<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aid = $_POST["aid"];

$username = 'root';
$password = 'Panther$';
$databasename = 'ecommerce';
$con=mysqli_connect("localhost",$username,$password,$databasename);

$query = "CALL usp_GetAddress('".$aid."')";
$sqlsearch = $con->query($query) or die($con->error);

$rows = array();
while($r = $sqlsearch->fetch_assoc()) {
        $rows[] = $r;
}

header('Content-Type: application/json; charset=UTL-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, HEAD');
header('Access-Control-Allow-Headers: X-Requested-With');
print json_encode($rows);
?>
