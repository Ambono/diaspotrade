 <?php

include("../config/config.php");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }   

 if (isset($_FILES["myimage"]) && !empty($_FILES["myimage"])) {
 $upload_image=$_FILES["myimage"]["name"];
 $temp_name =$_FILES["myimage"]["tmp_name"];
 $folder="/images";
 $root = "C:/wamp/www/komoecontainer/comoeandfoldertree/komoeEng"; 
 
  
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
     
if( move_uploaded_file($temp_name, $folder.$newuploadimage.".JPG"))
{ 	
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
    
if( move_uploaded_file($temp_namefirstoptional, $folder.$firstuploadimageoptional.".JPG")&& move_uploaded_file($temp_namesecondoptional, $folder.$seconduploadimageoptional.".JPG"))  {
    
      	$sql = "INSERT INTO productdetails(Description, Size, Colour, Gender, ProdCondition, CountryOrig, CountryDestin, CityDestin, ProdImage, ProdImagePath,Price, Availfrom, Availuntil, FirstOptionalImage, SecondOptionalImage,Sellernote, SellerEmail, SellerPhone)
  VALUES('$_POST[desc]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]', '$_POST[countryorigin]' ,'$_POST[countrydestin]' ,'$_POST[citydestin]', '$newuploadimage', '$folder', '$_POST[price]', '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]','$firstuploadimageoptional','$seconduploadimageoptional','$_POST[sellerNote]','$_POST[sellerEmail]', '$_POST[sellerPhone]')";    
        
         }
    
	elseif( move_uploaded_file($temp_namefirstoptional, $folder.$firstuploadimageoptional.".JPG"))
    { 
 $sql = "INSERT INTO productdetails(Description, Size, Colour, Gender, ProdCondition, CountryOrig, CountryDestin, CityDestin, ProdImage, ProdImagePath,Price, Availfrom, Availuntil, FirstOptionalImage,Sellernote, SellerEmail, SellerPhone)
  VALUES('$_POST[desc]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]', '$_POST[countryorigin]' ,'$_POST[countrydestin]' ,'$_POST[citydestin]', '$newuploadimage', '$folder', '$_POST[price]', '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]','$firstuploadimageoptional','$_POST[sellerNote]','$_POST[sellerEmail]', '$_POST[sellerPhone]')";    
      

      }elseif( move_uploaded_file($temp_namesecondoptional, $folder.$seconduploadimageoptional.".JPG"))   {
  
 $sql = "INSERT INTO productdetails(Description, Size, Colour, Gender, ProdCondition, CountryOrig, CountryDestin, CityDestin, ProdImage, ProdImagePath,Price, Availfrom, Availuntil, SecondOptionalImage,Sellernote, SellerEmail, SellerPhone)
  VALUES('$_POST[desc]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]', '$_POST[countryorigin]' ,'$_POST[countrydestin]' ,'$_POST[citydestin]', '$newuploadimage', '$folder', '$_POST[price]', '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]','$seconduploadimageoptional','$_POST[sellerNote]','$_POST[sellerEmail]', '$_POST[sellerPhone]')";    
      
         } else {
 $sql = "INSERT INTO productdetails(Description, Size, Colour, Gender, ProdCondition, CountryOrig, CountryDestin, CityDestin, ProdImage, ProdImagePath,Price, Availfrom, Availuntil,Sellernote, SellerEmail, SellerPhone)
  VALUES('$_POST[desc]','$_POST[size]','$_POST[colour]' ,'$_POST[gender]' ,'$_POST[prodcond]', '$_POST[countryorigin]' ,'$_POST[countrydestin]' ,'$_POST[citydestin]', '$newuploadimage', '$folder', '$_POST[price]', '$_POST[datepickeravailfrom]','$_POST[datepickeravailto]','$_POST[sellerNote]','$_POST[sellerEmail]', '$_POST[sellerPhone]')";    
        }
       
 if (!mysqli_query($con, $sql))
  {
  die("Error While uploading image on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added "; 
$latestinsertedid = mysqli_insert_id($con);   
if (isset($_POST['itemaction']))
{
$itemaction=$_POST['itemaction'];
  printf ("New Record has id %d.\n", mysqli_insert_id($con));
echo "You have selected :".$itemaction; 
  $sqlforintention = "INSERT INTO ownerintention(ProdId,Itemintendedfor)
  VALUES('$latestinsertedid','$itemaction')"; 
  
  $sqlforinsertiondate = "INSERT INTO insertiondate(ProdId,InsertionDate)
  VALUES('$latestinsertedid',Now())"; 
  if (!mysqli_query($con,  $sqlforintention))
  {
  die("Error While inserting owner intention on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added in intention table ";
  }
  
  if (!mysqli_query($con,  $sqlforinsertiondate))
  {
  die("Error While inserting timestamp on the server: ".mysql_error()); 
  }  
else{
   echo "1 record added in intention table ";
   header("location:/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php");
  }
  
  
}  
    }
   }
 
 }
?>