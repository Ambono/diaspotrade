
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
$resultcount = mysqli_query($connect,"SELECT COUNT(Id) as total FROM productdetails where Availuntil <= DATE_SUB(now(), INTERVAL 60 DAY)");

 $retval = mysqli_fetch_assoc($resultcount);
           $rec_limit = 10; //number of rows to return
        
         if(! $retval ) {
            die('Could not get data: ' . mysqli_error());
         }
     $rec_count = $retval['total'];              
		 
	 if(isset($_GET['page'] ) ) {	 
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
	echo'<a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/SellerSearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';
  	}
        
	}	
}

if($num_page>0)
{
 paginate($page,$num_page);
} 


