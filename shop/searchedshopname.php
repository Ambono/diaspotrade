<?php 
	include("../config/config.php");
	ob_start();
      
        $_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['token_temp_user'])){  
   $user =   $_SESSION['token_temp_user'];
 }
 
 elseif(isset($_SESSION['login_user'])){
	   $user =$_SESSION['login_user']; 	 
	   }
   $count=0;
   
     if(isset($_GET['id'])){
		if (isset($_POST['Shopname']))
		{
			 $count=2;
		}
	 }
	  
$resultsearch = mysqli_query($connect,"SELECT SearchedShop FROM shopsearchingtbl 
WHERE ShopSearcher  = '$user' order by Id desc ");
$shopnameres = mysqli_fetch_assoc($resultsearch);
 if(!$shopnameres['SearchedShop']) {
 	echo'';
 } else {
 
 echo ' Welcome to ';
 echo $shopnameres['SearchedShop']; 
 echo'\'s ';

 echo ' '; 
 }

$result = mysqli_query($connect,"SELECT Picture FROM shops where Name in(SELECT SearchedShop FROM shopsearchingtbl 
WHERE ShopSearcher  = '$user' order by Id desc) ");
	
		 	 
$shoppic = mysqli_fetch_assoc($result);
 

 if(!$shoppic['Picture']) {
 	echo'';
 } else {	
 echo  '<img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/'.$shoppic['Picture'].'.JPG" id="the_idfirstoptional" width="80" height="50" alt="This pic is not available" "/>';
 
 }
 
$connect->close();	
?>



