<!DOCTYPE html>
<HTML>
<HEAD>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script> 
 
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<TITLE>Komoe register item</TITLE>
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
      <a class="navbar-brand" href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Komoe</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>
      <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/productdetails/Product.php">Register item</a></li>
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/deals/Deals.php">Deals</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">Sell</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/Gifts.php">Gifts</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li> 
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php">Sign in</a></li> 	  
    </ul>
  </div>
</nav>
 <div class="jumbotron">
    <h1>Hello on register item page!</h1>
    <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile-first projects on the web.</p>
  </div>
<div ng-app="myappInsert">    

<form action="insertNoangular.php" method="POST" enctype="multipart/form-data">     
     <table class="table">
	 <tr class="info">
        <td>Enter Description:</td>
        <td><input type="text" name="desc"/></td>       
      </tr>
      <tr class="info">
        <td>Enter Size:</td>
        <td><input type="text" name="size"/></td>       
      </tr>
	   <tr class="danger">
        <td>Enter Colour:</td>
        <td><input type="text" name="colour"/></td>       
      </tr>
      <tr class="info">
        <td>Enter Gender:</td>
        <td><input type="text" name="gender"/></td>       
      </tr>
	  <tr class="success">
        <td>Enter prod condition:</td>
        <td><input type="text" name="prodcond"/></td>       
      </tr>	
      <tr class="info">
        <td>Image upload:</td>
        <td><input type="file" name="myimage"/></td>		
      </tr>		  
	   <tr class="success">
        <td></td>
        <td><input type="submit" name="btnInsert" value="Add" /></td>       
      </tr> 	  
  </table>
</form>

</div>
	   <footer>  
  <span>&copy Komoe 2016</span>  
  </footer>
</BODY>
</HTML>