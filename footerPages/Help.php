<!DOCTYPE html>
<HTML>
<HEAD>
    <?php include("../head/header.php")?>
<?php include("../head/header_angulars.php")?>
<?php include("../head/header_css.php")?>
<?php include("../head/header_searchenginescript.php")?>
<?php include("../head/header_standardlibrary.php")?>
<?php include("../head/header_jqueriesscript.php")?>
    <TITLE>
        Help
    </TITLE>
<!--     <style>
button.accordion {
    background-color:greenyellow;
    color: blueviolet;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ccc;
}

button.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

button.accordion.active:after {
    content: "\2212";
}

div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
</style>-->
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
        
    <style>     
button.accordion {
    background-color:greenyellow;
    color: blueviolet;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ccc;
}

button.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

button.accordion.active:after {
    content: "\2212";
}

div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
</style>
<br>
<div class='col-md-6 col-md-offset-3' style ="align: center">
<div class='row'>   
<button class="accordion">Morgan's sale technic</button>
<div class="panel">
    <span class="textbox" id="Brief1" readonly></span>
</div>
</div>
    <div class='row'>
<button class="accordion">Yama's shop</button>
<div class="panel">
    <span class="textbox" id="Brief2" readonly></span>
</div>
  </div>
   <div class='row'>  
 <button class="accordion">Meena's gifts</button>
 <div class="panel">
    <span class="textbox" id="Brief3" readonly></span>
</div>
   </div>
  
    <div class='row'>     
<button class="accordion">Louis' barterings</button>
<div class="panel">
    <span class="textbox" id="Brief4" readonly></span>
</div>
</div>
 </div>
    
      <script>          
           $( "#Brief1" ).load( "/komoecontainer/comoeandfoldertree/komoeEng/Texts/text1.txt" );
           $( "#Brief2" ).load( "/komoecontainer/comoeandfoldertree/komoeEng/Texts/text2.txt" );
           $( "#Brief3" ).load( "/komoecontainer/comoeandfoldertree/komoeEng/Texts/text3.txt" );
           $( "#Brief4" ).load( "/komoecontainer/comoeandfoldertree/komoeEng/Texts/text4.txt" );
       
       </script>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}
</script>
 
    
    </div>
    
<?php include("../footerPages/footer_page.php")?>
</BODY>
</HTML>