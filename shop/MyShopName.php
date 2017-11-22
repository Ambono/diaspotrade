<?php 
	include("../config/config.php");
	ob_start();

	if( $_SESSION['login_user']!= null)
   {  
	 $user = $_SESSION['login_user'];

   }
   else{
	   $user = null;
   }

		
	$resultshop = mysqli_query($connect,"SELECT Name  FROM shops s  join productdetails p on s.OwnerEmail = p.SellerEmail
AND s.OwnerUName   = '".$user."' order by Shopname desc limit 1");

$retshopval = mysqli_fetch_array($resultshop);          
          	
     $Shopname= $retshopval[0]; 
     
  

 //echo 'You are on ';
 echo $Shopname; 

 
$result = mysqli_query($connect,"SELECT Picture FROM shops where Name =  '".$Shopname."' ");
	  
$connect->close();	
?>



