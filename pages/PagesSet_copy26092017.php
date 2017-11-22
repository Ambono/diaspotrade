 <?php 
 include("../config/config.php");
 
 $_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['token_temp_user'])){  
    $user_session_temp_name =   $_SESSION['token_temp_user'];    
 }
 
  elseif(isset($_SESSION['login_user'])){
	    $user_session_temp_name =$_SESSION['login_user']; 	 
	   }
           
           
$resultcount_search = mysqli_query($connect,"SELECT COUNT(Id) as searchtotal FROM searchcriteria where trackingstring ='$user_session_temp_name'");

$retval_search = mysqli_fetch_assoc($resultcount_search);
          
        
         if(!$retval_search ) {
            die('Could not get data: ' . mysqli_error());
         }
     $rec_count_search = $retval_search['searchtotal'];     
      

     
     if($rec_count_search!=0)
     {
   $searched_terms = mysqli_query($connect,"SELECT  distinct gender, prodcategory, countrydestination from searchcriteria where trackingstring = '$user_session_temp_name'");

  $row_init = mysqli_fetch_assoc($searched_terms);
 
   $searched_gender = $row_init['gender'];  
   $searched_prodcategory = $row_init['prodcategory'];
   $searched_countrydestination = $row_init['countrydestination'];
   
    $resultcount = mysqli_query($con, "SELECT COUNT(Id) as total FROM productdetails pd 
         WHERE (Gender = '$searched_gender') + (productcategory ='$searched_prodcategory')
            + (CountryDestin='$searched_countrydestination')> 0       
     AND  Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
     }else{
           
    $resultcount  = mysqli_query($connect,"SELECT COUNT(Id) as total FROM productdetails where Availuntil >= DATE_SUB(now(), INTERVAL 60 DAY)");
     }
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

/*
  if(isset($_SESSION['token_temp_user'])){
  
    $user_session_temp_name =   $_SESSION['token_temp_user'];
    if(isset($_SESSION['login_user'])){
	    $user_session_temp_name =$_SESSION['login_user']; 
	   echo  $user_session_temp_name;
	   }
  }
  
  if(isset($_SESSION['login_user'])){
	    $user_session_temp_name =$_SESSION['login_user']; 
  }
    */       
//$user_session_temp_name .='PageSet';

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
	else
	{
            	
	echo'<a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';
  	
	//echo'<a href="../buys/Buy.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';
  	}
	}	
}

if($num_page>0)
{
 paginate($page,$num_page);
} 
 
 