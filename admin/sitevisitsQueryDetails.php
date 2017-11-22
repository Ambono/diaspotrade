<?php 
ob_start();
if(!isset($_SESSION)){
    session_start();
}
include_once("../config/config.php"); 
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['login_user'])){  
    $user_session_temp_name =   $_SESSION['login_user'];
 }
 
 elseif(isset($_SESSION['token_temp_user'])){
	    $user_session_temp_name =$_SESSION['token_temp_user']; 
	 //  echo  $user_session_temp_name;
	   }
           
$result = mysqli_query($connect,"SELECT * from sitevisits ");
     
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$connect->close();
 
