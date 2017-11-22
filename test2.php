<?php
include("../session/sessionmanager.php") ; 

if(!isset($_SESSION)){
    session_start();
}
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['login_user'])){
	    $user =$_SESSION['login_user']; 	
	   }
elseif(isset($_SESSION['token_temp_user'])){  
    $user =   $_SESSION['token_temp_user'];     
 }
 echo $user;
?> 
<!DOCTYPE html>
<HTML>
<HEAD>
<meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
<meta http-equiv="Pragma" content="no-cache">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="mystylesheet.css">
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script> 
  <script src="https://code.angularjs.org/1.5.6/angular-route.js"></script>
<link rel="stylesheet" 
href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" 
src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/script.js"></script>
<script type="text/javascript" src="script/scriptrefresh.js"></script>
<script type="text/javascript" src="script/pagination.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyscripts.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyjquery.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypagePages.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/pagination/dirPagination.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/angularcontrollers.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/searchangularcontrollers.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/updateshopUpdate.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/updateshopRemove.js"></script>
<script src="../mypages/mypagePages.js"></script>
<link rel="stylesheet" href="../css/mystylesheet.css">
<!--<script>
 $( function() {
    $( "#datepickeravailfrom" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#datepickeravailto" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
</script>-->
<TITLE>Komoe mypage</TITLE> 
	
     <script type="text/javascript">

function transactionIntention() {
    if (document.getElementById('sellCheck').checked) {
        document.getElementById('sell_div').style.display = 'block';
        document.getElementById('gift_div').style.display = 'none';
        document.getElementById('swap_div').style.display = 'none';
    }
    else if (document.getElementById('swapCheck').checked) {
        document.getElementById('gift_div').style.display = 'none';
        document.getElementById('swap_div').style.display = 'block';
         document.getElementById('sell_div').style.display = 'none';
    }
    else if (document.getElementById('giftCheck').checked) {
        document.getElementById('gift_div').style.display = 'block';
        document.getElementById('swap_div').style.display = 'none';
         document.getElementById('sell_div').style.display = 'none';
    }
}

</script>

</HEAD>

<BODY> 	
<div class="col-md-12"> 
     
<div class="row">   
    <nav class="navbar navbar-inverse navbar-static-top navbar navbar-default" role="navigation" style ="border-radius: 5px; background-color:#003333; padding-right:4px">

        <div class="navbar-header">
     
      <a class="navbar-brand" href="../index.php">Komoe</a>
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
      <li><a href="../index.php">Home</a></li>     
      <li ><a href="../buys/Buy.php?page=0">Buy</a></li>
      <li ><a href="../swap/swaps.php?page=0">Swaps</a></li>
      <li><a href="../gifts/gift.php?page=0">Gift</a></li>
    <!--  <li><a href="../sellers/Sell.php">List item</a></li> -->
      <li><a href="../help/Help.php">Help</a></li>             
       </ul>
          
        <ul class="nav navbar-nav navbar-right  ">
        <li><a href="../loginlogout/SignIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>	
	<li><a href="../registration/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	<li><a href="../loginlogout/logout.php">Log out</a></li>
        <li class="active"><a href="../mypages/mypage.php?page=0">My page</a></li>
       </ul>   
         
      </div>  
      </nav> 
</div>
         <script>
         $(document).ready(function() {    
                  $("#App10").click(function(){ 
                      var y = document.getElementById("demo");
         y.style.display === "block";
    var x = document.getElementById("displaycontainer").innerHTML = "";	  	
    var x = document.getElementById("showhidemyshop");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
//$("showhidemyshop").load( "/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php" );
  
              }); });
        </script>
		  
    <div class="col-md-12 container">		  

    <div class="col-md-2 ">
	<div class="row">
   <ul class="nav nav-pills nav-stacked rwspacer sidenav">     
	   <!--<li><a href="Product.php">Register item</a></li> -->
           <div>
               <li><a href="#/listItems" id ="App1">List item</a></li>
           </div>
              <div>
           <li><a href="#/registerItem" id ="App2" >Register shop</a></li>
              </div>
           <div>
           <li><a href="#/retrievecommunitymembers" id ="App3">My customers</a></li>
           </div>
   </ul>
        </div>
     <div class="row">
   <ul class="nav nav-pills nav-stacked rwspacer sidenav"> 	
        <div>
        <p><a href="#/shopowning" id ="App5">Items listed by me</a></p>
       </div>
	      <div>
                  <p><a href="#/bookedItems" id ="App8">Items booked from me</a></p>
             </div>	   
    </ul>	
	  <p></p>	  
	</div>	
        <div class="row">
             <ul class="nav nav-pills nav-stacked rwspacer sidenav"> 
          <div>
                    <p><a href="#/communityownership" id="App6" >Create a community</a></p>
                       </div>
                       <div>
                    <p><a  href="#/communitymembership" id="App7" >Add community member</a></p>
                       </div> 
             </ul>	
	   </div>
         </div>
        <style>
            
            button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    text-align: left;
    border: none;
    outline: none;
    transition: 0.4s;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
button.accordion.active, button.accordion:hover {
    background-color: #ccc;
}

/* Style the accordion panel. Note: hidden by default */
div.panel {
    padding: 0 18px;
    background-color: white;
    display: none;
}
        </style>
        
        
        <script>
            var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}
         </script>
        <div class="col-md-10">
         <div align="center" id="displaycontainer">        
      
         </div>
         <div align="center">
         <div ng-view></div>       
         </div>
</div> 
        
      
         
<!-- <button id ="hidedemobtn" type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button>-->
  
            </div>   
   </div>
   

    
</BODY>
   <footer class="col-md-12  siteFooter" style="background-color:#003333" >  
      <span>&copy Komoe 2016</span>  
      </footer>	
</HTML>