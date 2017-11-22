  <?php  
   include("../config/config.php");
   
  session_start();
  if(isset($_SESSION['token_temp_user'])){
  
    $user_session_temp_name =   $_SESSION['token_temp_user']; 
 }
 
  elseif(isset($_SESSION['login_user'])){
	    $user_session_temp_name =$_SESSION['login_user']; 	
	   }
 
if(isset($_POST['viewselected'])){
$gender_search = isset($_POST['gender_search'])&& !empty ($_POST['gender_search']) ? $_POST['gender_search'] : '';
$product_category = isset($_POST['product_category'])&& !empty ($_POST['product_category'])? $_POST['product_category'] : '';
$country_destin = isset($_POST['country_destin']) && !empty ($_POST['country_destin'])? $_POST['country_destin'] : '';
 $tracking_string =  isset($_POST['searchtrackingstring']) && !empty ($_POST['searchtrackingstring'])? $_POST['searchtrackingstring'] : '';     
 
 $query_delete = "DELETE from searchcriteria where trackingstring = '$user_session_temp_name'";
$result = mysqli_query($connect, $query_delete);

 $sql = "INSERT INTO searchcriteria (gender, prodcategory, countrydestination, trackingstring, Date)
           VALUES('$gender_search', '$product_category' , '$country_destin', '$user_session_temp_name', now())";
   
 if (!mysqli_query($con, $sql))
  {
  die("Error While uploading image on the server: ".mysql_error()); 
  }  
else{
    header("Location:../buys/Buy.php?page=0");
    // header("Location:../index.php");
   echo "1 record added ";
   }   
}
   ?>

