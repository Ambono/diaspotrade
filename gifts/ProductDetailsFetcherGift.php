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
          
           $rec_limit = 7; //number of rows to return
          
        $offset = 0;
        $pageclicked =0;
		
     $pageclicked = $retpageval[0];  

	 if(!empty($pageclicked)) {            
          $offset = $rec_limit * (int)$pageclicked;
         }else {           
       $offset = 0;
         } 
         

$result = mysqli_query($connect,"SELECT Id, Description, Name, Size, Colour, Gender, ProdCondition, ProdImage, CountryOrig, CountryDestin, CityDestin, ProdImagePath, Availfrom, Availuntil,
 Orderproduct, Price, SellerEmail, SellerPhone, DeliveryPlace FROM productdetails pd 
 where Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY) 
 AND pd.Id in (select oi.prodID from ownerintention oi where oi.Itemintendedfor like'%gift%')  
LIMIT $offset, $rec_limit ");
     
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
$connect->close();
 

