<?php include("../config/config.php")?>

<?php
session_start();
       if(!isset($_SESSION['login_user'])){
	   $username =$_SESSION['login_user']; 
	   echo $username;
	   }
	   
	$resultpage = mysqli_query($connect,"SELECT PageToFetch FROM paginator WHERE UserName = '$_SESSION[login_user]' order by Id desc limit 1");     
	 $retpageval = mysqli_fetch_array($resultpage);
          

		  $rec_limit = 5; //number of rows to return
          
        $offset = 0;
        $pageclicked =0;
		
     $pageclicked = $retpageval[0];  

	 if(!empty($pageclicked)) {            
          $offset = $rec_limit * (int)$pageclicked;
         }else {           
       $offset = 0;
         } 
  
//$result1 = mysqli_query($connect, "select * from productdetails LIMIT $offset, $rec_limit"); 

//$resulta = mysqli_query($connect, "select * FROM productdetails as prod join ownerintention as intention 
// on  intention.ProdId = prod.Id where prod.Availuntil >= DATE_SUB(now(), INTERVAL 10 DAY) and intention.Itemintendedfor like '%swap%'  
// group by  prod.Id LIMIT $offset, $rec_limit "); 

$result = mysqli_query($connect,"SELECT prod.Id, prod.Description, prod.Size, prod.Colour, prod.Gender, prod.ProdCondition, prod.ProdImage,
 prod.CountryOrig, prod.CountryDestin, prod.CityDestin, prod.ProdImagePath, prod.Availfrom, prod.Availuntil,
 prod.Orderproduct, prod.Price, prod.SellerEmail, prod.SellerPhone FROM productdetails as prod join ownerintention as intention 
 on  prod.Id = intention.ProdId where  intention.Itemintendedfor like '%swap%'  and prod.Availuntil >= DATE_SUB(now(), INTERVAL 10 DAY)
  group by  prod.Id LIMIT $offset, $rec_limit  "); 
		 
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row; 
}
print json_encode($data);
$connect->close();	
?>



