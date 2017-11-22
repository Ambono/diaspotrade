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
      <a class="navbar-brand" href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Komoe</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/productdetails/Product.php">Register item</a></li>
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/deals/Deals.php">Deals</a></li>
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php">Buy</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">Sell</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/Gifts.php">Gifts</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li> 
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php">Sign in</a></li> 	  
    </ul>
  </div>
</nav>
 <div class="jumbotron">
    <h1>Hello you are on register item page!</h1>
  </div>
  
 <?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "komoe1"; 
$con = mysqli_connect($servername, $username, $password, $dbname);
// include("config.php");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }   
  

      	$sql = "INSERT INTO productdetails(Description, Size, Colour, Gender, ProdCondition, CountryOrig, CountryDestin, CityDestin, ProdImage, ProdImagePath,Price, Availfrom, Availuntil, FirstOptionalImage, SecondOptionalImage,Sellernote)
  VALUES('$_POST[desc]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]', '$_POST[countryorigin]' ,'$_POST[countrydestin]' ,'$_POST[citydestin]', '$newuploadimage', 'images/', '$_POST[price]', '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]','$firstuploadimageoptional','$seconduploadimageoptional','$_POST[sellerNote]')";    
        
     
       
 if (!mysqli_query($con, $sql))
  {
  die("Error While uploading image on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added"; 
    } 
?>
 <footer>  
  <span>&copy Komoe 2016</span>  
  </footer>
</BODY>
</HTML>
