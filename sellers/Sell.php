<?php
include("../session/sessionmanager.php") ; 
?> 
<!DOCTYPE html>
<HTML>
<HEAD>
<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1"> 

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script> 
 
<link rel="stylesheet" href="/komoecontainer/comoeandfoldertree/komoeEng/css/mystylesheet.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/countries.js"></script>
  <script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/categories.js"></script>
 <script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/gendergroup.js"></script>
 <script type="text/javascript" src="/komoecontainer/comoeandfoldertree/komoeEng/script/currency.js"></script>
<TITLE>Komoe register item</TITLE>
 
  <script>
  $( function() {
    $( "#datepickeravailfrom" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#datepickeravailto" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>

</HEAD>
<BODY>
<div class="col-md-12 container">
 <div class="row"> 
<nav class="navbar navbar-inverse navbar-static-top navbar navbar-default" role="navigation" style ="border-radius: 5px; background-color:#003333; padding-right:4px">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
         
      <div class="collapse navbar-collapse" >
     
     <div class="navbar-header">
      <a class="navbar-brand" href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Komoe</a>
     </div>          
    <ul class="nav navbar-nav clearleft">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>     
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0">Buy</a></li>
        <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/swap/swaps.php?page=0">Swaps</a></li>
      <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">List item</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li>             
    </ul>
 
    <ul class="nav navbar-nav navbar-right clearleft"> 
         <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>	
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>
    <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0">My page</a></li>
         
      </ul>   
            
      </div>  
      </nav>        
</div>
 
  <div ng-app="myappInsert">    
 
 <form action="/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/insertproductdetailsinDB.php" method="POST" enctype="multipart/form-data">
    
 <div class="col-md-6 col-md-offset-3">
 <table class="table"> 	 

  <tr class="success">          
 <div class="form-group">  
 <td><label for="Gender">Gender:</label></td>   
 <td>
<select class="form-control" id="gender" placeholder="Enter Gender:" name="gender" required>

</select>
 </td> 
 </div>
 </tr> 
     	
<tr class="success">		  
<div class="form-group">    
 <td>
 <label for="Category">Category:</label></td>   
 <td><select class="form-control" id="productcategory" name="productcategory">
</select></td> 
 </div>
 </tr> 
  </table>
          
 </div><!--end div for form group col 6-->     
          
              
 <div class="col-md-6 col-md-offset-3">
	       <table class="table"> 	     	
         <tr class="success">		  
		 <div class="form-group">
        <td><label for="countryorigin">Country origin:</label></td> 
  
         <td><select class="form-control" id="country_origin" name="country_origin">   
          </select></td> 
          </div>
         </tr> 
	
	  <tr class="success">		  
		 <div class="form-group">
     <td><label for="countrydestin">Country destination:</label></td> 
  
      <td><select class="form-control" id="country_destin" name="country_destin"> 
      </select></td> 
        </div>
      </tr> 
	
	    <tr class="success">
	    <td> <label for="citydestination">City destination: </label> </td> 
	       <td> 
          <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-plane"></span></span>
               <input type="text" name="citydestin" class="form-control" placeholder="Enter City of destination" required />
                </div>
           </div>
			  </td> 
	 	      </tr> 
		   
	      </table>
	  
	        <div class="form-group">
             <hr />
            </div>
	  
	      <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="text" name="sellerEmail" class="form-control" placeholder="Enter Email:" required />
                </div>
            </div>
	  
            <div class="form-group">
             <hr />
            </div>
	  
	       <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
             <input type="text" name="sellerPhone" class="form-control" placeholder="Enter Telephone + extension:" required />
                </div>
            </div>
	 
	       <div class="form-group">
             <hr />
            </div>
	 
             <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-comment"></span></span>
             <input type="text" name="item_name" class="form-control" placeholder="Enter item Name:" required />
                </div>
            </div>
	
	       <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-comment"></span></span>
             <input type="text" name="desc" class="form-control" placeholder="Enter Description:" required />
                </div>
            </div>
	  
	  
            <div class="form-group">
             <hr />
            </div>
			
	  
	  	   <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-resize-vertical"></span></span>
             <input type="text" name="size" class="form-control" placeholder="Enter Size:" required />
                </div>
            </div>
	  
	  
	        <div class="form-group">
             <hr />
            </div>
	  
	        <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-tint"></span></span>
             <input type="text" name="colour" class="form-control" placeholder="Enter Colour:" required />
                </div>
            </div>
	  
	        <div class="form-group">
             <hr />
            </div>
	  
	         <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-check"></span></span>
             <input type="text" name="prodcond" class="form-control" placeholder="Enter prod condition:" required />
                </div>
            </div>
	  
	  
	        <div class="form-group">
             <hr />
            </div>
   
	 
	        <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-picture">Primary image:</span></span>
             <input type="file" name="myimage" class="form-control" placeholder="Primary image:" required />
                </div>
            </div>
	 
	        <div class="form-group">
             <hr />
            </div>

	  
	        <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-picture">First Optional Image:</span></span>
             <input type="file" name="firstoptionalimage" class="form-control" placeholder="First Optional Image:" />
                </div>
            </div>
      
            <div class="form-group">
             <hr />
            </div>
			
	  
	        <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-picture">Second Optional Image:</span></span>
             <input type="file" name="secondoptionalimage" class="form-control" placeholder="Second Optional Image:"  />
                </div>
            </div>

	       <div class="form-group">
             <hr />
            </div>
			
	  
<!--	       <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
             <input type="text" name="price" class="form-control" placeholder="Offering price(Please enter currency):" required />
                		  
		 <div class="form-group"> 
                 <select class="form-control" id="item_currency" name="item_currency"></select>
               </div>
             </div>
            </div>-->
	  
	  
	    <div class="form-group">
             <hr />
            </div>
			
	
	    <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
             <input type="text"  id="datepickeravailfrom" name="datepickeravailfrom" class="form-control" placeholder="Available from:" required />
                </div>
            </div>
	  
        <div class="form-group">
             <hr />
            </div>
			
	  
	   <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
             <input type="text" name="datepickeravailto" id="datepickeravailto" class="form-control" placeholder="Available until:" required />
                </div>
            </div>
	  
		  <div class="form-group">
                  <hr/>
                 </div>
			
<!--	   <div class="form-group">
             <div class="radio">
	     <span>what do you want to do:</span><br>
               
              <label> <input type="radio" name="itemaction" value="sell" />Sell </label><br>
             <label><input type="radio" name="itemaction" value="swap"  />Swap</label><br>
            <label> <input type="radio" name="itemaction" value="gift" />Gift</label><br>
                </div>
            </div>-->
     
           
     <script type="text/javascript">

function transactionIntention() {
    if (document.getElementById('sellCheck').checked) {
        document.getElementById('sell_div').style.display = 'block';
        document.getElementById('gift_div').style.display = 'none';
        document.getElementById('swap_div').style.display = 'none';
    }
    else if (document.getElementById('swapCheck').checked) {
        document.getElementById('gift_div').style.display = 'none';
        document.getElementById('swap_div').style.display = 'block';
         document.getElementById('sell_div').style.display = 'none';
    }
    else if (document.getElementById('giftCheck').checked) {
        document.getElementById('gift_div').style.display = 'block';
        document.getElementById('swap_div').style.display = 'none';
         document.getElementById('sell_div').style.display = 'none';
    }
}

</script>


 <div class="form-group">
             <div class="radio">
	     <span>what do you want to do:</span><br>
               
              <label> <input type="radio" onclick="javascript:transactionIntention();" name="itemaction" id="sellCheck" value="sell" > Sell </label><br>
                 <div id="sell_div" style="display:none"> 
                 <span class="input-group-addon">
                <input type="text" name="price" class="form-control" placeholder="Offering price:" />                
                <select class="form-control" id="item_currency" name="item_currency"></select>
                 </span>
                 </div>
             <label><input type="radio" onclick="javascript:transactionIntention();" name="itemaction" id="swapCheck" value="swap" >Swap</label><br>
             <div id="swap_div" style="display:none">       
              <span class="input-group-addon"> 
               <input type='text' id='swap_txt' name='swap_intention' placeholder ="swap against:">
              </span>
             </div>
             <label><input type="radio" onclick="javascript:transactionIntention();" name="itemaction" id="giftCheck" value="gift" >Gift</label><br>
             <div id="gift_div" style="display:none">  
               <span class="input-group-addon">
                   <input type='text' id='gift_txt' name='gift_intention' placeholder="gift to:">
               </span>
            </div>
            </div>
    </div>
     
            <div class="form-group">
             <hr />
            </div>
			
	  <div class="form-group">
             <div class="input-group">
               <label for="deliveryPlace">Delivery place:</label>
             <textarea cols="40" row="100" name="deliveryPlace" id="deliveryPlace" class="form-control" placeholder="Your delivery place:" required /></textarea>
                </div>
            </div>
	       <div class="form-group">
             <div class="input-group">
               <label for="comment">Your note:</label>
             <textarea cols="40" row="100" name="sellerNote" id="sellerNote" class="form-control" placeholder="Your note:" required /></textarea>
                </div>
            </div>
	     <div class="form-group">
             <hr />
            </div>
           <div class="form-group">
             <button type="submit" class="btn btn-success" name="btnInsert">Add</button>
            </div>
	    <div class="form-group">
             <hr />
            </div>
         </div>
          </form>
         </div> 
</div>
       </BODY>
  <?php include("../footerPages/footer_page.php")?>
    </HTML>