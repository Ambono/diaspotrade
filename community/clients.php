<html>
    <head>
        <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<script src="/komoecontainer/comoeandfoldertree/komoeEng/angular/searchangularcontrollers.js"></script>
<script src="/komoecontainer/comoeandfoldertree/komoeEng/insertsinDB/updateshop.js"></script>
        <title>My shop's items</title>
    </head>
    <body>
        <table cellpadding="2" cellspacing="4" border="solid navy 4px" id ="owneritemstbl"  >
        <thead>
            <tr>
         
               <td>Id</td>
          
                <td>Description</td>
                 
                <td>Size</td>
                <td>Colour</td>
                 <td>Gender</td>
                <td>Image</td>
               
                <td>avail from</td>
                   
                <td>avail to</td>
                                    
               <td>price</td>
               
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
		 


$resultshop = mysqli_query($connect,"SELECT Name  FROM shops s  join productdetails p on s.OwnerEmail = p.SellerEmail
AND s.OwnerUName   = '".$user."' order by Shopname desc limit 1");

$retshopval = mysqli_fetch_array($resultshop);          
          	
     $shopname= $retshopval[0];  


	$result = mysqli_query($connect,"SELECT * FROM productdetails WHERE Shopname =  '".$shopname."'AND
 Availuntil <= DATE_SUB(now(), INTERVAL 60 DAY) ");



	 
$data = array();

while ($row = mysqli_fetch_array($result)) {
  ?>
                    <tr>
                    <td><?php echo $row['Id']?></td>
                   
                    <td><?php echo $row['Description']?>
                   <input name="item_descr" type="text" id="item_descr" placeholder="Edit description"></td>
                      <td><?php echo $row['Size']?></td>
                    <td><?php echo $row['Colour']?></td>
                     <td><?php echo $row['Gender']?></td>
                    <td><?php echo  '<a href="#" ><img src = "http://localhost:81/komoecontainer/comoeandfoldertree/komoeEng/images/'.$row['ProdImage'].'.JPG" alt="This pic is not available"  id="the_idprimary" width="80" height="60" onclick="loadimages(this.id)"/></a>'?></td>
                     
                    <td><?php echo $row['Availfrom']?></td>
                        
                    <td><?php echo $row['Availuntil']?></td>                  
                       
                    <td><?php echo $row['Price']?>
                    <input name="item_price" type="text" id="item_price" placeholder="Edit price"></td>
                    <td>
                    <input name="deleteshopitem" type="submit" id="deleteshopitem" value="Delete">
                    </td>
                    <td>
                    <input name="updateshopitem" type="submit" id="updateshopitem" value="Update">
                    </td>
                </tr>               
<?php }?>

            </tbody>
            </table>
    </body>
    
        
</html>