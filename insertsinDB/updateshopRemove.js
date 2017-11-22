  $(document).ready(function() {     	
	    $("#owneritemstbl").on("click", "#deleteshopitem", function(){ 
            	  var  prod_id = $(this).parents("tr").find("td:eq(0)").html();
	    	$.post("/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/sellerremoveitem.php", 
                {
                    prodid: prod_id
                },
                function(response) {
                  // document.write('deleted product with descr:', prodid_);
	          alert('deleted please refresh page to see result');	
                  //  location.reload();
                 cache: false;
	    	});	                             
	    });
	  }); 
 
   $(document).ready(function() {         
 $("#owneritemstbl").on("click", "#deleteshopitem", function( ){ 
    location.reload();
   $("#displaycontainer").load("komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcherByShopOwnerTabulated.php"); 
 alert('deleted'); 
});
  });