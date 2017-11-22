<?php
   ob_start();
   session_start();
   if( $_SESSION['login_user']== null)
   {
   	header("location: /komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php");
   }
?> 