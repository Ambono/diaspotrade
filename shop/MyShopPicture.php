
<?php 
	include("../config/config.php");
	ob_start();

	if( $_SESSION['login_user']!= null)
   {  
	 $user = $_SESSION['login_user'];

   }
   else{
	   $user = null;
   }

   
    
   
	    $sql_Update = "DELETE from `shopsearchingtbl` WHERE  `SearchSession`='".$user."'";

 if (!mysqli_query($connect, $sql_Update))
	  {
	  die("Error : ".mysql_error()); 
	//  echo'deleted';
	  }  
	else{
    //echo'not deleted';		
	    }			
		
		
	$resultshop = mysqli_query($connect,"SELECT Name  FROM shops s  join productdetails p on s.OwnerEmail = p.SellerEmail
AND s.OwnerUName   = '".$user."' order by Shopname desc limit 1");

$retshopval = mysqli_fetch_array($resultshop);          
          	
     $Shopname= $retshopval[0]; 
     
  

 //echo 'You are on ';
 echo $Shopname; 
 echo'\'s ';
 echo ' place';
 echo ' ';
 
$result = mysqli_query($connect,"SELECT Picture FROM shops where Name =  '".$Shopname."' ");
	
		 	 
$shoppic = mysqli_fetch_assoc($result); 

 if(!$shoppic['Picture']) {
 	echo'';
 } else {	
 echo  '<img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/'.$shoppic['Picture'].'.JPG" id="the_idfirstoptional" width="80" height="50" alt="This pic is not available" "/>';
 
 }
  
  
$connect->close();	
?>



