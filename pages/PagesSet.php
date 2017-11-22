 <?php 
 include("../config/config.php");
 
 $_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['token_temp_user'])){  
    $user_session_temp_name =   $_SESSION['token_temp_user'];    
 }
 
  elseif(isset($_SESSION['login_user'])){
	    $user_session_temp_name =$_SESSION['login_user']; 	 
	   }
      
     
    
$resultcount = mysqli_query($connect,"SELECT COUNT(Id) as total FROM productdetails pd 
 where Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY) 
 AND pd.Id in (select oi.prodID from ownerintention oi where oi.Itemintendedfor like'%sell%')  
");
      
    
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
     
     
 