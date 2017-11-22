<?php
include("../session/sessionmanager.php") ;  
?> 
<!--<!DOCTYPE html>
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

 jQuery library 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

 Latest compiled JavaScript 
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
<script src="/komoecontainer/comoeandfoldertree/komoeEng/my_pages/mypagerouting.js"></script>
<link rel="stylesheet" href="/komoecontainer/comoeandfoldertree/komoeEng/css/mystylesheet.css">

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

<BODY  > 	
<div class=""> 
     
<div class="row">   
    
<nav class="navbar navbar-inverse navbar-static-top navbar navbar-default" role="navigation" style ="border-radius: 5px; background-color:#003333">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

         Collect the nav links, forms, and other content for toggling 
         
      <div class="collapse navbar-collapse" >
     
     <div class="navbar-header">
      <a class="navbar-brand" href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Komoe</a>
     </div>          
    <ul class="nav navbar-nav navbar-left">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>     
               <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/SellerSearchResultMyShop.php?page=0">View my shop</a></li>
                      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/community/communityownership.php" >View my clients</a></li>
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
	<p> hello <?php include("../session/sessionloginuser.php") ?>. Welcome back to komoe!</p>
	</div>
</div>
     
    <SCRIPT>
        
   $(document).ready(function() {
	   $("#mylisteditems_2").click(function(){        
			$("#displaycontainer").load( "/komoecontainer/comoeandfoldertree/komoeEng/my_pages/mylisteditems.php" );		
	    	}); 
	   });

	   
        </script>
    
    
        <div class="container" ng-app="mypageRoutingApp" >   
  
    <div class="container col-md-2 ">
   <ul class="nav nav-pills nav-stacked rwspacer sidenav">     
	
       <li><a href="#/mylisteditems" id ="" ng-click="viewmylisteditems()">
               LIST ITEMS VIA ANGULAR</a></li>
        <li><a href="#/registerItem" id ="
                  " >Register shop</a></li>
           <li><a href="#/retrievecommunitymembers" id ="App3">My customers</a></li>  
           
            <li><a href="#/mylistedstuff" id ="mylisteditems_2">
               LIST ITEMS VIA ANGULAR 2</a></li>
    </ul> 
	</div>  
        <div ng-view >            
        </div>  
            
            <div class="displaycontainer">
            </div>
       
    </div>
