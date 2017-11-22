<?php 
include("../config/config.php");
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['token_temp_user'])){  
    $user =   $_SESSION['token_temp_user'];
     echo  $user;
 }
 
 elseif(isset($_SESSION['login_user'])){
	    $user =$_SESSION['login_user']; 
	 echo  $user;
	   }
	   
$result = mysqli_query($connect,"SELECT Picture FROM shops where Name in(SELECT SearchedShop FROM shopsearchingtbl 
WHERE ShopSearcher  = '$user' order by Id desc) ");
	
		 	 
$shoppic = mysqli_fetch_assoc($result);
 

//echo 'http://localhost:81/workspacenetbean/komoe/images/'.$shoppic['Picture'].'.JPG';

//echo $shoppic['Picture'];
 if(!$shoppic['Picture']) {
 	echo'';
 } else {	
 echo  '<img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/'.$shoppic['Picture'].'.JPG" id="the_idfirstoptional" width="80" height="50" alt="This pic is not available" "/>';
 
 }
$connect->close();	
?>



