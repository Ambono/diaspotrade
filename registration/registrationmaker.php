 <?php
ob_start();
session_start();
if( isset($_SESSION['user'])!="" ){
 header("Location: /komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php");
}
include_once '../config/config.php';

if(isset($_POST['btn-signup'])) {
  
 $uname = trim($_POST['uname']);
 $usurname = trim($_POST['usurname']);
 $email = trim($_POST['email']);
 $upass = trim($_POST['pass']);
 
 $uname = strip_tags($uname);
 $usurname = strip_tags($usurname);
 $email = strip_tags($email);
 $upass = strip_tags($upass);
 
 // password encrypt using SHA256();
 $password = hash('sha256', $upass);
 
 // check email exist or not
 
 $result = mysqli_query($connect, "SELECT Email FROM users WHERE Email='$email'");
 
 $count = mysqli_num_rows($result); // if email not found then proceed
 
 if ($count==0) {
  
  $query = "INSERT INTO users(Name, Surname, Password, Email) VALUES('$uname', '$usurname', '$password','$email')";
  $res = mysqli_query($connect, $query);
  
  if ($res) {
   $errTyp = "success";
   $errMSG = "successfully registered, you may login now";
    header("Location: /komoecontainer/comoeandfoldertree/komoeEng/loginlogout/Signin.php");
  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..."; 
  } 
   
 } else {
  $errTyp = "warning";
  $errMSG = "Sorry Email already in use ...";
 }
 
}
?>