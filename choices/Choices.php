 <?php
include("../session/sessionmanager.php") ;  
?> 
 <!DOCTYPE html>
<HTML>
<HEAD>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<TITLE>Komoe welcome</TITLE>
<style>

footer {
background-color: silver
}
jumbotron {
background-color: #33D7FF
}
</style>
</HEAD>
<BODY>
<div class="container">
 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Komoe</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/productdetails/Product.php">Register item</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/deals/Deals.php">Deals</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">Sell</a></li> 	  
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php">Buy</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/Gifts.php">Gifts</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php">Sign in</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/choices/Choices.php">Log out</a></li>  
    </ul>
  </div>
</nav>

 <div class="jumbotron">
    <h1>hello <?php include("../session/sessionloginuser.php") ?>. <br>Welcome on deals page!</h1>
<p>What deal suit you from somebody going back from holiday?</p>	
<p>La valise du vacancier</p>	
  </div> 

<br> 
<p><div><?php include("../session/sessionloginuser.php") ?></div>	</p>

<?php 
include("../config/config.php");

$result = mysqli_query($connect, "select * FROM productdetails ORDER BY `Id` DESC");

echo "<table border='0' cellpadding='0' cellspacing='0' class='table-fill'> 
<tr>
<th width='250px' position='fixed'>Id</th> 
<th width='150px'>Description</th>
<th width='100px'>Size</th>
<th>Colour</th>
<th>Gender</th>
<th width='250px' position='fixed'>Prod cond</th> 
<th width='150px'>Prod image</th>
<th width='100px'>Origine</th>
<th>Destination</th>
<th>City dest</th>
<th width='100px'>Availafrom </th>
<th>Available until</th>
<th>Price</th>
<th>view details</th>
</tr>";


while($row = mysqli_fetch_array($result) ) {
echo "<tr>";
echo "<td>" . $row['Id'] . "</td>";
echo "<td>" . $row['Description'] . "</td>";
echo "<td>" . $row['Size'] . "</td>";
echo "<td>" . $row['Colour'] . "</td>";
echo "<td>" . $row['Gender'] . "</td>";
echo "<td>" . $row['ProdCondition'] . "</td>";
echo "<td>" . $row['ProdImage'] . "</td>";
//echo "<td>" .<img src = "http://localhost:81/workspace/komoe/images/{{product.ProdImage}}.JPG" width="50px" height="40px"/>."</td>"	
echo "<td>" . $row['CountryOrig'] . "</td>";
echo "<td>" . $row['CountryDestin'] . "</td>";
echo "<td>" . $row['CityDestin'] . "</td>";
echo "<td>" . $row['Availfrom'] . "</td>";
echo "<td>" . $row['Availuntil'] . "</td>";
echo "<td>" . $row['Price'] . "</td>";

echo "<td><a href='/komoecontainer/comoeandfoldertree/komoeEng/choices/Choicedetails.php?id=".$row['Id']."'>View product details</td>";
echo "</tr>";
echo "</table >";
}

?>

<br><br>
<div>
<input type="button" value="send">
</div>

 <footer>  
  <span>&copy Komoe 2016</span>  
  </footer>
</div>

</BODY>
</HTML>