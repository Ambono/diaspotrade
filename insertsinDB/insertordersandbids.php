<?php include("../config/config.php")?>
 <?php

	 $user = $_SESSION['login_user'];
//	 $productId= <?php echo 'document.activeElement.textContent.substring(12)';
if (isset($_POST['AddProduct'])) {
    $newID = $_POST['AddProduct']; 
}
     include("../config/config.php");	 
	 $sql = "INSERT INTO basket(ProdId, UserName, Date, ShoppingID)
	  VALUES('$newID','$user','2016-08-08' ,'2' )";    
	 // }
	 if (!mysqli_query($con, $sql))
	  {
	  die("Error : ".mysql_error()); 
	  }  
	else{
	   echo "1 record added"; 
	    }
	?>

