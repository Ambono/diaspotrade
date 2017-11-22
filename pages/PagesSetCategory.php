 <?php 
include("../config/config.php");
ob_start();
if(!isset($_SESSION)){
    session_start();
}
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['login_user'])){  
    $user =   $_SESSION['login_user'];    
 } 
 elseif(isset($_SESSION['token_temp_user'])){
	    $user =$_SESSION['token_temp_user']; 	
	   }  
       $query = "SELECT distinct Id, gender, prodcategory, "
          . "countrydestination, trackingstring, Date, Buy, Swap, Gift from "
          . "searchcriteria where trackingstring = '$user'";
 
$result= mysqli_query($con, $query);
$row_init= mysqli_fetch_assoc($result);
        
     
if(isset($row_init['gender'])){
$searched_gender = $row_init['gender']; 
} 
if(isset($row_init['prodcategory'])){
   $searched_prodcategory = $row_init['prodcategory'];
}
if(isset($row_init['countrydestination'])){
   $searched_countrydestination = $row_init['countrydestination'];
}
if(isset($row_init['Swap'])){
   $swap_status= $row_init['Swap'];
}
if(isset($row_init['Gift'])){
   $gift_status = $row_init['Gift'];
}
if(isset($row_init['Buy'])){
   $buy_status = $row_init['Buy'];
}

 
 
$resultpage = mysqli_query($connect,"SELECT PageToFetch FROM paginator WHERE UserName = '$user' order by Id desc limit 1");     
	$retpageval = mysqli_fetch_array($resultpage);          
           $rec_limit = 7; //number of rows to return          
        $offset = 0;
        $pageclicked =0;		
     $pageclicked = $retpageval[0];  
	 if(!empty($pageclicked)) {            
          $offset = $rec_limit * (int)$pageclicked;
         }else {           
       $offset = 0;
         } 
                
      $resultcount_search  = "SELECT COUNT(Id) as searchtotal from "
          . "searchcriteria where trackingstring = '$user'"; 
      
      $resultQuery = mysqli_query($con, $resultcount_search);
      $retval_search = mysqli_fetch_assoc($resultQuery);
       
         if(!$retval_search ) {
            die('Could not get data: ' . mysqli_error());
         }
     $rec_count_search = $retval_search['searchtotal'];     
      
     
//  $buy_status ='Yes';
//  $gift_status='Yes';
//  $swap_status='Yes';
//  $rec_count_search =1;
  if($rec_count_search!=0)
   {    
  
    if(($buy_status =='Yes')&&($gift_status=='Yes')&&($swap_status=='Yes'))
    {   
      $arr = array('sell','buy','swap');
     if(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None'))       
     { 
//         $searched_gender='Women';
//         $searched_prodcategory ='Shoes';
//         $searched_countrydestination ='Bahrain';
       $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=3
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)"); 
       
      // echo''. $resultcount;
       
       $retval = mysqli_fetch_assoc($resultcount);
           $rec_limit = 7; //number of rows to return
        
         if(!$retval ) {
            die('Could not get data: ' . mysqli_error());
         }
     $rec_count = $retval['total'];
     
    // echo $rec_count;
		 
	 if(isset($_GET['page'] ) ) {	 
            $page = $_GET['page'];		
         }else{		 
		  $page = 0;       
			}			

$num_page= ceil($rec_count/$rec_limit);


 	$sql = "INSERT INTO paginator(UserName, PageToFetch, Date, PageFetched)
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   

   }elseif(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None'))
   {                         
    $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') 
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
   }  
   
  elseif(($row_init['gender']=='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']=='None'))
   {   
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')          
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
   }
   
 elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None'))
   {                         
        
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pc.CountryDestin = '$searched_countrydestination')
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
   }
   
   elseif(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']=='None'))
  {     
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total  FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory') =2
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
}   
 elseif(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None')) {                      
        
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') + (pc.CountryDestin = '$searched_countrydestination')=2
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
   }
  
   elseif(($row_init['gender']=='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None')) {     
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=2
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
   }
elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None')) { 
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user'";
//$result_delete = mysqli_query($connect, $query_delete);
// 
$resultcount= mysqli_query($con,"SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]') 
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
} 
else{;}
}
elseif(($buy_status =='Yes')&&($gift_status=='Yes')&&($swap_status=='No')){
      $arr = array('sell','buy','no');          
    if(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None'))       
     { 
       $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=3
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)"); 
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   

   }elseif(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None'))
   {                         
    $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') 
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
   }  
   
  elseif(($row_init['gender']=='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']=='None'))
   {   
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')          
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
   }
   
 elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None'))
   {                         
        
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pc.CountryDestin = '$searched_countrydestination')
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
   }
   
   elseif(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']=='None'))
  {     
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total  FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory') =2
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
}   
 elseif(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None')) {                      
        
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') + (pc.CountryDestin = '$searched_countrydestination')=2
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
   }
  
   elseif(($row_init['gender']=='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None')) {     
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=2
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
   }
elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None')) { 
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user'";
//$result_delete = mysqli_query($connect, $query_delete);
// 
$resultcount= mysqli_query($con,"SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]') 
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
} 
else{;}
  }
elseif(($buy_status =='No')&&($gift_status=='gift')&&($swap_status=='No'))
   {
       $arr = array('no','gift','no');           
     if(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None'))       
     { 
       $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=3
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)"); 
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   

   }elseif(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None'))
   {                         
    $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') 
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
   }  
   
  elseif(($row_init['gender']=='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']=='None'))
   {   
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')          
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
   }
   
 elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None'))
   {                         
        
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pc.CountryDestin = '$searched_countrydestination')
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
   }
   
   elseif(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']=='None'))
  {     
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total  FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory') =2
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
}   
 elseif(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None')) {                      
        
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') + (pc.CountryDestin = '$searched_countrydestination')=2
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
   }
  
   elseif(($row_init['gender']=='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None')) {     
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=2
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
   }
elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None')) { 

 
$resultcount= mysqli_query($con,"SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]') 
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
//$query_delete = "DELETE from searchcriteria where trackingstring = '$user'";
//$result_delete = mysqli_query($connect, $query_delete);
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
} 
else{;}
   }
elseif(($row_init['Buy'] =='No')&&($row_init['Gift']=='No')&&($row_init['Swap']=='No'))
   {
       $arr = array('no','no','no');       
     if(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None'))       
     { 
       $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=3
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)"); 

   }elseif(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None'))
   {                         
    $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') 
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
   }  
   
  elseif(($row_init['gender']=='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']=='None'))
   {   
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')          
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
   }
   
 elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None'))
   {                         
        
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pc.CountryDestin = '$searched_countrydestination')
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
   }
   
   elseif(($row_init['gender']!='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']=='None'))
  {     
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total  FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') +(c.category ='$searched_prodcategory') =2
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
}   
 elseif(($row_init['gender']!='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']!='None')) {                      
        
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (pd.Gender = '$searched_gender') + (pc.CountryDestin = '$searched_countrydestination')=2
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
   }
  
   elseif(($row_init['gender']=='None') && ($row_init['prodcategory']!='None')
                   && ($row_init['countrydestination']!='None')) {     
 $resultcount= mysqli_query($con, "SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]')
 AND (c.category ='$searched_prodcategory')
            + (pc.CountryDestin = '$searched_countrydestination')=2
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>=0)
    {
     paginate($page,$num_page);
    }  
   
   }
