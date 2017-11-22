<?php
include("../session/sessionmanager.php") ; 
?> 
<!DOCTYPE html>
<HTML>
<HEAD>
<meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
<meta http-equiv="Pragma" content="no-cache">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="mystylesheet.css">
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script> 
 
<link rel="stylesheet" 
href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" 
src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript" src="script/scriptrefresh.js"></script>
<script type="text/javascript" src="script/pagination.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyscripts.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyjquery.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/pagination/dirPagination.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/angularcontrollers.js"></script>
<TITLE>Komoe Buys</TITLE> 
		
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
	  <!-- <li><a href="Product.php">Register item</a></li>-->
          <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/deals/Deals.php">Deals</a></li>
          <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">Sell</a></li> 	  
          <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php">Buy</a></li> 
	  <!--<li><a href="Gifts.php">Gifts</a></li> -->
          <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li> 
          <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php">Sign in</a></li>
          <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li> 
      <!--<li><a href="pagination.php">Pagination </a></li>-->   
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

 if (isset($_FILES["myimage"]) && !empty($_FILES["myimage"])) {
 $upload_image=$_FILES["myimage"]["name"];
 $temp_name =$_FILES["myimage"]["tmp_name"];
 $folder="C:/wamp/www/komoecontainer/comoeandfoldertree/komoeEng/images";
 $root = "C:/wamp/www"; 
 
  
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
     
if( move_uploaded_file($temp_name, "images/".$newuploadimage.".JPG"))
{ 	
   $upload_imageoptional1=$_FILES["firstoptionalimage"]["name"];
 $temp_namefirstoptional =$_FILES["firstoptionalimage"]["tmp_name"];
 
  
  
  if (strpos($upload_imageoptional1, '.jpg') !== false) {
     $firstuploadimageoptional = chop($upload_imageoptional1,".jpg");
    } 
if (strpos($upload_imageoptional1, '.JPG') !== false) {
     $firstuploadimageoptional =chop($upload_imageoptional1,".JPG");
    }  
    
    if (strpos($upload_imageoptional1, '.tiff') !== false) {
     $firstuploadimageoptional =chop($upload_imageoptional1,".tiff");
    }

    if (strpos($upload_imageoptional1, '.png') !== false) {
     $firstuploadimageoptional =chop($upload_imageoptional1,".png");
    }

    if (strpos($upload_imageoptional1, '.JPEG') !== false) {
     $firstuploadimageoptional =chop($upload_imageoptional1,".JPEG");
    }  
 
      if (strpos($upload_imageoptional1, '.gif') !== false) {
     $firstuploadimageoptional =chop($upload_imageoptional1,".gif");
    }  	
    
     
   //////////optional2
     $upload_imageoptional2=$_FILES["secondoptionalimage"]["name"];
     $temp_namesecondoptional =$_FILES["secondoptionalimage"]["tmp_name"];
 
  if (strpos($upload_imageoptional2, '.jpg') !== false) {
     $seconduploadimageoptional = chop($upload_imageoptional2,".jpg");
    } 
  if (strpos($upload_imageoptional2, '.JPG') !== false) {
     $seconduploadimageoptional =chop($upload_imageoptional2,".JPG");
    }  
    
    if (strpos($upload_imageoptional2, '.tiff') !== false) {
     $seconduploadimageoptional =chop($upload_imageoptional2,".tiff");
    }

    if (strpos($upload_imageoptional2, '.png') !== false) {
     $seconduploadimageoptional =chop($upload_imageoptional2,".png");
    }

    if (strpos($upload_imageoptional2, '.JPEG') !== false) {
     $seconduploadimageoptional =chop($upload_imageoptional2,".JPEG");
    }  
 
      if (strpos($upload_imageoptional2, '.gif') !== false) {
     $seconduploadimageoptional =chop($upload_imageoptional2,".gif");
    } 
    
if( move_uploaded_file($temp_namefirstoptional, "images/".$firstuploadimageoptional.".JPG")&& move_uploaded_file($temp_namesecondoptional, "images/".$seconduploadimageoptional.".JPG"))  {
    
      	$sql = "INSERT INTO productdetails(Description, Size, Colour, Gender, ProdCondition, CountryOrig, CountryDestin, CityDestin, ProdImage, ProdImagePath,Price, Availfrom, Availuntil, FirstOptionalImage, SecondOptionalImage,Sellernote, SellerEmail, SellerPhone)
  VALUES('$_POST[desc]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]', '$_POST[countryorigin]' ,'$_POST[countrydestin]' ,'$_POST[citydestin]', '$newuploadimage', 'images/', '$_POST[price]', '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]','$firstuploadimageoptional','$seconduploadimageoptional','$_POST[sellerNote]','$_POST[sellerEmail]', '$_POST[sellerPhone]')";    
        
         }
    
	elseif( move_uploaded_file($temp_namefirstoptional, "images/".$firstuploadimageoptional.".JPG"))
    { 
 $sql = "INSERT INTO productdetails(Description, Size, Colour, Gender, ProdCondition, CountryOrig, CountryDestin, CityDestin, ProdImage, ProdImagePath,Price, Availfrom, Availuntil, FirstOptionalImage,Sellernote, SellerEmail, SellerPhone)
  VALUES('$_POST[desc]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]', '$_POST[countryorigin]' ,'$_POST[countrydestin]' ,'$_POST[citydestin]', '$newuploadimage', 'images/', '$_POST[price]', '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]','$firstuploadimageoptional','$_POST[sellerNote]','$_POST[sellerEmail]', '$_POST[sellerPhone]')";    
      

      }elseif( move_uploaded_file($temp_namesecondoptional, "images/".$seconduploadimageoptional.".JPG"))   {
  
 $sql = "INSERT INTO productdetails(Description, Size, Colour, Gender, ProdCondition, CountryOrig, CountryDestin, CityDestin, ProdImage, ProdImagePath,Price, Availfrom, Availuntil, SecondOptionalImage,Sellernote, SellerEmail, SellerPhone)
  VALUES('$_POST[desc]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]', '$_POST[countryorigin]' ,'$_POST[countrydestin]' ,'$_POST[citydestin]', '$newuploadimage', 'images/', '$_POST[price]', '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]','$seconduploadimageoptional','$_POST[sellerNote]','$_POST[sellerEmail]', '$_POST[sellerPhone]')";    
      
         } else {
 $sql = "INSERT INTO productdetails(Description, Size, Colour, Gender, ProdCondition, CountryOrig, CountryDestin, CityDestin, ProdImage, ProdImagePath,Price, Availfrom, Availuntil,Sellernote, SellerEmail, SellerPhone)
  VALUES('$_POST[desc]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]', '$_POST[countryorigin]' ,'$_POST[countrydestin]' ,'$_POST[citydestin]', '$newuploadimage', 'images/', '$_POST[price]', '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]','$_POST[sellerNote]','$_POST[sellerEmail]', '$_POST[sellerPhone]')";    
        }
       
 if (!mysqli_query($con, $sql))
  {
  die("Error While uploading image on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added "; 
$latestinsertedid = mysqli_insert_id($con);   
if (isset($_POST['itemaction']))
{
$itemaction=$_POST['itemaction'];
  printf ("New Record has id %d.\n", mysqli_insert_id($con));
echo "You have selected :".$itemaction; 
  $sqlforintention = "INSERT INTO ownerintention(ProdId,Itemintendedfor)
  VALUES('$latestinsertedid','$itemaction')"; 
  
  $sqlforinsertiondate = "INSERT INTO insertiondate(ProdId,InsertionDate)
  VALUES('$latestinsertedid',Now())"; 
  if (!mysqli_query($con,  $sqlforintention))
  {
  die("Error While inserting owner intention on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added in intention table ";
  }
  
  if (!mysqli_query($con,  $sqlforinsertiondate))
  {
  die("Error While inserting timestamp on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added in intention table ";
  }
  
  
}  
    }
   }
 
 }
?>
 <footer>  
  <span>&copy Komoe 2016</span>  
  </footer>
</BODY>
</HTML>
