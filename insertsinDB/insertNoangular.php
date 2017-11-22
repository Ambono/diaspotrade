 <!DOCTYPE html>
<HTML>
<HEAD>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script> 
 
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<TITLE>Komoe register item</TITLE>
<style>

footer {
background-color: silver
}
jumbotron {
background-color: #33D7FF
}
</style> 

</HEAD>
<BODY>
<div class="container">
 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Komoe</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
	   <li class="active"><a href="Product.php">Register item</a></li>
      <li ><a href="Deals.php">Deals</a></li>
      <li><a href="Sell.php">Sell</a></li> 
	  <li><a href="Gifts.php">Gifts</a></li> 
	  <li><a href="Help.php">Help</a></li> 
      <li ><a href="SignIn.php">Sign in</a></li> 	  
    </ul>
  </div>
</nav>
 <div class="jumbotron">
    <h1>Hello on register item page!</h1>
    <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile-first projects on the web.</p>
  </div> 
 <?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "komoe1"; 
$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }   
 //This is the directory where images will be saved  
 if (isset($_FILES["myimage"]) && !empty($_FILES["myimage"])) {
 $upload_image=$_FILES["myimage"]["name"];
 $temp_name =$_FILES["myimage"]["tmp_name"];
 $folder="C:/wamp/www/komoe/images";
 $root = "C:/wamp/www"; 
 $newuploadimage =chop($upload_image,".jpg");
 
  $newuploadimage =chop($upload_image,".JPG");
  
  if (strpos($upload_image, '.jpg') !== false) {
     $newuploadimage =chop($upload_image,".jpg");
    } 
if (strpos($upload_image, '.JPG') !== false) {
     $newuploadimage =chop($upload_image,".JPG");
    }
  
 
 echo "$root $folder";
//move_uploaded_file($temp_name, "images/".$upload_image)
if( move_uploaded_file($temp_name, "images/".$upload_image))
{ 
 $sql = "INSERT INTO productstbl(Description, Size, Colour, Gender, ProdCondition, ProdImage, ProdImagePath)
  VALUES('$_POST[desc]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]', '$newuploadimage', 'images/')";    
  }
 if (!mysqli_query($con, $sql))
  {
  die("Error While uploading image on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added"; 
    }
	}
?>
 <footer>  
  <span>&copy Komoe 2016</span>  
  </footer>
</BODY>
</HTML>
