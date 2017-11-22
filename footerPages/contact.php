<!DOCTYPE html>
<HTML>
<HEAD>

<?php include("../head/header_css.php")?>
<?php include("../head/header_standardlibrary.php")?>
<?php include("../head/header_jqueriesscript.php")?>
<?php include("../head/header_contactusscripts.php")?> 
    <TITLE>
       Contact
    </TITLE>
</HEAD>
<BODY>
<div class="container col-md-12">
  
     <div class="row">   
<nav class="navbar navbar-inverse navbar-static-top navbar navbar-default" role="navigation" style ="border-radius: 5px; background-color:#003333; color:white; padding-right:4px">

        <div class="navbar-header">
     
      <a class="navbar-brand" href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Komoe</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
         
      <div class="collapse navbar-collapse" >
       
    <ul class="nav navbar-nav">
      <li class="active" ><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>     
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0">Buy</a></li>
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/swap/swaps.php?page=0">Swaps</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/gift.php?page=0">Gift</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">List item</a></li> 
<!--      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li>             -->
       </ul>
           
        <ul class="nav navbar-nav navbar-right  ">
        <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>	
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>
        <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0">My page</a></li>
       </ul>   
         
      </div>  
      </nav>        
</div>
        
      
 <form action="/komoecontainer/comoeandfoldertree/komoeEng/contact/insertcontactusqueries.php" method="POST" enctype="multipart/form-data">
    
 <div class="col-md-6 col-md-offset-3">
 <table class="table"> 	 

  <tr class="success">  
      <td>
  <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
               <input type="text" name="c_name" class="form-control" placeholder="Enter your name" required />
                </div>
    </div>
      </td>
 </tr> 
     	
<tr class="success">
    <td>
 <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
               <input type="text" name="c_address" class="form-control" placeholder="Enter your address" required />
                </div>
 </div>
    </td>
 </tr> 
  </table>
          
 </div><!--end div for form group col 6-->     
          
              
 <div class="col-md-6 col-md-offset-3">
	       <table class="table"> 	     	
         <tr class="success">	
             <td>
	 <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
               <input type="text" name="c_telephone" class="form-control" placeholder="Enter your telephone" required />
                </div>
         </div>
             </td>
         </tr> 
	
	  <tr class="success">               
               <td>
		 <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
               <input type="text" name="c_email" class="form-control" placeholder="Enter your email" required />
                </div>
          </div>
            </td>
      </tr> 
	
	    <tr class="success">
	  
	    
<!--          <div class="form-group">
             <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-info-sign"></span></span>
               <input type="text" name="query_category" class="form-control" placeholder="Query category" required />
                </div>
           </div>-->
        
            <td>
                <div class="form-group">  
                <select class="form-control" id="query_category" name="query_category">        
             </select> 
                        </div>
             </td> 
    
	 	 </tr> 
                      
                      
         <tr class="success">
                           
                            <td>
		   <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-comment"></span></span>
             <textarea cols="40" row="100" name="c_Note" id="sellerNote" class="form-control" placeholder="Your note:" required /></textarea>
                </div>
            </div>
                       </td> 
	 	      </tr>
                      <tr>
                          <td>
                              <div class="form-group">
             <div class="input-group">
                              <div class="col-md-3 col-md-offset-5" width ="20px">
                    <input type="submit" name="submit"/>                    
                        </div> 
                </div>
                 </div>
                                  
                          </td>
                      </tr>
	      </table>
	    

 </div>
	        <div class="form-group">
             <hr />
            </div>
 <br>
    </div>
 </form>
    <br><br>
</BODY>
  <?php include("../footerPages/footer_page_contactus.php")?>
    
</HTML>