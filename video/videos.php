<?php
 include("../config/config.php");


if(!isset($_SESSION)){
    session_start();
}
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['token_temp_user'])){  
    $user =   $_SESSION['token_temp_user'];     
 }
 
 elseif(isset($_SESSION['login_user'])){
	    $user =$_SESSION['login_user']; 	
	   }
//C:\Users\Mod\Dropbox\iphone\101APPLE
 if (isset($_FILES["myvideo"]) && !empty($_FILES["myvideo"])) {
 $upload_image=$_FILES["myvideo"]["name"];
 echo' $upload_image';
 $temp_name =$_FILES["myvideo"]["tmp_name"];
 $folder="..video/";
 
if(move_uploaded_file($temp_name, "../video/".$upload_image.""))
{ 
 $sql = "INSERT INTO tbl_video(Date, name)
  VALUES(Now(), '$upload_image')"; 

        }
       
 if (!mysqli_query($con, $sql))
  {
  die("Error While uploading image on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added "; 
 
mysqli_close($con);
}
 }else
     {
     echo'cant find video';
     echo 'Click Ok to try again';
     }
 ?>
  <html>
      <br>
      <br>
   <button type="submit" class="btn btn-success" name="btnInsert" 
           onClick="window.location.reload()">Click OK to ensure picture is reload</button> 
      <br>
      
      <br>
      
       <a href="/komoecontainer/comoeandfoldertree/komoeEng/video/uploadVideo.php">Back</a>
      
 </html>
 
 