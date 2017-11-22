<?php
include("../config/config.php");
if(!isset($_SESSION)){
    session_start();
}
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['token_temp_user'])){  
    $user =   $_SESSION['token_temp_user'];
     echo  $user;
 }
 
 elseif(isset($_SESSION['login_user'])){
	    $user =$_SESSION['login_user']; 	
	   }

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
$user_ip = getUserIP();

 $queryvisitors = "insert into sitevisits(visitor_session, Date, usertype, IPs) values(' $user', now(),'visitorRandonOneClick','$user_ip')";
 $result_sessions = mysqli_query($connect, $queryvisitors);
?>
<!DOCTYPE html>
<HTML>
<HEAD>
    
<?php include("../head/header.php")?>
<?php include("../head/header_angulars.php")?>
<?php include("../head/header_css.php")?>
<?php include("../head/header_searchenginescript.php")?>
<?php include("../head/header_standardlibrary.php")?>
<?php include("../head/header_jqueriesscript.php")?>
<TITLE>Komoe Buys</TITLE> 

		
</HEAD>

<BODY> 	
<div class="container col-md-12"> 
    
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
    <ul class="nav navbar-nav  ">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>     
      <li class="active"><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0">Buy</a></li>
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/swap/swaps.php?page=0">Swaps</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/gift.php?page=0">Gift</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">List item</a></li>
    </ul>
 
    <ul class="nav navbar-nav navbar-right"> 
         <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>	
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>
        <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0">My page</a></li>
         
      </ul>   
            
      </div>  
      </nav>        
</div>

    <div class="">
          
            <div class="col-sm-3 col-md-3 pull-right" >
        <form class="navbar-form" role="search" id="sellerform" method="POST" action="/komoecontainer/comoeandfoldertree/komoeEng/search/ItemSearchResult.php?page=0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search item" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
            </div>
          
          
          
            <div class="col-sm-3 col-md-3 pull-left">
        <form class="navbar-form" role="search"  id="sellerform" method="POST" action="/komoecontainer/comoeandfoldertree/komoeEng/search/ShopSearchResult.php?page=0">
        <div class="input-group">
            <input type="search" placeholder="Find a shop" class="form-control" name ="Shopname" id ="Shopname" >
            <div class="input-group-btn">
                <button class="btn btn-info" name="searchButton" id ="searchButton" style = "background-color: buttonshadow"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
            </div>
      </div> <!-- container -->
    <div class="jumbotron"> 		

</br>
    <p align = "right">Hello <?php include("../session/sessionloginuser_show_EmptyName.php") ?>, <br>welcome!</p>
<p>Sell and Buy as you holiday. sell and buy from the tourist.</p>	
  </div> 
  <div class ="">
  		  <br>
           <div id="App1" ng-app="retrievingApp" ng-controller="dbCtrl">   
		   <p align="center" > <i class="fa fa-4x fa-spinner fa-spin" ng-show="prodID==0" ></i></p>
		
	  
	  <!--<input id="pagination" name ="pagination" type="button" value="Paginate" class="btn btn-sm btn-info" /> -->
	   
	    <input type ="hidden" name ="ordercontent" Id ="ordercontent">
	  
	  <input type ="hidden" name ="prodId" Id ="prodIDinput"> 
	 	
	    
		 
         <table class="success">
          <tr>
          <td><span color ="navy">Refine result: </span></td>       
          <td><input type ="search" id="searchinput" name="searchinput" ng-model="shopsearch"/></td>       
          </tr> 
	  </table>
		 </br></br> 
	<div class ="" ng-cloack>
            <table class= "table table-hover" id= "prodtbl" name = "prodtbl">
                <tbody>	
                    <tr ng-repeat="product in data | filter: shopsearch " ng-model ="prodID" ng-init="default">				 
                        <td> {{product.Id}}
                        </td>                    
                        <td>
                            {{product.Description}} </br>
                            Size: {{product.Size}}</br>
                            Origin: {{product.CountryOrig}}</br>                           
                        </td> 
                        <td>
                            <img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/{{product.ProdImage}}.JPG" width="100px" height="100px"/>
                        </td>
                        <td>
                            Destination: {{product.CountryDestin}} (city: {{product.CityDestin}})</br>
                            Available from: {{product.Availfrom}}</br>
                            Price: {{product.Price}}</br>
                            Available until: {{product.Availuntil}}</br>
                         <button  id ="addProductbtn" name="AddProductbtn" class="btn btn-success btn-sm glyphicon glyphicon-shopping-cart" />            
                              <span id ="myspan">Select</span> </button>
			   <button  id="detailpagebtn" name="detailpagebtn" class="btn btn-info btn-lg" />
                           <a href='/komoecontainer/comoeandfoldertree/komoeEng/choices/Choicedetails.php?id={{product.Id}} page=<?php echo "".$_GET['page'].""?>'>
                               Details</button>
                          </td>
                	</tr>			
                </tbody>
                    <tfoot>
                    <th>
		  
   <?php  include("../pages/PagesSet.php")?>
        
	          </th>
   
                </tfoot>
           </table>         
        </div>
        </br>
                 </br></br>	
        </div>
       
     
		<div class="row col-md-8" align="center">
			<table  class="table table-striped"  id="myTable" style="width:250px; border:4px; border-spacing: 50px"  >
			<!--<caption style="color: red">Your basket</caption>--> 
			<tr>
		  	<td padding= "10px">			
			<input id="ButtonRefresh" name ="ButtonRefresh" type="button" value="View basket" class="btn btn-sm btn-success" /> 
            </td> 
           		
             <td padding= "10px">			
			<input id="ButtonConfirmBasket" name ="ButtonConfirmBasket" type="button" value="Confirm basket" class="btn btn-sm btn-success" /> 
             </td>             
             <td>			
			<input id="ButtonCancelBasket" name ="ButtonCancelBasket" type="button" value="Cancel basket" class="btn btn-sm btn-danger" /> 
             </td>
            </tr> 
                             
           </table>            
 		<div id ="basketdivrefresh">	
                       </div>
                    <br><br>			
                     <br><br>
	       </div><!--end col-md-8-->		
	
		       
      </div><!--end retrieving app-->
    
     </div><!--container-->
   <br><br>			
     <br><br>
  </BODY>      
</HTML>
 <?php include("../footerPages/footer_page.php")?>