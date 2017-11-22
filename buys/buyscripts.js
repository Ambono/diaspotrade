
 var productId = "";
 
 $(document).ready(function() {
	    $("#prodtbl").on("click", "#modalbtn", function(){      
	       var prodid =  $(this).parents("tr").find("td:eq(0)").html();
	    	$.post("/komoecontainer/comoeandfoldertree/komoeEng/modal/fillmodal.php", {'prodid': prodid},  function(response) {
	    		//alert(prodid);
	    	});
	                                
	    });
	  });
 

 
function myFunctionRemove() {
	//document.getElementById('adder').style.visibility='visible'; // hide
	//document.getElementById('remover').style.visibility='hidden'; // sho
	//document.getElementById('RemoveProduct').style.display='inline'; // sho
    var table = document.getElementById("myTable");
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0); 
    var cell2 = row.insertCell(0);     
    var x = table.rows.length;
    var Cells = table.getElementsByTagName("td");
    var count=0;
    cell2.innerHTML = document.activeElement.textContent.substring(12);
	//cell1.innerHTML = '<input id="Button" type="button" value="remove" onClick ="RemoveItem(this)" class="btn btn-sm btn-info" />';  
}

  
 
     function RemoveItem(btn){
    	 var row = btn.parentNode.parentNode;
    	  row.parentNode.removeChild(row);
  };  

    

function myFunctionPID(x) {
    alert("product id is: " + x);
}


function myFunctionpid(x) {
    alert("product id is: " + x);
}


    function getval(cel) {
            alert(cel.innerHTML);
        } 
   
    
    

    function getspecval() {    	
    	alert(document.getElementById("myTd").innerHTML);
        } 
  
    
  

  
  
