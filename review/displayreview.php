<?php
include("../config/config.php");
?>
 
 <?php
 $query="SELECT SUM(Rate) AS value_sum FROM reviewstbl WHERE Pid = '".$_GET['id']."'";
 $result = mysqli_query($connect, $query);
 $row = mysqli_fetch_assoc($result);
 $sum = $row['value_sum'];
 //echo'The sum of rates = '.$sum.'<br>'; 
 $querycount="SELECT count(Rate) AS value_count FROM reviewstbl WHERE Pid = '".$_GET['id']."'";
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
 ?>
