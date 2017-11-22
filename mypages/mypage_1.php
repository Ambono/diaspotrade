<?php
include("../session/sessionmanager.php") ;  
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

<TITLE>Komoe Buys</TITLE> 


	
		<script>
	window.onload = function fct(){
document.getElementById("itemtable").style.visibility = "visible";
    } 
	</script>
	<script>	
   .itemtable{
    display:none;
   }
   .ng-cloak { display:none; }
	</script>
	
		<script>
	 var delay = 2000; // second
    $( document).ready(function() {
   setTimeout(function() {
   $(".itemtable").show();
   }, delay);
   });
		</script>
		<style>
		footer{                  
        background-color: silver;
        margin-bottom:4px;
	padding:8px;
	border-radius: 4px;
	margin:15px;	
	}
	
	
	#basketdivrefresh{
	border: solid silver 2px;
	padding: 2px;
	width:200px;
	height:auto;
	display:none;
	}
	
	
</style>
</HEAD>

<BODY shopowningController ng-app="RoutingApp" ng-controller="shopowningController" > 	
<div class="container"> 
     
<div class="row">   
    
<nav class="navbar navbar-inverse navbar-static-top navbar navbar-default" role="navigation" style ="border-radius: 5px; background-color:#003333">
<!--    <div class="container">-->
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
    <ul class="nav navbar-nav navbar-left">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>     
               <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/SellerSearchResultMyShop.php?page=0">View my shop</a></li>
                    <!--  <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/community/communityownership.php" >View my clients</a></li>-->
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li>             
    </ul>
    <ul></ul>
    <ul class="nav navbar-nav navbar-right" style ="padding-right:10px">
          <li > <a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/SellerSearchResultMyShop.php?page=0"><span class="glyphicon glyphicon-envelope"></span></a></li>	
    <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0">My page</a></li> <li></li>
         <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>
      </ul>   
            
      </div>  
      </nav>
        <div class="col-md-2">	
	<!--<p> hello <?php include("../session/sessionloginuser.php") ?>. Welcome back to komoe!</p>-->
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
<div class="row" >
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
           
<!--           <div>
           <li><a href="#/communitymembers" id ="App4">place holder 1</a></li>
           </div>-->
    </ul>	
	  <p></p>	  
	</div>
        
	<div class="row">
   <ul class="nav nav-pills nav-stacked rwspacer sidenav"> 
	    <div>
        <p><a href="#/bookedItemsAngular" id ="App4" >Items booked anglar</a></p>
       </div>
        <div>
        <p><a href="#/shopowning" id ="App5" >Items listed by me</a></p>
       </div>
	      <div>
        <p><a href="#/bookedItems" id ="App8" >Items booked from me</a></p>
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
    <div class="col-md-10 ">
        <div align="center" id="displaycontainer"> 
        </div>
       <div align="center">
       <ng-view></ng-view>  
       </div>
    </div>
</div>
  <br><br><br>
   <footer class="col-md-8  col-md-offset-2 text-center text-info" >  
      <span>&copy Komoe 2016</span>  
      </footer>	
  </div>  
</BODY>
</HTML>