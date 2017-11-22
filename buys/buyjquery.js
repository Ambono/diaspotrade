$(document).ready(function() {
   $("#prodtbl").on("click", "#addProductbtn", function(){ 
        
               $("#basketdivrefresh").show();
	    	}); 
});




$(document).ready(function() {
	   $("#ButtonSendEmail").click(function(){        
	    		$("#basketdivrefresh").load("/komoecontainer/comoeandfoldertree/komoeEng/emails/SendEmailToSeller.php");
	    	}); 
});



$(document).ready(function() {
	   $("#ButtonEmail").click(function(){        
	    		$("#basketdivrefresh").load("/komoecontainer/comoeandfoldertree/komoeEng/emails/sellerEmail.php");
	    	}); 
});


$(document).ready(function() {
	   $("#ButtonshopList").click(function(){        
	    		$("#basketdivrefresh").load("/komoecontainer/comoeandfoldertree/komoeEng/shopping/shoppingList.php");
	    	}); 
});



$(document).ready(function() {
	   $("#ButtonRefresh").click(function(){        
	    		$("#basketdivrefresh").load("/komoecontainer/comoeandfoldertree/komoeEng/basket/RefreshBasket.php");
				  $("#basketdivrefresh").show();				
	    	}); 
});

$(document).ready(function() {
	   $("#ButtonRefresh").click(function(){    		
				   $("#ButtonCancelBasket").show();				
	    	}); 
});

$(document).ready(function() {
	   $("#ButtonConfirmBasket").click(function(){        
		   $("#basketdivrefresh").load("/komoecontainer/comoeandfoldertree/komoeEng/shopping/confirmshopping.php");		  	 
	    	}); 
	   });

$(document).ready(function() {
	   $("#ButtonConfirmBasket").click(function(){ 
		   $("#ButtonCancelBasket").hide();
	    	}); 
	   });


$(document).ready(function() {
	   $("#ButtonCancelBasket").click(function(){        
			$("#basketdivrefresh").load("/komoecontainer/comoeandfoldertree/komoeEng/shopping/cancelshopping.php");		
	    	}); 
	   });

	   
	   
	  
	   
	   
	   var productId_Details = ""; 
 $(document).ready(function() {
	    $("#prodtbl").on("click", "#detailpagebtn", function(){        
	       var prodid =  $(this).parents("tr").find("td:eq(0)").html();
	      productId_Details = $(this).parents("tr").find("td:eq(0)").html();  
	    	$.post("/komoecontainer/comoeandfoldertree/komoeEng/choices/ChoicedetailsProductIDinDB.php", {prodid: $(this).parents("tr").find("td:eq(0)").html()}, function(response) {
	    	});
	                                
	    });
	  });

	  
	   
var productId = "";
 var prodDescr= "";
 
 $(document).ready(function() {
	    $("#prodtbl").on("click", "#addProductbtn", function(){        
	       var prodid =  $(this).parents("tr").find("td:eq(0)").html();
	       productId = $(this).parents("tr").find("td:eq(0)").html();
	       prodDescr =  $(this).parents("tr").find("td:eq(1)").html()	       
	        var container = document.getElementById("basketdivrefresh");	      
	       container.innerHTML += productId +": "+  prodDescr +"<br>";       
	    	$.post("/komoecontainer/comoeandfoldertree/komoeEng/basket/addtobasket.php", {prodid: $(this).parents("tr").find("td:eq(0)").html()}, function(response) {	
	    	 		
	    	});
	                                
	    });
	  });
 

$(document).ready(function() {
	   $("#addProductbtn").click(function(){    		
				   $("#ButtonCancelBasket").show();				
	    	}); 
});

 
 
 
 
 
 
 $(document).ready(function(){
	  var id = "23"; 
	$("#ButtonSendEmail").click(function(){
	 $.ajax(
	    {
	    url: "/komoecontainer/comoeandfoldertree/komoeEng/emails/SendEmailToSeller.php",
	    type: "POST",

	    data: { id: id},
	    success: function (result) {
	            //alert('success');

	    }
	});     
	   });
	  });
 
 
 
 
 
 
$(document).ready(function() {
    $("#prodtbl").on("click", "#detailmodalbtn", function(){      
    	productId =  $(this).parents("tr").find("td:eq(0)").html();    
    	$.post("/komoecontainer/comoeandfoldertree/komoeEng/modal/fillmodal.php", {'prodid': productId},  function(response) {
    		//alert(productId);
    	});
                                
    });
  });


  

	
			
			  




