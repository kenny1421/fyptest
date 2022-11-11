<?php  

//development connection
$sname = "mysqltest3.mysql.database.azure.com";
$uname = "sqltest";
$password = "Test12345";
$db_name = "my_db";

//Initializes MySQLi
$conn = mysqli_connect($sname, $uname, $password, $db_name);

mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/DigiCertGlobalRootG2.crt.pem", NULL, NULL);

//Establish the connection
mysqli_real_connect($conn, 'mysqltest3.mysql.database.azure.com','sqltest', 'Test12345', 'my_db', 3306, NULL, MYSQLI_CLIENT_SSL);

if (!$conn) {
	
	echo "Connection Failed!";
	exit();
}
