
<!DOCTYPE html>
<HTML>
<HEAD>
<meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
<!--<meta http-equiv="Pragma" content="no-cache">-->

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<link rel="stylesheet" href="/komoecontainer/comoeandfoldertree/komoeEng/css/mystylesheet.css">

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
<script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/pagination.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyscripts.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyjquery.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/pagination/dirPagination.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/angularcontrollers.js"></script>

<script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/countries.js"></script>
<script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/categories.js"></script>
<script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/gendergroup.js"></script>
<script src="https://raw.githubusercontent.com/michaelbromley/angularUtils/master/src/directives/pagination/dirPagination.js"></script>

<TITLE>Komoe Buys</TITLE> 

		
</HEAD>

<BODY> 	
<div class="container col-md-12"> 
    
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
    <ul class="nav navbar-nav ">
     <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>     
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0">Buy</a></li>
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/swap/swaps.php?page=0">Swaps</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/gift.php?page=0">Gift</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">List item</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li>           
       <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>
        <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/admin/contactusMessages.php">Messages</a></li>
         <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/admin/sitevisitsReports.php">Visits</a></li>	
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php">Sign Up</a></li>
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>
        <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0">My page</a></li>
         
      </ul>  
<!--<div> ng-include template-url="navbartpl.html"></span>-->
            
      </div>  
      </nav>        
</div>

   

<script>
var fetchEnquiry = angular.module('retrieveQuery', ['angularUtils.directives.dirPagination']);
        fetchEnquiry.controller('queryCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("/komoecontainer/comoeandfoldertree/komoeEng/admin/contactusQueryDetails.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);
</script>
  <div class ="">
  		  <br>
           <div id="App_message" ng-app="retrieveQuery" ng-controller="queryCtrl">   
		   <p align="center" > <i class="fa fa-4x fa-spinner fa-spin" ng-show="prodID==0" ></i></p>
		
	  
	  <!--<input id="pagination" name ="pagination" type="button" value="Paginate" class="btn btn-sm btn-info" /> -->
	   
	    <input type ="hidden" name ="ordercontent" Id ="ordercontent">
	  
	  <input type ="hidden" name ="prodId" Id ="prodIDinput"> 
	 	
	    
		 
         <table class="success">
          <tr>
          <td><span color ="navy">Refine result: </span></td>       
          <td><input type ="search" id="searchinput" name="searchinput" ng-model="enquiries"/></td>       
          </tr> 
	  </table>
		 </br></br> 
	<div class ="" ng-cloack>
            <table class= "table table-hover" id= "prodtbl" name = "prodtbl">
                <tbody>	
<!--                    <tr ng-repeat="enquiry in data | filter: enquiries " ng-model ="Id" ng-init="default">				 -->
                    <tr  dir-paginate="enquiry in data  | filter:enquiries | itemsPerPage: 10">
                        <td> <span><b>-{{enquiry.Id}}-</b><br></span>
                       
                            Enquirer name: {{enquiry.cName}} </br>
                           Enquirer Address: {{enquiry.cAddress}}</br>
                           Enquirer Telephone:{{enquiry.cTelephone}}</br>                           
                       
                           Enquirer Email: {{enquiry.cEmail}}</br>
                           Query category {{enquiry.qCategory}}</br>
                          Description: {{enquiry.Note}}</br>
                           Date: {{enquiry.Date}}</br>
                      
                          </td>                          
                	</tr>			
                </tbody>
                   
           </table>         
        </div>
        </br>
              
         <dir-pagination-controls></dir-pagination-controls>
        </div>
       
     
	
	       </div><!--end col-md-8-->		
	  
		       
      </div><!--end retrieving app-->
    
     </div><!--container-->
   <br><br>			
     <br><br>
  </BODY>
<?php include("../footerPages/footer_page.php") ?>
  
      
</HTML>