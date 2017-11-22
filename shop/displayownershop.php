<?php include("../config/config.php");
//
//	include("../config/config.php");
//	ob_start();
//
//	if( $_SESSION['login_user']!= null)
//   {  
//	 $user = $_SESSION['login_user'];
//
//   }
//   else{
//	   $user = null;
//   }
//
//   $count=0;
//   
//     if(isset($_GET['id'])){
//		if (isset($_POST['Shopname']))
//		{
//			 $count=2;
//		}
//		
//		 //echo $count;	
//	 }
//	  
//    
//   if(isset($_GET['page']) || (isset($_GET['id']) && $count==2)){
//	  // $sql_Update = "DELETE from `shopsearchingtbl` WHERE  `SearchSession`='".$user."'  AND `Status`='current'";	
//	    $sql_Update = "DELETE from `shopsearchingtbl` WHERE  `SearchSession`='".$user."'";
//
// if (!mysqli_query($connect, $sql_Update))
//	  {
//	  die("Error : ".mysql_error()); 
//	//  echo'deleted';
//	  }  
//	else{
//    //echo'not deleted';		
//	    }			
//		$count=0;
//		
//	if (isset($_POST['Shopname'])) {
//   $Shopname = $_POST['Shopname'];  
//  
//     $sql = "INSERT INTO shopsearchingtbl(SearchedShop, DateTimeOfSearch, SearchSession, Status)
//	  VALUES('$Shopname',now(), '".$user."', 'current' )";
//
//	 if (!mysqli_query($connect, $sql))
//	  {
//	  die("Error : ".mysql_error()); 
//	  }  
//	else{	  
//	    }
//}
//else{
//$Shopname = null;	
//    }
//      } 
//	  
//	
//
//?>
//<?php
//
//       if(isset($_SESSION['login_user'])){
//	   $username =$_SESSION['login_user']; 
//	  // echo $username;
//	   }
//	   
//$resultsearch = mysqli_query($connect,"SELECT SearchedShop FROM shopsearchingtbl 
//WHERE SearchSession  = '".$username."' AND Status ='current' order by Id desc ");
//	
//		 	 
//$shopnameres = mysqli_fetch_assoc($resultsearch);
// 
//
////echo 'http://localhost:81/workspacenetbean/komoe/images/'.$shoppic['Picture'].'.JPG';
//
////echo $shoppic['Picture'];
// if(!$shopnameres['SearchedShop']) {
// 	echo'';
// } else {
// 
// //echo 'You are on ';
// echo $shopnameres['SearchedShop']; 
// echo'\'s ';
// echo ' place';
// echo ' ';
// 
// }
// 
// /////////////////////////
// 
//    
//$result = mysqli_query($connect,"SELECT Picture FROM shops where Name in(SELECT SearchedShop FROM shopsearchingtbl 
//WHERE SearchSession  = '".$username."' AND Status ='current' order by Id desc) ");
//	
//		 	 
//$shoppic = mysqli_fetch_assoc($result);
// 
//
////echo 'http://localhost:81/workspacenetbean/komoe/images/'.$shoppic['Picture'].'.JPG';
//
////echo $shoppic['Picture'];
// if(!$shoppic['Picture']) {
// 	echo'';
// } else {	
// echo  '<img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/'.$shoppic['Picture'].'.JPG" id="the_idfirstoptional" width="80" height="50" alt="This pic is not available" "/>';
// 
// }
// 
// 
// 
//$connect->close();	
?>



