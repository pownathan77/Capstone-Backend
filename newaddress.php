<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aid = $_POST["AID"];
$state = $_POST["state"];
$address = $_POST["address"];
$city = $_POST["city"];
$zip = $_POST["zip"];


$username = 'root';
$password = 'Panther$';
$databasename = 'ecommerce';
$con=mysqli_connect("localhost",$username,$password,$databasename);

$query = "CALL usp_NewAddress('".$aid."', '".$state."', '".$address."', '".$city."', '".$zip."')";
$sqlsearch = $con->query($query) or die($con->error);

$rows = array();
while($r = $sqlsearch->fetch_assoc()) {
        $rows['AID'] = $r['AID'];
        $rows['state'] = $r['stateAbbrv'];
        $rows['address'] = $r['address_ID'];
        $rows['city'] = $r['city'];
        $rows['zip'] = $r['zipCode'];
}

header('Content-Type: application/json; charset=UTL-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, HEAD');
header('Access-Control-Allow-Headers: X-Requested-With');
print json_encode($rows);
?>
