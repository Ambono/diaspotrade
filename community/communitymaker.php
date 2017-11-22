 <?php
ob_start();
session_start();
if( isset($_SESSION['user'])!="" ){
 header("Location: /komoecontainer/comoeandfoldertree/komoeEng/registration/register.php");
}
 
 if( $_SESSION['login_user']!= null)
   {

   }
    $currentuser = $_SESSION['login_user'];
echo($currentuser);
include_once '../config/config.php';


if(isset($_POST['btn-createcommunity'])) {
  

//if(filter_input(INPUT_POST, 'btn-createcommunity')){
 //$uname_ = trim($_POST['uname']);
  $u_name = trim((filter_input(INPUT_POST, 'uname')));
 //$usurname_ = trim($_POST['usurname']);
  $u_surname = trim((filter_input(INPUT_POST, 'usurname')));
 //$email_ = trim($_POST['email']);
 $u_email =trim((filter_input(INPUT_POST, 'email')));
// echo $email;
 //$communityname_ = trim($_POST['commuityname']);
 $community_name = trim((filter_input(INPUT_POST, 'communityname')));
 //$communitydescription_ = trim($_POST['communitydescription']);
  $community_description = trim((filter_input(INPUT_POST, 'communitydescription')));
  
 $uname = strip_tags($u_name);
 $usurname = strip_tags($u_surname);
 $email = strip_tags($u_email);
 $communityname = strip_tags($community_name);
 $communitydescription = strip_tags($community_description);
 $sql = ("SELECT Id FROM users WHERE Email = '$email' limit 1");
 $userID_= mysqli_query($con,$sql );
 
 //$userID->userID;
 
 //echo('userID');
// $row = 
$userID = mysqli_fetch_object($userID_); 
//$_SESSION['myid'] = $userID->Id;
$theuserID = $userID->Id;
//($userID);
 //$result->fetch_object()->userID;
echo($_SESSION['myid']);
echo("$email<br>");
echo("$theuserID<br>");
 //echo'$resultIdexist';
 // check community name e exist or not
 
 $result = mysqli_query($con, "SELECT Name FROM communitytbl WHERE Name= '$communityname' ");
 
 $count = mysqli_num_rows($result); // if email not found then proceed
 
 if ($count==0) {
  
  $queryforcommunity = "INSERT INTO communitytbl(Name, Description, Datecreated) VALUES('$communityname', '$communitydescription', Now())";
  $res = mysqli_query($con, $queryforcommunity); 
  echo("Community  registered<br>");
  $communityjustcreatedid = mysqli_insert_id($con); 
  echo( $communityjustcreatedid); 
  echo( "<br>");   
  if ($res) {
   //$errTyp = "success";
   //$errMSG = "successfully registered your community";
     $sqlforcommunityownership = "INSERT INTO communityownership(ownerId, communityId)
  VALUES('$theuserID', '$communityjustcreatedid')";
     $rescommunityownership = mysqli_query($con, $sqlforcommunityownership); 
     if(   $rescommunityownership){
     echo("Communityownership is registered<br>");
     header('Location: /komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0');
     
  }
  }else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..."; 
  } 
   
 } else {
  $errTyp = "warning";
  $errMSG = "Sorry community already exist already in use ...";
 }
  
} else {
    echo("Community not registered");
}




