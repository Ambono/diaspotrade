<?php
//database settings
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "komoe1";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);

$result = mysqli_query($connect, "select * from countries");

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
	$connect->close();
?>