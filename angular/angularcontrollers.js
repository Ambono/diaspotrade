
  var fetch = angular.module('retrievingApp', ['angularUtils.directives.dirPagination']);

        fetch.controller('dbCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("/komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcher.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);
 
		
			var fetch = angular.module('retrievingAppForSeller', []);
        fetch.controller('dbCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("/komoecontainer/comoeandfoldertree/komoeEng/bookings/pendingTransactionforSellerUsingAngular.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);

		
		var fetch = angular.module('retrievingAppForIndex', []);
        fetch.controller('dbCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("/komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcherForIndex.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);

		
	
	var fetch = angular.module('retrievingDealsApp', []);
        fetch.controller('dbdealsCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("/komoecontainer/comoeandfoldertree/komoeEng/deals/ProductDetailsFetcherDeals.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);

		
		var fetch = angular.module('retrievingSwapsApp', []);
        fetch.controller('dbswapsCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("/komoecontainer/comoeandfoldertree/komoeEng/swap/ProductDetailsFetcherSwaps.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);

		
		var fetch = angular.module('retrievingGiftsApp', []);
        fetch.controller('dbgiftsCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("/komoecontainer/comoeandfoldertree/komoeEng/gifts/ProductDetailsFetcherGift.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);

	
	

        var fetch = angular.module('countriesApp', []);
        fetch.controller('dbcountryCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("/komoecontainer/comoeandfoldertree/komoeEng/country/CountryNameFetcher.php")
                .success(function(country){
                    $scope.country = country;
                })
                .error(function() {
                    $scope.country = "error in fetching country";
                });
        }]);

  