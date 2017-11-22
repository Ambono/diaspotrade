<?php
include("../config/config.php");
$query_select_name_email = "select Name, Email from seller sl inner join productdetails pd 
  on sl.prodID = pd.Id where pd.Id ='".$_GET['id']."' order by Name, Email";

 $result_select_name_email = mysqli_query($con, $query_select_name_email);
 if($result_select_name_email){
 $row = mysqli_fetch_assoc($result_select_name_email);
  $name = $row['Name']; 
   $Email = $row['Email'];
   echo"<br>" ; 
 
 $query="SELECT SUM(Mark) AS value_sum FROM reviewsseller WHERE SellerEmail= '$Email'";
 $result = mysqli_query($connect, $query);
 $row = mysqli_fetch_assoc($result);
 $sum = $row['value_sum'];
 //echo'The sum of rates = '.$sum.'<br>'; 
 $querycount="SELECT count(Mark) AS value_count FROM reviewsseller WHERE SellerEmail= '$Email'";
 $resultcount = mysqli_query($connect, $querycount);
 $rowcount = mysqli_fetch_assoc($resultcount);
 $count = $rowcount['value_count'];
 echo'' .$count;
 echo' ratings';
 echo'</br>';
 if($count!=0)
 {
 	$averagerate = $sum/$count;
 }
 else {
 	$averagerate = 0;
 }
 //echo'the average rate = '.$averagerate.'<br>';
 
 $numberoftimes = 1; 
echo'current rate: ';
while($numberoftimes <= round($averagerate)) {
    echo' <img src="http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/picga/ratingstarsingle.gif" width="30" height="30"/>';
    $numberoftimes++;
}
    $difference = 5-round($averagerate); 
    $sentinelle =1;
if($averagerate>1 &&($difference>0))
{
	
while($sentinelle <= $difference) {
    echo' <img src="http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/picga/ratingstarunfilled.gif" width="30" height="30"/>';
    $sentinelle++;	
      }  
}
else if($averagerate<=1 || $difference<=0)
{
while($sentinelle <= 5) {
    echo' <img src="http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/picga/ratingstarunfilled.gif" width="30" height="30"/>';
    $sentinelle++;	
      }

echo'<br>'	;  
}
 }
 else
 {
  $numberoftimes = 1; 
echo'current rate: ';
while($numberoftimes <= 5) {
    echo' <img src="http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/picga/ratingstarunfilled.gif" width="30" height="30"/>';
    $numberoftimes++;
}
echo'<br>'	;   
     
 }
 
 ?>
