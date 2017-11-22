var fetchshop = angular.module('retrievingAppForShops', []);
        fetchshop.controller('dbCtrlshops', ['$scope', '$http', function ($scope, $http) {
             $http.get("/komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcherByShop.php")
                .success(function(data){
				//	alert('got data!!!!!!'),
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);
		
	
        
		var fetch = angular.module('retrievingAppForShopOwners', []);
        fetch.controller('dbCtrlshopsowner', ['$scope', '$http', function ($scope, $http) {
             $http.get("/komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcherByShopOwner.php")
                .success(function(data){
				//	alert('got data!!!!!!'),
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);
	
	
	     var fetchItems = angular.module('itemSearchApp', []);
        fetchItems.controller('itemsearchCtrl', ['$scope', '$http', function ($scope, $http) {
           // $http.get("../productdetails/ProductDetailsFetcherByItem.php")
   $http.get("/komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcherByItem.php")
                              
                    .success(function(data){
					alert('got data from product detail fetcher use it!!!!!!'),
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);
        
                
             var fetchCategories = angular.module('categoriesApp', []);
        fetchCategories.controller('categoriesCtrl', ['$scope', '$http', function ($scope, $http) {           
   $http.get("/komoecontainer/comoeandfoldertree/komoeEng/category/CategoryDetailsFetcherSearchResult.php")
                              
                    .success(function(data){
					alert('got data from product detail fetcher use it!!!!!!'),
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);
        
        
        
        