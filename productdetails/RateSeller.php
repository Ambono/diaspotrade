<!DOCTYPE html>
<HTML>
<HEAD>
<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1"> 

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script> 
 
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<TITLE>Komoe register item</TITLE>
        
 
<style>
td{
padding: 15px;
}
table{
border: silver solid 2px;
}
</style>
</HEAD>
<BODY>
<div class="container">
 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Komoe</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/productdetails/Product.php">Register item</a></li>
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/deals/Deals.php">Deals</a></li>
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php">Buy</a></li>
      <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">Sell</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/Gifts.php">Gifts</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li> 
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php">Sign in</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>  	  
    </ul>
  </div>
</nav>
 <div class="jumbotron">
  
  </div>
   
<?php
//include("../session/sessionmanager.php") ;  
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "komoe1";
// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
$conn = mysqli_connect($servername, $username, $password, $dbname);
$con = mysqli_connect($servername, $username, $password, $dbname); 
?> 

<div class="col-md-10">
<div align ="center">

    <form action ="/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/insertcommentforseller.php" method ="post" enctype="multipart/form-data">
  <br>
  <table>  
	  <tr class="info">
        <td>Author</td>
        <td><input type="text" name="author"/></td>	       	
      </tr>	 	 
      <tr>
      <br>
      <td>Comment</td>
     <td><textarea cols="40" row="100" name="customerNote" id="customerNote"></textarea></td>  
     <br>
      </tr>
      <tr> <td>
     </td></tr>
     <tr>
    <td> <p>Your mark</p>  </td>
<td>
1<input type="radio" name="sellerMark" id ="sellerMark" value="1"> <br>
2<input type="radio" name="sellerMark" id ="sellerMark" value="2"> <br>
3<input type="radio" name="sellerMark" id ="sellerMark" value="3"> <br>
4<input type="radio" name="sellerMark" id ="sellerMark" value="4"> <br>
5<input type="radio" name="sellerMark" id ="sellerMark" value="5"> <br>
   </td>  
     </tr>
      </table>
     <br>

<p><input type ="hidden" name ="hiddenforid" value = "<?php echo" ".$_GET['id']." ";?>" > </p>
<p><input type ="submit" value = "Add your comment"></p>
</form>

<?php
// Set session variables
$_SESSION["theid"] = $_GET['id'];
?>
</div>
  <br><br>
  
  <footer class ="col-md-12 text-center">   
  <span>&copy Komoe 2016</span>  
  </footer>
  </div>
</div>

</BODY>
</HTML>