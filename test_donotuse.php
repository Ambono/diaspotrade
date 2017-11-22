<?php //  
include("./config/config.php");
ob_start();
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

	$resultpage = mysqli_query($connect,"SELECT PageToFetch FROM paginator WHERE UserName = '$user' order by Id desc limit 1");     
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
                
       $query = "SELECT distinct Id, gender, prodcategory, "
          . "countrydestination, trackingstring, Date, Buy, Swap, Gift from "
          . "searchcriteria where trackingstring = '$user'";
 
$result= mysqli_query($con, $query);
$row_init= mysqli_fetch_assoc($result);
   
   $searched_gender = $row_init['gender'];  
   $searched_prodcategory = $row_init['prodcategory'];
   $searched_countrydestination = $row_init['countrydestination'];
   $swap_status= $row_init['Swap'];
   $gift_status = $row_init['Gift'];
   $buy_status = $row_init['Buy'];

//   if(($buy_status =='Yes')&&($gift_status=='Yes')&&($swap_status=='Yes'))
//    {   
//      $arr = array('sell','buy','swap');
////     if((!empty($row_init['gender'])) && (empty($row_init['prodcategory']))
////                   && (empty($row_init['countrydestination']))) 
//if(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']='$emptyspace')
//                   && ($row_init['countrydestination']='$emptyspace'))       
//     { 
//       $result = mysqli_query($connect, "SELECT distinct `Id`, `Description`, `Name`, `Size`, `Colour`, `Gender`,
//           `ProdCondition`, `ProdImage`, `CountryOrig`, `CountryDestin`, `CityDestin`, `ProdImagePath`, `Availfrom`,
//           `Availuntil`, `productcategory`, `Price`, `FirstOptionalImage`, `SecondOptionalImage`, 
//           `Sellernote`, `SellerEmail`, `SellerPhone`, `Shopname`, `DeliveryPlace`, `Orderproduct` FROM productdetails pd         
//WHERE  pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]'))
// AND (pd.Gender ='Boys') 
//     AND pd.Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
//     LIMIT $offset, $rec_limit");  
////$data = array();
//while ($row = mysqli_fetch_array($result)) {
// $data[] = $row;
//}
//print json_encode($data);
////$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
////$result = mysqli_query($connect, $query_delete);
//$connect->close(); 
//  }      
//   }
//   
//   
    if(($buy_status =='Yes')&&($gift_status=='Yes')&&($swap_status=='Yes'))
    {   
      $arr = array('sell','buy','swap');
     if(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace'))       
     { 
       $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd         
WHERE  pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]') )
 AND (Gender = '$searched_gender') +(productcategory ='$searched_prodcategory')
            + (CountryDestin='$searched_countrydestination')=3
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
 $data[] = $row;
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();  

   }
    elseif(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace'))
   {                         
    $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And pd.Gender = '$searched_gender'              
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();    

   }  
   
  elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace'))
   {   
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And pd.productcategory = '$searched_prodcategory'              
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();  

   }
   
 elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace'))
   {                         
        
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
            AND pd.CountryDestin = '$searched_countrydestination'     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 

   }
   
   elseif(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace'))
  {     
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And (pd.Gender = '$searched_gender') + (pd.productcategory = '$searched_prodcategory')=2               
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 
}   
 elseif(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace')) {                      
        
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And (pd.Gender = '$searched_gender') + (pd.CountryDestin = '$searched_countrydestination')=2     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
//$connect->close(); 
//
   }
//   
   elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace')) {     
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
AND (pd.productcategory = '$searched_prodcategory') + (pd.CountryDestin = '$searched_countrydestination')=2     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 

   }
elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace')) { 
$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
$result_delete = mysqli_query($connect, $query_delete);
 
$result_search = mysqli_query($con,"SELECT COUNT(Id) as total FROM productdetails pd 
 where pd.Id in (select oi.ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]'))
  AND 
Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
LIMIT $offset, $rec_limit");     
$data = array();
while ($row = mysqli_fetch_array($result_search)) {
  $data[] = $row;  
}
print json_encode($data);
$connect->close();
} 
}
elseif(($buy_status =='Yes')&&($gift_status=='Yes')&&($swap_status=='No')){
      $arr = array('sell','buy','no');          
     if(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace'))       
     { 
       $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd         
WHERE  pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]') )
 AND (Gender = '$searched_gender') +(productcategory ='$searched_prodcategory')
            + (CountryDestin='$searched_countrydestination')=3
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
 $data[] = $row;
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();  

   }
    elseif(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace'))
   {                         
    $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And pd.Gender = '$searched_gender'              
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();    

   }    
  elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace'))
   {   
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And pd.productcategory = '$searched_prodcategory'              
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();  

   }
   
 elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace'))
   {                         
        
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
            AND pd.CountryDestin = '$searched_countrydestination'     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 

   }
   
   elseif(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace'))
  {     
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And (pd.Gender = '$searched_gender') + (pd.productcategory = '$searched_prodcategory')=2               
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 
}   
 elseif(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace')) {                      
        
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And (pd.Gender = '$searched_gender') + (pd.CountryDestin = '$searched_countrydestination')=2     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
//$connect->close(); 
//
   }   
   elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace')) {     
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
AND (pd.productcategory = '$searched_prodcategory') + (pd.CountryDestin = '$searched_countrydestination')=2     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 

   }
elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace')) { 
$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
$result_delete = mysqli_query($connect, $query_delete);
 
$result_search = mysqli_query($con,"SELECT COUNT(Id) as total FROM productdetails pd 
 where pd.Id in (select oi.ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]'))
  AND 
Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
LIMIT $offset, $rec_limit");     
$data = array();
while ($row = mysqli_fetch_array($result_search)) {
  $data[] = $row;  
}
print json_encode($data);
$connect->close();
}
}  
elseif(($row_init['Buy'] =='Yes')&&($row_init['Gift']=='No')&&($row_init['Swap']=='No')){
       $arr = array('sell','no','no');
       
       if(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace'))       
     {            
     $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd         
WHERE  pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]') )
 AND (Gender = '$row_init[gender]') +(productcategory ='$row_init[prodcategory]')
            + (CountryDestin='$row_init[countrydestination]')=3
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
 $data[] = $row;
}
echo json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();  
   }
    elseif((!empty($row_init['gender'])) && (empty($row_init['prodcategory']))
                   && (empty ($row_init['countrydestination'])))
   {                         
    $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And pd.Gender = '$row_init[gender]'              
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();    

   }  
   
  elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace'))
   {   
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And pd.productcategory = '$searched_prodcategory'              
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();  

   }
   
 elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace'))
   {                         
        
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
            AND pd.CountryDestin = '$searched_countrydestination'     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 

   }
   
   elseif(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace'))
  {     
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And (pd.Gender = '$searched_gender') + (pd.productcategory = '$searched_prodcategory')=2               
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 
}   
 elseif(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace')) {                      
        
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And (pd.Gender = '$searched_gender') + (pd.CountryDestin = '$searched_countrydestination')=2     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
//$connect->close(); 
//
   }
//   
   elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace')) {     
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
AND (pd.productcategory = '$searched_prodcategory') + (pd.CountryDestin = '$searched_countrydestination')=2     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 

   }
elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace')) { 
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result_delete = mysqli_query($connect, $query_delete);
 
$result_search = mysqli_query($con,"SELECT COUNT(Id) as total FROM productdetails pd 
 where pd.Id in (select oi.ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]'))
  AND 
Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
LIMIT $offset, $rec_limit");     
$data = array();
while ($row = mysqli_fetch_array($result_search)) {
  $data[] = $row;  
}
print json_encode($data);
$connect->close();
}
  }
elseif(($buy_status =='No')&&($gift_status=='gift')&&($swap_status=='No'))
   {
       $arr = array('no','gift','no');           
     if(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace'))       
     { 
       $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd         
WHERE  pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]') )
 AND (Gender = '$row_init[gender]') +(productcategory ='$row_init[prodcategory]')
            + (CountryDestin='$row_init[countrydestination]')=3
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
 $data[] = $row;
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();  

   }
    elseif(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace'))
   {                         
    $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And pd.Gender = '$searched_gender'              
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();    

   }  
   
  elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace'))
   {   
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And pd.productcategory = '$searched_prodcategory'              
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();  

   }
   
 elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace'))
   {                         
        
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
            AND pd.CountryDestin = '$searched_countrydestination'     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 

   }
   
   elseif(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace'))
  {     
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And (pd.Gender = '$searched_gender') + (pd.productcategory = '$searched_prodcategory')=2               
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 
}   
 elseif(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace')) {                      
        
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And (pd.Gender = '$searched_gender') + (pd.CountryDestin = '$searched_countrydestination')=2     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
//$connect->close(); 
//
   }
//   
   elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace')) {     
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
AND (pd.productcategory = '$searched_prodcategory') + (pd.CountryDestin = '$searched_countrydestination')=2     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 

   }
elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace')) { 
$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
$result_delete = mysqli_query($connect, $query_delete);
 
$result_search = mysqli_query($con,"SELECT COUNT(Id) as total FROM productdetails pd 
 where pd.Id in (select oi.ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]'))
  AND 
Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
LIMIT $offset, $rec_limit");     
$data = array();
while ($row = mysqli_fetch_array($result_search)) {
  $data[] = $row;  
}
print json_encode($data);
$connect->close();
}
   }
elseif(($row_init['Buy'] =='No')&&($row_init['Gift']=='No')&&($row_init['Swap']=='No'))
   {
       $arr = array('no','no','no');       
     if(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace'))       
     { 
       $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd         
WHERE  pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]') )
 AND (Gender = '$searched_gender') +(productcategory ='$searched_prodcategory')
            + (CountryDestin='$searched_countrydestination')=3
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
 $data[] = $row;
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();  

   }
    elseif((!empty($row_init['gender'])) && (empty($row_init['prodcategory']))
                   && (empty($row_init['countrydestination'])))
   {                         
    $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And pd.Gender = '$searched_gender' AND pd.Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();   
   }  
   
  elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace'))
   {   
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And pd.productcategory = '$searched_prodcategory'              
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close();  

   }
   
 elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace'))
   {                         
        
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
            AND pd.CountryDestin = '$searched_countrydestination'     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 

   }
  
   elseif(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace'))
  {     
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And (pd.Gender = '$searched_gender') + (pd.productcategory = '$searched_prodcategory')=2               
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 
}   
 elseif(($row_init['gender']!='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace')) {                      
        
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
And (pd.Gender = '$searched_gender') + (pd.CountryDestin = '$searched_countrydestination')=2     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
//$connect->close(); 
//
   } 
   elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']!='$emptyspace')
                   && ($row_init['countrydestination']!='$emptyspace')) {     
 $result = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd  
        where pd.Id in (select ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')) 
AND (pd.productcategory = '$searched_prodcategory') + (pd.CountryDestin = '$searched_countrydestination')=2     
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
     LIMIT $offset, $rec_limit");  
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result = mysqli_query($connect, $query_delete);
$connect->close(); 

   }
elseif(($row_init['gender']=='$emptyspace') && ($row_init['prodcategory']=='$emptyspace')
                   && ($row_init['countrydestination']=='$emptyspace')) { 
$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
$result_delete = mysqli_query($connect, $query_delete);
 
$result_search = mysqli_query($con,"SELECT COUNT(Id) as total FROM productdetails pd 
 where pd.Id in (select oi.ProdID from ownerintention oi where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]'))
  AND 
Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
LIMIT $offset, $rec_limit");     
$data = array();
while ($row = mysqli_fetch_array($result_search)) {
  $data[] = $row;  
}
print json_encode($data);
$connect->close();
}
}    
//   
   
 



