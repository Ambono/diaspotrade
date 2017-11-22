<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "komoe1"; 
$con = mysqli_connect($servername, $username, $password, $dbname);
// mysql_select_db($dbname, $con);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  } 
 
 
 $upload_image=$_FILES["myimage"]["name"];

$folder="C:/wamp/www/komoecontainer/comoeandfoldertree/komoeEng/images/";

move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder".$_FILES["myimage"]["name"]);

$sql = "INSERT INTO productstbl(Description, Size, Colour, Gender, ProdCondition, ProdImage, ProdImagePath)
  VALUES ('$_POST[desc]','$_POST[size]','$_POST[colour]','$_POST[gender]','$upload_image', '$folder')";  

// $insert_path="INSERT INTO image_table VALUES('$folder','$upload_image')";
 
 if (!mysqli_query($con, $sql))
  {
  die('Error: ' . mysql_error());
  }  
else{
   exit("Error While uploading image on the server");
    }
echo "1 record added"; 
?>