 <?php
   ob_start();
   session_start();
?>
 <!DOCTYPE html>
<HTML>
<HEAD>
 <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>  
 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<TITLE>Komoe home</TITLE>
<style>

footer {
background-color: silver;
margin:0 0 10px 0;
border-radius: 2px;
padding:10px;
}
.jumbotron {
background-color: #33D7FF;
height: 300px;
}

.imgclass
{
width: auto;
height: 225px;
max-height: 225px;
}

.colimg{
width: 100%;
height: 100%;
}

</style>

</HEAD>
<BODY>
<div class="container"> 

        <div class="container">        
		  
		  
      <style>
	  .clspacer{
margin: 0 0 0 10px;
background-color: #ADD8E6;
padding: 4px;
border-radius: 5px;
}

	  .rwspacer{
margin: 15px 0 15px 0;
background-color: silver;
padding: 4px;
}

.sidenav{
 background-color:white;
 border:solid #ADD8E6; 
 border-radius: 5px;
 }
</style>

    <form action = "/komoecontainer/comoeandfoldertree/komoeEng/community/communitymaker.php" method="post" autocomplete="on">
	 <div class="col-md-4 col-md-offset-2">
	   <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="uname" class="form-control" placeholder="Enter Username" required />
                </div>
            </div>
			
			 <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="usurname" class="form-control" placeholder="Enter Surname" required />
                </div>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required />
                </div>
            </div>
			
			 <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="text" name="communityname" class="form-control" placeholder="Enter Name for your community" required />
                </div>
            </div>
			
			 <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="text" name="communitydescription" class="form-control" placeholder="Enter description for your community" required />
                </div>
            </div>
            
            
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-createcommunity">Add community</button>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
             
            </form>
        
</div>		  
</div>
  <br> 
</div>    	 
      
</BODY>
</HTML>