<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aid = $_POST["aid"];
$subtotal = $_POST["subtotal"];
$tax = $_POST["tax"];
$total = $_POST["total"];
$address = $_POST["address"];

$username = 'root';
$password = 'Panther$';
$databasename = 'ecommerce';
$con=mysqli_connect("localhost",$username,$password,$databasename);

$query = "CALL usp_ToPurchase('".$aid."', '".$subtotal."', '".$tax."', '".$total."', '".$address."')";
$sqlsearch = $con->query($query) or die($con->error);

$rows = array();
while($r = $sqlsearch->fetch_assoc()) {
        $rows['AID'] = $r['AID'];
        $rows['email'] = $r['email'];
        $rows['username'] = $r['username'];
        $rows['fname'] = $r['fname'];
        $rows['lname'] = $r['lname'];
        $rows['phone'] = $r['phone'];
        $rows['taxable'] = $r['taxExempt'];
}

header('Content-Type: application/json; charset=UTL-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, HEAD');
header('Access-Control-Allow-Headers: X-Requested-With');
print json_encode($rows);
?>
