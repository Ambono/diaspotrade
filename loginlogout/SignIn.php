<!DOCTYPE html>
<HTML>
<HEAD>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/komoecontainer/comoeandfoldertree/komoeEng/css/mystylesheet.css">
<TITLE>Komoe sign in</TITLE>

</HEAD>
<BODY>
<div class="">
 
  <div class="container col-md-12"> 
      
     <div class="row">   
<nav class="navbar navbar-inverse navbar-static-top navbar navbar-default" role="navigation" style ="border-radius: 5px; background-color:#003333; padding-right:4px">

        <div class="navbar-header">
     
      <a class="navbar-brand" href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Komoe</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
         
      <div class="collapse navbar-collapse" >
       
    <ul class="nav navbar-nav">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>     
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0">Buy</a></li>
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/swap/swaps.php?page=0">Swaps</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/gift.php?page=0">Gift</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">List item</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li>             
       </ul>
          
        <ul class="nav navbar-nav navbar-right  ">
        <li class="active" ><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>	
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>
        <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0">My page</a></li>
       </ul>   
         
      </div>  
      </nav>        
</div>
    
    
 <div class="jumbotron">
    <h1>Hello.Please sign in here.</h1>   
  </div>

  
	  
<div class="container">
 <div id="login-form">
     <form action = "/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/loginmaker.php" method = "post"autocomplete="off">
    
     <div class="col-md-4 col-md-offset-3">
        
         <div class="form-group">
             <hr />
            </div>
            
              <?php
   if ( isset($errMSG) ) {    
                ?>
    <div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
            <?php } ?>
         
         
          	
		<div class="form-group">						
            <p><a href ="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php">Sign up a new account</a></p>
		</div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="username" class="form-control" placeholder="Enter Username" required />
                </div>
            </div>
			
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" name="password" class="form-control" placeholder="Enter Password" required />
                </div>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Log in</button>
            </div>
            
            <div class="form-group">
             <hr />
            </div>            
     </div>  
        </div>   
    </form>
    </div> 
</div> 
  </div>

</BODY>
<footer class=" col-md-12 siteFooter" style="background-color: #003333">  
  <span>&copy Komoe 2016</span>  
  </footer>
</HTML>