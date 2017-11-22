 
 <?php
include("../config/config.php");

$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $string_init = '';
 $max = strlen($characters) - 1;
 $random_string_length = 22;
 for ($i = 0; $i < $random_string_length; $i++) {
      $string .= $characters[mt_rand(0, $max)];
 }

$randomID = $string;
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

 if (isset($_FILES["myimage1"]) && !empty($_FILES["myimage1"])) {
 $upload_image=$_FILES["myimage1"]["name"];
 $temp_name =$_FILES["myimage1"]["tmp_name"];
 $folder="..images/";
 //$root = "C:/wamp/www/komoecontainer/comoeandfoldertree/komoeEng"; 
 
 $firstuploadimageoptional ="";
  $seconduploadimageoptional="";
  if (strpos($upload_image, '.jpg') !== false) {
     $newuploadimage =chop($upload_image,".jpg");
    } 
if (strpos($upload_image, '.JPG') !== false) {
     $newuploadimage =chop($upload_image,".JPG");
    }  
    
    if (strpos($upload_image, '.tiff') !== false) {
     $newuploadimage =chop($upload_image,".tiff");
    }

    if (strpos($upload_image, '.png') !== false) {
     $newuploadimage =chop($upload_image,".png");
    }

    if (strpos($upload_image, '.JPEG') !== false) {
     $newuploadimage =chop($upload_image,".JPEG");
    }  
 
      if (strpos($upload_image, '.gif') !== false) {
     $newuploadimage =chop($upload_image,".gif");
    }
     
if( move_uploaded_file($temp_name, "../images/".$newuploadimage.".JPG"))
{ 
    if (isset($_FILES["myimage2"]) && !empty($_FILES["myimage2"])) {
   $upload_imageoptional1=$_FILES["myimage2"]["name"];
   $temp_namefirstoptional =$_FILES["myimage2"]["tmp_name"];
 
  if (strpos($upload_imageoptional1, '.jpg') !== false) {
     $firstuploadimageoptional = chop($upload_imageoptional1,".jpg");
    } 
if (strpos($upload_imageoptional1, '.JPG') !== false) {
     $firstuploadimageoptional =chop($upload_imageoptional1,".JPG");
    }  
    
    if (strpos($upload_imageoptional1, '.tiff') !== false) {
     $firstuploadimageoptional =chop($upload_imageoptional1,".tiff");
    }

    if (strpos($upload_imageoptional1, '.png') !== false) {
     $firstuploadimageoptional =chop($upload_imageoptional1,".png");
    }

    if (strpos($upload_imageoptional1, '.JPEG') !== false) {
     $firstuploadimageoptional =chop($upload_imageoptional1,".JPEG");
    }  
 
      if (strpos($upload_imageoptional1, '.gif') !== false) {
     $firstuploadimageoptional =chop($upload_imageoptional1,".gif");
    }  	
    
     
   //////////optional2
     if (isset($_FILES["myimage3"]) && !empty($_FILES["myimage3"])) {
    
     $upload_imageoptional2=$_FILES["myimage3"]["name"];
     $temp_namesecondoptional =$_FILES["myimage3"]["tmp_name"];
 
  if (strpos($upload_imageoptional2, '.jpg') !== false) {
     $seconduploadimageoptional = chop($upload_imageoptional2,".jpg");
    } 
  if (strpos($upload_imageoptional2, '.JPG') !== false) {
     $seconduploadimageoptional =chop($upload_imageoptional2,".JPG");
    }  
    
    if (strpos($upload_imageoptional2, '.tiff') !== false) {
     $seconduploadimageoptional =chop($upload_imageoptional2,".tiff");
    }

    if (strpos($upload_imageoptional2, '.png') !== false) {
     $seconduploadimageoptional =chop($upload_imageoptional2,".png");
    }

    if (strpos($upload_imageoptional2, '.JPEG') !== false) {
     $seconduploadimageoptional =chop($upload_imageoptional2,".JPEG");
    }  
 
      if (strpos($upload_imageoptional2, '.gif') !== false) {
     $seconduploadimageoptional =chop($upload_imageoptional2,".gif");
    } 
    
if( move_uploaded_file($temp_namefirstoptional, "../orderimages/".$firstuploadimageoptional.".JPG")&& move_uploaded_file($temp_namesecondoptional, "../images/".$seconduploadimageoptional.".JPG"))  {


    
      	$sql = "INSERT INTO orderedItems(Description, Name, Size, Colour, Gender,
 ProdImage, ProdImagePath,Price, 
Availfrom, Availuntil, FirstOptionalImage, SecondOptionalImage, DeliveryPlace, InsertionDate, randomUniqueID)
  VALUES('$_POST[desc]','$_POST[item_name]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]','$newuploadimage', '$folder', '$_POST[item_currency].$_POST[price]', '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]','$firstuploadimageoptional','$seconduploadimageoptional','$_POST[deliveryPlace]', Now(),'$randomID')"; 

//SET @latestinsertedid = LAST_INSERT_ID();   

        
         }
    
	elseif( move_uploaded_file($temp_namefirstoptional, "../orderimages/".$firstuploadimageoptional.".JPG"))
    { 


 $sql = "INSERT INTO orderedItems(Description, Name, Size, Colour, Gender, ProdCondition, ProdImage, ProdImagePath,Price, Availfrom, Availuntil, FirstOptionalImage, DeliveryPlace, InsertionDate,randomUniqueID)
  VALUES('$_POST[desc]','$_POST[item_name]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]', '$newuploadimage', '$folder', '$_POST[item_currency].$_POST[price]', '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]','$firstuploadimageoptional','$_POST[deliveryPlace]', Now(),'$randomID')";    
      
//SET @latestinsertedid = LAST_INSERT_ID();



      }elseif( move_uploaded_file($temp_namesecondoptional, "../orderimages/".$seconduploadimageoptional.".JPG"))   {

 
 $sql = "INSERT INTO orderedItems(Description, Name, Size, Colour, Gender, ProdCondition, ProdImage, ProdImagePath,Price, Availfrom, Availuntil, SecondOptionalImage, DeliveryPlace,InsertionDate, randomUniqueID)
  VALUES('$_POST[desc]','$_POST[item_name]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]','$newuploadimage', '$folder', '$_POST[item_currency].$_POST[price]', '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]','$seconduploadimageoptional','$_POST[deliveryPlace]',InsertionDate, Now(),'$randomID')";

//@latestinsertedid = LAST_INSERT_ID();    

      
         } else {

 $sql = "INSERT INTO orderedItems(Description, Name, Size, Colour, Gender, ProdCondition,ProdImage, ProdImagePath, Price, Availfrom, Availuntil, DeliveryPlace,  InsertionDate, randomUniqueID)
  VALUES('$_POST[desc]','$_POST[item_name]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]', '$newuploadimage', '$folder', '$_POST[item_currency].$_POST[price]', '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]','$_POST[deliveryPlace]', Now(),'$randomID')"; 

//SET @latestinsertedid = LAST_INSERT_ID();
 
        }
       
// if (!mysqli_query($con, $sql))
//  {
//  die("Error While uploading image on the server: ".mysql_error()); 
//  }  
//else{
//   echo "1 record added "; 
//$latestinsertedid = mysqli_insert_id($con);  
//
// $sql_insert_seller = "INSERT INTO seller (Address, Alias, Date, SellerEmail, Name, Surname, SellerPhone, prodID, randomUniqueID, Sellernote)
//  VALUES('N/A','N/A',Now(),'$_POST[sellerEmail]','$user','N/A', '$_POST[sellerPhone]','$latestinsertedid', '$randomID','$_POST[sellerNote]' )";
//       
// if (!mysqli_query($con, $sql_insert_seller))
//  {
//  ;//die("Error While inserting seller details on the server: ".mysql_error()); 
//  }  
//else{;
//echo 'insert seller pb';
//}
//
//
// $sql_insert_randomid = "INSERT INTO generatedRandomID (Date, randomId)
//  VALUES(Now(),'$randomID')";
//       
// if (!mysqli_query($con, $sql_insert_randomid))
//  {
//  ;//die("Error While inserting seller details on the server: ".mysql_error()); 
//  }  
//else{;
//echo 'insert seller pb';
//}
//
// $sql_insert_countries = "INSERT INTO prodcountries (prodID, randomUniqueID, Date, CountryOrig, CountryDestin, CityDestin)
//  VALUES('$latestinsertedid','$randomID',Now(),'$_POST[country_origin]','$_POST[country_destin]','$_POST[citydestin]')";
//       
// if (!mysqli_query($con, $sql_insert_countries ))
//  {
//  ;//die("Error While inserting seller details on the server: ".mysql_error()); 
//  }  
//else{;
//echo 'insert countries pb';
//}
//
// $sql_insert_insertions = "INSERT INTO insertions (prodID, InserterID, insertionDate, randomUniqueID, InserterUname)
//  VALUES('$latestinsertedid',' ',Now(),'$randomID','$user')";
//       
// if (!mysqli_query($con, $sql_insert_insertions))
//  {
//  ;//die("Error While inserting seller details on the server: ".mysql_error()); 
//  }  
//else{;
//echo'insertions pb';
//}
//
//  $sqlforinsertiondate = "INSERT INTO insertiondate(prodId,InsertionDate,randomUniqueID)
//  VALUES('$latestinsertedid',Now(),'$randomID')"; 
// 
// if (!mysqli_query($con, $sqlforinsertiondate))
//  {
//  ;//die("Error While inserting seller details on the server: ".mysql_error()); 
//  }  
//else{;
//echo'insertion dates pb';
//}
//
//include("../insertsinDB/insertInCategoryTable.php");
//
//
////latestinsertedid = mysqli_fetch_assoc($query_retrieve_lastinsert);
//
//if (isset($_POST['itemaction']))
//{
//
//$itemaction=$_POST['itemaction'];
//
//   if ($_POST['itemaction']=='sell'){
//  $sqlforintention = "INSERT INTO ownerintention(ProdId,Sell,Swap,Gift,Itemintendedfor,Transactionvalue,randomUniqueID)
//  VALUES('$latestinsertedid', 1, 0, 0, 'sell', 'Offering price: $_POST[item_currency] $_POST[price]', '$randomID' )"; 
//  
//
//
//  if (!mysqli_query($con,  $sqlforintention))
//  {
//  die("Error While inserting owner intention on the server: ".mysql_error()); 
//  }  
//else{
//  
//    header("location:../sellers/Sell.php");   
//  }  
//  
//mysqli_close($con);
//} //sell
//
//elseif ($_POST['itemaction']=='swap') {
//   $sqlforintention = "INSERT INTO ownerintention(ProdId,Sell,Swap,Gift,Itemintendedfor,Transactionvalue,randomUniqueID)
//  VALUES('$latestinsertedid',0, 1, 0, 'swap', 'Swap against $_POST[swap_intention]','$randomID' )"; 
//    
//  
//  if (!mysqli_query($con,  $sqlforintention))
//  {
//  die("Error While inserting owner intention on the server: ".mysql_error()); 
//  }  
//else{
//   //echo "1 record added in intention table ";
//    header("location:../sellers/Sell.php");  
//  }
//  
//   
//mysqli_close($con);
//}//swap
//elseif ($_POST['itemaction']=='gift') {
//$sqlforintention = "INSERT INTO ownerintention(ProdId,Sell,Swap,Gift,Itemintendedfor,Transactionvalue,randomUniqueID)
//  VALUES('$latestinsertedid',0, 0, 1, 'gift', 'Ideally gift to: $_POST[gift_intention]','$randomID' )"; 
//  
//  if (!mysqli_query($con,  $sqlforintention))
//  {
//  die("Error While inserting owner intention on the server: ".mysql_error()); 
//  }  
//else{
//   echo "1 record added in intention table ";
//    header("location:../sellers/Sell.php");
//    //include("../insertsinDB/insertInCategoryTable.php");
//  }  
 
         header("location:../Needed/listneeded.php");
mysqli_close($con);
}
       }  
    }
   }

?>


