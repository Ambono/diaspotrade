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
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');

 include('../config/config.php');
  if(isset($_SESSION['login_user']))
   {
   echo  $_SESSION['login_user'] ;
$user_check = $_SESSION['login_user']; 

$query_retrieve = "SELECT ProdID, UserName, Date, ShoppingID FROM basket where UserName = '$user_check'";
$result_retrieve = mysqli_query($connect, $query_retrieve);

while ($row = mysqli_fetch_assoc($result_retrieve)) {
      //foreach ($row as $key => $value) 
     // {
    $query_Insert_Array = "INSERT INTO shoppingtbl(ProdID, UserName, Date, ShoppingID, IsConfirmed)
values('$row[ProdID]','$row[UserName]', '$row[Date]', '$row[ShoppingID]','Y')";
     if (!mysqli_query($connect, $query_Insert_Array ))
	  {
	  die("Error : ".mysql_error()); 
	  }  
	else{
        ;        
        }
      //}
}

//$sql = "UPDATE basket SET IsConfirmed ='Y' WHERE UserName = '$user_check' and Date =CURDATE()";

$query_check = "select * from basket where UserName = '$user_check'";

$result = mysqli_query($connect, $query_check);


if ($result)
	  {
		  	if (mysqli_num_rows($result) == 0)  {		
    echo "No shopping found";
			}else{
$query_delete = "DELETE from basket WHERE UserName = '$user_check'";
$result = mysqli_query($connect, $query_delete);echo"Shopping ordered";

	}
	 }
   }else{  
echo'Basket not confirmed!.You need to register before using the basket feature. Please click Sign up to subscribe or contact seller directly.'; // this is the message in ""

   }
 ?> 
</div>

</BODY>
</HTML>
