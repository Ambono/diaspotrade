
var RoutingApp = angular.module('RoutingApp', ['ngRoute']);

RoutingApp.config( [ '$routeProvider', '$locationProvider', function( $routeProvider, $locationProvider ){


    $routeProvider
      .when('/home', {
            templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/template/home.html',
            controller: 'HomeController'
        })
        .when('/about', {
            templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/template/about.html',
            controller: 'AboutController'
        })
        .when('/contact', {
            templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/template/contact.html',
            controller: 'ContactController'
        })
         .when('/seller', {
            templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/template/SellerNote.php',
            controller: 'SellerNoteController'
        })
        
            .when('/listItems', {
            templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypageListItem.php',
            controller: 'listItemController'
        })
        
             .when('/shopownings', {
            templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/sellers/SellerSearchResultMyShopRestrained.php',
            controller: 'shopowningController'
        })
        
		
		  .when('/pendingsales', {
            templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/bookings/retrievebookedtransactionforbuyer.php',
            controller: 'bookingController'
        })
        
		
        .otherwise({
    redirectTo: '',
});

    } ] );

RoutingApp.controller( 'MainController', function($scope) {
    
     $scope.message = "Welcome from the mainController";
});

RoutingApp.controller( 'HomeController', function( $scope ){
    $scope.message = "Welcome from the homeController";
});

RoutingApp.controller('AboutController', function($scope){
    
    $scope.message = "Welcome from the AboutController";
});

RoutingApp.controller('ContactController', function($scope){
    
    $scope.message = "Welcome from the ContactController";
});

RoutingApp.controller('SellerNoteController', function($scope){
    
    $scope.message = "This is the seller's note";
});

RoutingApp.controller('listItemController', function($scope){
    
    $scope.message = "These are your listed items";
});

RoutingApp.controller('shopowningController', function($scope){
    
    $scope.message = "These arefor shop owners";
});


RoutingApp.controller('bookingController', function($scope){
    
    $scope.message = "These are for transactions";
});



