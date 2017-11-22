
var RoutingAppRefresh = angular.module('RoutingAppRefresh', ['ngRoute']);

RoutingAppRefresh.config( [ '$routeProvider', '$locationProvider', function( $routeProvider, $locationProvider ){

	$routeProvider    
         .when('/refresh', {
            templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/template/RefreshBasket.php',
            controller: 'RefreshBasketCtrl'
        })
        .otherwise({
    redirectTo:  '/RefreshBasket.php',
});
    } ] );

RoutingAppRefresh.controller( 'RefreshBasketCtrl', function($scope) {
    
     $scope.message = "Welcome from the refresh Controller";
});



