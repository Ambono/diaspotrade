 <?php

include("../config/config.php");
$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $string = '';
 $max = strlen($characters) - 1;
 $random_string_length = 14;
 for ($i = 0; $i < $random_string_length; $i++) {
      $string .= $characters[mt_rand(0, $max)];
 }
 $_SESSION['token_temp_user']=$string;
 $randomID = $string;
 if( isset($_SESSION['login_user']))
   {  
	 $user = $_SESSION['login_user'];
   }
   
 if (isset($_FILES["myimage"]) && !empty($_FILES["myimage"])) {
 $upload_image=$_FILES["myimage"]["name"];
 $temp_name =$_FILES["myimage"]["tmp_name"];
 $folder="..images/";
 $root = "C:/wamp/www/komoecontainer/comoeandfoldertree/komoeEng"; 
 
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
    if (isset($_FILES["firstoptionalimage"]) && !empty($_FILES["firstoptionalimage"])) {
   $upload_imageoptional1=$_FILES["firstoptionalimage"]["name"];
   $temp_namefirstoptional =$_FILES["firstoptionalimage"]["tmp_name"];
 
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
     if (isset($_FILES["secondoptionalimage"]) && !empty($_FILES["secondoptionalimage"])) {
    
     $upload_imageoptional2=$_FILES["secondoptionalimage"]["name"];
     $temp_namesecondoptional =$_FILES["secondoptionalimage"]["tmp_name"];
 
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
    
if( move_uploaded_file($temp_namefirstoptional, "../images/".$firstuploadimageoptional.".JPG")&& move_uploaded_file($temp_namesecondoptional, "../images/".$seconduploadimageoptional.".JPG"))  {
    
      	$sql = "INSERT INTO productdetails(Description, Name, Size, Colour, Gender, ProdCondition, CountryOrig, CountryDestin, CityDestin, ProdImage, ProdImagePath,Price, Availfrom, Availuntil, FirstOptionalImage, SecondOptionalImage,Sellernote, SellerEmail, SellerPhone, DeliveryPlace, productcategory,randomUniqueID)
  VALUES('$_POST[desc]','$_POST[item_name]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]', '$_POST[country_origin]' ,'$_POST[country_destin]' ,'$_POST[citydestin]', '$newuploadimage', '$folder', '$_POST[item_currency].$_POST[price]', '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]',"
                . "'$firstuploadimageoptional','$seconduploadimageoptional','$_POST[sellerNote]','$_POST[sellerEmail]', '$_POST[sellerPhone]', "
                . "'$_POST[deliveryPlace]','$_POST[productcategory]','$randomID')";    
        
         }
    
	elseif( move_uploaded_file($temp_namefirstoptional, "../images/".$firstuploadimageoptional.".JPG"))
    { 
 $sql = "INSERT INTO productdetails(Description, Name, Size, Colour, Gender, ProdCondition, CountryOrig, 
     CountryDestin, CityDestin, ProdImage, ProdImagePath,Price, Availfrom, Availuntil, FirstOptionalImage,
     Sellernote, SellerEmail, SellerPhone, DeliveryPlace, productcategory,randomUniqueID)
  VALUES('$_POST[desc]','$_POST[item_name]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]'"
         . " ,'$_POST[prodcond]', '$_POST[country_origin]' ,'$_POST[country_destin]' ,'$_POST[citydestin]'"
         . ", '$newuploadimage', '$folder', '$_POST[item_currency].$_POST[price]', '$_POST[datepickeravailfrom]'"
         . ",'$_POST[datepickeravailto]','$firstuploadimageoptional','$_POST[sellerNote]','$_POST[sellerEmail]'"
         . ", '$_POST[sellerPhone]','$_POST[deliveryPlace]','$_POST[productcategory]','$randomID')";    
      

      }elseif( move_uploaded_file($temp_namesecondoptional, "../images/".$seconduploadimageoptional.".JPG"))   {
  
 $sql = "INSERT INTO productdetails(Description, Name, Size, Colour, Gender, ProdCondition,
     CountryOrig, CountryDestin, CityDestin, ProdImage, ProdImagePath,Price, Availfrom, Availuntil, 
     SecondOptionalImage,Sellernote, SellerEmail, SellerPhone, DeliveryPlace, productcategory,randomUniqueID)
  VALUES('$_POST[desc]','$_POST[item_name]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,"
         . "'$_POST[prodcond]', '$_POST[country_origin]' ,'$_POST[country_destin]' ,"
         . "'$_POST[citydestin]', '$newuploadimage', '$folder', '$_POST[item_currency].$_POST[price]'"
         . ", '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]','$seconduploadimageoptional'"
         . ",'$_POST[sellerNote]','$_POST[sellerEmail]', '$_POST[sellerPhone]','$_POST[deliveryPlace]'"
         . ",'$_POST[productcategory]','$randomID')";    
      
         } else {
 $sql = "INSERT INTO productdetails(Description, Name, Size, Colour, Gender, ProdCondition, CountryOrig,
     CountryDestin, CityDestin, ProdImage, ProdImagePath,Price, Availfrom, Availuntil,Sellernote, 
     SellerEmail, SellerPhone, DeliveryPlace, productcategory,randomUniqueID)
  VALUES('$_POST[desc]','$_POST[item_name]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,"
         . "'$_POST[prodcond]', '$_POST[country_origin]' ,'$_POST[country_destin]' ,'$_POST[citydestin]'"
         . ", '$newuploadimage', '$folder', '$_POST[item_currency].$_POST[price]', '$_POST[datepickeravailfrom]'"
         . ",'$_POST[datepickeravailto]','$_POST[sellerNote]','$_POST[sellerEmail]', '$_POST[sellerPhone]'"
         . ", '$_POST[deliveryPlace]','$_POST[productcategory]','$randomID')";    
        }
       
 if (!mysqli_query($con, $sql))
  {
  die("Error While uploading image on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added "; 
   $latestinsertedid = mysqli_insert_id($con);  
   
   $sql_insert_seller = "INSERT INTO seller (Address, Alias, Date, Email, Name, Surname, Telephone, ProdID, randomUniqueID)
  VALUES('N/A','N/A',Now(),'$_POST[sellerEmail]','$user','N/A', '$_POST[sellerPhone]','$lastinsertedid', '$randomID' )";
       
 if (!mysqli_query($con, $sql_insert_seller))
  {
  ;//die("Error While inserting seller details on the server: ".mysql_error()); 
  }  
else{;}
     
 
if (isset($_POST['itemaction']))
{
$itemaction=$_POST['itemaction'];
  printf ("New Record has id %d.\n", mysqli_insert_id($con));
echo "You have selected :".$itemaction; 
   if ($_POST['itemaction']=='sell'){
  $sqlforintention = "INSERT INTO ownerintention(ProdId,Sell,Swap,Gift,Itemintendedfor,Transactionvalue,randomUniqueID)
  VALUES('$latestinsertedid', 1, 0, 0, 'sell', 'Offering price: $_POST[item_currency] $_POST[price]','$randomID' )"; 
  
  $sqlforinsertiondate = "INSERT INTO insertiondate(ProdId,InsertionDate,randomUniqueID)
  VALUES('$latestinsertedid',Now(),'$randomID')"; 
 // $description="";
  if (!mysqli_query($con,  $sqlforintention))
  {
  die("Error While inserting owner intention on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added in intention table ";
    header("location:/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php");
    include("/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/insertInCategoryTable.php");
  }
  
  if (!mysqli_query($con,  $sqlforinsertiondate))
  {
  die("Error While inserting timestamp on the server: ".mysql_error()); 
  }  
else{ 
;
  }
} //sell
elseif ($_POST['itemaction']=='swap') {
   $sqlforintention = "INSERT INTO ownerintention(ProdId,Sell,Swap,Gift,Itemintendedfor,Transactionvalue,randomUniqueID)
  VALUES('$latestinsertedid',0, 1, 0, 'swap', 'Swap against $_POST[swap_intention]','$randomID' )"; 
  
  
  $sqlforinsertiondate = "INSERT INTO insertiondate(ProdId,InsertionDate,randomUniqueID)
  VALUES('$latestinsertedid',Now(),'$randomID')"; 
 // $description="";
  if (!mysqli_query($con,  $sqlforintention))
  {
  die("Error While inserting owner intention on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added in intention table ";
    header("location:/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php");
    include("/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/insertInCategoryTable.php");
  }
  
  if (!mysqli_query($con,  $sqlforinsertiondate))
  {
  die("Error While inserting timestamp on the server: ".mysql_error()); 
  }  
else{ 
    ;
  } 
}
elseif ($_POST['itemaction']=='gift') {
$sqlforintention = "INSERT INTO ownerintention(ProdId,Sell,Swap,Gift,Itemintendedfor,Transactionvalue,randomUniqueID)
  VALUES('$latestinsertedid',0, 0, 1, 'gift', 'Ideally gift to: $_POST[gift_intention]','$randomID' )"; 
  
  
  $sqlforinsertiondate = "INSERT INTO insertiondate(ProdId,InsertionDate,randomUniqueID)
  VALUES('$latestinsertedid',Now(),'$randomID')"; 
 // $description="";
  if (!mysqli_query($con,  $sqlforintention))
  {
  die("Error While inserting owner intention on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added in intention table ";
    header("location:/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php");
    include("/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/insertInCategoryTable.php");
  }
  
  if (!mysqli_query($con,  $sqlforinsertiondate))
  {
  die("Error While inserting timestamp on the server: ".mysql_error()); 
  }  
else{ 
     ;
  }
}
  
    }  
    }
   }
   }
  }
 }
?>