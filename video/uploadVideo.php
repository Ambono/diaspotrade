<?php
include("../session/sessionmanager.php") ; 
?> 
<!DOCTYPE html>
<HTML>
<HEAD>
<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1"> 

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script> 
 
<link rel="stylesheet" href="/komoecontainer/comoeandfoldertree/komoeEng/css/mystylesheet.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/countries.js"></script>
  <script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/categories.js"></script>
 <script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/gendergroup.js"></script>
 <script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/currency.js"></script>
<TITLE>Komoe register item</TITLE>
 
  <script>
  $( function() {
    $( "#datepickeravailfrom" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#datepickeravailto" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>

</HEAD>
<BODY>
<div class="col-md-12 container">
 <div class="row"> 
<nav class="navbar navbar-inverse navbar-static-top navbar navbar-default" role="navigation" style ="border-radius: 5px; background-color:#003333; padding-right:4px">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
         
      <div class="collapse navbar-collapse" >
     
     <div class="navbar-header">
      <a class="navbar-brand" href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Komoe</a>
     </div>          
    <ul class="nav navbar-nav clearleft">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>     
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0">Buy</a></li>
        <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/swap/swaps.php?page=0">Swaps</a></li>
      <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">List item</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li>             
    </ul>
 
    <ul class="nav navbar-nav navbar-right clearleft"> 
         <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>	
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>
    <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0">My page</a></li>
         
      </ul>   
            
      </div>  
      </nav>        
</div>
 
 
 <form action="/komoecontainer/comoeandfoldertree/komoeEng/video/videos.php" method="POST" enctype="multipart/form-data">
    
 <div class="col-md-6 col-md-offset-3">
 
	  
	        <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-picture">First Optional Image:</span></span>
             <input type="file" name="myvideo" class="form-control" placeholder="my video:" />
                </div>
            </div>
      
            <div class="form-group">
             <hr />
            </div>
				  
           <div class="form-group">
             <button type="submit" class="btn btn-success" name="btnInsert">Add</button>
            </div>
	    <div class="form-group">
             <hr />
            </div>
         </div>
          </form>
         </div> 
</div
       </BODY>
  <?php include("../footerPages/footer_page.php")?>
    </HTML>