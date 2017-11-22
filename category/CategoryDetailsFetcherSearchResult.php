<?php  
include("../config/config.php");
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
          . "searchcriteria where trackingstring = '$user' order by Date desc limit 1";
 
$result= mysqli_query($con, $query);
$row_init= mysqli_fetch_assoc($result);
   
if(isset($row_init['gender'])){
$searched_gender = $row_init['gender']; 
} 
if(isset($row_init['prodcategory'])){
   $searched_prodcategory = $row_init['prodcategory'];
}
if(isset($row_init['countrydestination'])){
   $searched_countrydestination = $row_init['countrydestination'];
}
if(isset($row_init['Swap'])){
   $swap_status= $row_init['Swap'];
}
if(isset($row_init['Gift'])){
   $gift_status = $row_init['Gift'];
}
if(isset($row_init['Buy'])){
   $buy_status = $row_init['Buy'];
}

 $emptyspace=' ';
  
    if(($buy_status =='Yes')&&($gift_status=='Yes')&&($swap_status=='Yes'))
    {   
      $arr = array('sell','buy','swap');

    if(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None'))       
     {                         
    $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') 
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
   
   elseif(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None'))       
     { 
      // $arr = array('sell','buy','swap');
       $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=3
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
  elseif(($row_init['gender']==='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']==='None'))
   { 
      //$arr = array('sell','buy','swap');
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')          
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
   
 elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None'))
   {                         
        
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pc.CountryDestin = '$searched_countrydestination')
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
   
   elseif(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']=='None'))
  {     
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory') =2
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
 elseif(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None')) {                      
        
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') + (pc.CountryDestin = '$searched_countrydestination')=2
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
//
   }
  
   elseif(($row_init['gender']=='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None')) {     
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=2
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
elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None')) { 
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result_delete = mysqli_query($connect, $query_delete);
 
$result_search = mysqli_query($con,"SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]') 
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY) LIMIT $offset, $rec_limit");     
$data = array();
while ($row = mysqli_fetch_array($result_search)) {
  $data[] = $row;  
}
print json_encode($data);
$connect->close();
} 
else{;}

}
elseif(($buy_status =='Yes')&&($gift_status=='Yes')&&($swap_status=='No')){
      $arr = array('sell','buy','no');          
     
    if(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None'))       
     {                         
    $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') 
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
   
   elseif(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None'))       
     { 
      // $arr = array('sell','buy','swap');
       $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=3
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
  elseif(($row_init['gender']==='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']==='None'))
   { 
      //$arr = array('sell','buy','swap');
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')          
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
   
 elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None'))
   {                         
        
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pc.CountryDestin = '$searched_countrydestination')
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
   
   elseif(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']=='None'))
  {     
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory') =2
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
 elseif(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None')) {                      
        
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') + (pc.CountryDestin = '$searched_countrydestination')=2
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
//
   }
  
   elseif(($row_init['gender']=='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None')) {     
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=2
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
elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None')) { 
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result_delete = mysqli_query($connect, $query_delete);
 
$result_search = mysqli_query($con,"SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]') 
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY) LIMIT $offset, $rec_limit");     
$data = array();
while ($row = mysqli_fetch_array($result_search)) {
  $data[] = $row;  
}
print json_encode($data);
$connect->close();
} 
else{;}

}  
elseif(($row_init['Buy'] =='Yes')&&($row_init['Gift']=='No')&&($row_init['Swap']=='No')){
       $arr = array('sell','no','no');
       
     
    if(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None'))       
     {                         
    $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') 
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
   
   elseif(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None'))       
     { 
      // $arr = array('sell','buy','swap');
       $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=3
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
  elseif(($row_init['gender']==='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']==='None'))
   { 
      //$arr = array('sell','buy','swap');
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')          
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
   
 elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None'))
   {                         
        
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pc.CountryDestin = '$searched_countrydestination')
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
   
   elseif(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']=='None'))
  {     
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory') =2
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
 elseif(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None')) {                      
        
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') + (pc.CountryDestin = '$searched_countrydestination')=2
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
//
   }
  
   elseif(($row_init['gender']=='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None')) {     
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=2
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
elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None')) { 
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result_delete = mysqli_query($connect, $query_delete);
 
$result_search = mysqli_query($con,"SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]') 
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY) LIMIT $offset, $rec_limit");     
$data = array();
while ($row = mysqli_fetch_array($result_search)) {
  $data[] = $row;  
}
print json_encode($data);
$connect->close();
} 
else{;}

  }  
elseif(($buy_status =='No')&&($gift_status=='Yes')&&($swap_status=='No'))
   {
       $arr = array('no','gift','no');           
     
    if(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None'))       
     {                         
    $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') 
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
   
   elseif(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None'))       
     { 
      // $arr = array('sell','buy','swap');
       $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=3
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
  elseif(($row_init['gender']==='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']==='None'))
   { 
      //$arr = array('sell','buy','swap');
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')          
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
   
 elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None'))
   {                         
        
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pc.CountryDestin = '$searched_countrydestination')
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
   
   elseif(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']=='None'))
  {     
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory') =2
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
 elseif(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None')) {                      
        
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') + (pc.CountryDestin = '$searched_countrydestination')=2
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
//
   }
  
   elseif(($row_init['gender']=='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None')) {     
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=2
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
elseif(($row_init['gender']==='None') && ($row_init['prodcategory']==='None')
                   && ($row_init['countrydestination']==='None')) { 
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result_delete = mysqli_query($connect, $query_delete);
 
$result_search = mysqli_query($con,"SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]') 
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY) LIMIT $offset, $rec_limit");     
$data = array();
while ($row = mysqli_fetch_array($result_search)) {
  $data[] = $row;  
}
print json_encode($data);
$connect->close();
} 
else{;}

   }
elseif(($row_init['Buy'] =='No')&&($row_init['Gift']=='No')&&($row_init['Swap']=='No'))
   {
       $arr = array('no','no','no');       
    
    if(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None'))       
     {                         
    $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') 
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
   
   elseif(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None'))       
     { 
      // $arr = array('sell','buy','swap');
       $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=3
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
  elseif(($row_init['gender']==='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']==='None'))
   { 
      //$arr = array('sell','buy','swap');
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')          
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
   
 elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None'))
   {                         
        
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pc.CountryDestin = '$searched_countrydestination')
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
   
   elseif(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']=='None'))
  {     
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory') =2
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
 elseif(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None')) {                      
        
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') + (pc.CountryDestin = '$searched_countrydestination')=2
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
//
   }
  
   elseif(($row_init['gender']=='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None')) {     
 $result = mysqli_query($con, "SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=2
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
elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None')) { 
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
//$result_delete = mysqli_query($connect, $query_delete);
 
$result_search = mysqli_query($con,"SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]') 
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY) LIMIT $offset, $rec_limit");     
$data = array();
while ($row = mysqli_fetch_array($result_search)) {
  $data[] = $row;  
}
print json_encode($data);
$connect->close();
} 
else{;}

} 

//   
   
 