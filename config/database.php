<?php 
define('DB_HOST','localhost');
define('DB_USER','Beabrand');
define('DB_PASS','Beabrand');
define('DB_NAME','Beabrand');
// create connection
$conn=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// CHECK CONNECTION
if($conn->connect_error){
    die("Connection Failed" . $conn->connect_error);
}

?>