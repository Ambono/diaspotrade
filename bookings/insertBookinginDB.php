<?php
include("../config/config.php");
include("../session/sessionmanager.php") ;   

       if(!isset($_SESSION['login_user'])){
	   $username =$_SESSION['login_user'];	  
	   }
	   
	   $sql = "INSERT INTO buyer_booking_seller(ProdID, buyerUName, sellerUname, Date)
  VALUES('$_POST[shopname]', '$_SESSION[login_user]', Now())";    
        
		      
 if (!mysqli_query($con, $sql))
  {
  die("Error While uploading image on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added "; 
	   }
?>