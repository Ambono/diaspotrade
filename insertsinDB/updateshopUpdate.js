  
   $(document).ready(function() {     	
	    $("#owneritemstbl").on("click", "#updateshopitem", function( ){ 
                    var  prodid_= $(this).parents("tr").find("td:eq(0)").html();
                    var  proddesc_= $(this).parents("tr").find("td:eq(1)").html();
                    var prodprice_= $(this).parents("tr").find("td:eq(8)").html();
	    	$.post("/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/sellerupdateitem.php", 
                {                  
                   prodid: prodid_,
                    prodprice: prodprice_,
                    proddesc: proddesc_
                }, 
                function(response) {	
	    	// document.write('update product with descr:', prodid_, proddesc_, prodprice_ );	
                 cache: false;
	    	});	                             
	    });
	  });
          
          
          
   $(document).ready(function() {         
 $("#owneritemstbl").on("click", "#updateshopitem", function( ){ 
   // location.reload();
   $("#displaycontainer").load("komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcherByShopOwnerTabulated.php"); 
 alert('saved'); 
});
  });

