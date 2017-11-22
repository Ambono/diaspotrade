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
 //	  echo $email['Email'];
 	  echo'<br>';
 	  
 	  $emailBody ="";
 	  $sellerEmail ="";
 	  $sellerPhone ="";
 $query = "select Description, Size, Colour, Gender, SellerEmail, SellerPhone from productdetails WHERE Id in(select ProdId from basket WHERE UserName = '$user_check'And IsConfirmed ='Y')";
$result = mysqli_query($connect, $query);
   while( $basketdetails= mysqli_fetch_assoc($result)){
 	 /* echo $basketdetails['Description'].'<br>'; 
      echo $basketdetails['Size'].'<br>';
       echo $basketdetails['Colour'].'<br>'; 
      echo $basketdetails['Gender'].'<br>';*/
   	  $sellerEmail .= $basketdetails['SellerEmail'];
      $sellerPhone .= $basketdetails['SellerPhone'];
      $emailBody .= $basketdetails['Description']." " . $basketdetails['Size'] ." " . $basketdetails['Colour'] ." " .$basketdetails['Gender']." "."<br>Seller email: ".$sellerEmail." "."Seller telephone number: ".$sellerPhone.'<br>';
     
      $to = $sellerEmail;
     $subject = "Interest in".$basketdetails['Description'];
     $txt = $emailBody;
     $headers = "From: ".$user_check." ".$email['Email'] . "\r\n" .
     "CC: ".$email['Email'] ;
      //mail($to,$subject,$txt,$headers);
     
   } 
 echo 'this is email body: <br>';
 echo $emailBody;
 echo'<br>';
 echo 'the shopping is from: '.$user_check.' with email: '.$email['Email']
 
/*$to = "00447551562689@yahoo.co.uk";
$subject = "My subject";
$txt = $emailBody;
$headers = "From: modpleh@yahoo.co.uk" . "\r\n" .
"CC: mpleh@hotmail.com";*/
//mail($to,$subject,$txt,$headers);
//mail($to,$subject, $email_body,$headers);

 ?>
 
