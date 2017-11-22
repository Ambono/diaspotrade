
 <?php 
 if(!isset($_SESSION)){
    session_start();
}
 include("../config/config.php");
// session_start();
 $_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['token_temp_user'])){  
    $user_session_temp_name =   $_SESSION['token_temp_user'];   
 }
 
  elseif(isset($_SESSION['login_user'])){
	    $user_session_temp_name =$_SESSION['login_user']; 	 
	   }
      
$resultcount = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd 
      WHERE 
    pd.Id in(select prodId from searchshoppostinsert_preretrieve spp 
        where  spp.username like '%$user_session_temp_name')");
     
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



 $sql = "INSERT INTO paginator(UserName, PageToFetch, Date, PageFetched)
   VALUES('$user_session_temp_name', '$page', now(), 'No')"; 
        
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
  for($i= 0;$i<$num_page;++$i)
  { 
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else{
	echo'<a href="../search/ShopSearchResult?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';
  	///echo'<a href="../sellers/SellerSearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';
  	
        }
	}	
}

if($num_page>0)
{
 paginate($page,$num_page);
} 
 
 



