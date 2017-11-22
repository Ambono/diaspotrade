<?php
  $sql = "INSERT INTO categories(category,  prodID, description)
 VALUES('$_POST[productcategory]','$latestinsertedid','$_POST[desc]')";
 if (!mysqli_query($con, $sql))
  {
  die("Error While uploading comment on the server: ".mysql_error()); 
  }  
else{
   echo "comment inserted"; 
    }
    ?>
