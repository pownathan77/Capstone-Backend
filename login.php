<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["email"])) {
$email = $_POST["email"];
}
else
{
        echo "email variable is empty, or could not be accessed\n";
}
if (isset($_POST["userPassword"])) {
$userpassword = $_POST["userPassword"];
}
else
{
        echo "variable is empty, or could not be accessed\n";
}

$username = 'root';
$password = 'Panther$';
$databaseName = 'ecommerce';
$con=mysqli_connect("localhost",$username,$password,$databaseName);

$query = "CALL usp_GetLoginInfo('".$email."', '".$userpassword."')";
$sqlsearch = $con->query($query) or die($con->error);

$rows = array();
  while($r = $sqlsearch->fetch_assoc()) {
    $rows['email'] = $r['email'];
    $rows['userPassword'] = $r['userPassword'];
  }

header('Content-Type: application/json; charset=UTL-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, HEAD');
header('Access-Control-Allow-Headers: X-Requested-With');
print json_encode($rows);
?>
