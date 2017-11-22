<?php
   include("../config/config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($connect,$_POST['username']);
      $mypassword = mysqli_real_escape_string($connect,$_POST['password']); 
      $password = hash('sha256', $mypassword);
      $sql = "SELECT Id FROM users WHERE Name = '$myusername' and password = '$password'";
      $result = mysqli_query($connect,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();

		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
          $queryvisitors = "insert into sitevisits(visitor_session, Date, usertype, IPs) values(' $_SESSION[login_user]', now(),'registered','$user_ip')";
 $result_sessions = mysqli_query($connect, $queryvisitors);
 
 if(!$result_sessions)
 {
     die;
 }else{
    // echo'row inserted';
 }
 
 
$query_delete_searchtablecontent = "DELETE from shopsearchingtbl where ShopSearcher like '%$_SESSION[login_user]'";

if (mysqli_query($con, $query_delete_searchtablecontent)) {
 
} else {

}

$query_delete_presearch = "DELETE from searchshoppostinsert_preretrieve where username like '%$_SESSION[login_user]'";
   
if (mysqli_query($con, $query_delete_presearch)) {

} else {
 
}

  $query_delete_paginator = "DELETE from paginator where UserName like '%$_SESSION[login_user]'";

    if (mysqli_query($con, $query_delete_paginator)) {
 
} else {  
}

 
         header("location: ../index.php");
      }else {
         echo "Your Login Name or Password is invalid";
      }
   }
?>
