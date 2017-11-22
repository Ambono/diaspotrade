<?php
if( isset($_SESSION['login_user']))
   {
echo $_SESSION['login_user'] ;
   }else{
     echo' dear';
   }
?>