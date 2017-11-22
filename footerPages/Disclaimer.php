<!DOCTYPE html>
<HTML>
<HEAD>
 <?php include("../head/header.php")?>
<?php include("../head/header_angulars.php")?>
<?php include("../head/header_css.php")?>
<?php include("../head/header_searchenginescript.php")?>
<?php include("../head/header_standardlibrary.php")?>
<?php include("../head/header_jqueriesscript.php")?>
    <TITLE>
      Disclaimer
    </TITLE>
     <script>          
           document.ready$("#disclaimerbox").load( "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/Texts/disclaimer.txt" );
      </script>
</HEAD>
<BODY>
<div class="container col-md-12">
  <div class="row">   
<nav class="navbar navbar-inverse navbar-static-top navbar navbar-default" role="navigation" style ="border-radius: 5px; background-color:#003333; color:white; padding-right:4px">

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
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>     
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0">Buy</a></li>
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/swap/swaps.php?page=0">Swaps</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/gift.php?page=0">Gift</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">List item</a></li> 
<!--      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li>             -->
       </ul>
           
        <ul class="nav navbar-nav navbar-right  ">
        <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>	
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>
        <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0">My page</a></li>
       </ul>   
         
      </div>  
      </nav>        
</div>
    
 <div class="jumbotron">
  <div class='row'>  
<div class="panel">
    <span class="textbox" id="disclaimerbox" readonly></span>
</div>
</div>
 </div>
     
    </div>
    
<?php include("../footerPages/footer_page.php")?>
</BODY>
</HTML>