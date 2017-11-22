
var mypageRouting_App = angular.module('mypageRoutingApp', ['ngRoute']);

mypageRouting_App.config( [ '$routeProvider', '$locationProvider', function( $routeProvider, $locationProvider ){


    $routeProvider
      .when('/myshop', {
          //  templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/my_pages/myshop.html',
            controller: 'myshopController'
        })
        .when('/mycontactlist', {
           // templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/my_pages/mycontactlist.html',
            controller: 'mycontactlistController'
        })
        .when('/crudmyitems', {
            templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/my_pages/crudmyitems.html',
            controller: 'crudmyitemsController'
        })
         .when('/registershop', {
          //  templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/my_pages/registershop.html',
            controller: 'registershopController'
        })
        
            .when('/registerItems', {
            templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/my_pages/registerItems.html',
            controller: 'registerItemController'
        })
        
             .when('/mylisteditems', {
           // templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/my_pages/mylisteditems.php',
            controller: 'mylisteditemsController_ignore'
        })      
        
         
		
		  .when('/itemsbookedfrom_myshop', {
           // templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/my_pages/itemsbookedfrom_myshop.html',
            controller: 'itemsbookedfrom_myshopController'
        })
        
		
        .otherwise({
    redirectTo: 'mypages/mypage.php',
});

    } ] );



   
       mypageRouting_App.controller("mylisteditemsController",
function ($scope,$location){
    $scope.viewmylisteditems= function(){
        $location.path("/komoecontainer/comoeandfoldertree/komoeEng/my_pages/mylisteditems.php")
    };
} );
           



   
       mypageRouting_App.controller("registershopController",
function ($scope,$location){
    $scope.registershop= function(){
        $location.path("http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/my_pages/registershop.html")
    };
} );
  
  
        
           
          