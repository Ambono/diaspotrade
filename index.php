 <?php
include("./config/config.php");
ob_start();
if(!isset($_SESSION)){
    session_start();
}
$_SESSION['token_temp_user'] = session_id();
 if(isset($_SESSION['login_user'])){  
    $user =   $_SESSION['login_user'];
     echo  $user;
 } 
 elseif(isset($_SESSION['token_temp_user'])){
	    $user =$_SESSION['token_temp_user']; 
	 echo  $user;
	   }
           
  $query_delete = "DELETE from searchcriteria where where Date >= DATE_SUB(now(), INTERVAL 2 DAY)";
//$result = mysqli_query($connect, $query_delete);
           
 $deletecarousel = mysqli_query($con, "delete from carouseltbl where Date >= DATE_SUB(now(), INTERVAL 2 DAY)");
      
 
$result = mysqli_query($con, "select distinct ProdImage from productdetails 
               where 
                Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY)
                  order by rand() limit 5 "  );             
          $i = 1;
           while($row = mysqli_fetch_array($result)){
    $insert_q = mysqli_query($con, "INSERT into carouseltbl 
            ( Date, intId, picname, username)
                   values
           (Now(), '$i', '$row[ProdImage]', '$user')" );
    
    $i++;
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

 $queryvisitors = "insert into sitevisits(visitor_session, Date, usertype, IPs) values('$user', now(),'registered','$user_ip')";
 $result_sessions = mysqli_query($connect, $queryvisitors);
?>
<!DOCTYPE html>
 <HTML>
<HEAD>
<?php include("./head/header.php")?>
<?php include("./head/header_angulars.php")?>
<?php include("./head/header_css.php")?>
<?php include("./head/header_searchenginescript.php")?>
<?php include("./head/header_standardlibrary.php")?>
<?php include("./head/header_jqueriesscript.php")?>
<TITLE>Komoe home</TITLE>	
</HEAD>
<BODY>
     <div class="container col-md-12" style ="background-color: #003333">
         <div class=" quicksearch">
        <span style="color:blueviolet; margin-left:50px;"><b>Quick search</b></span>
        <form class="navbar-form" role="search"  id="sellerform" method="POST" action="/komoecontainer/comoeandfoldertree/komoeEng/search/ShopSearchResult.php?page=0">
        <div class="input-group">
            <input type="search" placeholder="Find a shop" class="form-control" name ="Shopname" id ="Shopname" >
            <div class="input-group-btn">
                <button class="btn btn-info" name="searchButton" id ="searchButton" style = "background-color: buttonshadow"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>          
        </form>
 
        <form class="navbar-form" role="search" id="sellerform" method="POST" action="/komoecontainer/comoeandfoldertree/komoeEng/search/ItemSearchResult.php?page=0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search item" name="srch_term" id="srch_term">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>          
        </form>
        <br>
     </div>     
     </div>
   
<form action="/komoecontainer/comoeandfoldertree/komoeEng/productdetails/ProductDetailsFetcher.php"  method="post">
<input type="hidden" id ="sessiontempuser" name="sessiontempuser" value='failed' />
</form>
     
  <div class="col-md-12"> 
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
      <div class="col-md-9 col-md-offset-2">    
    <ul class="nav navbar-nav">
        <a href="Needed/listneeded.php"></a>
      <li class="active" ><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>     
   <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=1">Buy</a></li>
<!--   <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php">Buy</a></li>-->
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/swap/swaps.php?page=0">Swaps</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/gift.php?page=0">Gift</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">List</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/Needed/needed.php?page=1">Needed</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/Needed/listneeded.php">Order</a></li>  
        <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>	
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/registration/Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	<li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>
        <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0">My page</a></li>
       </ul> 
      </div> 
      </div>
      </nav>        
</div>
  </div> 
    
    <style>
        .marquee {    
    white-space: nowrap;
    -webkit-animation: rightThenLeft 10s linear;
}
    </style>
    <div class="col-md-8 col-md-offset-2" style="border-radius: 10px; color: maroon ; margin-bottom:20px; font-size:16px">
        <marquee behavior="left" scrollamount ="6" scrolldelay="200"><span class="marquee">List your items here when you travel. This site will help you find who is interested in buying,
                bartering or who you can give away to on your arrival.
        </span></marquee>            
    </div>
   
    <div class="row">       
    <div class="col-md-9 col-md-offset-3">
    <div class="col-md-3">
<div id="myCarousel" class="carousel slide" data-ride="carousel" >		
<!--   Indicators -->
<span style="color:green">Listed now!</span>
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

<!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src = "<?php include("/carousel/carouselPic5.php")?>" class="imgclass"/>
    </div>
      
   <div class="item">   
      <img src = "<?php include("/carousel/carouselPic1.php")?>" class="imgclass"/>
    </div>

    <div class="item">
   <img src = "<?php include("/carousel/carouselPic2.php")?>" class="imgclass"/>
    </div>

    <div class="item">
       <img src = "<?php include("/carousel/carouselPic3.php")?>" class="imgclass"/>
    </div>

    <div class="item">
      <img src = "<?php include("/carousel/carouselPic4.php")?>" class="imgclass"/>
    </div>
  </div>

<!--   Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>  
 
  <div id="App1" ng-app="retrievingAppForIndex" ng-controller="dbCtrl" >   
      <p align="center" > <i class="fa fa-4x fa-spinner fa-spin" ng-show="prodID==0" ></i></p>	  
	  
	 	<p align="center" > <i class="fa fa-4x fa-spinner fa-spin" ng-show="prodID==0" ></i></p>
         
	   <div class="col-md-4  ng-cloack">
  <table class = "" id= "prodtbl" name = "prodtbl" 
    style=" 
/*    border-radius: 5px;*/
    border:none;
    width: 50%;
    height:auto;
    margin: 0px auto;
    float: none;
    background-color:white ;">
                <tbody>				
                    <tr ng-repeat="product in data | filter: shopsearch" ng-model ="prodID" ng-init="default">			 
               
                    
                      
                        <td style="color:grey">
                            <span style="color:green"> {{product.Description}}</br></span> 
                        Destination: <br>{{product.CityDestin}}<br>
                       Expires: <br>{{product.Availuntil}}</br>
                        </td>
                        <td>
                      <img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/{{product.ProdImage}}.JPG" width="100px" height="100px"/>
                        </td>
                        <td>
                        {{product.Price}}
                        <br><br>

                      <a href='/komoecontainer/comoeandfoldertree/komoeEng/choices/Choicedetails.php?id={{product.Id}} 
                              '> Book this</a>
                              
                        </td>
                        </tr>			
                </tbody>			
           </table>
         </div>
</div>   
</div>
</div>

    <br>
<form action="/komoecontainer/comoeandfoldertree/komoeEng/choices/Choicedetails.php"  method="post">
<input type="hidden" name="page" value="page=0" />
</form>      
    <br>
<div class="col-md-8 col-md-offset-2" style="margin-bottom: 10px">  
  <form method="POST" action="/komoecontainer/comoeandfoldertree/komoeEng/search/insertsearchcriteria.php" enctype="multipart/form-data">
      <div  class="" align="center" width ="50px" >     
      <!--country_destin -->       
<div class="searchengine">
     <span style="color:blueviolet"><p><b>Selective search</b></p></span>
    <br>
    <div class="input-group">
     <div class="form-group">
<select class="form-control" id="country_destin" name="country_destin">    
 </select> 
     </div>
    </div> 
    <br>
  
     <!--gender --> 
     
   <div class="input-group">
      <div class="form-group">
<select class="form-control" id="gender"  name="gender_search">     
</select> 
     </div>
     </div>
 
     <br>
  
 <!--productcategory -->


     <div class="input-group">
      <div class="form-group">
  <select class="form-control" id="productcategory" name="product_category">     
</select>  
      </div>
     </div>
 <br>
 <!--item type -->
  <div class="input-group">
      <div class="form-group">
          <check> <input type="checkbox" name="Buy" value="Yes"  /> Buy</check>
          <check> <input type="checkbox" name="Gift" value="Yes"  />  Gift</check> <br>
          <check> <input type="checkbox" name="Swap" value="Yes"  />Swap</check><br>
      </div>
     </div>
 <br>
 <button style = "color: darkmagenta; width:50%" type="submit" class="btn btn-info" name="viewselected">
     <span>Select</span>
 </button>
 <br><br>
</div>
 </div>  
    
  </form>

 </div>

</BODY>
<?php include("./footerPages/footer_page.php")?>
</HTML>
