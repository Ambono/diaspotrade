<?php include("../config/config.php")?>
<?php
if(!isset($_SESSION)){
    session_start();
}
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['login_user'])){  
    $user =   $_SESSION['login_user'];
   //  echo  $user;
 } 
 elseif(isset($_SESSION['token_temp_user'])){
	    $user =$_SESSION['token_temp_user']; 
	// echo  $user;
	   }
           
	   
	$resultpage = mysqli_query($connect,"SELECT PageToFetch FROM paginator WHERE UserName = '".$user."'  order by Id desc limit 1");     
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
		 


$resultshop = mysqli_query($connect,"SELECT Name  FROM shops s  join productdetails p on s.OwnerEmail = p.SellerEmail
AND s.OwnerUName   = '".$user."' order by Shopname desc limit 1");

$retshopval = mysqli_fetch_array($resultshop);          
          	
     $shopname= $retshopval[0];  


   
	$resultpage = mysqli_query($connect,"SELECT PageToFetch FROM paginator WHERE UserName = '".$user."'  order by Id desc limit 1");     
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
	
 include("../config/config.php");

  session_start();
      if( $_SESSION['login_user']!= null)
   {  
	 $user = $_SESSION['login_user'];	 
	// echo  $user;
   }
	   
	$resultpage = mysqli_query($connect,"SELECT PageToFetch FROM paginator WHERE UserName = '".$user."'  order by Id desc limit 1");     
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
         
$result = mysqli_query($con, " SELECT pd.Id, pd.Description Description, pd.Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig, pc.CountryDestin, pc.CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail, s.SellerPhone, DeliveryPlace FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID
 where Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY) 
 AND   pd.Id in(SELECT distinct prodID FROM shopitems s WHERE s.inserterID = '$user' )");
 
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row; 
}

print json_encode($data);
$connect->close();	
?>
