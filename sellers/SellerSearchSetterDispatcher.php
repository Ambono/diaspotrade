<?php
	$count =0;
	
	if(isset($_GET['page']))
{
	include('../sellers/SellerSearchSetter.php');
}
else if(isset($_GET['id']))
{
	include('../sellers/SellerSearchSetterNoDelete.php');
	$count++;
}

if(isset($_GET['id']) && ($count>1))
{
	include('../sellers/SellerSearchSetter.php');
  $count=0;	
}
	?>
	