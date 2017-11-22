<?php 
include("../config/config.php");


$result = mysqli_query($connect,"SELECT pd.Id as Id, pd.Description as Description , pd.Name as Name, Size, Colour, Gender, ProdCondition, ProdImage, FirstOptionalImage, SecondOptionalImage, pc.CountryOrig CountryOrig, pc.CountryDestin as CountryDestin, pc.CityDestin as CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail as SellerEmail, s.SellerPhone as SellerPhone, DeliveryPlace, 
  
oi.Transactionvalue FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi on pd.Id = oi.prodId 
WHERE pd.Id = '".$_GET['id']."'");

$proddetails = mysqli_fetch_assoc($result);
    
echo "<table border='0' cellpadding='0' cellspacing='0' class='table-fill'>"; 
echo "<tr>";
echo "<td>";
echo'<span style="color:green;text-align:center;">Never attend a delivery in a place which is not either public or safe.</span><br>';
echo '<span style="color:green;text-align:center;">Delivery place: '.$proddetails['DeliveryPlace'].'</span><br>';
echo "</td>"; 
   echo "</tr>"; 
   echo "</table>";
echo "<table border='0' cellpadding='0' cellspacing='0' class='table-fill' text-align ='center'>"; 
echo "<tr>";
echo "<td>";
   echo 'Id: '.$proddetails['Id'].'<br>';
     echo 'Seller email: '.$proddetails['SellerEmail'].'<br>';
   echo 'Description: '.$proddetails['Description'].'<br>';
   echo 'Size: '.$proddetails['Size'].'<br>';
   echo 'Colour: '.$proddetails['Colour'].'<br>';
  
  
//   echo "</td>";
//    echo "<td>";
     echo 'Product Condition: '.$proddetails['ProdCondition'].'<br>';
 echo 'Country origin: '.$proddetails['CountryOrig'].'<br>';
 echo 'Country destination : '.$proddetails['CountryDestin'].'<br>';
  echo 'Citydestination : '.$proddetails['CityDestin'].'<br>';
//   echo "</td>";
//    echo "<td>";
     echo 'Gender : '.$proddetails['Gender'].'<br>';
   echo 'Available from: '.$proddetails['Availfrom'].'<br>';
   echo 'Available until: '.$proddetails['Availuntil'].'<br>';
   echo 'Intention: '.$proddetails['Transactionvalue'].'<br>'; 
   echo "</td>";
echo"</br>";
 echo"<br>";
 
 echo"</tr>";
 echo"</table>";
  echo"<table>";
 echo"<tr>";
 echo"<td>";
 if(!$proddetails['ProdImage']) {
 	echo'';
 } else {
 echo  '<a href="#" ><img src = "../images/'.$proddetails['ProdImage'].'.JPG" alt="This pic is not available"  id="the_idprimary" width="80" height="60" onclick="loadimages(this.id)"/></a>';
 }
 echo "</td>";
  echo'<br>';
  
 echo"<td>";

 if(!$proddetails['FirstOptionalImage']) {
 	echo'';
 } else {

  echo  '<a href="#" ><img src = "../images/'.$proddetails['FirstOptionalImage'].'.JPG" id="the_idfirstoptional" width="80" height="60" onclick="loadimages(this.id)"/></a>';
	}   
   echo "</td>";
   echo"<br>";
 
   echo'<br>';
  
 echo"<td>";

	if(!$proddetails['SecondOptionalImage']) {
		
		echo'';
	} else {
 
 echo  '<a href="#" ><img src = "../images/'.$proddetails['SecondOptionalImage'].'.JPG" id="the_idsecondoptional" width="80" height="60" onclick="loadimages(this.id)"/></a>';
	}
 echo "</td>";
 echo"<br>";
 
   echo "</tr>"; 
   echo "</table>";
    
?>
