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
      <div class="col-md-9 col-md-offset-1">     
       <ul class="nav navbar-nav ">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>     
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0">Buy</a></li>
        <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/swap/swaps.php?page=0">Swaps</a></li>
      <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">List item</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/Needed/needed.php?page=1">Needed</a></li>
       <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/Needed/listneeded.php">Order</a></li>       
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li> 
         <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>	
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>
    <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0">My page</a></li>
      </ul>   
      </div>      
      </div>  
      </nav>        
</div>
 
  <div ng-app="myappInsert">    
 
 <form action="/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/insertneededProductInDB.php" method="POST" enctype="multipart/form-data">
    
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
        <td><label for="countryorigin">Country I want from:</label></td> 
  
         <td><select class="form-control" id="country_origin" name="country_origin">   
          </select></td> 
          </div>
         </tr> 
	
	  <tr class="success">		  
		 <div class="form-group">
     <td><label for="countrydestin">Country I receive delivery:</label></td> 
  
      <td><select class="form-control" id="country_destin" name="country_destin"> 
      </select></td> 
        </div>
      </tr> 
	
	    <tr class="success">
	    <td> <label for="citydestination">City I receive delivery: </label> </td> 
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
	  <div class ="" style ="background-color: white">           
              <br>
               <div class="form-group">
                  <label for="personname">Your name:</label>
             <div class="input-group">                   
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
           <input type="text" name="personName" class="form-control" placeholder="Enter your name:" required />
                </div>
            </div>
              
                <div class="form-group">
             <hr />
            </div>
              
	      <div class="form-group">
                  <label for="orderEmail">Your Email:</label>
             <div class="input-group">                   
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
           <input type="text" name="orderEmail" class="form-control" placeholder="Enter Email:" required />
                </div>
            </div>
	  
            <div class="form-group">
             <hr />
            </div>
	  
	       <div class="form-group">
                   <label for="orderPhone">Your Phone:</label> 
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
             <input type="text" name="orderPhone" class="form-control" placeholder="Enter Telephone + extension:" required />
                </div>
            </div>
          </div>
	       <div class="form-group">
             <hr />
            </div>
	 
     <div class="" style="background-color: beige">
             
             <div class="form-group">
                 <label for="itemName">Item Name:</label> 
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-comment"></span></span>
             <input type="text" name="item_name" class="form-control" placeholder="Enter item Name:" required />
                </div>
            </div>
	
	       <div class="form-group">
                   <label for="itemDescription">Item Description:</label>
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-comment"></span></span>
              <input type="text" name="desc" class="form-control" placeholder="Enter Description:" required />
                </div>
            </div>
	  
	  
            <div class="form-group">
             <hr />
            </div>
			
	  
	  	   <div class="form-group">
                        <label for="itemSize">Item Size:</label> 
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-resize-vertical"></span></span>
            <input type="text" name="size" class="form-control" placeholder="Enter Size:" required />
                </div>
            </div>
	  
	  
	        <div class="form-group">
             <hr />
            </div>
	  
	        <div class="form-group">
                     <label for="itemColor">Item Color:</label>
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-tint"></span></span>
             <input type="text" name="colour" class="form-control" placeholder="Enter Colour:" required />
                </div>
            </div>
	  
	        <div class="form-group">
             <hr />
            </div>
	      
	  
	 
	        <div class="form-group">
                     <label for="firstImage">insert item front view:</label> 
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-picture">image 1:</span></span>
            <input type="file" name="myimage1" class="form-control" placeholder="insert front view:" required />
                </div>
            </div>
	 
	        <div class="form-group">
             <hr />
            </div>

	  
	        <div class="form-group">
                    <label for="secondImage">Insert item back view:</label>
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-picture">Image 2:</span></span>
              <input type="file" name="myimage2" class="form-control" placeholder="Insert back view:" />
                </div>
            </div>
      
            <div class="form-group">
             <hr />
            </div>
			
	  
	        <div class="form-group">
                     <label for="thirdImage">Insert item other view:</label>
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-picture">Image 3:</span></span>
            <input type="file" name="myimage3" class="form-control" placeholder="Insert other view:"  />
                </div>
            </div>

	       <div class="form-group">
             <hr />
            </div>
			
	    <div class="form-group">
             <hr />
            </div>
			
	
	    <div class="form-group">
                <label for="proposeddeliverydate">Date of proposed delivery:</label> 
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            <input type="text"  id="datepickeravailfrom" name="datepickeravailfrom" class="form-control" placeholder="I want it on this date:" required />
                </div>
            </div>
	  
        <div class="form-group">
             <hr />
            </div>
	
         <div class="form-group">
	     <label for="proposeddeliverydate">I pay this amount:</label> 
              <div class="input-group">
                 <span class="input-group-addon">
                <input type="text" name="offeringAmount" class="form-control" placeholder="Offering amount:" />                
                <select class="form-control" id="item_currency" name="item_currency"></select>
                 </span>        
              </div>
         </div>
     
            <div class="form-group">
             <hr />
            </div>
			
	  <div class="form-group">
               <label for="deliveryPlace">Place I wish to collect from:</label>
             <div class="input-group">              
             <textarea cols="40" row="100" name="deliveryPlace" id="deliveryPlace" class="form-control" placeholder="Your delivery place:" required /></textarea>
                </div>
            </div>
	       <div class="form-group">
                    <label for="comment">Your note:</label>
             <div class="input-group">              
             <textarea cols="40" row="100" name="orderNote" id="sellerNote" class="form-control" placeholder="Your note:" required /></textarea>
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
 </div>
          </form>
         </div> 
</div>
       </BODY> 
    </HTML>
     <?php include("../footerPages/footer_page.php")?>