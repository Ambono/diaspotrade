 <?php
include("../session/sessionmanager.php") ;
include("../config/config.php")   
?> 
<?php
$page= $_GET['page'];
	 $arr = explode("#", $page, 2);
     $page= $arr[0];
	 echo $page; 
	 ?>