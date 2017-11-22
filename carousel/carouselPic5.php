<?php
include("./config/config.php");
	ob_start();
    if(!isset($_SESSION)){
    session_start();
}
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['login_user'])){  
    $user =   $_SESSION['login_user'];   
 } 
 elseif(isset($_SESSION['token_temp_user'])){
	    $user =$_SESSION['token_temp_user']; 	
	   }
         
           
$carousel = mysqli_query($con, "select picname from carouseltbl where intId = 5 and username ='$user'");
//$carousel = mysqli_query($con, "select picname from carouseltbl where intId = 5 and username = '$user'");
$pic_5_carousel = mysqli_fetch_assoc($carousel);

 print 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/'.$pic_5_carousel['picname'].'.JPG';