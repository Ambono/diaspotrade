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

        <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/searchangularcontrollers.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/updateshopRemove.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/updateshopUpdate.js"></script>
      
<title>My shop's items</title>

    </head>
    <body>
        <table cellpadding="2" cellspacing="4" border="solid navy 4px" id ="owneritemstbl"  class= "table table-hover" >
        <thead>
            <tr>         
               <td>Id</td>          
                <td bgcolor="#00FF00">Description(editable)</td>                 
                <td>Size</td>
                <td>Colour</td>
<!--                 <td>Gender</td>-->
                <td>Image</td>               
<!--                <td>avail from</td>                   
                <td>avail until</td>                                    -->
               <td bgcolor="#00FF00">Price(editable)</td> 
               
            </tr>
        </thead>
        <tbody>
<?php 
include("../config/config.php");

  session_start();
      if( $_SESSION['login_user']!= null)
   {  
	 $user = $_SESSION['login_user'];	 
	// echo  $user;
   }
	   
	$resultpage = mysqli_query($connect,"SELECT PageToFetch FROM paginator WHERE UserName = '".$user."'  order by Id desc limit 1");     
	$retpageval = mysqli_fetch_array($resultpage);
          
        $rec_limit = 10; //number of rows to return
          
        $offset = 0;
        $pageclicked =0;		
        $pageclicked = $retpageval[0]; 

	 if(!empty($pageclicked)) {            
          $offset = $rec_limit * (int)$pageclicked;
         }else {           
       $offset = 0;
         } 
         
$result = mysqli_query($con, " SELECT pd.Id, pd.Description Description, pd.Name, Size, Colour, Gender, ProdCondition, ProdImage, pc.CountryOrig, pc.CountryDestin, pc.CityDestin, ProdImagePath, Availfrom, Availuntil, Price, s.SellerEmail, s.SellerPhone, DeliveryPlace FROM productdetails pd 
inner join seller s on pd.Id = s.prodID 
inner join prodcountries pc on pd.Id = pc.prodID
 where Availuntil >= DATE_SUB(now(), INTERVAL 100 DAY) 
 AND   pd.Id in(SELECT distinct prodID FROM shopitems s WHERE s.inserterID = '$user' )");


while ($row = mysqli_fetch_array($result)) {
  ?>
                    <tr>                               
                    <td><?php echo $row['Id']?></td>
                    <td bgcolor="#00FF00" contenteditable='true' ><?php echo $row['Description']?>
                    <td><?php echo $row['Size']?></td>
                    <td><?php echo $row['Colour']?></td>
<!--                    <td><?php //echo $row['Gender']?></td>-->
                    <td><?php echo  '<a href="#" ><img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/'.$row['ProdImage'].'.JPG" alt="This pic is not available"  id="the_idprimary" width="80" height="60" onclick="loadimages(this.id)"/></a>'?></td>
                     
<!--                    <td><?php //echo $row['Availfrom']?></td>
                        
                    <td><?php //echo $row['Availuntil']?></td>                  -->
                    
                    <td bgcolor="#00FF00" contenteditable='true'><?php echo $row['Price']?>                      
                    </td>
                    <td>                      
                    <input name="deleteshopitem" type="submit" id="deleteshopitem" value="Delete" >
                    </td>
                    <td>
                    <input name="updateshopitem" type="submit" id="updateshopitem" value="Save">
                    </td>  
                    <td><button id ="proddetailsShoPowner" href="modalowner.php">Details </button></td>
                                           
                </tr>               
<?php }?>

            </tbody>
            <tfoot>
                <?php  //include("../pages/PagesSetMyShop.php");?>
            </tfoot>
            </table>
    </body>
  
</html>
    
        