</div>
  </div>  
  
  
  
   <script>
            var subscribers = angular.module('SubscribersretrievingApp', []);
        subscribers.controller('CtrlSubscribers', ['$scope', '$http', function ($scope, $http) {
            $http.get("/komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcher.php")
                .success(function(data){
                    alert("got some data");
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);

		
     </script>
            
        <div id="" ng-app="SubscribersretrievingApp" ng-controller="CtrlSubscribers">            	 
         <table class="success">
          <tr>
          <td><span>Refine result: </span></td>       
          <td><input type ="search" id="searchinput" name="searchinput" ng-model="shopsearch"/></td>       
          </tr> 
	  </table>
		 </br></br> 
	
            <table class= "table table-hover" id= "prodtbl">
                <tbody>	
                    <tr ng-repeat="product in data | filter: shopsearch " ng-model ="prodID" ng-init="default">				 
                                             
                        <td>
                            {{product.Id}}</br>
                            {{product.Description}} </br>
                            Size: {{product.Size}}</br>
                            Origin: {{product.CountryOrig}}</br>                           
                        </td> 
                        <td>
                            <img ng-src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/{{product.ProdImage}}.JPG" width="100px" height="100px"/>
                        </td>
                        <td>
                            Destination: {{product.CountryDestin}} (city: {{product.CityDestin}})</br>
                            Available from: {{product.Availfrom}}</br>
                            Price: {{product.Price}}</br>
                            Available until: {{product.Availuntil}}</br>
                         <button  id ="addProductbtn" name="AddProductbtn" class="btn btn-success btn-sm glyphicon glyphicon-shopping-cart" />            
                              <span id ="myspan">Select</span> </button>
			   <button  id="detailpagebtn" name="detailpagebtn" class="btn btn-info btn-lg" />
                             <a href='/komoecontainer/comoeandfoldertree/komoeEng/choices/Choicedetails.php?id={{product.Id}} page=<?php echo "".$_GET['page'].""?>'>
                         <a href='/komoecontainer/comoeandfoldertree/komoeEng/choices/Choicedetails.php?id={{product.Id}} page=0>'>
                               Details</button>
                          </td>
                	</tr>			
                </tbody>
                    <tfoot>
                    <th>
   
	          </th>
                </tfoot>
           </table> 
  
        </div>
  
</BODY>
 <footer class="container siteFooter col-md-12" style="background-color:#003333">  
      <span>&copy Komoe 2016</span>  
  </footer>
</HTML>


-->




 <HTML>
<HEAD>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<link rel="stylesheet" href="/komoecontainer/comoeandfoldertree/komoeEng/css/mystylesheet.css">
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/searchangularcontrollers.js"></script>


<meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
<!--<meta http-equiv="Pragma" content="no-cache">-->

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script> 
 
<link rel="stylesheet" 
href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" 
src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/scriptrefresh.js"></script>


<script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/countries.js"></script>
<script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/categories.js"></script>
<script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/gendergroup.js"></script>

<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyscripts.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyjquery.js"></script>

<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/angularcontrollers.js"></script>

<script src="/komoecontainer/comoeandfoldertree/komoeEng/my_pages/mypagerouting.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypagePages.js"></script>

<TITLE>Mypage</TITLE>
<!--	 <script>
            var rootApp = angular.module('rootApp', ['firstApp','secondApp']);
      </script>-->
</HEAD>
<BODY>
<form action="/komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcher.php"  method="post">
<input type="hidden" id ="sessiontempuser" name="sessiontempuser" value='failed' />
</form>
     

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
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>     
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0">Buy</a></li>
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/swap/swaps.php?page=0">Swaps</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/gift.php?page=0">Gift</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">List item</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li>             
       </ul>
          
        <ul class="nav navbar-nav navbar-right  ">
        <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>	
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>
        <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0">My page</a></li>
       </ul>   
         
      </div>  
      </nav>        
</div>
 
    
<!--      <div  class="col-md-2"> 
   <ul class="nav nav-pills nav-stacked rwspacer sidenav">     
	
       <li><a href="#/mylisteditems" id ="App2">
               LIST ITEMS VIA ANGULAR GO TO LISTED ITEMS</a></li>
        <li><a href="#/registershop" id ="" ng-click="registershop()" >
                Register shop</a></li>
           <li><a href="#/retrievecommunitymembers" id ="App3">My customers</a></li>  
           
            <li><a href="#/mylistedstuff" id ="mylisteditems_2">
               LIST ITEMS VIA ANGULAR 2</a></li>
               
                 <li><a href="#/test" id ="testfirstapp">
               LIST ITEMS VIA ANGULAR 3</a></li>
    </ul> -->
<div  class="col-md-2"> 
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
          <br>
        </div>
    <div class="displaycontainer">
    </div>           
  

    
    <div class="col-md-8">
          <div ng-view >            
        </div> 
<!--  <div ng-app="retrievingAppForIndex" ng-controller="dbCtrl">   
      <p align="center" > <i class="fa fa-4x fa-spinner fa-spin" ng-show="prodID==0" ></i></p>
	  <input type ="hidden" name ="ordercontent" Id ="ordercontent">
	  
	  <input type ="hidden" name ="prodId" Id ="prodIDinput"> 
	 	<p align="center" > <i class="fa fa-4x fa-spinner fa-spin" ng-show="prodID==0" ></i></p>
          <br><br>
	   <div class ="" ng-cloack>
  <table class = "table table-hover" id= "prodtbl" name = "prodtbl" 
    style=" border-radius: 5px;
    width: 50%;
    margin: 0px auto;
    float: none;
    background-color: silver;">
                <tbody>				
                    <tr ng-repeat="product in data | filter: shopsearch" ng-model ="prodID" ng-init="default">			 
               
                        <td ng-cloak>
                       Description: {{product.Description}}</br>  			
						
                       Country origin: {{product.CountryOrig}}</br>
                       
                       City destination: {{product.CityDestin}}
                        </td>
                        <td>
                      <img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/{{product.ProdImage}}.JPG" width="100px" height="100px"/>
                        </td>
                        <td>	
                       Avail. until: {{product.Availuntil}}</br>
                       Offering price:  {{product.Price}}
                        </td>                    
                        </tr>			
                </tbody>			
           </table>
         </div>-->
  <br> 
  </div>
</div>
      </div>
</div><!--end container -->
  </div>
</BODY>
<br>
 <footer  class="container siteFooter col-md-12" style="background-color:#003333" >  
      <span>&copy Komoe 2016</span>  
 </footer>
</HTML>
