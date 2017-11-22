
<!DOCTYPE html>
<HTML>
<HEAD>
<meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
<meta http-equiv="Pragma" content="no-cache">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="mystylesheet.css">
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script> 
 
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
<TITLE>Komoe Buys</TITLE>

 
</HEAD>

<BODY>  

<div class="container"> 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Komoe</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/productdetails/Product.php">Register item</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/deals/Deals.php">Deals</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">Sell</a></li> 	  
      <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php">Buy</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/Gifts.php">Gifts</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php">Sign in</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li> 
      <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/pagination/pagination.php">Pagination</a></li>  
    </ul>
  </div>
</nav>


<body>








<!--<div ng-app="myApp" ng-controller="MyCtrl">
    <input ng-model="q" id="search" class="form-control" placeholder="Filter text">
    <select ng-model="pageSize" id="pageSize" class="form-control">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
     </select>
    <ul>
        <li ng-repeat="item in data | filter:q | startFrom:currentPage*pageSize | limitTo:pageSize">
            {{item}}
        </li>
    </ul>
    <button ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1">
        Previous
    </button>
    {{currentPage+1}}/{{numberOfPages()}}
    <button ng-disabled="currentPage >= getData().length/pageSize - 1" ng-click="currentPage=currentPage+1">
        Next
    </button>
</div>


<script>

var app=angular.module('myApp', []);

//alternate - https://github.com/michaelbromley/angularUtils/tree/master/src/directives/pagination
//alternate - http://fdietz.github.io/recipes-with-angular-js/common-user-interface-patterns/paginating-through-client-side-data.html

app.controller('MyCtrl', ['$scope', '$filter', function ($scope, $filter) {
 $scope.currentPage = 0;
 $scope.pageSize = 10;
 $scope.data = [];
 $scope.q = '';
 
 $scope.getData = function () {
   // needed for the pagination calc
   // https://docs.angularjs.org/api/ng/filter/filter
   return $filter('filter')($scope.data, $scope.q)
  /* 
    // manual filter
    // if u used this, remove the filter from html, remove above line and replace data with getData()
    
     var arr = [];
     if($scope.q == '') {
         arr = $scope.data;
     } else {
         for(var ea in $scope.data) {
             if($scope.data[ea].indexOf($scope.q) > -1) {
                 arr.push( $scope.data[ea] );
             }
         }
     }
     return arr;
    */
 }
 
 $scope.numberOfPages=function(){
     return Math.ceil($scope.getData().length/$scope.pageSize);                
 }
 
 for (var i=0; i<65; i++) {
     $scope.data.push("Item "+i);
 }
}]);

//We already have a limitTo filter built-in to angular,
//let's make a startFrom filter
app.filter('startFrom', function() {
 return function(input, start) {
     start = +start; //parse to int
     return input.slice(start);
 }
});

</script>
-->



<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
 
<body ng-app="myApp" >
 
<div ng-controller="myCtrl">
    <ul>
        <li ng-repeat=" item in records | startFrom:currentPage*pageSize | limitTo:pageSize"> {{item}}</li>
       <!-- <li ng-repeat=" item in records"> {{item}}</li>-->
    </ul>
 
   <button ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1">
        Previous
    </button>
    {{currentPage+1}}/{{numberOfPages()}}
               
    <button ng-disabled="currentPage >= records.length/pageSize - 1" ng-click="currentPage=currentPage+1">
        Next
    </button>
                </div>
               
<script>
var app=angular.module('myApp', []);
app.controller("myCtrl", function($scope) {  
    $scope.currentPage = 0;
    $scope.pageSize = 10;
    $scope.records = [  
                "Alfreds Futterkiste",
    "Berglunds snabbkeop",
    "Centro comercial Moctezuma",
    "Ernst Handel",
                "Patrick cunn",
                "tatu zoki",
                "lionel g",
                "mc dioune",
                "nanaa bgg",
                "Kiff",
                "Kaff",
                "Roling",
                ];
    $scope.numberOfPages=function(){
        return Math.ceil($scope.records.length/$scope.pageSize);               
    }
                 
});
 
app.filter('startFrom', function() {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});
</script>
 
</body>
</html>
</BODY>
</HTML>