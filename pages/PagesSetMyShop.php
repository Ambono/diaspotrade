
 <?php 
 include("../config/config.php");
  if(!isset($_SESSION)){
    session_start();
}
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['login_user'])){  
    $user =   $_SESSION['login_user'];
    // echo  $user;
 } 
 elseif(isset($_SESSION['token_temp_user'])){
	    $user =$_SESSION['token_temp_user']; 
	 //echo  $user;
	   }
$resultcount = mysqli_query($connect,"SELECT pd.Id as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID
 where Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY) 
 AND   pd.Id in(SELECT distinct prodID FROM shopitems s WHERE s.inserterID = '$user' )");

 $retval = mysqli_fetch_assoc($resultcount);
           $rec_limit = 7; //number of rows to return
        
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
   VALUES('$user', '$page', now(), 'No')"; 
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
	echo'<a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';
  	}
	}	
}

if($num_page>0)
{
 paginate($page,$num_page);
} 

