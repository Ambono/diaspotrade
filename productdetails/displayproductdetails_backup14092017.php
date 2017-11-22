
<?php 
include("../config/config.php");

$result = mysqli_query($connect, "select * FROM productdetails WHERE Id = '".$_GET['id']."' ORDER BY `Id` DESC");
$proddetails = mysqli_fetch_assoc($result);
     
echo "<table border='0' cellpadding='0' cellspacing='0' class='table-fill' >"; 
echo "<tr>";
echo "<td>";
echo'Never attend a delivery in a place which is not either public or safe.<br>';
echo 'Delivery place: <br>'.$proddetails['DeliveryPlace'].'<br>';
echo "</td>"; 
   echo "</tr>"; 
   echo "</table>";
echo "<table border='0' cellpadding='0' cellspacing='0' class='table-fill' >"; 
echo "<tr>";
echo "<td>";
   echo 'Id: '.$proddetails['Id'].'<br>';
   echo 'Description: '.$proddetails['Description'].'<br>';
   echo 'Size: '.$proddetails['Size'].'<br>';
   echo 'Colour: '.$proddetails['Colour'].'<br>';
   echo 'Gender : '.$proddetails['Gender'].'<br>';
   echo 'Product Condition: '.$proddetails['ProdCondition'].'<br>';
   echo "</td>";

 echo"<br>";
 echo'<td>';

 echo'</td>';
 
   echo "<td>";
 
 echo"</td>";
 
 echo"<td>";
 if(!$proddetails['ProdImage']) {
 	echo'';
 } else {
 echo  '<a href="#" ><img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/'.$proddetails['ProdImage'].'.JPG" alt="This pic is not available"  id="the_idprimary" width="80" height="60" onclick="loadimages(this.id)"/></a>';
 }
 echo "</td>";
  echo'<br>';
  echo "<td>";   
 echo"</td>";
 echo"<td>";

 if(!$proddetails['FirstOptionalImage']) {
 	echo'';
 } else {

  echo  '<a href="#" ><img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/'.$proddetails['FirstOptionalImage'].'.JPG" id="the_idfirstoptional" width="80" height="60" onclick="loadimages(this.id)"/></a>';
	}   
   echo "</td>";
   echo"<br>";
 
   echo'<br>';
   echo "<td>";
   
 echo"</td>";
 echo"<td>";

	if(!$proddetails['SecondOptionalImage']) {
		
		echo'';
	} else {
 
 echo  '<a href="#" ><img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/'.$proddetails['SecondOptionalImage'].'.JPG" id="the_idsecondoptional" width="80" height="60" onclick="loadimages(this.id)"/></a>';
	}
 echo "</td>";
 echo"<br>";
 echo "<td>";
 echo 'Country origin: '.$proddetails['CountryOrig'].'<br>';
 echo 'Country destination : '.$proddetails['CountryDestin'].'<br>';
  echo 'Citydestination : '.$proddetails['CityDestin'].'<br>';
   echo 'Available from: '.$proddetails['Availfrom'].'<br>';
   echo 'Available until: '.$proddetails['Availuntil'].'<br>';
   echo 'Price: '.$proddetails['Price'].'<br>'; 
   echo "</td>"; 
   echo "</tr>"; 
   echo "</table>";
?>