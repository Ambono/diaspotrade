
<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "komoe1"; 
$con = mysqli_connect($servername, $username, $password, $dbname);
  $id = $_GET['id'];
  // do some validation here to ensure id is safe

  mysql_select_db("dvddb");
  $sql = "SELECT dvdimage FROM products tbl WHERE id=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);

  header("Content-type: image/jpeg");
  echo $row['dvdimage'];
?>

