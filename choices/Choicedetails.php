<?php
session_start();
ob_start();
include("../config/config.php");



   if( isset($_SESSION['login_user']))
   {  
	 $user = $_SESSION['login_user'];
   }else{
       $user = session_id();
   }

    $mydate= date("Y-m-d h:i:sa");
   
     $sql = "INSERT INTO username_productid( username,prodID, Date)
	  VALUES('$user','".$_GET['id']."','$mydate' )";

	 if (!mysqli_query($connect, $sql))
	  {
	  die("Error : ".mysql_error()); 
	  }  
	else{
	  // echo "1 record added"; 
        }

?>

 <!DOCTYPE html>
<HTML>
<HEAD>   

<?php include("../head/header_angulars.php")?>
<?php include("../head/header_css.php")?>
<?php include("../head/header_searchenginescript.php")?>
<?php include("../head/header_standardlibrary.php")?>
<?php include("../head/header_jqueriesscript.php")?>
<?php include("../head/scripts.php")?>

<TITLE>Komoe welcome</TITLE>
 
</head>
<body ng-app="RoutingApp" ng-controller="SellerNoteController">

    
    <script>
        
        </script>
<div class="container col-md-12">

<div class ="row">
    
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
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0">Buy</a></li>
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
</div><!--row-->

 <div class="well well-sm">
    <h1>hello <?php include("../session/sessionloginuser_show_EmptyName.php") ?>. <br>Details of your item</h1>
<p>Sell  as you holiday.</p>
 </div> 
<br> 

 <script>
  function loadimages(id){
	 document.getElementById("containerpics").innerHTML="";	 
	   var t = document.getElementById(id).src;
	    var x = document.createElement("IMG");
	    x.setAttribute("src", t);
	    x.setAttribute("width", "404");
	    x.setAttribute("height", "328");	
	    x.setAttribute("alt", "my pic");
	 
	 document.getElementById("containerpics").appendChild(x);

	 }

  function setfocus() {
	    document.getElementById("containerpics").focus();	 
	}
 </script>


<script>

$(document).ready(function() {
	$('#the_idprimary').click(function(){
		$('html, body').animate({ scrollTop: $('#containerpics').offset().top }, 'slow');
	});

	$('#the_idfirstoptional').click(function(){
		$('html, body').animate({ scrollTop: $('#containerpics').offset().top }, 'slow');
	});

	$('#the_idsecondoptional').click(function(){
		$('html, body').animate({ scrollTop: $('#containerpics').offset().top }, 'slow');
	});
	
	});
</script>

<style type="text/css">
td
{
    padding:0 15px 0 15px;
}
</style>

<script>
img[src=""]{
    display:"../images/DefaultImage.JPG ";
}
</script>
<form action="../basket/addtobasketDetailPageVersion.php"  method="post">
<input type="hidden" name="page" value="<?php $page = false;
if(isset($_POST['page'])){
    $page = $_POST['page'];
 } 
    echo $page;?>" />
</form>
 <div class="col-md-12">
 <div>
<table align="center">
<tr>
<td><button  id="addtobasket" name="addtobasket" class="btn btn-info btn-lg" />
<a href='../basket/addtobasketDetailPageVersion.php?id=<?php  echo"".$_GET['id'].""?>'>Add to basket</a></button> 
 </td> 
 <td><button  id="backtoprevious" name="backtoprevious" class="btn btn-info btn-lg" />
<a href='../basket/addtobasketDetailPageVersion.php?id=<?php  echo"".$_GET['id'].""?>'>Back</a></button> 
 </td>
</tr>
</table>
     <br>
<table align ="center">
<tr align ="center"><td><a href="#/seller" >Seller's info</a></td></tr>
</table>
</div>

<div align="center">
<br> 
    <ng-view></ng-view>  
</div>
</div>

<div align ="center">
<div class="row">
<?php 
include("../productdetails/displayproductdetails.php");
?>
</div>
<div class ="row">	
<br><br>
<div id ="containerpics" class ="col-md-12"  >
</div>
</div>

  
 
<div class="row col-md-8 col-md-offset-2">

 <style>
button.accordionreviews {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordionreviews.active, button.accordionreviews:hover {
    background-color: #ccc; 
}

div.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
}
</style>


    

<button class="accordionreviews">Product review</button>
<div class="panel">
 <button  id="rateproductbtn" name="rateproductbtn" class="btn btn-info btn-lg" />
 <a href='../productdetails/RateProduct.php?id=<?php  echo"".$_GET['id'].""?>'>Rate/comment product</a>
 </button>

    
 
 <div class="row">
 <div class ="col-md-12">
   <div class ="comments">
<?php 
include("../review/displayreview.php");
 ?>
   </div>
 <div class ="comments">
  <?php
include("../comments/displaycomments.php");    
 ?>
 </div>
</div>
</div>
</div>

<button class="accordionreviews">Seller review</button>
<div class="panel">
  <button  id="ratesellerbtn" name="ratesellerbtn" class="btn btn-info btn-lg" />
 <a href='../productdetails/RateSeller.php?id=<?php  echo"".$_GET['id'].""?>'>Rate/comment seller</a>
 </button>
 <div class="row">
 <div class ="col-md-12">
 <div class="comments">
<?php 
include("../review/displayreviewforseller.php");
 ?>
 </div>
 <div class ="comments">
  <?php
include("../comments/displaycommentsforseller.php");    
 ?>
   </div>
   </div>
   </div>

</div>    
 </div>
</div>

<script>
var acc = document.getElementsByClassName("accordionreviews");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}
</script>   
    
</BODY>
 <?php include("../footerPages/footer_page.php")?>
</HTML>



