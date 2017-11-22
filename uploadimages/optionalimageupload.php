<?php
	//not in use
	 if (isset($_FILES["imageoptional1"]) && !empty($_FILES["imageoptional1"])) {
 $upload_imageoptional1=$_FILES["imageoptional1"]["name"];
 $temp_nameoptional1 =$_FILES["imageoptional1"]["tmp_name"];
 $folder="C:/wamp/www/komoecontainer/comoeandfoldertree/komoeEng/images";
 $root = "C:/wamp/www"; 
  
  if (strpos($upload_imageoptional1, '.jpg') !== false) {
     $newuploadimageoptional1 =chop($upload_imageoptional1,".jpg");
    } 
if (strpos($upload_imageoptional1, '.JPG') !== false) {
     $newuploadimageoptional1 =chop($upload_imageoptional1,".JPG");
    }  
    
    if (strpos($upload_imageoptional1, '.tiff') !== false) {
     $newuploadimageoptional1 =chop($upload_imageoptional1,".tiff");
    }

    if (strpos($upload_imageoptional1, '.png') !== false) {
     $newuploadimageoptional1 =chop($upload_imageoptional1,".png");
    }

    if (strpos($upload_imageoptional1, '.JPEG') !== false) {
     $newuploadimageoptional1 =chop($upload_imageoptional1,".JPEG");
    }  
 
      if (strpos($upload_imageoptional1, '.gig') !== false) {
     $newuploadimageoptional1 =chop($upload_imageoptional1,".gif");
    }  	  

}
?>