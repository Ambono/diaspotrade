<!DOCTYPE html>
 <HTML>
<HEAD>
 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyjquery.js"></script>

<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/searchangularcontrollers.js"></script>


<meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
<!--<meta http-equiv="Pragma" content="no-cache">-->

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="mystylesheet.css">
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



		 	<script>
		var fetch = angular.module('retrievingAppForShops', []);
        fetch.controller('dbCtrlshops', ['$scope', '$http', function ($scope, $http) {
             $http.get("/komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcherByShop.php")
                .success(function(data){
				//	alert('got data!!!!!!'),
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);
		</script>		
		  

		<script >
		 $(document).ready(function(){
		$("#searchButton").click(function(){
			  var searchstring = $("#Shopname").val();
				// var data_url  = "ProductDetailsFetcherByShop.php";
				// var location = "SellerSearchResult.php?page=0";
				if(searchstring=='' ){
				alert("Please fill out the form");
						 }
				else {
					$.post("/komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcherByShop.php" , //Required URL of the page on server
				{ // Data Sending With Request To Server
				term: searchstring
				},		
			  function(response,status){ // Required Callback Function
				//alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
				$("#sellerform")[0].reset();
				}); 
				
			
				}		
					   });
					  });	
		</script>

		<script>
					  
					 $(document).ready(function(){
		$("#searchButton").click(function(){  
					  window.location.href = '/komoecontainer/comoeandfoldertree/komoeEng/sellers/SellerSearchResult.php';
					  });
					  });

		</script>
                
               


</HEAD>
<BODY>
    <div id ="session_temp_user">
  <?php 
  //include("./utilities/randomstring.php");
  //$_SESSION['token_temp_user_index']= $_SESSION['token_temp_user']
   ?>
    </div>
    
    <script>
    $(document).ready(function() {
    $("#session_temp_user").hide();
});
     </script>
  
<form action="/komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcher.php"  method="post">
<input type="hidden" id ="sessiontempuser" name="sessiontempuser" value='failed' />
</form>
     
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
      <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>     
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0">Buy</a></li>	
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">List item</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li>             
    </ul>
    <ul></ul>
    <ul class="nav navbar-nav navbar-right" style ="padding-right:10px">     
        <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>
    <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0">My page</a></li> <li></li>
         
      </ul>   
            
      </div>  
      </nav>
  
        <div class="col-md-2">	
            
	<!--<p> hello <?php include("../session/sessionloginuser.php") ?>. Welcome back to komoe!</p>-->
	</div>
</div>

<form action="/komoecontainer/comoeandfoldertree/komoeEng/choices/Choicedetails.php"  method="post">
<input type="hidden" name="page" value="page=0" />
</form>

    <style>
        
        .tableclass{
            background-color: pink;
            border-radius:10px;
        }
    </style>
           

<table class= "table table-hover tableclass">
<tr>
<td>
  <div class="form-group">
   <div class="input-group">

 <div class=" col-md-10 col-md-offset-2">
<div class=" col-md-8">  
<form id="sellerform" method="POST" action="/komoecontainer/comoeandfoldertree/komoeEng/sellers/SellerSearchResult.php?page=0" >
<!--<form id="sellerform" method="POST" action="/komoecontainer/comoeandfoldertree/komoeEng/productdetails/productDetailsFetcherByShop.php" >-->
      <input type="search" placeholder="Find a shop" class="form-control" name ="Shopname" id ="Shopname" />
	 <!-- <input type="text"  ng-model="keywords" class="input-medium search-query" placeholder="Keywords..."/>-->	
 	 
	</div>
	 <div class=" col-md-4">
       <div class="input-group-btn">	    
          <button class="btn btn-info" name="searchButton" id ="searchButton" style = "background-color: buttonshadow" >           
           <span class="glyphicon glyphicon-search"></span>
           </button>
       </div>		   
       </div>
	   </form>
	   </div>
   </div> <!--form group-->
    </div> <!--input group-->
	</td>
	
	<td>	
	  <div class="form-group">
   <div class="input-group">
 <div class=" col-md-10 col-md-offset-0">
<div class=" col-md-8">  
<form id="sellerform" method="POST" action="/komoecontainer/comoeandfoldertree/komoeEng/sellers/ItemSearchResult.php?page=0" >
 <input type="search" placeholder="Find item" class="form-control" name ="ItemGroup" id ="ItemGroup" />	   
       </div>
	  <div class=" col-md-4">
      <div class="input-group-btn">	    
          <button class="btn btn-info" name="searchButton" id ="searchButton" style = "background-color: buttonshadow" >           
           <span class="glyphicon glyphicon-search"></span>
           </button>
       </div>
	</div>	 
</form>
	   </div>
	   </div>
   </div> <!--form group-->
    </div> <!--input group-->
	</td>
	</tr>
    </table>   
   
   
  <form method="POST" action="/komoecontainer/comoeandfoldertree/komoeEng/search/insertsearchcriteria.php" enctype="multipart/form-data">
    
  <table class= "table table-hover">
   <tr>        
 <!--gender -->
 <td>    
   <div class="input-group">
      <div class="form-group">
<select class="form-control" id="gender"  name="gender_search">     
</select> 
     </div>
     </div>
 </td> 
  
  
 <!--productcategory -->

 <td>
     <div class="input-group">
      <div class="form-group">
  <select class="form-control" id="productcategory" name="product_category">     
</select>  
      </div>
     </div>
 </td> 
 
 <!--country_destin --> 

<td>
    <div class="input-group">
     <div class="form-group">
<select class="form-control" id="country_destin" name="country_destin">    
 </select> 
     </div>
    </div>
  </td> 
 
   <td>
       <button style = "color: darkmagenta" type="submit" class="btn btn-success" name="viewselected">View selected</button>
   </td>
      </tr>
 </table>   
   </form>

        
<div class="jumbotron" style = "background-color:silver">
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
<style>
a:hover, a:visited, a:link, a:active
{
    text-decoration: none;
}
.btn{
    background-color: beige;
border: solid grey 2px;    
}
</style>

<div class=" row">
    <div class=" col-md-10 col-md-offset-1">
 <div class=" col-md-2">
<button  id="" name="" class="btn btn-info btn-md btn btn-block btn-primary" /><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0" >View more items</button>
</div>
       
        
<div class=" col-md-2">
<button  id="" name="" class="btn btn-info btn-md btn btn-block btn-primary" /><a href="/komoecontainer/comoeandfoldertree/komoeEng/swap/swaps.php" >Swap</button>
</div>
    
    <div class=" col-md-2">
<button  id="" name="" class="btn btn-info btn-md btn btn-block btn-primary " /><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/gift.php" >Gifts</button>
</div>
    
    <div class=" col-md-2">
<button  id="" name="" class="btn btn-info btn-md btn btn-block btn-primary" /><a href="/komoecontainer/comoeandfoldertree/komoeEng/deals/Deals.php" >Deals</button>
</div>
    
    <div class=" col-md-2">
<button  id="" name="" class="btn btn-info btn-md btn btn-block btn-primary" /><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php" >Register</button>
</div>
 
</div>
</div>




 <br>
           <div id="App1" ng-app="retrievingAppForIndex" ng-controller="dbCtrl">   
		   <p align="center" > <i class="fa fa-4x fa-spinner fa-spin" ng-show="prodID==0" ></i></p>
		
	  
	  <!--<input id="pagination" name ="pagination" type="button" value="Paginate" class="btn btn-sm btn-info" /> -->
	   
	    <input type ="hidden" name ="ordercontent" Id ="ordercontent">
	  
	  <input type ="hidden" name ="prodId" Id ="prodIDinput"> 
	 	<!--<p align="center" > <i class="fa fa-4x fa-spinner fa-spin" ng-show="prodID==0" ></i></p>-->
		 
	   <div id="itemtable">
	
	    
            <table class= "table table-hover" id= "prodtbl" name = "prodtbl" >
<!--			Table is productdetails-->
               <thead>
                    <tr>   
                      
                        <th>Description</th>
                      <!--  <th>Size</th>-->
					
			<th>Country origin</th>
                      <!--  <th>Country destination</th>-->
			<th>City destination</th>
                        <th>Product Image</th> 						
                        <th>Avail. until</th> 						
                        <th>Offering price </th>                     					
                    </tr>
                </thead>
                <tbody>
				
                    <tr ng-repeat="product in data | filter: shopsearch" ng-model ="prodID" ng-init="default">			 
               
                        <td onclick = "getval(this)"ng-cloak>{{product.Description}}</td>
                      <!--  <td ng-cloak>{{product.Size}}</td>	-->			
						
                        <td ng-cloak>{{product.CountryOrig}}</td>
                        <!--<td ng-cloak>{{product.CountryDestin}}</td> -->
                        <td ng-cloak>{{product.CityDestin}}</td>							
                        <td ng-cloak><img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/{{product.ProdImage}}.JPG" width="50px" height="40px"/></td>						
                       <!--  <td ng-cloak>{{product.Availfrom}}</td> -->
                        <td ng-cloak>{{product.Availuntil}}</td>
                        <td ng-cloak>{{product.Price}}</td>                    
                        </tr>			
                </tbody>			
           </table>
         <div>

  <br> 
   <footer class="col-md-12  text-center text-info" style="background-color:#003333">  
      <span>&copy Komoe 2016</span>  
      </footer>
</div>    	 
 </div>     
</BODY>
</HTML>
