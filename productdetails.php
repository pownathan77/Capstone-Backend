<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["pid"])) {
        $pid = $_POST["pid"];
}
else {
        echo "PID could not be found\n";
}

$username = 'root';
$password = 'Panther$';
$databaseName = 'ecommerce';
$con=mysqli_connect("localhost",$username,$password,$databaseName);

$query = "CALL usp_ProductDetails('".$pid."')";
$sqlsearch = $con->query($query) or die($con->error);

$rows = array();
        while($r = $sqlsearch->fetch_assoc()) {
        $rows['PID'] = $r['PID'];
        $rows['title'] = $r['title'];
        $rows['category'] = $r['category'];
        $rows['product_description'] = $r['product_description'];
        $rows['image'] = $r['image'];
        $rows['price'] = $r['price'];
        $rows['taxable'] = $r['taxable'];
}

header('Content-Type: application/json; charset=UTL-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, HEAD');
header('Access-Control-Allow-Headers: X-Requested-With');

print json_encode($rows);
?>
