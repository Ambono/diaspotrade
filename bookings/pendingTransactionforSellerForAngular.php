
<?php include("../config/config.php")?>
<?php
  session_start();
      if( $_SESSION['login_user']!= null)
   {  
	 $user = $_SESSION['login_user'];	 
	// echo  $user;
   }
   
  
	   
	     $query_Select = " SELECT distinct sh.ProdId as shProdId, pd.Description as pdDescription, pd.ProdImage as pdProdImage,  sh.UserName as shUserName,
	   sh.Date as shDate, sh.ShoppingID as shShoppingID, u.Name as uName, u.Email as uEmail,
	   u.Telephone as uTelephone FROM productdetails pd inner join shoppingtbl sh on sh.ProdID = pd.Id 
	   inner join users u on sh.UserName = u.Name WHERE pd.Shopname = (SELECT Name FROM shops s join productdetails p on s.OwnerEmail = p.SellerEmail 
	   AND s.OwnerUName = '$user' order by Shopname desc limit 1 )AND Availuntil <= DATE_SUB(now(), INTERVAL 60 DAY) and sh.IsConfirmed like '%N%' 
	   order by sh.ProdId, pd.Description, pd.ProdImage, sh.UserName, sh.Date, sh.ShoppingID, u.Name, u.Email, u.Telephone desc ";
	   
	   
	   
	$result = mysqli_query($connect, $query_Select); 

			 	 
$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row; 
}
?>			
		
