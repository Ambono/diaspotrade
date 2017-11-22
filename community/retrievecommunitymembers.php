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
      
<title></title>

    </head>
    <body>
 <?php
ob_start();
session_start();

      if( $_SESSION['login_user']!= null)
   {  
	 $user = $_SESSION['login_user'];	 
	// echo  $user;
   }
?>
   <table cellpadding="2" cellspacing="4" border="solid navy 4px" id ="owneritemstbl"  class= "table table-hover" >
        <thead>
            <tr>         
               <td>Id</td>          
                <td>Name</td>                 
                <td>Surname</td>
                <td>Email</td>
                 <td>Telephone</td>                            
            </tr>
        </thead>
        <tbody>
<?php include("../config/config.php")?>
<?php

	
  $result =  mysqli_query($con, "Select * from users 
      u join communitymembers cm
      on u.Id = cm.memberId
      join communityownership co
      on cm.communityId = co.communityId
      join seller s on s.Id = co.ownerId 
      where s.Name =  '$user' ");
  
while ($row = mysqli_fetch_array($result)) {
  ?>
                    <tr>                               
                    <td><?php echo $row['Id']?></td>
                    <td bgcolor="#00FF00"  ><?php echo $row['Name']?>
                    <td><?php echo $row['Surname']?></td>
                    <td><?php echo $row['Email']?></td>
                    <td><?php echo $row['Telephone']?></td>
                   
                    <td>                      
                    <input name="deleteshopitem" type="submit" id="deleteshopitem" value="send email" >
                    </td>
                    <td>
                    <input name="updateshopitem" type="submit" id="updateshopitem" value="send text">
                    </td>                      
                </tr> 
                <tr>
                    <td><input name="deleteshopitem" type="submit" id="deleteshopitem" value="send bulk email" ></td>
                    <td> <input name="updateshopitem" type="submit" id="updateshopitem" value="send bulk text"></td>
                </tr>
<?php }?>

            </tbody>
            </table>