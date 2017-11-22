 <?php
include("../session/sessionmanager.php") ;
?> 
<!-- https://plnkr.co/edit/CtMucCAfuxb8JHO5Buci?p=preview -->
 <!DOCTYPE html>
<HTML>
<HEAD>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

 <script src="https://code.angularjs.org/1.5.6/angular.js"></script>

  <script src="https://code.angularjs.org/1.5.6/angular-route.js"></script>
  
  <script type="text/javascript" src="script/script.js"></script>

 
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Choice details</title>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="dist/css/magnify.css" rel="stylesheet" type="text/css">
<style>
.magnify { width:480px; height:852px; margin:30px auto;}
h1 { margin-top:150px; text-align:center;}
</style>

<TITLE>Komoe welcome</TITLE>
<style>
.image{
width:150px;
}
.zoom{
width:0px;
position:absolute;
transition: width 0.3s linear 0s;
border-style: intset;
}
.image:hover +.zoom{
width:500px;
}

footer {
background-color: silver
}
jumbotron {
background-color: #33D7FF
}
 
/* CSS only gallery (using radio inputs)
* See http://css-tricks.com/forums/topic/click-thumbnail-and-make-it-larger-image-image-gallery-wo-javascript/
* Support needed for IE7 & older - see http://css-tricks.com/child-and-sibling-selectors/
*/
.wrapper {
    width: 700px;
    position: relative;
}
.wrapper .thumbnails {
    width: 150px;
    float: right;
}
.wrapper a {
    margin: 2px;
}
.wrapper img {
    border: 1px solid #000;
}
.wrapper label > img {
    opacity: 0.6;
}
.wrapper label > img:hover {
    opacity: 1;
}
.wrapper input {
    display: none;
}
.wrapper input:checked + .full-image {
    display: block;
}
.wrapper input:checked ~ img {
    opacity: 1;
}
.wrapper .full-image {
    display: none;
    position: absolute;
    top: 0;
    left: 0;
}
.wrapper .description {
    width:95%;
    padding:5px;
    background-color:#DDDDDD; 
}
 
 #containerpics{
/*border: solid 2px;
margin-left: 350px;
top: 50px;
align : center;
position: relative;*/
}
#comments{
border: solid silver 2px;
width:400px;
heigt: auto;
 margin: 15px;
}
 .row{
 margin-bottom: 15px;
 }
</style>
 
</head>
<body ng-app="RoutingApp" ng-controller="SellerNoteController">

<div class="container">
 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Komoe</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>
	   <!--<li><a href="Product.php">Register item</a></li>-->
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/deals/Deals.php">Deals</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/sellers/Sell.php">Sell</a></li> 	  
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php?page=0">Buy</a></li> 
	  <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/mypages/mypage.php?page=0">My Page</a></li> 
	  <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php">Sign in</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/choices/Choices.php">Choice</a></li>  
    </ul>
  </div>
</nav>

 <div class="well well-sm">
    <h1>hello <?php include("../session/sessionloginuser.php") ?>. <br>Details of your item</h1>
<p>What deal suit you from somebody going back from holiday?</p>
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
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="dist/js/jquery.magnify.js"></script>
<script>
$(document).ready(function() {	
});
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
    display:"http://localhost:81/workspacenetbean/komoe/images/DefaultImage.JPG ";
}
</script>
<form action="/komoecontainer/comoeandfoldertree/komoeEng/basket/addtobasketDetailPageMypage.php"  method="post">
<input type="hidden" name="page" value="<?php $page = false;
if(isset($_POST['page'])){
    $page = $_POST['page'];
 } 
    echo $page;?>" />
</form>
 <div class="col-md-10">
 <div>
<table align="center">
<tr>
<td><p><button  id="addtobasket" name="addtobasket" class="btn btn-info btn-lg" />
<a href='/komoecontainer/comoeandfoldertree/komoeEng/basket/addtobasketDetailPageMypage.php?id=<?php  echo"".$_GET['id'].""?>'>Add to basket</a></button> 
 </p></td> 

<td><a href="#/seller" >Seller note</a></td>
</tr>
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
<div class="row">
 <p><button  id="rateproductbtn" name="rateproductbtn" class="btn btn-info btn-lg" />
     <a href='/komoecontainer/comoeandfoldertree/komoeEng/productdetails/RateProduct.php?id=<?php  echo"".$_GET['id'].""?>'>Rate this product or add comment</a>
 </button>
 </p>
 </div>

    
 <div class ="col-md-12">
<?php 
include("../review/displayreview.php");
 ?>
 <div id ="comments">
  <?php
include("../comments/displaycomments.php");    
 ?>
 </div>
</div>
	
</div>

 <footer class="well well-sm col-md-12 text-center">  
  <span>&copy Komoe 2016</span>  
  </footer>  
</div>

</BODY>
</HTML>