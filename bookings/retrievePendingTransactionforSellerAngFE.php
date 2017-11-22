

<html>
    <head>
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

<script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/scriptrefresh.js"></script>
<script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/pagination.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyscripts.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/buys/buyjquery.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/pagination/dirPagination.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/angularcontrollers.js"></script>
<title>My shop's items</title>

    </head>
    <body>
	
	  <div id="App1" ng-app="retrievingAppForSeller" ng-controller="dbCtrl">  
	  
        <table cellpadding="2" cellspacing="4" border="solid navy 4px" id ="bookeditemstbl" class= "table table-hover" >
        <thead>
            <tr>         
               <td>Id</td>          
                <td>Description</td>  
                <td>Image</td>  				
                <td>Buyer name</td>
                <td>Buyer email </td>
                 <td>Buyer telephone</td>    
            </tr>
        </thead>
        <tbody>
		<tr ng-repeat="product in data " ng-model ="prodID" ng-init="default">
		
			 
                <td  ng-cloak id="myTd">{{product.shProdId}}</td>
                        <td onclick = "getval(this)"ng-cloak>{{product.pdDescription}}</td>
                        							
                        <td ng-cloak><img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/{{product.pdProdImage}}.JPG" width="50px" height="40px"/></td>						
                       <!--  <td ng-cloak>{{product.Availfrom}}</td> -->
                        <td ng-cloak>{{product.shUserName}}</td>
                        <td ng-cloak>{{product.uEmail}}</td>
                    <tr> 
                   


            </tbody>
            </table>
			</div>
    </body>
  
</html>
    
        

		

