<?php
	include("../config/config.php");
	ob_start();
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['token_temp_user'])){  
    $user =   $_SESSION['token_temp_user'];
     echo  $user;
 }
 
 elseif(isset($_SESSION['login_user'])){
	    $user =$_SESSION['login_user']; 
	 echo  $user;
	   }

	
	$sql = "SELECT `SearchedShop` FROM `shopsearchingtbl` WHERE `SearchSession`=\'admin\' and `Status` =\'current\'";
	
	if (isset($_POST['Shopname'])) {
   $Shopname = $_POST['Shopname'];  
  
     $sql = "INSERT INTO shopsearchingtbl(SearchedShop, Date, ShopSearcher)
	  VALUES('$Shopname',now(), '$user')";

	 if (!mysqli_query($connect, $sql))
	  {
	  die("Error : ".mysql_error()); 
	  }  
	else{
	  // echo " 1 record added"; 	  
	    }
}
else{
	 $Shopname = null;
    }   

	?>
	