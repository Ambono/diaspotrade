<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');
?>
 <?php
include("../config/config.php");
	

clearstatcache();
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
   
if (isset($_POST['proddesc'])) {
   $proddescr = $_POST['proddesc'];  
   echo 'this is prod desrcription:' .$proddescr; 
}

if (isset($_POST['prodprice'])) {
   $prodprice = $_POST['prodprice'];  
   echo 'this is prod price:' .$prodprice; 
}
  
$sql_descr = "UPDATE productdetails SET  Description  =  '".$_POST['proddesc']."', Price =  '".$_POST['prodprice']."'  where Id = $prodID";
   
     if (!mysqli_query($connect, $sql_descr))
	  {
	  die("Error : ".mysql_error()); 
	  }  
	else{
	   echo "product id" .$prodID. "record updated"; 
           echo "product desc" .$proddescr. "record updated"; 
           echo "product price" .$prodprice. "record updated"; 
	   }
                 header("location: /komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/sellerupdateitem.php");
          clearstatcache();
	?>

