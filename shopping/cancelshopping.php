<!-- https://plnkr.co/edit/CtMucCAfuxb8JHO5Buci?p=preview -->
 <!DOCTYPE html>
<HTML>
<head>
<meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
<meta http-equiv="Pragma" content="no-cache">
</head>
 <div align = "center" >
     
 <?php
 /*
   session_start();
 if( $_SESSION['login_user']!= null)
   {
echo  $_SESSION['login_user'] ;
   }

header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');

 include('../config/config.php'); 
$user_check = $_SESSION['login_user']; 

//$sql = "UPDATE basket SET IsConfirmed ='N' WHERE UserName = '$user_check'";
$sql = "DELETE from basket  WHERE UserName = '$user_check'";

if (mysqli_query($conn, $sql)) {
	$querySelect="select * FROM basket WHERE basket.UserName = '$user_check'and IsConfirmed not like '%Y%'";
	
$result = mysqli_query($conn, $querySelect);		
   if (mysqli_num_rows($result) == 0)  {
    echo "No shopping found";
   }
   else{
	   // include('cancelshoppingandeletecurrent.php');
	  echo "Your order has been cancelled"; 
   }
	   
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
*/
 
   session_start();
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');

 include('../config/config.php'); 
 if( isset($_SESSION['login_user']))
   {
echo  $_SESSION['login_user'] ;
   
$user_check = $_SESSION['login_user']; 

$sql = "DELETE from basket  WHERE UserName = '$user_check'";

if (mysqli_query($conn, $sql)) {
	$querySelect="select * FROM basket WHERE basket.UserName = '$user_check'and IsConfirmed not like'%Y%'";
	
$result = mysqli_query($conn, $querySelect);		
   if (mysqli_num_rows($result) == 0)  {
    echo "No shopping found";
   }
   else{
	   // include('cancelshoppingandeletecurrent.php');
	  echo "Your order has been cancelled"; 
   }
	   
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}else{
echo'Action not valid!.You need to register before using the basket feature. Please click Sign up to subscribe or contact seller directly.';

}
 ?> 
</div>



</BODY>
</HTML>