elseif(($row_init['gender']=='None') && ($row_init['prodcategory']=='None')
                   && ($row_init['countrydestination']=='None')) { 
$query_delete = "DELETE from searchcriteria where trackingstring = '$user'";
$result_delete = mysqli_query($connect, $query_delete);
 
$resultcount= mysqli_query($con,"SELECT COUNT(pd.Id) as total FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID 
inner join ownerintention oi  on pd.Id = oi.prodID 
inner join categories c on pd.Id =c.prodID
where oi.Itemintendedfor in ('$arr[0]','$arr[1]','$arr[2]') 
     AND 
     Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)");
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
  for($i= 0;$i<$num_page;++$i)
  { 
      
     if($i==$page)
	{	
	echo "<button id = 'pagebutton'> ".$i."</button>";
	}
	else
	{
            	
	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
  	}
	}
  }
    if($num_page>0)
    {
     paginate($page,$num_page);
    }  
   
} else{;}
}else{;}
}else{;}

// $retval = mysqli_fetch_assoc($resultcount);
//           $rec_limit = 7; //number of rows to return
//        
//         if(! $retval ) {
//            die('Could not get data: ' . mysqli_error());
//         }
//     $rec_count = $retval['total'];              
//		 
//	 if(isset($_GET['page'] ) ) {	 
//            $page = $_GET['page'];		
//         }else{		 
//		  $page = 0;       
//			}			
//
//$num_page= ceil($rec_count/$rec_limit);
//
//
// 	$sql = "INSERT INTO paginator(UserName, PageToFetch, Date, PageFetched)
//   VALUES('$user', '$page', now(), 'No')"; 
//        
// if (!mysqli_query($connect, $sql))
//  {
//  die("Error" ); 
//  }  
//else{
// // echo "comment inserted"; 
//  ;
//    }
//
// function paginate($page,$num_page)
// {
//  for($i= 0;$i<$num_page;++$i)
//  { 
//      
//     if($i==$page)
//	{	
//	echo "<button id = 'pagebutton'> ".$i."</button>";
//	}
//	else
//	{
//            	
//	echo'<a href="../category/CategorySearchResult.php?page='.$i.'"><button id= "pagebutton">'.$i.'</button></a>';  	
//  	}
//	}
//  }
//    if($num_page>=0)
//    {
//     paginate($page,$num_page);
//    }  
//   


  