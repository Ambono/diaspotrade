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
if( isset($_SESSION['login_user']))
   { 
 $user_check = $_SESSION['login_user']; 
$query="select distinct basket.ProdID as productID , productdetails.Description as description, productdetails.Price as price  FROM basket join productdetails on basket.ProdID = productdetails.Id 
WHERE basket.UserName = '$user_check' and basket.IsConfirmed ='N' ";

$result = mysqli_query($connect, $query);
   while( $basketcontent = mysqli_fetch_assoc($result)){
 	  echo 'Item: '.$basketcontent['description'].'<br>'; 
      echo 'Price: '.$basketcontent['price'].'<br>';
      echo 'Reference: '.$basketcontent['productID'].'<br>';	  
      echo'<br>';   
 } 
		if (mysqli_num_rows($result) == 0)  {
    echo "No shopping found";
		}
   }else{
       echo'Action not valid!.You need to register before using the basket feature. Please click Sign up to subscribe or contact seller directly.';
      }	 
 ?> 
</div>

</BODY>
</HTML>
