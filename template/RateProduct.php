 <?php
include("../session/sessionmanager.php") ;
?> 
 <!DOCTYPE html>
<HTML>
<head>
<title>Rate products</title>
</head>
<body>
 Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  
  
  <input type="radio" name="gender" value="male"> Male<br>
<input type="radio" name="gender" value="female"> Female<br>
<input type="radio" name="gender" value="other"> Other
  <br><br>
  
 <footer>   
  <span>&copy Komoe 2016</span>  
 </footer>
</div>

</BODY>
</HTML>