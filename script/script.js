
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
        
             .when('/shopownings', {
            templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/sellers/SellerSearchResultMyShopRestrained.php',
            controller: 'shopowningController'
        })
        
		
		  .when('/pendingsales', {
            templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/bookings/retrievebookedtransactionforbuyer.php',
            controller: 'bookingController'
        })
        
        
           .when('/mylisteditems', {
            templateUrl: 'http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/my_pages/mylisteditems.php',
            controller: 'mylisteditemsController'
        })
		
        .otherwise({
    redirectTo: '',
});

    } ] );



