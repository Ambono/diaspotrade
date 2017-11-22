
//<?php
//include("../config/config.php");
//ob_start();
//   session_start();
//   if( isset($_SESSION['login_user']))
//   {  
//	 $user = $_SESSION['login_user'];
//   }else{
//       $user = session_id();
//   }
//
//if (isset($_POST['prodid'])) {
//   $prodID = $_POST['prodid'];  
//   echo 'this is prod id:' .$prodID; 
//}
//    $mydate= date("Y-m-d h:i:sa");
//   
//     $sql = "INSERT INTO username_productid( username,prodID, Date)
//	  VALUES('$user','".$_GET['id']."','$mydate' )";
//
//	 if (!mysqli_query($connect, $sql))
//	  {
//	  die("Error : ".mysql_error()); 
//	  }  
//	else{
//	   echo "1 record added"; 
////echo $user;
////echo $prodID;
////echo $mydate;
//
//	  
//	    }	
//?>