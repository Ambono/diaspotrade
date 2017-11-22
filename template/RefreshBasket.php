<!-- https://plnkr.co/edit/CtMucCAfuxb8JHO5Buci?p=preview -->
 <!DOCTYPE html>
<HTML>
 <div align = "center" >
<?php 
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "komoe1";
// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
$conn = mysqli_connect($servername, $username, $password, $dbname);
$con = mysqli_connect($servername, $username, $password, $dbname);

$query="select * FROM basket WHERE UserName = 'admin'";
$result = mysqli_query($connect, $query);
   while( $basketcontent= mysqli_fetch_assoc($result)){
 	  echo 'Note: '.$basketcontent['ProdID'].'<br>'; 
      echo 'Note: '.$basketcontent['UserName'].'<br>';
      echo'<br>';    
 }  
 ?> 
</div>

</BODY>
</HTML>
