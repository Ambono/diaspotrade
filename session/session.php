<?php
   include('../session/config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($connect,"select Name from users where Name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
  // $login_session = $row['Name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php");
   }
?>