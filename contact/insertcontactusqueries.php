<?php

  include("../config/config.php");
if(!isset($_SESSION)){
    session_start();
}
$_SESSION['token_temp_user'] =session_id();
  if(isset($_SESSION['login_user'])){
  
    $user_session_temp_name =   $_SESSION['login_user']; 
 }
 
  elseif(isset($_SESSION['token_temp_user'])){
	    $user_session_temp_name =$_SESSION['token_temp_user']; 	
	   }
 

$name_contactor = isset($_POST['c_name'])&& !empty ($_POST['c_name']) ? $_POST['c_name'] : 'None';
$address_contactor = isset($_POST['c_address'])&& !empty ($_POST['c_address'])? $_POST['c_address'] : 'None';
$telephone_contactor = isset($_POST['c_telephone']) && !empty ($_POST['c_telephone'])? $_POST['c_telephone'] : 'None';
 $email_contactor =  isset($_POST['c_email']) && !empty ($_POST['c_email'])? $_POST['c_email'] : 'None';     
  $query_category =  isset($_POST['query_category']) && !empty ($_POST['query_category'])? $_POST['query_category'] : 'No';
  $query_note=  isset($_POST['c_Note']) && !empty ($_POST['c_Note'])? $_POST['c_Note'] : 'No';

 
//

 $sql = "INSERT INTO contactustbl (cName, cAddress, cTelephone, cEmail, qCategory, Note, currentLoginDetails, Date)
           VALUES('$name_contactor', '$address_contactor' , '$telephone_contactor',
         '$email_contactor', '$query_category', '$query_note','$user_session_temp_name', now())";
   
 if (!mysqli_query($con, $sql))
  {
  die("Error While uploading image on the server: ".mysql_error()); 
  }  
else{
    header("Location:../footerPages/contact.php");   
   }   
