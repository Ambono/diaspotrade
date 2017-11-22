 <?php
ob_start();
session_start();
if( isset($_SESSION['user'])!="" ){
 header("Location: /komoecontainer/comoeandfoldertree/komoeEng/registration/register.php");
}
 
 if( $_SESSION['login_user']!= null)
   {
   ;
   }

 $currentuser = $_SESSION['login_user'];
include_once '../config/config.php';


if(isset($_POST['btn-addmember'])) {
  
    
    //if(filter_input(INPUT_POST, 'btn-createcommunity')){
 //$uname_ = trim($_POST['uname']);
  $u_name = trim((filter_input(INPUT_POST, 'mname')));
 //$usurname_ = trim($_POST['usurname']);
  $u_surname = trim((filter_input(INPUT_POST, 'msurname')));
 //$email_ = trim($_POST['email']);
 $u_email =trim((filter_input(INPUT_POST, 'memail')));
// echo $email;
 //$communityname_ = trim($_POST['commuityname']);
 $community_name = trim((filter_input(INPUT_POST, 'communityname')));
 
 $uname = strip_tags($u_name);
 $usurname = strip_tags($u_surname);
 $email = strip_tags($u_email);
 $communityname = strip_tags($community_name);

 
// $sql = ("SELECT Id FROM users WHERE Email = '$email' limit 1");
 //$userID_= mysqli_query($con,$sql );
     
 //$resultmemberId_ = mysqli_query($con, "select Id FROM users WHERE Email =  '$email' limit 1");
 
 //$mID = mysqli_fetch_object( $resultmemberId_); 
//$_SESSION['myid'] = $userID->Id;
$//resultmemberId = $mID->Id;
 // check community name e exist or not
 
// $resultcommunitymemberidexist_ = mysqli_query($con, "SELECT communityId FROM communitymembers WHERE memberId='$resultmemberId'");

$resultcommunitymemberidexist_ = mysqli_query($con, "SELECT communityId FROM communitymembers WHERE memberId='$email'");
 
 $cIDexist = mysqli_fetch_object( $resultcommunitymemberidexist_); 
//$_SESSION['myid'] = $userID->Id;
$resultcommunitymemberidexist = $cIDexist->communityId;
 
 $count = mysqli_num_rows($resultcommunitymemberidexist_); // if email not found then proceed
 
 if ($count==0) {
  
  $queryforcommunitymember = "INSERT INTO communitymembers(memberId, communityId, datejoingned) VALUES('$resultmemberId', ' $resultcommunitymemberidexist', Now())";
  $res = mysqli_query($con,  $queryforcommunitymember);  
  if ($res) {
   //$errTyp = "success";
   //$errMSG = "successfully registered your community";
   echo("Successfully added member <br>");
        header('Location: /komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0');

  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
      echo("Something went wrong, try again later...");
  } 
   
 } else {
  $errTyp = "warning";
  $errMSG = "Sorry community already exist already in use ...";
 }
  
}
?>





