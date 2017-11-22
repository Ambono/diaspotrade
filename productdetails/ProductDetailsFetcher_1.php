<?php 
include("../config/config.php");

  session_start();
       if(!isset($_SESSION['login_user'])){
	   $username =$_SESSION['login_user']; 
	   echo $username;
	   }
	   else
           {
               $username = $_SESSION['search_tracker'] ;
           }
             

      
	$resultpage = mysqli_query($connect,"SELECT PageToFetch FROM paginator WHERE UserName = '$_SESSION[login_user]' order by Id desc limit 1");     
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
  
//if($_POST['viewselected'] ){ 
   // if($_POST['viewseleuctcategory'cted'] != 0){
         if(isset($_POST['productcategory'])&&!empty($_POST['productcategory']))
         {
    $productcategory = $_POST['productcategory'];
    //$gender = $_POST['gender']; 
    //$countrydestination = $_POST['country_destin'];
     
 

$result = mysqli_query($connect,"SELECT Id, Description, Size, Colour, Gender, ProdCondition, ProdImage, CountryOrig, CountryDestin, CityDestin, ProdImagePath, Availfrom, Availuntil,
 Orderproduct, Price, SellerEmail, SellerPhone, DeliveryPlace FROM productdetails where Availuntil >= DATE_SUB(now(), INTERVAL 60 DAY) AND productcategory ='$productcategory' LIMIT $offset, $rec_limit ");
			 	  
$data = array();
while ($row = mysqli_fetch_array($result)) {
$data[] = $row; }
   // }
 }else{
     /*
$result = mysqli_query($connect,"SELECT Id, Description, Size, Colour, Gender, ProdCondition, ProdImage, CountryOrig, CountryDestin, CityDestin, ProdImagePath, Availfrom, Availuntil,
 Orderproduct, Price, SellerEmail, SellerPhone, DeliveryPlace FROM productdetails where Availuntil >= DATE_SUB(now(), INTERVAL 60 DAY) LIMIT $offset, $rec_limit ");
	*/
//$_POST['productcategory']=''? $productcategory ='Toys': $_POST['productcategory'];
 //$productcategory = POST['productcategory'];  
$result = mysqli_query($connect,"SELECT Id, Description, Size, Colour, Gender, ProdCondition, ProdImage, CountryOrig, CountryDestin, CityDestin, ProdImagePath, Availfrom, Availuntil,
 Orderproduct, Price, SellerEmail, SellerPhone, DeliveryPlace FROM productdetails where Availuntil >= DATE_SUB(now(), INTERVAL 60 DAY) LIMIT $offset, $rec_limit ");
	     
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;   
}
//header('Location: Buy.php?page=0');
print json_encode($data);
$connect->close();
//}
 }
 ?>