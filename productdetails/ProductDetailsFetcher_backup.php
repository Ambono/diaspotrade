<?php 
session_start();
include_once("../config/config.php"); 
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['token_temp_user'])){  
    $user_session_temp_name =   $_SESSION['token_temp_user'];
 }
 
 elseif(isset($_SESSION['login_user'])){
	    $user_session_temp_name =$_SESSION['login_user']; 
	 //  echo  $user_session_temp_name;
	   }
        

	$resultpage = mysqli_query($connect,"SELECT PageToFetch FROM paginator WHERE UserName = '$user_session_temp_name' order by Id desc limit 1");     
	 $retpageval = mysqli_fetch_array($resultpage);
          
           $rec_limit = 10; //number of rows to return
          
        $offset = 0;
        $pageclicked =0;
		
     $pageclicked = $retpageval[0];  

	 if(!empty($pageclicked)) {            
          $offset = $rec_limit * (int)$pageclicked;
         }else {           
       $offset = 0;
         } 
         

  $searched_terms = mysqli_query($connect,"SELECT  distinct gender, prodcategory, countrydestination from searchcriteria where trackingstring = '$user_session_temp_name'");

  $row_init = mysqli_fetch_assoc($searched_terms);
 
   $searched_gender = $row_init['gender'];  
   $searched_prodcategory = $row_init['prodcategory'];
   $searched_countrydestination = $row_init['countrydestination'];

   
 if($searched_gender!='' || $searched_prodcategory!='' || $searched_countrydestination !='')
   {                         
          
 $result = mysqli_query($con, "SELECT distinct * FROM productdetails pd 
         WHERE (Gender = '$searched_gender') + (productcategory ='$searched_prodcategory')
            + (CountryDestin='$searched_countrydestination')>0       
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
$result = mysqli_query($connect, $query_delete);
$connect->close();  

   }
 //elseif(!isset($searched_gender)&& !isset($searched_prodcategory) && !isset($searched_countrydestination)){  
else {   
    $query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
    $result_delete = mysqli_query($connect, $query_delete);

$result = mysqli_query($connect,"SELECT Id, Description, Name, Size, Colour, Gender, ProdCondition, ProdImage, CountryOrig, CountryDestin, CityDestin, ProdImagePath, Availfrom, Availuntil,
 Orderproduct, Price, SellerEmail, SellerPhone, DeliveryPlace FROM productdetails where Availuntil >= DATE_SUB(now(), INTERVAL 60 DAY) LIMIT $offset, $rec_limit ");
	     
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();  
 }