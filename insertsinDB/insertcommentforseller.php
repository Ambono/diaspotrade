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
background-color: silver
}
jumbotron {
background-color: #33D7FF
}
</style> 
             
  <script type="text/javascript">
  var jsonData = {
      "Table": [{
          "stateid": "Texas",
          "statename": "Texas"
      }, {
          "stateid": "Louisiana",
          "statename": "Louisiana"
      }, {
          "stateid": "California",
          "statename": "California"
      }, {
          "stateid": "Nevada",
          "statename": "Nevada"
      }, {
          "stateid": "Massachusetts",
          "statename": "Massachusetts"
      }]
  };
     $(document).ready(function () {
         var listItems = '<option selected="selected" value="0">- Select -</option>';
      for (var i = 0; i < jsonData.Table.length; i++) {
            // listItems += "<option value='" + jsonData.Table[i].stateid+ "'>" + jsonData.Table[i].statename  + "</option>";
             listItems += "<option value='" + jsonData.Table[i].stateid+ "'>" + jsonData.Table[i].statename  + "</option>";
         }
         $("#DLStateOrigin").html(listItems);
         $("#DLStateDestination").html(listItems);
		 $("#countryorigin").html(listItems);
         $("#countrydestin").html(listItems);
     });
  </script>

	
  <script>
  $( function() {
    $( "#datepickeravailfrom" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#datepickeravailto" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>

</HEAD>
<BODY>
<div class="container">
 
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Komoe</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/index.php">Home</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/productdetails/Product.php">Register item</a></li>
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/deals/Deals.php">Deals</a></li>
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/buys/Buy.php">Buy</a></li>
      <li class="active"><a href="Sell.php">Sell</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/gifts/Gifts.php">Gifts</a></li> 
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/help/Help.php">Help</a></li> 
      <li ><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/SignIn.php">Sign in</a></li>
      <li><a href="/komoecontainer/comoeandfoldertree/komoeEng/loginlogout/logout.php">Log out</a></li>  	  
    </ul>
  </div>
</nav>
 <div class="jumbotron">
    <h1>Hello on register item page!</h1>
    <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile-first projects on the web.</p>
  </div>
  

<?php 
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "komoe1"; 

 session_start();
       
  if(isset($_SESSION['login_user'])){
	   $username =$_SESSION['login_user'];	  
	   }elseif(isset($_POST['author']))
           {
                   $username='$_POST[author]';              
           }
           else{
               $username ='unknown'; 
           }
	   
$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
  $query = "select Name, Email from seller sl inner join productdetails pd 
  on sl.Email = pd.SellerEmail and pd.Id ='$_POST[hiddenforid]' order by Name, Email";

 $result = mysqli_query($con, $query);
 
 $row = mysqli_fetch_assoc($result);
  $name = $row['Name'];
 echo'' .$name;
   $Email = $row['Email'];
   echo"<br>" ;
 echo'' .$Email;
 
if (!mysqli_query($con, $query))
  {
  die("Error While selecting seller details on the server: ".mysql_error()); 
  }  
else{	
	echo'' .$name;
   $Email = $row['Email'];
   echo"<br>" ;
    echo'' .$Email;
	echo"seller details fetched";
	  echo"<br>" ;
	 
    }
 
  $sellerName=$name;
  
  $sellerEmail= $Email;
  
  $sql = "INSERT INTO reviewsseller(SellerName, SellerEmail, Comment, Author, Date, Mark, Pid)
 VALUES( '$name','$Email','$_POST[customerNote]','$_SESSION[login_user]',now(),  '$_POST[sellerMark]','$_POST[hiddenforid]')";   
  
 if (!mysqli_query($con, $sql))
  {
  die("Error While uploading comment on the server: ".mysql_error()); 
  }  
else{
   echo "comment inserted"; 
    }
    header("Location: /komoecontainer/comoeandfoldertree/komoeEng/choices/Choicedetails.php?id=$_POST[hiddenforid]");   
  ?> 
  
  <footer>  
  <span>&copy Komoe 2016</span>  
  </footer>
</BODY>
</HTML>
 