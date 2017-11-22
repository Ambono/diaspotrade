<?php
include("../config/config.php");
 
   if( isset($_SESSION['login_user']))
   {  
	 $user = $_SESSION['login_user'];
   }else{
       $user = session_id();
   }


    $mydate= date("Y-m-d h:i:sa");
   
     $sql = "INSERT INTO username_productid( username,prodID, Date)
	  VALUES('$user.'cdindb'', '".$_GET['id']."','$mydate' )";

	 if (!mysqli_query($connect, $sql))
	  {
	  die("Error : ".mysql_error()); 
	  }  
	else{	 
    }
    ?>