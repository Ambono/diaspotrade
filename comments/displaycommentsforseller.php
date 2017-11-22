  <?php
include("../config/config.php"); 

$query_select_name_email = "select Name, Email from seller sl inner join productdetails pd 
  on sl.prodID= pd.Id where pd.Id ='".$_GET['id']."' order by Name, Email";

 $result_select_name_email = mysqli_query($con, $query_select_name_email);
 if($result_select_name_email){
 $row = mysqli_fetch_assoc($result_select_name_email);
  $name = $row['Name'];

   $Email = $row['Email'];
 echo"<br>" ;
$query="select * FROM reviewsseller WHERE SellerName = '$name' and SellerEmail ='$Email'";
$result = mysqli_query($con, $query);
  $reviews = mysqli_fetch_assoc($result);   
 // echo 'Description: '.$reviews['Description'].'<br>';

 $querycount="SELECT count(Mark) AS value_count FROM reviewsseller  WHERE SellerName = '$name'";
 $resultcount = mysqli_query($con, $querycount);
 $rowcount = mysqli_fetch_assoc($resultcount);
 $count = $rowcount['value_count'];

 echo 'Total comments: ';
  echo'' .$count;
echo '<br>';
echo '<br>';	 
$data = array();
while ($row = mysqli_fetch_array($result)) {
  
 echo 'Author: '.$row['Author'].'<br>';
echo ' Comment:'.$row['Comment'].'<br>';
echo'<br>';   
}
 }
$connect->close();	  
 ?>