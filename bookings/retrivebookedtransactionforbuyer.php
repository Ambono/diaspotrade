<!-- https://plnkr.co/edit/CtMucCAfuxb8JHO5Buci?p=preview -->
 <!DOCTYPE html>
<HTML>
<head>
<meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
<meta http-equiv="Pragma" content="no-cache">
</head>
 <div align = "center" >
 <?php
   session_start();
 if( $_SESSION['login_user']!= null)
   {
echo  $_SESSION['login_user'] ;
   }
?>
 <?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');
?>
<?php 
 include('../config/config.php');
$user_check = $_SESSION['login_user']; 

//$sql = "UPDATE basket SET IsConfirmed ='Y' WHERE UserName = '$user_check' and Date >=CURDATE()";

$query_Insert = "INSERT INTO shoppingtbl(ProdID, UserName, Date, ShoppingID, IsConfirmed)
SELECT ProdID, UserName, Date, ShoppingID, IsConfirmed FROM basket where UserName = '$user_check'";

//$query_Insert = "insert * INTO shoppingtbl SELECT * FROM basket where UserName = '$user_check'";
//$result = mysqli_query($connect, $query_Insert);
//$query_check = "select * from basket where UserName = '$user_check'";

$query_check = "select * from basket where UserName = '$user_check'";

$result = mysqli_query($connect, $query_check);


if ($result)
	  {
		  	if (mysqli_num_rows($result) == 0)  {		
    echo "No shopping found";
			}else{
$query_delete = "DELETE from basket WHERE UserName = '$user_check'";
$result = mysqli_query($connect, $query_delete);
echo"Shopping ordered";
	}

	 }
 ?> 
</div>

</BODY>
</HTML>
