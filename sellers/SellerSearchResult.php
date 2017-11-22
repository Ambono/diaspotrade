<!DOCTYPE html>
<HTML>
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
<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/searchangularcontrollers.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyscripts.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyjquery.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/pagination/dirPagination.js"></script>
<!--<script src="searchangularcontrollers.js"></script>-->

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
<div class="container"> 
     <nav class="navbar navbar-default">
       <div class="container-fluid">
       <div class="navbar-header">
      <a class="navbar-brand" href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Komoe</a>
      </div>
      
	    <ul class="nav navbar-nav navbar-left col-md-4">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>
	  <!-- <li><a href="Product.php">Register item</a></li>-->
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/deals/Deals.php">Deals</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">Sell</a></li> 	  
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0">Buy</a></li> 
	  <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/SellerSearchResult.php?page=0">Shop</a></li> 
	  </ul>
	  <ul class="nav navbar-nav col-md-6 col-md-offset-1 ">	  
	   <li> <span style= "color: navy"><?php include("../shop/searchedshopname.php") ?> </span></li>	    
	  <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php">Sign in</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>     	   
	  </ul>	
      <ul class="nav navbar-nav col-md-1 col-md-offset-1 ">	  
       <li> <span style= "color: navy">Hello <?php include("../session/sessionloginuser_show_EmptyName.php") ?>. </span></li>
	  </ul>	
     </div>
     </nav>
	 <style>
	 img-navbar {
   max-width: 100%;
   max-height:100%;
   margin-bottom: 20px;
   border-radius: 10px 10px;
}
	 </style>
	

  
    <div class="form-group">
   <div class="input-group">

 <div class=" col-md-10 col-md-offset-2">

	
	   
   </div> <!--form group-->
    </div> <!--input group-->
	
<?php
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache');
?>

<form action = "/komoecontainer/comoeandfoldertree/komoeEng/basket/RefreshBasket.php" method= "post">
<input type="hidden" name="myFieldName" value="<?php include("../session/sessionloginuser_show_EmptyName.php") ?>"/>
</form>  



<form action="/komoecontainer/comoeandfoldertree/komoeEng/choices/Choicedetails.php"  method="post">
<input type="hidden" name="page" value="page=<?php  echo"".$_GET['page'].""?>" />
</form>	
    
    <form action="/komoecontainer/comoeandfoldertree/komoeEng/pages/PagesSetSeller.php"  method="post">
<input type="hidden" name="page" value="page=<?php  echo"".$_GET['page'].""?>" />
</form>	
		  

<!--
<form action = "" method= "post">
<input type="hidden" name="datatst" value="datatst_value" />
</form>  
-->


<?php 
//include('../sellers/SellerSearchSetter.php');
 ?>
	
		  <br>
           <div id="App_Shops" ng-app="retrievingAppForShops" ng-controller="dbCtrlshops">   
		   <p align="center" > <i class="fa fa-4x fa-spinner fa-spin" ng-show="prodID==0" ></i></p>
		
  <div class="form-group">
   <div class="input-group">
  
           <div class=" col-md-10">
              <div class=" col-md-6">  
          <label for="shopsearch" class="info">Filter result: </label>   
		          </div>
	          <div class=" col-md-4">
          <input type ="search" id="searchinput" name="searchinput" ng-model="shopsearch"/>      
              </div>		   
              </div>
			  </div>
			  </div>
		  <br><br>
	  
	  <!--<input id="pagination" name ="pagination" type="button" value="Paginate" class="btn btn-sm btn-info" /> -->
	   
	    <input type ="hidden" name ="ordercontent" Id ="ordercontent">
	  
	  <input type ="hidden" name ="prodId" Id ="prodIDinput"> 
	 	<!--<p align="center" > <i class="fa fa-4x fa-spinner fa-spin" ng-show="prodID==0" ></i></p>-->
		 
	   <div id="itemtable">
	
            <table class= "table table-hover" id= "prodtbl" name = "prodtbl" >
<!--			Table is productdetails-->
               <thead>
                    <tr>					    
                      <th>Id</th>
                        <th>Description</th>
                       <!-- <th>Size</th>-->
						<!--<th>Colour</th>--> 
                       <!--  <th >Gender</th>-->
					 <!--	<th>Product Condition</th>-->
						<th>Country origin</th>
                        <th>Country destination</th>
						<th>City destination</th>
                       <th>Product Image</th> 
						 <!--<th>Avail. from </th>-->
                       <!-- <th>Avail. until</th> -->						
                        <th>Offering price </th> 
                       <!-- <th>Shop name</th> -->						
                    </tr>
                </thead>
                <tbody>
				
                    <tr ng-repeat="product in data | filter: shopsearch"  ng-model ="prodID" ng-init="default">				 
               <td ng-cloak id="myTd">{{product.Id}}</td>
                        <td onclick = "getval(this)"ng-cloak>{{product.Description}}</td>
                     
                        <td ng-cloak>{{product.CountryOrig}}</td>
                        <td ng-cloak>{{product.CountryDestin}}</td> 
                        <td ng-cloak>{{product.CityDestin}}</td>							
                       <td ng-cloak><img src = "http://localhost:81//komoecontainer/comoeandfoldertree/komoeEng/images/{{product.ProdImage}}.JPG" width="50px" height="40px"/></td>					
                       <!--  <td ng-cloak>{{product.Availfrom}}</td> -->
                       <!-- <td ng-cloak>{{product.Availuntil}}</td>-->
                        <td ng-cloak>{{product.Price}}</td>
						 <!-- <td ng-cloak>{{product.Shopname}}</td>-->
                      
                          <td > <button  id ="addProductbtn" name="AddProduct" class="btn btn-success btn-sm"  /><!--
                          <span id ="myspan">Add product Id {{product.Id}}</span> </button></td> -->
                          <span id ="myspan">Select</span> </button></td>
                       <!-- <td><button  id="detailpagebtn" name="detailpagebtn" class="btn btn-info btn-lg" /><a href='Choicedetails.php?id={{product.Id}}'>Details</button></td> --> 
						
				 <td><button  id="detailpagebtn" name="detailpagebtn" class="btn btn-info btn-lg" /><a href='/komoecontainer/comoeandfoldertree/komoeEng/choices/ChoicedetailsShops.php?id={{product.Id}}'>Details</button></td>
                
				</tr>			
                </tbody>			
           </table>
         <div>
		 
    <?php //  include("../pages/PagesSetSeller.php")?>
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
    
	<br><br>
   <footer class="col-md-8  col-md-offset-2 text-center text-info" >  
      <span>&copy Komoe 2016</span>  
      </footer>	
  </div>    

</BODY>
</HTML>
