<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "komoe1"; 
$data = json_decode(file_get_contents("php://input"));
$desc = mysql_real_escape_string($data->desc);
$size = mysql_real_escape_string($data->size);
$colour = mysql_real_escape_string($data->colour);
$gender = mysql_real_escape_string($data->gender);
$prodcond = mysql_real_escape_string($data->prodcond);
$conn = new mysqli($servername, $username, $password, $dbname);
echo "using insert.php";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO productstbl(Description, Size, Colour, Gender, ProdCondition)
 VALUES ($desc,$size,$colour,$gender,$prodcond)";
 echo "query created";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>