 <?php 
include("../config/config.php");


   if( $_SESSION['login_user']!= null)
   {   
	 $user = $_SESSION['login_user'];	
   }

if( isset($_POST['prodid']) ) {

   $prodID = $_POST['prodid'];
   echo "Welcome ".$prodID;
      }
   
else {
	 $prodID = null;
        echo " Product id not received:  ";
     }
     
   
echo('<br>');
$row="";
$query= "SELECT * from basket WHERE ProdID = '$prodid'  ";

/* $query = "INSERT INTO basket(ProdId, Date, ShoppingID)
	  VALUES('$prodID','','5' )";*/


$result = mysqli_query($connect, $query);

if (!$result)
	  {
	  die("Error : ".mysql_error()); 
	  } 
	  
while ($row = mysqli_fetch_array($result)) {	
     echo "ID :{$row['Id']}  <br> ".
         "Prod ID : {$row['ProdID']} <br> ".
         "User Name : {$row['UserName']} <br> ".
         "--------------------------------<br>";
    }
 
 
/* 
 include("config.php");

$result = mysqli_query($connect, "select * FROM productdetails WHERE Id = '".$_GET['id']."' ORDER BY `Id` DESC");


   $proddetails = mysqli_fetch_assoc($result);

   echo 'Id: '.$proddetails['Id'].'<br>';
   echo 'Description: '.$proddetails['Description'].'<br>';
   echo 'Size: '.$proddetails['Size'].'<br>';
   echo 'Colour: '.$proddetails['Colour'].'<br>';
      echo 'Gender : '.$proddetails['Gender'].'<br>';
   echo 'Product Condition: '.$proddetails['ProdCondition'].'<br>';
   echo 'Image: '.$proddetails['ProdImage'].'<br>';
   echo 'Country image: '.$proddetails['CountryOrig'].'<br>';
      echo 'Country destination : '.$proddetails['CountryDestin'].'<br>';
   echo 'Available from: '.$proddetails['Availfrom'].'<br>';
   echo 'Available until: '.$proddetails['Availuntil'].'<br>';
   echo 'Price: '.$proddetails['Price'].'<br>'; */

?> 