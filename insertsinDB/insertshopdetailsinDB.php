<?php
include("../session/sessionmanager.php") ;   
// session_start();
       if(!isset($_SESSION['login_user'])){
	   $username =$_SESSION['login_user'];	  
	   }
	include("../config/config.php");     
// $servername = "127.0.0.1:3306";
// $dbusername = "root";
// $password = "";
// $dbname = "komoe1"; 
//$con = mysqli_connect($servername, $dbusername, $password, $dbname);
// include("config.php");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }   

 if (isset($_FILES["myimage"]) && !empty($_FILES["myimage"])) {
 $upload_image=$_FILES["myimage"]["name"];
 $temp_name =$_FILES["myimage"]["tmp_name"];
 $folder="../images/";
 $root = "C:/wamp/www/komoecontainer/comoeandfoldertree/komoeEng"; 
 
  
  if (strpos($upload_image, '.jpg') !== false) {
     $newuploadimage =chop($upload_image,".jpg");
    } 
if (strpos($upload_image, '.JPG') !== false) {
     $newuploadimage =chop($upload_image,".JPG");
    }  
    
    if (strpos($upload_image, '.tiff') !== false) {
     $newuploadimage =chop($upload_image,".tiff");
    }

    if (strpos($upload_image, '.png') !== false) {
     $newuploadimage =chop($upload_image,".png");
    }

    if (strpos($upload_image, '.JPEG') !== false) {
     $newuploadimage =chop($upload_image,".JPEG");
    }  
 
      if (strpos($upload_image, '.gif') !== false) {
     $newuploadimage =chop($upload_image,".gif");
    }
     	  	if (isset($_POST['shopname']))
		{
		$shopname =$_POST['shopname'];
		}else{$shopname='no shop';}
		
		if (isset($_POST['owneremail']))
		{
	           $owneremail =$_POST['owneremail'];
		}
if( move_uploaded_file($temp_name,  $folder.$newuploadimage.".JPG"))
{			
 $sql = "INSERT INTO shops(Name, OwnerUName, Datecreated,  Picture, OwnerEmail, PicPath)
  VALUES('$_POST[shopname]', '$_SESSION[login_user]', Now(),'$newuploadimage', '$_POST[owneremail]','$folder".$newuploadimage.".JPG')";   
        
		      
 if (!mysqli_query($con, $sql))
  {
  die("Error While uploading image on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added "; 
$latestinsertedid = mysqli_insert_id($con); 
header('Location: /komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php');
} 
 }  
 }
	
?>