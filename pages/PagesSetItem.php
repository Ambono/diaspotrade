
 <?php 
 include("../config/config.php");
 
 $_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['token_temp_user'])){  
    $user_session_temp_name =   $_SESSION['token_temp_user'];   
 }
 
  elseif(isset($_SESSION['login_user'])){
	    $user_session_temp_name =$_SESSION['login_user']; 	 
	   }
            
                        
	 if(isset($_GET['page'] ) ) {	 
            $page = $_GET['page'];		
         }else{		 
		  $page = 0;       
			}			




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
           
$resultcount_search = mysqli_query($connect,"SELECT COUNT(Id) as searchtotal FROM searchingitemstbl where searcher like '%$user_session_temp_name'");

 $retval_search = mysqli_fetch_assoc($resultcount_search);
          
        
         if(!$retval_search ) {
            die('Could not get data: ' . mysqli_error());
         }
     $rec_count_search = $retval_search['searchtotal'];     
      
     if($rec_count_search!=0)
     {
   $searchedItem = mysqli_query($con, " SELECT searchedterm FROM searchingitemstbl 
WHERE searcher  like '%$user_session_temp_name' order by Id desc limit 1");
   $search_result_s = mysqli_fetch_assoc($searchedItem);
        $search_result = $search_result_s ['searchedterm'];
   
$resultcount = mysqli_query($con,"SELECT COUNT(Id) as total FROM productdetails pd  
   WHERE pd.Description like '%$search_result%'  AND
 Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
     
  
     
 $retval = mysqli_fetch_assoc($resultcount);
           $rec_limit = 7; //number of rows to return
        
         if(! $retval ) {
            die('Could not get data: ' . mysqli_error());
         }
         else{
     $rec_count = $retval['total'];              
         } 
         
$num_page= ceil($rec_count/$rec_limit);
         
     
       
//echo 'search term was not reached '.$search_result_s ['searchedterm'];
     //echo'result count was not calculated '.$resultcount;

 function paginate($page,$num_page)
 {
  for($i= 0;$i<$num_page;++$i)
  { 
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else{
	echo'<a href="../search/ItemSearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';
  	///echo'<a href="../sellers/SellerSearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';
  	
        }
	}	
}

if($num_page>=0)
{
 paginate($page,$num_page);
} 

     }   


