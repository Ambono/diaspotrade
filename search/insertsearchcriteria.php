  <?php  
   include("../config/config.php");
if(!isset($_SESSION)){
    session_start();
}
$_SESSION['token_temp_user'] =session_id();
  if(isset($_SESSION['login_user'])){
  
    $user_session_temp_name =   $_SESSION['login_user']; 
 }
 
  elseif(isset($_SESSION['token_temp_user'])){
	    $user_session_temp_name =$_SESSION['token_temp_user']; 	
	   }
 
if(isset($_POST['viewselected'])){
$gender_search = isset($_POST['gender_search'])&& !empty ($_POST['gender_search']) ? $_POST['gender_search'] : 'None';
$product_category = isset($_POST['product_category'])&& !empty ($_POST['product_category'])? $_POST['product_category'] : 'None';
$country_destin = isset($_POST['country_destin']) && !empty ($_POST['country_destin'])? $_POST['country_destin'] : 'None';
 $tracking_string =  isset($_POST['searchtrackingstring']) && !empty ($_POST['searchtrackingstring'])? $_POST['searchtrackingstring'] : 'None';     
  $swap_string =  isset($_POST['Swap']) && !empty ($_POST['Swap'])? $_POST['Swap'] : 'No';
  $buy_string =  isset($_POST['Buy']) && !empty ($_POST['Buy'])? $_POST['Buy'] : 'No';
  $gift_string =  isset($_POST['Gift']) && !empty ($_POST['Gift'])? $_POST['Gift'] : 'No';
 
//

 $sql = "INSERT INTO searchcriteria (gender, prodcategory, countrydestination, trackingstring, Date, Swap, Buy, Gift)
           VALUES('$gender_search', '$product_category' , '$country_destin',
         '$user_session_temp_name', now(), '$swap_string', '$buy_string', '$gift_string')";
   
 if (!mysqli_query($con, $sql))
  {
  die("Error While uploading image on the server: ".mysql_error()); 
  }  
else{
    header("Location:../category/CategorySearchResult.php?page=0");
    // header("Location:../index.php");
   //echo "1 record added ";
   }   
}
   ?>

