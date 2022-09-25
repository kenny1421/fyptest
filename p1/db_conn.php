<?php  

//development connection
$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "my_db";

//remote database connection
//$host = "remotemysql.com";
//$db = "Nb4G2d2ble";
//$user = "Nb4G2d2ble";
//$pass = "FF9kHFSIA0";
//$charset ="utf8mb4";

$conn = mysqli_connect($sname, $uname, $password, $db_name);
//$conn = "mysqli:host=$host;dbname=$db;charset=$charset";

if (!$conn) {
	echo "Connection Failed!";
	exit();
}