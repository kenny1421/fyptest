<?php  

//development connection
$sname = "mysqltest3.mysql.database.azure.com";
$uname = "sqltest";
$password = "Test12345";

$db_name = "my_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);


if (!$conn) {
	echo "Connection Failed!";
	error_log("Error msg " . $conn->connect_error);
	exit();
}
