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

$sql = "select distinct Email from users  WHERE Name = '$user_check'";
$result = mysqli_query($connect, $sql);
   $email= mysqli_fetch_assoc($result);
 	  echo $email['Email'];
 	  echo'<br>';
     
if (mysqli_query($conn, $sql)) {
   // echo "Selected";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
 ?> 