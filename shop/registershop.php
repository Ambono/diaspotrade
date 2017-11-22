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
 
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<TITLE>Komoe register item</TITLE>
<style>

footer {
background-color: silver;
margin-bottom:4px;
border-radius: 4px;
}
jumbotron {
background-color: #33D7FF
}
</style> 


</HEAD>
<BODY>
<div class="container">
<form action="/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/insertshopdetailsinDB.php" method="POST" enctype="multipart/form-data">     
        <div class="col-md-6 col-md-offset-3">
	        <div class="form-group">
             <hr />
            </div>
	  
	      <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="text" name="owneremail" class="form-control" placeholder="Enter Email:" required />
                </div>
            </div>
	  
            <div class="form-group">
             <hr />
            </div>
	  
	       <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
             <input type="text" name="shopname" class="form-control" placeholder="Shop name" required />
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

</BODY>
</HTML>