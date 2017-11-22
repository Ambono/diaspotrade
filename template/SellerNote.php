 <!DOCTYPE html>
<HTML>
 <div align = "center" >
<?php 
include("../config/config.php");
ob_start();
if(!isset($_SESSION)){
    session_start();
}
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['login_user'])){  
    $user =   $_SESSION['login_user'];
    
 } 
 elseif(isset($_SESSION['token_temp_user'])){
	    $user =$_SESSION['token_temp_user']; 	
	   }
   

$result = mysqli_query($connect, "select * FROM seller WHERE prodID = (select prodID from username_productid where username = '$user' ORDER BY `Id` DESC limit 1) ");

  $sellernote =  mysqli_fetch_assoc($result);
           echo 'seller details: <br>';
  	   echo 'Email: '. $sellernote['SellerEmail'].'<br>';
	   echo 'Phone: '. $sellernote['SellerPhone'].'<br>';
	   echo 'Note: '. $sellernote['Sellernote'].'<br>';  
 ?> 


</div>

</BODY>
</HTML>