<!DOCTYPE html>
<HTML>
<HEAD>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="mystylesheet.css">
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script> 
 
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyscripts.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyjquery.js"></script>
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
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/productdetails/Product.php">Register item</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/deals/Deals.php">Deals</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">Sell</a></li> 	  
      <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php">Buy</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/Gifts.php">Gifts</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php">Sign in</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>  
    </ul>
  </div>
</nav>

<br><br>
  <footer>   
  <span>&copy Komoe 2016</span>  
  </footer>
</div>

</BODY>
</HTML>
 <?php
include("../config/config.php");
   if( isset($_SESSION['login_user']))
   {  
       $user = $_SESSION['login_user'];   
   
if (isset($_POST['prodid'])) {
   $prodID = $_POST['prodid'];   
}
else {
	 $prodID= $_GET['id'];
	 $arr = explode(" ", $prodID, 2);
     $prodID= $arr[0];	
	  echo 'this is prod id:' .$prodID;
$page=	$arr[1] ;
 $arr2 = explode("=", $page, 2);
$page = $arr2[1]; 
echo 'this is prod page :' .$page;  
}

 $mydate= date("Y-m-d h:i:sa");    
   
     $sql = "INSERT INTO basket(ProdId, UserName, Date)
	  VALUES('$prodID','$user', '$mydate' )";

	 if (!mysqli_query($connect, $sql))
	  {
	  die("Error : ".mysql_error()); 
	  }  
	else{
		
	   echo " 1 record added "; 	
echo 'this is page number:' .$page;  
	 header("location: /komoecontainer/comoeandfoldertree/komoeEng/sellers/SellerSearchResult.php?id=$prodID");
	    }
   }else{
       echo'Action not valid!.You need to register before using the basket feature. Please click Sign up to subscribe or contact seller directly.';
      }	 
   ?>

