<?php 
include_once("../config/config.php"); 
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['login_user'])){  
    $user_session_temp_name =   $_SESSION['login_user'];
 }
 
 elseif(isset($_SESSION['token_temp_user'])){
	    $user_session_temp_name =$_SESSION['token_temp_user']; 
	 //  echo  $user_session_temp_name;
	   }
           
$result = mysqli_query($connect,"SELECT  distinct count(IPs)as total from sitevisits ");
     

$count = mysqli_fetch_assoc($result);
    

echo "Number of visits: ".$count['total'];


 
