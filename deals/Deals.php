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
 
<link rel="stylesheet" 
href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" 
src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript" src="script/scriptrefresh.js"></script>
<script type="text/javascript" src="script/pagination.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyscripts.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyjquery.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/pagination/dirPagination.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/angularcontrollers.js"></script>
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

footer {
background-color: silver;  
margin-bottom:4px;
border-radius: 4px;
}
jumbotron {
background-color: #33D7FF
}
</style> 
	
</HEAD>

<BODY> 
<div class="container">       
              
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
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0">Buy</a></li>	
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">List item</a></li>
      <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/deals/Deals.php">Deals</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li>             
    </ul>
    <ul></ul>
    <ul class="nav navbar-nav navbar-right" style ="padding-right:10px"> 
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>
    <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0">My page</a></li> <li></li>
         
      </ul>   
            
      </div>  
      </nav>
<!--<div id ="App3" ng-app="countriesApp" ng-controller="dbcountryCtrl" class="success"> 
  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">select your country of origin
  <span class="caret"></span></button>
  <ul class="dropdown-menu">                        
   <li ng-repeat="name in country"><a href="#">{{name.CountryName}}</a></li>
  </ul>
</div> 
</div>

 -->
 <div class="jumbotron">
    <p align = "right">hello <?php include("../session/sessionloginuser.php") ?>. <br>Welcome!</p>
<p>What deal suit you from somebody going back from holiday?</p>	
  </div> 
<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');
?>

 <form action = "/komoecontainer/comoeandfoldertree/komoeEng/basket/RefreshBasket.php" method= "post">
<input type="hidden" name="myFieldName" value="<?php include("../session/sessionloginuser.php") ?>"/>
</form>  

<div class="container">   
		
		  <br>
           <div id="App1" ng-app="retrievingDealsApp" ng-controller="dbdealsCtrl">   
		   <p align="center" > <i class="fa fa-4x fa-spinner fa-spin" ng-show="prodID==0" ></i></p>
		
	  

	   
	    <input type ="hidden" name ="ordercontent" Id ="ordercontent">
	  
	  <input type ="hidden" name ="prodId" Id ="prodIDinput"> 
	 
		 
	   <div id="itemtable">
	     <table>
          <tr class="success">
          <td><label for="countryorigin">Choose a country: </label></td>       
          <td><select id="countryorigin" name="countryorigin" ng-model="choiceofcountry"></select></td>       
          </tr>
		  <br><br>
	     </table>
		 
           <table class="table table-hover" id ="prodtbl" name = "prodtbl" >
<!--			Table is productdetails-->
               <thead>
                    <tr>					    
                      <!--  <th>Id</th>-->
                        <th>Description</th>
                        <th>Size</th>
						<!--<th>Colour</th>--> 
                       <!--  <th >Gender</th>-->
					 <!--	<th>Product Condition</th>-->
						<th>Country origin</th>
                        <th>Country destination</th>
						<th>City destination</th>
                        <th>Product Image</th> 
						 <!--<th>Avail. from </th>-->
                        <th>Avail. until</th> 						
                        <th>Offering price </th>                     					
                    </tr>
                </thead>
                <tbody>
				
                    <tr ng-repeat="product in data | filter: choiceofcountry "  ng-model ="prodID" ng-init="default">				 
                   <!--   <td id="myTd">{{product.Id}}</td>-->
                        <td onclick = "getval(this)"ng-cloak>{{product.Description}}</td>
                        <td ng-cloak>{{product.Size}}</td>				
						<!--<td ng-cloak>{{product.Colour}}</td>-->
                       <!-- <td ng-cloak>{{product.Gender}}</td>--> 
                        <!--    <td ng-cloak>{{product.ProdCondition}}</td>-->
                        <td ng-cloak>{{product.CountryOrig}}</td>
                        <td ng-cloak>{{product.CountryDestin}}</td> 
                        <td ng-cloak>{{product.CityDestin}}</td>							
                        <td ng-cloak><img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/{{product.ProdImage}}.JPG" width="50px" height="40px"/></td>						
                       <!--  <td ng-cloak>{{product.Availfrom}}</td> -->
                        <td ng-cloak>{{product.Availuntil}}</td>
                        <td ng-cloak>{{product.Price}}</td>
                      
                          <td > <button  id ="addProductbtn" name="AddProduct" class="btn btn-success btn-sm"  /><!--
                          <span id ="myspan">Add product Id {{product.Id}}</span> </button></td> -->
                          <span id ="myspan">Select</span> </button></td>
                        <td><button  id="detailpagebtn" name="detailpagebtn" class="btn btn-info btn-lg" /><a href='Choicedetails.php?id={{product.Id}}'>Details</button></td>
                  
				</tr>			
                </tbody>			
           </table>        
 
            <?php include("../pages/PagesSetDeals.php")?>
            </div>
          </div>
			<br><br>			
    
  
 <footer class="col-md-6 col-md-offset-3 text-center text-info" >  
      <span>&copy Komoe 2016</span>  
 </footer>
  </div> 
</BODY>
</HTML>