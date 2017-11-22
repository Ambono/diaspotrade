  <?php
include("../config/config.php"); 

$query="select * FROM reviewstbl WHERE Pid = '".$_GET['id']."'";
$result = mysqli_query($connect, $query);
  $reviews = mysqli_fetch_assoc($result);   
 // echo 'Description: '.$reviews['Description'].'<br>';

 $querycount="SELECT count(Rate) AS value_count FROM reviewstbl WHERE Pid = '".$_GET['id']."'";
 $resultcount = mysqli_query($connect, $querycount);
 $rowcount = mysqli_fetch_assoc($resultcount);
 $count = $rowcount['value_count'];

 echo ' Total comments: ';
  echo'' .$count;
echo '<br>';
echo '<br>';	 
$data = array();
while ($row = mysqli_fetch_array($result)) {
  
 echo 'Author: '.$row['Description'].'<br>';
echo ' Comment:'.$row['Comment'].'<br>';
echo'<br>';   
}

$connect->close();	
  
 ?>