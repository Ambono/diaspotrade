<?php 
include("../config/config.php");
if(!isset($_SESSION)){
    session_start();
}
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['login_user'])){  
    $user_session_temp_name =   $_SESSION['login_user'];
 } 
 elseif(isset($_SESSION['token_temp_user'])){
	    $user_session_temp_name =$_SESSION['token_temp_user']; 	
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

	 
$searchedItem = mysqli_query($con, " SELECT SearchedShop FROM shopsearchingtbl 
WHERE ShopSearcher  like '%$user_session_temp_name' order by Id desc limit 1");
   $search_result_s = mysqli_fetch_assoc($searchedItem);
        $search_result = $search_result_s ['SearchedShop'];

      
   
$result_search_item = mysqli_query($con,"SELECT distinct prodID FROM shopItems si inner join shops s
    on si.prodID =s.Id
        WHERE s.Name LIKE '%$search_result%'
    AND
 Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY) LIMIT $offset, $rec_limit");

while ($search = mysqli_fetch_array($result_search_item)) {
    $result_insert_searchId = mysqli_query($con,
            "insert into searchshoppostinsert_preretrieve (prodId, username)  
            values('$search[Id]', '$user_session_temp_name')" );
    if(!$result_insert_searchId){
        ;
    }else{;}
}


$result = mysqli_query($con, "SELECT pd.Id, pd.Description Description, pd.Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig, pc.CountryDestin, pc.CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail, s.SellerPhone, DeliveryPlace FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID
 where Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY) 
 AND   pd.Id in(select prodId from searchshoppostinsert_preretrieve spp 
        where  spp.username like '%$user_session_temp_name')");

$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);

$connect->close();	
?>
