<?php
$result = mysqli_query($connect, "select * from productstbl");

$data = array();

while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
    print json_encode($data);
	$conn->close();
?>