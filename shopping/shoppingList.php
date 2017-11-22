 <?php
   session_start();
 if( $_SESSION['login_user']!= null)
   {
//echo  $_SESSION['login_user'] ;
   }
?>
 <?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');
?>
<?php 
 include('../config/config.php');
$user_check = $_SESSION['login_user']; 
$shoppinglist="";
$query = "select Description, Size, Colour, Gender from productdetails WHERE Id in(select ProdId from basket WHERE UserName = '$user_check' And IsConfirmed ='Y')";
$result = mysqli_query($connect, $query);
   while( $basketdetails= mysqli_fetch_assoc($result)){
 	 // echo $basketdetails['Description'].'<br>'; 
      //echo $basketdetails['Size'].'<br>';
     //  echo $basketdetails['Colour'].'<br>'; 
    //  echo $basketdetails['Gender'].'<br>';
      $shoppinglist=$basketdetails['Description'].'<br>'.
                    $basketdetails['Size'].'<br>'.
                    $basketdetails['Colour'].'<br>'.
                    $basketdetails['Gender'].'<br>';
                    //echo  $shoppinglist=''?'No shopping found':$shoppinglist;
                    echo  $shoppinglist;
      echo'<br>';
   } 
if (mysqli_query($conn, $query)) {
  //  echo "Selected";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
 ?> 