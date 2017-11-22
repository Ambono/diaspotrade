 <?php
   ob_start();
   session_start();
?>
 <!DOCTYPE html>
<HTML>
<HEAD>
 <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>  
 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<TITLE>Komoe home</TITLE>
<style>

footer {
background-color: silver;
margin:0 0 10px 0;
border-radius: 2px;
padding:10px;
}
.jumbotron {
background-color: #33D7FF;
height: 300px;
}

.imgclass
{
width: auto;
height: 225px;
max-height: 225px;
}

.colimg{
width: 100%;
height: 100%;
}

</style>

</HEAD>
<BODY>
<div class="container"> 

	
<nav class="navbar navbar-default">
<div class="row">
    <div class="col-md-10">
	
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Komoe</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>
	   <!--<li><a href="Product.php">Register item</a></li> -->
      
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php">Buy</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">List item</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li> 
     <!-- <li><a href="SignIn.php">Sign in</a></li>-->
             
    </ul>
	<ul class="nav navbar-nav navbar-right">     
            <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li> 
            <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/emails/sendText.php">send text</a></li> 
    </ul>
  </div>

</div>
    <div class="col-md-2">	
	<!--<p> hello <?php include("../session/sessionloginuser.php") ?>. Welcome back to komoe!</p>-->
	</div>
</div>
</nav>

<div class= "row">
 <div class="jumbotron">
  	 <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/carjag3.JPG" class="imgclass"/>
    </div>

    <div class="item">
   <img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/cuisine1.JPG" class="imgclass"/>
    </div>

    <div class="item">
      <img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/beltac.JPG" class="imgclass"/>
    </div>

    <div class="item">
    <img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/buggyac.JPG" class="imgclass"/>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    
  </div>

</div>
      
        <div class="container">        
		  
		  
      <style>
	  .clspacer{
margin: 0 0 0 10px;
background-color: #ADD8E6;
padding: 4px;
border-radius: 5px;
}

	  .rwspacer{
margin: 15px 0 15px 0;
background-color: silver;
padding: 4px;
}

.sidenav{
 background-color:white;
 border:solid #ADD8E6; 
 border-radius: 5px;
 }
</style>	  
<div class="row">
    <div class="col-xs-2 ">
	
	<div class="row">
   <ul class="nav nav-pills nav-stacked rwspacer sidenav">     
	   <!--<li><a href="Product.php">Register item</a></li> -->
           <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/swap/swaps.php">swaps</a></li>
           <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/gift.php">give aways</a></li>
           <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/deals/Deals.php">Hot Deals</a></li>
	 <!-- <li><a href="Gifts.php">Gifts</a></li> -->	     
    </ul>	
	  <p></p>	  
	</div>	
	
		<div class="row nav nav-pills nav-stacked rwspacer" style="border-radius: 5px;">	
                    <p><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php" >Register </a></p>
                    <p><a href="/komoecontainer/comoeandfoldertree/komoeEng/community/Comunity.php" >Build a community</a></p>
                    <p><a href="/komoecontainer/comoeandfoldertree/komoeEng/community/addmembertocommunity.php" >Add member</a></p>
	   </div>	
    </div>

	 <div class="col-md-4 col-md-offset-2">
	   <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="uname" class="form-control" placeholder="Enter member Username" required />
                </div>
            </div>
			
			 <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="usurname" class="form-control" placeholder="Enter member Surname" required />
                </div>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="email" class="form-control" placeholder="Enter member Email" required />
                </div>
            </div>
			
			 <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="email" class="form-control" placeholder="Enter Name for your community" required />
                </div>
            </div>
			
			 <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="email" class="form-control" placeholder="Enter description for your community" required />
                </div>
            </div>
            
            
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">invite member</button>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
        
</div>		  
</div>
  <br> 
   <footer class="col-md-12  text-center text-info" >  
      <span>&copy Komoe 2016</span>  
      </footer>
</div>    	 
      
</BODY>
</HTML>