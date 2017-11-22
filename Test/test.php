<HEAD>
<meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
<meta http-equiv="Pragma" content="no-cache">

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

<script type="text/javascript" src="script/scriptrefresh.js"></script>
<script type="text/javascript" src="script/pagination.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyscripts.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyjquery.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/pagination/dirPagination.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/angularcontrollers.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/searchangularcontrollers.js"></script>

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

<BODY> 	
<div class ="container col-md-10 col-md-offset-1"> 
   
     
<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');
?>

<!--<form action="/komoecontainer/comoeandfoldertree/komoeEng/choices/Choicedetails.php"  method="post">
<input type="hidden" name="page" value="page=<?php  echo"".$_GET['page'].""?>" />
</form>-->
 	
<script>
    
    	var fetch = angular.module('retrievingAppForShopOwners', []);
        fetch.controller('dbCtrlshopowner', ['$scope', '$http', function ($scope, $http) {
             $http.get("/komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcherByShopOwner.php")
                .success(function(data){
				//	alert('got data!!!!!!'),
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);
	
</script>
	
		
		  <br>
           <div id="App" ng-app="retrievingAppForShopOwners" ng-controller="dbCtrlshopowner">   
		   <p align="center" > <i class="fa fa-4x fa-spinner fa-spin" ng-show="prodID==0" ></i></p>
			  
	  <!--<input id="pagination" name ="pagination" type="button" value="Paginate" class="btn btn-sm btn-info" /> -->
	   
	    <input type ="hidden" name ="ordercontent" Id ="ordercontent">
	  
	  <input type ="hidden" name ="prodId" Id ="prodIDinput"> 
	 	<!--<p align="center" > <i class="fa fa-4x fa-spinner fa-spin" ng-show="prodID==0" ></i></p>-->
		 
	   <div id="itemtable">
	
	     <table>
          <tr class="success">
             
             
          </tr>
		  <br><br>
	     </table>
	
            <table class= "table table-hover" id= "prodtbl" name = "prodtbl" >
<!--			Table is productdetails-->
               <thead>
                    <tr>					    
                      <th>Id</th>
                        <th>Description</th>
<!--                        <th>Size</th>			
			<th>Country origin</th>
                        <th>Country destination</th>
			<th>City destination</th>-->
                        <th>Product Image</th> 
						 <!--<th>Avail. from </th>-->
<!--                        <th>Avail. until</th> 						-->
                        <th>Offering price </th>                     					
                    </tr>
                </thead>
                <tbody>
				
                    <tr ng-repeat="product in data | filter: choiceofcountry "  ng-model ="prodID" ng-init="default">				 
                <td ng-cloak id="myTd">{{product.Id}}</td>
                        <td onclick = "getval(this)"ng-cloak>{{product.Description}}</td>
<!--                        <td ng-cloak>{{product.Size}}</td>				-->
						<!--<td ng-cloak>{{product.Colour}}</td>-->
                       <!-- <td ng-cloak>{{product.Gender}}</td>--> 
<!--                            <td ng-cloak>{{product.ProdCondition}}</td>-->
<!--                        <td ng-cloak>{{product.CountryOrig}}</td>
                        <td ng-cloak>{{product.CountryDestin}}</td> 
                        <td ng-cloak>{{product.CityDestin}}</td>							-->
                        <td ng-cloak><img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/{{product.ProdImage}}.JPG" width="50px" height="40px"/></td>						
                       <!--  <td ng-cloak>{{product.Availfrom}}</td> -->
<!--                        <td ng-cloak>{{product.Availuntil}}</td>-->
                        <td ng-cloak>{{product.Price}}</td>
<!--                      
                          <td > <button  id ="addProductbtn" name="AddProduct" class="btn btn-success btn-sm"  />
                          <span id ="myspan">Add product Id {{product.Id}}</span> </button></td> -->
<!--                          <span id ="myspan">Select</span> </button></td>-->
                       <!-- <td><button  id="detailpagebtn" name="detailpagebtn" class="btn btn-info btn-lg" /><a href='Choicedetails.php?id={{product.Id}}'>Details</button></td> --> 
						
				<td><button  id="detailpagebtn" name="detailpagebtn" class="btn btn-info btn-lg" /><a href='/komoecontainer/comoeandfoldertree/komoeEng/choices/Choicedetails.php?id={{product.Id}} page=<?php echo "".$_GET['page'].""?>'>Details</button></td>
                
				</tr>			
                </tbody>			
           </table>
         <div>
         <?php // include("../pages/PagesSetMyShop.php")?>
        </div>
		
        </div>
       </div>
      </div>
		<div class="row col-md-8" align="center">
			<table  class="table table-striped"  id="myTable" style="width:250px; border:4px; border-spacing: 50px"  >
			<!--<caption style="color: red">Your basket</caption>--> 
			<tr>
		  	<td padding= "10px">			
			<input id="ButtonRefresh" name ="ButtonRefresh" type="button" value="View basket" class="btn btn-sm btn-success" /> 
            </td> 
           		
             <td padding= "10px">			
			<input id="ButtonConfirmBasket" name ="ButtonConfirmBasket" type="button" value="Confirm basket" class="btn btn-sm btn-success" /> 
             </td>             
             <td>			
			<input id="ButtonCancelBasket" name ="ButtonCancelBasket" type="button" value="Cancel basket" class="btn btn-sm btn-danger" /> 
             </td>
            </tr> 
                             
           </table>            
    
			<div align = "center" id ="basketdivrefresh">	
            </div>
                       
			</div>		
	
			<br><br>			
        </div>     
      </div>    

</BODY>