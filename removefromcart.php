<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["AID"])) {
$aid = $_POST["AID"];
}
else
{
        echo "email variable is empty, or could not be accessed\n";
}
if (isset($_POST["PID"])) {
$pid = $_POST["PID"];
}
else
{
        echo "variable is empty, or could not be accessed\n";
}

$username = 'root';
$password = 'Panther$';
$databaseName = 'ecommerce';
$con=mysqli_connect("localhost",$username,$password,$databaseName);

$query = "CALL usp_RemoveFromCart('".$aid."', '".$pid."')";
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
