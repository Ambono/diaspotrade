
 <?php
include("../config/config.php");
ob_start();
   session_start();
   if( isset($_SESSION['login_user']))
   {  
	 $user = $_SESSION['login_user'];   

if (isset($_POST['prodid'])) {
   $prodID = $_POST['prodid'];  
   echo 'this is prod id:' .$prodID; 
}
    $mydate= date("Y-m-d h:i:sa");    
   
     $sql = "INSERT INTO basket(ProdId, UserName, Date)
	  VALUES('$prodID','$user', '$mydate' )";

	 if (!mysqli_query($connect, $sql))
	  {
	  die("Error : ".mysql_error()); 
	  }  
	else{
	   echo "1 record added"; 
	   header("location: /komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?");
            //header("location: ../buys/Buy.php?");
	    }
   }else{  
echo'Action not valid!.You need to register before using the basket feature. Please click Sign up to subscribe or contact seller directly.';

   }
	?>

