<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');
?>
 <?php
   clearstatcache();
include("../config/config.php");
ob_start();
   session_start();
   if( $_SESSION['login_user']!= null)
   {  
	 $user = $_SESSION['login_user'];
   }

if (isset($_POST['prodid'])) {
   $prodID = $_POST['prodid'];  
   echo 'this is prod id:' .$prodID; 
}
   
     $sql_rem = "DELETE FROM productdetails WHERE Id = $prodID";

	 if (!mysqli_query($connect, $sql_rem))
	  {
	  die("Error : ".mysql_error()); 
	  }  
	else{
	   echo "product id $prodID record removed"; 
	  // header("location: /komoecontainer/comoeandfoldertree/komoeEng/sellers/sellerremoveitem.php");
	    header("location: /komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0#/shopowning");
	    
           }
       
	?>

