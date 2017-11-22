<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

 <script src="https://code.angularjs.org/1.5.6/angular.js"></script>

  <script src="https://code.angularjs.org/1.5.6/angular-route.js"></script>
  
  <script type="text/javascript" src="script/script.js"></script>

</head>
<body>
 <?php 
 if( $_SESSION['login_user']!= null)
   {
   ;
   }
?>
<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "komoe1";
// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
$conn = mysqli_connect($servername, $username, $password, $dbname);
$con = mysqli_connect($servername, $username, $password, $dbname);

   
 $currentuser = $_SESSION['login_user'];
$resultcount = mysqli_query($connect,"SELECT COUNT(Id) FROM productdetails where Availuntil >= DATE_SUB(now(), INTERVAL 10 DAY)");
 $retval = mysqli_fetch_array($resultcount);
           $rec_limit = 5; //number of rows to return
          
         if(! $retval ) {
            die('Could not get data: ' . mysqli_error());
         }
     $rec_count = $retval[0];              
		 
	 if( isset($_GET['page'] ) ) {	 
            $page = $_GET['page'];		
         }else{		 
		  $page = 0;       
			}			

$num_page= ceil($rec_count/$rec_limit);

 	$sql = "INSERT INTO Paginator(UserName, PageToFetch, Date, PageFetched)
   VALUES('$currentuser', '$page', now(), 'No')"; 
   if (!mysqli_query($connect, $sql))
  {
  die("Error" ); 
  }  
else{
  // echo "comment inserted"; 
  ;
    }

 function paginate($page,$num_page)
 {
  for($i= 0;$i<=$num_page;++$i)
  { 
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{	
	echo'<a href="/komoecontainer/comoeandfoldertree/komoeEng/komoeEng/deals/Deals.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';
  	}
	}	
}

if($num_page>0)
{
 paginate($page,$num_page);
} 
?>
</body>
</html>