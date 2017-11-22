<html>
    <head>
	
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="mystylesheet.css">
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script> 
 
<link rel="stylesheet" 
href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" 
src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/searchangularcontrollers.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/updateshopRemove.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/updateshopUpdate.js"></script>
      
<title>My shop's items</title>

    </head>
    <body>
        <table cellpadding="2" cellspacing="4" border="solid navy 4px" id ="bookeditemstbl" class= "table table-hover" >
        <thead>
            <tr>         
               <td>Id</td>          
                <td bgcolor="#00FF00">Description</td>  
                <td>Image</td>  				
                <td>Buyer name</td>
                <td>Buyer email </td>
                 <td>Buyer telephone</td>    
            </tr>
        </thead>
        <tbody>
<?php include("../config/config.php")?>
<?php
  session_start();
      if( $_SESSION['login_user']!= null)
   {  
	 $user = $_SESSION['login_user'];	 
	// echo  $user;
   }
   
/**
	   $query_Select = "select sh.ProdId as shProdId, pd.Description as pdDescription, pd.ProdImage as pdProdImage,
	   sh.UserName as shUserName, sh.Date as shDate, sh.ShoppingID as shShoppingID, u.Name as uName, u.Email as uEmail, u.Telephone as uTelephone  
	   from shoppingtbl sh inner join users u 
	   on sh.UserName = u.Name 
	   inner join productdetails pd 
	   on sh.ProdID = pd.Id 
	   where sh.ProdID in (select Id from productdetails where SellerEmail = (select Email from users where Name = '$user') )and sh.IsConfirmed like '%N%'
	   order by sh.ProdId, pd.Description, pd.ProdImage, sh.UserName, sh.Date, sh.ShoppingID, u.Name, u.Email, u.Telephone desc" ;
	   **/
	   
	   
	     $query_Select = "SELECT distinct sh.ProdId as shProdId, pd.Description as pdDescription, pd.ProdImage as pdProdImage, sh.ProdId as shProdId, sh.UserName as shUserName,
	   sh.Date as shDate, sh.ShoppingID as shShoppingID, u.Name as uName, u.Email as uEmail,
	   u.Telephone as uTelephone FROM productdetails pd inner join shoppingtbl sh on sh.ProdID = pd.Id 
	   inner join users u on sh.UserName = u.Name 
           inner join seller sl on pd.Id= sl.prodID           
       WHERE  sl.Name ='$user' 
            AND Availuntil <= DATE_SUB(now(), INTERVAL 60 DAY) and sh.IsConfirmed like '%Y%' 
	   order by sh.ProdId, pd.Description, pd.ProdImage, sh.UserName, sh.Date, sh.ShoppingID, u.Name, u.Email, u.Telephone desc ";
	   
	$result = mysqli_query($connect, $query_Select); 
//$data = array();

while ($row = mysqli_fetch_array($result)) {
  ?>
                    <tr>                               
                    <td><?php echo $row[0]?></td>
                    <td bgcolor="#00FF00" contenteditable='true' ><?php echo $row[1]?>
                   
                    <td><?php echo  '<a href="#" ><img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/'.$row[2].'.JPG" alt="This pic is not available"  id="the_idprimary" width="80" height="60" onclick="loadimages(this.id)"/></a>'?></td>
                      <td><?php echo $row[3]?></td>
                    <td><?php echo $row[7]?></td>
                    <td><?php echo $row[8]?></td>                   
                                       
                    </td>
                    <td>                      
                    <input name="deleteshopitem" type="submit" id="detailshopitem" value="Details" >
                    </td>                                         
                </tr>               
<?php }?>

            </tbody>
            </table>
    </body>
  
</html>
    
        

