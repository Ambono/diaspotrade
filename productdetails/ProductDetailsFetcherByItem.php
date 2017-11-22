<?php 
include("../config/config.php");
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['login_user'])){  
    $user_session_temp_name =   $_SESSION['login_user'];
 }
 
 elseif(isset($_SESSION['token_temp_user'])){
	    $user_session_temp_name =$_SESSION['token_temp_user']; 	
	   }
       
	$resultpage = mysqli_query($connect,"SELECT PageToFetch FROM paginator WHERE UserName like '%$user_session_temp_name' order by Id desc limit 1");     
	 $retpageval = mysqli_fetch_assoc($resultpage);
          
           $rec_limit = 7; //number of rows to return
          
        $offset = 0;
        $pageclicked =0;
		
     $pageclicked = $retpageval['PageToFetch'];  

	 if(!empty($pageclicked)) {
          
             $offset = $rec_limit * (int)$pageclicked;
             }else {           
       $offset = 0;
         } 
 $searchedItem = mysqli_query($con, " SELECT searchedterm FROM searchingitemstbl 
WHERE searcher  like '%$user_session_temp_name' order by Id desc limit 1");
   $search_result_s = mysqli_fetch_assoc($searchedItem);
        $search_result = $search_result_s ['searchedterm'];

   
$result_search_item = mysqli_query($con,"SELECT distinct Id FROM productdetails pd 
        WHERE pd.Description LIKE '%$search_result%' OR pd.Name like '%$search_result%'
    AND
 Availuntil >= DATE_SUB(now(), INTERVAL 110 DAY) LIMIT $offset, $rec_limit");

while ($search = mysqli_fetch_array($result_search_item)) {
    $insert_searchId = mysqli_query($con,
            "insert into searchpostinsert_preretrieve (prodId, username)  
            values('$search[Id]', '$user_session_temp_name')" );
}


$result = mysqli_query($con,"SELECT distinct * FROM productdetails pd 
    inner join prodcountries c on pd.Id = c.prodID 
      WHERE 
    pd.Id in(select prodId from searchpostinsert_preretrieve spp 
        where  spp.username like '%$user_session_temp_name')");

$data = array();
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;  
}
print json_encode($data);

$query_delete_searchtablecontent = "DELETE from searchingitemstbl where searcher like '%$user_session_temp_name'";

if (mysqli_query($con, $query_delete_searchtablecontent)) {
 
} else {

}

$query_delete_presearch = "DELETE from searchpostinsert_preretrieve where username like '%$user_session_temp_name'";
   
if (mysqli_query($con, $query_delete_presearch)) {
 
} else {
   
}

  $query_delete_paginator = "DELETE from paginator where UserName like '%$user_session_temp_name'";

    if (mysqli_query($con, $query_delete_paginator)) {
 
} else {  
}

$connect->close();	
?>
