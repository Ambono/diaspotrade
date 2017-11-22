
		var fetch = angular.module('retrievingAppForShops', []);
        fetch.controller('dbCtrlshops', ['$scope', '$http', function ($scope, $http) {
             $http.get("/komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcherByShop.php")
                .success(function(data){
				//	alert('got data!!!!!!'),
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);
		
                
                
		 $(document).ready(function(){
		$("#searchButton").click(function(){
			  var searchstring = $("#Shopname").val();
				// var data_url  = "ProductDetailsFetcherByShop.php";
				// var location = "SellerSearchResult.php?page=0";
				if(searchstring=='' ){
				alert("Please fill out the form");
						 }
				else {
					$.post("/komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcherByShop.php" , //Required URL of the page on server
				{ // Data Sending With Request To Server
				term: searchstring
				},		
			  function(response,status){ // Required Callback Function
				//alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
				$("#sellerform")[0].reset();
				}); 
				
			
				}		
					   });
					  });	
	
					  
					 $(document).ready(function(){
		$("#searchButton").click(function(){  
					  window.location.href = '/komoecontainer/comoeandfoldertree/komoeEng/sellers/SellerSearchResult.php';
					  });
					  });

		